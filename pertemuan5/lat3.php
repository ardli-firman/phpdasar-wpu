<?php 
	$Mahasiswa = [["Ardli Firman", "17090081", "Teknik Informatika", "estungtung59@gmail.com"], ["M. Wijaya", "17090032", "Teknik Informatika", "oskop@gmail.com"], ["Rifani aditya", "17090321", "Teknik Informatika", "Rifan_adit@gmail.com"],];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Array</title>
 	<style>
 		.nav{
 			list-style: none;
 			float: left;
 			background-color: salmon;
 			padding: 50px;
 			margin : 5px;
 			transition: 1s;
 		}

 		.nav li:hover{
 			transform: rotate(360deg);
 		}

 		.nav li{
 			text-align: left;
 			background-color: cyan;
 			padding: 5px;
 		}

 		.nav:hover{
 			transform: rotateX(360deg);
 			border-radius: 50%;
 		}
 	</style>
 </head>
 <body>
 	<h1>Daftar Mahasiswa</h1>
 	<?php foreach ($Mahasiswa as $mhs) : ?>
 	<ul class="nav">
 		<li>Nama : <?= $mhs[0]; ?></li>
 		<li>NIM : <?= $mhs[1]; ?></li>
 		<li>Jurusan : <?= $mhs[2]; ?></li>
 		<li>Email : <?= $mhs[3]; ?></li>
 	</ul>
 	<?php endforeach; ?>
 </body>
 </html>