<?php
//check apakah tidak ada data di $_GET
if(!isset($_GET["nama"]) ||
!isset($_GET["nim"]) ||
!isset($_GET["prodi"]) ||
!isset($_GET["email"]) ||
!isset($_GET["photo"])){
    //redirect
    header("location: lat1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <h1>Informasi Mahasiswa</h1>
    <ul>
        <li><img src="img/<?=$_GET["photo"];?>" alt=""></li>
        <li><?=$_GET["nama"];?></li>
        <li><?=$_GET["nim"];?></li>
        <li><?=$_GET["prodi"];?></li>
        <li><?=$_GET["email"];?></li>
    </ul>
    <a href="lat1.php">Kembali ke daftar mahasiswa</a>
</body>
</html>