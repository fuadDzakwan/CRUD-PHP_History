<?php 

	session_start();
	$_SESSION = [];
	session_unset();
	session_destroy();

	setcookie('userIdEncrypt','',time() - 3600);
	setcookie('userNameEncrypt','',time() - 3600);


	header("location: login.php");
	exit;


?>