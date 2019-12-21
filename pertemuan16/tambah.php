<?php 
	session_start();
	if (!isset($_SESSION["login"])) {
		header("Location:login.php");
		exit;
	}
	require 'function.php';
	if (isset($_POST["submit"])) {

		

		if ( tambah($_POST) > 0	) {
			echo "<script>
						alert('Data berhasil masuk!');
						document.location.href = 'index.php';
					</script>";
		}else{
			echo "<script>
						alert('Data gagal masuk');
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
		<ul>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" placeholder="Masukkan Nama" id="nama" required>
			</li>
			<li>
				<label for="nim">NIM :</label>
				<input type="text" name="nim" placeholder="Masukkan NIM" id="nim" required>
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" placeholder="Masukkan Jurusan" id="jurusan" required>
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" placeholder="Masukkan e-mail" id="email" required>
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<input type="file" name="gambar" placeholder="Masukkan gambar" id="gambar" required>
			</li><br>
			<button name="submit" type="submit">Tambahkan !</button>
		</ul>
	</form>
</body>
</html>