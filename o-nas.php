<?php

require_once __DIR__ . '/includes/cms.php';
$content = cms_data();
$aboutPage = $content['about_page'];
$pageTitle = $content['seo']['about']['title'];
$activePage = 'o-nas';
$bodyClass = 'inner-page about-page';
$metaDescription = $content['seo']['about']['description'];
$seoKeywords = $content['seo']['about']['keywords'];
require __DIR__ . '/includes/header.php';
?>

<section class="slth-page-hero slth-page-hero--video about-page-hero" style="--page-image: url('<?= e($aboutPage['hero']['image']) ?>');">
    <video class="slth-page-hero__video" autoplay muted loop playsinline preload="metadata" poster="<?= e($aboutPage['hero']['image']) ?>" aria-hidden="true">
        <source src="<?= e($aboutPage['hero']['video']) ?>" type="video/mp4">
    </video>
    <div class="container slth-page-hero__inner">
        <h1><?= $aboutPage['hero']['title'] ?></h1>
        <p><?= e($aboutPage['hero']['description']) ?></p>
        <div class="slth-breadcrumb"><a href="index.php">GARCIA</a><span>/</span><a href="o-nas.php" aria-current="page">o nás</a></div>
    </div>
</section>

<section class="slth-about-section">
    <div class="container slth-about-grid">
        <div class="slth-about-media reveal"><img src="<?= e($aboutPage['about']['image']) ?>" alt="Drevená chata v obklopení prírody" loading="lazy"></div>
        <div class="slth-about-copy reveal">
            <p class="eyebrow"><?= e($aboutPage['about']['eyebrow']) ?></p>
            <h2><?= $aboutPage['about']['title'] ?></h2>
            <?php foreach ($aboutPage['about']['paragraphs'] as $paragraph): ?><p><?= e($paragraph) ?></p><?php endforeach; ?>
            <a href="kontakt.php" class="btn btn--outline-dark">Porozprávať sa o projekte</a>
        </div>
    </div>
</section>

<section class="slth-services-section about-values-section">
    <div class="container">
        <div class="slth-section-header slth-section-header--center"><p class="eyebrow"><?= e($aboutPage['values']['eyebrow']) ?></p><h2><?= $aboutPage['values']['title'] ?></h2><p><?= e($aboutPage['values']['description']) ?></p></div>
        <div class="slth-services-grid">
            <?php foreach ($aboutPage['values']['items'] as $value): ?>
                <article class="slth-service-card reveal"><div class="slth-service-card__icon"><?= e($value['number']) ?></div><h3><?= e($value['title']) ?></h3><p><?= e($value['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="slth-process about-process-section">
    <div class="container">
        <div class="slth-section-header slth-section-header--center"><p class="eyebrow"><?= e($aboutPage['process']['eyebrow']) ?></p><h2><?= $aboutPage['process']['title'] ?></h2><p><?= e($aboutPage['process']['description']) ?></p></div>
        <div class="slth-process-grid"><?php foreach ($aboutPage['process']['steps'] as $index => $step): ?><div class="slth-process-step reveal"><div class="slth-process-step__num"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></div><h3><?= e($step['title']) ?></h3><p><?= e($step['desc']) ?></p></div><?php endforeach; ?></div>
    </div>
</section>

<?php require __DIR__ . '/includes/contact-prompt.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
