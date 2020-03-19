<?php 
	
	require 'functions.php';
	$mahasiswa = query("SELECT * FROM mahasiswa");
	
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
		<?php foreach ($mahasiswa as $row) :?>
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
		<?php endforeach; ?>
		</table>
</body>
</html>