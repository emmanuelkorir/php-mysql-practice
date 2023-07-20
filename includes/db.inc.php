<?php

$dsn = "mysql:host=localhost;dbname=tutorial";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; //remove if posting results
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}