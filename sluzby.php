<?php

$pageTitle = 'Služby — GARCIA';
$activePage = 'sluzby';
$bodyClass = 'inner-page services-page';
$metaDescription = 'Renovácie drevených chát a stavieb, brúsenie, príprava povrchu, ošetrenie okien a ochrana dreva.';
require __DIR__ . '/includes/header.php';

$services = [
    ['icon' => 'house', 'title' => 'Obnova chát a stavieb', 'desc' => 'Oživujeme fasády, zruby, štíty a drevené prvky tak, aby ich charakter zostal zachovaný.', 'anchor' => 'chaty'],
    ['icon' => 'sand', 'title' => 'Brúsenie povrchov', 'desc' => 'Odstraňujeme zvetrané vrstvy, nečistoty a pripravujeme drevo na nový začiatok.', 'anchor' => 'brusenie'],
    ['icon' => 'shield', 'title' => 'Ošetrenie a ochrana', 'desc' => 'Vyberieme vhodnú úpravu podľa toho, kde drevo žije a čo musí vydržať.', 'anchor' => 'ochrana'],
    ['icon' => 'window', 'title' => 'Okná a dvere', 'desc' => 'Vraciame dreveným rámom, krídlam a detailom čistý vzhľad a dlhšiu životnosť.', 'anchor' => 'ochrana'],
    ['icon' => 'layers', 'title' => 'Terasy a zábradlia', 'desc' => 'Obnovujeme plochy vystavené slnku, dažďu a každodennej záťaži.', 'anchor' => 'chaty'],
    ['icon' => 'custom', 'title' => 'Riešenia na mieru', 'desc' => 'Každý povrch je iný. Navrhneme postup podľa vášho dreva, predstavy a rozpočtu.', 'anchor' => 'ochrana'],
];

$details = [
    [
        'id' => 'chaty',
        'eyebrow' => '01 / Obnova stavieb',
        'title' => 'Drevená chata, ktorá opäť <em>vynikne.</em>',
        'text' => 'Čistíme a obnovujeme drevené chaty, zruby, fasády, obklady, štíty aj terasy. Najskôr posúdime stav povrchu a potom zvolíme postup, ktorý zachová kresbu aj prirodzený charakter stavby.',
        'image' => 'assets/images/realizacie/chaty/obklad-cela-stavba.jpg',
        'alt' => 'Drevená stavba po renovácii',
        'gallery' => [
            ['src' => 'assets/images/realizacie/Chata/814754130_4710092289220022_5544860182670447562_n.jpg', 'alt' => 'Celkový pohľad na zrenovovanú zrubovú chatu', 'label' => 'Zrubová chata'],
            ['src' => 'assets/images/realizacie/Chata/793899922_26329356466761965_5538160186085151006_n.jpg', 'alt' => 'Detail drevenej fasády a balkóna zrubovej chaty', 'label' => 'Detail fasády'],
            ['src' => 'assets/images/realizacie/Chata/808855148_1498381105433182_7386706436728506203_n.jpg', 'alt' => 'Zrubová chata počas renovácie', 'label' => 'Renovácia v procese'],
        ],
    ],
    [
        'id' => 'brusenie',
        'eyebrow' => '02 / Príprava povrchu',
        'title' => 'Dobrý výsledok začína <em>dobrým základom.</em>',
        'text' => 'Brúsením a čistením odstránime zvetrané, zašednuté alebo nesúdržné vrstvy. Povrch pripravíme tak, aby nová úprava dobre priľnula a drevo zostalo vizuálne čisté.',
        'image' => 'assets/images/proces/zrub-brusenie.jpg',
        'alt' => 'Brúsenie drevenej stavby',
        'gallery' => [
            ['src' => 'assets/images/proces/zrub-brusenie.jpg', 'alt' => 'Brúsenie drevenej stavby', 'label' => 'Brúsenie zrubu'],
            ['src' => 'assets/images/proces/obklad-brusenie-detail.jpg', 'alt' => 'Detail brúseného dreveného obkladu', 'label' => 'Brúsenie obkladu'],
            ['src' => 'assets/images/proces/zabradlie-brusenie.jpg', 'alt' => 'Brúsenie dreveného zábradlia', 'label' => 'Príprava zábradlia'],
        ],
    ],
    [
        'id' => 'ochrana',
        'eyebrow' => '03 / Ošetrenie a ochrana',
        'title' => 'Krása dreva potrebuje <em>čas a ochranu.</em>',
        'text' => 'Po príprave aplikujeme vhodné ošetrenie podľa umiestnenia a namáhania povrchu. Cieľom je prirodzený vzhľad, rovnomerný výsledok a ochrana pred počasím na ďalšie sezóny.',
        'image' => 'assets/images/realizacie/okna/okno-detail-final.jpg',
        'alt' => 'Detail ošetreného dreveného okna',
        'gallery' => [
            ['src' => 'assets/images/realizacie/okna/okno-detail-final.jpg', 'alt' => 'Detail ošetreného dreveného okna', 'label' => 'Drevené okno'],
            ['src' => 'assets/images/realizacie/okna/strese-okno-final.jpg', 'alt' => 'Ošetrené strešné okno', 'label' => 'Strešné okno'],
            ['src' => 'assets/images/realizacie/chaty/zabradlie-final.jpg', 'alt' => 'Ošetrené drevené zábradlie', 'label' => 'Zábradlie'],
        ],
    ],
];
?>

<section class="slth-page-hero slth-page-hero--video" style="--page-image: url('assets/images/realizacie/chaty/obklad-cela-stavba.jpg');">
    <video class="slth-page-hero__video" autoplay muted loop playsinline preload="metadata" poster="assets/images/realizacie/chaty/obklad-cela-stavba.jpg" aria-hidden="true">
        <source src="assets/media/proces-renovacie.mp4" type="video/mp4">
    </video>
    <div class="container slth-page-hero__inner">
        <h1>Starostlivosť, ktorú drevo <em>cíti.</em></h1>
        <p>Od prvej obhliadky po poslednú vrstvu ochrany. Každý krok prispôsobujeme konkrétnemu drevu a jeho príbehu.</p>
        <div class="slth-breadcrumb"><a href="index.php">GARCIA</a><span>/</span><a href="sluzby.php" aria-current="page">služby</a></div>
    </div>
</section>

<section class="slth-services-section">
    <div class="container">
        <div class="slth-section-header slth-section-header--center">
            <p class="eyebrow">Čo pre vás urobíme</p>
            <h2>Renovácia dreva <em>na mieru.</em></h2>
            <p>Vyberieme vhodný postup podľa typu dreva, jeho stavu, umiestnenia a vašej predstavy o výsledku.</p>
        </div>
        <div class="slth-services-grid">
            <?php foreach ($services as $service): ?>
                <article class="slth-service-card reveal">
                    <div class="slth-service-card__icon"><?= service_icon($service['icon']) ?></div>
                    <h3><?= e($service['title']) ?></h3>
                    <p><?= e($service['desc']) ?></p>
                    <a href="#<?= e($service['anchor']) ?>" class="slth-service-card__link">Preskúmať službu</a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php foreach ($details as $index => $detail): ?>
    <section class="slth-service-detail<?= $index % 2 ? ' slth-service-detail--reverse' : '' ?>" id="<?= e($detail['id']) ?>">
        <div class="container slth-service-detail__grid">
            <div class="slth-service-detail__media slth-service-slider reveal" data-slider>
                <div class="slth-slider-track">
                    <?php foreach ($detail['gallery'] as $slideIndex => $slide): ?>
                        <figure class="slth-slider-slide<?= $slideIndex === 0 ? ' is-active' : '' ?>" data-slide>
                            <img src="<?= e($slide['src']) ?>" alt="<?= e($slide['alt']) ?>" loading="<?= $slideIndex === 0 ? 'eager' : 'lazy' ?>">
                            <figcaption><?= e($slide['label']) ?></figcaption>
                        </figure>
                    <?php endforeach; ?>
                </div>
                <span class="slth-service-detail__number"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
                <div class="slth-slider-controls">
                    <button type="button" class="slth-slider-arrow" data-slider-prev aria-label="Predchádzajúca fotografia"></button>
                    <div class="slth-slider-counter"><strong data-slider-current>01</strong><span>/ <?= str_pad((string) count($detail['gallery']), 2, '0', STR_PAD_LEFT) ?></span></div>
                    <div class="slth-slider-dots">
                        <?php foreach ($detail['gallery'] as $slideIndex => $slide): ?>
                            <button type="button" class="slth-slider-dot<?= $slideIndex === 0 ? ' is-active' : '' ?>" data-slider-dot="<?= $slideIndex ?>" aria-label="Zobraziť fotografiu <?= $slideIndex + 1 ?>"></button>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="slth-slider-arrow" data-slider-next aria-label="Nasledujúca fotografia"></button>
                </div>
            </div>
            <div class="slth-service-detail__content reveal">
                <p class="eyebrow"><?= e($detail['eyebrow']) ?></p>
                <h2><?= $detail['title'] ?></h2>
                <p><?= e($detail['text']) ?></p>
                <a href="kontakt.php" class="btn btn--outline-dark">Nezáväzná konzultácia</a>
            </div>
        </div>
    </section>
<?php endforeach; ?>

<section class="slth-process">
    <div class="container">
        <div class="slth-section-header slth-section-header--center">
            <p class="eyebrow">Jednoduchá spolupráca</p>
            <h2>Od nápadu po <em>výsledok.</em></h2>
            <p>Jasný postup bez zbytočných prekvapení a s odporúčaním, ako sa o drevo starať aj neskôr.</p>
        </div>
        <div class="slth-process-grid">
            <?php foreach (['Obhliadka a konzultácia', 'Príprava povrchu', 'Ošetrenie a ochrana', 'Odovzdanie a odporúčania'] as $index => $step): ?>
                <div class="slth-process-step reveal"><div class="slth-process-step__num"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></div><h3><?= e($step) ?></h3><p><?= e(['Pozrieme sa na stav dreva a dohodneme si cieľ.', 'Očistíme, odstránime staré vrstvy a vybrúsime povrch.', 'Aplikujeme vhodný systém podľa umiestnenia a namáhania.', 'Odovzdáme čistý výsledok a odporúčania k ďalšej údržbe.'][$index]) ?></p></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/contact-prompt.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
