<?php
session_start();
include("../../config.php");

$queryBukuTerbaru = mysqli_query($db,"SELECT b.idbuku, b.judul, b.penulis, b.hargasewa, b.filegambar, b.bahasa,b.deskripsi, p.namapengguna, p.kota, p.username FROM buku as b, pengguna as p WHERE b.username = p.username AND b.idbuku = '".$_GET['id']."'");
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
            getURLS();
            if(document.getElementById("loggedUsername").innerHTML == ""){
                window.location = rootURL+"/p/login";
            } else {
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
                            location.reload();
                        } else {
                            alert(cart);
                        }
                    }
                } else {
                    alert("Web Storage tidak disupport oleh browser anda sehingga shopping cart tidak dapat digunakan. Update web browser anda ke versi yang paling baru.");
                }
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
                    <li><a href="<?php echo ROOT_URL . '/p/jurnal';?>">Reading Journal</a></li>
                    <li><a href="<?php echo ROOT_URL . '/p/community';?>">RuBa Community</a></li>
                    <li><a href="<?php echo ROOT_URL . '/p/faq';?>">FAQ</a></li>
                    <li><a class="feedbackBtn" href="">Feedback</a></li>
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

	<?php
    while($data = mysqli_fetch_array($queryBukuTerbaru)) {
        $idbuku = $data[0];
        $urlGambar = ROOT_DIR . "/images/" . $data['filegambar'];
        if (file_exists($urlGambar)) {
            $gambarBuku = $data['filegambar'];
        } else {
            $gambarBuku = "default_cover.JPG";
        } ?>
        <div class="mainpage"
             style="max-width: 1000px; margin: auto; margin-bottom: 60px; height: -webkit-fill-available">
            <div class="row pageBukuHeader">
                <div class="col-md-12">
                    <span class="judul"><?php echo $data['judul'] ?></span>
                </div>
            </div>
            <div class="row pageBuku" style="">
                <div class="col-md-6 left" style="">
                    <div class="row">
                        <div class="col-md-5 fotoBuku">
                            <img src="../../images/<?php echo $data['filegambar'] ?>" align="center">
                        </div>
                        <div class="col-md-7 detailBuku">
                            <span>Detail Buku</span>
                            <table>
                                <tr>
                                    <td style="font-weight: bold;">Penulis</td>
                                    <td> <?php echo $data['penulis'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Bahasa</td>
                                    <td> <?php echo $data['bahasa'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Pemilik</td>
                                    <td> <?php echo $data['namapengguna'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Harga</td>
                                    <td> <?php echo $data['hargasewa'] ?> / Minggu</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pinjam">
                            <?php 
                            if(isset($_SESSION['username'])){
                                if($data[9] == $_SESSION['username']){ ?>
                            <button type="button" class="btn disabled">Tambah Ke Keranjang</button>
                            <?php } else { ?>
                            <button onclick="addtocart('<?php echo $idbuku; ?>')" type="button" class="btn">Tambah Ke Keranjang</button>
                            <?php } 
                            } else { ?>
                            <button onclick="addtocart('<?php echo $idbuku; ?>')" type="button" class="btn">Tambah Ke Keranjang</button>
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 right" style="">
                    <div class="row">
                        <div class="col-md-12 sinopsis-header">
                            <span class="header">Deskripsi</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 sinopsis-body">
                            <span class="body"><p align="justify"> <?php echo $data['deskripsi'] ?>.</p></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 starReview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<br><br><br>

<div class="footer">
</div>
</body>
</html>