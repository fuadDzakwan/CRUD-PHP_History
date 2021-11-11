<?php
	
	for ($i=0; $i < 10  ; $i++) { 
		# code...
		echo "HELLO WORLD<br>";
	}


	$tampil = 0;
	while ($tampil <= 10) {
		# code...
		echo "HAII SEMUANYA <br>";
		$tampil++;
	}


	$muncul = 0;
	do {
		echo "DUNIA PHP <br>";
		$muncul++;
	} while ($muncul <= 10);

	

//create table
 ?>

 <!DOCTYPE html>
	<html>
	<head>
		<title>FOR-WHILE PHP</title>
	</head>
	<body>
			<!-- cara 1-->	
		<table border="1" cellpadding="10" cellspacing="0"> 
		
			<?php
					for ($baris=1; $baris <= 10 ; $baris++) { 
						# code...
						echo "<tr>";
						for ($kolom=1; $kolom <= 10 ; $kolom++) { 
							# code...
							echo "<td>$baris,$kolom</td>";
						}
						echo "</tr>";
					}
						/* <?php echo ?> sama aja dengan <?=  ?> */
			 ?>

		</table>

		<br>

		<!-- cara 2-->

		<table border="1" cellpadding="10" cellspacing="1">
			
			<?php 
					for ($baris=1; $baris <= 7 ; $baris++) : //pengganti { buka : ?>
							<tr>
								<?php for ($kolom = 1; $kolom <= 5 ; $kolom++) : ?>
									<td> <?= "$baris,$kolom" ?> </td>
								<?php endfor; // pengganti } tutup 'endfor;' ?>
							</tr>
					<?php endfor; ?>





		</table>

	</body>
	</html>
