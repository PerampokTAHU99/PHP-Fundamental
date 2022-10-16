<?php
//Array Associative = sama seperti array numerik, Kecuali key-nya adalah string yang dibuat sendiri

$mahasiswa = [
    [
        "nama" => "Theo Fahrizal Syam",
        "nim" => 5190411052,
        "prodi" => "Teknik Informatika",
        "email" => "theofahrizals@gmail.com",
        "photo" => "theo.png"
    ],
    [
        "nama" => "Diane Frainska",
        "nim" => 5190311052,
        "prodi" => "Teknik Pangan",
        "email" => "dianesz@gmail.com",
        "photo" => "diane.png"
    ],
    [
        "nama" => "Paulinaz",
        "nim" => 5190511052,
        "prodi" => "Teknik Industri",
        "email" => "pawppaw@gmail.com",
        "photo" => "paulina.png"
    ]

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
            <li>
                <img src="img/<?=$mhs["photo"]?>" alt="photo profile">
            </li>
            <li>Nama :<?= $mhs["nama"]; ?></li>
            <li>NIM :<?= $mhs["nim"]; ?></li>
            <li>Prodi :<?= $mhs["prodi"]; ?></li>
            <li>Email :<?= $mhs["email"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>