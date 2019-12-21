<?php
	session_start();
	if (!isset($_SESSION["login"])) {
		header("Location:login.php");
		exit;
	}
	require 'function.php';
	//pagination
	//konfigurasi
	$jumlahData = count(ambil("SELECT * FROM mahasiswa"));
	$jumlahDataPerHalaman = 2;
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

	//mengecek sedang berada di halaman berapa, ternary
	$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;

	//halAktif = 2, awalData = 2
	//halAktif = 3, awalData = 4
	//halAktif = 4, awalData = 6
	// 2*2 - 2 = 2
	// 2*3 - 2 = 4
	// 2*4 - 2 = 6

	$dataAwal = ($jumlahDataPerHalaman * $halAktif) - $jumlahDataPerHalaman;


	//Membuat fungsi query untuk mengembalikan isi dalam bentuk array assosiatif
	//LIMIT (data di mulai dari ke berapa, berapa data)
	$mahasiswa = ambil("SELECT * FROM mahasiswa ORDER BY id DESC LIMIT $dataAwal , $jumlahDataPerHalaman");
	//variabel mahasiswa sebagai penyimpan data array yang di proses didalam function.php

	//fungsi search
	if (isset($_POST["cari"])) {
		$mahasiswa = cari($_POST["keyword"]);
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD Dengan database mysql dengan ekstensi mysqli</title>
</head>
<style>
	.clear{
		clear: both;
	}
</style>
<body>
	<h1>Daftar mahasiswa</h1>
		<a href="tambah.php" style="float: right;">Tambah Mahasiswa</a>
	<div class="clear"></div>
		<form action="" method="post" style="float: right;">
			<input type="text" name="keyword" placeholder="Masukkan keyword ..." autofocus autocomplete="off" size="40px">
			<button type="submit" name="cari"">Search</button>
		</form>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Foto</th>
			<th>Nama</th>
			<th>NIM</th>
			<th>email</th>
			<th>Jurusan</th>
		</tr>
		<?php $i=1; ?>
		<?php foreach ($mahasiswa as $mhs) : ?>
			<tr>
				<td><?= $i; ?></td>
				<td>
					<a href="ubah.php?id=<?= $mhs['id']; ?>">Ubah</a> |
					<a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Hapus Data ?');">Hapus</a>
				</td>
				<td>
					<img src="img/<?= $mhs["gambar"]; ?>" alt="" width="75">
				</td>
				<td><?= $mhs["nama"]; ?></td>
				<td><?= $mhs["nim"]; ?></td>
				<td><?= $mhs["email"]; ?></td>
				<td><?= $mhs["jurusan"]; ?></td>
			</tr>
			<?php $i++; ?>
	<?php  endforeach; ?>
	</table><br>
		<?php if ($halAktif > 1) :?>
			<a href="?hal=<?= $halAktif - 1 ?>">back</a>
		<?php endif; ?>

		<?php for ($i=1; $i <= $jumlahHalaman ; $i++) :?>
			<?php if ($i == $halAktif): ?>
				<a href="?hal=<?= $i; ?>" style="font-weight: bold;"><?= $i ; ?> </a>
			<?php else: ?>
				<a href="?hal=<?= $i; ?>"><?= $i ; ?> </a>
			<?php endif ?>
		<?php endfor; ?>
		
		<?php if ($halAktif < $jumlahHalaman ) :?>
			<a href="?hal=<?= $halAktif + 1 ?>">Next</a>
		<?php endif; ?>
	<br>
	<a href="logout.php">Logout</a>
</body>
</html>