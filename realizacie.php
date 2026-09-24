<?php

require_once __DIR__ . '/includes/cms.php';
$content = cms_data();
$galleryPage = $content['gallery_page'];
$pageTitle = $content['seo']['gallery']['title'];
$activePage = 'realizacie';
$bodyClass = 'inner-page gallery-page';
$metaDescription = $content['seo']['gallery']['description'];
$seoKeywords = $content['seo']['gallery']['keywords'];
$gallery = [
    ['file' => 'realizacie/Chata/814754130_4710092289220022_5544860182670447562_n.jpg', 'title' => 'Zrubová chata — celkový pohľad', 'label' => 'dokončená obnova', 'category' => 'chaty'],
    ['file' => 'realizacie/Chata/793899922_26329356466761965_5538160186085151006_n.jpg', 'title' => 'Zrubová chata — detail', 'label' => 'obnovená fasáda', 'category' => 'chaty'],
    ['file' => 'realizacie/Chata/808855148_1498381105433182_7386706436728506203_n.jpg', 'title' => 'Zrubová chata — proces', 'label' => 'renovácia v procese', 'category' => 'proces'],
    ['file' => 'realizacie/chaty/zrubova-chata-final.jpg', 'title' => 'Zrubová chata', 'label' => 'hotový výsledok', 'category' => 'chaty'],
    ['file' => 'realizacie/chaty/terasa-zabradlie-final.jpg', 'title' => 'Terasa a zábradlie', 'label' => 'obnovený povrch', 'category' => 'chaty'],
    ['file' => 'realizacie/okna/strese-okno-final.jpg', 'title' => 'Strešné okno', 'label' => 'renovácia okna', 'category' => 'okna'],
    ['file' => 'realizacie/chaty/vstupna-terasa-final.jpg', 'title' => 'Vstupná terasa', 'label' => 'finálna úprava', 'category' => 'chaty'],
    ['file' => 'realizacie/chaty/obklad-stavba-final.jpg', 'title' => 'Drevený obklad', 'label' => 'obnova fasády', 'category' => 'chaty'],
    ['file' => 'realizacie/okna/dvere-final.jpg', 'title' => 'Drevené dvere', 'label' => 'ošetrenie a ochrana', 'category' => 'okna'],
    ['file' => 'realizacie/chaty/obklad-roh-detail.jpg', 'title' => 'Roh fasády', 'label' => 'zachovaný charakter', 'category' => 'chaty'],
    ['file' => 'realizacie/okna/okno-detail-final.jpg', 'title' => 'Okno — detail', 'label' => 'čistý detail', 'category' => 'okna'],
    ['file' => 'proces/terasa-renovacia.jpg', 'title' => 'Terasa v procese', 'label' => 'brúsenie a príprava', 'category' => 'proces'],
    ['file' => 'proces/zrub-brusenie.jpg', 'title' => 'Brúsenie zrubu', 'label' => 'obnova v procese', 'category' => 'proces'],
    ['file' => 'realizacie/chaty/zabradlie-final.jpg', 'title' => 'Zábradlie', 'label' => 'obnovená kresba', 'category' => 'chaty'],
    ['file' => 'realizacie/okna/interierove-okno.jpg', 'title' => 'Interiérové okno', 'label' => 'obnova dreva', 'category' => 'okna'],
    ['file' => 'proces/okno-nater.jpg', 'title' => 'Nanášanie ochrany', 'label' => 'finálna úprava', 'category' => 'proces'],
    ['file' => 'realizacie/chaty/obklad-cela-stavba.jpg', 'title' => 'Fasáda celej stavby', 'label' => 'drevená stavba', 'category' => 'chaty'],
    ['file' => 'proces/zabradlie-polovica.jpg', 'title' => 'Zábradlie — pred a po', 'label' => 'viditeľná zmena', 'category' => 'proces'],
];
$gallery = $galleryPage['items'];
require __DIR__ . '/includes/header.php';
?>

<section class="slth-page-hero slth-page-hero--video" style="--page-image: url('<?= e($galleryPage['hero']['image']) ?>');">
    <video class="slth-page-hero__video" autoplay muted loop playsinline preload="metadata" poster="<?= e($galleryPage['hero']['image']) ?>" aria-hidden="true">
        <source src="<?= e($galleryPage['hero']['video']) ?>" type="video/mp4">
    </video>
    <div class="container slth-page-hero__inner">
        <h1><?= $galleryPage['hero']['title'] ?></h1>
        <p><?= e($galleryPage['hero']['description']) ?></p>
        <div class="slth-breadcrumb"><a href="index.php">GARCIA</a><span>/</span><a href="realizacie.php" aria-current="page">realizácie</a></div>
    </div>
</section>

<section class="slth-gallery-section">
    <div class="container">
        <div class="slth-gallery-heading"><div class="slth-section-header"><p class="eyebrow"><?= e($galleryPage['intro']['eyebrow']) ?></p><h2><?= $galleryPage['intro']['title'] ?></h2><p><?= e($galleryPage['intro']['description']) ?></p></div><div class="gallery-toolbar" role="group" aria-label="Filtrovať realizácie"><?php foreach ($galleryPage['filters'] as $filterIndex => $filter): $filterKeys = ['all', 'chaty', 'okna', 'proces']; $filterKey = $filterKeys[$filterIndex] ?? 'all'; ?><button class="filter-button<?= $filterIndex === 0 ? ' is-active' : '' ?>" type="button" data-filter="<?= e($filterKey) ?>"><?= e($filter) ?></button><?php endforeach; ?></div></div>
        <div class="slth-gallery-full-grid">
            <?php foreach ($gallery as $item): $src = 'assets/images/' . $item['file']; ?>
                <a href="<?= e($src) ?>" class="slth-gallery-card reveal" data-gallery-item data-category="<?= e($item['category']) ?>" data-lightbox data-title="<?= e($item['title']) ?>" data-label="<?= e($item['label']) ?>">
                    <img src="<?= e($src) ?>" alt="<?= e($item['title']) ?> — <?= e($item['label']) ?>" loading="lazy"><span class="slth-gallery-card__shade"></span><span class="slth-gallery-card__text"><small><?= e($item['label']) ?></small><strong><?= e($item['title']) ?></strong></span>
                </a>
            <?php endforeach; ?>
        </div>
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
