<?php 
	$hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
 ?>

<!-- Menggunaakan pengulangan untuk menampilkan array -->
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Latihan 2 Array</title>
 </head>
 <style type="text/css">
 	.kotak{
 		padding: 0 30px;
 		text-align: center;
 		background-color: cyan;
 		line-height: 50px;
 		float: left;
 		margin: 3px;
 	}

 	.clear{
 		clear: both;
 	}
 </style>
 <body>
 	<!-- Pengulangan array denggan menggunakan for -->
 	<?php for ($i=0; $i < count($hari) ; $i++) : ?>
 		<div class="kotak"><?php echo $hari[$i]; ?></div>
 	<?php endfor; ?>
<div class="clear"></div>
 	<!-- Pengulangan array dengan metode foreach -->
 	<?php foreach ($hari as $a) : ?>
 		<div class="kotak"><?= $a; ?></div>
 	<?php endforeach; ?>

 </body>
 </html>