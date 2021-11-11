<?php

	$days = ["Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu","Minggu"];
	var_dump($days);


	echo "<br>";
	echo "<br>";
	echo "<br>";


	$month = ["Januari","Februari","Maret","April","Mei","Juni"];
	print_r($month);

	//array pada php bisa memasukan nilai beda tipe data, misal : ada int,ada string dan ada juga boolean.
	//menampilkan isi data pada array.
	//var_dump() dan print_r digunakan oleh administrator untk melakukan debbuging.
	//apabila ingin menampilkan hasil array kepada 

	echo "<br>";
	echo "<br>";
	echo "<br>";

	echo "Ini Hari : ".$days[5];

	echo "<br>";
	echo "<br>";
	echo "<br>";

	echo "Ini Bulan : ".$month[4];

	//pengulangan pada array bisa dilakukan dengan for dan foreach
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";


	$numbers = [34,54,21,2,4,6,76,43,77,90,21,2,4,6];


 ?>
 	<!DOCTYPE html>
 	<html>
 	<head>
 		<style>
 			.bentuk {
 				width: 50px;
 				height: 50px;
 				background-color: silver;
 				color: magenta;
 				text-align: center;
 				line-height: 50px;
 				float: left;
 				font-size: 24px; 
 				margin : 3px;
 			}
 			.clear {
 				clear: both;
 			}
 		</style>
 		<!--line height untuk tulisanya ada di tengah" kotak(div). -->
 		<title>ARRAY</title>
 	</head>
 	<body>


 		<?php for ($angka = 0; $angka < count($numbers); $angka++) : ?>
 	<div class="bentuk"> <?= $numbers [$angka]; ?> </div>
 		<?php endfor; ?>



 		<div class="clear"></div>




 		<?php foreach ($numbers as $number) : ?>
 		 <div class="bentuk"> <?= $number;  ?></div>
 		<?php endforeach; ?>







 	</body>
 	</html>