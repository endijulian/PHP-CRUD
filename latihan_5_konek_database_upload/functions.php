<?php 
	// koneksi ke database
	$conn = mysqli_connect("localhost", "root", "", "phpdasar");


	function query($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows =[];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;

		}
		return $rows;
	}



	function tambah($data){
		// ambil data dari setiap form
		global $conn;

		$nama = htmlspecialchars( $data["nama"] );
		$nim = htmlspecialchars($data["nim"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		$email = htmlspecialchars($data["email"]);

		// UPLOAD GAMBAR
		$gambar= upload( );
		if (!$gambar) {
			return false;
		}

		

		// query insert data

		$query = "INSERT INTO mahasiswa VALUES
					('id', '$nama', '$nim', '$jurusan', '$email', '$gambar')
					";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

	}

		function upload(){
			$namafile = $_FILES['gambar']['name'];
			$ukuranfile = $_FILES['gambar']['size'];
			$error = $_FILES['gambar']['error'];
			$tmpname = $_FILES['gambar']['tmp_name'];

			// cek apakah tidak ada gambar di upload
			if ($error === 4) {
				echo "<script>
						alert('Pilih Gambar Terdahulu!');
					</script>";
					return false;
			}

			// cek apakah yang diupload adalah gambar
			$ektensigambarvalid = ['jpg', 'jpeg', 'png'];
			$ektensigambar = explode('.', $namafile);
			$ektensigambar =strtolower(end($ektensigambar));
			if (!in_array($ektensigambar, $ektensigambarvalid)) {
				echo "<script>
						alert('Yang Anda Upload Bukan Gambar');
					</script>";
					return false;
			}

			// cek apakah ukuran gambar terlalu besar
			if ($ukuranfile > 1000000) {
				echo "<script>
						alert('Ukuran Gambar Terlalu Besar!!');
					</script>";
					return false;
			}

			// lolos pengecekan gambar siap di upload
			// generet nama baru
			$namafilebaru = uniqid();
			$namafilebaru .= '.';
			$namafilebaru .= $ektensigambar;

			move_uploaded_file($tmpname, 'img/' . $namafilebaru);

			return $namafilebaru;
		}  


		function hapus($id) {
			global $conn;
			mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
			return mysqli_affected_rows($conn);
		}

		function ubah($data){
			global $conn;
			
		$id = $data["id"]; 
		$nama = htmlspecialchars( $data["nama"]); 
		$nim = htmlspecialchars($data["nim"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		$email = htmlspecialchars($data["email"]);

		$gambarlama = htmlspecialchars($data["gambarlama"]);

		// cek apakah user memilih gambar baru atau tidak
		if ($_FILES['gambar']['error'] === 4) {
			$gambar = $gambarlama;
		} else{
			$gambar = upload();
		}

		// query insert data

		$query = "UPDATE mahasiswa SET
					nama = '$nama',
					nim = '$nim',
					jurusan = '$jurusan',
					email = '$email',
					gambar = '$gambar'
					WHERE id =$id 
					";


		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
		}
		
		function cari($keyword){
			$query = "SELECT * FROM mahasiswa
						WHERE
					nama LIKE '%$keyword%' OR
					nim LIKE '%$keyword%' OR
					jurusan LIKE '%$keyword%' OR
					email LIKE '%$keyword%'
					";
			return query($query);

		}
 ?>