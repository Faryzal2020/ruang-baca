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
		

		function validateLogin(){
			getURLS();
			var email = document.forms["login-form"]["email"].value;
			var password = document.forms["login-form"]["password"].value;
			if(email == "" || password == ""){
				document.getElementById("warning-label").innerHTML = "Semua kolom harus diisi";
				document.getElementById("warning-label").style.display = "";
			} else {
				document.getElementById("warning-label").style.display = "none";
				$.ajax({
		            dataType: 'html',
		            url:'../../ajax/loginRequest.php',
		            method:'post',
		            data : {'email':email,'password':password },
		            success:function(response){
		            	if(response == "y"){
		            		if(prevURL == rootURL+"/p/register/"){
		            			window.location = rootURL;
		            		} else {
		            			window.location = prevURL;
		            		}
		            	} else if(response == "n"){
		            		document.getElementById("warning-label").innerHTML = "Password atau Email salah";
							document.getElementById("warning-label").style.display = "";
		            	} else {
		            		document.getElementById("warning-label").innerHTML = response;
							document.getElementById("warning-label").style.display = "";
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
			<p>Login</p>
			<form class="loginregister-form" id="login-form">
				<fieldset id="login">
					<ul>
						<label>E-mail</label>
						<li>
							<input type="email" name="email">
						</li>
						<label>Password</label>
						<li>
							<input type="password" name="password">
						</li>
						<label id="warning-label" style="display: none; color: red; font-size: 0.9em;"></label>
						<button type="button" class="btn loginregister-btn" onclick="validateLogin()">Masuk</button>
					</ul>
				</fieldset>
			</form>
			<a href="<?php echo ROOT_URL;?>" style="width: fit-content; display: inline-block;"><span class="glyphicon glyphicon-chevron-left"></span>Kembali</a>
			<a href="<?php echo ROOT_URL . '/p/register';?>" style="width: fit-content; display: inline-block; float: right;">Belum punya account</a>
		</div>
	</div>
</div>
</body>
</html>