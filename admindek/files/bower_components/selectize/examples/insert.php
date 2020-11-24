<?php 
	$user_name = "root";
	$password = "";
	$database = "unitedtractors1";
	$host_name = "localhost";
	$conn = new mysqli($host_name, $user_name, $password,$database);
    
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "Berhasil";
	}

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$nama = $_POST['nama'];

		$sql = mysqli_query($conn, "INSERT INTO tabelcoba VALUES ('$id','$nama')");
	}
?>