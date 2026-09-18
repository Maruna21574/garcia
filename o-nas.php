<?php

$pageTitle = 'O nás — GARCIA';
$activePage = 'o-nas';
$bodyClass = 'inner-page about-page';
$metaDescription = 'GARCIA je lokálna starostlivosť o drevo v Liptovskom Mikuláši a okolí. Renovácie s rešpektom k materiálu.';
require __DIR__ . '/includes/header.php';
?>

<section class="slth-page-hero slth-page-hero--video about-page-hero" style="--page-image: url('assets/images/realizacie/chaty/zrubova-chata-final.jpg');">
    <video class="slth-page-hero__video" autoplay muted loop playsinline preload="metadata" poster="assets/images/realizacie/chaty/zrubova-chata-final.jpg" aria-hidden="true">
        <source src="assets/media/proces-renovacie.mp4" type="video/mp4">
    </video>
    <div class="container slth-page-hero__inner">
        <h1>Drevo nie je len materiál. <em>Je to príbeh.</em></h1>
        <p>Našou prácou mu pomáhame pokračovať — s rešpektom k jeho kresbe, charakteru a času, ktorý v ňom zostal.</p>
        <div class="slth-breadcrumb"><a href="index.php">GARCIA</a><span>/</span><a href="o-nas.php" aria-current="page">o nás</a></div>
    </div>
</section>

<section class="slth-about-section">
    <div class="container slth-about-grid">
        <div class="slth-about-media reveal"><img src="assets/images/realizacie/chaty/zrub-front-detail.jpg" alt="Drevená chata v obklopení prírody" loading="lazy"></div>
        <div class="slth-about-copy reveal">
            <p class="eyebrow">GARCIA / drevo s príbehom</p>
            <h2>Vrátiť drevu krásu je viac než ho <em>len natrieť.</em></h2>
            <p>Každý povrch reaguje inak. Niektorý potrebuje citlivé brúsenie, iný dôkladné očistenie, ďalší novú ochranu pred dažďom a slnkom. Naše rozhodnutia vychádzajú zo stavu dreva, nie z univerzálnej šablóny.</p>
            <p>Pracujeme v Liptovskom Mikuláši a okolí. Na projektoch nám záleží od prvej obhliadky až po posledný detail a odporúčanie k údržbe.</p>
            <a href="kontakt.php" class="btn btn--outline-dark">Porozprávať sa o projekte</a>
        </div>
    </div>
</section>

<section class="slth-services-section about-values-section">
    <div class="container">
        <div class="slth-section-header slth-section-header--center"><p class="eyebrow">Na čom si zakladáme</p><h2>Jednoduché hodnoty. <em>Poctivý výsledok.</em></h2><p>Dobrá renovácia stojí na pozornosti, otvorenej dohode a práci, ktorá rešpektuje materiál.</p></div>
        <div class="slth-services-grid">
            <?php foreach ([['01', 'Rešpekt k materiálu', 'Drevo neprekresľujeme podľa trendu. Hľadáme spôsob, ako ukázať jeho vlastnú krásu.'], ['02', 'Čistá práca', 'Dbáme na prípravu, poriadok na mieste a výsledok, ktorý funguje aj prakticky.'], ['03', 'Otvorená komunikácia', 'Vysvetlíme možnosti, limity aj ďalšiu údržbu bez zbytočných sľubov.'], ['04', 'Lokálny prístup', 'Sme nablízku. Vďaka tomu vieme prísť, pozrieť sa a navrhnúť riešenie na mieru.'], ['05', 'Trpezlivý detail', 'Pri dreve sa ponáhľať neoplatí. Každá vrstva a detail ovplyvňujú výsledok.'], ['06', 'Dlhšia životnosť', 'Cieľom nie je iba pekný deň odovzdania, ale drevo pripravené na ďalšie sezóny.']] as $value): ?>
                <article class="slth-service-card reveal"><div class="slth-service-card__icon"><?= e($value[0]) ?></div><h3><?= e($value[1]) ?></h3><p><?= e($value[2]) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="slth-process about-process-section">
    <div class="container">
        <div class="slth-section-header slth-section-header--center"><p class="eyebrow">Prečo renovovať</p><h2>Staré drevo má často najviac <em>charakteru.</em></h2><p>Renovácia predlžuje životnosť, šetrí materiál a zachováva atmosféru, ktorú nová povrchová úprava často iba napodobňuje.</p></div>
        <div class="slth-process-grid"><div class="slth-process-step reveal"><div class="slth-process-step__num">01</div><h3>Zachováte príbeh</h3><p>Kresba, patina a proporcie zostanú súčasťou stavby.</p></div><div class="slth-process-step reveal"><div class="slth-process-step__num">02</div><h3>Predĺžite život</h3><p>Ošetrené drevo lepšie zvláda slnko, dážď aj zmeny počasia.</p></div><div class="slth-process-step reveal"><div class="slth-process-step__num">03</div><h3>Ušetríte materiál</h3><p>To, čo sa dá obnoviť, nemusí hneď končiť výmenou.</p></div><div class="slth-process-step reveal"><div class="slth-process-step__num">04</div><h3>Vrátite mu krásu</h3><p>Čistý povrch nechá prirodzené drevo opäť vyniknúť.</p></div></div>
    </div>
</section>

<?php require __DIR__ . '/includes/contact-prompt.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
