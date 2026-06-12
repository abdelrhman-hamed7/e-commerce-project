<?php

function env_value(string $key, ?string $default = null): ?string
{
    $value = getenv($key);

    if ($value === false || $value === '') {
        return $default;
    }

    return $value;
}

$databaseUrl = env_value('DATABASE_URL');
$host = null;
$port = null;
$dbname = null;
$user = null;
$pass = null;

if ($databaseUrl) {
    $url = parse_url($databaseUrl);
    $scheme = $url['scheme'] ?? 'mysql';

    if (!in_array($scheme, ['mysql', 'mysql2', 'mariadb'], true)) {
        die('DATABASE_URL must use mysql:// or mariadb:// for this project.');
    }

    $host = $url['host'] ?? null;
    $port = isset($url['port']) ? (string) $url['port'] : '3306';
    $dbname = ltrim($url['path'] ?? '', '/');
    $user = isset($url['user']) ? rawurldecode($url['user']) : null;
    $pass = isset($url['pass']) ? rawurldecode($url['pass']) : '';
} else {
    $host = env_value('DB_HOST', '127.0.0.1');
    $port = env_value('DB_PORT', '3306');
    $dbname = env_value('DB_DATABASE');
    $user = env_value('DB_USERNAME');
    $pass = env_value('DB_PASSWORD', '');
}

if (!$host || !$port || !$dbname || !$user) {
    die('Database environment variables are incomplete.');
}

$charset = env_value('DB_CHARSET', 'utf8mb4');
$dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset={$charset}";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    $conn = $pdo;
} catch (PDOException $e) {
    die('Database Connection Failure: ' . $e->getMessage());
}

?>
