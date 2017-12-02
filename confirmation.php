<?php
	session_start();
	include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-mail confirmation</title>
	<style type="text/css">
		span { display:block; margin: auto; width: 100%; text-align: center; }
		.pencetan { display: block; margin: auto; padding: 9px; margin-top: 17px; cursor: pointer; border-radius: 5px; background-color: #7cb71b; color: white; font-size: 1.1em; border: 1px solid #6a9e16;}
		.pencetan:hover { background-color: #6a9e16; }
	</style>
</head>
<body>
<div>
	<div class="logo">
		<img onclick="window.location.href = '<?php echo ROOT_URL; ?>'" style="cursor: pointer; margin: auto; width: 440px; max-width: 50%; display: block;" src="
			<?php if(file_exists('images/logo2.PNG')){echo 'images/logo2.PNG';} else { echo ROOT_URL . '/images/logo3.PNG';}?>">
	</div>
<?php
	$key = "";
	if(isset($_GET['key'])){
		$key = $_GET['key'];
	}
	$query = "SELECT * FROM pengguna_confirm WHERE codeconfirm = '$key'";
	$result = mysqli_query($db,$query);
	if(mysqli_num_rows($result) > 0){
		$query = "DELETE FROM pengguna_confirm WHERE codeconfirm = '$key'";
		$result = mysqli_query($db,$query);
?>
		<span>Konfirmasi e-mail berhasil</span>
		<button class="pencetan" onclick="window.location.href = '<?php echo ROOT_URL . '/p/login'; ?>'">Ke halaman login</button>
	</div>
	<?php } else { ?>
		<span>Invalid key</span>
	</div>
	
	<?php }
?>
</body>
</html>