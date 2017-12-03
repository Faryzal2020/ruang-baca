<?php 
	session_start();
	include_once("../config.php");

	$username = $_SESSION['username'];
	$cart = json_decode(stripslashes($_POST['data']));
	$totalbiaya = $_POST['totalBayar'];

	if(mysqli_query($db,"INSERT INTO penyewaan(username,totalbiaya,metodekirim) VALUES ('$username','$totalbiaya','cod')")){
		$query = mysqli_query($db, "SELECT idpenyewaan FROM penyewaan WHERE username = '$username' AND totalbiaya = '$totalbiaya'");
		while($data = mysqli_fetch_array($query)){
			$pinjam = 0;
			for ($i=0; $i < count($cart); $i++) { 
				$idbuku = $cart[$i];
				$idpenyewaan = $data['idpenyewaan'];
				if(mysqli_query($db,"INSERT INTO detailpenyewaan(idpenyewaan,idbuku,durasi,status) VALUES ('$idpenyewaan','$idbuku','1','dikirim_pemilik')")){
					$pinjam = 1;
				}
			}
			if($pinjam == 1){
				echo "Pemesanan peminjaman buku berhasil";
			}
			break;
		}
	}
	
?>