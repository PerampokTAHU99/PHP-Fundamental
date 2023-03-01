<?php
    $conn = mysqli_connect("localhost", "root", "", "fundamental_php");
    //checkConn
    if (!$conn) {
        die("Connection Failed!!!: " . mysqli_connect_error());
    }
    mysqli_close($conn);

    $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
    var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin's Page</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>E-mail</th>
            <th>Program Studi</th>
            <th>Tools</th>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <img src="" alt="foto siswa">
            </td>
            <td>ajeng</td>
            <td>2420244</td>
            <td>ajeng@gmail.com</td>
            <td>Sastra</td>
            <td>
                <a href="#">Edit</a> | <a href="#">Delete</a>
            </td>
        </tr>
    </table>
</body> 
</html>