<?php

$pageTitle = 'GARCIA — renovácie dreva v Liptovskom Mikuláši';
$activePage = 'domov';
$bodyClass = 'slth-layout home-page';
$metaDescription = 'GARCIA renovuje, brúsi a chráni drevené chaty, stavby, okná a dvere v Liptovskom Mikuláši a okolí.';
require __DIR__ . '/includes/header.php';

$services = [
    ['icon' => 'house', 'title' => 'Obnova chát a drevených stavieb', 'desc' => 'Oživujeme fasády, zruby, štíty a drevené prvky tak, aby ich charakter zostal zachovaný.', 'anchor' => 'chaty'],
    ['icon' => 'sand', 'title' => 'Brúsenie drevených povrchov', 'desc' => 'Odstránime zvetrané vrstvy, nečistoty a pripravíme drevo na nový začiatok.', 'anchor' => 'brusenie'],
    ['icon' => 'shield', 'title' => 'Ošetrenie a ochrana dreva', 'desc' => 'Vyberieme vhodnú úpravu podľa toho, kde drevo žije a čo musí vydržať.', 'anchor' => 'ochrana'],
    ['icon' => 'window', 'title' => 'Renovácia okien a dverí', 'desc' => 'Vraciame dreveným rámom, krídlam a detailom čistý vzhľad a dlhšiu životnosť.', 'anchor' => 'ochrana'],
    ['icon' => 'layers', 'title' => 'Terasy a zábradlia', 'desc' => 'Obnovujeme plochy, ktoré dostávajú najviac slnka, dažďa a každodennej záťaže.', 'anchor' => 'chaty'],
    ['icon' => 'custom', 'title' => 'Individuálne riešenia', 'desc' => 'Každý povrch je iný. Navrhneme postup podľa vášho dreva, predstavy a rozpočtu.', 'anchor' => 'ochrana'],
];

$whyItems = [
    ['symbol' => '⌖', 'title' => 'Rešpekt k charakteru dreva', 'desc' => 'Neprekresľujeme drevo podľa šablóny. Hľadáme spôsob, ako ukázať jeho vlastnú krásu.'],
    ['symbol' => '◌', 'title' => 'Dôkladná príprava', 'desc' => 'Kvalitná ochrana stojí na čistom a rovnomernom základe.'],
    ['symbol' => '✦', 'title' => 'Overené riešenia', 'desc' => 'Volíme vhodný systém podľa umiestnenia, počasia a namáhania povrchu.'],
    ['symbol' => '⌁', 'title' => 'Čistá remeselná práca', 'desc' => 'Dbáme na detaily, okolie aj výsledok, ktorý funguje prakticky.'],
    ['symbol' => 'G', 'title' => 'Lokálny prístup', 'desc' => 'Pôsobíme v Liptovskom Mikuláši a okolí. Vieme prísť, pozrieť sa a poradiť.'],
    ['symbol' => '✓', 'title' => 'Férová komunikácia', 'desc' => 'Jasne vysvetlíme možnosti, postup aj ďalšiu údržbu bez zbytočných sľubov.'],
];

$processSteps = [
    ['title' => 'Obhliadka a konzultácia', 'desc' => 'Pozrieme sa na stav dreva, vypočujeme si predstavu a navrhneme ďalší postup.'],
    ['title' => 'Príprava povrchu', 'desc' => 'Očistenie, odstránenie starých vrstiev a brúsenie podľa konkrétneho dreva.'],
    ['title' => 'Ošetrenie a ochrana', 'desc' => 'Aplikujeme vhodný systém, ktorý drevu vráti vzhľad aj potrebnú ochranu.'],
    ['title' => 'Odovzdanie a odporúčania', 'desc' => 'Čistý výsledok, informácie k údržbe a pokoj na ďalšie sezóny.'],
];

$tickerItems = ['RENOVÁCIA DREVA', 'BRÚSENIE POVRCHOV', 'OCHRANA DREVA', 'CHATY A ZRUBY', 'TERASY A OKNÁ'];

$whySlides = [
    ['src' => 'assets/images/realizacie/chaty/terasa-zabradlie-final.jpg', 'alt' => 'Zrenovované drevené zábradlie a terasa', 'label' => 'Terasa a zábradlie'],
    ['src' => 'assets/images/realizacie/chaty/zrub-front-detail.jpg', 'alt' => 'Detail zrubovej stavby po renovácii', 'label' => 'Zrubová stavba'],
    ['src' => 'assets/images/realizacie/chaty/obklad-cela-stavba.jpg', 'alt' => 'Drevený obklad celej stavby', 'label' => 'Obnova fasády'],
    ['src' => 'assets/images/realizacie/okna/okno-detail-final.jpg', 'alt' => 'Detail ošetreného dreveného okna', 'label' => 'Drevené okno'],
];

$beforeAfter = [
    ['before' => 'assets/images/proces/chalupa-pred-obnovou.jpg', 'after' => 'assets/images/realizacie/chaty/zrubova-chata-final.jpg', 'title' => 'Zrubová chata', 'desc' => 'Zo zvetraného povrchu k chate, ktorá opäť pôsobí prirodzene a upravene.'],
    ['before' => 'assets/images/proces/zabradlie-brusenie.jpg', 'after' => 'assets/images/realizacie/zabradlia/807888000_2175760010030185_5255659699515468658_n.jpg', 'title' => 'Drevené zábradlie', 'desc' => 'Detailná obnova schodov a zábradlia zvýrazní kresbu aj charakter dreva.'],
];

$trustPoints = [
    ['title' => 'Jasná dohoda', 'text' => 'Vopred si povieme, čo drevo potrebuje, aký bude postup a čo môžete očakávať.'],
    ['title' => 'Čistý výsledok', 'text' => 'Záleží nám na príprave, detailoch aj na tom, ako po práci odovzdáme miesto.'],
    ['title' => 'Starostlivosť ďalej', 'text' => 'Poradíme, ako ošetrený povrch udržať v dobrej kondícii aj počas ďalších sezón.'],
];

$reviews = [
    ['quote' => 'Od prvej obhliadky bola dohoda jasná a výsledok predčil naše očakávania. Chata opäť pôsobí ako nová, pritom si zachovala svoj charakter.', 'name' => 'Jana K.', 'place' => 'Liptovský Mikuláš · obnova chaty'],
    ['quote' => 'Oceňujeme čistú prácu, komunikáciu a to, že sme presne vedeli, čo sa bude diať. Drevený obklad dostal úplne nový život.', 'name' => 'Peter M.', 'place' => 'Demänovská Dolina · obnova obkladu'],
    ['quote' => 'Najviac nám pomohlo odporúčanie správneho postupu a následnej údržby. Terasa vyzerá výborne a vieme, ako sa o ňu ďalej starať.', 'name' => 'Lucia R.', 'place' => 'Liptovský Hrádok · terasa'],
];
?>

<section class="slth-hero" style="--hero-image: url('assets/images/realizacie/chaty/zrub-front-detail.jpg');">
    <video class="slth-hero__video" autoplay muted loop playsinline preload="metadata" poster="assets/images/realizacie/chaty/zrub-front-detail.jpg" aria-hidden="true">
        <source src="assets/media/proces-renovacie.mp4" type="video/mp4">
    </video>
    <div class="slth-hero__overlay"></div>
    <div class="container slth-hero__inner">
        <div class="slth-hero__center">
            <h1>Vrátime drevu <em>jeho charakter.</em></h1>
            <p class="slth-hero__subtitle">Renovujeme drevené chaty, stavby, terasy, okná a dvere s dôrazom na prirodzenú krásu, detail a dlhú životnosť.</p>
            <div class="slth-hero__actions"><a href="kontakt.php" class="btn btn--gold btn--lg">Vyžiadať cenovú ponuku</a><a href="realizacie.php" class="btn btn--outline btn--lg">Pozrieť realizácie</a></div>
        </div>
    </div>
    <div class="slth-hero__scroll">Objavte GARCIA</div>
</section>

<div class="craft-ticker" aria-label="Služby GARCIA">
    <div class="craft-ticker__track">
        <?php for ($tickerRepeat = 0; $tickerRepeat < 6; $tickerRepeat++): ?>
            <div class="craft-ticker__group"<?= $tickerRepeat > 0 ? ' aria-hidden="true"' : '' ?>>
                <?php foreach ($tickerItems as $tickerItem): ?><span><?= e($tickerItem) ?></span><i aria-hidden="true">✓</i><?php endforeach; ?>
            </div>
        <?php endfor; ?>
    </div>
</div>

<section class="slth-services-section" id="sluzby">
    <div class="container">
        <div class="slth-section-header slth-section-header--center"><p class="eyebrow">Čo pre vás obnovíme</p><h2>Naše služby</h2><p>Od prvého očistenia až po poslednú vrstvu ochrany — kompletná starostlivosť o drevo pre domy, chaty aj stavby.</p></div>
        <div class="slth-services-grid">
            <?php foreach ($services as $service): ?>
            <article class="slth-service-card reveal"><div class="slth-service-card__icon"><?= service_icon($service['icon']) ?></div><h3><?= e($service['title']) ?></h3><p><?= e($service['desc']) ?></p><a href="sluzby.php#<?= e($service['anchor']) ?>" class="slth-service-card__link">Viac informácií</a></article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="before-after-section">
    <div class="container">
        <div class="before-after-intro">
            <div class="slth-section-header"><p class="eyebrow">Predtým / potom</p><h2>Rozdiel, ktorý <em>vidno.</em></h2><p>Výber fotografií z obnovy drevených povrchov. Každý projekt má vlastný stav, materiál aj postup.</p></div>
            <a href="realizacie.php" class="btn btn--outline-dark">Pozrieť všetky realizácie</a>
        </div>
        <div class="before-after-grid">
            <?php foreach ($beforeAfter as $item): ?>
                <article class="before-after-card">
                    <div class="before-after-card__compare" data-before-after role="group" aria-label="<?= e($item['title']) ?> — posuvné porovnanie pred a po renovácii">
                        <figure class="before-after-card__panel before-after-card__panel--before" style="--comparison-image: url('<?= e($item['before']) ?>')">
                            <img src="<?= e($item['before']) ?>" alt="<?= e($item['title']) ?> pred obnovou" loading="lazy">
                        </figure>
                        <figure class="before-after-card__panel before-after-card__panel--after" style="--comparison-image: url('<?= e($item['after']) ?>')">
                            <img src="<?= e($item['after']) ?>" alt="<?= e($item['title']) ?> po renovácii" loading="lazy">
                        </figure>
                        <div class="before-after-card__labels" aria-hidden="true"><span>Predtým</span><span>Potom</span></div>
                        <input class="before-after-card__range" type="range" min="0" max="100" value="50" aria-label="Posunúť porovnanie pred a po pre <?= e($item['title']) ?>">
                        <div class="before-after-card__divider" aria-hidden="true"><span></span></div>
                    </div>
                    <div class="before-after-card__copy"><h3><?= e($item['title']) ?></h3><p><?= e($item['desc']) ?></p></div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="slth-why-section"><div class="container slth-why-grid"><div class="slth-why-media slth-why-slider reveal" data-slider><div class="slth-slider-track"><?php foreach ($whySlides as $index => $slide): ?><figure class="slth-slider-slide<?= $index === 0 ? ' is-active' : '' ?>" data-slide><img src="<?= e($slide['src']) ?>" alt="<?= e($slide['alt']) ?>" loading="<?= $index === 0 ? 'eager' : 'lazy' ?>"><figcaption><?= e($slide['label']) ?></figcaption></figure><?php endforeach; ?></div><div class="slth-why-badge"><strong>G</strong><span>drevo s príbehom</span></div><div class="slth-slider-controls"><button type="button" class="slth-slider-arrow" data-slider-prev aria-label="Predchádzajúca fotografia">←</button><div class="slth-slider-counter"><strong data-slider-current>01</strong><span>/ <?= str_pad((string) count($whySlides), 2, '0', STR_PAD_LEFT) ?></span></div><div class="slth-slider-dots"><?php foreach ($whySlides as $index => $slide): ?><button type="button" class="slth-slider-dot<?= $index === 0 ? ' is-active' : '' ?>" data-slider-dot="<?= $index ?>" aria-label="Zobraziť fotografiu <?= $index + 1 ?>"></button><?php endforeach; ?></div><button type="button" class="slth-slider-arrow" data-slider-next aria-label="Nasledujúca fotografia">→</button></div></div><div class="slth-why-content reveal"><p class="eyebrow">Prečo si vybrať GARCIA</p><h2>Drevo oživíme. Jeho charakter <em>zachováme.</em></h2><p>Spájame dôkladnú prípravu, správne ošetrenie a čistú remeselnú prácu — od prvého stretnutia až po posledný detail.</p><div class="slth-why-list"><?php foreach ($whyItems as $item): ?><div class="slth-why-item"><div class="slth-why-item__icon"><?= e($item['symbol']) ?></div><div><h3><?= e($item['title']) ?></h3><p><?= e($item['desc']) ?></p></div></div><?php endforeach; ?></div></div></div></section>

<section class="trust-section">
    <div class="container">
        <div class="slth-section-header slth-section-header--center"><p class="eyebrow">Na čom si zakladáme</p><h2>Dobrá práca je viac než <em>pekný povrch.</em></h2><p>Chceme, aby po každej realizácii zostal nielen dobrý výsledok, ale aj pocit, že všetko prebehlo férovo a s pozornosťou.</p></div>
        <div class="trust-grid">
            <?php foreach ($trustPoints as $index => $point): ?>
                <article class="trust-card reveal"><span>0<?= $index + 1 ?></span><h3><?= e($point['title']) ?></h3><p><?= e($point['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="reviews-section">
    <div class="container">
        <div class="slth-section-header slth-section-header--center"><p class="eyebrow">Referencie</p><h2>Spolupráca, na ktorú sa <em>nezabúda.</em></h2><p>Ukážkové texty referencií sú pripravené na nahradenie skutočnými hodnoteniami po realizáciách.</p></div>
        <div class="reviews-grid">
            <?php foreach ($reviews as $review): ?>
                <article class="review-card">
                    <div class="review-card__stars" aria-label="5 z 5 hviezdičiek">★★★★★</div>
                    <blockquote>„<?= e($review['quote']) ?>“</blockquote>
                    <footer><span class="review-card__avatar"><?= e($review['name'][0]) ?></span><span><strong><?= e($review['name']) ?></strong><small><?= e($review['place']) ?></small></span></footer>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="slth-process">
    <div class="container">
        <div class="slth-section-header slth-section-header--center"><p class="eyebrow">Ako prebieha spolupráca</p><h2>Proces renovácie</h2><p>Jasný postup od prvého kontaktu až po drevo pripravené na ďalšie roky.</p></div>
        <div class="slth-process-grid"><?php foreach ($processSteps as $i => $step): ?><div class="slth-process-step reveal"><div class="slth-process-step__num"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div><h3><?= e($step['title']) ?></h3><p><?= e($step['desc']) ?></p></div><?php endforeach; ?></div>
        <div class="slth-process__cta"><div><span>Ďalší krok</span><strong>Máte drevo, ktoré potrebuje nový začiatok?</strong></div><a href="kontakt.php" class="btn btn--gold">Nezáväzná konzultácia</a></div>
    </div>
</section>

<section class="slth-gallery-section" id="galeria"><div class="container"><div class="slth-gallery-intro"><div class="slth-section-header"><p class="eyebrow">Naša práca</p><h2>Galéria realizácií</h2><p>Výber z obnovy chát, drevených stavieb, terás, okien a detailov.</p></div><a href="realizacie.php" class="btn btn--gold">Zobraziť celú galériu</a></div><div class="slth-gallery-grid"><?php $previewImages = [['src' => 'assets/images/realizacie/Chata/814754130_4710092289220022_5544860182670447562_n.jpg', 'label' => 'Zrubová chata'], ['src' => 'assets/images/realizacie/chaty/vstupna-terasa-final.jpg', 'label' => 'Vstupná terasa'], ['src' => 'assets/images/realizacie/okna/strese-okno-final.jpg', 'label' => 'Renovácia okna'], ['src' => 'assets/images/proces/obklad-brusenie-detail.jpg', 'label' => 'Brúsenie povrchu']]; foreach ($previewImages as $image): ?><a href="realizacie.php" class="slth-gallery-item reveal"><img src="<?= e($image['src']) ?>" alt="<?= e($image['label']) ?>" loading="lazy"><span><?= e($image['label']) ?></span></a><?php endforeach; ?></div></div></section>

<section class="slth-cta-section" style="--cta-image: url('assets/images/realizacie/chaty/zrub-front-detail.jpg');"><div class="slth-cta-section__overlay"></div><div class="container slth-cta-section__inner"><h2>Chcete, aby vaše drevo opäť vyniklo?</h2><p>Napíšte nám a pripravíme vám nezáväzné odporúčanie podľa vášho projektu.</p><div class="slth-cta-section__actions"><a href="kontakt.php" class="btn btn--gold btn--lg">Kontaktovať GARCIA</a></div></div></section>

<?php require __DIR__ . '/includes/footer.php'; ?>
