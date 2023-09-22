<?php
    require '../functions.php';
    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM mahasiswa
            WHERE 
            name LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            programStudy LIKE '%$keyword%'
        ";
    $mahasiswa = query($query);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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