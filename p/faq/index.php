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
</head>
<body>
<div class="backgroundHeader">
</div>
<div class="body">
	<?php include_once(ROOT_DIR . "/header.php"); ?>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
					<span class="icon-bar"></span>
	        		<span class="icon-bar"></span>
	        		<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="mainNavbar">
				<ul class="nav navbar-nav">
			    	<li><a href="<?php echo ROOT_URL;?>">Home</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/catalog';?>">Catalog</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/quotes';?>">Quotes</a></li>
			    	<li><a href="#">Reading Journal</a></li>
			    	<li><a href="#">RuBa Community</a></li>
			    	<li class="active"><a href="<?php echo ROOT_URL . '/p/faq';?>">FAQ</a></li>
				</ul>
				<form class="navbar-form navbar-right">
				    <div class="input-group">
				    	<input type="text" class="form-control" placeholder="Search">
				    	<div class="input-group-btn">
				    		<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
				    	</div>
				    </div>
		    	</form>
			</div>
		</div>
	</nav>
	<div class="mainpage row" style="padding: 0px 50px">
		<div class="col-md-12" style="margin-bottom: 60px;">
			<div class="sectionTitle">
				<label>FAQ</label>
			</div>
			<div class="faqWrapper">
				<div class="faqPanel panel panel-default">
					<button class="panel-heading" data-toggle="collapse" data-target="#faq-1">
						<div class="left">
							<span class="glyphicon glyphicon-question-sign"></span>
						</div>
						<div class="right">
							<span class="question">Apa itu Ruang Baca?</span>
						</div>
					</button>
					<div id="faq-1" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Dilatar belakangi oleh kurangnya minat membaca sebagian masyarakat Indonesia, Ruang Baca hadir secara online sebagai wadah untuk sewa-menyewa buku, sehingga para peminat baca tidak perlu mengeluarkan uang lebih untuk membeli buku baru di toko buku, para pemilik buku juga dapat menyewakan bukunya dengan aman di Ruang Baca.</span>
							</div>
						</div>
					</div>
				</div>
				<div class="faqPanel panel panel-default">
					<button class="panel-heading" data-toggle="collapse" data-target="#faq-2">
						<div class="left">
							<span class="glyphicon glyphicon-question-sign"></span>
						</div>
						<div class="right">
							<span class="question">Apa saja fitur yang disuguhkan Ruang Baca selain sewa-menyewa buku?</span>
						</div>
					</button>
					<div id="faq-2" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Selain sewa-menyewa buku, Ruang Baca juga menghadirkan fitur Reading Journal yang akan memfasilitasi anda dalam memberikan pengalaman membaca anda berupa review, RuBa Community Club, sebuah wadah dimana para penikmat baca dapat saling menukar buku dan memberikan buku secara cuma-cuma.</span>
							</div>
						</div>
					</div>
				</div>
				<div class="faqPanel panel panel-default">
					<button class="panel-heading" data-toggle="collapse" data-target="#faq-3">
						<div class="left">
							<span class="glyphicon glyphicon-question-sign"></span>
						</div>
						<div class="right">
							<span class="question">Apakah sewa-menyewa di Ruang Baca aman?</span>
						</div>
					</button>
					<div id="faq-3" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Di Ruang Baca, kami baru memberikan fitur COD (Cash on Delivery) dalam  mekanisme sewa menyewa buku, sehingga, buku yang akan anda sewa pasti aman. Kami juga memberikan keamanan untuk pemilik buku dengan mewajibkan setiap pengguna Ruang Baca untuk berfoto dengan menggunakan KTP asli yang dimilikinya. </span>
							</div>
						</div>
					</div>
				</div>
				<div class="faqPanel panel panel-default">
					<button class="panel-heading" data-toggle="collapse" data-target="#faq-4">
						<div class="left">
							<span class="glyphicon glyphicon-question-sign"></span>
						</div>
						<div class="right">
							<span class="question">Bagaimana Cara Sewa-Menyewa di Ruang Baca?</span>
						</div>
					</button>
					<div id="faq-4" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Sebelum dapat menyewa atau menyewakan buku, anda harus mendaftarkan diri sebagai anggota Ruang Baca dan memverifikasi email anda terlebih dahulu. Anda wajib mendaftar jika ingin menulis di Reading Journal, meminta Trade, serta memberikan Giveaway. Pendaftaran ini wajib dilakukan demi keamanan dan kenyamanan bersama. </span>
							</div>
						</div>
					</div>
				</div>
				<div class="faqPanel panel panel-default">
					<button class="panel-heading" data-toggle="collapse" data-target="#faq-5">
						<div class="left">
							<span class="glyphicon glyphicon-question-sign"></span>
						</div>
						<div class="right">
							<span class="question">Setelah mendaftar, apakah saya harus menyewakan buku?</span>
						</div>
					</button>
					<div id="faq-5" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Setelah mendaftar, anda tidak diwajibkan untuk menyewakan buku, anda tetap dapat menikmati fitur-fitur Ruang Baca lainnya seperti Reading Journal, Trade Request dan Giveaway. </span>
							</div>
						</div>
					</div>
				</div>
				<div class="faqPanel panel panel-default">
					<button class="panel-heading" data-toggle="collapse" data-target="#faq-6">
						<div class="left">
							<span class="glyphicon glyphicon-question-sign"></span>
						</div>
						<div class="right">
							<span class="question">Apa yang harus saya lakukan jika penyewa atau pemilik buku tidak hadir secara mendadak pada saat proses COD (Cash on Delivery)?</span>
						</div>
					</button>
					<div id="faq-6" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Apabila penyewa atau pemilik buku tidak hadir secara mendadak pada saat proses COD (Cash on Delivery) anda dapat langsung menghubungi pusat panggilan Ruang Baca di +62 812188889 (Whatsapp Available). </span>
							</div>
						</div>
					</div>
				</div>
				<div class="faqPanel panel panel-default">
					<button class="panel-heading" data-toggle="collapse" data-target="#faq-7">
						<div class="left">
							<span class="glyphicon glyphicon-question-sign"></span>
						</div>
						<div class="right">
							<span class="question">Bagaimana caranya untuk menulis pesan dan kritik untuk Ruang Baca?</span>
						</div>
					</button>
					<div id="faq-7" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Anda hanya perlu mengisi formulir berikut. </span>
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