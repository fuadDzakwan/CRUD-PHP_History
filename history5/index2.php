<?php
	//variabel database
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "universitas";

	//menghubungkan database 
	$connection = mysqli_connect($host,$user,$password,$database);
	
	//menguji dayabase
	if (!$connection) {
		die("DATABASE-MYSQLi ERROR : NOT FOUND!"."|".mysqli_connect_error());
	}
	
	//mengambil data mahasiswa dari database
	$result = mysqli_query($connection,"SELECT * FROM mahasiswa"); //var_dump($result);
	
	//cek error tabel di database
	if ( !$result ) {
		echo mysqli_error($connection);
	}
	//fetch(ambil isi di table database) table di database, ada 4 :
	//1.mysqli_fetch_row -> numerik array
	//2.mysqli_fetch_assoc	-> assosiatif array
	//3.mysqli_fetch_array -> all array
	//4.mysqli_fetch_object -> object array
// 	while ( $read = mysqli_fetch_assoc($result) ) { 
// 	var_dump($read);
// }
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
		<?php while ( $row = mysqli_fetch_assoc($result) ) : ?>
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
	<?php endwhile; ?>






	</table>
</div>
</body>
</html>