<?php

require_once __DIR__ . '/includes/cms.php';
$content = cms_data();
$legal = $content['legal'];
$pageTitle = 'Ochrana súkromia — GARCIA';
$activePage = '';
$bodyClass = 'inner-page legal-page';
$metaDescription = 'Informácie o ochrane osobných údajov a používaní cookies na webovej stránke GARCIA.';
$seoKeywords = 'ochrana súkromia, GDPR, cookies, GARCIA';
require __DIR__ . '/includes/header.php';
?>
<section class="slth-page-hero" style="--page-image: url('<?= e($legal['hero']['image']) ?>');">
    <div class="container slth-page-hero__inner">
        <p class="eyebrow"><?= e($legal['hero']['eyebrow']) ?></p>
        <h1><?= $legal['hero']['title'] ?></h1>
        <p><?= e($legal['hero']['description']) ?></p>
        <div class="slth-breadcrumb"><a href="index.php">Domov</a><span>/</span><span>Ochrana súkromia</span></div>
    </div>
</section>

<section class="legal-content section section--cream">
    <div class="container legal-content__inner">
        <p class="legal-updated"><?= e($legal['updated']) ?></p>

        <h2><?= e($legal['operator']['heading']) ?></h2>
        <p><?= e($legal['operator']['text']) ?></p>
        <div class="legal-facts">
            <div><span><?= e($legal['operator']['name_label']) ?></span><strong><?= e($content['site']['name'] . ' – ' . $content['site']['tagline']) ?></strong></div>
            <div><span><?= e($legal['operator']['scope_label']) ?></span><strong><?= e($content['site']['location']) ?></strong></div>
            <div><span><?= e($legal['operator']['contact_label']) ?></span><strong><a href="mailto:<?= e($content['site']['email']) ?>"><?= e($content['site']['email']) ?></a> · <a href="tel:<?= e(preg_replace('/\s+/', '', $content['site']['phone'])) ?>"><?= e($content['site']['phone']) ?></a></strong></div>
            <div><span><?= e($legal['operator']['id_label']) ?></span><strong><?= e($legal['operator']['identification']) ?></strong></div>
        </div>

        <?php foreach ($legal['sections'] as $sectionIndex => $section): ?>
            <h2<?= $sectionIndex === 5 ? ' id="cookies"' : '' ?>><?= e($section['heading']) ?></h2>
            <p><?= e($section['body']) ?></p>
            <?php if ($sectionIndex === 0): ?><ul class="legal-list"><li>meno a priezvisko,</li><li>e-mail a prípadne telefónne číslo,</li><li>typ projektu a obsah správy,</li><li>fotografie projektu, ak ich dobrovoľne priložíte k dopytu.</li></ul><?php endif; ?>
            <?php if ($sectionIndex === 4): ?><p>Požiadavku môžete poslať cez <a href="kontakt.php">kontaktný formulár</a>. Aby sme chránili vaše údaje, môžeme si primerane overiť vašu totožnosť.</p><?php endif; ?>
            <?php if ($sectionIndex === 5): ?>
        <div class="legal-cookie-table" role="table" aria-label="Zoznam používaných cookies a úložísk">
            <div class="legal-cookie-row legal-cookie-row--head" role="row"><strong role="columnheader">Názov</strong><strong role="columnheader">Typ</strong><strong role="columnheader">Trvanie</strong><strong role="columnheader">Účel</strong></div>
            <div class="legal-cookie-row" role="row"><span role="cell">garcia_cookie_consent_v1</span><span role="cell">Lokálne úložisko</span><span role="cell">12 mesiacov</span><span role="cell">Uloženie voľby cookies</span></div>
            <div class="legal-cookie-row" role="row"><span role="cell">—</span><span role="cell">Analytické cookies</span><span role="cell">Nepoužívame</span><span role="cell">Bez služby tretej strany</span></div>
            <div class="legal-cookie-row" role="row"><span role="cell">—</span><span role="cell">Marketingové cookies</span><span role="cell">Nepoužívame</span><span role="cell">Bez reklamného profilovania</span></div>
        </div>
        <button class="button button--dark legal-cookie-button" type="button" data-cookie-open>Otvoriť nastavenia cookies</button>
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="legal-note"><strong><?= e($legal['note_heading']) ?></strong><span><?= e($legal['note_text']) ?></span></div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
