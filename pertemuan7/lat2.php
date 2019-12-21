<?php 
	if ( !isset($_GET["nama"],$_GET["founder"],$_GET["tanggal"]) ) {
		header("Location:lat1.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Merek</title>
</head>
<body>
	<h1>Info Lengkap <?php echo $_GET["nama"]; ?></h1>
	<ul>
		<li>Founder : <?= $_GET["founder"]; ?></li>
		<li>Tanggal : <?= $_GET["tanggal"];  ?></li>
		<li>Situs Website : <a href="<?= $_GET["situs"];  ?>"><?= $_GET["situs"];  ?></a></li>
	</ul><br>
	<a href="">Kembali</a>
	<img src="img/<?= $_GET["img"] ?>" alt="gambar">
</body>
</html>