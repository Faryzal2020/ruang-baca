<?php
session_start();
include("../config.php");

if(isset($_GET['n'])){
	$myusername = "";
	$username = $_GET['n'];
	if(isset($_SESSION['username'])){
		$myusername = $_SESSION['username'];
	}
	$query = mysqli_query($db,"SELECT * FROM pengguna WHERE username = '$username' AND username != '$myusername'");
	if($query){
		while($data = mysqli_fetch_array($query)){
			$nama = $data['namapengguna'];
			$alamat = $data['alamat'];
			$kota = $data['kota'];
			$email = $data['email'];
			$tanggalreg = $data['tanggalregist'];
			$telp = $data['telepon'];
		}
	}
} else {
	header("Location: ".ROOT_URL.'/');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript">
	</script>
</head>
<body>
	<div class="backgroundHeader">
	</div>
	<div class="body">
		<?php include_once(ROOT_DIR . "/header.php"); ?>
		<div class="mainpage row" style="padding: 0px 50px">
			<div class="container-fluid" style="width: 1190px!important; margin: 0 auto!important;">
				<div class="row row-fluid">
					<div class="userpage-header">
						<div class="row header1">
							<div class="col-md-2">
								<div class="profpic-container">
									<div class="profpic"></div>
								</div>
							</div>
							<div class="col-md-10" style="height: 100%;">
								<div class="name-container">
									<div class="nama"><?php echo $nama;?></div>
								</div>
							</div>
						</div>
						<div class="row header2">
							<div class="col-md-12" style="height: 100%;">
								<button class="btn btnlihatdetailuser">Informasi User</button>
							</div>
						</div>
						
					</div>
					<div class="userpage-tabbing">
						<ul class="nav nav-tabs">
						  	<li class="active"><a href="#">Koleksi Buku</a></li>
						  	<li><a href="#">Ulasan</a></li>
						</ul>
					</div>
					<div class="userpage-page" id="userpage-page1">
						<div class="row">
							<div class="col-md-4">
								
							</div>
							<div class="col-md-8">
								<div class="userinfo-container">
									<span></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
	</div>
</body>
</html>
