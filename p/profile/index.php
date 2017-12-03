<?php
session_start();
include("../../config.php");
$username = $_SESSION['username'];
$queryQuotes = mysqli_query($db,"SELECT isiquotes, sumber FROM quotes WHERE username = '$username'");
$queryKategori = mysqli_query($db,"SELECT * FROM kategori");
$queryBuku = mysqli_query($db,"SELECT b.idbuku, b.judul, b.penulis, b.hargasewa, b.status, b.filegambar, b.deskripsi FROM buku as b WHERE username = '$username'");
$queryPeminjaman = mysqli_query($db,"SELECT * FROM penyewaan WHERE username = '$username'");
$queryPenyewaan = mysqli_query($db,"SELECT DISTINCT p.idpenyewaan, p.username, p.totalbiaya, p.metodekirim, p.tanggalsewa FROM penyewaan as p, detailpenyewaan as d, buku as b WHERE p.idpenyewaan = d.idpenyewaan AND d.idbuku = b.idbuku AND b.username = '$username'");
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
			if(localStorage.profileSelectedTab){
				setActive(localStorage.profileSelectedTab);
			} else {
				setActive(0);
			}
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
				localStorage.setItem("profileSelectedTab",i);
				forEach.call(menuButtons, removeActive);
				forEach.call(contentPanel, removeActive);
				menuButtons[i].classList.add('active');
				contentPanel[i].classList.add('active');
			}
		});

		function gantiStatusPenyewaan(idPenyewaan, username, status){
			var url = document.getElementById("ROOT-URL").innerHTML + "/ajax/gantiStatusPenyewaan.php";
			var message = "";
			if(status == 'terima'){
				var message = "Konfirmasi penerimaan buku?";
			} else if(status == 'kirim') {
				var message = "Konfirmasi pengembalian buku?";
			}
			if(confirm(message)){
				$.ajax({
				    dataType: 'json',
				    url:url,
				    method:'post',
				    data : {'idP':idPenyewaan,'username':username,'status':status},
				    success:function(response){
				    	alert(response);
				    }
				});
			}
		}
		
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
							<li class="menuButton">Giveaway</li>
							<li class="menuButton">Penyewaan Buku</li>
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
								<form class="form-horizontal" action="tambahbuku.php" method="POST" enctype="multipart/form-data">
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
									</div> -->
									<div class="form-group">
										<label class="control-label col-md-3" for="sinopsis">Gambar Buku</label>
										<div class="col-md-9">
												<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
												<input name="userfile" type="file" />
										</div>									
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
												<div class="bookstatus">
													<span>Status Buku:</span>
													<span><?php echo $data['status'];?></span>
												</div>
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
								<div class="header">
							<h2>Trade</h2>
						</div>
							<button class="btn" data-toggle="collapse" data-target="#tambah-trade">Tambah Trade</button>
							<div class="tambah-trade collapse" id="tambah-trade">
								<form class="form-horizontal" action="index.php" method="POST">
									<div class="form-group">
										<label class="control-label col-md-3" for="request">request</label>
										<div class="col-md-9">
											<input type="text" name="request" id="request" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" for="offer">offer</label>
										<div class="col-md-9">
											<input type="text" name="offer" id="offer" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" for="status">status</label>
										<div class="col-md-9">
											<input type="text" name="status" id="status" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" for="judultrade">judul trade</label>
										<div class="col-md-9">
											<input type="text" name="judultrade" id="judultrade" class="form-control">
										</div>
									</div>
									<div class="col-sm-offset-2 col-sm-10">
											<button type = "submit" name = "trade" id="trade" class="btn" style="float: right;">trade</button>
										</div>
									</div>
								</form>
							</div>
							<div class="quotesWrapper grid-item">
								<ul>
									<?php
									/*buat query*/
									$m = mysqli_query($db,"SELECT * FROM trade WHERE username='$_SESSION[username]'");
									while($q=mysqli_fetch_array($m)){
									?>
							
									<li>
										<div class="displayQuote">
											<div class="judultrade">
												<i class="fa fa-quote-left" aria-hidden="true"></i> <span class="text"><?php echo $q['judultrade'];?></span>
											</div>
											<div class="offer">
												<i class="glyphicon glyphicon-minus"></i> <span><?php echo $q['offer'];?></span>
											</div>
											<div class="status">
												<i class="glyphicon glyphicon-minus"></i> <span><?php echo $q['status'];?></span>
											</div>
											<div class="request">
												<i class="glyphicon glyphicon-minus"></i> <span><?php echo $q['request'];?></span>
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
								<h2>Posts</h2>
							</div>
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
									<div class="form-group">
										<label class="control-label col-md-3" for="isigiveaway">Isi Giveaway</label>
										<div class="col-md-9">
											<textarea class="form-control" rows="10" id="isigiveaway" name="tambahgiveaway-isigiveaway"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" for="filegambar">Gambar Buku</label>
										<div class="col-md-9">
											<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
											<input name="userfile" type="file" />										
										</div>
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
										<div class="displayBuku small2">
											<img src="<?php echo ROOT_URL; ?>/images/<?php echo $gambarGiveaway;?>" align="center">
											<div class="book-detail">
												<div class="book-name"><a><?php echo $data['judulbuku'];?></a></div>
												<div class="book-author">by <?php echo $data['penulisbuku'];?></div>
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
								<h2>Penyewaan Buku</h2>
							</div>
							<div class="list-penyewaan">
								<?php
									while($data = mysqli_fetch_array($queryPenyewaan)){
								?>
								<div class="wrapper-penyewaan">
									<div class="data-penyewaan">
										<div class="ds-top">
											<div>Peminjam: <span><?php echo $data[1];?></span></div>
											<div>Tanggal transaksi: <span><?php echo $data[4];?></span></div>
										</div>
										<div class="ds-bot">
											<button data-toggle="collapse" data-target="#<?php echo 'detailSewa-'.$data[0];?>">Lihat Detail</button>
										</div>
									</div>
									<div class="collapse detail-penyewaan" id="<?php echo 'detailSewa-'.$data[0];?>">
										<table>
										<?php
											$queryDetail = mysqli_query($db,"SELECT d.idbuku, b.judul, b.hargasewa, d.durasi, d.tanggalterimabuku, d.status FROM detailpenyewaan as d, buku as b WHERE d.idpenyewaan = '$data[0]' AND d.idbuku = b.idbuku AND b.username = '$username'");
											$x = 0;
											while($data2 = mysqli_fetch_array($queryDetail)){
												if($x == 0){
										?>
													<tr>
														<?php if($data2[5] == 'dikirim_pemilik'){ ?>
														<td>Status: <span>Proses pengiriman ke peminjam</span></td>
														<td></td>
														<?php } elseif ($data2[5] == 'di_peminjam') { ?>
														<td>Status: <span>Sudah sampai di peminjam</span></td>
														<td></td>
														<?php } elseif ($data2[5] == 'dikirim_peminjam') { ?>
														<td>Status: <span>Proses pengiriman ke pemilik</span></td>
														<td><button type="button" onclick="gantiStatusPenyewaan('<?php echo $data[0];?>','<?php echo $username;?>','pemilik_terima')">Sudah terima buku</button></td>
														<?php } elseif ($data2[5] == 'selesai') { ?>
														<td>Status: <span>Sudah dikembalikan ke pemilik</span></td>
														<td></td>
														<?php } ?>
													</tr>
												<?php
												}
											?>
											<tr>
												<td>
													<div><span><?php echo $data2[1];?></span></div>
													<div><span><?php echo $data2[3];?></span> x Rp.<span><?php echo $data2[2];?></span></div>
												</td>
												<td>
													<div><span><?php echo $data2[3]*$data2[2];?></span></div>
												</td>
											</tr>
										<?php } ?>
										</table>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<div class="profile-content">
							<div class="header">
								<h2>Peminjaman</h2>
							</div>
							<div class="list-peminjaman">
								<?php
									while($data = mysqli_fetch_array($queryPeminjaman)){
								?>
								<div class="wrapper-peminjaman">
									<div class="data-peminjaman">
										<div class="dp-top">
											<div class="dp-tgl-biaya">Tanggal transaksi: <span><?php echo date("j F Y", strtotime($data[4]));?></span> | Total biaya: Rp.<span><?php echo $data[2];?></span></div>
										</div>
										<div class="dp-bot">
											<button data-toggle="collapse" data-target="#<?php echo 'detailPinjam-'.$data[0];?>">Lihat Detail</button>
										</div>
									</div>
									<div class="collapse detail-peminjaman" id="<?php echo 'detailPinjam-'.$data[0];?>">
										<table>
										<?php
											$queryDetail = mysqli_query($db,"SELECT d.idbuku, b.judul, b.hargasewa, p.namapengguna, d.durasi, d.tanggalterimabuku, d.status, p.username FROM detailpenyewaan as d, buku as b, pengguna as p WHERE d.idpenyewaan = '$data[0]' AND d.idbuku = b.idbuku AND p.username = b.username ORDER BY p.namapengguna");
											$arrayNama = "";
											while($data2 = mysqli_fetch_array($queryDetail)){
												if($arrayNama != $data2[3]){
													$arrayNama = $data2[3];
												?>
													<tr class="dp-header">
														<td>Peminjaman dari: <span><?php echo $data2[3];?></span></td>
														<?php if($data2[6] == 'dikirim_pemilik'){ ?>
														<td>Status: <span>Proses pengiriman ke peminjam</span></td>
														<td><button type="button" onclick="gantiStatusPenyewaan('<?php echo $data[0];?>','<?php echo $data2[7];?>','terima')">Sudah terima buku</button></td>
														<?php } elseif ($data2[6] == 'di_peminjam') { ?>
														<td>Status: <span>Sudah sampai di peminjam</span></td>
														<td><button type="button" onclick="gantiStatusPenyewaan('<?php echo $data[0];?>','<?php echo $data2[7];?>','kirim')">Buku sudah dikembalikan</button></td>
														<?php } elseif ($data2[6] == 'dikirim_peminjam') { ?>
														<td>Status: <span>Proses pengiriman ke pemilik</span></td>
														<td></td>
														<?php } elseif ($data2[6] == 'selesai') { ?>
														<td>Status: <span>Sudah dikembalikan ke pemilik</span></td>
														<td></td>
														<?php } ?>
													</tr>
												<?php
												} ?>
												<tr>
													<td class="dp-detailBuku">
														<div><span><?php echo $data2[1];?></span></div>
														<div><span><?php echo $data2[4];?></span> x Rp.<span><?php echo $data2[2];?></span></div>
													</td>
													<td colspan="2" class="dp-hargaBuku">
														<div>Harga: Rp.<span><?php echo $data2[4]*$data2[2];?></span></div>
													</td>
												</tr>
											<?php
											}
										?>
										</table>
									</div>
								</div>
								<?php } ?>
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
	</script>";
}
?>
