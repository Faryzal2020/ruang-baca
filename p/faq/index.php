<?php
	session_start();
	include("../../config.php");

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
			    	<li><a href="<?php echo ROOT_URL . '/p/catalog';?>">Catalog</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/quotes';?>">Quotes</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/jurnal';?>">Reading Journal</a></li>
			    	<li><a href="<?php echo ROOT_URL . '/p/community';?>">RuBa Community</a></li>
			    	<li class="active"><a href="<?php echo ROOT_URL . '/p/faq';?>">FAQ</a></li>
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
				<label>FAQ</label>
			</div>
			<div class="faqWrapper">
				<div class="faqPanel panel panel-default">
					<button class="panel-heading" data-toggle="collapse" data-target="#faq-1">
						<div class="left">
							<span class="glyphicon glyphicon-question-sign"></span>
						</div>
						<div class="right">
							<span class="question">QUESTION 1</span>
						</div>
					</button>
					<div id="faq-1" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget magna a lacus suscipit faucibus in eu libero. Maecenas quis ullamcorper elit. Duis pretium convallis massa id maximus. Aliquam id ultrices enim. Proin pharetra, elit eu accumsan facilisis, quam dolor blandit leo, ut vehicula sapien lacus in arcu. Aliquam consequat, purus a sagittis venenatis, dolor dui vulputate dolor, sed ultricies ex turpis sit amet sapien. Donec id turpis quis augue scelerisque scelerisque. </span>
							</div>
						</div>
					</div>
				</div>
				<div class="faqPanel panel panel-default">
					<button class="panel-heading" data-toggle="collapse" data-target="#faq-2">
						<div class="left">
							<span class="glyphicon glyphicon-question-sign"></span>
						</div>
						<div class="right">
							<span class="question">QUESTION 2</span>
						</div>
					</button>
					<div id="faq-2" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget magna a lacus suscipit faucibus in eu libero. Maecenas quis ullamcorper elit. Duis pretium convallis massa id maximus. Aliquam id ultrices enim. Proin pharetra, elit eu accumsan facilisis, quam dolor blandit leo, ut vehicula sapien lacus in arcu. Aliquam consequat, purus a sagittis venenatis, dolor dui vulputate dolor, sed ultricies ex turpis sit amet sapien. Donec id turpis quis augue scelerisque scelerisque. </span>
							</div>
						</div>
					</div>
				</div>
				<div class="faqPanel panel panel-default">
					<button class="panel-heading" data-toggle="collapse" data-target="#faq-3">
						<div class="left">
							<span class="glyphicon glyphicon-question-sign"></span>
						</div>
						<div class="right">
							<span class="question">QUESTION 3</span>
						</div>
					</button>
					<div id="faq-3" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="left">
							</div>
							<div class="right">
								<span class="answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget magna a lacus suscipit faucibus in eu libero. Maecenas quis ullamcorper elit. Duis pretium convallis massa id maximus. Aliquam id ultrices enim. Proin pharetra, elit eu accumsan facilisis, quam dolor blandit leo, ut vehicula sapien lacus in arcu. Aliquam consequat, purus a sagittis venenatis, dolor dui vulputate dolor, sed ultricies ex turpis sit amet sapien. Donec id turpis quis augue scelerisque scelerisque. </span>
							</div>
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