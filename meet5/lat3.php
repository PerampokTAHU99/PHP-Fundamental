<?php
$mahasiswa = [
    ["Theo Fahrizal Syam", 5190411052, "Teknik Informatika", "theofahrizals@gmail.com"],
    ["Diane Frainska", 5190411053, "Teknik Informatika", "dianesz@gmail.com"],
    ["Paulinaz", 5190411054, "Teknik Informatika", "pawppaw@gmail.com"]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>Nama :<?= $mhs[0]; ?></li>
            <li>NIM :<?= $mhs[1]; ?></li>
            <li>Prodi :<?= $mhs[2]; ?></li>
            <li>Email :<?= $mhs[3]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>