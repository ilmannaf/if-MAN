<?php
session_start();
require 'fungsi.php';

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["Login"])) {
    if (login($_POST)) {
        header("Location: index.php");
        exit;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">username / password salah</p>
    <?php endif; ?>
    <form action="" method="post">
        <label for="username">Masukan username:</label>
        <input type="text" name="username" required id="username"><br><br>
        <label for="password">Masukan Password:</label>
        <input type="password" name="password" required id="password"><br><br>
        <button type="submit" name="Login">login</button>
    </form>
    <p>Belum punya akun? <a href="register.php">Daftar</a></p>
</body>
</html>