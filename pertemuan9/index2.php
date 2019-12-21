<?php 
	// Koneksi ke database 1. Function
	//String nama host, username, password, nama database
	$conn = mysqli_connect("localhost", "root", "", "phpdasar");

	//Query table yang ada di database / mengambil data
	//String mysqli_connect, apa yang akan di ambil
	$result = mysqli_query($conn,"SELECT * FROM mahasiswa");

	//Mengambil data yang ada di dalam tabel (fetch)
	//mysqli_fetch_row // mengembalikan array numerik
	//mysqli_fetch_assoc // mengembalikan menjadi array asosiatif ("nama"=>)
	//mysqli_fetch_array // mengembalikan keduanya
	//mysqli_fetch_object

	// while($mhs = mysqli_fetch_assoc($result)){
	// 	var_dump($mhs);
	// };

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
	<?php while ($baris = mysqli_fetch_assoc($result)) : ?>
			<tr>
				<td><?= $i; ?></td>
				<td>
					<a href="">Ubah</a> |
					<a href="">Hapus</a>
				</td>
				<td>
					<img src="img/<?= $baris["gambar"]; ?>" alt="" width="75">
				</td>
				<td><?= $baris["nama"]; ?></td>
				<td><?= $baris["nim"]; ?></td>
				<td><?= $baris["email"]; ?></td>
				<td><?= $baris["jurusan"]; ?></td>
			</tr>
			<?php $i++; ?>
	<?php  endwhile; ?>
	</table>
</body>
</html>