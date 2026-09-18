<?php

declare(strict_types=1);

const CMS_STORAGE_FILE = __DIR__ . '/../storage/content.json';

function cms_defaults(): array
{
    return [
        'site' => [
            'name' => 'GARCIA',
            'tagline' => 'Povrchová úprava a renovácia dreva',
            'location' => 'Liptovský Mikuláš a okolie',
            'email' => 'info@garcia.sk',
            'phone' => '0905 938 699',
            'facebook' => 'https://www.facebook.com/profile.php?id=61592275994218&locale=sk_SK',
            'logo' => 'assets/images/brand/logo-garcia.png',
            'favicon' => 'assets/images/brand/favicon.svg',
            'social_image' => 'assets/images/brand/og-garcia-chata.png',
            'header_cta' => 'Nezáväzná konzultácia',
        ],
        'seo' => [
            'home' => ['title' => 'GARCIA — renovácie dreva v Liptovskom Mikuláši', 'description' => 'GARCIA renovuje, brúsi a chráni drevené chaty, stavby, okná a dvere v Liptovskom Mikuláši a okolí.', 'keywords' => 'renovácia dreva, brúsenie dreva, ošetrenie dreva, ochrana dreva, renovácia chát, drevené stavby, Liptovský Mikuláš'],
            'services' => ['title' => 'Služby — GARCIA', 'description' => 'Renovácie drevených chát a stavieb, brúsenie, príprava povrchu, ošetrenie okien a ochrana dreva.', 'keywords' => 'služby renovácie dreva, brúsenie zrubu, ochrana dreva, Liptov'],
            'gallery' => ['title' => 'Realizácie — GARCIA', 'description' => 'Pozrite si realizácie GARCIA: renovácie chát, drevených fasád, terás, zábradlí, okien a dverí.', 'keywords' => 'realizácie renovácie dreva, galéria, chaty, zruby, terasy'],
            'project' => ['title' => 'Realizácia drevenej chaty — GARCIA', 'description' => 'Príbeh realizácie GARCIA: obnova terasy, zábradlia a drevených prvkov na chate v Liptove.', 'keywords' => 'realizácia chaty, obnova zábradlia, terasa Liptov'],
            'about' => ['title' => 'O nás — GARCIA', 'description' => 'GARCIA je lokálna starostlivosť o drevo v Liptovskom Mikuláši a okolí. Renovácie s rešpektom k materiálu.', 'keywords' => 'o nás, GARCIA, renovácia dreva Liptov'],
            'contact' => ['title' => 'Kontakt — GARCIA', 'description' => 'Kontaktujte GARCIA pre nezáväznú konzultáciu a cenovú ponuku na renováciu dreva.', 'keywords' => 'kontakt renovácia dreva, cenová ponuka, konzultácia'],
        ],
        'navigation' => [
            'domov' => ['label' => 'Domov', 'href' => 'index.php'],
            'sluzby' => ['label' => 'Služby', 'href' => 'sluzby.php'],
            'realizacie' => ['label' => 'Realizácie', 'href' => 'realizacie.php'],
            'o-nas' => ['label' => 'O nás', 'href' => 'o-nas.php'],
            'kontakt' => ['label' => 'Kontakt', 'href' => 'kontakt.php'],
        ],
        'home' => [
            'hero' => [
                'image' => 'assets/images/realizacie/chaty/zrub-front-detail.jpg',
                'video' => 'assets/media/proces-renovacie.mp4',
                'title' => 'Vrátime drevu <em>jeho charakter.</em>',
                'subtitle' => 'Renovujeme drevené chaty, stavby, terasy, okná a dvere s dôrazom na prirodzenú krásu, detail a dlhú životnosť.',
                'primary_label' => 'Vyžiadať cenovú ponuku',
                'primary_url' => 'kontakt.php',
                'secondary_label' => 'Pozrieť realizácie',
                'secondary_url' => 'realizacie.php',
                'scroll_label' => 'Objavte GARCIA',
            ],
            'ticker' => ['RENOVÁCIA DREVA', 'BRÚSENIE POVRCHOV', 'OCHRANA DREVA', 'CHATY A ZRUBY', 'TERASY A OKNÁ'],
            'services_intro' => ['eyebrow' => 'Čo pre vás obnovíme', 'title' => 'Naše služby', 'description' => 'Od prvého očistenia až po poslednú vrstvu ochrany — kompletná starostlivosť o drevo pre domy, chaty aj stavby.'],
            'services' => [
                ['icon' => 'house', 'title' => 'Obnova chát a drevených stavieb', 'desc' => 'Oživujeme fasády, zruby, štíty a drevené prvky tak, aby ich charakter zostal zachovaný.', 'anchor' => 'chaty'],
                ['icon' => 'sand', 'title' => 'Brúsenie drevených povrchov', 'desc' => 'Odstránime zvetrané vrstvy, nečistoty a pripravíme drevo na nový začiatok.', 'anchor' => 'brusenie'],
                ['icon' => 'shield', 'title' => 'Ošetrenie a ochrana dreva', 'desc' => 'Vyberieme vhodnú úpravu podľa toho, kde drevo žije a čo musí vydržať.', 'anchor' => 'ochrana'],
                ['icon' => 'window', 'title' => 'Renovácia okien a dverí', 'desc' => 'Vraciame dreveným rámom, krídlam a detailom čistý vzhľad a dlhšiu životnosť.', 'anchor' => 'ochrana'],
                ['icon' => 'layers', 'title' => 'Terasy a zábradlia', 'desc' => 'Obnovujeme plochy, ktoré dostávajú najviac slnka, dažďa a každodennej záťaže.', 'anchor' => 'chaty'],
                ['icon' => 'custom', 'title' => 'Individuálne riešenia', 'desc' => 'Každý povrch je iný. Navrhneme postup podľa vášho dreva, predstavy a rozpočtu.', 'anchor' => 'ochrana'],
            ],
            'before_after_intro' => ['eyebrow' => 'Predtým / potom', 'title' => 'Rozdiel, ktorý <em>vidno.</em>', 'description' => 'Výber fotografií z obnovy drevených povrchov. Každý projekt má vlastný stav, materiál aj postup.', 'button' => 'Pozrieť všetky realizácie'],
            'before_after' => [
                ['before' => 'assets/images/proces/chalupa-pred-obnovou.jpg', 'after' => 'assets/images/realizacie/chaty/zrubova-chata-final.jpg', 'title' => 'Zrubová chata', 'desc' => 'Zo zvetraného povrchu k chate, ktorá opäť pôsobí prirodzene a upravene.'],
                ['before' => 'assets/images/proces/zabradlie-brusenie.jpg', 'after' => 'assets/images/realizacie/zabradlia/807888000_2175760010030185_5255659699515468658_n.jpg', 'title' => 'Drevené zábradlie', 'desc' => 'Detailná obnova schodov a zábradlia zvýrazní kresbu aj charakter dreva.'],
            ],
            'why_intro' => ['eyebrow' => 'Prečo si vybrať GARCIA', 'title' => 'Drevo oživíme. Jeho charakter <em>zachováme.</em>', 'description' => 'Spájame dôkladnú prípravu, správne ošetrenie a čistú remeselnú prácu — od prvého stretnutia až po posledný detail.'],
            'why_items' => [
                ['symbol' => '⌖', 'title' => 'Rešpekt k charakteru dreva', 'desc' => 'Neprekresľujeme drevo podľa šablóny. Hľadáme spôsob, ako ukázať jeho vlastnú krásu.'],
                ['symbol' => '◌', 'title' => 'Dôkladná príprava', 'desc' => 'Kvalitná ochrana stojí na čistom a rovnomernom základe.'],
                ['symbol' => '✦', 'title' => 'Overené riešenia', 'desc' => 'Volíme vhodný systém podľa umiestnenia, počasia a namáhania povrchu.'],
                ['symbol' => '⌁', 'title' => 'Čistá remeselná práca', 'desc' => 'Dbáme na detaily, okolie aj výsledok, ktorý funguje prakticky.'],
                ['symbol' => 'G', 'title' => 'Lokálny prístup', 'desc' => 'Pôsobíme v Liptovskom Mikuláši a okolí. Vieme prísť, pozrieť sa a poradiť.'],
                ['symbol' => '✓', 'title' => 'Férová komunikácia', 'desc' => 'Jasne vysvetlíme možnosti, postup aj ďalšiu údržbu bez zbytočných sľubov.'],
            ],
            'why_slides' => [
                ['src' => 'assets/images/realizacie/chaty/terasa-zabradlie-final.jpg', 'alt' => 'Zrenovované drevené zábradlie a terasa', 'label' => 'Terasa a zábradlie'],
                ['src' => 'assets/images/realizacie/chaty/zrub-front-detail.jpg', 'alt' => 'Detail zrubovej stavby po renovácii', 'label' => 'Zrubová stavba'],
                ['src' => 'assets/images/realizacie/chaty/obklad-cela-stavba.jpg', 'alt' => 'Drevený obklad celej stavby', 'label' => 'Obnova fasády'],
                ['src' => 'assets/images/realizacie/okna/okno-detail-final.jpg', 'alt' => 'Detail ošetreného dreveného okna', 'label' => 'Drevené okno'],
            ],
            'trust_intro' => ['eyebrow' => 'Na čom si zakladáme', 'title' => 'Dobrá práca je viac než <em>pekný povrch.</em>', 'description' => 'Chceme, aby po každej realizácii zostal nielen dobrý výsledok, ale aj pocit, že všetko prebehlo férovo a s pozornosťou.'],
            'trust_points' => [
                ['title' => 'Jasná dohoda', 'text' => 'Vopred si povieme, čo drevo potrebuje, aký bude postup a čo môžete očakávať.'],
                ['title' => 'Čistý výsledok', 'text' => 'Záleží nám na príprave, detailoch aj na tom, ako po práci odovzdáme miesto.'],
                ['title' => 'Starostlivosť ďalej', 'text' => 'Poradíme, ako ošetrený povrch udržať v dobrej kondícii aj počas ďalších sezón.'],
            ],
            'reviews_intro' => ['eyebrow' => 'Referencie', 'title' => 'Spolupráca, na ktorú sa <em>nezabúda.</em>', 'description' => 'Ukážkové texty referencií sú pripravené na nahradenie skutočnými hodnoteniami po realizáciách.'],
            'reviews' => [
                ['quote' => 'Od prvej obhliadky bola dohoda jasná a výsledok predčil naše očakávania. Chata opäť pôsobí ako nová, pritom si zachovala svoj charakter.', 'name' => 'Jana K.', 'place' => 'Liptovský Mikuláš · obnova chaty'],
                ['quote' => 'Oceňujeme čistú prácu, komunikáciu a to, že sme presne vedeli, čo sa bude diať. Drevený obklad dostal úplne nový život.', 'name' => 'Peter M.', 'place' => 'Demänovská Dolina · obnova obkladu'],
                ['quote' => 'Najviac nám pomohlo odporúčanie správneho postupu a následnej údržby. Terasa vyzerá výborne a vieme, ako sa o ňu ďalej starať.', 'name' => 'Lucia R.', 'place' => 'Liptovský Hrádok · terasa'],
            ],
            'process_intro' => ['eyebrow' => 'Ako prebieha spolupráca', 'title' => 'Proces renovácie', 'description' => 'Jasný postup od prvého kontaktu až po drevo pripravené na ďalšie roky.'],
            'process_steps' => [
                ['title' => 'Obhliadka a konzultácia', 'desc' => 'Pozrieme sa na stav dreva, vypočujeme si predstavu a navrhneme ďalší postup.'],
                ['title' => 'Príprava povrchu', 'desc' => 'Očistenie, odstránenie starých vrstiev a brúsenie podľa konkrétneho dreva.'],
                ['title' => 'Ošetrenie a ochrana', 'desc' => 'Aplikujeme vhodný systém, ktorý drevu vráti vzhľad aj potrebnú ochranu.'],
                ['title' => 'Odovzdanie a odporúčania', 'desc' => 'Čistý výsledok, informácie k údržbe a pokoj na ďalšie sezóny.'],
            ],
            'gallery_intro' => ['eyebrow' => 'Naša práca', 'title' => 'Galéria realizácií', 'description' => 'Výber z obnovy chát, drevených stavieb, terás, okien a detailov.', 'button' => 'Zobraziť celú galériu'],
            'gallery_preview' => [
                ['src' => 'assets/images/realizacie/Chata/814754130_4710092289220022_5544860182670447562_n.jpg', 'label' => 'Zrubová chata'],
                ['src' => 'assets/images/realizacie/chaty/vstupna-terasa-final.jpg', 'label' => 'Vstupná terasa'],
                ['src' => 'assets/images/realizacie/okna/strese-okno-final.jpg', 'label' => 'Renovácia okna'],
                ['src' => 'assets/images/proces/obklad-brusenie-detail.jpg', 'label' => 'Brúsenie povrchu'],
            ],
            'cta' => ['title' => 'Chcete, aby vaše drevo opäť vyniklo?', 'description' => 'Napíšte nám a pripravíme vám nezáväzné odporúčanie podľa vášho projektu.', 'button' => 'Kontaktovať GARCIA', 'image' => 'assets/images/realizacie/chaty/zrub-front-detail.jpg'],
        ],
        'services_page' => [
            'hero' => ['image' => 'assets/images/realizacie/chaty/obklad-cela-stavba.jpg', 'video' => 'assets/media/proces-renovacie.mp4', 'title' => 'Starostlivosť, ktorú drevo <em>cíti.</em>', 'description' => 'Od prvej obhliadky po poslednú vrstvu ochrany. Každý krok prispôsobujeme konkrétnemu drevu a jeho príbehu.'],
            'intro' => ['eyebrow' => 'Čo pre vás urobíme', 'title' => 'Renovácia dreva <em>na mieru.</em>', 'description' => 'Vyberieme vhodný postup podľa typu dreva, jeho stavu, umiestnenia a vašej predstavy o výsledku.'],
            'services' => [
                ['icon' => 'house', 'title' => 'Obnova chát a stavieb', 'desc' => 'Oživujeme fasády, zruby, štíty a drevené prvky tak, aby ich charakter zostal zachovaný.', 'anchor' => 'chaty'],
                ['icon' => 'sand', 'title' => 'Brúsenie povrchov', 'desc' => 'Odstraňujeme zvetrané vrstvy, nečistoty a pripravujeme drevo na nový začiatok.', 'anchor' => 'brusenie'],
                ['icon' => 'shield', 'title' => 'Ošetrenie a ochrana', 'desc' => 'Vyberieme vhodnú úpravu podľa toho, kde drevo žije a čo musí vydržať.', 'anchor' => 'ochrana'],
                ['icon' => 'window', 'title' => 'Okná a dvere', 'desc' => 'Vraciame dreveným rámom, krídlam a detailom čistý vzhľad a dlhšiu životnosť.', 'anchor' => 'ochrana'],
                ['icon' => 'layers', 'title' => 'Terasy a zábradlia', 'desc' => 'Obnovujeme plochy vystavené slnku, dažďu a každodennej záťaži.', 'anchor' => 'chaty'],
                ['icon' => 'custom', 'title' => 'Riešenia na mieru', 'desc' => 'Každý povrch je iný. Navrhneme postup podľa vášho dreva, predstavy a rozpočtu.', 'anchor' => 'ochrana'],
            ],
            'details' => [
                ['id' => 'chaty', 'eyebrow' => '01 / Obnova stavieb', 'title' => 'Drevená chata, ktorá opäť <em>vynikne.</em>', 'text' => 'Čistíme a obnovujeme drevené chaty, zruby, fasády, obklady, štíty aj terasy. Najskôr posúdime stav povrchu a potom zvolíme postup, ktorý zachová kresbu aj prirodzený charakter stavby.', 'image' => 'assets/images/realizacie/chaty/obklad-cela-stavba.jpg', 'alt' => 'Drevená stavba po renovácii', 'gallery' => [
                    ['src' => 'assets/images/realizacie/Chata/814754130_4710092289220022_5544860182670447562_n.jpg', 'alt' => 'Celkový pohľad na zrenovovanú zrubovú chatu', 'label' => 'Zrubová chata'],
                    ['src' => 'assets/images/realizacie/Chata/793899922_26329356466761965_5538160186085151006_n.jpg', 'alt' => 'Detail drevenej fasády a balkóna zrubovej chaty', 'label' => 'Detail fasády'],
                    ['src' => 'assets/images/realizacie/Chata/808855148_1498381105433182_7386706436728506203_n.jpg', 'alt' => 'Zrubová chata počas renovácie', 'label' => 'Renovácia v procese'],
                ]],
                ['id' => 'brusenie', 'eyebrow' => '02 / Príprava povrchu', 'title' => 'Dobrý výsledok začína <em>dobrým základom.</em>', 'text' => 'Brúsením a čistením odstránime zvetrané, zašednuté alebo nesúdržné vrstvy. Povrch pripravíme tak, aby nová úprava dobre priľnula a drevo zostalo vizuálne čisté.', 'image' => 'assets/images/proces/zrub-brusenie.jpg', 'alt' => 'Brúsenie drevenej stavby', 'gallery' => [
                    ['src' => 'assets/images/proces/zrub-brusenie.jpg', 'alt' => 'Brúsenie drevenej stavby', 'label' => 'Brúsenie zrubu'],
                    ['src' => 'assets/images/proces/obklad-brusenie-detail.jpg', 'alt' => 'Detail brúseného dreveného obkladu', 'label' => 'Brúsenie obkladu'],
                    ['src' => 'assets/images/proces/zabradlie-brusenie.jpg', 'alt' => 'Brúsenie dreveného zábradlia', 'label' => 'Príprava zábradlia'],
                ]],
                ['id' => 'ochrana', 'eyebrow' => '03 / Ošetrenie a ochrana', 'title' => 'Krása dreva potrebuje <em>čas a ochranu.</em>', 'text' => 'Po príprave aplikujeme vhodné ošetrenie podľa umiestnenia a namáhania povrchu. Cieľom je prirodzený vzhľad, rovnomerný výsledok a ochrana pred počasím na ďalšie sezóny.', 'image' => 'assets/images/realizacie/okna/okno-detail-final.jpg', 'alt' => 'Detail ošetreného dreveného okna', 'gallery' => [
                    ['src' => 'assets/images/realizacie/okna/okno-detail-final.jpg', 'alt' => 'Detail ošetreného dreveného okna', 'label' => 'Drevené okno'],
                    ['src' => 'assets/images/realizacie/okna/strese-okno-final.jpg', 'alt' => 'Ošetrené strešné okno', 'label' => 'Strešné okno'],
                    ['src' => 'assets/images/realizacie/chaty/zabradlie-final.jpg', 'alt' => 'Ošetrené drevené zábradlie', 'label' => 'Zábradlie'],
                ]],
            ],
            'process' => ['eyebrow' => 'Jednoduchá spolupráca', 'title' => 'Od nápadu po <em>výsledok.</em>', 'description' => 'Jasný postup bez zbytočných prekvapení a s odporúčaním, ako sa o drevo starať aj neskôr.', 'steps' => [
                ['title' => 'Obhliadka a konzultácia', 'desc' => 'Pozrieme sa na stav dreva a dohodneme si cieľ.'],
                ['title' => 'Príprava povrchu', 'desc' => 'Očistíme, odstránime staré vrstvy a vybrúsime povrch.'],
                ['title' => 'Ošetrenie a ochrana', 'desc' => 'Aplikujeme vhodný systém podľa umiestnenia a namáhania.'],
                ['title' => 'Odovzdanie a odporúčania', 'desc' => 'Odovzdáme čistý výsledok a odporúčania k ďalšej údržbe.'],
            ]],
        ],
        'gallery_page' => [
            'hero' => ['image' => 'assets/images/realizacie/chaty/terasa-detail-final.jpg', 'video' => 'assets/media/proces-renovacie.mp4', 'title' => 'Výsledok, ktorý <em>vidno aj cítiť.</em>', 'description' => 'Výber z obnovy drevených chát, stavieb, terás, okien a detailov v našich rukách.'],
            'intro' => ['eyebrow' => 'Galéria GARCIA', 'title' => 'Drevo po našom.', 'description' => 'Každá realizácia je trochu iná. Spája ich príprava, detail a rešpekt k pôvodnému materiálu.'],
            'filters' => ['Všetko', 'Chaty a stavby', 'Okná a dvere', 'V procese'],
            'items' => [
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
            ],
        ],
        'project_page' => ['hero' => ['image' => 'assets/images/realizacie/chaty/terasa-zabradlie-final.jpg', 'title' => 'Keď sa starostlivosť <em>oplatí.</em>', 'description' => 'Obnova terasy, zábradlia a drevených prvkov na chate v Liptove — s cieľom zachovať charakter a vrátiť povrchu život.'], 'about' => ['image' => 'assets/images/realizacie/chaty/terasa-zabradlie-final.jpg', 'eyebrow' => 'O projekte', 'title' => 'Nie všetko staré treba <em>vymeniť.</em>', 'paragraphs' => ['Na drevenej chate sme obnovovali prvky, ktoré boli vystavené slnku, dažďu a rokmi stratili svoju ochrannú vrstvu. Cieľom nebolo prekryť ich charakter, ale vrátiť mu sýtosť a pokoj.', 'Prešli sme jednotlivé časti stavby, pripravili povrch a zvolili ošetrenie podľa jeho namáhania.'], 'facts' => [['label' => 'Rozsah', 'value' => 'Terasa a zábradlie'], ['label' => 'Postup', 'value' => 'Brúsenie + ošetrenie'], ['label' => 'Lokalita', 'value' => 'Liptov a okolie']]], 'gallery' => ['eyebrow' => 'Z priebehu práce', 'title' => 'Detail, ktorý rozhoduje.', 'description' => 'Príprava povrchu je rovnako dôležitá ako finálna vrstva. Práve v detailoch vzniká rozdiel, ktorý vydrží.', 'items' => [['src' => 'assets/images/realizacie/chaty/terasa-detail-final.jpg', 'alt' => 'Detail drevenej terasy po renovácii', 'label' => 'Detail terasy'], ['src' => 'assets/images/realizacie/chaty/vstupna-terasa-final.jpg', 'alt' => 'Vstupná terasa po ošetrení', 'label' => 'Vstupná terasa'], ['src' => 'assets/images/realizacie/chaty/terasa-praca-svetlo.jpg', 'alt' => 'Renovácia terasy počas práce', 'label' => 'Práca na mieste'], ['src' => 'assets/images/realizacie/chaty/zabradlie-detail-final.jpg', 'alt' => 'Detail zábradlia po renovácii', 'label' => 'Obnovená kresba']]], 'process' => ['eyebrow' => 'Náš postup', 'title' => 'Najskôr sme nechali drevo <em>porozprávať.</em>', 'description' => 'Obhliadka, brúsenie, čistenie a vhodné ošetrenie. Výsledok je živý, nie umelý — presne ako drevo má byť.', 'steps' => [['title' => 'Posúdenie stavu', 'desc' => 'Prešli sme jednotlivé časti stavby a očakávania majiteľa.'], ['title' => 'Brúsenie a čistenie', 'desc' => 'Odstránili sme zvetrané a nerovnomerne stmavnuté vrstvy.'], ['title' => 'Nová ochrana', 'desc' => 'Povrchy dostali rovnomernú úpravu pre ďalšie sezóny.'], ['title' => 'Čistý výsledok', 'desc' => 'Kresba dreva zostala viditeľná a stavba opäť pôsobí pokojne.']]]],
        'about_page' => ['hero' => ['image' => 'assets/images/realizacie/chaty/zrubova-chata-final.jpg', 'video' => 'assets/media/proces-renovacie.mp4', 'title' => 'Drevo nie je len materiál. <em>Je to príbeh.</em>', 'description' => 'Našou prácou mu pomáhame pokračovať — s rešpektom k jeho kresbe, charakteru a času, ktorý v ňom zostal.'], 'about' => ['image' => 'assets/images/realizacie/chaty/zrub-front-detail.jpg', 'eyebrow' => 'GARCIA / drevo s príbehom', 'title' => 'Vrátiť drevu krásu je viac než ho <em>len natrieť.</em>', 'paragraphs' => ['Každý povrch reaguje inak. Niektorý potrebuje citlivé brúsenie, iný dôkladné očistenie, ďalší novú ochranu pred dažďom a slnkom. Naše rozhodnutia vychádzajú zo stavu dreva, nie z univerzálnej šablóny.', 'Pracujeme v Liptovskom Mikuláši a okolí. Na projektoch nám záleží od prvej obhliadky až po posledný detail a odporúčanie k údržbe.']], 'values' => ['eyebrow' => 'Na čom si zakladáme', 'title' => 'Jednoduché hodnoty. <em>Poctivý výsledok.</em>', 'description' => 'Dobrá renovácia stojí na pozornosti, otvorenej dohode a práci, ktorá rešpektuje materiál.', 'items' => [['number' => '01', 'title' => 'Rešpekt k materiálu', 'text' => 'Drevo neprekresľujeme podľa trendu. Hľadáme spôsob, ako ukázať jeho vlastnú krásu.'], ['number' => '02', 'title' => 'Čistá práca', 'text' => 'Dbáme na prípravu, poriadok na mieste a výsledok, ktorý funguje aj prakticky.'], ['number' => '03', 'title' => 'Otvorená komunikácia', 'text' => 'Vysvetlíme možnosti, limity aj ďalšiu údržbu bez zbytočných sľubov.'], ['number' => '04', 'title' => 'Lokálny prístup', 'text' => 'Sme nablízku. Vďaka tomu vieme prísť, pozrieť sa a navrhnúť riešenie na mieru.'], ['number' => '05', 'title' => 'Trpezlivý detail', 'text' => 'Pri dreve sa ponáhľať neoplatí. Každá vrstva a detail ovplyvňujú výsledok.'], ['number' => '06', 'title' => 'Dlhšia životnosť', 'text' => 'Cieľom nie je iba pekný deň odovzdania, ale drevo pripravené na ďalšie sezóny.']]], 'process' => ['eyebrow' => 'Prečo renovovať', 'title' => 'Staré drevo má často najviac <em>charakteru.</em>', 'description' => 'Renovácia predlžuje životnosť, šetrí materiál a zachováva atmosféru, ktorú nová povrchová úprava často iba napodobňuje.', 'steps' => [['title' => 'Zachováte príbeh', 'desc' => 'Kresba, patina a proporcie zostanú súčasťou stavby.'], ['title' => 'Predĺžite život', 'desc' => 'Ošetrené drevo lepšie zvláda slnko, dážď aj zmeny počasia.'], ['title' => 'Ušetríte materiál', 'desc' => 'To, čo sa dá obnoviť, nemusí hneď končiť výmenou.'], ['title' => 'Vrátite mu krásu', 'desc' => 'Čistý povrch nechá prirodzené drevo opäť vyniknúť.']]]],
        'contact_page' => ['hero' => ['image' => 'assets/images/realizacie/chaty/zrub-front-detail.jpg', 'video' => 'assets/media/proces-renovacie.mp4', 'title' => 'Napíšte nám o <em>vašom dreve.</em>', 'description' => 'Pošlite nám základné informácie, pár fotografií alebo len predstavu. Ozveme sa a dohodneme si ďalší postup.'], 'intro' => ['eyebrow' => 'Ozvite sa', 'title' => 'Porozprávajme sa o tom, čo vaše drevo potrebuje.', 'description' => 'Najlepšie odporúčanie vznikne vtedy, keď vidíme stav povrchu a poznáme vašu predstavu. Formulár zaberie pár minút.'], 'form' => ['eyebrow' => '01 / nezáväzný dopyt', 'title' => 'Čo potrebujete vyriešiť?', 'description' => 'Čím viac nám napíšete, tým presnejšie sa vieme pripraviť na prvý rozhovor.', 'submit' => 'Odoslať dopyt', 'photo_label' => 'Fotografia', 'photo_help' => 'nepovinné · JPG, PNG alebo WEBP do 8 MB']],
        'legal' => [
            'hero' => ['image' => 'assets/images/realizacie/chaty/obklad-roh-detail.jpg', 'eyebrow' => 'GARCIA / informácie', 'title' => 'Ochrana <em>súkromia.</em>', 'description' => 'Transparentne vysvetľujeme, aké údaje spracúvame, prečo ich potrebujeme a aké máte práva.'],
            'updated' => 'Platné od 18. 9. 2026',
            'operator' => ['heading' => '1. Prevádzkovateľ', 'text' => 'Prevádzkovateľom tejto webovej stránky je GARCIA – povrchová úprava a renovácia dreva, pôsobiaca v lokalite Liptovský Mikuláš a okolie.', 'name_label' => 'Názov', 'scope_label' => 'Pôsobnosť', 'contact_label' => 'Kontakt', 'id_label' => 'Identifikačné údaje', 'identification' => 'Doplniť IČO a adresu pred zverejnením webu'],
            'sections' => [
                ['heading' => '2. Aké údaje spracúvame', 'body' => 'Pri odoslaní kontaktného formulára spracúvame iba údaje, ktoré nám sami poskytnete: meno a priezvisko, e-mail a prípadne telefónne číslo, typ projektu a obsah správy, fotografie projektu, ak ich dobrovoľne priložíte k dopytu. Údaje nepoužívame na automatizované rozhodovanie ani na profilovanie. Nepredávame ich a neposkytujeme ich na reklamné účely.'],
                ['heading' => '3. Účel a právny základ spracúvania', 'body' => 'Údaje používame na odpoveď na váš dopyt, prípravu konzultácie, obhliadky alebo cenovej ponuky a na dohodu ďalšieho postupu. Právnym základom je vykonanie opatrení pred uzatvorením zmluvy podľa čl. 6 ods. 1 písm. b) GDPR.'],
                ['heading' => '4. Ako dlho údaje uchovávame', 'body' => 'Údaje uchovávame po dobu potrebnú na vybavenie dopytu a súvisiacu komunikáciu. Ak z komunikácie nevznikne spolupráca, údaje odstránime najneskôr po 12 mesiacoch, ak ich ďalšie uchovanie nevyžaduje právna povinnosť alebo ochrana našich oprávnených záujmov.'],
                ['heading' => '5. Komu môžu byť údaje sprístupnené', 'body' => 'Správa z formulára je odoslaná na kontaktnú e-mailovú adresu prevádzkovateľa. Technické zabezpečenie webu a e-mailových služieb môže zabezpečovať poskytovateľ hostingu alebo e-mailovej infraštruktúry, napríklad Websupport podľa aktuálneho nastavenia služby.'],
                ['heading' => '6. Vaše práva', 'body' => 'Máte právo požiadať o prístup k svojim osobným údajom, ich opravu, vymazanie alebo obmedzenie spracúvania. Máte tiež právo namietať spracúvanie a podať sťažnosť na Úrade na ochranu osobných údajov Slovenskej republiky. Požiadavku môžete poslať cez kontaktný formulár.'],
                ['heading' => '7. Cookies a podobné technológie', 'body' => 'Táto webová stránka momentálne nepoužíva reklamné, analytické ani marketingové cookies tretích strán. Používa iba lokálne technické úložisko na zapamätanie vašej voľby v cookie lište.'],
                ['heading' => '8. Bezpečnosť a zmeny', 'body' => 'Prijímame primerané technické a organizačné opatrenia na ochranu odoslaných údajov. Toto znenie môžeme aktualizovať, ak sa zmení spôsob fungovania webu, používané služby alebo právne požiadavky.'],
            ],
            'note_heading' => 'Dôležité pred spustením webu',
            'note_text' => 'Doplňte ešte skutočné identifikačné údaje prevádzkovateľa, adresu a IČO. Tento text je pripravený ako webový základ a pred ostrým nasadením ho odporúčame skontrolovať podľa vašej konkrétnej situácie.',
        ],
        'project_gallery' => [['src' => 'assets/images/realizacie/chaty/terasa-detail-final.jpg', 'alt' => 'Detail drevenej terasy po renovácii', 'label' => 'Detail terasy'], ['src' => 'assets/images/realizacie/chaty/vstupna-terasa-final.jpg', 'alt' => 'Vstupná terasa po ošetrení', 'label' => 'Vstupná terasa'], ['src' => 'assets/images/realizacie/chaty/terasa-praca-svetlo.jpg', 'alt' => 'Renovácia terasy počas práce', 'label' => 'Práca na mieste'], ['src' => 'assets/images/realizacie/chaty/zabradlie-detail-final.jpg', 'alt' => 'Detail zábradlia po renovácii', 'label' => 'Obnovená kresba']],
        'footer' => ['description' => 'Dávame drevu nový život.', 'quick_links_title' => 'Rýchle odkazy', 'services_title' => 'Služby', 'contact_title' => 'Kontakt', 'privacy_label' => 'Ochrana súkromia', 'cookies_label' => 'Nastavenia cookies'],
        'contact_prompt' => ['eyebrow' => 'Čo nám pomôže', 'title' => 'Ukážte nám, čo má drevo <em>za sebou.</em>', 'description' => 'Fotografie povedia veľa. Priložte detail povrchu, celkový pohľad, lokalitu a krátku predstavu o tom, čo chcete zachovať alebo zmeniť.', 'eyebrow_action' => 'Stačí pár základných informácií', 'button' => 'Pridať fotografie a dopyt', 'note' => 'Ozveme sa a dohodneme ďalší postup.'],
    ];
}

function cms_merge(array $defaults, array $stored): array
{
    foreach ($stored as $key => $value) {
        if (is_array($value) && isset($defaults[$key]) && is_array($defaults[$key]) && !array_is_list($value)) {
            $defaults[$key] = cms_merge($defaults[$key], $value);
        } else {
            $defaults[$key] = $value;
        }
    }

    return $defaults;
}

function cms_data(): array
{
    static $content;
    if (is_array($content)) return $content;

    $defaults = cms_defaults();
    if (is_file(CMS_STORAGE_FILE)) {
        $stored = json_decode((string) file_get_contents(CMS_STORAGE_FILE), true);
        if (is_array($stored)) $defaults = cms_merge($defaults, $stored);
    }
    $content = $defaults;
    return $content;
}

function cms_save(array $content): bool
{
    $directory = dirname(CMS_STORAGE_FILE);
    if (!is_dir($directory) && !mkdir($directory, 0755, true)) return false;
    $json = json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    if ($json === false) return false;
    return file_put_contents(CMS_STORAGE_FILE, $json . PHP_EOL, LOCK_EX) !== false;
}

function cms_value(array $content, string $path, mixed $fallback = ''): mixed
{
    $value = $content;
    foreach (explode('.', $path) as $segment) {
        if (!is_array($value) || !array_key_exists($segment, $value)) return $fallback;
        $value = $value[$segment];
    }
    return $value;
}
