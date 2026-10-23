<?php

declare(strict_types=1);

const ADMIN_CONFIG_FILE = __DIR__ . '/../storage/admin.json';
const ADMIN_ATTEMPTS_FILE = __DIR__ . '/../storage/login_attempts.json';
const ADMIN_LOGIN_MAX_ATTEMPTS = 5;
const ADMIN_LOGIN_WINDOW_SECONDS = 900;
const ADMIN_LOGIN_LOCKOUT_SECONDS = 900;

function admin_start_session(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) return;
    $sessionDirectory = dirname(ADMIN_CONFIG_FILE) . '/sessions';
    if (!is_dir($sessionDirectory)) @mkdir($sessionDirectory, 0700, true);
    if (is_dir($sessionDirectory) && is_writable($sessionDirectory)) session_save_path($sessionDirectory);
    $secure = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    session_set_cookie_params(['httponly' => true, 'secure' => $secure, 'samesite' => 'Lax']);
    session_start();
}

function admin_config(): ?array
{
    if (!is_file(ADMIN_CONFIG_FILE)) return null;
    $config = json_decode((string) file_get_contents(ADMIN_CONFIG_FILE), true);
    return is_array($config) && !empty($config['password_hash']) ? $config : null;
}

function admin_save_config(string $password): bool
{
    $directory = dirname(ADMIN_CONFIG_FILE);
    if (!is_dir($directory) && !mkdir($directory, 0755, true)) return false;
    $data = ['password_hash' => password_hash($password, PASSWORD_DEFAULT), 'created_at' => date(DATE_ATOM)];
    return file_put_contents(ADMIN_CONFIG_FILE, json_encode($data, JSON_PRETTY_PRINT) . PHP_EOL, LOCK_EX) !== false;
}

function admin_is_logged_in(): bool
{
    admin_start_session();
    return !empty($_SESSION['garcia_admin']);
}

function admin_client_key(): string
{
    return hash('sha256', client_ip());
}

function admin_login_attempts(): array
{
    if (!is_file(ADMIN_ATTEMPTS_FILE)) return [];
    $data = json_decode((string) file_get_contents(ADMIN_ATTEMPTS_FILE), true);
    return is_array($data) ? $data : [];
}

function admin_save_login_attempts(array $data): void
{
    $directory = dirname(ADMIN_ATTEMPTS_FILE);
    if (!is_dir($directory)) @mkdir($directory, 0755, true);
    @file_put_contents(ADMIN_ATTEMPTS_FILE, json_encode($data), LOCK_EX);
}

function admin_login_lock_remaining(): int
{
    $entry = admin_login_attempts()[admin_client_key()] ?? null;
    if (!$entry) return 0;
    $lockedUntil = (int) ($entry['locked_until'] ?? 0);
    return $lockedUntil > time() ? $lockedUntil - time() : 0;
}

function admin_register_failed_login(): void
{
    $attempts = admin_login_attempts();
    $key = admin_client_key();
    $now = time();
    $entry = $attempts[$key] ?? ['count' => 0, 'first_attempt' => $now, 'locked_until' => 0];
    if ($now - (int) $entry['first_attempt'] > ADMIN_LOGIN_WINDOW_SECONDS) {
        $entry = ['count' => 0, 'first_attempt' => $now, 'locked_until' => 0];
    }
    $entry['count']++;
    if ($entry['count'] >= ADMIN_LOGIN_MAX_ATTEMPTS) {
        $entry['locked_until'] = $now + ADMIN_LOGIN_LOCKOUT_SECONDS;
    }
    $attempts[$key] = $entry;
    admin_save_login_attempts($attempts);
}

function admin_reset_login_attempts(): void
{
    $attempts = admin_login_attempts();
    $key = admin_client_key();
    if (isset($attempts[$key])) {
        unset($attempts[$key]);
        admin_save_login_attempts($attempts);
    }
}

function admin_login(string $password): bool
{
    admin_start_session();
    if (admin_login_lock_remaining() > 0) return false;
    $config = admin_config();
    if (!$config || !password_verify($password, (string) $config['password_hash'])) {
        admin_register_failed_login();
        return false;
    }
    admin_reset_login_attempts();
    session_regenerate_id(true);
    $_SESSION['garcia_admin'] = true;
    return true;
}

function admin_logout(): void
{
    admin_start_session();
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'] ?? '', (bool) $params['secure'], (bool) $params['httponly']);
    }
    session_destroy();
}

function admin_csrf_token(): string
{
    admin_start_session();
    if (empty($_SESSION['garcia_csrf'])) $_SESSION['garcia_csrf'] = bin2hex(random_bytes(32));
    return (string) $_SESSION['garcia_csrf'];
}

function admin_check_csrf(string $token): bool
{
    admin_start_session();
    return $token !== '' && hash_equals((string) ($_SESSION['garcia_csrf'] ?? ''), $token);
}

function admin_require_login(): void
{
    if (!admin_is_logged_in()) {
        http_response_code(403);
        exit('Prístup zamietnutý.');
    }
}
