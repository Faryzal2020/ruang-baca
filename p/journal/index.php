<?php
session_start();
include("../../config.php");

$queryJournal = mysqli_query($db,"SELECT r.idjurnal, r.juduljurnal, r.tanggal, r.tulisan, r.filegambar, p.username, p.namapengguna, p.kota FROM readingjournal as r, pengguna as p WHERE r.username = p.username AND r.idjurnal = '".$_GET['id']."'");
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
			    	<li><a href="<?php echo ROOT_URL .'/';?>">Home</a></li>
					<li><a href="<?php echo ROOT_URL . '/p/catalog';?>">Catalog</a></li>
                    <li><a href="<?php echo ROOT_URL . '/p/quotes';?>">Quotes</a></li>
                    <li class="active"><a href="<?php echo ROOT_URL . '/p/jurnal';?>">Reading Journal</a></li>
                    <li><a href="<?php echo ROOT_URL . '/p/community';?>">RuBa Community</a></li>
                    <li><a href="<?php echo ROOT_URL . '/p/faq';?>">FAQ</a></li>
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

	<?php
    while($data = mysqli_fetch_array($queryJournal)) {
        $idjurnal = $data[0];
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
                    <span class="judul"><?php echo $data['juduljurnal'] ?></span>
                </div>
            </div>
            <div class="row pageBuku" style="">
                <div class="col-md-6 left" style="">
                    <div class="row">
                        <div class="col-md-7 fotoBuku">
                            <img src="../../images/<?php echo $data['filegambar'] ?>" align="center">
                        </div>
                        
                    </div>
                    <div class="row">
						<div class="col-md-7 detailBuku">
                            <span>Karya:</span>
                            <table>
                                <tr>
                                    <td style="font-weight: bold;">Penulis</td>
                                    <td> <?php echo $data['namapengguna'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Tanggal</td>
                                    <td> <?php echo $data['tanggal'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 right" style="">
                    <div class="row">
                        <div class="col-md-12 sinopsis-header">
                            <span class="header">Tulisan</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 sinopsis-body">
                            <span class="body"><p align="justify"> <?php echo $data['tulisan'] ?>.</p></span>
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

<?php include_once("../../footer.php"); ?>
</body>
</html>
