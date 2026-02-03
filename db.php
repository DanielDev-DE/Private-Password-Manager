<?php
$host = 'localhost';
$db   = 'password_vault';
$user = 'danieladmin'; 
$pass = '123456'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Error");
}

define('KEY', 'Daniel_Secure_2024');

function encryptPass($p) {
    $iv = openssl_random_pseudo_bytes(16);
    $enc = openssl_encrypt($p, 'aes-256-cbc', KEY, 0, $iv);
    return base64_encode($enc . '::' . $iv);
}

function decryptPass($d) {
    if(!$d) return "";
    list($e, $iv) = explode('::', base64_decode($d), 2);
    return openssl_decrypt($e, 'aes-256-cbc', KEY, 0, $iv);
}
?>