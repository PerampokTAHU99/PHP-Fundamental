<?php
    session_start();
    login();
    require 'functions.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>login</h1>

    <?php if(isset($error)):?>
        <p style="color:red; font-style:italic;"> username/password salah! </p>
    <?php endif;?>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </li>
        </ul>
    </form>
</body>
</html>