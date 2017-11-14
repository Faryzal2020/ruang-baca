<?php
	session_start();
	include("../../config.php");

	$queryBuku = mysqli_query($db,"SELECT b.idbuku, b.judul, b.penulis, b.hargasewa, b.filegambar, b.deskripsi, p.username, p.kota FROM buku as b, pengguna as p WHERE b.username = p.username");
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
		Storage.prototype.setObj = function(key, obj) {
		    return this.setItem(key, JSON.stringify(obj))
		}
		Storage.prototype.getObj = function(key) {
		    return JSON.parse(this.getItem(key))
		}

		function contains(arr,obj) {
		    return (arr.indexOf(obj) != -1);
		}
		function addtocart(idbuku){
			if(typeof(Storage) !== "undefined"){
				if(localStorage.cart){
					var cart = localStorage.getObj('cart');
					console.log(cart);
					if(contains(cart,idbuku)){
						alert("Buku ini sudah ada di keranjang");
					} else {
						cart.push(idbuku);
						localStorage.setObj('cart',cart);
						var cart = localStorage.getObj('cart');
						if(contains(cart,idbuku)){
							alert("Berhasil menambahkan buku ke keranjang");
							location.reload();
						} else {
							alert(cart);
						}
					}
				} else {
					var cart = [];
					cart[0] = idbuku;
					localStorage.setItem("cart", JSON.stringify(cart));
					var cart = localStorage.getObj('cart');
					if(contains(cart,idbuku)){
						alert("Berhasil menambahkan buku ke keranjang");
					} else {
						alert(cart);
					}
				}
			} else {
				alert("Web Storage tidak disupport oleh browser anda sehingga shopping cart tidak dapat digunakan. Update web browser anda ke versi yang paling baru.");
			}
		}
		
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
			    	<li><a href="<?php echo ROOT_URL;?>">Home</a></li>
			    	<li class="active"><a href="<?php echo ROOT_URL . '/p/catalog';?>">Catalog</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/quotes';?>">Quotes</a></li>
			    	<li><a href="#">Reading Journal</a></li>
			    	<li><a href="#">RuBa Community</a></li>
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
		<div class="col-md-12" style="margin-bottom: 60px;">
			<div class="sectionTitle">
				<label>Catalog Buku</label>
			</div>
			<div class="sectionHeader" style="padding: 10px;height: 48px;margin: 10px 0px;">
				<div class="pilihGenre">
					<div class="input-group">
						Pilih Genre :
						<select>
							<option>Semua</option>
							<option>A</option>
							<option>B</option>
							<option>C</option>
						</select>
					</div>
				</div>
				<div class="bukuSearch" style="max-width: 400px; float: right:">
					<div class="input-group">
					    <input type="text" class="form-control" placeholder="Search Buku">
					    <div class="input-group-btn">
					    	<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
					    </div>
					</div>
				</div>
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
								<div class="book-owner">Pemilik buku: <span><?php echo $data['username'];?></span> - <span><?php echo $data['kota'];?></span></div>
								<div class="book-price"><span class="harga">Rp <?php echo $data['hargasewa'];?> / minggu</span><button onclick="addtocart('<?php echo $idbuku; ?>')" type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-shopping-cart"></i></button></div>
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
	</div>
</div>
<div class="footer">
</div>
</body>
</html>