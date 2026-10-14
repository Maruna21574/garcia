<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';

function mail_boundary(): string
{
    return 'garcia-' . bin2hex(random_bytes(12));
}

function mail_ext_for_mime(string $mime): string
{
    return match ($mime) {
        'image/png' => 'png',
        'image/webp' => 'webp',
        default => 'jpg',
    };
}

/**
 * Re-encodes an uploaded photo as a size-capped JPEG so it displays reliably
 * inside an email (WebP/large originals often fail to render in mail clients).
 */
function mail_prepare_inline_image(string $path, string $mime): array
{
    if (!extension_loaded('gd')) {
        return ['data' => (string) file_get_contents($path), 'mime' => $mime, 'ext' => mail_ext_for_mime($mime)];
    }

    $source = match ($mime) {
        'image/jpeg' => @imagecreatefromjpeg($path),
        'image/png' => @imagecreatefrompng($path),
        'image/webp' => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($path) : null,
        default => null,
    };

    if (!$source) {
        return ['data' => (string) file_get_contents($path), 'mime' => $mime, 'ext' => mail_ext_for_mime($mime)];
    }

    $width = imagesx($source);
    $height = imagesy($source);
    $maxWidth = 900;
    if ($width > $maxWidth) {
        $newWidth = $maxWidth;
        $newHeight = (int) round($height * ($maxWidth / $width));
        $resized = imagecreatetruecolor($newWidth, $newHeight);
        $white = imagecolorallocate($resized, 255, 255, 255);
        imagefilledrectangle($resized, 0, 0, $newWidth, $newHeight, $white);
        imagecopyresampled($resized, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        $source = $resized;
    }

    ob_start();
    imagejpeg($source, null, 82);
    $data = (string) ob_get_clean();

    return ['data' => $data, 'mime' => 'image/jpeg', 'ext' => 'jpg'];
}

function mail_layout(string $title, string $bodyHtml): string
{
    return '<!doctype html><html lang="sk"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"></head>'
        . '<body style="margin:0;padding:0;background:#f2efe8;font-family:Georgia,\'Times New Roman\',serif;">'
        . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f2efe8;padding:32px 16px;">'
        . '<tr><td align="center">'
        . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:560px;background:#ffffff;border-radius:12px;overflow:hidden;border:1px solid #e7e1d3;">'
        . '<tr><td style="background:#1f211c;padding:24px 32px;">'
        . '<span style="color:#e8c78a;font-size:22px;font-weight:bold;letter-spacing:1px;">GARCIA</span><br>'
        . '<span style="color:#c9c6bd;font-size:12px;">Povrchová úprava a renovácia dreva</span>'
        . '</td></tr>'
        . '<tr><td style="padding:32px;color:#2b2a26;font-size:15px;line-height:1.6;">'
        . '<h1 style="margin:0 0 16px;font-size:20px;color:#1f211c;">' . $title . '</h1>'
        . $bodyHtml
        . '</td></tr>'
        . '<tr><td style="padding:16px 32px;background:#f2efe8;color:#8a8578;font-size:12px;">GARCIA — Liptovský Mikuláš a okolie</td></tr>'
        . '</table></td></tr></table></body></html>';
}

function mail_field_row(string $label, string $value): string
{
    if ($value === '') return '';
    return '<tr>'
        . '<td style="padding:6px 12px 6px 0;color:#8a8578;font-size:13px;white-space:nowrap;vertical-align:top;">' . e($label) . '</td>'
        . '<td style="padding:6px 0;color:#2b2a26;font-size:14px;">' . nl2br(e($value)) . '</td>'
        . '</tr>';
}

function mail_admin_inquiry_html(string $name, string $email, string $phone, string $project, string $message, bool $hasPhoto): string
{
    $rows = mail_field_row('Meno', $name)
        . mail_field_row('E-mail', $email)
        . mail_field_row('Telefón', $phone)
        . mail_field_row('Typ projektu', $project);

    $body = '<p style="margin:0 0 16px;">Z webu prišiel nový dopyt cez kontaktný formulár.</p>'
        . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:20px;">' . $rows . '</table>'
        . '<p style="margin:0 0 6px;color:#8a8578;font-size:13px;">Správa</p>'
        . '<p style="margin:0 0 20px;white-space:pre-line;">' . e($message) . '</p>';

    if ($hasPhoto) {
        $body .= '<p style="margin:0 0 8px;color:#8a8578;font-size:13px;">Priložená fotografia</p>'
            . '<img src="cid:garcia-foto" alt="Fotografia od zákazníka" style="max-width:100%;border-radius:8px;display:block;">';
    }

    return mail_layout('Nový dopyt z webu', $body);
}

function mail_customer_confirmation_html(string $name, array $site, bool $hasPhoto): string
{
    $firstName = trim((string) strtok($name, ' '));
    $greeting = $firstName !== '' ? 'Dobrý deň, ' . e($firstName) . ',' : 'Dobrý deň,';

    $body = '<p style="margin:0 0 16px;">' . $greeting . '</p>'
        . '<p style="margin:0 0 16px;">ďakujeme za váš dopyt. Správu sme prijali a ozveme sa vám čo najskôr s ďalším postupom.</p>';

    if ($hasPhoto) {
        $body .= '<p style="margin:0 0 8px;color:#8a8578;font-size:13px;">Fotografia, ktorú ste priložili</p>'
            . '<img src="cid:garcia-foto" alt="Vaša priložená fotografia" style="max-width:100%;border-radius:8px;display:block;margin-bottom:16px;">';
    }

    $body .= '<p style="margin:0 0 4px;">V prípade otázok nás môžete kontaktovať aj priamo:</p>'
        . '<p style="margin:0;color:#2b2a26;">'
        . '<strong>' . e((string) $site['phone']) . '</strong><br>'
        . '<a href="mailto:' . e((string) $site['email']) . '" style="color:#8a5a2b;">' . e((string) $site['email']) . '</a>'
        . '</p>';

    return mail_layout('Ďakujeme za váš dopyt', $body);
}

function mail_send_html(string $to, string $subject, string $fromAddress, string $fromName, string $replyTo, string $html, ?array $inlineImage): bool
{
    $headers = 'From: ' . $fromName . ' <' . $fromAddress . ">\r\n";
    $headers .= 'Sender: ' . $fromAddress . "\r\n";
    if ($replyTo !== '') $headers .= 'Reply-To: ' . $replyTo . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";

    if ($inlineImage) {
        $boundary = mail_boundary();
        $headers .= 'Content-Type: multipart/related; boundary="' . $boundary . "\"\r\n";
        $imageData = chunk_split(base64_encode($inlineImage['data']));
        $filename = 'fotografia.' . $inlineImage['ext'];
        $body = "--{$boundary}\r\nContent-Type: text/html; charset=UTF-8\r\nContent-Transfer-Encoding: 8bit\r\n\r\n{$html}\r\n"
            . "--{$boundary}\r\nContent-Type: {$inlineImage['mime']}; name=\"{$filename}\"\r\nContent-Transfer-Encoding: base64\r\nContent-ID: <garcia-foto>\r\nContent-Disposition: inline; filename=\"{$filename}\"\r\n\r\n{$imageData}\r\n"
            . "--{$boundary}--\r\n";
    } else {
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $body = $html;
    }

    return @mail($to, $subject, $body, $headers, '-f' . $fromAddress);
}
