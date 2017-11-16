<?php
session_start();
include("../../config.php");
$username = $_SESSION['username'];
$queryQuotes = mysqli_query($db,"SELECT isiquotes, sumber FROM quotes WHERE username = '$username'");
$queryKategori = mysqli_query($db,"SELECT * FROM kategori");
$queryBuku = mysqli_query($db,"SELECT b.idbuku, b.judul, b.penulis, b.hargasewa, b.filegambar, b.deskripsi FROM buku as b WHERE username = '$username'");
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
								<form class="form-horizontal" action="tambahquotes.php" method="POST">
									<div class="form-group">
										<label class="control-label col-md-3" for="isiquotes">Quote</label>
										<div class="col-md-9">
											<textarea class="form-control" rows="5" id="isiquotes" name="isiquotes"></textarea>
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
											<button type = "submit" name = "submit" id="submit" class="btn" style="float: right;">Simpan</button>
										</div>
									</div>
								</form>
							</div>
							<div class="quotesWrapper grid-item">
								<ul>
									<?php
									while($dataQuotes = mysqli_fetch_array($queryQuotes)){?>
									<li>
										<div class="displayQuote">
											<div class="quote">
												<i class="fa fa-quote-left" aria-hidden="true"></i> <span class="text"><?php echo $dataQuotes['isiquotes'];?></span>
											</div>
											<div class="sumber">
												<i class="glyphicon glyphicon-minus"></i> <span><?php echo $dataQuotes['sumber'];?></span>
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
								</ul>
							</div>
						</div>
						<div class="profile-content profile-buku">
							<div class="header">
								<h2>Buku Saya</h2>
							</div>
							<button class="btn" data-toggle="collapse" data-target="#tambah-buku">Tambah Buku</button>
							<div class="tambah-buku collapse" id="tambah-buku">
								<form class="form-horizontal" action="tambahbuku.php" method="POST">
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
								<!---
								<div class="form-group">
									<label class="control-label col-md-3" for="tahun">Tahun</label>
									<div class="col-md-9">
										<input type="text" name="tambahbuku-tahun" id="tahun" class="form-control">
									</div>
								</div>
							-->
							<div class="form-group">
								<label class="control-label col-md-3" for="bahasa">Bahasa</label>
								<div class="col-md-9">
									<input type="text" name="tambahbuku-bahasa" id="bahasa" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3" for="kategori">Kategori</label>
								<div class="col-md-9">
									<select class="form-control" id="kategori" name="kategori">
										<?php
										while($dataKategori = mysqli_fetch_array($queryKategori)){?>
										<option value="<?php echo $dataKategori['idkategori']; ?>"><?php echo $dataKategori['namakategori']; ?></option>
										<?php } ?>										
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3" for="sinopsis">Sinopsis</label>
								<div class="col-md-9">
									<textarea class="form-control" rows="10" id="sinopsis" name="tambahbuku-sinopsis"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3" for="harga">Harga Sewa</label>
								<div class="col-md-9">
									<input type="text" name="tambahbuku-harga" id="harga" class="form-control">
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
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" name="submit" id="submit" class="btn" style="float: right;">Simpan</button>
								</div>
							</div>
						</form>
					</div>
					<div class="booksWrapper grid-item">
						<ul>
							<?php
							while($data = mysqli_fetch_array($queryBuku)){
								$urlGambar = ROOT_DIR . "/images/" . $data['filegambar'];
								$idbuku = $data['idbuku'];
								if(file_exists($urlGambar)){
									$gambarBuku = $data['filegambar'];
								} else {
									$gambarBuku = "default_cover.JPG";
								} ?>
								<li>
									<div class="displayBuku small2">
										<img src="<?php echo ROOT_URL; ?>/images/<?php echo $gambarBuku;?>" align="center">
										<div class="book-detail">
											<div class="book-name"><a href="<?php echo '../book/index.php?id='.$idbuku; ?>"><?php echo $data['judul'];?></a></div>
											<div class="book-author">by <?php echo $data['penulis'];?></div>
											<div class="book-price"><span class="harga">Rp <?php echo $data['hargasewa'];?> / minggu</span></div>
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
									<th>request</th>
									<th>offer</th>
									<th>status</th>
									<th>judul trade</th>
							</thead>
							<tbody>
									<?php
									/*buat query*/
									$q = mysqli_query($db,"SELECT * FROM trade WHERE username='$_SESSION[username]'");
									/*loop data yang didapat berdasarkan query yang dijalankan*/
									while($d = mysqli_fetch_array($q)){
										/*lihat penjelasan no 2.a.*/
										echo
										"<tr>
										<td>$d[request]</td>
										<td>$d[offer]</td>
										<td>$d[status]</td>
										<td>$d[judultrade]</td>
										</tr>";
									} ?>
								</tbody>
							</table>
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

<?php
if(isset($_POST['trade'])){
	$query = "INSERT INTO trade(username, request, offer, status, judultrade) VALUES ('$_SESSION[username]','$_POST[request]','$_POST[offer]','$_POST[status]','$_POST[judultrade]')";
	mysqli_query($db, $query);

	echo "<script>
	console.log('tes');
	</script>";}
	?>
