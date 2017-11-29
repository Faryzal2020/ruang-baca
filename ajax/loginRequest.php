<?php 
	session_start();
	include_once("../config.php");

	$email = $_POST['email'];
	$pass = $_POST['password'];

	$query = "SELECT * FROM pengguna WHERE email = '$email' AND password = '$pass'";

	if($result = mysqli_query($db,$query)){
		while($data = mysqli_fetch_array($result)){
			$_SESSION['username'] = $data['username'];
			$_SESSION['namapengguna'] = $data['alamat'];
			$_SESSION['kota'] = $data['kota'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['cart'] = array();
			echo $_SESSION['username'];
		}
	}
?>