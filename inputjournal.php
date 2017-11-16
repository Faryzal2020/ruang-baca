<?php
	session_start();
	include("../../config.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css">
   	<link rel="stylesheet" type="text/css" href="../../css/jquery-ui.css">
   	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
   	<link rel="stylesheet" type="text/css" href="../../css/style.css">
    <script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script type="text/javascript" src="../../js/jquery-ui.js"></script>
	<script type="text/javascript">
		var rootURL;
		var prevURL;
		var currentURL;
		function getURLS(){
			rootURL = "http://" + window.location.hostname + document.getElementById("ROOT-URL").innerHTML;
			prevURL = document.referrer;
			currentURL = window.location.href;
		}

		function validateInputjournal(){
			getURLS();
			var username = document.forms["jurnal-form"]["user-name"].value;
			var juduljurnal = document.forms["jurnal-form"]["judul-jurnal"].value;
			var tulisan = document.forms["jurnal-form"]["tulisan"].value;
			if(username == "" || juduljurnal == "" || tulisan == ""){
				document.getElementById("warning-label").innerHTML = "Semua kolom harus diisi";
				document.getElementById("warning-label").style.display = "";
			} else {
					document.getElementById("warning-label").style.display = "none";
					$.ajax({
	            		dataType: 'html',
			            url:'../../ajax/registerRequest.php',
			            method:'post',
			            data : {'username':username,'juduljurnal':juduljurnal,'tulisan':tulisan},
			            success:function(response){
			            	if(response == "y"){
			            		alert("Berhasil menginput jurnal");
			            		window.location = rootURL+"/p/login/";
			            	} else {
			            		alert(response);
			            	}
			            }
			        });
				}
			}	
	</script>
</head>
<body>
<label onload="getURLS()" id="ROOT-URL" style="display: none"><?php echo ROOT_URL; ?></label>
<div class="body">
	<div class="container" style="height: fit-content;">
		<div style="text-align: center;" >
			<img src="../../images/logo2.PNG" width="300">
		</div>
		<div class="loginregisterContainer">
			<p>Isi Jurnal Membaca</p>
			<form class="readingjurnal-form" id="jurnal-form">
				<fieldset id="register">
					<ul>
						<label>Username</label>
						<li>
							<input type="text" name="user-name">
						</li>
						<label>Judul Buku</label>
						<li>
							<input type="text" name="judul-jurnal">
						</li>
						<label>Pengarang</label>
						<li>
							<input type="text" name="pengarang">
						</li>						
						<label>Jurnal/Review</label>
						<li>
							<textarea type="text" name="tulisan" rows="5" ></textarea>
						</li>
						<br>
						<label id="warning-label" style="display: none; color: red; font-size: 0.9em;"></label>
						<button type="button" class="btn inputjurnal-btn" onclick="validateInputjournal()">Submit</button>
					</ul>
				</fieldset>
			</form>
			<a href="<?php echo ROOT_URL;?>" style="width: fit-content; display: inline-block;"><span class="glyphicon glyphicon-chevron-left"></span>Kembali</a>
			<a href="<?php echo ROOT_URL . '/p/outputjournal';?>" style="width: fit-content; display: inline-block; float: right;">Lihat Journal Anda</a>
		</div>
	</div>
</div>
</body>
</html>