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
	<div class="mainpage row" style="padding: 0px 50px">
		<div class="container-fluid" style="width: 1190px!important; margin: 0 auto!important;">
			<div class="row row-fluid">
				<div class="col-md-2 profile-sidebar">
					<div class="sectionTitle3">
						Konten Saya
					</div>
					<ul>
						<li>Quotes</li>
						<li class="active">Buku</li>
						<li>Trade Request</li>
						<li>Posts</li>
					</ul>
					<div class="sectionTitle3">
						Profil Saya
					</div>
					<ul>
						<li>Peminjaman</li>
						<li>Inbox</li>
						<li>Detail Account</li>
						<li>Pengaturan</li>
					</ul>
				</div>
				<div class="col-md-9 profile-mainpage">
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
											<div class="book-owner">Pemilik buku: <span>Tyas Yuni</span> - <span>Jakarta</span></div>
											<div class="book-price"><span class="harga">Rp 25.000 / minggu</span><button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-shopping-cart"></i></button></div>
										</div>
									</div>
								</li>
								<li>
									<div class="displayBuku small2">
										<img src="../../images/buku-9.JPG" align="center">
										<div class="book-detail">
											<div class="book-name">The Diary of a Young Girl</div>
											<div class="book-author">by Anne Frank</div>
											<div class="book-owner">Pemilik buku: <span>Tyas Yuni</span> - <span>Jakarta</span></div>
											<div class="book-price"><span class="harga">Rp 15.000 / minggu</span><button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-shopping-cart"></i></button></div>
										</div>
									</div>
								</li>
								<li>
									<div class="displayBuku small2">
										<img src="../../images/buku-10.JPG" align="center">
										<div class="book-detail">
											<div class="book-name">The Designer</div>
											<div class="book-author">by Marius Gabriel</div>
											<div class="book-owner">Pemilik buku: <span>Tyas Yuni</span> - <span>Jakarta</span></div>
											<div class="book-price"><span class="harga">Rp 25.000 / minggu</span><button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-shopping-cart"></i></button></div>
										</div>
									</div>
								</li>
								<li>
									<div class="displayBuku small2">
										<img src="../../images/buku-11.JPG" align="center">
										<div class="book-detail">
											<div class="book-name">The Tiger's Daughter</div>
											<div class="book-author">by K. Arsenault Rivera</div>
											<div class="book-owner">Pemilik buku: <span>Tyas Yuni</span> - <span>Jakarta</span></div>
											<div class="book-price"><span class="harga">Rp 25.000 / minggu</span><button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-shopping-cart"></i></button></div>
										</div>
									</div>
								</li>
								<li>
									<div class="displayBuku small2">
										<img src="../../images/buku-12.JPG" align="center">
										<div class="book-detail">
											<div class="book-name">The Adventures of Captain Underpants</div>
											<div class="book-author">by Dav Pilkey</div>
											<div class="book-owner">Pemilik buku: <span>Tyas Yuni</span> - <span>Jakarta</span></div>
											<div class="book-price"><span class="harga">Rp 25.000 / minggu</span><button type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-shopping-cart"></i></button></div>
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
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once("../../footer.php"); ?>
</body>
</html>