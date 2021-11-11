<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.kotakputar {
			width: 100px;
			height: 100px;
			background-color: orange;
			float: left;
			margin : 3px;
			line-height: 100px;
			transition: 1s;
			text-align: center;
		}
		.kotakputar:hover {
			border-radius: 50%;
			transform: rotate(360deg);
		}
	</style>
	<title>NUMERIC-ASSOSIATIVE ARRAY</title>
</head>
<body>

		<?php 

					//NUMERIC ARRAY 
					// $lemari_buku > $rak_buku > $buku.
					// WADAH BESAR > BUNGKUSNYA > ISINYA. 

				$lemari_buku = [

					["Sejarah","Fisika","Kimia"],
					["Matematika","Biologi","Ekonomi"],
					["Komik","Geografi","Agama"],
					["Novel","Kamus Bahasa","Sosial"],
					["Majalah","Koran","Politik"]

				];

		?>


	<?php foreach ($lemari_buku as $rak_buku) : ?>

		<?php foreach ($rak_buku as $buku) : ?>

			<div class="kotakputar"> <?= $buku ?> </div>

		<?php endforeach; ?>

	<?php endforeach; ?>




</body>
</html>