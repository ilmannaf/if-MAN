<?php

require 'fungsi.php';


// variable super global $_POST
if (isset($_POST['Register'])) 
{

    if (register($_POST) > 0)
        {
        echo "<script>
        alert('data berhasil ditambahkan');
        window.location.href = 'login.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal ditambahkan');
        window.location.href = 'login.php';
        </script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br><br>
        <label for="password1">Password:</label>
        <input type="password"  name="password1" id="password1"><br><br>
        <label for="password2">Confirm Password:</label>
        <input type="password"  name="password2" id="password2"><br><br>
        <input type="submit" name="Register">
    </form>
</body>
</html>