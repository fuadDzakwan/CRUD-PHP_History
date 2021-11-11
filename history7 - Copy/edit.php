<?php 

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
	<title>UPDATE STUDENT</title>
</head>
<body>
<h1>EDIT STUDENT|UPDATE</h1>

<nav class="container-fluid">
	<div>
		
		<form action="" method="POST">
			<input type="hidden" name="id" value=" <?= $edit["id"]; ?> ">
			
			<div class="form-pgrou">
				<label for="namaMahasiswa" class="form-check-label">Nama Mahasiswa : </label>
				<input type="text" name="namaMahasiswa" id="namaMahasiswa" class="form-control" required value="<?= $edit["namaMahasiswa"]; ?>">
			</div>
			<div class="form-group">
				<label for="nimMahasiswa" class="form-check-label">NIM : </label>
				<input type="text" name="nimMahasiswa" id="nimMahasiswa" class="form-control" required value="<?= $edit["nimMahasiswa"]; ?>">
			</div>
			<div class="form-group">
				<label for="photoMahasiswa" class="form-check-label">Photo :</label>
				<input type="text" name="photoMahasiswa" id="photoMahasiswa" class="form-control" value="<?= $edit["photoMahasiswa"]; ?>">
			</div>
			<div class="form-group">
				<label for="jurusanMahasiswa" class="form-check-label">Jurusan : </label>
				<input type="text" name="jurusanMahasiswa" id="jurusanMahasiswa" class="form-control" placeholder="[D3].. or [S1].." style="font-style: italic;" required value="<?= $edit["jurusanMahasiswa"]; ?>">
			</div>
			<div class="form-group">
				<label for="emailMahasiswa" class="form-check-label">Email :</label>
				<input type="text" name="emailMahasiswa" id="emailMahasiswa" class="form-control" value="<?= $edit["emailMahasiswa"]; ?>">
			</div>
			<div class="form-group" class="form-control">
				<button type="submit" name="edit" class="btn btn-primary">UPDATE STUDENT!</button>
			</div>









		</form>

</nav>









	</div>



</body>
</html>