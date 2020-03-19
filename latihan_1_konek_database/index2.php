<?php 
	// koneksi ke database
	$conn = mysqli_connect("localhost", "root", "", "phpdasar");

	// ambil data dari tabel mahasiswa / query data mahasiswa
	$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
	// var_dump($result);

	// jika ingin menampilkan error
	// if (!$result) {
	// 	echo mysqli_error($conn);
	// }

	// ambil data (fetch) mahasiswa dari data result
	// mysqli_fetch_row 	//mengembalikan array numerik
	// mysqli_fetch_assoc	//mengembalikan array associative
	// mysqli_fetch_array	//mengembalikan numerik dan associative
	// mysqli_fetch_object

		// $mhs = mysqli_fetch_row($result);
		// var_dump($mhs["4"]);

		// $mhs = mysqli_fetch_assoc($result);
		// var_dump($mhs["nama"]);
			// while ($mhs = mysqli_fetch_assoc($result) ) { 
				
			// 	var_dump($mhs);
			// }

		// $mhs = mysqli_fetch_array($result);
		// var_dump($mhs);

		// $mhs = mysqli_fetch_object($result);
		// var_dump($mhs->email);
 ?>
	

<!DOCTYPE html>
<html>
<head>
	<title>halaman admin</title>
</head>
<body>
	<h1>Tabale Mahasiswa</h1>

		<table border="1" cellpadding="8" cellspacing="0">
			<tr>
				<th>No</th>
				<th>Aksi</th>
				<th>Gambar</th>
				<th>Nama</th>
				<th>Nim</th>
				<th>Fakultas</th>
				<th>Email</th>
			</tr>

		<?php $i = 1; ?>
		<?php while ( $row = mysqli_fetch_assoc($result)) :?>
			<tr>
				<td><?= $i; ?></td>
				<td>
					<a href="">Ubah</a> |
					<a href="">Hapus</a>
				</td>
				<td><img src="img/<?= $row["gambar"]; ?>" width="50" height="50"></td>
				<td><?= $row["nama"]; ?></td>
				<td><?= $row["nim"]; ?></td>
				<td><?= $row["jurusan"]; ?></td>
				<td><?= $row ["email"]; ?></td>
			</tr>
			<?php $i++; ?>
		<?php endwhile; ?>
		</table>
</body>
</html>