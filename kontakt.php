 <?php

require_once __DIR__ . '/includes/config.php';

$formState = null;
$old = ['name' => '', 'email' => '', 'phone' => '', 'message' => ''];
$attachment = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old['name'] = trim((string) ($_POST['name'] ?? ''));
    $old['email'] = trim((string) ($_POST['email'] ?? ''));
    $old['phone'] = trim((string) ($_POST['phone'] ?? ''));
    $old['message'] = trim((string) ($_POST['message'] ?? ''));
    $honeypot = trim((string) ($_POST['website'] ?? ''));
    $photo = $_FILES['photo'] ?? null;
    $uploadError = null;

    if (is_array($photo) && ($photo['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
        $maxPhotoSize = 8 * 1024 * 1024;
        $allowedMimes = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
        $photoError = (int) ($photo['error'] ?? UPLOAD_ERR_NO_FILE);
        $photoSize = (int) ($photo['size'] ?? 0);
        $photoMime = '';
        if ($photoError === UPLOAD_ERR_OK && is_uploaded_file($photo['tmp_name'])) {
            $fileInfo = new finfo(FILEINFO_MIME_TYPE);
            $photoMime = (string) $fileInfo->file($photo['tmp_name']);
        }

        if ($photoError !== UPLOAD_ERR_OK || $photoSize > $maxPhotoSize || !isset($allowedMimes[$photoMime])) {
            $uploadError = 'Fotografia musí byť JPG, PNG alebo WEBP do veľkosti 8 MB.';
        } else {
            $tempPath = tempnam(sys_get_temp_dir(), 'garcia_');
            if ($tempPath === false || !move_uploaded_file($photo['tmp_name'], $tempPath)) {
                $uploadError = 'Fotografiu sa nepodarilo načítať. Skúste to prosím znova.';
            } else {
                $originalName = basename((string) ($photo['name'] ?? 'fotografia'));
                $safeName = preg_replace('/[^A-Za-z0-9._-]/', '-', $originalName) ?: ('fotografia.' . $allowedMimes[$photoMime]);
                $attachment = ['path' => $tempPath, 'mime' => $photoMime, 'name' => $safeName];
            }
        }
    }

    if ($honeypot !== '') {
        $formState = 'success';
    } elseif ($uploadError !== null) {
        $formState = 'upload-error';
    } elseif ($old['name'] === '' || !filter_var($old['email'], FILTER_VALIDATE_EMAIL) || $old['message'] === '' || empty($_POST['consent'])) {
        $formState = 'error';
    } elseif (!contact_email_available()) {
        $formState = 'setup';
    } else {
        $project = trim((string) ($_POST['project'] ?? ''));
        $body = "Meno: {$old['name']}\nE-mail: {$old['email']}\nTelefón: {$old['phone']}\nTyp projektu: {$project}\nFotografia: " . ($attachment ? 'áno' : 'nie') . "\n\nSpráva:\n{$old['message']}";
        if ($attachment) {
            $boundary = 'garcia-' . bin2hex(random_bytes(10));
            $fileContents = chunk_split(base64_encode((string) file_get_contents($attachment['path'])));
            $headers = "From: GARCIA web <" . CONTACT_EMAIL . ">\r\nReply-To: " . $old['email'] . "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";
            $mailBody = "--{$boundary}\r\nContent-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: 8bit\r\n\r\n{$body}\r\n\r\n--{$boundary}\r\nContent-Type: {$attachment['mime']}; name=\"{$attachment['name']}\"\r\nContent-Disposition: attachment; filename=\"{$attachment['name']}\"\r\nContent-Transfer-Encoding: base64\r\n\r\n{$fileContents}\r\n--{$boundary}--\r\n";
        } else {
            $headers = "From: GARCIA web <" . CONTACT_EMAIL . ">\r\nReply-To: " . $old['email'] . "\r\nContent-Type: text/plain; charset=UTF-8\r\n";
            $mailBody = $body;
        }
        $sent = @mail(CONTACT_EMAIL, 'Nový dopyt z webu GARCIA', $mailBody, $headers);
        $formState = $sent ? 'success' : 'mail-error';
        if ($sent) $old = ['name' => '', 'email' => '', 'phone' => '', 'message' => ''];
    }
    if ($attachment && is_file($attachment['path'])) @unlink($attachment['path']);
}

$pageTitle = 'Kontakt — GARCIA';
$activePage = 'kontakt';
$bodyClass = 'inner-page contact-page';
$metaDescription = 'Kontaktujte GARCIA pre nezáväznú konzultáciu, obhliadku a cenovú ponuku na renováciu dreva.';
require __DIR__ . '/includes/header.php';
?>

<section class="slth-page-hero slth-page-hero--video" style="--page-image: url('assets/images/realizacie/chaty/zrub-front-detail.jpg');">
    <video class="slth-page-hero__video" autoplay muted loop playsinline preload="metadata" poster="assets/images/realizacie/chaty/zrub-front-detail.jpg" aria-hidden="true">
        <source src="assets/media/proces-renovacie.mp4" type="video/mp4">
    </video>
    <div class="container slth-page-hero__inner">
        <div class="slth-breadcrumb"><a href="index.php">GARCIA</a><span>/</span><a href="kontakt.php" aria-current="page">kontakt</a></div>
        <h1>Napíšte nám o <em>vašom dreve.</em></h1>
        <p>Pošlite nám základné informácie, pár fotografií alebo len predstavu. Ozveme sa a dohodneme si ďalší postup.</p>
    </div>
</section>

<section class="slth-contact-section">
    <div class="container slth-contact-grid">
        <aside class="slth-contact-info reveal">
            <p class="eyebrow">Ozvite sa</p>
            <h2>Porozprávajme sa o tom, čo vaše drevo potrebuje.</h2>
            <p>Najlepšie odporúčanie vznikne vtedy, keď vidíme stav povrchu a poznáme vašu predstavu. Formulár zaberie pár minút.</p>
            <div class="slth-contact-details">
                <div><span class="slth-contact-details__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M6.7 3.5 9 3l2 4.5-2.1 1.7a14.2 14.2 0 0 0 5.9 5.9l1.7-2.1 4.5 2-.5 2.3a2 2 0 0 1-2 1.6A15.5 15.5 0 0 1 5.1 5.5a2 2 0 0 1 1.6-2Z"></path></svg></span><div><span class="slth-contact-details__label">Telefón</span><a href="tel:<?= e(preg_replace('/\s+/', '', CONTACT_PHONE)) ?>"><?= e(CONTACT_PHONE) ?></a></div></div>
                <div><span class="slth-contact-details__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M3.5 6.5h17v11h-17z M4 7l8 6 8-6"></path></svg></span><div><span class="slth-contact-details__label">E-mail</span><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a></div></div>
                <div><span class="slth-contact-details__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M14 8h3V4.4c-.5-.1-1.7-.2-3.2-.2-3.2 0-5.4 2-5.4 5.5V13H5v4h3.4v7h4.2v-7h3.5l.6-4h-4.1V10c0-1.2.3-2 1.4-2Z"></path></svg></span><div><span class="slth-contact-details__label">Facebook</span><a href="<?= e(FACEBOOK_URL) ?>" target="_blank" rel="noopener noreferrer">GARCIA na Facebooku</a></div></div>
            </div>
        </aside>
        <div class="slth-contact-form reveal" id="dopyt">
            <p class="eyebrow">01 / nezáväzný dopyt</p>
            <h2>Čo potrebujete vyriešiť?</h2>
            <p>Čím viac nám napíšete, tým presnejšie sa vieme pripraviť na prvý rozhovor.</p>
            <?php if ($formState === 'success'): ?><div class="form-notice form-notice--success">Ďakujeme, správa bola odoslaná. Čoskoro sa vám ozveme.</div><?php elseif ($formState === 'error'): ?><div class="form-notice form-notice--error">Skontrolujte prosím meno, e-mail a správu.</div><?php elseif ($formState === 'upload-error'): ?><div class="form-notice form-notice--error">Fotografia musí byť JPG, PNG alebo WEBP do veľkosti 8 MB.</div><?php elseif ($formState === 'setup'): ?><div class="form-notice form-notice--setup">Formulár je pripravený. Pred nasadením ešte doplňte e-mail príjemcu v súbore <code>includes/config.php</code>.</div><?php elseif ($formState === 'mail-error'): ?><div class="form-notice form-notice--error">Správu sa nepodarilo odoslať. Skúste to prosím znova alebo neskôr.</div><?php endif; ?>
            <form class="contact-form" method="post" action="kontakt.php" enctype="multipart/form-data" data-contact-form>
                <div class="form-row"><label for="name">Meno a priezvisko <span>*</span><input id="name" name="name" type="text" value="<?= e($old['name']) ?>" placeholder="Ako vás môžeme osloviť?" required></label><label for="email">E-mail <span>*</span><input id="email" name="email" type="email" value="<?= e($old['email']) ?>" placeholder="vas@email.sk" required></label></div>
                <div class="form-row"><label for="phone">Telefón <small>nepovinné</small><input id="phone" name="phone" type="tel" value="<?= e($old['phone']) ?>" placeholder="+421 ..."></label><label for="project">Typ projektu <small>nepovinné</small><select id="project" name="project"><option value="">Vyberte možnosť</option><option>Chata alebo drevená stavba</option><option>Fasáda alebo obklad</option><option>Terasa alebo zábradlie</option><option>Okno alebo dvere</option><option>Iné</option></select></label></div>
                <label for="message">Správa <span>*</span><textarea id="message" name="message" rows="5" placeholder="Stručne opíšte projekt, lokalitu a predstavu..." required><?= e($old['message']) ?></textarea></label>
                <label class="form-file" for="photo">Fotografia <small>nepovinné · JPG, PNG alebo WEBP do 8 MB</small><input id="photo" name="photo" type="file" accept="image/jpeg,image/png,image/webp"></label>
                <label class="form-check"><input type="checkbox" name="consent" required><span>Súhlasím so spracovaním údajov na účely odpovede na dopyt. <a href="ochrana-sukromia.php">Viac informácií</a>.</span></label>
                <input type="text" name="website" tabindex="-1" autocomplete="off" class="form-honeypot" aria-hidden="true">
                <button class="button button--dark button--full" type="submit">Odoslať dopyt</button>
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/contact-prompt.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
