<?php require_once __DIR__ . '/cms.php'; $contactPrompt = cms_data()['contact_prompt']; ?>
<section class="slth-services-section contact-bottom">
    <div class="container">
        <div class="contact-bottom__panel">
            <div class="contact-bottom__copy">
                <p class="eyebrow"><?= e($contactPrompt['eyebrow']) ?></p>
                <h2><?= $contactPrompt['title'] ?></h2>
                <p><?= e($contactPrompt['description']) ?></p>
            </div>
            <div class="contact-bottom__action">
                <span><?= e($contactPrompt['eyebrow_action']) ?></span>
                <a href="kontakt.php#dopyt" class="btn btn--gold"><?= e($contactPrompt['button']) ?></a>
                <small><?= e($contactPrompt['note']) ?></small>
            </div>
        </div>
        <div class="contact-bottom__meta"><span><strong>01</strong> Detail dreva</span><span><strong>02</strong> Lokalita projektu</span><span><strong>03</strong> Vaša predstava</span></div>
    </div>
</section>
