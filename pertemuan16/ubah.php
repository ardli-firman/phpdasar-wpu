<?php 
	require 'function.php';

	//mengambil data yang dikirimkan UBAH Dengan GET
	$id = $_GET["id"];

	//Menquery data
	$mhs = ambil("SELECT * FROM mahasiswa  where id=$id")[0];


	if (isset($_POST["submit"])) {

		if ( ubah($_POST) > 0	) {
			echo "<script>
						alert('Data berhasil diubah!');
						document.location.href = 'index.php';
					</script>";
		}elseif (ubah($_POST === $_POST)) {
			echo "<script>
						alert('Data Masih Tetap');
						document.location.href = 'index.php';
					</script>";
		}
		else{
			echo "<script>
						alert('Data gagal diubah');
						document.location.href = 'index.php';
					</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah</title>
</head>
<body>
	<h1>Isi data</h1>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>">
		<input type="hidden" name="id" value="<?= $mhs['id']; ?>">
		<ul>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" placeholder="Masukkan Nama" id="nama" required value="<?= $mhs['nama']; ?>">
			</li>
			<li>
				<label for="nim">NIM :</label>
				<input type="text" name="nim" placeholder="Masukkan NIM" id="nim" required value="<?= $mhs['nim']; ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" placeholder="Masukkan Jurusan" id="jurusan" required value="<?= $mhs['jurusan']; ?>">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" placeholder="Masukkan e-mail" id="email" required value="<?= $mhs['email']; ?>">
			</li>
			<li>
				<label for="gambar"></label>
				<img src="img/<?= $mhs['gambar']; ?>">
				<input type="file" name="gambar">
			</li><br>
			<button name="submit" type="submit" onclick="return confirm('Yakin Ubah data ?'); ">Ubah Data</button>
		</ul>
	</form>
</body>
</html>