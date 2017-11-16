<?php
	session_start();
	include("../../config.php");

	$queryJournal = mysqli_query($db,"SELECT b.username, b.judul_jurnal, b.tulisan as p WHERE b.username = p.username");
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
			    	<li><a href="<?php echo ROOT_URL;?>">Home</a></li>
			    	<li><a href="<?php echo ROOT_URL;?>">Catalog</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/quotes';?>">Quotes</a></li>
			    	<li class="active"><a href="<?php echo ROOT_URL . '/p/outputjournal';?>">Reading Journal</a></li>
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
		<div class="col-md-12" style="margin-bottom: 60px; height: -webkit-fill-available">
			<div class="sectionTitle">
				<label>Reading Journal</label>
			</div>
			<div class="journalSearch">
				<div class="input-group">
				    <input type="text" class="form-control" placeholder="Search Journal">
				    <div class="input-group-btn">
				    	<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
				    </div>
				</div>
			</div>
			<div class="journalWrapper grid-item">
				<ul> 
					<li>
						<div class="displayJournal">
							<div class="Journal-detail">
								<div class="Journal-username">Oleh <span href="<?php echo $data['username'];?></span></div> 
								<div class="Journal-juduljurnal"><span href="<?php echo '../outputjournal/index.php?id='.$idjurnal; ?>"><?php echo $data['juduljurnal'];?></span></div>
								<div class="Journal-tulisan"><span href="<?php echo '../outputjournal/index.php?id='.$idjurnal; ?>"><?php echo $data['tulisan'];?></span></div>
								</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="tambahJournal" style="float: right; padding-top: 10px; padding-right: 10px;">
			<a class="btn" class="glyphicon glyphicon-plus" href="<?php echo ROOT_URL . '/p/inputjournal';?>" style="width: fit-content; display: inline-block; float: right;">Add Your Journal</a>
			</div>
		</div>
	</div>
</div>
<div class="footer">
</div>
</body>
</html>