<?php
    session_start();
    require 'functions.php';

    //check cookies
    if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        //take username by id
        $result = mysqli_query($conn,"SELECT userId FROM users WHERE userId = '$id'");
        $row = mysqli_fetch_assoc($result);

        //check cookie and username
        if($key === hash('sha256', $row['username'])){
            $_SESSION['login'] = true;
        }
    }

    //check session
    if(isset($_SESSION["login"])){
        header("Location:index.php");
        exit;
    }

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");
    
        //username check
        if (mysqli_num_rows($result) === 1) {
            //check password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                
                //set session
                $_SESSION["login"] = true;

                //check remember
                if(isset($_POST['remember'])){
                    //make cookie
                    setcookie('id',$row['userId'],time()+60);
                    setcookie('key',hash('sha256',$row['username']),time()+60);
                } 
                header("Location: index.php");
                exit;
            }
        }
        $error = true;
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