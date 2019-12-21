<?php
	require 'function.php';
	//Membuat fungsi query untuk mengembalikan isi dalam bentuk array assosiatif
	$mahasiswa = ambil("SELECT * FROM mahasiswa ORDER BY id DESC");
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
	</table>
</body>
</html>