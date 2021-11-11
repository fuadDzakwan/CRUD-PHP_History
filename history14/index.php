<?php
	
	session_start();
	

	if ( !isset($_SESSION["login"]) ) {
		# code...
		header("Location: login.php");
		exit;
	}


	require 'functions.php';


	//pagination LIMIT -> 'mulai dari (awal-array(0))-(lalu tampilkan(sesuai baris))'
//ceil pembultan keatas, floor pembulatan kebawah, round pembulatan mendekati nilai desimal 
	$valueInReadPage = 2; //menampilkan 2 data pada index.html
	$dataValue = count(query("SELECT * FROM mahasiswa"));
	$pageValue = ceil($dataValue / $valueInReadPage);
	$onPageActive = ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
	$firstData = ( $valueInReadPage * $onPageActive ) - $valueInReadPage;

	$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $firstData,$valueInReadPage");

	if ( isset($_POST["search"] ) ) {
		
		$mahasiswa = searchData($_POST["keyword"]);
	}

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
	<nav class="container-fluid">
	<span id="login"><a href="logout.php" class="btn btn-primary" style="display: inline;">Logout</a></span>
	<span style="position: fixed; z-index: 1; bottom: 1rem;"><div class="card-header"><a href="add.php" style="text-decoration: none;"><h2>Create Student++</h2></a></div></span>

	<br><br>

	<form action="" method="POST">
		<div class="form-group" style="text-align: right;">
		<label for="seacrh"></label>
		<span><a href="index.php" class="btn btn-primary">Refresh</a></span>
		<input type="text" name="keyword" id="search" autofocus size ="30" placeholder="Search Here" autocomplete="off">
		<span><button type="submit" name="search" class="btn btn-primary">Search</button></span>	
		</div>
	</form>

	<!--navigasi-->
	<?php if ($onPageActive > 1) : ?>
<a href="?page=<?= $onPageActive - 1;?>" class="btn btn-primary">&laquo;Previous</a>
	<?php endif; ?>

	<?php for ( $i = 1; $i <= $pageValue; $i++  ) :   ?>

		<?php if( $i == $onPageActive  ) : ?>

			<a href="?page=<?= $i; ?>" class="btn btn-primary" style="font-weight: bold; color: black;"><?= $i; ?></a>

		<?php else : ?>
	    
	    	<a href="?page=<?= $i; ?>" class="btn btn-primary"><?= $i; ?></a>

		<?php endif;  ?>

	<?php endfor;?>

	<?php if ($onPageActive < $pageValue) : ?>
<a href="?page=<?= $onPageActive + 1;?>" class="btn btn-primary">&raquo;Next</a>
	<?php endif; ?>

<div>
	<table cellpadding="45" cellspacing="0" border="1" class="d-table">
		<tr>
			<th style="text-align: center;">No</th>
			<th style="text-align: center;">Nama</th>
			<th style="text-align: center;">NIM</th>
			<th style="text-align: center;">Photo</th>
			<th style="text-align: center;">Jurusan</th>
			<th style="text-align: center;">Email</th>
			<th style="text-align: center;">Settings</th>
		</tr>

		<?php $no = 1; ?>
		<?php foreach ( $mahasiswa as $row ) : ?>
		<tr>
			
			<td style="text-align: center;"><?= $no; ?></td>
			<td style="text-align: center;"><?= $row["namaMahasiswa"]; ?></td>
			<td style="text-align: center;"><?= $row["nimMahasiswa"]; ?></td>
			<td style="text-align: center;"><img src="img/<?=$row["photoMahasiswa"];?>" style="max-width: 100%; display: block; height: auto;"></td>
			<td style="text-align: center;"><?= $row["jurusanMahasiswa"]; ?></td>
			<td style="text-align: center;"><?= $row["emailMahasiswa"]; ?></td>
			<td style="text-align: center;"> <a href="edit.php?id=<?= $row["id"]; ?>">Edit</a> |
				 <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Drop Row ?');">Hapus</a>
			</td>
			
		</tr>
		<?php $no++; ?>
	<?php endforeach; ?>






	</table>
</div>
</nav>
</body>
</html>