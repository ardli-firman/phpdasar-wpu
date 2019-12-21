<?php
require 'function.php';
	if (isset($_POST["register"])) {
		if (registrasi($_POST) > 0) {
			echo "<script>
					alert('user berhasil di tambahkan')
			</script>";
		}else{
			echo "<script>
					alert('user berhasil di tambahkan')
			</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrasi</title>
		<style>
			label{
				display: block;
			}
			li{
				list-style: none;
			}
		</style>
</head>
<body>
	<h1>Halaman Registrasi</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" placeholder="Masukkan username" id="username">
			</li>
			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" placeholder="Mausukkan password" id="password">
			</li>
			<li>
				<label for="password">Konfirmasi Password :</label>
				<input type="password" name="password2" placeholder="Mausukkan password" id="password">
			</li>
			<li>
				<button type="submit" name="register">Sign up</button>
			</li>
		</ul>
	</form>
</body>
</html>