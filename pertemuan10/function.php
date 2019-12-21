<?php 
	
	// Koneksi ke database
	//String nama host, username, password, nama database
	$conn = mysqli_connect("localhost", "root", "", "phpdasar");

	function ambil($query){
			global $conn;
			$result = mysqli_query($conn,$query);
			$berkas = [];
				while ($data = mysqli_fetch_assoc($result)) {
					$berkas[] = $data;
				}
				return $berkas;
		}

	function tambah($terima){
		global $conn;
		//HTMLSPECIALCHARS "Mengolah data html sebelum di tammpilkan"
		$nama = htmlspecialchars($terima["nama"]);
		$nim = htmlspecialchars($terima["nim"]);
		$email = htmlspecialchars($terima["email"]);
		$jurusan = htmlspecialchars($terima["jurusan"]);
		$gambar = htmlspecialchars($terima["gambar"]);

		//query data
		$query = "INSERT INTO mahasiswa VALUES('','$nama','$nim','$email','$jurusan','$gambar') ";
		mysqli_query($conn,$query);

		return mysqli_affected_rows($conn);
	}

	function hapus($id)
	{
		global $conn;
		mysqli_query($conn,"DELETE FROM mahasiswa where id=$id");

		return mysqli_affected_rows($conn);
	}
?>