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
		$(document).ready(function(){
			disableRegister();
		});
		var rootURL;
		var prevURL;
		var currentURL;
		function getURLS(){
			rootURL = "http://" + window.location.hostname + document.getElementById("ROOT-URL").innerHTML;
			prevURL = document.referrer;
			currentURL = window.location.href;
		}

		function isEmail(email){
			return /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$/.test( email );	
		}

		function disableRegister(){
			alert("Maaf untuk saat ini fitur register masih belum siap untuk digunakan.");
			var input = document.getElementsByTagName("input");
			for (var i = input.length - 1; i >= 0; i--) {
				input[i].readOnly = true;
			}
		}

		function validateRegister(){
			getURLS();
			var fullname = document.forms["register-form"]["full-name"].value;
			var username = document.forms["register-form"]["user-name"].value;
			var password = document.forms["register-form"]["password"].value;
			var password2 = document.forms["register-form"]["password2"].value;
			var email = document.forms["register-form"]["email"].value;
			var kota = document.forms["register-form"]["kota"].value;
			var alamat = document.forms["register-form"]["alamat"].value;
			var nohp = document.forms["register-form"]["no-hp"].value;
			console.log(email);
			if(fullname == "" || username == "" || email == "" || password == "" || kota == "" || alamat == "" || nohp == ""){
				document.getElementById("warning-label").innerHTML = "Semua kolom harus diisi";
				document.getElementById("warning-label").style.display = "";
			} else {
				if(password != password2){
					document.getElementById("warning-label").innerHTML = "Password tidak sesuai";
					document.getElementById("warning-label").style.display = "";
					document.forms["register-form"]["password2"].classList.add("outlineRed");
					document.forms["register-form"]["password2"].value = "";
				} else {
					if(isEmail(email)){
						document.getElementById("warning-label").style.display = "none";
						$.ajax({
		            		dataType: 'html',
				            url:'../../ajax/registerRequest.php',
				            method:'post',
				            data : {'fullname':fullname,'username':username,'email':email,'password':password,'kota':kota,'alamat':alamat,'nohp':nohp},
				            success:function(response){
				            	if(response == "y"){
				            		alert("E-mail konfirmasi telah dikirim ke alamat e-mail anda, klik pada link yang terdapat didalam e-mail tersebut untuk mengaktifkan akun anda");
				            		window.location = rootURL+"/p/login/";
				            	} else {
				            		alert(response);
				            	}
				            }
				        });
					} else {
						document.getElementById("warning-label").innerHTML = "Format E-mail tidak valid";
						document.getElementById("warning-label").style.display = "";
						document.forms["register-form"]["email"].classList.add("outlineRed");
						document.forms["register-form"]["email"].value = "";
					}
				}
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
			<p>Daftar</p>
			<form class="loginregister-form" id="register-form">
				<fieldset id="register">
					<ul>
						<label>Nama Lengkap</label>
						<li>
							<input type="text" name="full-name">
						</li>
						<label>Username</label>
						<li>
							<input type="text" name="user-name">
						</li>
						<label>Password</label>
						<li>
							<input type="password" name="password">
						</li>
						<label>Ketik ulang password</label>
						<li>
							<input type="password" onclick="this.classList.remove('outlineRed'); document.getElementById('warning-label').style.display = 'none';" name="password2">
						</li>
						<label>E-mail</label>
						<li>
							<input type="email" onclick="this.classList.remove('outlineRed'); document.getElementById('warning-label').style.display = 'none';" name="email">
						</li>
						<label>Kota</label>
						<li>
							<input type="text" name="kota">
						</li>
						<label>Alamat</label>
						<li>
							<input type="text" name="alamat">
						</li>
						<label>No Handphone</label>
						<li>
							<input type="tel" name="no-hp">
						</li>
						<label id="warning-label" style="display: none; color: red; font-size: 0.9em;"></label>
						<button type="button" class="btn loginregister-btn disabled" onclick="//validateRegister()">Daftar Akun</button>
					</ul>
				</fieldset>
			</form>
			<a href="<?php echo ROOT_URL.'/';?>" style="width: fit-content; display: inline-block;"><span class="glyphicon glyphicon-chevron-left"></span>Kembali</a>
			<a href="<?php echo ROOT_URL . '/p/login';?>" style="width: fit-content; display: inline-block; float: right;">Sudah punya account</a>
		</div>
	</div>
</div>
</body>
</html>