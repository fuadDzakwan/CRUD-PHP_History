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
	
















?>