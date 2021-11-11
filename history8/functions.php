<?php 

	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "universitas";

	
	$connection = mysqli_connect($host,$user,$password,$database);
	if (!$connection) {
		die("DATABASE-MYSQLi ERROR : NOT FOUND!"."|".mysqli_connect_error());
	}


	function query($query) {

		global $connection;
		$result = mysqli_query($connection,$query);
		$rows = [];
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
			return $rows;
	}
	


	function addData($newDataPost) {

		global $connection;

		$namaMahasiswa = htmlspecialchars($newDataPost["namaMahasiswa"]);
		$nimMahasiswa = htmlspecialchars($newDataPost["nimMahasiswa"]);
		$photoMahasiswa = htmlspecialchars($newDataPost["photoMahasiswa"]);
		$jurusanMahasiswa = htmlspecialchars($newDataPost["jurusanMahasiswa"]);
		$emailMahasiswa = htmlspecialchars($newDataPost["emailMahasiswa"]);
		
		$query = "INSERT INTO mahasiswa 
				  VALUES 
				  ( '', '$namaMahasiswa', '$nimMahasiswa', 
				  '$photoMahasiswa', '$jurusanMahasiswa', 
				  '$emailMahasiswa')";

		mysqli_query($connection,$query);


		return mysqli_affected_rows($connection);

	}


	function deleteData($id) {

		global $connection;

		mysqli_query($connection,"DELETE FROM mahasiswa WHERE id = $id");

		return mysqli_affected_rows($connection);

	}


	function updateData($newDataPost) {

		global $connection;

		$id = $newDataPost["id"];
		$namaMahasiswa = htmlspecialchars($newDataPost["namaMahasiswa"]);
		$nimMahasiswa = htmlspecialchars($newDataPost["nimMahasiswa"]);
		$photoMahasiswa = htmlspecialchars($newDataPost["photoMahasiswa"]);
		$jurusanMahasiswa = htmlspecialchars($newDataPost["jurusanMahasiswa"]);
		$emailMahasiswa = htmlspecialchars($newDataPost["emailMahasiswa"]);
		
		$query = "UPDATE mahasiswa SET 
					namaMahasiswa =	'$namaMahasiswa',
					nimMahasiswa = '$nimMahasiswa',
					photoMahasiswa = '$photoMahasiswa',
					jurusanMahasiswa = '$jurusanMahasiswa',
					emailMahasiswa = '$emailMahasiswa'

					WHERE id = $id				

					";

		mysqli_query($connection,$query);


		return mysqli_affected_rows($connection);


	}

	function searchData($keyword) {

		global $connection;

		$query = "SELECT * FROM mahasiswa 
				  WHERE 
				  namaMahasiswa LIKE '%$keyword%' OR
				  nimMahasiswa LIKE '%$keyword%' OR
				  jurusanMahasiswa LIKE '%$keyword%' OR
				  emailMahasiswa LIKE '%$keyword%'
		";
			return query($query);
			//$query digunakan kembali yg ada pada line 15
			//dengan tujuan menimpa data asli dengan data searchData
			//% artinya merujuk text yg ditulis hanya awalan/akhiran untuk proses pencarian
	}





?>