<?php 

	require 'functions.php';

	if (isset($_POST["register"])) {
		# code...

		if ( registrasi($_POST) > 0 ) {
			# code...
			echo "<script>
					alert('New User Success Created!');
					document.location.href = 'login.php';
				</script>";
		} else {
			echo mysqli_error($connection);
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
	<title>REGISTRASI-MYSQLi</title>
</head>
<body>
<nav class="container">
	<h1>Registrasi</h1>
	<div class="form">
		<form action="" method="POST">
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
			<div class="form-group">
				<label for="password" class="form-check-label">Verify Password</label>
				<input class="form-control" type="password" name="password2" id="password">
			</div>
			<div class="form-group" style="display: inline-block;">
				<button class="btn btn-primary" type="submit" name="register">Register</button>
			</div>
			<span class="">
				<a href="login.php" class="btn btn-primary">SignUp</a>
			</span>
		</form>
	</div>	
</nav>
</body>
</html>