<?php  
	$merek=[
		[
			"img" => "asus.png",
			"nama" => "ASUS",
			"tanggal" => "2 April 1989",
			"founder" => "TH Tung dan Ted Hsu",
			"situs" => "http://www.asus.com"
		],
		[
			"img" => "hp.png",
			"nama" => "Hewlett-Packard",
			"tanggal" => "Tahun 1939",
			"founder" => "MarK V. Hurd",
			"situs" => "http://www.hp.com"
		],
		[
			"img" => "dell.png",
			"nama" => "Dell",
			"tanggal" => "1 Mei 1984",
			"founder" => "Michael Dell",
			"situs" => "http//Dell.com"
		]
];
?>
<!DOCTYPE html>
<html>
<head>
	<title>GET</title>
</head>
<body>
	<h1> Daftar Merek </h1>
	<ul>
		<?php foreach ($merek as $m) : ?>
			<li><a href="lat2.php/?img=<?= $m["img"]  ?>&nama= <?= $m["nama"] ?>&founder=<?= $m["founder"] ?>&tanggal=<?= $m["tanggal"] ?>&situs= <?= $m["situs"] ?>"><?php echo $m["nama"]; ?></li></a>
			<br>
		<?php endforeach; ?>
	</ul>
</body>
</html>