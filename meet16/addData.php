<?php
require 'session.php';
    require 'functions.php';
    //check submit button
    if(isset($_POST["submit"])){
        //checking data         
        if(addData($_POST)>0){
            echo "
                <script>
                    alert('Adding Data Success!!');
                    document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Adding Data not successful');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/meet10/style.css">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <div class="addDataForm" >
        <form action="" method="POST" class="formData" enctype="multipart/form-data">
            <label for="name">Nama :</label>
            <input type="text" name="name" id="name" required><br><br>
            <label for="nim">NIM :</label>
            <input type="text" name="nim" id="nim" required><br><br>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" required><br><br>
            <label for="programStudy">Program Studi :</label>
            <input type="text" name="programStudy" id="programStudy" required><br><br>
            <label for="picture">Foto :</label>
            <input type="file" name="picture" id="picture" ><br><br>
            <button type="submit" name="submit">Tambah Data!</button>
        </form>
    </div>
</body>
</html>