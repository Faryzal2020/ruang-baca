<?php 
	session_start();
	include_once("../config.php");

	$pemberi = $_SESSION['username'];
	$pesan = $_POST['pesan'];
	$rating = $_POST['rating'];
	$penerima = $_POST['penerima'];
	$tanggal = date("Y-m-d H:i:s");

	$query = mysqli_query($db,"SELECT * FROM ulasan WHERE pemberi = '$pemberi' AND penerima = '$penerima' ");
	if($query){
		if(mysqli_num_rows($query) > 0){
			$query = mysqli_query($db,"UPDATE ulasan SET ulasan.pesan = '$pesan', ulasan.rating = '$rating', ulasan.tanggal = '$tanggal' WHERE ulasan.pemberi = '$pemberi' AND ulasan.penerima = '$penerima' ");
			$msg = "Berhasil mengupdate ulasan untuk username ".$penerima;
		} else {
			$query = mysqli_query($db,"INSERT INTO ulasan(pemberi,penerima,pesan,rating,tanggal) VALUES ('$pemberi','$penerima','$pesan','$rating','$tanggal')");
			$msg = "Berhasil menambahkan ulasan untuk username ".$penerima;
		}
		if($query){
			echo $msg;
		}
	}
?>