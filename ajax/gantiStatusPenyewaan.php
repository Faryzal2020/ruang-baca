<?php 
	session_start();
	include_once("../config.php");

	$idPenyewaan = $_POST['idP'];
	$username = $_POST['username'];
	$status = $_POST['status'];
	$tanggal = date('Y-m-d');

	if($status == 'terima'){
		$status = 'di_peminjam';
	} elseif($status == 'kirim'){
		$status = 'dikirim_peminjam';
	} elseif($status == 'pemilik_terima'){
		$status = 'selesai';
	}
	$query = "UPDATE detailpenyewaan, buku SET detailpenyewaan.tanggalterimabuku = '$tanggal', detailpenyewaan.status = '$status' WHERE buku.username = '$username' AND buku.idbuku = detailpenyewaan.idbuku AND detailpenyewaan.idpenyewaan = '$idPenyewaan'";
	$result = mysqli_query($db,$query);
	if($result){
		echo 'Ubah status transaksi berhasil';
	} else {
		echo 'Gagal ubah status transaksi';
	}
?>