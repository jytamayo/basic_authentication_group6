<?php
$host = 'localhost';
$port = '5432';
$db   = 'basic_Auth';
$user = 'postgres';
$pass = '10092003';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Connection failed: Check your db.php settings. Error: " . $e->getMessage());
}
?>