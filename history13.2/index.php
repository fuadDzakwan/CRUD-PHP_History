<?php
	//TANPA PAGINATION
	//LIVE SEARCH AJAX
	session_start();
	

	if ( !isset($_SESSION["login"]) ) {
		# code...
		header("Location: login.php");
		exit;
	}


	require 'functions.php';

	$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

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
    <style type="text/css">

    	.loader {

    		width: 70px;
    		position: absolute;
    		top: 119px;
    		left: 1037px;
    		z-index: -1;
    		display: none;

    	}

    </style>
	<title>DATABASE-MYSQLi</title>
	
</head>
<body>
	<h1 style="text-align: center;">DATA MAHASISWA</h1>
	<br>
	<nav class="container-fluid">
	<span id="login"><a href="logout.php" class="btn btn-primary" style="display: inline;">Logout</a></span>
	<span style="position: fixed; z-index: 1; bottom: 1rem;"><div class="card-header"><a href="add.php" style="text-decoration: none;" target="_blank"><h2>Create Student++</h2></a></div></span>

	<br><br>

	<form action="" method="POST">
		<div class="form-group" style="text-align: right;">
		<label for="seacrh"></label>
		<span><a href="index.php" class="btn btn-primary" hidden>Refresh</a></span>
		<img src="img/loader.gif" class="loader">
		<input type="text" name="keyword" id="search-input" autofocus size ="30" placeholder="Search Here" autocomplete="off"> 
		<button type="submit" name="search" id="search" class="btn btn-primary" hidden >Search </button>
		
		</div>
	</form>


<div class="" id="data-table">
	<table cellpadding="40" cellspacing="0" border="1" class="d-table">
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
			<td width="500"><img src="img/<?=$row["photoMahasiswa"];?>" style="max-width: 100%; display: block; height: auto;"></td>
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
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>