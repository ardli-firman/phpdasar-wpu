<?php 

//cara lama membuat array
$bulan = array("Januari", "Februari", "Maret");
//Cara baru
$hari = ["Senin", "Selasa", "Rabu"];


//Menampilkan array
// var_dump($hari);
// echo "<br>";
// print_r($bulan);
// echo "<br>";

//Menampilkan 1 elemen dalam array
// echo $hari[2];

//Menambahkan elemen baru pada array
var_dump($hari);
$hari[] = "Kamis";
var_dump($hari)
?>