<?php
	session_start();
	include("../../config.php");
	$queryJournal = mysqli_query($db,"SELECT r.idjurnal, r.juduljurnal, r.tanggal, r.tulisan, r.filegambar, p.username, p.namapengguna, p.kota FROM readingjournal as r, pengguna as p WHERE r.username = p.username");
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
	<div class="mainpage row" style="padding: 0px 50px">
		<div class="col-md-12" style="margin-bottom: 60px;">
					<div class="sectionTitle">
						<label>READING JOURNAL</label>
					</div>
					<div class="home-reviews-wrapper">
						<?php
							while($dataJurnal = mysqli_fetch_array($queryJournal)){
								$idjurnal = $dataJurnal['idjurnal'];
								?>
						<div class="home-reviews">
							<div class="tanggal">
								<?php echo $dataJurnal['tanggal']; ?>
							</div>
							<div class="judul click">
								<a href="<?php echo '../journal/index.php?id='.$idjurnal; ?>"><?php echo $dataJurnal['juduljurnal']; ?></a>
							</div>
							<div class="user">
								<div class="profpic">
								</div>
								<div class="nama click">
									<a href="<?php echo ROOT_URL . '/u/?n=' . $dataJurnal['username'];?>"><?php echo $dataJurnal['namapengguna']; ?></a>
								</div>
							</div>
							<div class="review">
								"<?php echo $dataJurnal['tulisan']; ?>"
							</div>
							<div class="bottomsection">
								<a href="<?php echo '../journal/index.php?id='.$idjurnal; ?>" style="float: right;">Read More</a>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
	<div class="mainpage row" style="padding: 0px 50px">
		<div class="col-md-12" style="margin-bottom: 60px; height: -webkit-fill-available">
			
		</div>
	</div>
</div>
<?php include_once("../../footer.php"); ?>
</body>
</html>
