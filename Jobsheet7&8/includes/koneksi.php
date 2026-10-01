<?php
$host = "WebProgramming.orb.local"; // atau "WebProgramming.orb.local"
$port = "5432";
$db   = "simpus_mini";
$user = "webpraktikum";
$pass = "webpraktikum";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Sukes";
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
