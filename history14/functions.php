<?php 

	$host = "sql206.epizy.com";
	$user = "epiz_29026645";
	$password = "pHJNSX6RFct9FUk";
	$database = "epiz_29026645_universitas";

	
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

		//upload gambar
		$photoMahasiswa = uploadImage();
		if (!$photoMahasiswa) {
	
			return false;
		}

		$jurusanMahasiswa = htmlspecialchars($newDataPost["jurusanMahasiswa"]);
		$emailMahasiswa = htmlspecialchars($newDataPost["emailMahasiswa"]);

		//... 
		$query = "INSERT INTO mahasiswa 
				  VALUES 
				  ( '', '$namaMahasiswa', '$nimMahasiswa', 
				  '$photoMahasiswa', '$jurusanMahasiswa', 
				  '$emailMahasiswa')";

		mysqli_query($connection,$query);


		return mysqli_affected_rows($connection);

	}

	function uploadImage() {

		$nameImage = $_FILES['photoMahasiswa']['name'];
		$sizeImage = $_FILES['photoMahasiswa']['size'];
		$errorImage = $_FILES['photoMahasiswa']['error'];
		$tmpName = $_FILES['photoMahasiswa']['tmp_name'];

		//cek apakah tidak ada gambar yang diupload
		// 4 -> 'tidak ada gambar yang di-upload'
		if ( $errorImage === 4) {
			
			echo "<script>alert('Please Choose Picture!');
					document.location.href = 'add.php'; 
				  </script>";
				  return false;

		}

		//cek ekstensi image pilihan, explode -> memisahkan string menjadi array
		$extensiImageValid = ['jpg','png','jpeg'];
		$extensiImage = explode('.', $nameImage);
		$extensiImage = strtolower(end($extensiImage));
		//cek ekstensi image yg diupload
		if ( !in_array($extensiImage, $extensiImageValid) ) {
			# code...
			echo "<script>alert('File : Extension not Valid!');
					document.location.href = 'add.php'; 
				  </script>";
				  return false;
		}


		//cek sizeImage 1000000 = 1mb++
		if ( $sizeImage > 1000000) {
			# code...
			echo "<script>alert('File Size : Maximum-Size, Try Again!');
					document.location.href = 'add.php'; 
				  </script>";
				  return false;
		}

		
		//membuat tidak terjadinya timpa file dengan nama yang sama
		$newNameImage = uniqid(); 
		$newNameImage .= '.';
		$newNameImage .= $extensiImage;
		//lolos pengecekan,image ready tu uploaded!
		move_uploaded_file($tmpName,'img/'.$newNameImage);

		return $newNameImage;

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
		$oldPhotoMahasiswa = htmlspecialchars($newDataPost["oldPhotoMahasiswa"]);
		$jurusanMahasiswa = htmlspecialchars($newDataPost["jurusanMahasiswa"]);
		$emailMahasiswa = htmlspecialchars($newDataPost["emailMahasiswa"]);
		
		//cek apakah user pilih gambar baru atau tidak.
		if ( $_FILES['photoMahasiswa']['error'] === 4 ) {

			$photoMahasiswa = $oldPhotoMahasiswa;

		} else {
 
			$photoMahasiswa = uploadImage();

		}
		

		$query = "UPDATE mahasiswa SET 
					namaMahasiswa =	'$namaMahasiswa',
					nimMahasiswa = '$nimMahasiswa',
					photoMahasiswa = '$photoMahasiswa',
					jurusanMahasiswa = '$jurusanMahasiswa',
					emailMahasiswa = '$emailMahasiswa'

					WHERE id = $id ";

		mysqli_query($connection,$query);


		return mysqli_affected_rows($connection);


	}

	function searchData($keyword) {

		global $connection;

		$query = "SELECT * FROM mahasiswa 
				  WHERE 
				  namaMahasiswa LIKE '%$keyword%' OR
				  nimMahasiswa LIKE '%$keyword%' OR
				  emailMahasiswa LIKE '%$keyword%' OR
				  jurusanMahasiswa LIKE '%$keyword%'
		";
			return query($query);
			//$query digunakan kembali yg ada pada line 15
			//dengan tujuan menimpa data asli dengan data searchData
			//% artinya merujuk text yg ditulis hanya awalan/akhiran untuk proses pencarian
	}



	function registrasi($dataRegister) {

		global $connection;
		//username register
		$usernameUser = strtolower( stripcslashes($dataRegister["username"]));
		$emailUser = strtolower($dataRegister["email"]);
		$passwordUser = mysqli_real_escape_string($connection, $dataRegister["password"]);
		$passwordUserVerify = mysqli_real_escape_string($connection, $dataRegister["password2"]);


		//cek username
		$cekUsername= mysqli_query($connection, "SELECT username 
							FROM registrasi WHERE username = '$usernameUser'");

			if ( mysqli_fetch_assoc($cekUsername) ) {
				# code...
				echo "<script>alert('Username Already Registered!');</script>";
				return false;
			}


		//cek password
		if ( $passwordUser !== $passwordUserVerify ) {
			# code...
				echo "<script>alert('Incorrect Password!')</script>";

				return false;

		}

		//enkripsi password
		$passwordUser = password_hash($passwordUser, PASSWORD_DEFAULT);
		
		//input to database
		mysqli_query($connection,"INSERT INTO registrasi 

								  VALUES('','$usernameUser','$emailUser','$passwordUser')");

		return mysqli_affected_rows($connection);

	}




?>