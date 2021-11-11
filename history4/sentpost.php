
<!DOCTYPE html>
<html>
<head>
	<title>RECIVE POST</title>
</head>
<body>

	<?php if(isset($_POST["kirim"])) : ?>

	<label> Hai Cantik, <?= $_POST["nama"]; ?> </label>
	

	<?php endif; ?>
<br>
	<a href="post.php">Back</a>
</body>
</html>