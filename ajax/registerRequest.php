<?php 
	session_start();
	include_once("../config.php");

	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$kota = $_POST['kota'];
	$alamat = $_POST['alamat'];
	$nohp = $_POST['nohp'];

	$query = "SELECT * FROM pengguna WHERE email = '$email' OR username = '$username'";
	if($result = mysqli_query($db,$query)){
		if(mysqli_num_rows($result) <= 0){
			$query = "INSERT INTO pengguna(username,namapengguna,alamat,kota,email,password,statuspengguna,telepon) VALUES ('$username','$fullname','$alamat','$kota','$email','$pass','General','$nohp')";

			if(isset($_POST['konfirmasiEmail'])){
				$code = md5(uniqid(rand()));
				$query2 = "INSERT INTO pengguna_confirm(codeconfirm,username) VALUES ('$code','$username')";
				if(mysqli_query($db,$query) && mysqli_query($db,$query2)){
					$subject = "Registrasi Ruangbaca.web.id";
					$message = "Klik pada link dibawah untuk mengaktifkan akun anda \r\n";
					$message.= "http://ruangbaca.web.id/confirmation.php?key=$code";
					$mail = mail($email,$subject,$message);
					if($mail){
						echo "y";
					} else {
						echo "E-mail konfirmasi gagal dikirim";
					}
				} else {
					echo "Register gagal";
				}
			} else {
				if(mysqli_query($db,$query)){
					echo "y";
				} else {
					echo "Registrasi gagal";
				}
			}
		} else {
			echo "Registrasi gagal: E-mail/Username sudah terdaftar";
		}
	}
?>