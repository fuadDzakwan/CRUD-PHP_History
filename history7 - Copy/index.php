<?php
	
	require 'functions.php';

	$mahasiswa = query("SELECT * FROM mahasiswa");

  ?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<title>DATABASE-MYSQLi</title>
</head>
<body>
	<h1 style="text-align: center;">DATA MAHASISWA</h1>
	<br>
	<span style="position: fixed; z-index: 1;"><a href="add.php"><h2>Create Student++</h2></a></span>
	<br><br>
<div>
	<table cellpadding="50" cellspacing="3" border="1" class="d-table">
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
			<td> <a href="edit.php?id=<?= $row["id"]; ?>">Edit</a> |
				 <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Drop Row ?');">Hapus</a>
			</td>
		</tr>
		<?php $no++; ?>
	<?php endforeach; ?>






	</table>
</div>
</body>
</html>