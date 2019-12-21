<?php
session_start();

if (isset($_SESSION["login"])) {
	header("Location:index.php");
}

require 'function.php';
	if (isset($_POST['masuk'])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
		//Pengecekan username
		//menghitung ada berapa baris yang di kembalikan kalau ketemu = 1 ,
		if(mysqli_num_rows($result) === 1)
		{
			
			//cek password
			$row = mysqli_fetch_assoc($result);
			//ngecek string dengan hash yang ada di password (yg belum di acak, yg diacak)
			if(password_verify($password,$row["password"]))
			{
				//set session
				$_SESSION["login"] = true;
				header("Location:index.php");
				exit;
			}
		}

		$error = true;

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<h1>Halaman Login</h1>

	<?php if (isset($error)) : ?>
		<p style="color: red ;font-style: italic ">Username / Password salah</p>
	<?php endif; ?>

<form action="" method="post">
	
	<ul>
		<li>
			<label for="username">Username :</label>
			<input type="text" name="username" placeholder="Masukkan username" id="username">
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" placeholder="Masukkan password" id="password">
		</li>
		<li>
			<button type="submit" name="masuk">Sign in
			</button>
		</li>
	</ul>

</form>

</body>
</html>