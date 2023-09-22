<?php
registButton();
require 'functions.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Registration</h1>
    <div>
        <form action="" method="POST" class="formRegister">
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
                    <label for="password2">Confirm Password : </label>
                    <input type="password" name="password2" id="password2">
                </li>
                <li>
                    <button type="submit" name="register">Register!</button>
                </li>
            </ul>
        </form>
        <p>have already account? <a href="login.php">Click here!</a></p>
    </div>

</body>

</html>