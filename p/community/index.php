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
	<script type="text/javascript">
		$(document).ready(function(){
			if(localStorage.rubaSelectedTab){
				selectTab(localStorage.rubaSelectedTab)
			} else {
				selectTab('discussion')
			}
		});
		function selectTab(tab){
			document.getElementById("c-forum").style.display = "none";
			document.getElementById("c-giveaway").style.display = "none";
			document.getElementById("c-trade").style.display = "none";
			tabs = document.getElementsByClassName("c-tabs")
			for (var i = tabs.length - 1; i >= 0; i--) {
				tabs[i].classList.remove("active")
			}
			if(tab == 'discussion'){
				document.getElementById("c-forum").style.display = "block";
				tabs[0].classList.add("active")
			} else if(tab == 'giveaway'){
				document.getElementById("c-giveaway").style.display = "block";
				tabs[1].classList.add("active")
			} else if(tab == 'trade'){
				document.getElementById("c-trade").style.display = "block";
				tabs[2].classList.add("active")
			}
			if(!localStorage.rubaSelectedTab){
				localStorage.rubaSelectedTab = tab
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
			    	<li><a href="<?php echo ROOT_URL . '/p/jurnal';?>">Reading Journal</a></li>
			    	<li class="active"><a href="<?php echo ROOT_URL . '/p/community';?>">RuBa Community</a></li>
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
		<div class="col-md-10 community-container">
			<div class="row">
				<div class="c-header">
					<ul class="nav nav-pills">
					  	<li class="c-tabs active"><a onclick="selectTab('discussion')">Discussion</a></li>
					  	<li class="c-tabs"><a onclick="selectTab('giveaway')">Giveaway</a></li>
					  	<li class="c-tabs"><a onclick="selectTab('trade')">Trade</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="c-content" id="c-forum">
					<div class="c-forum-header">
						<ul class="pagination pagination-sm" style="margin: 0px 0px;">
							  	<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
						</ul>
						<div class="c-postBtn">
							<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#modalPostForum">Post</button>
						</div>
					</div>
				</div>
				<div class="c-content" id="c-trade" style="display:none">
					<!-- KONTEN TRADING ISI DISINI GAN -->
				</div>
				<div class="c-content" id="c-giveaway" style="display:none">
					<!-- KONTEN GIVEAWAY ISI DISINI GAN -->
				</div>
			</div>
		</div>
		<div id="modalPostForum" class="modal fade" role="dialog">
			<div class="modal-dialog">
			    <!-- Modal content-->
				<div class="modal-content">
			    	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        	<h4 class="modal-title">Modal Header</h4>
			      	</div>
			    	<div class="modal-body">
			    		<p>Some text in the modal.</p>
			    	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
