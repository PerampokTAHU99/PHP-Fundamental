<?php
    //array ada 2 cara :
    //cara lama
    $hari = array("Senin","Selasa","Rabu");
    //cara baru
    $bulan = ["January","Februari","Maret"];
    var_dump($hari);
    $hari[] = "Kamis";
    echo "<br>";
    var_dump($hari);
    echo "<br>";
    echo "$hari[2], $bulan[1]";
    echo "<br>";
    print_r($bulan);
?>