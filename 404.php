<?php

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/cms.php';
http_response_code(404);
$content = cms_data();
$pageTitle = 'Stránka sa nenašla — ' . $content['site']['name'];
$activePage = '';
$bodyClass = 'inner-page not-found-page';
$metaDescription = 'Hľadaná stránka neexistuje alebo bola presunutá.';
$seoKeywords = '';
$noIndex = true;
$useBaseHref = true;
require __DIR__ . '/includes/header.php';
?>

<section class="not-found">
    <div class="container not-found__inner">
        <p class="eyebrow">Chyba 404</p>
        <h1>Táto stránka <em>sa nenašla.</em></h1>
        <p>Adresa možno obsahuje preklep alebo stránka už neexistuje. Pokračujte na niektorú z hlavných častí webu.</p>
        <div class="not-found__actions">
            <a href="/" class="btn btn--gold">Späť na úvod</a>
            <a href="/realizacie" class="btn btn--outline">Pozrieť realizácie</a>
            <a href="/kontakt" class="btn btn--outline">Kontakt</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
