<?php
    // this is a comment
    /*
        this is also a comment
     */

    //syntax PHP
    //Standar output
    //echo, print
    //print_r(for content of arrays)
    //var_dump(for debugging)
    //echo "Theo fahrizal Syam";
   //print "Theo gans";
   //print_r ("theo gans");
    //var_dump ("Theo fahrizal Syam");

    $nama = "Theo Fahrizal Syam";

    //operator aritmatika
    // + - * / %

    //$x = 10;
   //$y = 20;
    //echo $x * $y;

    //penggabung string concatenation
    //.
    //$namaDepan = "Theo";
    //$namaBelakang = "Fahrizal";
    //echo $namaDepan ." ". $namaBelakang;

    //Assignment 
    // =,+=,-=,*=,%=,.=
    //$x=1;
    //$x+=5;
    //echo $x;

    //pebandingan
    //<,>,<=,>=,==,!=
    //var_dump(1<5);

    //indetitas
    //===, !==
    //var_dump(1=== "1");

    //logika
    //&&,||,!
    $x=10;
    var_dump($x <20 && $x %2 == 0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
</head>
<body>
    <h1>Hallo,Selamat Datang <?php echo $nama ?> </h1>
    <p><?php echo"ini PHP didalam HTML"?></p>
    <?php
        echo "<h1>Hallo,Selamat Datang $nama</h1>"
    ?>

</body>
</html>