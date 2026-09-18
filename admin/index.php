<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/cms.php';
require_once __DIR__ . '/../includes/admin-auth.php';

admin_start_session();
$config = admin_config();
$message = '';
$error = '';

function admin_h(mixed $value): string
{
    return e((string) $value);
}

function admin_field_name(array $path): string
{
    $name = 'content';
    foreach ($path as $segment) $name .= '[' . (string) $segment . ']';
    return $name;
}

function admin_label(string|int $key): string
{
    $label = str_replace(['_', '-'], ' ', (string) $key);
    return mb_convert_case($label, MB_CASE_TITLE, 'UTF-8');
}

function admin_section_slug(string|int $key): string
{
    return 'admin-section-' . trim((string) preg_replace('/[^a-z0-9]+/i', '-', (string) $key), '-');
}

function admin_section_label(string|int $key): string
{
    $labels = [
        'site' => 'Základné údaje',
        'seo' => 'SEO nastavenia',
        'navigation' => 'Navigácia',
        'home' => 'Domov',
        'services_page' => 'Služby',
        'gallery_page' => 'Realizácie',
        'project_page' => 'Detail projektu',
        'about_page' => 'O nás',
        'contact_page' => 'Kontakt',
        'legal' => 'GDPR a súkromie',
        'project_gallery' => 'Galéria projektu',
        'footer' => 'Pätička',
        'contact_prompt' => 'Záverečná výzva',
    ];
    return $labels[(string) $key] ?? admin_label($key);
}

function admin_render_value(mixed $value, array $path = []): void
{
    if (is_array($value)) {
        echo '<div class="admin-fields' . ($path ? ' admin-fields--nested' : '') . '">';
        foreach ($value as $key => $child) {
            if (is_array($child)) {
                $groupLabel = !$path && !is_int($key) ? admin_section_label($key) : (is_int($key) ? admin_label($path ? $key + 1 : $key) : admin_label($key));
                $groupId = !$path ? ' id="' . admin_h(admin_section_slug($key)) . '"' : '';
                echo '<fieldset class="admin-group"' . $groupId . '><legend>' . admin_h($groupLabel) . '</legend>';
                admin_render_value($child, [...$path, $key]);
                echo '</fieldset>';
                continue;
            }
            $fieldPath = [...$path, $key];
            $name = admin_field_name($fieldPath);
            $string = (string) $child;
            $keyName = strtolower((string) $key);
            $long = strlen($string) > 140 || in_array($keyName, ['description', 'desc', 'text', 'quote', 'title', 'subtitle', 'keywords', 'paragraphs'], true);
            echo '<label class="admin-field"><span>' . admin_h(admin_label($key)) . '</span>';
            if ($long) {
                echo '<textarea name="' . admin_h($name) . '" rows="' . ($keyName === 'title' ? '2' : '4') . '">' . admin_h($string) . '</textarea>';
            } else {
                $type = str_contains($keyName, 'url') || str_contains($keyName, 'image') || str_contains($keyName, 'video') || in_array($keyName, ['src', 'file', 'logo', 'favicon', 'facebook'], true) ? 'text' : 'text';
                echo '<input type="' . $type . '" name="' . admin_h($name) . '" value="' . admin_h($string) . '">';
            }
            echo '</label>';
        }
        echo '</div>';
        return;
    }
}

function admin_media_files(): array
{
    $files = [];
    $roots = [
        __DIR__ . '/../assets/images' => 'assets/images',
        __DIR__ . '/../assets/uploads' => 'assets/uploads',
    ];
    foreach ($roots as $directory => $publicRoot) {
        if (!is_dir($directory)) continue;
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS));
        foreach ($iterator as $file) {
            if (!$file->isFile() || !preg_match('/\.(?:jpe?g|png|webp|gif|svg)$/i', $file->getFilename())) continue;
            $relative = str_replace('\\', '/', substr($file->getPathname(), strlen($directory) + 1));
            $files[] = $publicRoot . '/' . $relative;
        }
    }
    sort($files);
    return $files;
}

if (isset($_GET['logout'])) {
    admin_logout();
    header('Location: index.php');
    exit;
}

if (!$config && $_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'setup') {
    $password = (string) ($_POST['password'] ?? '');
    $passwordConfirm = (string) ($_POST['password_confirm'] ?? '');
    if (strlen($password) < 10) $error = 'Heslo musí mať aspoň 10 znakov.';
    elseif ($password !== $passwordConfirm) $error = 'Heslá sa nezhodujú.';
    elseif (admin_save_config($password)) { $config = admin_config(); $message = 'Heslo bolo vytvorené. Prihláste sa.'; }
    else $error = 'Heslo sa nepodarilo uložiť.';
}

if ($config && !admin_is_logged_in() && $_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'login') {
    if (admin_login((string) ($_POST['password'] ?? ''))) { header('Location: index.php'); exit; }
    $error = 'Nesprávne heslo.';
}

if ($config && admin_is_logged_in() && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = (string) ($_POST['action'] ?? '');
    if (!admin_check_csrf((string) ($_POST['csrf'] ?? ''))) {
        $error = 'Platnosť formulára vypršala. Obnovte stránku a skúste to znova.';
    } elseif ($action === 'save') {
        $posted = $_POST['content'] ?? [];
        if (!is_array($posted)) $posted = [];
        if (cms_save(cms_merge(cms_defaults(), $posted))) $message = 'Obsah bol uložený.';
        else $error = 'Obsah sa nepodarilo uložiť.';
    } elseif ($action === 'upload') {
        $file = $_FILES['media'] ?? null;
        $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif', 'image/svg+xml' => 'svg'];
        if (!is_array($file) || ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK || !is_uploaded_file((string) $file['tmp_name'])) {
            $error = 'Vyberte prosím obrázok.';
        } else {
            $mime = (new finfo(FILEINFO_MIME_TYPE))->file((string) $file['tmp_name']);
            $size = (int) ($file['size'] ?? 0);
            if (!isset($allowed[$mime]) || $size > 12 * 1024 * 1024) $error = 'Povolené sú JPG, PNG, WEBP, GIF alebo SVG do 12 MB.';
            else {
                $base = pathinfo((string) ($file['name'] ?? 'obrazok'), PATHINFO_FILENAME);
                $base = strtolower(trim((string) preg_replace('/[^a-zA-Z0-9]+/', '-', $base), '-')) ?: 'obrazok';
                $filename = $base . '-' . date('YmdHis') . '-' . bin2hex(random_bytes(3)) . '.' . $allowed[$mime];
                $directory = __DIR__ . '/../assets/uploads';
                if (!is_dir($directory)) mkdir($directory, 0755, true);
                if (move_uploaded_file((string) $file['tmp_name'], $directory . '/' . $filename)) $message = 'Obrázok bol nahratý: assets/uploads/' . $filename;
                else $error = 'Obrázok sa nepodarilo uložiť.';
            }
        }
    }
}

$content = cms_data();
$token = admin_csrf_token();
?><!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GARCIA CMS</title>
    <link rel="stylesheet" href="../assets/css/admin.css?v=2">
</head>
<body class="admin-body">
<main class="admin-shell">
    <header class="admin-header"><div><span class="admin-kicker">GARCIA / CMS</span><h1>Správa webu</h1></div><?php if (admin_is_logged_in()): ?><a class="admin-link" href="?logout=1">Odhlásiť sa</a><?php endif; ?></header>
    <?php if ($message): ?><div class="admin-alert admin-alert--success"><?= admin_h($message) ?></div><?php endif; ?>
    <?php if ($error): ?><div class="admin-alert admin-alert--error"><?= admin_h($error) ?></div><?php endif; ?>
    <?php if (!$config): ?>
        <section class="admin-card admin-auth"><span class="admin-kicker">Prvé spustenie</span><h2>Vytvorte heslo administrátora</h2><p>Heslo sa uloží iba na serveri do chráneného úložiska. Použite minimálne 10 znakov.</p><form method="post"><input type="hidden" name="action" value="setup"><label>Nové heslo<input type="password" name="password" minlength="10" required autocomplete="new-password"></label><label>Zopakujte heslo<input type="password" name="password_confirm" minlength="10" required autocomplete="new-password"></label><button class="admin-button" type="submit">Vytvoriť administráciu</button></form></section>
    <?php elseif (!admin_is_logged_in()): ?>
        <section class="admin-card admin-auth"><span class="admin-kicker">Privátna zóna</span><h2>Prihlásenie</h2><p>Upravujte texty, obrázky, služby, realizácie aj SEO nastavenia webu.</p><form method="post"><input type="hidden" name="action" value="login"><label>Heslo<input type="password" name="password" required autofocus autocomplete="current-password"></label><button class="admin-button" type="submit">Prihlásiť sa</button></form></section>
    <?php else: ?>
        <section class="admin-card admin-toolbar"><div><span class="admin-kicker">Obsah a médiá</span><h2>Upravte web bez zásahu do kódu</h2><p>Texty s označením <code>&lt;em&gt;</code> podporujú zvýraznenie kurzívou. Pri obrázkoch použite cestu z knižnice médií.</p></div><div class="admin-toolbar__actions"><a class="admin-button admin-button--muted" href="../" target="_blank" rel="noopener">Zobraziť web</a><button class="admin-button" form="content-form" type="submit">Uložiť všetko</button></div></section>
        <section class="admin-card"><span class="admin-kicker">Knižnica médií</span><h2>Nahrať nový obrázok</h2><form class="admin-upload" method="post" enctype="multipart/form-data"><input type="hidden" name="action" value="upload"><input type="hidden" name="csrf" value="<?= admin_h($token) ?>"><input type="file" name="media" accept="image/jpeg,image/png,image/webp,image/gif,image/svg+xml" required><button class="admin-button admin-button--dark" type="submit">Nahrať obrázok</button></form><?php if (admin_media_files()): ?><div class="admin-media-grid"><?php foreach (admin_media_files() as $media): ?><figure><img src="../<?= admin_h($media) ?>" alt=""><figcaption><code><?= admin_h($media) ?></code></figcaption></figure><?php endforeach; ?></div><?php endif; ?></section>
        <form id="content-form" class="admin-editor" method="post"><input type="hidden" name="action" value="save"><input type="hidden" name="csrf" value="<?= admin_h($token) ?>">
            <div class="admin-editor-layout">
                <aside class="admin-sidebar" aria-label="Sekcie administrácie">
                    <span class="admin-sidebar__title">Upraviť sekciu</span>
                    <nav class="admin-sidebar__nav">
                        <?php foreach ($content as $sectionKey => $sectionValue): ?>
                            <?php if (!is_array($sectionValue)) continue; ?>
                            <a href="#<?= admin_h(admin_section_slug($sectionKey)) ?>"><?= admin_h(admin_section_label($sectionKey)) ?></a>
                        <?php endforeach; ?>
                    </nav>
                </aside>
                <div class="admin-editor__content"><?php admin_render_value($content); ?></div>
            </div>
            <div class="admin-savebar"><button class="admin-button" type="submit">Uložiť všetky zmeny</button><span>Po uložení obnovte verejnú stránku.</span></div>
        </form>
    <?php endif; ?>
</main>
</body>
</html>
