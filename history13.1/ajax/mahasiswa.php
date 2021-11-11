<?php 

require '../functions.php';
 
 $keyword = $_GET["keyword"];


$query = "SELECT * FROM mahasiswa 
				  WHERE 
				  namaMahasiswa LIKE '%$keyword%' OR
				  nimMahasiswa LIKE '%$keyword%' OR
				  emailMahasiswa LIKE '%$keyword%' OR
				  jurusanMahasiswa LIKE '%$keyword%'
		";
$mahasiswa = query($query);
?>

<table cellpadding="45" cellspacing="0" border="1" class="d-table">
		<tr>
			<th style="text-align: center;">No</th>
			<th style="text-align: center;">Nama</th>
			<th style="text-align: center;">NIM</th>
			<th style="text-align: center;">Photo</th>
			<th style="text-align: center;">Jurusan</th>
			<th style="text-align: center;">Email</th>
			<th style="text-align: center;">Settings</th>
		</tr>

		<?php $no = 1; ?>
		<?php foreach ( $mahasiswa as $row ) : ?>
		<tr>
			
			<td style="text-align: center;"><?= $no; ?></td>
			<td style="text-align: center;"><?= $row["namaMahasiswa"]; ?></td>
			<td style="text-align: center;"><?= $row["nimMahasiswa"]; ?></td>
			<td style="text-align: center;"><img src="img/<?=$row["photoMahasiswa"];?>" style="max-width: 30%; display: block; height: auto; padding-right: -5rem;"></td>
			<td style="text-align: center;"><?= $row["jurusanMahasiswa"]; ?></td>
			<td style="text-align: center;"><?= $row["emailMahasiswa"]; ?></td>
			<td style="text-align: center;"> <a href="edit.php?id=<?= $row["id"]; ?>">Edit</a> |
				 <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Drop Row ?');">Hapus</a>
			</td>
			
		</tr>
		<?php $no++; ?>
	<?php endforeach; ?>

	</table>


