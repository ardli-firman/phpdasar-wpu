<?php 
function salam($nama){
	return "Selamat Datang , $nama!" ;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hai</title>
</head>
<body>
	<h1><?php echo salam("Ardli"); ?></h1>
</body>
</html>