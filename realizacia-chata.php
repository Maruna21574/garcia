<?php

require_once __DIR__ . '/includes/cms.php';
$content = cms_data();
$projectPage = $content['project_page'];
$pageTitle = $content['seo']['project']['title'];
$activePage = 'realizacie';
$bodyClass = 'inner-page project-page';
$metaDescription = $content['seo']['project']['description'];
$seoKeywords = $content['seo']['project']['keywords'];
require __DIR__ . '/includes/header.php';
?>

<section class="slth-page-hero" style="--page-image: url('<?= e($projectPage['hero']['image']) ?>');">
    <div class="container slth-page-hero__inner">
        <p class="eyebrow">GARCIA / detail realizácie</p>
        <h1><?= $projectPage['hero']['title'] ?></h1>
        <p><?= e($projectPage['hero']['description']) ?></p>
        <div class="slth-breadcrumb"><a href="realizacie.php">Realizácie</a><span>/</span><span>Drevená chata</span></div>
    </div>
</section>

<section class="slth-about-section">
    <div class="container slth-about-grid">
        <div class="slth-about-media reveal"><img src="<?= e($projectPage['about']['image']) ?>" alt="Zrenovované zábradlie na terase" loading="lazy"></div>
        <div class="slth-about-copy reveal">
            <p class="eyebrow"><?= e($projectPage['about']['eyebrow']) ?></p>
            <h2><?= $projectPage['about']['title'] ?></h2>
            <?php foreach ($projectPage['about']['paragraphs'] as $paragraph): ?><p><?= e($paragraph) ?></p><?php endforeach; ?>
            <div class="slth-about-facts"><?php foreach ($projectPage['about']['facts'] as $fact): ?><div><strong><?= e($fact['label']) ?></strong><span><?= e($fact['value']) ?></span></div><?php endforeach; ?></div>
        </div>
    </div>
</section>

<section class="slth-gallery-section">
    <div class="container"><div class="slth-section-header slth-section-header--center"><p class="eyebrow"><?= e($projectPage['gallery']['eyebrow']) ?></p><h2><?= $projectPage['gallery']['title'] ?></h2><p><?= e($projectPage['gallery']['description']) ?></p></div><div class="slth-gallery-grid"><?php foreach ($projectPage['gallery']['items'] as $item): ?><a class="slth-gallery-item reveal" href="realizacie.php"><img src="<?= e($item['src']) ?>" alt="<?= e($item['alt']) ?>" loading="lazy"><span><?= e($item['label']) ?></span></a><?php endforeach; ?></div></div>
</section>

<section class="slth-process"><div class="container"><div class="slth-section-header slth-section-header--center"><p class="eyebrow"><?= e($projectPage['process']['eyebrow']) ?></p><h2><?= $projectPage['process']['title'] ?></h2><p><?= e($projectPage['process']['description']) ?></p></div><div class="slth-process-grid"><?php foreach ($projectPage['process']['steps'] as $index => $step): ?><div class="slth-process-step reveal"><div class="slth-process-step__num"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></div><h3><?= e($step['title']) ?></h3><p><?= e($step['desc']) ?></p></div><?php endforeach; ?></div></div></section>

<?php require __DIR__ . '/includes/contact-prompt.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
