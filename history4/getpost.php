<?php 

	$mahasiswa = [

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
			 "riwayatpen" => "D3-Agrobisnis",
			 "alamat" => "Griya Dramaga Asri, Cinangneng, Kab.Bogor",
			 "gambar" => "pic3.jpg"

			 ]
	];


	//$_GET
	//Sama aja kaya array asosiatif
	//$_GET["nama"] = "Nurinda Utami Padoma";
	//var_dump($_GET);


?>





<!DOCTYPE html>
<html>
<head>
	<title>GET-POST</title>
</head>
<body>
<h1>GET & POST</h1>


 
<form action="get.php" method="GET">

<?php 

	foreach ($mahasiswa as $siswa) : ?>
		
		<ul>
			
			<li> 

				<a href="get.php?nama=<?= $siswa["nama"]; ?>&ttl=<?= $siswa["ttl"]; ?>&tempat=<?= $siswa["tempat"]; ?>&riwayatpen=<?= $siswa["riwayatpen"]; ?>&alamat=<?= $siswa["alamat"]; ?>&gambar=<?= $siswa["gambar"]; ?>"> <?= $siswa["nama"]; ?> 

			</a>

			</li> 


		</ul>


	<?php endforeach; ?>



</form>
















</body>
</html>