<?php 

	session_start();
	

	if ( !isset($_SESSION["login"]) ) {
		# code...
		header("Location: login.php");
		exit;
	}


	require 'functions.php';

	//ngambil id di URL
	$id = $_GET["id"];
	//query data mahasiswa berdasarkan id 
	$edit = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
	



	if ( isset($_POST["edit"]) ) {
		
		if ( updateData($_POST) > 0 ) {
			
			echo "<script>alert('Update Data Success!');
					document.location.href = 'index.php'; 
				  </script>";

		} else {
			echo "<script>alert('Update Data Failed!');
					document.location.href = 'index.php';
				  </script>";
		}
		
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="js/bootstrap.min.js" rel="stylesheet">
	<title>UPDATE & EDIT - MYSQLi</title>
</head>
<body>
<nav class="container">
<h1>EDIT STUDENT|UPDATE</h1>


	<div>
		
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value=" <?=$edit["id"]?> ">
			<input type="hidden" name="oldPhotoMahasiswa" value="<?=$edit["photoMahasiswa"];?>">
	
			<div class="form-group">
				<label for="namaMahasiswa" class="form-check-label">Nama Mahasiswa : </label>
				<input type="text" name="namaMahasiswa" id="namaMahasiswa" class="form-control" required value="<?= $edit["namaMahasiswa"]; ?>" autocomplete="off">
			</div>
			<div class="form-group">
				<label for="nimMahasiswa" class="form-check-label">NIM : </label>
				<input type="text" name="nimMahasiswa" id="nimMahasiswa" class="form-control" required value="<?= $edit["nimMahasiswa"]; ?>" autocomplete="off">
			</div>
			<div class="form-group">
				<label for="photoMahasiswa" class="form-check-label" id="page-link"> <b>Edit Photo : </b></label>
				<img src="img/<?=$edit["photoMahasiswa"]; ?>" style="max-width: 25%; display: block; height: auto; border : 10px solid;">
				<br>
				<input type="file" name="photoMahasiswa" id="photoMahasiswa" class="form-control">
			</div>
			<div class="form-group">
				<label for="jurusanMahasiswa" class="form-check-label">Jurusan : </label>
				<input type="text" name="jurusanMahasiswa" id="jurusanMahasiswa" class="form-control" placeholder="[D3].. or [S1].." style="font-style: italic;" required value="<?= $edit["jurusanMahasiswa"]; ?>" autocomplete="off">
			</div>
			<div class="form-group">
				<label for="emailMahasiswa" class="form-check-label">Email :</label>
				<input type="text" name="emailMahasiswa" id="emailMahasiswa" class="form-control" value="<?= $edit["emailMahasiswa"]; ?>" autocomplete="off">
			</div>

			<span>
				<button type="submit" name="edit" class="btn btn-primary">UPDATE STUDENT!</button> 
			<span>

			<span class="form-group" class="form-control"> <a href="index.php" class="btn btn-primary">BACK!</a> </span>
			



		</form>

</nav>









	</div>



</body>
</html>