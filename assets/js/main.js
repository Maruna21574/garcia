document.documentElement.classList.add('js');

document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;
    const header = document.querySelector('[data-header]');
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const nav = document.querySelector('[data-nav]');

    const closeMenu = () => {
        if (!menuToggle || !nav) return;
        menuToggle.classList.remove('is-open');
        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.setAttribute('aria-label', 'Otvoriť menu');
        nav.classList.remove('is-open');
        body.classList.remove('menu-open');
    };

    if (menuToggle && nav) {
        menuToggle.addEventListener('click', () => {
            const isOpen = menuToggle.classList.toggle('is-open');
            menuToggle.setAttribute('aria-expanded', String(isOpen));
            menuToggle.setAttribute('aria-label', isOpen ? 'Zavrieť menu' : 'Otvoriť menu');
            nav.classList.toggle('is-open', isOpen);
            body.classList.toggle('menu-open', isOpen);
        });
        nav.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));
        window.addEventListener('resize', () => {
            if (window.innerWidth > 960) closeMenu();
        });
    }

    document.querySelectorAll('[data-mobile-menu-close]').forEach((button) => button.addEventListener('click', closeMenu));

    if (header) {
        const updateHeader = () => header.classList.toggle('is-scrolled', window.scrollY > 8);
        updateHeader();
        window.addEventListener('scroll', updateHeader, { passive: true });
    }

    const cookieBanner = document.querySelector('[data-cookie-banner]');
    const cookieModal = document.querySelector('[data-cookie-modal]');
    const cookieSettings = document.querySelector('[data-cookie-open].cookie-settings');
    const cookieConsentKey = 'garcia_cookie_consent_v1';

    const getCookieConsent = () => {
        try {
            return window.localStorage.getItem(cookieConsentKey);
        } catch (error) {
            return null;
        }
    };

    const closeCookieModal = () => {
        if (!cookieModal) return;
        cookieModal.hidden = true;
        cookieModal.setAttribute('aria-hidden', 'true');
        body.classList.remove('menu-open');
    };

    const openCookieModal = () => {
        if (!cookieModal) return;
        cookieModal.hidden = false;
        cookieModal.setAttribute('aria-hidden', 'false');
        body.classList.add('menu-open');
    };

    const saveCookieConsent = (value) => {
        try {
            window.localStorage.setItem(cookieConsentKey, value);
        } catch (error) {
            // Ak je úložisko vypnuté, lišta sa aj tak môže v tejto návšteve zavrieť.
        }
        if (cookieBanner) cookieBanner.hidden = true;
        if (cookieSettings) cookieSettings.hidden = false;
        closeCookieModal();
    };

    if (cookieBanner) {
        const hasConsent = Boolean(getCookieConsent());
        cookieBanner.hidden = hasConsent;
        if (cookieSettings) cookieSettings.hidden = !hasConsent;
    }

    document.querySelectorAll('[data-cookie-open]').forEach((button) => {
        button.addEventListener('click', (event) => {
            if (button.tagName === 'A') event.preventDefault();
            openCookieModal();
        });
    });
    document.querySelectorAll('[data-cookie-close]').forEach((button) => button.addEventListener('click', closeCookieModal));
    document.querySelectorAll('[data-cookie-accept]').forEach((button) => button.addEventListener('click', () => saveCookieConsent('all')));
    document.querySelectorAll('[data-cookie-necessary]').forEach((button) => button.addEventListener('click', () => saveCookieConsent('necessary')));
    document.querySelectorAll('[data-cookie-save]').forEach((button) => button.addEventListener('click', () => saveCookieConsent('custom')));

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeCookieModal();
    });

    const scrollTopButton = document.querySelector('[data-scroll-top]');
    if (scrollTopButton) {
        scrollTopButton.hidden = false;
        const updateScrollTop = () => scrollTopButton.classList.toggle('is-visible', window.scrollY > 480);
        updateScrollTop();
        window.addEventListener('scroll', updateScrollTop, { passive: true });
        scrollTopButton.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    }

    const floatingContact = document.querySelector('[data-floating-contact]');
    if (floatingContact) {
        const updateFloatingContact = () => floatingContact.classList.toggle('is-visible', window.scrollY > 360);
        updateFloatingContact();
        window.addEventListener('scroll', updateFloatingContact, { passive: true });
    }

    const year = document.querySelector('[data-year]');
    if (year) year.textContent = new Date().getFullYear();

    const revealItems = document.querySelectorAll('.reveal, .reveal-stagger > *');
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries, instance) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    instance.unobserve(entry.target);
                }
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -35px' });
        revealItems.forEach((item) => observer.observe(item));
    } else {
        revealItems.forEach((item) => item.classList.add('is-visible'));
    }

    const filterButtons = document.querySelectorAll('[data-filter]');
    const galleryItems = document.querySelectorAll('[data-gallery-item]');
    filterButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const filter = button.dataset.filter;
            filterButtons.forEach((item) => item.classList.toggle('is-active', item === button));
            galleryItems.forEach((item) => {
                const visible = filter === 'all' || item.dataset.category === filter;
                item.classList.toggle('is-hidden', !visible);
            });
        });
    });

    const sliders = document.querySelectorAll('[data-slider]');
    sliders.forEach((slider) => {
        const slides = Array.from(slider.querySelectorAll('[data-slide]'));
        const dots = Array.from(slider.querySelectorAll('[data-slider-dot]'));
        const currentLabel = slider.querySelector('[data-slider-current]');
        const previous = slider.querySelector('[data-slider-prev]');
        const next = slider.querySelector('[data-slider-next]');
        let currentIndex = 0;
        let timer;

        if (!slides.length) return;

        const showSlide = (index) => {
            currentIndex = (index + slides.length) % slides.length;
            slides.forEach((slide, slideIndex) => slide.classList.toggle('is-active', slideIndex === currentIndex));
            dots.forEach((dot, dotIndex) => dot.classList.toggle('is-active', dotIndex === currentIndex));
            if (currentLabel) currentLabel.textContent = String(currentIndex + 1).padStart(2, '0');
        };

        const startAutoplay = () => {
            window.clearInterval(timer);
            timer = window.setInterval(() => showSlide(currentIndex + 1), 5500);
        };

        previous?.addEventListener('click', () => { showSlide(currentIndex - 1); startAutoplay(); });
        next?.addEventListener('click', () => { showSlide(currentIndex + 1); startAutoplay(); });
        dots.forEach((dot) => dot.addEventListener('click', () => { showSlide(Number(dot.dataset.sliderDot)); startAutoplay(); }));
        slider.addEventListener('mouseenter', () => window.clearInterval(timer));
        slider.addEventListener('mouseleave', startAutoplay);
        slider.addEventListener('focusin', () => window.clearInterval(timer));
        slider.addEventListener('focusout', startAutoplay);
        startAutoplay();
    });

    document.querySelectorAll('[data-before-after]').forEach((comparison) => {
        const range = comparison.querySelector('.before-after-card__range');
        if (!range) return;

        const updateComparison = () => {
            comparison.style.setProperty('--before-after-position', `${range.value}%`);
        };

        range.addEventListener('input', updateComparison);
        updateComparison();
    });

    const lightbox = document.querySelector('[data-lightbox-modal]');
    const lightboxImage = document.querySelector('[data-lightbox-image]');
    const lightboxTitle = document.querySelector('[data-lightbox-title]');
    const lightboxLabel = document.querySelector('[data-lightbox-label]');
    const lightboxCurrent = document.querySelector('[data-lightbox-current]');
    const lightboxTotal = document.querySelector('[data-lightbox-total]');
    const lightboxPrevious = document.querySelector('[data-lightbox-prev]');
    const lightboxNext = document.querySelector('[data-lightbox-next]');
    const lightboxClose = document.querySelectorAll('[data-lightbox-close]');
    let lightboxIndex = 0;

    const closeLightbox = () => {
        if (!lightbox) return;
        lightbox.classList.remove('is-open');
        lightbox.setAttribute('aria-hidden', 'true');
        body.classList.remove('menu-open');
    };

    if (lightbox && lightboxImage) {
        const visibleGalleryItems = () => Array.from(galleryItems).filter((item) => !item.classList.contains('is-hidden'));
        const renderLightboxItem = (item) => {
            if (!item) return;
            lightboxImage.src = item.dataset.full || item.getAttribute('href') || '';
            lightboxImage.alt = item.dataset.title || '';
            if (lightboxTitle) lightboxTitle.textContent = item.dataset.title || '';
            if (lightboxLabel) lightboxLabel.textContent = item.dataset.label || '';
            const visibleItems = visibleGalleryItems();
            if (lightboxCurrent) lightboxCurrent.textContent = String(lightboxIndex + 1).padStart(2, '0');
            if (lightboxTotal) lightboxTotal.textContent = String(visibleItems.length).padStart(2, '0');
        };

        const openLightbox = (item) => {
            const visibleItems = visibleGalleryItems();
            lightboxIndex = Math.max(0, visibleItems.indexOf(item));
            renderLightboxItem(visibleItems[lightboxIndex]);
            lightbox.classList.add('is-open');
            lightbox.setAttribute('aria-hidden', 'false');
            body.classList.add('menu-open');
        };

        const moveLightbox = (direction) => {
            const visibleItems = visibleGalleryItems();
            if (!visibleItems.length) return;
            lightboxIndex = (lightboxIndex + direction + visibleItems.length) % visibleItems.length;
            renderLightboxItem(visibleItems[lightboxIndex]);
        };

        galleryItems.forEach((item) => {
            item.addEventListener('click', (event) => { event.preventDefault(); openLightbox(item); });
        });
        lightboxPrevious?.addEventListener('click', () => moveLightbox(-1));
        lightboxNext?.addEventListener('click', () => moveLightbox(1));
        lightboxClose.forEach((button) => button.addEventListener('click', closeLightbox));
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') closeLightbox();
            if (lightbox.classList.contains('is-open') && event.key === 'ArrowLeft') moveLightbox(-1);
            if (lightbox.classList.contains('is-open') && event.key === 'ArrowRight') moveLightbox(1);
        });
    }

    const contactForm = document.querySelector('[data-contact-form]');
    if (contactForm) {
        contactForm.addEventListener('submit', (event) => {
            const required = contactForm.querySelectorAll('[required]');
            let valid = true;
            required.forEach((field) => {
                const value = field.type === 'checkbox' ? field.checked : field.value.trim();
                field.classList.toggle('has-error', !value);
                if (!value) valid = false;
            });
            if (!valid) {
                event.preventDefault();
                const firstInvalid = contactForm.querySelector('.has-error');
                if (firstInvalid) firstInvalid.focus();
            }
        });
    }
});
