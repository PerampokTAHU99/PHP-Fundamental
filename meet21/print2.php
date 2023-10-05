<?php
// memanggil library FPDF
require'library/fpdf.php';
require 'functions.php';
 
// Membuat objek PDF dengan ukuran kertas Letter dan orientasi potrait
$pdf = new FPDF();
$pdf->AddPage();

// Atur font dan ukuran teks
$pdf->SetFont('Arial', 'B', 16);

// Tambahkan judul
$pdf->Cell(40, 20, 'Daftar Mahasiswa','C');

$imagePath = 'img/';
$pdf->Image($imagePath, 10, 10, 90);

// Tambahkan isi PDF
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(10); // Pindah ke baris berikutnya
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(40,7,'Foto' ,1,0,'C');
$pdf->Cell(35,7,'NIM',1,0,'C');
$pdf->Cell(35,7,'NAMA',1,0,'C');
$pdf->Cell(35,7,'E-mail',1,0,'C');
$pdf->Cell(35,7,'Program Study',1,0,'C');


$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$mahasiswa = mysqli_query($conn,"SELECT * FROM mahasiswa");
while($data = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(10,6, $no++,1,0,'C');
    $pdf->Cell(40,6, $data['picture'],1,0);
    $pdf->Cell(35,6, $data['nim'],1,0);
    $pdf->Cell(35,6, $data['name'],1,0);
    $pdf->Cell(35,6, $data['email'],1,0);
    $pdf->Cell(35,6, $data['programStudy'],1,1);
}

// Output PDF ke browser atau simpan sebagai file
$pdf->Output('Daftar Mahasiswa.pdf', 'I'); 
// Tampilkan dalam browser ('I'), simpan sebagai file ('F'), atau unduh ('D')
 
?>