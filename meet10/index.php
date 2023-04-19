<?php
   require 'functions.php';
   $mahasiswa = query("SELECT * FROM mahasiswa");
    
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
    <div class="addButton" style="text-align: center;">
        <a href="addData.php">Tambah Data mahasiswa</a>
    </div>
    <br>
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
        <?php 
            $i = 1;
        ?>
        <?php
            foreach($mahasiswa as $row) : 
        ?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <img src="img/<?= $row["picture"]; ?>" alt="foto siswa" width="50">
            </td>
            <td><?= $row ["name"];?></td>
            <td><?= $row ["nim"];?></td>
            <td><?= $row ["email"];?></td>
            <td><?= $row ["programStudy"];?>
            <td>
                <a href="#">Edit</a> |
                <a href="deleteData.php?id=<?= $row["id"]; ?>"onclick="return confirm('Are u sure to delete this data ?');">Delete</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach;?>
    </table>
</body> 
</html>