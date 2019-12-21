<?php 
	session_start();
	//Agar session benar-benar kosong
	$_SESSION= [];
	session_unset();
	//menghilangkan session
	session_destroy();

	//menghapus cookie
	setcookie('key', '', time()-3600);
	setcookie('id', '', time()-3600);

	header("Location:login.php")
?>