
<?php 
	
	// Koneksi ke database
	//String nama host, username, password, nama database
	$conn = mysqli_connect("localhost", "root", "", "phpdasar");

	function ambil($query){
			global $conn;
				$result      = mysqli_query($conn,$query);
				$berkas      = [];
					while ($data = mysqli_fetch_assoc($result))
					{
						$berkas[]= $data;
					}
				return $berkas;
		}

	function tambah($data){
		global $conn;
		//HTMLSPECIALCHARS "Mengolah data html sebelum di tammpilkan"
		$nama    = htmlspecialchars($data["nama"]);
		$nim     = htmlspecialchars($data["nim"]);
		$email   = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);

		//upload gambar
		$gambar = upload();
		if (!$gambar) {

			return false;	
		}


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
		$id         = $data["id"];
		$nama       = htmlspecialchars($data["nama"]);
		$nim        = htmlspecialchars($data["nim"]);
		$email      = htmlspecialchars($data["email"]);
		$jurusan    = htmlspecialchars($data["jurusan"]);
		$gambarLama = htmlspecialchars($data["gambarLama"]);

		if ($_FILES['gambar']['error'] === 4) {
			$gambar = $gambarLama;
		}else{
			$gambar = upload();
		}

		//query data untuk mengupdate
		$query = "UPDATE mahasiswa SET 
					nama     = '$nama',
					nim      = '$nim',
					email    = '$email',
					jurusan  = '$jurusan',
					gambar   = '$gambar'
					WHERE id = $id ";
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

	function upload()
	{
		//Mengambil data gambar
		$namaFile   = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error      = $_FILES['gambar']['error'];
		$tmpName    = $_FILES['gambar']['tmp_name'];

		//mengecek error jika gambar belum di masukkan
		if ($error === 4) {	
			echo "<script>
					alert('Pilih gambar');
							</script>";
			return false;
		}

		//cek apakah yang di upload adalah gambar
		$valid = ['jpg','jpeg','png'];
		$ekstensiGambar = explode('.', $namaFile);
		//mengambil array yang di belakang dan mengubahnya lowercase
		$ekstensi = strtolower(end($ekstensiGambar));
		//in array di gunakan untuk mencari ekstensi di dalam ekstensi valid
		if (!in_array($ekstensi, $valid)) {
			echo "<script>
					alert('Yang anda upload bukan gambar');
							</script>";

			return false;
		}

		//Mengecek ukuran
		if ($ukuranFile > 1000000) {
			echo "<script>
					alert('Ukuran gambar terlalu besar');
							</script>";
			return false;
		}

		//Setelah dicek gambar di upload
		//genererate nama baru agar tidak menimpa file yang sama
		$namaFileBaru = uniqid();
		// sambung
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensi;

		move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

		return $namaFileBaru;
	}

	
	function registrasi($data)
	{
		global $conn;

		$username  = strtolower(stripcslashes($data["username"]));
		//real escape ['koneksi', data] agar symbol masuk database
		$password  = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);

		//cek username
		$result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

		if (mysqli_fetch_assoc($result)) {
			echo "<script>
					alert('username sudah terdaftar!');
			</script>";
			return false;
		}

		//cek konfirmasi password
		if ($password !== $password2) {
			echo "<script>
				alert('password tidak sesuai');
			</script>";
			return false;
		}

		//enkripsi password
		//password_hash(pw yg mau di acak , algoritma default)
		$password = password_hash($password, PASSWORD_DEFAULT);

		//menambah userbaru ke database
		mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

		return mysqli_affected_rows($conn);

	}
?>