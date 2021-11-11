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


	









?>