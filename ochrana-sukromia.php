<?php

$pageTitle = 'Ochrana súkromia — GARCIA';
$activePage = '';
$bodyClass = 'inner-page legal-page';
$metaDescription = 'Informácie o ochrane osobných údajov a používaní cookies na webovej stránke GARCIA.';
require __DIR__ . '/includes/header.php';
?>
<section class="slth-page-hero" style="--page-image: url('assets/images/realizacie/chaty/obklad-roh-detail.jpg');">
    <div class="container slth-page-hero__inner">
        <p class="eyebrow">GARCIA / informácie</p>
        <h1>Ochrana <em>súkromia.</em></h1>
        <p>Transparentne vysvetľujeme, aké údaje spracúvame, prečo ich potrebujeme a aké máte práva.</p>
        <div class="slth-breadcrumb"><a href="index.php">Domov</a><span>/</span><span>Ochrana súkromia</span></div>
    </div>
</section>

<section class="legal-content section section--cream">
    <div class="container legal-content__inner">
        <p class="legal-updated">Platné od 18. 9. 2026</p>

        <h2>1. Prevádzkovateľ</h2>
        <p>Prevádzkovateľom tejto webovej stránky je GARCIA – povrchová úprava a renovácia dreva, pôsobiaca v lokalite Liptovský Mikuláš a okolie.</p>
        <div class="legal-facts">
            <div><span>Názov</span><strong>GARCIA – povrchová úprava a renovácia dreva</strong></div>
            <div><span>Pôsobnosť</span><strong>Liptovský Mikuláš a okolie</strong></div>
            <div><span>Kontakt</span><strong><a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a> · <a href="tel:+421905938699"><?= e(CONTACT_PHONE) ?></a></strong></div>
            <div><span>Identifikačné údaje</span><strong>Doplniť IČO a adresu pred zverejnením webu</strong></div>
        </div>

        <h2>2. Aké údaje spracúvame</h2>
        <p>Pri odoslaní kontaktného formulára spracúvame iba údaje, ktoré nám sami poskytnete:</p>
        <ul class="legal-list">
            <li>meno a priezvisko,</li>
            <li>e-mail a prípadne telefónne číslo,</li>
            <li>typ projektu a obsah správy,</li>
            <li>fotografie projektu, ak ich dobrovoľne priložíte k dopytu.</li>
        </ul>
        <p>Údaje nepoužívame na automatizované rozhodovanie ani na profilovanie. Nepredávame ich a neposkytujeme ich na reklamné účely.</p>

        <h2>3. Účel a právny základ spracúvania</h2>
        <p>Údaje používame na odpoveď na váš dopyt, prípravu konzultácie, obhliadky alebo cenovej ponuky a na dohodu ďalšieho postupu. Právnym základom je vykonanie opatrení pred uzatvorením zmluvy podľa čl. 6 ods. 1 písm. b) GDPR. Ak nám pošlete doplňujúce informácie alebo fotografiu, spracúvame ich iba v rozsahu potrebnom na vybavenie konkrétneho dopytu.</p>

        <h2>4. Ako dlho údaje uchovávame</h2>
        <p>Údaje uchovávame po dobu potrebnú na vybavenie dopytu a súvisiacu komunikáciu. Ak z komunikácie nevznikne spolupráca, údaje odstránime najneskôr po 12 mesiacoch, ak ich ďalšie uchovanie nevyžaduje právna povinnosť alebo ochrana našich oprávnených záujmov.</p>

        <h2>5. Komu môžu byť údaje sprístupnené</h2>
        <p>Správa z formulára je odoslaná na kontaktnú e-mailovú adresu prevádzkovateľa. Technické zabezpečenie webu a e-mailových služieb môže zabezpečovať poskytovateľ hostingu alebo e-mailovej infraštruktúry, napríklad Websupport podľa aktuálneho nastavenia služby. Údaje neposúvame do tretích krajín mimo Európskeho hospodárskeho priestoru na marketingové účely.</p>

        <h2>6. Vaše práva</h2>
        <p>Máte právo požiadať o prístup k svojim osobným údajom, ich opravu, vymazanie alebo obmedzenie spracúvania. V prípadoch, keď sa spracúvanie opiera o súhlas, môžete ho kedykoľvek odvolať. Máte tiež právo namietať spracúvanie a podať sťažnosť na Úrade na ochranu osobných údajov Slovenskej republiky.</p>
        <p>Požiadavku môžete poslať cez <a href="kontakt.php">kontaktný formulár</a>. Aby sme chránili vaše údaje, môžeme si primerane overiť vašu totožnosť.</p>

        <h2 id="cookies">7. Cookies a podobné technológie</h2>
        <p>Táto webová stránka momentálne nepoužíva reklamné, analytické ani marketingové cookies tretích strán. Používa iba lokálne technické úložisko na zapamätanie vašej voľby v cookie lište. Vďaka tomu sa lišta po vašom rozhodnutí nemusí zobrazovať pri každej návšteve.</p>
        <div class="legal-cookie-table" role="table" aria-label="Zoznam používaných cookies a úložísk">
            <div class="legal-cookie-row legal-cookie-row--head" role="row"><strong role="columnheader">Názov</strong><strong role="columnheader">Typ</strong><strong role="columnheader">Trvanie</strong><strong role="columnheader">Účel</strong></div>
            <div class="legal-cookie-row" role="row"><span role="cell">garcia_cookie_consent_v1</span><span role="cell">Lokálne úložisko</span><span role="cell">12 mesiacov</span><span role="cell">Uloženie voľby cookies</span></div>
            <div class="legal-cookie-row" role="row"><span role="cell">—</span><span role="cell">Analytické cookies</span><span role="cell">Nepoužívame</span><span role="cell">Bez služby tretej strany</span></div>
            <div class="legal-cookie-row" role="row"><span role="cell">—</span><span role="cell">Marketingové cookies</span><span role="cell">Nepoužívame</span><span role="cell">Bez reklamného profilovania</span></div>
        </div>
        <button class="button button--dark legal-cookie-button" type="button" data-cookie-open>Otvoriť nastavenia cookies</button>

        <h2>8. Bezpečnosť a zmeny</h2>
        <p>Prijímame primerané technické a organizačné opatrenia na ochranu odoslaných údajov. Toto znenie môžeme aktualizovať, ak sa zmení spôsob fungovania webu, používané služby alebo právne požiadavky. Aktuálna verzia je vždy zverejnená na tejto stránke.</p>

        <div class="legal-note"><strong>Dôležité pred spustením webu</strong><span>Doplňte ešte skutočné identifikačné údaje prevádzkovateľa, adresu a IČO. Tento text je pripravený ako webový základ a pred ostrým nasadením ho odporúčame skontrolovať podľa vašej konkrétnej situácie.</span></div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
