<?php
include('db.php');
session_start();
if(!isset($_SESSION['uid'])) { header("Location: index.php"); exit(); }

if(isset($_POST['add'])) {
    $enc = encryptPass($_POST['pass']);
    $s = $pdo->prepare("INSERT INTO stored_passwords (user_id, site_name, encrypted_password) VALUES (?,?,?)");
    $s->execute([$_SESSION['uid'], $_POST['site'], $enc]);
    header("Location: dashboard.php");
    exit();
}

$s = $pdo->prepare("SELECT * FROM stored_passwords WHERE user_id = ?");
$s->execute([$_SESSION['uid']]);
$all = $s->fetchAll();
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"><title>Dashboard</title></head>
<body>
    <div class="container">
        <h2>My Secure Vault</h2>
        <form method="POST" class="vault-form">
            <input type="text" name="site" placeholder="Site Name" required>
            <input type="text" name="pass" placeholder="Password" required>
            <button name="add">Save</button>
        </form>
        <div style="margin-top:20px;">
            <?php foreach($all as $row): ?>
                <div class="pass-card">
                    <span style="color:#00f2fe"><?= $row['site_name'] ?></span>: 
                    <span><?= decryptPass($row['encrypted_password']) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        <br><a href="index.php" style="color:red">Logout</a>
    </div>
</body>
</html>