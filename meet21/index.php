<?php
require 'session.php';
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

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
    <link rel="stylesheet" href="css/style.css">
    
    <title>Admin's Page</title>
    
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <div class="headAct">
        <form action="" method="POST" style="float:left;">
            <input type="text" name="keyword" autofocus placeholder="Masukan Keyword Pencarian..." autocomplete="off" id="keyword">
            <button type="submit" name="find" id="find">Cari!</button>
            <img src="img/loader.gif" alt="loader" class="loader">
        </form>
        <a href="addData.php" style="margin-left: 20px;">Tambah Data mahasiswa</a>
        <div>
            <form action="">
                <button>
                    <a href="print.php" target="_blank">Print</a>
                </button>
            </form>
        </div>
        <div class="logout">
            <form action="" method="POST">
                <button><a href="logout.php">Logout</a></button>
            </form>
        </div>
    </div>
    <br>
    <div id="container">
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
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>