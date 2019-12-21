<!DOCTYPE html>
<html>
<head>
	<title>Lat 2</title>
</head>
<style>

	.hsl{
		clear: both;
	}

	.pil li{
		text-decoration: none;
	}
	.konten h1{
		background-color: black;
		color: white;
		width: 50%;
		margin: 5px;
	}
	.pil ul li{
		background-color: salmon;
		padding: 45px;
		margin: 5px;
		float: left;
		text-align: center;
		list-style: none;
	}
	.pil ul li a{
		text-decoration: none;
		color: white;
	}
	.pil ul li:hover{
		transform: rotateY(360deg);
		transition: 1s;
	}
</style>
<body class="konten">
	<h1>Pilih Jenis laptop untuk melihat spesifikasi</h1>
	<div class="pil">
		<ul>
			<li><a href="?lp=asus">Asus</li></a> 
			<li><a href="?lp=xiaomi">Xiaomi</li></a> 
			<li><a href="?lp=ss"> Samsung</li></a> 
		</ul>
	</div><br>
	<div class="hsl">
		<?php
			$hasil = @$_GET["lp"];

		
			if ($hasil == '') {
				echo "Pilih Merek diatas";;
			}elseif ($hasil == 'asus') {
				include 'asus.php';
			}elseif ($hasil == 'xiaomi') {
				include 'xiaomi.php';
			}elseif ($hasil == 'ss') {
				include 'ss.php';
			}
		?>
	</div>
</body>
</html>