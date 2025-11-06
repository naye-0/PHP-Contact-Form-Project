<?php
// Database configuration

$host = '127.0.0.1'; // Database host
$db   = 'php-learning'; // Database name
$user = 'root'; // Database username
$pass = ''; // Database password
$charset = 'utf8mb4'; // Character set with case-insensitive collation

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>