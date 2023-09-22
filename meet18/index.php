<?php
require 'session.php';
require 'functions.php';

//pagination
//config
$jumDataPerHal = 2;
$jumData = count(query("SELECT * FROM mahasiswa"));
$jumHal = ceil($jumData / $jumDataPerHal);
$halAktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
$awalData = ($jumDataPerHal * $halAktif) - $jumDataPerHal;


$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumDataPerHal ");


//find Data
if (isset($_POST["find"])) {
    $mahasiswa = find($_POST["keyword"]);
}

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
    <div class="headAct">
        <form action="" method="POST" style="float:left;">
            <input type="text" name="keyword" autofocus placeholder="Masukan Keyword Pencarian..." autocomplete="off">
            <button type="submit" name="find">Cari!</button>
        </form>


        <a href="addData.php" style="margin-left: 20px;">Tambah Data mahasiswa</a>
        <div class="logout">
            <form action="" method="POST">
                <button><a href="logout.php">Logout</a></button>
            </form>
        </div>
        <!-- pagination -->
        <?php if ($halAktif > 1) : ?>
            <a href="?hal= <?= $halAktif - 1 ?>">&laquo;</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $jumHal; $i++) : ?>
            <?php if ($i == $halAktif) : ?>
                <a href="?hal=<?= $i ?>" style="font-weight: bold; color:red;"><?= $i ?></a>
            <?php else : ?>
                <a href="?hal=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($halAktif < $jumHal) : ?>
            <a href="?hal= <?= $halAktif + 1 ?>">&raquo;</a>
        <?php endif; ?>


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
        foreach ($mahasiswa as $row) :
        ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <img src="img/<?= $row["picture"]; ?>" alt="foto siswa" width="50">
                </td>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["programStudy"]; ?>
                <td>
                    <a href="editData.php?id=<?= $row["id"]; ?>">Edit</a> |
                    <a href="deleteData.php?id=<?= $row["id"]; ?>" onclick="return confirm('Are u sure to delete this data ?');">Delete</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>

</html>