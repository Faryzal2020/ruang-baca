<?php 
	session_start();
	include("../../config.php");
	
	if(isset($_GET['id']))
	{
		echo "asd";
		$queryGiveaway = mysqli_query($db,"UPDATE giveaway SET penerima='".$_SESSION['username']."', status = 'Diambil' WHERE idgiveaway='".$_GET['id']."'");
		echo '<script type="text/javascript">alert("Buku Berhasil Diambil");</script>';

		if($queryGiveaway != null)
		{
			header('Location: ../profile/');
		}
		
	}
?>