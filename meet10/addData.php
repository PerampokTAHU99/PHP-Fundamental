<!DOCTYPE html>
<?php
    //connection
    $conn = mysqli_connect("localhost", "root", "", "fundamental_php");

    //check submit button
    if(isset($_POST["submit"])){
        //fecth data from for every elemen in the form
        $name = $_POST["name"];
        $nim = $_POST["nim"];
        $email = $_POST["email"];
        $programStudy = $_POST["programStudy"];
        $picture = $_POST["picture"];

    //query
    $query = "INSERT INTO mahasiswa (name, nim, email, programStudy, picture)VALUES ('$name','$nim','$email','$programStudy','$picture')";
    mysqli_query($conn, $query);

    //checking submit
    if(mysqli_affected_rows($conn)>0){
        echo "berhasil";
    }else{
        echo "gagal";
        echo "<br>";
        echo mysqli_error($conn);
    }
    };
?>
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
        <form action="" method="POST" class="formData" >
            <label for="name">Nama :</label>
            <input type="text" name="name" id="name"><br><br>
            <label for="nim">NIM :</label>
            <input type="text" name="nim" id="nim"><br><br>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email"><br><br>
            <label for="programStudy">Program Studi :</label>
            <input type="text" name="programStudy" id="programStudy"><br><br>
            <label for="picture">Foto :</label>
            <input type="text" name="picture" id="picture"><br><br>
            <button type="submit" name="submit">Tambah Data!</button>
        </form>
    </div>
</body>
</html>