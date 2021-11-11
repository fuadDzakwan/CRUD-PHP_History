<?php 

	require 'functions.php';

	if (isset($_POST["login"])) {
		# code...

		$usernameLog = $_POST["username"];
		$emailLog	 = $_POST["email"];
		$passwordLog = $_POST["password"];

		$cekLoginUser = mysqli_query($connection, "SELECT * FROM registrasi WHERE username = '$usernameLog'");
		
		//cek username didatabse
		if ( mysqli_num_rows($cekLoginUser) === 1 ) {
			# code...
			//cek password didatabse

			$cekPassUser = mysqli_fetch_assoc($cekLoginUser);
			if	( password_verify($passwordLog, $cekPassUser["password"]) ) {

				header("Location: index.php");
				exit;

			}

		} 

			$error = true; 


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
	<title>LOGin-MYSQLi</title>
</head>
<body>
<nav class="container">
	<h1>Sign-UP</h1>
	<div class="form">
		<form action="" method="POST">

		<?php  if (isset($error)) : ?> 
		
				<div class="form-group">
					<h3 style="font-family: 'times new roman'; font-style: italic; color: red">Incorrect Password and Username</h3>	
				</div>
		
		<?php endif;  ?>
			

			<div class="form-group">
				<label for="username" class="form-check-label">Username</label>
				<input type="text" name="username" id="username" class="form-control" autocomplete="off">
			</div>
			<div class="form-group" class="form-check-label">
				<label for="email">Email</label>
				<input class="form-control" type="text" name="email" id="email" autocomplete="off">
			</div>
			<div class="form-group">
				<label for="password" class="form-check-label">Password</label>
				<input class="form-control" type="password" name="password" id="password">
			</div>
			<div class="form-group" style="display: inline-block;">
				<button class="btn btn-primary" type="submit" name="login">Login</button>
			</div> 
			<span> <a href="registrasi.php" class="btn btn-primary">Create New Account</a> </span>
		</form>
	</div>	
</nav>
</body>
</html>