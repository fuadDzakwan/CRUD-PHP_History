<?php 
//cek tombol submit(login) 
if (isset($_POST["login"])) {
	
	if ($_POST["username"] == "Nurinda" && $_POST["pass"] == "Nurinda Cantik") { 

		header("Location: admin.php");
		exit;
	} 
		else {

			$error = true;
	}

}


$cantik = ["nama" => "Nurinda"];

?>





<!DOCTYPE html>
<html>
<head>
	<title>LOGIN ADMIN</title>
</head>
<body>
<div>


<ul>

	<?php  if (isset($error)) : ?>

	<p style="color : red; font-style: italic;"> Password dan Username Salah!</p>

	<?php endif; ?>

	<form action="" method="POST">
		<li>
			<label for="useradmin">Username :</label>
			<input type="text" name="username" id="useradmin">
		</li>
		<li>
			<label for="passadmin">Password :</label>
			<input type="Password" name="pass" id="passadmin">
		</li>
		<button type="submit" name="login">LOGIN</button>
	</form>
</ul>

</div>
</body>
</html>