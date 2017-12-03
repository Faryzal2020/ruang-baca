<?php
session_start();
include("../../config.php");
$username = $_SESSION['username'];
$queryQuotes = mysqli_query($db,"SELECT isiquotes, sumber FROM quotes WHERE username = '$username'");
$queryKategori = mysqli_query($db,"SELECT * FROM kategori");
$queryBuku = mysqli_query($db,"SELECT b.idbuku, b.judul, b.penulis, b.hargasewa, b.status, b.filegambar, b.deskripsi FROM buku as b WHERE username = '$username'");
$queryGiveaway = mysqli_query($db,"SELECT b.idgiveaway, b.username, b.judulbuku, b.penulisbuku, b.isigiveaway, b.status, b.tanggalinput, b.filegambar FROM giveaway as b WHERE username = '$username'");
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
			var menuButtons = document.querySelectorAll('.menuButton');
			console.log(menuButtons);
			var contentPanel = document.querySelectorAll('.profile-content');
			var forEach = Array.prototype.forEach;
			setActive(0);
			forEach.call(menuButtons,addListener);
			function addListener(el, i){
				el.addEventListener('click', function(){
					setActive(i);
				})
			}

			function removeActive(el){
				el.classList.remove('active');
			}

			function setActive(i){
				forEach.call(menuButtons, removeActive);
				forEach.call(contentPanel, removeActive);
				menuButtons[i].classList.add('active');
				contentPanel[i].classList.add('active');
			}
		});
		
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
				<div class="col-md-2 profile-sidebar">
					<div class="sectionTitle3">
						Konten Saya
					</div>
					<ul>
						<li class="menuButton">Quotes</li>
						<li class="menuButton">Buku</li>
						<li class="menuButton">Trade Request</li>
						<li class="menuButton">Giveaway</li>
						<li class="menuButton">Posts</li>
					</ul>
					<div class="sectionTitle3">
						Profil Saya
					</div>
					<ul>
						<li class="menuButton">Peminjaman</li>
						<li class="menuButton">Inbox</li>
						<li class="menuButton">Detail Account</li>
						<li class="menuButton">Pengaturan</li>
					</ul>
				</div>
				<div class="col-md-9 profile-mainpage">
					<div class="profile-content">
						<div class="header">
							<h2>Quotes</h2>
						</div>
						<button class="btn" data-toggle="collapse" data-target="#tambah-quote">Tambah Quote</button>
						<div class="tambah-quote collapse" id="tambah-quote">
							<form class="form-horizontal">
								<div class="form-group">
									<label class="control-label col-md-3" for="quote">Quote</label>
									<div class="col-md-9">
										<textarea class="form-control" rows="5" id="quote"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" for="sumber">Sumber</label>
									<div class="col-md-9">
										<input type="text" name="tambahquote-sumber" id="sumber" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button class="btn" style="float: right;">Simpan</button>
									</div>
								</div>
							</form>
						</div>
						<div class="quotesWrapper grid-item">
							<ul>
								<li>
									<div class="displayQuote">
										<div class="quote">
											<i class="fa fa-quote-left" aria-hidden="true"></i> <span class="text">"Hidup tanpa cinta bagai taman tak berbunga"</span>
										</div>
										<div class="sumber">
											<i class="glyphicon glyphicon-minus"></i> <span>Rhoma Irama</span>
										</div>
									</div>
								</li>
								<li>
									<div class="displayQuote">
										<div class="quote">
											<i class="fa fa-quote-left" aria-hidden="true"></i> <span class="text">Be yourself; everyone else is already taken.</span>
										</div>
										<div class="sumber">
											<i class="glyphicon glyphicon-minus"></i> <span>Oscar Wilde</span>
										</div>
									</div>
								</li>
								<li>
									<div class="displayQuote">
										<div class="quote">
											<i class="fa fa-quote-left" aria-hidden="true"></i> <span class="text">Two things are infinite: the universe and human stupidity; and I'm not sure about the universe.</span>
										</div>
										<div class="sumber">
											<i class="glyphicon glyphicon-minus"></i> <span>Albert Einstein</span>
										</div>
									</div>
								</li>
								<li>
									<div class="displayQuote">
										<div class="quote">
											<i class="fa fa-quote-left" aria-hidden="true"></i> <span class="text">Be who you are and say what you feel, because those who mind don't matter, and those who matter don't mind.</span>
										</div>
										<div class="sumber">
											<i class="glyphicon glyphicon-minus"></i> <span>Bernard M. Baruch</span>
										</div>
									</div>
								</li>
								<li>
									<div class="displayQuote">
										<div class="quote">
											<i class="fa fa-quote-left" aria-hidden="true"></i> <span class="text">A room without books is like a body without a soul.</span>
										</div>
										<div class="sumber">
											<i class="glyphicon glyphicon-minus"></i> <span>Marcus Tullius Cicero</span>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div class="pagination-wrapper">
							<ul class="pagination">
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
							</ul>
						</div>
					</div>
					<div class="profile-content profile-buku">
						<div class="header">
							<h2>Buku Saya</h2>
						</div>
						<button class="btn" data-toggle="collapse" data-target="#tambah-buku">Tambah Buku</button>
						<div class="tambah-buku collapse" id="tambah-buku">
							<form class="form-horizontal">
								<div class="form-group">
									<label class="control-label col-md-3" for="judul">Judul Buku</label>
									<div class="col-md-9">
										<input type="text" name="tambahbuku-judul" id="judul" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" for="penulis">Penulis</label>
									<div class="col-md-9">
										<input type="text" name="tambahbuku-penulis" id="penulis" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" for="tahun">Tahun</label>
									<div class="col-md-9">
										<input type="text" name="tambahbuku-tahun" id="tahun" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" for="kategori">Kategori</label>
									<div class="col-md-9">
										<select class="form-control" id="kategori">
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" for="sinopsis">Sinopsis</label>
									<div class="col-md-9">
										<textarea class="form-control" rows="10" id="sinopsis"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" for="harga">Harga Sewa</label>
									<div class="col-md-9">
										<input type="text" name="tambahbuku-harga" id="harga" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" for="lamapinjam">Maks Lama Pinjam</label>
									<div class="col-md-9">
										<div class="form-group row">
											<div class="col-md-2">
												<input type="text" name="tambahbuku-lamapinjam" id="lamapinjam" class="form-control">
											</div>
											<div class="col-md-4">
												<label class="radio-inline"><input type="radio" name="satuanDurasi">Hari</label>
												<label class="radio-inline"><input type="radio" name="satuanDurasi">Minggu</label>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button class="btn" style="float: right;">Simpan</button>
									</div>
								</div>
							</form>
						</div>
						<div class="booksWrapper grid-item">
							<ul>
								<li>
									<div class="displayBuku small2">
										<img src="../../images/buku-8.JPG" align="center">
										<div class="book-detail">
											<div class="book-name">Finding Magic</div>
											<div class="book-author">by Sally Quinn</div>
											<div class="bookstatus">
												<span>Status Buku:</span>
												<span>Dipinjam</span>
											</div>
											<div class="operations">
												<button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-trash"></i></button>
												<button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-edit"></i></button>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="displayBuku small2">
										<img src="../../images/buku-9.JPG" align="center">
										<div class="book-detail">
											<div class="book-name">The Diary of a Young Girl</div>
											<div class="book-author">by Anne Frank</div>
											<div class="bookstatus">
												<span>Status Buku:</span>
												<span>Dipinjam</span>
											</div>
											<div class="operations">
												<button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-trash"></i></button>
												<button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-edit"></i></button>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="displayBuku small2">
										<img src="../../images/buku-10.JPG" align="center">
										<div class="book-detail">
											<div class="book-name">The Designer</div>
											<div class="book-author">by Marius Gabriel</div>
											<div class="bookstatus">
												<span>Status Buku:</span>
												<span>Dipinjam</span>
											</div>
											<div class="operations">
												<button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-trash"></i></button>
												<button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-edit"></i></button>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="displayBuku small2">
										<img src="../../images/buku-11.JPG" align="center">
										<div class="book-detail">
											<div class="book-name">The Tiger's Daughter</div>
											<div class="book-author">by K. Arsenault Rivera</div>
											<div class="bookstatus">
												<span>Status Buku:</span>
												<span>Dipinjam</span>
											</div>
											<div class="operations">
												<button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-trash"></i></button>
												<button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-edit"></i></button>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="displayBuku small2">
										<img src="../../images/buku-12.JPG" align="center">
										<div class="book-detail">
											<div class="book-name">The Adventures of Captain Underpants</div>
											<div class="book-author">by Dav Pilkey</div>
											<div class="bookstatus">
												<span>Status Buku:</span>
												<span>Dipinjam</span>
											</div>
											<div class="operations">
												<button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-trash"></i></button>
												<button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-edit"></i></button>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div class="pagination-wrapper">
							<ul class="pagination">
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
							</ul>
						</div>
					</div>
					<div class="profile-content">
						<div class="header">
							<h2>Trade</h2>
						</div>
						<table>
							<form action="index.php" method="POST">
 								<tr><td>request</td><td><input type="text" name="request" id="request" class="texbox" size="25px" required="required" ></td></tr>
 								<tr><td>offer</td><td><input type="text" name="offer" id="offer" class="texbox" size="25px" required="required"></td></tr>
 								<tr><td>Status</td><td><input type="text" name="status" id="status" class="texbox" size="25px" required="required"></td></tr>
 								<tr><td>judul trade</td><td><input type="text" name="judultrade" id="judulbuku" class="texbox" size="25px" required="required"></td></tr>
 							 	<tr><td colspan="2"><input type="submit" name="trade" value="SIMPAN"><input type="reset" name="reset" value="BATAL"></td></tr>
 							</form>
 						</table>
						<table border=1 align="center" border='10' width='50%' cellpadding='10'  cellspacing='10' align='center' bgcolor="##009688">
							<thead>
								<th>
									<td>request</td>
									<td>offer</td>
									<td>status</td>
									<td>judul trade</td>
								</th>
							</thead>
							<tbody>
								<tr>
								<?php
									$i=1;//deklarasi variabel $i untuk nilai urut
									/*buat query*/
									$q = mysqli_query($db,"select * from trade");
									/*loop data yang didapat berdasarkan query yang dijalankan*/
									while($d = mysqli_fetch_array($q)){
									/*lihat penjelasan no 2.a.*/
										echo
											"<tr>
											<td>$d[request]</td>
											<td>$d[offer]</td>
											<td>$d[status]</td>
											<td>$d[judultrade]</td></tr>";
										$i++;
									} ?>
							</tbody>
    					</table>
					</div>
						<div class="profile-content profile-giveaway">
							<div class="header">
								<h2>Giveaway Saya</h2>
							</div>
							<button class="btn" data-toggle="collapse" data-target="#tambah-giveaway">Tambah Giveaway</button>
							<div class="tambah-giveaway collapse" id="tambah-giveaway">
								<form class="form-horizontal" action="tambahgiveaway.php" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-md-3" for="judulbuku">Judul Buku</label>
										<div class="col-md-9">
											<input type="text" name="tambahgiveaway-judul" id="judulbuku" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" for="penulisbuku">Penulis</label>
										<div class="col-md-9">
											<input type="text" name="tambahgiveaway-penulis" id="penulisbuku" class="form-control">
										</div>
									</div>
								<!---
								<div class="form-group">
									<label class="control-label col-md-3" for="tahun">Tahun</label>
									<div class="col-md-9">
										<input type="text" name="tambahbuku-tahun" id="tahun" class="form-control">
									</div>
								</div>
							-->
									<div class="form-group">
										<label class="control-label col-md-3" for="isigiveaway">Isi Giveaway</label>
										<div class="col-md-9">
											<textarea class="form-control" rows="10" id="isigiveaway" name="tambahgiveaway-isigiveaway"></textarea>
										</div>
									</div>
								<!--
								<div class="form-group">
									<label class="control-label col-md-3" for="lamapinjam">Maks Lama Pinjam</label>
									<div class="col-md-9">
										<div class="form-group row">
											<div class="col-md-2">
												<input type="text" name="tambahbuku-lamapinjam" id="lamapinjam" class="form-control">
											</div>
											<div class="col-md-4">
												<label class="radio-inline"><input type="radio" name="satuanDurasi">Hari</label>
												<label class="radio-inline"><input type="radio" name="satuanDurasi">Minggu</label>
											</div>
										</div>
									</div>
								</div>
							-->
									<div class="form-group">
										<label class="control-label col-md-3" for="filegambar">Gambar Buku</label>
										<div class="col-md-9">
												<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
												<input name="userfile" type="file" />										
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" name="submit" id="submit" class="btn" style="float: right;">Simpan</button>
										</div>
									</div>
								</form>
							</div>
						<div class="booksWrapper grid-item">
						<ul>
							<?php
							while($data = mysqli_fetch_array($queryGiveaway)){
								$urlGambar = ROOT_DIR . "/images/" . $data['filegambar'];
								$idgiveaway = $data['idgiveaway'];
								if(file_exists($urlGambar)){
									$gambarGiveaway = $data['filegambar'];
								} else {
									$gambarGiveaway = "default_cover.JPG";
								} ?>
								<li>
									<div class="displayGiveaway small2">
										<img src="<?php echo ROOT_URL; ?>/images/<?php echo $gambarGiveaway;?>" align="center">
										<div class="giveaway-detail">
											<div class="giveaway-name"><a href="<?php echo '../giveaway/index.php?id='.$idgiveaway; ?>"><?php echo $data['judulbuku'];?></a></div>
											<div class="giveaway-author">by <?php echo $data['penulisbuku'];?></div>
											<div class="bookstatus">
												<span>Status Giveaway:</span>
												<span><?php echo $data['status'];?></span>
											</div>
										</div>
									</div>
								</li>
								<?php } ?>
							</ul>
						</div>
						<div class="pagination-wrapper">
							<ul class="pagination">
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">6</a></li>
							</ul>
						</div>
					</div>						
					<div class="profile-content">
						<div class="header">
							<h2>Posts</h2>
						</div>
					</div>
					<div class="profile-content">
						<div class="header">
							<h2>Peminjaman</h2>
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