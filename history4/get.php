<?php 

	if (!isset($_GET["nama"]) || !isset($_GET["ttl"]) || 
		!isset($_GET["tempat"]) || !isset($_GET["riwayatpen"]) ||
		!isset($_GET["alamat"]) || !isset($_GET["gambar"])) 
	 {
		# code...
		header("Location:getpost.php");
		exit;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>MAHASISWA</title>
</head>
<body>
<div>
	
	<ul>
		<li> <img src="picture/<?= $_GET["gambar"];?>"> </li>
		<li> <?= $_GET["nama"]; ?> </li>
		<li> <?= $_GET["ttl"]; ?> </li>
		<li> <?= $_GET["tempat"]; ?> </li>
		<li> <?= $_GET["riwayatpen"]; ?> </li>
		<li> <?= $_GET["alamat"]; ?> </li>
	</ul>
	<a href="getpost.php">Kembali</a>

</div>
</body>
</html>