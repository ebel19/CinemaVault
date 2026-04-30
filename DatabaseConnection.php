<?php
$host   = "127.0.0.1";
$dbname = "FilmsDB";
$user   = "root";
$pass   = "P@ssw0rd";

// Create PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // If the connection fails, catch the error and stop the script
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>