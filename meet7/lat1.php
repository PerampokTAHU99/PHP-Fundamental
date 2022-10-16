<?php
// superglobal = variable global milik php dan merupakan array assosiative 

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
    <title>GET</title>
</head>

<body>
    <h1>Data Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <li>
                <a href="lat2.php?nama=<?=$mhs["nama"];?>
                &nim=<?=$mhs["nim"];?>
                &prodi=<?=$mhs["prodi"];?>
                &email=<?=$mhs["email"];?>
                &photo=<?=$mhs["photo"];?>
                ">
                <?=$mhs["nama"];?></a>
            </li>
            <?php endforeach; ?>
        </ul>
</body>

</html>