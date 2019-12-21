<?php
	require 'function.php';
	//Membuat fungsi query untuk mengembalikan isi dalam bentuk array
	$mahasiswa = ambil("SELECT * FROM mahasiswa");
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD Dengan database mysql dengan ekstensi mysqli</title>
</head>
<body>
	<h1>Daftar mahasiswa</h1>
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
					<a href="">Ubah</a> |
					<a href="">Hapus</a>
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