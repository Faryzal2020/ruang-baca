<?php 
	session_start();
	include_once("../config.php");

	$email = $_POST['email'];
	$pass = $_POST['password'];

	$query = "SELECT * FROM pengguna WHERE email = '$email' AND password = '$pass'";


	if($result = mysqli_query($db,$query)){
		while($data = mysqli_fetch_array($result)){
			$username = $data['username'];
			$query2 = "SELECT * FROM pengguna_confirm WHERE username = '$username'";
			$result2 = mysqli_query($db,$query2);
			if($result2){
				if(mysqli_num_rows($result2) > 0){
					echo "E-mail untuk akun ini belum dikonfirmasi";
				} else {
					$_SESSION['username'] = $username;
					$_SESSION['namapengguna'] = $data['alamat'];
					$_SESSION['kota'] = $data['kota'];
					$_SESSION['email'] = $data['email'];
					$_SESSION['cart'] = array();
					echo "y";
				}
			}
		}
	} else {
		echo "n";
	}
?>