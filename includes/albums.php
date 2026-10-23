<?php

declare(strict_types=1);

const ALBUMS_STORAGE_FILE = __DIR__ . '/../storage/albums.json';
const ALBUMS_UPLOAD_DIR = __DIR__ . '/../assets/uploads/albumy';
const ALBUMS_UPLOAD_PUBLIC = 'assets/uploads/albumy';
const ALBUMS_MAX_PHOTO_BYTES = 12 * 1024 * 1024;
const ALBUMS_MAX_WIDTH = 1600;

function albums_defaults(): array
{
    $base = 'assets/images/albumy/';
    $album = static fn (string $id, string $title, string $description, array $files): array => [
        'id' => $id,
        'title' => $title,
        'description' => $description,
        'photos' => array_map(static fn (string $file): string => $base . $id . '/' . $file, $files),
    ];

    return [
        $album('gal_1', 'Renovácia dreveného vchodu', 'brúsenie a náter dverí', ['1.jpeg', '2.jpeg', '3.jpeg']),
        $album('gal_2', 'Chatka — vstupné dvere', 'dokončená obnova', ['1.jpeg', '2.jpeg']),
        $album('gal_3', 'Zrubový dom — štít a balkón', 'obnova zrubu', ['1.jpeg', '2.jpeg']),
        $album('gal_4', 'Chatka — pred a po', 'viditeľná zmena', ['1.jpeg', '2.jpeg', '3.jpeg']),
        $album('gal_5', 'Chatka — fasáda a okná', 'obnovený drevený obklad', ['1.jpeg', '2.jpeg', '3.jpeg', '4.jpeg', '5.jpeg']),
        $album('gal_6', 'Zrubové schody a zábradlie', 'brúsenie a ochrana', ['1.jpeg', '2.jpeg', '3.jpeg']),
        $album('gal_7', 'Zrubový dom', 'hotová realizácia', ['1.jpeg', '2.jpeg']),
        $album('gal_8', 'Zrubová stavba', 'detaily po obnove', ['1.jpeg', '2.jpeg', '3.jpeg', '4.jpeg', '5.jpeg']),
    ];
}

function albums_clean(mixed $raw): array
{
    if (!is_array($raw)) return [];
    $albums = [];
    foreach ($raw as $item) {
        if (!is_array($item)) continue;
        $id = preg_replace('/[^a-zA-Z0-9_-]/', '', (string) ($item['id'] ?? ''));
        $photos = array_values(array_filter(array_map('strval', (array) ($item['photos'] ?? [])), static fn (string $p): bool => $p !== ''));
        if ($id === '') continue;
        $albums[] = ['id' => $id, 'title' => trim((string) ($item['title'] ?? '')), 'description' => trim((string) ($item['description'] ?? '')), 'photos' => $photos];
    }
    return $albums;
}

function albums_all(): array
{
    if (is_file(ALBUMS_STORAGE_FILE)) {
        $stored = json_decode((string) file_get_contents(ALBUMS_STORAGE_FILE), true);
        if (is_array($stored)) return albums_clean($stored);
    }
    return albums_defaults();
}

function albums_save(array $albums): bool
{
    $directory = dirname(ALBUMS_STORAGE_FILE);
    if (!is_dir($directory) && !mkdir($directory, 0755, true)) return false;
    $json = json_encode(array_values($albums), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    return $json !== false && file_put_contents(ALBUMS_STORAGE_FILE, $json . PHP_EOL, LOCK_EX) !== false;
}

function albums_new_id(): string
{
    return 'a' . date('ymd') . bin2hex(random_bytes(3));
}

/** Normalizes PHP's multi-file $_FILES structure into a list of single-file arrays. */
function albums_collect_files(mixed $files): array
{
    if (!is_array($files) || !isset($files['name']) || !is_array($files['name'])) return [];
    $list = [];
    foreach ($files['name'] as $i => $name) {
        $list[] = ['name' => (string) $name, 'tmp_name' => (string) ($files['tmp_name'][$i] ?? ''), 'error' => (int) ($files['error'][$i] ?? UPLOAD_ERR_NO_FILE), 'size' => (int) ($files['size'][$i] ?? 0)];
    }
    return $list;
}

/**
 * Stores uploaded photos as size-capped JPEGs (re-encoding also strips metadata and applies EXIF rotation).
 * Returns [list of public paths, list of errors].
 */
function albums_store_photos(array $files, string $albumId): array
{
    $stored = [];
    $errors = [];
    $directory = ALBUMS_UPLOAD_DIR . '/' . $albumId;
    foreach ($files as $file) {
        if ($file['error'] === UPLOAD_ERR_NO_FILE) continue;
        if ($file['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($file['tmp_name']) || $file['size'] > ALBUMS_MAX_PHOTO_BYTES) {
            $errors[] = $file['name'] . ': súbor sa nepodarilo nahrať alebo je väčší ako 12 MB.';
            continue;
        }
        $mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
        $source = match ($mime) {
            'image/jpeg' => @imagecreatefromjpeg($file['tmp_name']),
            'image/png' => @imagecreatefrompng($file['tmp_name']),
            'image/webp' => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($file['tmp_name']) : false,
            default => false,
        };
        if (!$source) {
            $errors[] = $file['name'] . ': povolené sú len JPG, PNG alebo WEBP.';
            continue;
        }
        if ($mime === 'image/jpeg' && function_exists('exif_read_data')) {
            $orientation = (int) (@exif_read_data($file['tmp_name'])['Orientation'] ?? 1);
            $angle = [3 => 180, 6 => -90, 8 => 90][$orientation] ?? 0;
            if ($angle !== 0 && ($rotated = imagerotate($source, $angle, 0))) $source = $rotated;
        }
        $width = imagesx($source);
        $height = imagesy($source);
        if ($width > ALBUMS_MAX_WIDTH) {
            $resized = imagescale($source, ALBUMS_MAX_WIDTH);
            if ($resized) $source = $resized;
        }
        $canvas = imagecreatetruecolor(imagesx($source), imagesy($source));
        imagefill($canvas, 0, 0, imagecolorallocate($canvas, 255, 255, 255));
        imagecopy($canvas, $source, 0, 0, 0, 0, imagesx($source), imagesy($source));
        if (!is_dir($directory) && !mkdir($directory, 0755, true)) {
            $errors[] = 'Priečinok albumu sa nepodarilo vytvoriť.';
            break;
        }
        $name = date('YmdHis') . '-' . bin2hex(random_bytes(3)) . '.jpg';
        if (imagejpeg($canvas, $directory . '/' . $name, 80)) {
            $stored[] = ALBUMS_UPLOAD_PUBLIC . '/' . $albumId . '/' . $name;
            if (function_exists('imagewebp')) @imagewebp($canvas, $directory . '/' . $name . '.webp', 72);
        }
        else $errors[] = $file['name'] . ': fotografiu sa nepodarilo uložiť.';
    }
    return [$stored, $errors];
}

/** Deletes a photo file, but only if it was uploaded through the admin (never the files shipped in the repo). */
function albums_delete_photo_file(string $publicPath): void
{
    if (!str_starts_with($publicPath, ALBUMS_UPLOAD_PUBLIC . '/') || str_contains($publicPath, '..')) return;
    $path = __DIR__ . '/../' . $publicPath;
    if (is_file($path)) @unlink($path);
    if (is_file($path . '.webp')) @unlink($path . '.webp');
    @rmdir(dirname($path)); // only succeeds once the album folder is empty
}

function albums_find_index(array $albums, string $id): ?int
{
    foreach ($albums as $index => $album) if ($album['id'] === $id) return $index;
    return null;
}

/** Handles one admin album action. Returns [success message, error message]. */
function albums_handle_action(string $action, array $post, array $files): array
{
    $albums = albums_all();
    $id = (string) ($post['album_id'] ?? '');
    $index = albums_find_index($albums, $id);

    if ($action === 'album_create') {
        $title = trim((string) ($post['title'] ?? ''));
        if ($title === '') return ['', 'Zadajte názov albumu.'];
        $newId = albums_new_id();
        [$photos, $errors] = albums_store_photos(albums_collect_files($files['photos'] ?? null), $newId);
        if (!$photos) return ['', 'Album potrebuje aspoň jednu fotografiu. ' . implode(' ', $errors)];
        $albums[] = ['id' => $newId, 'title' => $title, 'description' => trim((string) ($post['description'] ?? '')), 'photos' => $photos];
        if (!albums_save($albums)) return ['', 'Album sa nepodarilo uložiť.'];
        return ['Album „' . $title . '“ bol pridaný (' . count($photos) . ' fotiek).' . ($errors ? ' ' . implode(' ', $errors) : ''), ''];
    }

    if ($index === null) return ['', 'Album sa nenašiel.'];

    if ($action === 'album_delete') {
        foreach ($albums[$index]['photos'] as $photo) albums_delete_photo_file($photo);
        array_splice($albums, $index, 1);
        return albums_save($albums) ? ['Album bol odstránený.', ''] : ['', 'Zmenu sa nepodarilo uložiť.'];
    }

    if ($action === 'album_move') {
        $target = $index + (($post['direction'] ?? '') === 'up' ? -1 : 1);
        if ($target < 0 || $target >= count($albums)) return ['', ''];
        [$albums[$index], $albums[$target]] = [$albums[$target], $albums[$index]];
        return albums_save($albums) ? ['Poradie albumov bolo zmenené.', ''] : ['', 'Zmenu sa nepodarilo uložiť.'];
    }

    if ($action === 'album_update') {
        $album = $albums[$index];
        $title = trim((string) ($post['title'] ?? ''));
        if ($title === '') return ['', 'Názov albumu nemôže byť prázdny.'];
        $album['title'] = $title;
        $album['description'] = trim((string) ($post['description'] ?? ''));

        $remove = array_map('strval', (array) ($post['remove'] ?? []));
        $kept = [];
        foreach ($album['photos'] as $photo) {
            if (in_array($photo, $remove, true)) albums_delete_photo_file($photo);
            else $kept[] = $photo;
        }
        $cover = (string) ($post['cover'] ?? '');
        if ($cover !== '' && ($coverIndex = array_search($cover, $kept, true)) !== false) {
            array_splice($kept, (int) $coverIndex, 1);
            array_unshift($kept, $cover);
        }
        [$added, $errors] = albums_store_photos(albums_collect_files($files['photos'] ?? null), $album['id']);
        $album['photos'] = [...$kept, ...$added];
        if (!$album['photos']) return ['', 'Album musí mať aspoň jednu fotografiu. Ak ho nechcete, odstráňte celý album.'];
        $albums[$index] = $album;
        if (!albums_save($albums)) return ['', 'Zmenu sa nepodarilo uložiť.'];
        return ['Album bol uložený.' . ($errors ? ' ' . implode(' ', $errors) : ''), ''];
    }

    return ['', ''];
}
