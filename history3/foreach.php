<?php 
	//array didalam array
	//nama,nim,jurusan,email,nohp
	$students = [ 

		["Fuad Jabbar Dzakwan","0002828270","Teknik Informatika","fuaddzakwan26@gmail.com","089508287481"],
		["Nurinda Utami Padoma","0002458470","Agrobisnis","nurinda_fuad22@gmail.com","08218780122"],
		["Fuad & Nurinda","262212002","Akad","nurinda22_fuad26@gmail.com","01221226002"]

	];


?>
<!DOCTYPE html>
<html>
<head>
	<title>ARRAY FOREACH</title>
</head>
<body>

	<h1>DATA MAHASISWA</h1>


	<?php foreach ($students as $student) : ?>
	
		<ul>
			<li>NAMA 	: <?= $student[0]; ?> </li>
			<li>NIM  	: <?= $student[1]; ?></li>
			<li>JURUSAN : <?= $student[2]; ?></li>
			<li>EMAIL 	: <?= $student[3]; ?></li>
			<li>NO-HP 	: <?= $student[4]; ?></li>
		</ul>

	<?php endforeach; ?>










</body>
</html>