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
?>