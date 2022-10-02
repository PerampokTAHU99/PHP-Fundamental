<?php
    //show the date 
   echo date("l, d-M-Y, z");
   echo "<br>"; 
   //time
   //echo time();
   echo date("d-M-Y", time()+60*60*24*100);
   echo "<br>"; 
   //mktime (membuat detik sendiri)
   //mktime (0,0,0,0,0,0);
   //jam, menit, detik, bulan, tanggal, tahun
   echo date("l", mktime(0,0,0,1,7,1999));
?>