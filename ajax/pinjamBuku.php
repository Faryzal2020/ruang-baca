<?php 
	session_start();
	include_once("../config.php");

	$username = $_SESSION['username'];
	$cart = json_decode(stripslashes($_POST['data']));
	
	$query = "INSERT INTO penyewaan(username,ongkoskirim,metodekirim,totalbiaya) VALUES ('$username','$fullname','$alamat','$kota','$email','$pass','General')";
	if(mysqli_query($db,$query)){
		echo "y";
	}
?>