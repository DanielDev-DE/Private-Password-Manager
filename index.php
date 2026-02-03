<?php 
include('db.php'); 
session_start();

// بخش ثبت‌نام
if(isset($_POST['reg'])) {
    $h = password_hash($_POST['p'], PASSWORD_DEFAULT);
    $s = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?,?)");
    $s->execute([$_POST['u'], $h]);
    echo "<script>alert('Account Created! Now enter details and click Login.');</script>";
}

// بخش لاگین
if(isset($_POST['log'])) {
    $u = $_POST['u'];
    $p = $_POST['p'];
    $s = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $s->execute([$u]);
    $user = $s->fetch();

    if($user && password_verify($p, $user['password_hash'])) {
        $_SESSION['uid'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php"); // مطمئن شو نام این فایل دقیقاً همین است
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"><title>Login / Register</title></head>
<body>
    <canvas id="canvas"></canvas>
    <div class="container">
        <h2>Cyber Vault</h2>
        <form method="POST">
            <input type="text" name="u" placeholder="Username" required>
            <input type="password" name="p" placeholder="Password" required>
            <div style="display: flex; gap: 10px; margin-top: 15px;">
                <button name="reg" style="flex: 1; background: #333;">Register</button>
                <button name="log" style="flex: 1;">Login</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="script.js"></script>
</body>
</html>