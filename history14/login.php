<?php 

	session_start();
	require 'functions.php';
	//cek cookie
	if ( isset($_COOKIE["userIdEncrypt"]) && isset($_COOKIE["userNameEncrypt"]) ) {
		# code...
			$userIdEncrypt = $_COOKIE["userIdEncrypt"];
			$userNameEncrypt = $_COOKIE["userNameEncrypt"];

			//ambil username berdasarkan id
			$takeIdUsernameInCookie = mysqli_query($connection,"SELECT username FROM registrasi WHERE id = $userIdEncrypt");
			$placeIdUsernameInCookie = mysqli_fetch_assoc($takeIdUsernameInCookie);

			//cek cookie dan username
			if ( $userNameEncrypt === hash('sha512', $placeIdUsernameInCookie["username"]) ) {
				# code...

				$_SESSION["login"] = true;

			}


		}

	//cek session
	if ( isset($_SESSION["login"]) ) {
		# code...
		header("Location: index.php");
		exit;
	}

	

	if (isset($_POST["login"])) {
		# code...

		$usernameLog = $_POST["username"];
		$emailLog	 = $_POST["email"];
		$passwordLog = $_POST["password"];

		$cekLoginUser = mysqli_query($connection, "SELECT * FROM registrasi WHERE username = '$usernameLog' AND email = '$emailLog'");
		
		//cek username didatabse
		if ( mysqli_num_rows($cekLoginUser) === 1 ) {
			# code...

			//menyesuaikan password 
			$cekDataUser = mysqli_fetch_assoc($cekLoginUser);
			

			if	( password_verify($passwordLog, $cekDataUser["password"])) {
				//session
				$_SESSION["login"] = true;

				//cookie
				if (isset($_POST["remember"])) {
					# code...buat cookie
					setcookie('userIdEncrypt',$cekDataUser["id"],time() + 60);
					setcookie('userNameEncrypt',hash('sha512',$cekDataUser["username"]),time() + 60);
				}

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
					<h3 style="font-family: 'times new roman'; font-style: italic; color: red">Incorrect Password and Email-Username</h3>	
				</div>
		
		<?php endif;  ?>
			

			<div class="form-group">
				<label for="username" class="form-check-label">Username</label>
				<input type="text" name="username" id="username" class="form-control" autocomplete="off" required>
			</div>
			<div class="form-group" class="form-check-label">
				<label for="email">Email</label>
				<input class="form-control" type="text" name="email" id="email" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label for="password" class="form-check-label">Password</label>
				<input class="form-control" type="password" name="password" id="password" required>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="checkbox" name="remember" id="remember"></input>
				<label for="remember" class="form-check-label">Remember Me ?</label>
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