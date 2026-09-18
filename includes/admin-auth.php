<?php

declare(strict_types=1);

const ADMIN_CONFIG_FILE = __DIR__ . '/../storage/admin.json';

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

function admin_login(string $password): bool
{
    admin_start_session();
    $config = admin_config();
    if (!$config || !password_verify($password, (string) $config['password_hash'])) return false;
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
