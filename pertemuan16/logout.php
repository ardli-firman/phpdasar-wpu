<?php 
	session_start();
	//Agar session benar-benar kosong
	$_SESSION= [];
	session_unset();
	//menghilangkan session
	session_destroy();

	header("Location:login.php")
?>