<?php

require_once __DIR__ . '/config.php';

$pageTitle = $pageTitle ?? SITE_NAME . ' — ' . SITE_TAGLINE;
$activePage = $activePage ?? '';
$bodyClass = $bodyClass ?? '';
$metaDescription = $metaDescription ?? 'GARCIA renovuje, brúsi a chráni drevené chaty, stavby, okná a dvere v Liptovskom Mikuláši a okolí.';
$seoKeywords = $seoKeywords ?? 'renovácia dreva, brúsenie dreva, ošetrenie dreva, ochrana dreva, renovácia chát, drevené stavby, Liptovský Mikuláš';
$requestHost = strtolower((string) ($_SERVER['HTTP_HOST'] ?? ''));
$requestHost = preg_replace('/:\\d+$/', '', $requestHost);
$publicOrigin = in_array($requestHost, ['garcia.clicki.sk', 'garcia.sk', 'www.garcia.sk'], true) ? 'https://' . $requestHost : SITE_URL;
$socialImage = $socialImage ?? rtrim($publicOrigin, '/') . '/assets/images/brand/og-garcia-chata.png';
$currentScript = basename((string) ($_SERVER['SCRIPT_NAME'] ?? 'index.php'));
$canonicalUrl = rtrim(SITE_URL, '/') . ($currentScript === 'index.php' ? '/' : '/' . $currentScript);
$schemaPhone = preg_replace('/\D+/', '', CONTACT_PHONE);
$schemaPhone = $schemaPhone !== '' && strpos($schemaPhone, '0') === 0 ? '+421' . substr($schemaPhone, 1) : ($schemaPhone !== '' ? '+' . $schemaPhone : '');
$businessSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => SITE_NAME . ' — ' . SITE_TAGLINE,
    'description' => $metaDescription,
    'url' => $canonicalUrl,
    'image' => $socialImage,
    'areaServed' => 'Liptovský Mikuláš a okolie',
    'email' => CONTACT_EMAIL,
    'telephone' => $schemaPhone,
    'sameAs' => [FACEBOOK_URL],
];
?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($metaDescription) ?>">
    <meta name="keywords" content="<?= e($seoKeywords) ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= e($canonicalUrl) ?>">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="sk_SK">
    <meta property="og:site_name" content="GARCIA">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($metaDescription) ?>">
    <meta property="og:url" content="<?= e($canonicalUrl) ?>">
    <meta property="og:image" content="<?= e($socialImage) ?>">
    <meta property="og:image:width" content="1733">
    <meta property="og:image:height" content="908">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:alt" content="GARCIA — povrchová úprava a renovácia dreva">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle) ?>">
    <meta name="twitter:description" content="<?= e($metaDescription) ?>">
    <meta name="twitter:image" content="<?= e($socialImage) ?>">
    <meta name="twitter:image:alt" content="GARCIA — povrchová úprava a renovácia dreva">
    <script type="application/ld+json"><?= json_encode($businessSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
    <meta name="theme-color" content="#1f211c">
    <link rel="icon" type="image/svg+xml" href="assets/images/brand/favicon.svg">
    <link rel="apple-touch-icon" href="assets/images/brand/favicon.svg">
    <title><?= e($pageTitle) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css?v=<?= (int) filemtime(__DIR__ . '/../assets/css/style.css') ?>">
</head>
<body class="<?= e($bodyClass) ?>">
    <a href="#hlavny-obsah" class="skip-link">Preskočiť na obsah</a>
    <header class="site-header" id="site-header" data-header>
        <div class="topbar">
            <div class="container topbar__inner">
                <div class="topbar__contact">
                    <a class="topbar__contact-link" href="tel:+421905938699">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.7 3.5 9 3l2 4.5-2.1 1.7a14.2 14.2 0 0 0 5.9 5.9l1.7-2.1 4.5 2-.5 2.3a2 2 0 0 1-2 1.6A15.5 15.5 0 0 1 5.1 5.5a2 2 0 0 1 1.6-2Z"/></svg>
                        <span>0905 938 699</span>
                    </a>
                    <a class="topbar__contact-link" href="mailto:<?= e(CONTACT_EMAIL) ?>">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3.5 6.5h17v11h-17z M4 7l8 6 8-6"/></svg>
                        <span><?= e(CONTACT_EMAIL) ?></span>
                    </a>
                </div>
                <div class="topbar__right"><span>Liptovský Mikuláš a okolie</span><a class="topbar__social" href="<?= e(FACEBOOK_URL) ?>" target="_blank" rel="noopener noreferrer" aria-label="GARCIA na Facebooku"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 8h3V4.4c-.5-.1-1.7-.2-3.2-.2-3.2 0-5.4 2-5.4 5.5V13H5v4h3.4v7h4.2v-7h3.5l.6-4h-4.1V10c0-1.2.3-2 1.4-2Z"/></svg></a></div>
            </div>
        </div>
        <div class="container header__inner">
            <a href="index.php" class="logo" aria-label="GARCIA — domov">
                <img src="assets/images/brand/logo-garcia.png" alt="GARCIA — povrchová úprava a renovácia dreva" class="logo__img">
            </a>
            <nav class="main-nav" id="main-nav" data-nav aria-label="Hlavná navigácia">
                <div class="mobile-nav__head">
                    <a href="index.php" class="mobile-nav__logo" aria-label="GARCIA — domov">
                        <img src="assets/images/brand/logo-garcia.png" alt="GARCIA" class="mobile-nav__logo-img">
                    </a>
                    <button class="mobile-nav__close" type="button" data-mobile-menu-close aria-label="Zavrieť menu"><span></span><span></span></button>
                </div>
                <ul>
                    <?php foreach ($navigation as $key => $item): ?>
                    <li><a href="<?= e($item['href']) ?>"<?= is_active($key, $activePage) ?>><?= e($item['label']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <a class="mobile-nav__contact" href="kontakt.php">Kontakt</a>
            </nav>
            <div class="header__actions">
                <a href="kontakt.php" class="btn btn--gold header__cta">Nezáväzná konzultácia</a>
                <button class="nav-toggle" id="nav-toggle" type="button" aria-label="Otvoriť menu" aria-expanded="false" aria-controls="main-nav" data-menu-toggle>
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </header>
    <main id="hlavny-obsah">
