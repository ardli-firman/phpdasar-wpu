<?php 
	if (isset($_POST["submit"])) {

		if ($_POST["username"] == "312" && $_POST["password"] == "312") {

			header("Location : welcome.php");
			exit;
		}else{
			$error=true;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>
	<h1>Welcome To My website</h1><br>
	Login untuk melanjutkan<br>

	<?php if ( isset($error)) : ?>
		<p>username dan password yang anda masukkan salah</p>
	<?php endif; ?>

	<ul>
		<form method="POST" action="welcome.php">
			<li>
				<label for="username">Username : </label>
				<input type="text" name="nama" placeholder="Masukkan Nama anda" id="username">
			</li>
			<li>
				<label for="password">Password : </label>
				<input type="Password" name="pw" placeholder="Masukkan Password" id="password">
			</li>
			<label for="email">email :</label>
			<input type="email" name="email" placeholder="Masukkan email" id="email">
			<button name="submit" type="submit">Masuk!</button>
		</form>
	</ul>
</body>
</html>