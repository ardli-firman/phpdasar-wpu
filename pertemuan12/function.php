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

	function tambah($data){
		global $conn;
		//HTMLSPECIALCHARS "Mengolah data html sebelum di tammpilkan"
		$nama = htmlspecialchars($data["nama"]);
		$nim = htmlspecialchars($data["nim"]);
		$email = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		$gambar = htmlspecialchars($data["gambar"]);

		//query data untuk menginsert atau menambahkan
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

	function ubah($data){

		global $conn;
		//HTMLSPECIALCHARS "Mengolah data html sebelum di tammpilkan"
		$id = $data["id"];
		$nama = htmlspecialchars($data["nama"]);
		$nim = htmlspecialchars($data["nim"]);
		$email = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		$gambar = htmlspecialchars($data["gambar"]);

		//query data untuk mengupdate
		$query = "UPDATE mahasiswa SET 
					nama = '$nama',
					nim = '$nim',
					email = '$email',
					jurusan = '$jurusan',
					gambar = '$gambar'
					WHERE id= $id ";
		mysqli_query($conn,$query);

		return mysqli_affected_rows($conn);
	}


	function cari($keyword){

		//query data
		$query = "SELECT * FROM mahasiswa WHERE 
					nama LIKE '%$keyword%' OR
					nim LIKE '%$keyword%' OR
					email LIKE '%$keyword%' OR
					jurusan LIKE '%$keyword%' 
		";

		return ambil($query);

	}
?>