<?php
	
	require 'functions.php';

	$mahasiswa = query("SELECT * FROM mahasiswa");

  ?>

<!DOCTYPE html>
<html>
<head>
	<title>DATABASE-MYSQLi</title>
</head>
<body>
	<h1 style="text-align: center;">DATA MAHASISWA</h1>
<div>
	<table cellpadding="50" cellspacing="3" border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>NIM</th>
			<th>Photo</th>
			<th>Jurusan</th>
			<th>Email</th>
			<th>Settings</th>
		</tr>

		<?php $no = 1; ?>
		<?php foreach ( $mahasiswa as $row ) : ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $row["namaMahasiswa"]; ?></td>
			<td><?= $row["nimMahasiswa"]; ?></td>
			<td><img src="img/<?= $row["photoMahasiswa"]; ?>" width="90" height="160"></td>
			<td><?= $row["jurusanMahasiswa"]; ?></td>
			<td><?= $row["emailMahasiswa"]; ?></td>
			<td> <a href="">Ubah</a> |
				 <a href="">Hapus</a>
			</td>
		</tr>
		<?php $no++; ?>
	<?php endforeach; ?>






	</table>
</div>
</body>
</html>