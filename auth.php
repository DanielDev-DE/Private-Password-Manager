<?php
include('db.php');
session_start();

// بخش ثبت‌نام
if (isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
        $stmt->execute([$user, $pass]);
        header("Location: login.php?msg=AccountCreated");
    } catch (Exception $e) { header("Location: register.php?error=UserExists"); }
    exit();
}

// بخش لاگین
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$user]);
    $res = $stmt->fetch();

    if ($res && password_verify($pass, $res['password_hash'])) {
        $_SESSION['user_id'] = $res['id'];
        $_SESSION['username'] = $res['username'];
        header("Location: dashboard.php");
    } else {
        header("Location: login.php?error=Invalid");
    }
    exit();
}
?>