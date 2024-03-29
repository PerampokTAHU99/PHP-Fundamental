<?
require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <link rel="stylesheet" href="css/print.css">
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
    </tr>';
    $i=1;
    foreach($mahasiswa as $row){
        $html.='<tr>
            <td>'.$i++.'</td>
            <td><img src="img/'.$row["picture"].'"></img></td>
            <td>'.$row["name"].'</td>
            <td>'.$row["nim"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["programStudy"].'</td>
        </tr>';
    }
    $html.='</table>
    
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf','I');
