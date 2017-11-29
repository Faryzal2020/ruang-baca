<?php
	session_start();
	include("config.php");

	$queryBukuTerbaru = mysqli_query($db,"SELECT b.idbuku, b.judul, b.penulis, b.hargasewa, b.filegambar, b.deskripsi, p.namapengguna, p.kota FROM buku as b, pengguna as p WHERE b.username = p.username");
	$queryQuotes = mysqli_query($db,"SELECT q.idquotes, q.isiquotes, q.sumber, p.namapengguna FROM quotes as q, pengguna as p WHERE q.username = p.username");
	$queryTrade = mysqli_query($db,"SELECT t.idtrade, t.judultrade, t.request, t.offer, p.namapengguna, p.kota FROM trade as t, pengguna as p WHERE t.username = p.username");
	$queryGiveaway = mysqli_query($db,"SELECT g.idgiveaway, g.judulbuku, g.penulisbuku, g.filegambar, g.isigiveaway, p.namapengguna, p.kota FROM giveaway as g, pengguna as p WHERE g.username = p.username");
	$queryPopuler = mysqli_query($db,"SELECT b.idbuku, b.judul, b.penulis, b.hargasewa, b.filegambar, b.deskripsi, p.namapengguna, p.kota FROM buku as b, pengguna as p WHERE b.username = p.username");
	$queryJournal = mysqli_query($db,"SELECT r.idjurnal, r.juduljurnal, r.tanggal, r.tulisan, r.filegambar, p.namapengguna, p.kota FROM readingjournal as r, pengguna as p WHERE r.username = p.username");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
   	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
   	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript">
	</script>
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
			    	<li class="active"><a href="<?php echo ROOT_URL;?>">Home</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/catalog';?>">Catalog</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/quotes';?>">Quotes</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/jurnal';?>">Reading Journal</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/community';?>">RuBa Community</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/faq';?>">FAQ</a></li>
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
		<div class="col-md-3" style="margin-bottom: 60px;">
			<div class="sideBar" style="padding: 0px 20px;">
				<div class="userReviews">
					<div class="sectionTitle">
						<label>READING JOURNAL</label>
					</div>
					<div class="home-reviews-wrapper">
						<?php
							while($dataJurnal = mysqli_fetch_array($queryJournal)){
								?>
						<div class="home-reviews">
							<div class="tanggal">
								<?php echo $dataJurnal['tanggal']; ?>
							</div>
							<div class="judul click">
								<?php echo $dataJurnal['juduljurnal']; ?>
							</div>
							<div class="user">
								<div class="profpic">
								</div>
								<div class="nama click">
									<?php echo $dataJurnal['namapengguna']; ?>
								</div>
							</div>
							<div class="review">
								"<?php echo $dataJurnal['tulisan']; ?>"
							</div>
							<div class="bottomsection">
								<a href="" style="float: right;">Read More</a>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9 page">
			<div class="sectionTitle2">
				<label>Populer</label>
			</div>
			<div id="carousel1" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel1" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel1" data-slide-to="1"></li>
				    <li data-target="#carousel1" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<?php
						$counter = 1;
						while($dataPopuler= mysqli_fetch_array($queryPopuler)){
							$urlGambar = ROOT_DIR . "/images/" . $dataPopuler['filegambar'];
									if(file_exists($urlGambar)){
										$gambarBuku = $dataPopuler['filegambar'];
									} else {
										$gambarBuku = "default_cover.JPG";
									} ?>
					<div class="item<?php if($counter <= 1){echo " active"; } ?>">
						<div class="displayBuku">
							<img src="images/<?php echo $gambarBuku ?>" align="center">
							<div class="book-detail">
								<div class="book-name"><a href="<?php echo "p/book/index.php?id=".$dataPopuler['idbuku'] ?>"><?php echo $dataPopuler['judul'];?></a></div>
								<div class="book-author">by <?php echo $dataPopuler['penulis'];?></div>
								<div class="book-desc"><?php echo $dataPopuler['deskripsi'];?></div>
								<div class="book-owner">Pemilik buku: <span><?php echo $dataPopuler['namapengguna'];?></span> | Kota: <span><?php echo $dataPopuler['kota'];?></span></div>
								<div class="book-price"><span class="harga">Rp <?php echo $dataPopuler['hargasewa'];?> / minggu</span><a type="button" style="padding-top: 4px;" href="<?php echo "p/book/index.php?id=".$dataPopuler['idbuku'] ?>" class="btn button add-to-cart">Lihat</a></div>
							</div>
						</div>
					</div>
					<?php 
						$counter++;
					}?>
				</div>
				<a class="left carousel-control" href="#carousel1" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
	    			<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel1" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
	    			<span class="sr-only">Next</span>
				</a>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="sectionTitle2">
						<label>Giveaway</label>
					</div>
					<div id="carousel2" class="carousel slide carousel-small" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel2" data-slide-to="0" class="active"></li>
						    <li data-target="#carousel2" data-slide-to="1"></li>
						    <li data-target="#carousel2" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<?php
							$counter = 1;
							while($dataGiveaway= mysqli_fetch_array($queryGiveaway)){
								$urlGambarG = ROOT_DIR . "/images/" . $dataGiveaway['filegambar'];
										if(file_exists($urlGambarG)){
											$gambarBukuG = $dataGiveaway['filegambar'];
										} else {
											$gambarBukuG = "default_cover.JPG";
										} ?>
							<div class="item<?php if($counter <= 1){echo " active"; } ?>">
								<div class="displayBuku small">
									<div class="top">
										<img src="images/<?php echo $gambarBukuG;?>" align="center">
										<div class="book-detail">
											<div class="book-name"><a href="<?php echo "p/book/index.php?id=".$dataGiveaway['idbuku'] ?>"><?php echo $dataGiveaway['judulbuku'];?></a></div>
											<div class="book-author">by <?php echo $dataGiveaway['penulisbuku'];?></div>
											<div class="book-desc"><?php echo $dataGiveaway['isigiveaway'];?></div>
										</div>
									</div>
									<div class="bot">
										<div class="book-owner">Pemilik buku: <span><?php echo $dataGiveaway['namapengguna'];?></span> | Kota: <span><?php echo $dataGiveaway['kota'];?></span></div>
										<div class="book-price giveaway"><span class="harga">TOTALLY FREE!</span><button type="button" class="btn add-to-cart">Ambil</button></div>
									</div>
								</div>
							</div>
							<?php $counter++;
							} ?>
						</div>
						<a class="left carousel-control" href="#carousel2" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
			    			<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel2" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
			    			<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
				<div class="col-md-6" style="display: flex; flex-flow: column">
					<div class="sectionTitle2">
						<label>Trade Request</label>
					</div>
					<div id="carousel3" class="carousel slide carousel-small" data-ride="carousel">
						<ol class="carousel-indicators" style="bottom: -23px">
							<li data-target="#carousel3" data-slide-to="0" class="active"></li>
						    <li data-target="#carousel3" data-slide-to="1"></li>
						</ol>
						<div class="carousel-inner">
							<?php
							$counter = 1;
							while($dataTrade= mysqli_fetch_array($queryTrade)){?>
							<div class="item<?php if($counter <= 1){echo " active"; } ?>">
								<div class="trade-display">
									<div class="judul"><?php echo $dataTrade['judultrade'];?></div>
									<div class="requester">dari: <span><?php echo $dataTrade['namapengguna'];?></span> | Kota: <span><?php echo $dataTrade['kota'];?></span></div>
									<div class="request">Request: <span><?php echo $dataTrade['request'];?></span></div>
									<div class="offer">Offer: <span><?php echo $dataTrade['offer'];?></span></div>
								</div>
							</div>
							<?php $counter++;
							} ?>
						</div>
						<a class="left carousel-control" href="#carousel3" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" style="top: 42%"></span>
			    			<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel3" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" style="top: 42%"></span>
			    			<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="sectionTitle2">
						<label>Quotes</label>
					</div>
					<div id="carousel4" class="carousel slide carousel-small" data-ride="carousel">
						<ol class="carousel-indicators" style="bottom: -23px">
							<li data-target="#carousel4" data-slide-to="0" class="active"></li>
						    <li data-target="#carousel4" data-slide-to="1"></li> 
						    <li data-target="#carousel4" data-slide-to="2"></li> 
						</ol>
						<div class="carousel-inner">
							<?php
							$counter = 1;
							while($dataQuotes = mysqli_fetch_array($queryQuotes)){?>		
							<div class="item<?php if($counter <= 1){echo " active"; } ?>">
								<div class="quote-display">
									<div class="quote"><i class="fa fa-quote-left" aria-hidden="true"></i> <span><?php echo $dataQuotes['isiquotes'];?></span></div>
									<div class="source"><i class="glyphicon glyphicon-minus"></i> <span><?php echo $dataQuotes['sumber'];?></span></div>
									<div class="poster"><?php echo $dataQuotes['namapengguna'];?></div>
								</div>
							</div>
							<?php $counter++;
							} ?>
						</div>
						<a class="left carousel-control" href="#carousel4" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" style="top: 42%"></span>
			    			<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel4" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" style="top: 42%"></span>
			    			<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="sectionTitle2">
						<label>Terbaru</label>
					</div>
					<div class="home-newbook">
						<div class="top grid-item">
							<ul>
								<?php
									while($dataBuku = mysqli_fetch_array($queryBukuTerbaru)){
										$urlGambar = ROOT_DIR . "/images/" . $dataBuku['filegambar'];
										if(file_exists($urlGambar)){
											$gambarBuku = $dataBuku['filegambar'];
										} else {
											$gambarBuku = "default_cover.JPG";
										} ?>
								<li>
									<div class="displayBuku small2">
										<img src="images/<?php echo $gambarBuku;?>" align="center">
										<div class="book-detail">
											<div class="book-name"><a href="<?php echo 'p/book/index.php?id='.$dataBuku['idbuku']; ?>"><?php echo $dataBuku['judul'];?></a></div>
											<div class="book-author">by <?php echo $dataBuku['penulis'];?></div>
											<div class="book-owner">Pemilik buku: <span><?php echo $dataBuku['namapengguna'];?></span> - <span><?php echo $dataBuku['kota'];?></span></div>
											<div class="book-price"><span class="harga">Rp <?php echo $dataBuku['hargasewa'];?> / minggu</span></div>
										</div>
									</div>
								</li>
								<?php } ?>
							</ul>
						</div>
						<div class="bot">
							<a href="<?php echo ROOT_URL . '/p/catalog';?>" class="btn">Lihat Semua >></a>
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
