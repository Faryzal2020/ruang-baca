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
			    	<li><a href="<?php echo ROOT_URL .'/';?>">Home</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/catalog';?>">Catalog</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/quotes';?>">Quotes</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/jurnal';?>">Reading Journal</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/community';?>">RuBa Community</a></li>
			    	<li class="active"><a href="<?php echo ROOT_URL . '/p/faq';?>">FAQ</a></li>
			    	<li><a class="feedbackBtn" href="https://goo.gl/K1UMh3">Feedback</a></li>
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
								<span class="answer">Tagline : Wadah Saling Pinjam dan Sewa Buku Favorit dengan Mudah!<br>Dilatarbelakangi oleh kurangnya minat membaca masyarakat Indonesia, Ruang Baca hadir sebagai wadah untuk sewa-menyewa buku secara online, sehingga masyarakat dapat membaca buku tanpa perlu mengeluarkan uang lebih banyak untuk membeli buku baru di toko buku. Para kolektor buku juga dapat menyewakan bukunya di Ruang Baca sehingga menghasilkan penghasilan.</span>
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
								<span class="answer">Selain sewa-menyewa buku, Ruang Baca juga menghadirkan fitur Reading Journal yang akan memfasilitasi kamu untuk membaca dan membuat ulasan buku. Lalu ada RuBa Community Club, yang memungkinkan kamu untuk menukarkan buku dengan pengguna lain dan mengikuti serta mengadakan giveaway buku.</span>
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
							<span class="question">Apakah untuk menikmati fitur tersebut harus melakukan registrasi?</span>
						</div>
					</button>
					<div id="faq-3" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Ya. Jika kamu tidak melakukan registrasi, maka kamu hanya dapat melihat-lihat konten yang ada saja, tidak dapat menambah atau bertransaksi sewa-menyewa buku.</span>
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
							<span class="question">Bagaimana Cara Menyewa Buku di Ruang Baca?</span>
						</div>
					</button>
					<div id="faq-4" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Sebelum dapat menyewa atau menyewakan buku, kamu harus mendaftarkan diri sebagai anggota Ruang Baca. Setelah terdaftar, masuk ke akunmu. Lalu kamu bisa memilih buku yang diinginkan melalui katalog buku dengan klik tombol keranjang/cart. Kamu bisa pilih dari pengguna yang berbeda! Jika sudah selesai, kamu ke bagian keranjang yang ada di kanan atas dan pilih checkout. Pastikan informasi yang ada sesuai dengan keinginanmu. Untuk saat ini hanya bisa COD dan terbatas pada daerah Jabodetabek. </span>
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
								<span class="answer">Setelah mendaftar kamu tidak diwajibkan untuk menyewakan buku. Kamu tetap dapat menikmati fitur-fitur Ruang Baca lainnya seperti Reading Journal, Trade, dan Giveaway. </span>
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
							<span class="question">Bagaimana cara menambahkan buku yang akan disewakan dan konten lainnya?</span>
						</div>
					</button>
					<div id="faq-6" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Pertama, pastikan kamu sudah terdaftar. Silakan login, lalu klik username-mu untuk masuk ke halaman profil. Pada halaman tersebut terdapat menu Konten Saya, dan kamu bisa menambahkannya di sana mengikuti formulir yang ada. </span>
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
								<span class="answer">Kamu hanya perlu mengisi formulir berikut s.id/kD atau klik menu Feedback di atas </span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once("../../footer.php"); ?>
</body>
</html>
