<?php
    require 'session.php';
    require 'functions.php';

    //get data in URL
    $id = $_GET["id"];
    
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
    //check submit button
    if(isset($_POST["submit"])){
        
        //checking data
        if(editData($_POST)>0){
            echo "
                <script>
                    alert('Editing Data Success!!');
                    document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Editing Data not successful');
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
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <div class="addDataForm" >
        <form action="" method="POST" class="formData" enctype="multipart/form-data" >
            <input type="hidden" name="id" value="<?= $mhs["id"]?>">
            <input type="hidden" name="oldPicture" value="<?= $mhs["picture"]?>">
            <label for="name">Nama :</label>
            <input type="text" name="name" id="name" required value="<?= $mhs["name"]; ?>"><br><br>
            <label for="nim">NIM :</label>
            <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>"><br><br>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>"><br><br>
            <label for="programStudy">Program Studi :</label>
            <input type="text" name="programStudy" id="programStudy" required value="<?= $mhs["programStudy"]; ?>"><br><br>
            <label for="picture">Foto :</label>
            <img src="img/<?= $mhs['picture'];?>" width="50" alt="" srcset="">
            <input type="file" name="picture" id="picture" required><br><br>
            <button type="submit" name="submit">Edit Data!</button>
        </form>
    </div>
</body>
</html>