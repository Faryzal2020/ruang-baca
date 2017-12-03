<?php 
	session_start();
	include_once("../config.php");

	$idPenyewaan = $_POST['idP'];
	$username = $_POST['username'];
	$status = $_POST['status'];
	$tanggal = date();

	if($status == 'terima'){
		$status = 'di_peminjam';
	} elseif($status == 'kirim'){
		$status = 'dikirim_peminjam';
	} elseif($status == 'pemilik_terima'){
		$status = 'selesai';
	}

	$query = "UPDATE detailpenyewaan as d, buku as b INNER JOIN b ON b.idbuku = d.idbuku SET d.tanggalterimabuku = '$tanggal', d.status = '$status' WHERE b.username = '$username'";
	$result = mysqli_query($db,$query);
	if($result){
		echo 'Ubah status transaksi berhasil';
	} else {
		echo 'Gagal ubah status transaksi';
	}
?>