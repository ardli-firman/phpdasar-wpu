<?php 
	// Date untuk menampilkan tanggal dengan format tertentu
	echo date("l, d-m-Y");

	// Time
	echo date("l, d-M-Y", time()-60*60*24*100);

	// Membuat sendiri detik
	Mktime(0,0,0,0,0,0)
	// jam , menit, detik, bulan, tanggal, tahun
	echo date("l, d-M-Y", mktime(0,0,0,10,17,1999));

	// Strtotime
	echo strtotime("17 oct 1999");
 ?>