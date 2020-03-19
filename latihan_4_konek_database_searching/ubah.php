<?php 
	require 'functions.php';

	// ambil data dari URL
	$id = $_GET["id"];

	// query data mahasiswa berdasarkan id
	$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];
	
	
	// cek apakah tombol submit udah ditekan atau belum
	if (isset($_POST["submit"])) {
		


		// cek apakah data berhasil diubah kan atau tidak
		if (ubah($_POST) > 0) {
			echo "<script>
					alert('Data Berhasil di Ubah!');
					document.location.href = 'index.php';
				</script>";
		}else{
			echo  "<script>
					alert('Data Gagal di Ubah!');
					doccument.location.href = 'index.php';
				</script>";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>ubah Data</title>
</head>
<body>
	<h1>Ubah Data Mahasiswa</h1>
		<form action="" method="POST">
			<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">

			<ul>
				<li>
					<label for="nama">Nama:</label>
					<input type="text" name="nama" id="nama" required
					value="<?= $mhs["nama"]; ?>">
				</li>
				<li>
					<label for="nim">Nim:</label>
					<input type="text" name="nim" id="nim" required
					value="<?= $mhs["nim"]; ?>">
				</li>
				<li>
					<label for="jurusan" >Jurusan:</label>
					<input type="text" name="jurusan" id="jurusan" required
					value="<?= $mhs["jurusan"]; ?>">
				</li>
				<li>
					<label for="email">Email:</label>
					<input type="text" name="email" id="email" required
					value="<?= $mhs["email"]; ?>">
				</li>
				<li>
					<label for="gambar">Gambar:</label>
					<input type="text" name="gambar" id="gambar"
					value="<?= $mhs["gambar"]; ?>">
				</li>
				<li>
					<button type="submit" name="submit">Ubah Data!!</button>
				</li>
			</ul>
			
		</form>
</body>
</html>