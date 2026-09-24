<?php

declare(strict_types=1);

const SITE_NAME = 'GARCIA';
const SITE_TAGLINE = 'Povrchová úprava a renovácia dreva';
const SITE_LOCATION = 'Liptovský Mikuláš a okolie';
const SITE_URL = 'https://www.garcia.sk';

const CONTACT_EMAIL = 'info@garcia.sk';
const CONTACT_PHONE = '0905 938 699';
const FACEBOOK_URL = 'https://www.facebook.com/profile.php?id=61592275994218&locale=sk_SK';

$navigation = [
    'domov' => ['label' => 'Domov', 'href' => 'index.php'],
    'sluzby' => ['label' => 'Služby', 'href' => 'sluzby.php'],
    'realizacie' => ['label' => 'Realizácie', 'href' => 'realizacie.php'],
    'o-nas' => ['label' => 'O nás', 'href' => 'o-nas.php'],
    'kontakt' => ['label' => 'Kontakt', 'href' => 'kontakt.php'],
];

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function is_active(string $pageKey, string $activePage): string
{
    return $pageKey === $activePage ? ' aria-current="page" class="is-active"' : '';
}

function asset(string $path): string
{
    return 'assets/' . ltrim($path, '/');
}

function contact_email_available(): bool
{
    return CONTACT_EMAIL !== '';
}

function contact_phone_available(): bool
{
    return CONTACT_PHONE !== '';
}

function service_icon(string $name): string
{
    $icons = [
        'house' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m3 10 9-7 9 7"/><path d="M5 9.5V21h14V9.5"/><path d="M9 21v-6h6v6"/></svg>',
        'sand' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="7.5"/><path d="m5.5 16.5 5-5 2.5 2.5 5.5-5.5"/><path d="M8 4.5 5 7.5M16 4.5l3 3"/></svg>',
        'shield' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 19 6v5c0 4.5-2.8 8.3-7 10-4.2-1.7-7-5.5-7-10V6l7-3Z"/><path d="m8.5 12 2.2 2.2 4.8-5"/></svg>',
        'window' => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="3.5" width="16" height="17" rx="1"/><path d="M12 3.5v17M4 12h16"/></svg>',
        'layers' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m4 7 8-4 8 4-8 4-8-4Z"/><path d="m4 12 8 4 8-4M4 17l8 4 8-4"/></svg>',
        'custom' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"/><path d="M12 8v8M8 12h8"/></svg>',
    ];

    return $icons[$name] ?? $icons['custom'];
}
