<?php

require_once __DIR__ . '/includes/cms.php';
require_once __DIR__ . '/includes/albums.php';
$content = cms_data();
$galleryPage = $content['gallery_page'];
$pageTitle = $content['seo']['gallery']['title'];
$activePage = 'realizacie';
$bodyClass = 'inner-page gallery-page';
$metaDescription = $content['seo']['gallery']['description'];
$seoKeywords = $content['seo']['gallery']['keywords'];
$albums = array_values(array_filter(albums_all(), static fn (array $album): bool => $album['photos'] !== []));
require __DIR__ . '/includes/header.php';
?>

<section class="slth-page-hero slth-page-hero--video" style="--page-image: url('<?= e($galleryPage['hero']['image']) ?>');">
    <video class="slth-page-hero__video" autoplay muted loop playsinline preload="metadata" poster="<?= e($galleryPage['hero']['image']) ?>" aria-hidden="true">
        <source src="<?= e($galleryPage['hero']['video']) ?>" type="video/mp4">
    </video>
    <div class="container slth-page-hero__inner">
        <h1><?= $galleryPage['hero']['title'] ?></h1>
        <p><?= e($galleryPage['hero']['description']) ?></p>
        <div class="slth-breadcrumb"><a href="/">GARCIA</a><span>/</span><a href="/realizacie" aria-current="page">realizácie</a></div>
    </div>
</section>

<section class="slth-gallery-section">
    <div class="container">
        <div class="slth-gallery-heading"><div class="slth-section-header"><p class="eyebrow"><?= e($galleryPage['intro']['eyebrow']) ?></p><h2><?= $galleryPage['intro']['title'] ?></h2><p><?= e($galleryPage['intro']['description']) ?></p></div></div>
        <div class="slth-gallery-full-grid">
            <?php foreach ($albums as $album): $count = count($album['photos']); $label = $album['description'] !== '' ? $album['description'] : 'realizácia'; ?>
                <a href="<?= e($album['photos'][0]) ?>" class="slth-gallery-card album-card reveal" data-album-open="<?= e($album['id']) ?>">
                    <img src="<?= e($album['photos'][0]) ?>" alt="<?= e($album['title']) ?>" loading="lazy"><span class="slth-gallery-card__shade"></span><span class="album-card__count"><?= $count ?> <?= $count === 1 ? 'fotka' : ($count < 5 ? 'fotky' : 'fotiek') ?></span><span class="slth-gallery-card__text"><small><?= e($label) ?></small><strong><?= e($album['title']) ?></strong></span>
                </a>
            <?php endforeach; ?>
        </div>
        <?php foreach ($albums as $album): $label = $album['description'] !== '' ? $album['description'] : 'realizácia'; foreach ($album['photos'] as $photo): ?>
            <a href="<?= e($photo) ?>" class="album-photo is-hidden" data-gallery-item data-album="<?= e($album['id']) ?>" data-title="<?= e($album['title']) ?>" data-label="<?= e($label) ?>" tabindex="-1" aria-hidden="true"></a>
        <?php endforeach; endforeach; ?>
    </div>
</section>

<?php require __DIR__ . '/includes/contact-prompt.php'; ?>

<div class="lightbox" data-lightbox-modal aria-hidden="true">
    <div class="lightbox__backdrop" data-lightbox-close></div>
    <button type="button" class="lightbox__close" data-lightbox-close aria-label="Zavrieť detail">×</button>
    <div class="lightbox__dialog" role="dialog" aria-modal="true" aria-label="Detail realizácie">
        <div class="lightbox__media">
            <button type="button" class="lightbox__nav lightbox__nav--prev" data-lightbox-prev aria-label="Predchádzajúca fotografia"><span aria-hidden="true">←</span></button>
            <img data-lightbox-image src="" alt="">
            <button type="button" class="lightbox__nav lightbox__nav--next" data-lightbox-next aria-label="Nasledujúca fotografia"><span aria-hidden="true">→</span></button>
        </div>
        <div class="lightbox__caption">
            <div class="lightbox__caption-label"><span data-lightbox-label></span><i aria-hidden="true"></i></div>
            <strong data-lightbox-title></strong>
            <p>Ukážka práce GARCIA — renovácia, brúsenie a ochrana drevených povrchov.</p>
            <div class="lightbox__counter"><strong data-lightbox-current>01</strong><span>/</span><span data-lightbox-total>01</span></div>
            <small class="lightbox__hint">Použite šípky alebo klávesy ← →</small>
        </div>
    </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
