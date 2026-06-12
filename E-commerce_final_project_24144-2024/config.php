<?php

// Get DATABASE_URL from environment (Render)
$DATABASE_URL = getenv("DATABASE_URL");

if (!$DATABASE_URL) {
    die("DATABASE_URL is not set in environment variables");
}

// Parse connection string
$url = parse_url($DATABASE_URL);

$host = $url["host"] ?? null;
$port = $url["port"] ?? 5432;
$dbname = ltrim($url["path"] ?? '', '/');
$user = $url["user"] ?? null;
$pass = $url["pass"] ?? null;

// Safety check (important on Render)
if (!$host || !$dbname || !$user) {
    die("Invalid DATABASE_URL format");
}

// PostgreSQL DSN
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try {
    $conn = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);

} catch (PDOException $e) {
    die("Database Connection Failure: " . $e->getMessage());
}

?>