<?php require_once __DIR__ . '/cms.php'; $cmsContent = cms_data(); $cmsSite = $cmsContent['site']; $cmsFooter = $cmsContent['footer']; ?>
    </main>
    <footer class="site-footer">
        <div class="container footer__grid">
            <div class="footer__brand">
                <a href="index.php" class="logo logo--footer"><img src="<?= e($cmsSite['logo']) ?>" alt="<?= e($cmsSite['name'] . ' — ' . $cmsSite['tagline']) ?>" class="logo__img"></a>
                <p><?= e($cmsSite['name']) ?> — <?= e($cmsSite['tagline']) ?>. <?= e($cmsFooter['description']) ?></p>
                <address><?= e($cmsSite['location']) ?></address>
                <a class="footer-social" href="<?= e($cmsSite['facebook']) ?>" target="_blank" rel="noopener noreferrer" aria-label="GARCIA na Facebooku"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 8h3V4.4c-.5-.1-1.7-.2-3.2-.2-3.2 0-5.4 2-5.4 5.5V13H5v4h3.4v7h4.2v-7h3.5l.6-4h-4.1V10c0-1.2.3-2 1.4-2Z"/></svg><span>Facebook</span></a>
            </div>
            <div class="footer__col">
                <h3><?= e($cmsFooter['quick_links_title']) ?></h3>
                <ul><li><a href="index.php">Domov</a></li><li><a href="sluzby.php">Služby</a></li><li><a href="realizacie.php">Realizácie</a></li><li><a href="o-nas.php">O nás</a></li><li><a href="kontakt.php">Kontakt</a></li></ul>
            </div>
            <div class="footer__col">
                <h3><?= e($cmsFooter['services_title']) ?></h3>
                <ul><li><a href="sluzby.php#chaty">Chaty a drevené stavby</a></li><li><a href="sluzby.php#brusenie">Brúsenie a príprava</a></li><li><a href="sluzby.php#ochrana">Okná a dvere</a></li><li><a href="sluzby.php#ochrana">Ošetrenie a ochrana</a></li></ul>
            </div>
            <div class="footer__col footer__contact">
                <h3><?= e($cmsFooter['contact_title']) ?></h3>
                <ul><li><a href="kontakt.php">Nezáväzná konzultácia</a></li><li><a href="tel:<?= e(preg_replace('/\s+/', '', $cmsSite['phone'])) ?>"><?= e($cmsSite['phone']) ?></a></li><li><a href="mailto:<?= e($cmsSite['email']) ?>"><?= e($cmsSite['email']) ?></a></li><li><?= e($cmsSite['location']) ?></li></ul>
            </div>
        </div>
        <div class="footer__bottom"><div class="container footer__bottom-inner"><p>&copy; <?= date('Y') ?> <?= e($cmsSite['name']) ?>. Všetky práva vyhradené.</p><p><a href="ochrana-sukromia.php"><?= e($cmsFooter['privacy_label']) ?></a> · <button class="footer-cookie-link" type="button" data-cookie-open><?= e($cmsFooter['cookies_label']) ?></button> · <?= e($cmsSite['tagline']) ?></p></div></div>
    </footer>

    <section class="cookie-banner" data-cookie-banner hidden aria-label="Nastavenia cookies">
        <div class="cookie-banner__inner">
            <div class="cookie-banner__copy">
                <p class="eyebrow">Vaše súkromie</p>
                <h2>Cookies používame zodpovedne.</h2>
                <p>Na stránke používame nevyhnutné technické úložisko, aby fungovala navigácia, formulár a galéria. Voliteľné analytické ani marketingové cookies momentálne nepoužívame.</p>
                <a href="ochrana-sukromia.php#cookies">Zoznam cookies a ochrana súkromia</a>
            </div>
            <div class="cookie-banner__actions">
                <button class="button button--dark" type="button" data-cookie-accept>Prijať všetky</button>
                <button class="button button--outline-dark" type="button" data-cookie-necessary>Len nevyhnutné</button>
                <button class="cookie-banner__settings" type="button" data-cookie-open>Upraviť nastavenia</button>
            </div>
        </div>
    </section>

    <div class="cookie-modal" data-cookie-modal hidden aria-hidden="true">
        <div class="cookie-modal__backdrop" data-cookie-close></div>
        <section class="cookie-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="cookie-modal-title">
            <button class="cookie-modal__close" type="button" data-cookie-close aria-label="Zavrieť nastavenia cookies">&times;</button>
            <p class="eyebrow">Vaše súkromie</p>
            <h2 id="cookie-modal-title">Nastavenia cookies</h2>
            <p class="cookie-modal__intro">Vyberte si, ktoré typy úložiska nám povoľujete. Svoj výber môžete kedykoľvek zmeniť cez ikonku v dolnom rohu.</p>
            <div class="cookie-list">
                <article class="cookie-list__item">
                    <div class="cookie-list__heading"><div><h3>Nevyhnutné</h3><span>Vždy aktívne</span></div><span class="cookie-toggle cookie-toggle--active" aria-hidden="true"><i></i></span></div>
                    <p>Potrebné pre základné fungovanie stránky, mobilné menu, bezpečné odoslanie formulára a uloženie voľby cookies.</p>
                    <div class="cookie-list__details"><strong>Názov</strong><span>garcia_cookie_consent</span><strong>Trvanie</strong><span>12 mesiacov</span></div>
                </article>
                <article class="cookie-list__item">
                    <div class="cookie-list__heading"><div><h3>Preferenčné</h3><span>Momentálne nepoužívame</span></div><span class="cookie-toggle" aria-hidden="true"><i></i></span></div>
                    <p>Zapamätali by si nastavenia, ktoré zlepšujú pohodlie pri ďalšej návšteve. Na tomto webe nie sú momentálne aktívne.</p>
                </article>
                <article class="cookie-list__item">
                    <div class="cookie-list__heading"><div><h3>Štatistické</h3><span>Momentálne nepoužívame</span></div><span class="cookie-toggle" aria-hidden="true"><i></i></span></div>
                    <p>Pomáhajú pochopiť návštevnosť a používanie webu. Analytické služby tretej strany na stránke nemáme zapojené.</p>
                </article>
                <article class="cookie-list__item">
                    <div class="cookie-list__heading"><div><h3>Marketingové</h3><span>Momentálne nepoužívame</span></div><span class="cookie-toggle" aria-hidden="true"><i></i></span></div>
                    <p>Slúžili by na personalizovanú reklamu a meranie kampaní. GARCIA ich na tejto stránke nepoužíva.</p>
                </article>
            </div>
            <div class="cookie-modal__actions"><button class="button button--dark" type="button" data-cookie-save>Uložiť výber</button><button class="button button--outline-dark" type="button" data-cookie-accept>Prijať všetky</button></div>
        </section>
    </div>

    <button class="cookie-settings" type="button" data-cookie-open aria-label="Otvoriť nastavenia cookies">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14.9 3.2a8.7 8.7 0 1 0 5.9 5.9 2.6 2.6 0 0 1-3.2-3.2 8.7 8.7 0 0 0-2.7-2.7ZM8.3 13.5a1.3 1.3 0 1 1 0-2.6 1.3 1.3 0 0 1 0 2.6Zm3.8 3.3a1.1 1.1 0 1 1 0-2.2 1.1 1.1 0 0 1 0 2.2Zm.7-6.6a1.1 1.1 0 1 1 0-2.2 1.1 1.1 0 0 1 0 2.2Z"/></svg>
    </button>

    <a class="floating-contact" data-floating-contact href="kontakt.php"><span>G</span><strong>Nezáväzná konzultácia</strong></a>

    <button class="scroll-top" type="button" data-scroll-top aria-label="Späť na začiatok stránky" hidden>
        <span aria-hidden="true">↑</span>
    </button>
    <script src="assets/js/main.js" defer></script>
</body>
</html>
