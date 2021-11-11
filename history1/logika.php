<!DOCTYPE html>
<html>
<head>
	<title>ELSE IF ELSE</title>
	<style type="text/css">
			.warna {
				background-color: yellow;

			}
			.color {
				background-color: green;
			}
			.hiasan {
				background-color: brown;
			}
			.cet {
				background-color: magenta;
			}

	</style>
</head>
<body>
	<!--MEMBUAT PEWARNAAN DENGAN LOGIKA GANJI-GENAP-->
<table border="1" cellpadding="10" cellspacing="1">
			
			<?php  
					for ($baris=1; $baris <= 10 ; $baris++) : ?>

						<?php if ($baris % 2 == 1) : ?>
							<tr class="cet">
								<?php else : ?>
									<tr class="hiasan">

									<?php endif; ?>

								<?php for ($kolom = 1; $kolom <= 20 ; $kolom++) : ?>

									<?php ?>

									<td> <?= "$baris,$kolom" ?> </td>

								<?php endfor; ?>

							</tr>

					<?php endfor; ?>





		</table>
</body>
</html>