# GARCIA — povrchová úprava a renovácia dreva

Kompletný jednoduchý PHP web pripravený na Websupport. Nepotrebuje databázu ani framework.

## Štruktúra

- `index.php` — úvodná stránka
- `sluzby.php` — prehľad služieb, detailné bloky a proces renovácie
- `realizacie.php` — filtrovaná galéria + lightbox
- `realizacia-chata.php` — detail vybranej realizácie
- `o-nas.php` — príbeh a hodnoty značky
- `kontakt.php` — kontaktný formulár odosielaný cez PHP `mail()`
- `ochrana-sukromia.php` — základné informácie o súkromí
- `admin/` — chránená administrácia obsahu a médií
- `includes/cms.php` — predvolený obsah webu a JSON úložisko klientskych zmien
- `assets/images/` — premenované a roztriedené fotografie
- `assets/scss/style.scss` — zdroj štýlov
- `assets/css/style.css` — štýly používané webom

Úvodná stránka aj podstránky používajú jednotnú štruktúru v štýle referenčného webu SLTH: veľký obrazový hero, karty, obsahové bloky, proces a záverečné CTA. Garcia používa vlastné texty, farby a fotografie.

## Nasadenie na Websupport

1. Nahrajte celý obsah projektu do webového priestoru domény.
2. V `includes/config.php` doplňte `CONTACT_EMAIL` adresou, na ktorú chcete prijímať dopyty.
3. Voliteľne doplňte aj `CONTACT_PHONE`.
4. Skontrolujte skutočné identifikačné údaje v `ochrana-sukromia.php`.
5. Otestujte kontaktný formulár priamo na doméne.

Ak server nepovoľuje `mail()`, nastavte na Websupporte odosielanie podľa ich aktuálnej konfigurácie alebo formulár napojte na SMTP službu.

## Administrácia

Po nahratí webu otvorte `https://vasa-domena.sk/admin/`. Pri prvom otvorení si klient vytvorí heslo administrátora. Následne môže upravovať texty, SEO, kontakty, navigáciu, služby, realizácie, referencie, proces, právne texty a cesty ku všetkým obrázkom. Nové fotografie sa nahrávajú cez knižnicu médií do `assets/uploads/`.

Obsah sa ukladá do `storage/content.json`, heslo do `storage/admin.json` a nahrané médiá do `assets/uploads/`. Tieto súbory sú zámerne v `.gitignore`, aby ich ďalší deploy cez `git pull` neprepísal.

## Fotografie

Pôvodné názvy boli nahradené zrozumiteľnými názvami bez diakritiky a rozdelené do priečinkov `brand`, `realizacie/chaty`, `realizacie/okna` a `proces`. Video je v `assets/media/proces-renovacie.mp4`.
