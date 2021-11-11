<?php 

	$identiti = [

			[
			 	"nama" => "Fuad Jabbar Dzakwan",
			 	"ttl" => "22 Desember 2000",
			 	"tempat" => "Bekasi",
			 	"riwayatpen" => "D3-Menejeman Informatika",
			 	"alamat" => "Cikampak,Ciampea, Kab.Bogor",
			 	"gambar" => "human.jpg"

			 ],

			 [

			 "nama" => "Nurinda Utami Padoma",
			 "ttl" => "26 Januari 2002",
			 "tempat" => "Bogor",
			 "riwayatpen" => "D3-Arobisnis",
			 "alamat" => "Griya Dramaga Asri, Cinangneng, Kab.Bogor",
			 "gambar" => "nurinda.jpg"

			 ]

	];


?>

	<!DOCTYPE html>
	<html>
	<head>
		<style type="text/css">
		.kotakputar {
			width: 500px;
			height: 500px;
			background-color: orange;
			float: left;
			margin : 3px;
			line-height: 500px;
			transition: 1s;
			text-align: center;
		}
		.kotakputar:hover {
			border-radius: 50%;
			transform: rotate(360deg);
		}
	</style>
		<title>ASSOSIATIF-EX</title>
	</head>
	<body>

	<?php foreach ($identiti as $orang) : ?>

		

			<ul>
				<li>
					<img src="img/<?= $orang["gambar"]; ?>">
				</li>
				<li class="">NAMA : <?= $orang["nama"]; ?></li>
				<li class="">TABGGAL-LAHIR :<?= $orang["ttl"]; ?></li>
				<li class="">TEMPAT-LAHIR :<?= $orang["tempat"]; ?></li>
				<li class="">RIWAYAT PENDIDIKAN :<?= $orang["riwayatpen"]; ?></li>
				<li class="">ALAMAT : <?= $orang["alamat"]; ?></li>


			</ul>

		
	
	<?php endforeach; ?>









	</body>
	</html>