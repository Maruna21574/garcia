<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';

const FORMGUARD_SECRET_FILE = __DIR__ . '/../storage/form_secret.txt';
const FORMGUARD_ATTEMPTS_FILE = __DIR__ . '/../storage/form_attempts.json';
const FORMGUARD_MIN_SECONDS = 4;
const FORMGUARD_MAX_SECONDS = 6 * 3600;
const FORMGUARD_MAX_PER_HOUR = 3;
const FORMGUARD_MAX_PER_DAY = 8;
const FORMGUARD_MAX_CONFIRMATIONS_PER_ADDRESS = 2;

function formguard_secret(): string
{
    if (is_file(FORMGUARD_SECRET_FILE)) {
        $secret = trim((string) file_get_contents(FORMGUARD_SECRET_FILE));
        if (strlen($secret) >= 32) return $secret;
    }
    $secret = bin2hex(random_bytes(32));
    $directory = dirname(FORMGUARD_SECRET_FILE);
    if (!is_dir($directory)) @mkdir($directory, 0755, true);
    @file_put_contents(FORMGUARD_SECRET_FILE, $secret, LOCK_EX);
    return $secret;
}

/** Signed render-time stamp: a bot that posts instantly (or replays an old token) is rejected. */
function formguard_token(): string
{
    $time = (string) time();
    return $time . '.' . hash_hmac('sha256', $time, formguard_secret());
}

/** Returns 'ok', 'invalid', 'too-fast' or 'expired'. */
function formguard_check_token(string $token): string
{
    $parts = explode('.', $token, 2);
    if (count($parts) !== 2 || !ctype_digit($parts[0])) return 'invalid';
    if (!hash_equals(hash_hmac('sha256', $parts[0], formguard_secret()), $parts[1])) return 'invalid';
    $age = time() - (int) $parts[0];
    if ($age < FORMGUARD_MIN_SECONDS) return 'too-fast';
    if ($age > FORMGUARD_MAX_SECONDS) return 'expired';
    return 'ok';
}

function formguard_looks_like_spam(string $name, string $message): bool
{
    if (preg_match_all('~(?:https?://|www\.)~i', $name . ' ' . $message) > 2) return true;
    if (preg_match('~https?://~i', $name)) return true;
    return false;
}

function formguard_load(): array
{
    if (!is_file(FORMGUARD_ATTEMPTS_FILE)) return [];
    $data = json_decode((string) file_get_contents(FORMGUARD_ATTEMPTS_FILE), true);
    return is_array($data) ? $data : [];
}

/**
 * Atomically records one send under $key and reports whether it stays within the limits.
 * $limits is a list of [window seconds, max count]; the attempt is only recorded when allowed.
 */
function formguard_allow(string $bucket, string $key, array $limits): bool
{
    $directory = dirname(FORMGUARD_ATTEMPTS_FILE);
    if (!is_dir($directory)) @mkdir($directory, 0755, true);
    $handle = @fopen(FORMGUARD_ATTEMPTS_FILE, 'c+');
    if (!$handle) return true; // never block real customers because of a storage problem
    flock($handle, LOCK_EX);
    $data = json_decode((string) stream_get_contents($handle), true);
    $data = is_array($data) ? $data : [];
    $now = time();
    $hash = hash('sha256', $key);
    $longest = max(array_column($limits, 0));

    foreach ($data as $b => $entries) {
        foreach ($entries as $k => $times) {
            $data[$b][$k] = array_values(array_filter((array) $times, static fn ($t): bool => $now - (int) $t < 86400));
            if (!$data[$b][$k]) unset($data[$b][$k]);
        }
        if (!$data[$b]) unset($data[$b]);
    }

    $times = $data[$bucket][$hash] ?? [];
    $allowed = true;
    foreach ($limits as [$window, $max]) {
        if (count(array_filter($times, static fn ($t): bool => $now - (int) $t < $window)) >= $max) $allowed = false;
    }
    if ($allowed) {
        $times[] = $now;
        $data[$bucket][$hash] = $times;
    }
    ftruncate($handle, 0);
    rewind($handle);
    fwrite($handle, json_encode($data));
    flock($handle, LOCK_UN);
    fclose($handle);
    return $allowed;
}

function formguard_allow_submission(): bool
{
    return formguard_allow('ip', client_ip(), [[3600, FORMGUARD_MAX_PER_HOUR], [86400, FORMGUARD_MAX_PER_DAY]]);
}

/** Limits automatic confirmation mails per recipient, so the form cannot be used to mail-bomb someone. */
function formguard_allow_confirmation(string $email): bool
{
    return formguard_allow('confirm', strtolower($email), [[86400, FORMGUARD_MAX_CONFIRMATIONS_PER_ADDRESS]]);
}
