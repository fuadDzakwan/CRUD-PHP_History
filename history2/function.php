<?php 
	
	function salam($salam,$nama) {

		return "Selamat $salam, $nama!";
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>FUNCTION</title>
</head>
<body>
	<h1> <?= salam("Malam","Novita"); ?> </h1>
</body>
</html>