<?php 
	session_start();
	include_once("../config.php");

	$idbuku = $_POST['idbuku'];

	$queryBuku = mysqli_query($db,"SELECT p.namapengguna, p.username FROM pengguna as p, buku as b WHERE p.username = b.username AND b.idbuku = '$idbuku'");

	while($data = mysqli_fetch_array($queryBuku)){
		$owner = array($data['namapengguna'],$data['username']);
		echo json_encode($owner);
		break;
	}
?>