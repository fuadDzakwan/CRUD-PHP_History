<?php 

	session_start();
	

	if ( !isset($_SESSION["login"]) ) {
		# code...
		header("Location: login.php");
		exit;
	}


	require 'functions.php';

	if ( isset($_POST["add"]) ) {

		
		if ( addData($_POST) > 0 ) {
			
			echo "<script>alert('Add Data Success!');
					document.location.href = 'index.php'; 
				  </script>";

		} else {
			echo "<script>alert('Add Data Failed!');
					document.location.href = 'add.php';
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
	<title>ADD-FORM STUDENTS</title>
</head>
<body>
	<nav class="container">
<h1>CREATE NEW STUDENT</h1>


	<div>
		
		<form action="" method="POST" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="namaMahasiswa" class="form-check-label">Nama Mahasiswa : </label>
				<input type="text" name="namaMahasiswa" id="namaMahasiswa" class="form-control" required autocomplete="off">
			</div>
			<div class="form-group">
				<label for="nimMahasiswa" class="form-check-label">NIM : </label>
				<input type="text" name="nimMahasiswa" id="nimMahasiswa" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="emailMahasiswa" class="form-check-label">Email :</label>
				<input type="text" name="emailMahasiswa" id="emailMahasiswa" class="form-control" autocomplete="off">
			</div>
			<div class="form-group">
				<label for="jurusanMahasiswa" class="form-check-label">Jurusan : </label>
				<input type="text" name="jurusanMahasiswa" id="jurusanMahasiswa" class="form-control" placeholder="[D3].. or [S1].." style="font-style: italic;" required autocomplete="off">
			</div>
			<div class="form-group">
				<label for="photoMahasiswa" class="form-check-label" > Add Photo :</label>
				<input type="file" name="photoMahasiswa" id="photoMahasiswa" class="form-control-plaintext">
			</div>
			<div class="form-group" class="form-control">
				<button type="submit" name="add" class="btn btn-primary">ADD STUDENT!</button>
			</div>
			<div class="">
				<a href="index.php" class="page-link">BACK!</a>
			</div>









		</form>

</nav>









	</div>



</body>
</html>