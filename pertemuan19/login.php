	<?php
session_start();
require 'function.php';

// Mengecek cookie apakah masih ada atau tidak
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	
		$id  = $_COOKIE['id'];
		$key = $_COOKIE['key'];


		//ambil username dari id
		$result = mysqli_query($conn, "SELECT username FROM user WHERE id=$id");
		$row    = mysqli_fetch_assoc($result);

		//cek cookie
		if ($key === hash('sha256',$row['username'])) {

			$_SESSION['login'] = true;

		}

	}

if (isset($_SESSION["login"])) {
	header("Location:index.php");
	exit;
}

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

				//set cookie
				if (isset($_POST["remember"])) {
					// 2 cookie
					setcookie('id',$row['id'],time()+60);
					setcookie('key', hash('sha256',$row['username']), time()+60);
				}


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
	<style>
		li{
			list-style: none;
		}
	</style>
</head>
<body>
	<h1>Halaman Login (alpha)</h1>

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
			
			<input type="checkbox" name="remember"  id="remember"><label for="remember">Remember Me </label>
		</li>
		<li>
			<button type="submit" name="masuk">Sign in
			</button>
		</li>
	</ul>

</form>

</body>
</html>