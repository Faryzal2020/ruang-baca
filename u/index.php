<?php
session_start();
include("../config.php");

if(isset($_GET['n'])){
	$myusername = "";
	$username = $_GET['n'];
	if(isset($_SESSION['username'])){
		$myusername = $_SESSION['username'];
	}
	if($username == $myusername){
		header("Location: ".ROOT_URL.'/p/profile');
	}
	$query = mysqli_query($db,"SELECT * FROM pengguna WHERE username = '$username' AND username != '$myusername'");
	if($query){
		while($data = mysqli_fetch_array($query)){
			$nama = $data['namapengguna'];
			$alamat = $data['alamat'];
			$kota = $data['kota'];
			$email = $data['email'];
			$tanggalreg = date("d F Y", strtotime($data['tanggalregist']));
			$telp = $data['telepon'];
		}
	}
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	$limit = 32;
	$limit_start = ($page - 1) * $limit;
	$queryBuku = mysqli_query($db,"SELECT * FROM buku WHERE username = '$username' LIMIT ".$limit_start.",".$limit);
	$queryUlasan = mysqli_query($db,"SELECT * FROM ulasan as u, pengguna as p WHERE u.penerima = '$username' AND u.pemberi = '$myusername' AND u.pemberi = p.username ");
} else {
	header("Location: ".ROOT_URL.'/');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#stars li').on('mouseover', function(){
				var onStar = parseInt($(this).data('value'), 10);
    			$(this).parent().children('li.star').each(function(e){
				    if (e < onStar) {
				    	$(this).addClass('hover');
				    }
				    else {
				        $(this).removeClass('hover');
				    }
    			});
    		}).on('mouseout', function(){
    			$(this).parent().children('li.star').each(function(e){
    				$(this).removeClass('hover');
    			});
  			});

			$('#stars li').on('click', function(){
    			var onStar = parseInt($(this).data('value'), 10);
    			var stars = $(this).parent().children('li.star');
    
			    for (i = 0; i < stars.length; i++) {
			    	$(stars[i]).removeClass('selected');
			    }
			    
			    for (i = 0; i < onStar; i++) {
			    	$(stars[i]).addClass('selected');
			    }
			    var ratingValue = document.getElementById("starRating");
			    ratingValue.value = parseInt($('#stars li.selected').last().data('value'), 10);
			    document.getElementById("ratingOKbtn").classList.remove("disabled"); 
			});

			$('#ratingCloseBtn').on('click', function(){
				var stars = document.getElementsByClassName("star");
				for (i = 0; i < stars.length; i++) {
			    	$(stars[i]).removeClass('selected');
			    }
			    var ratingValue = document.getElementById("starRating");
			    ratingValue.value = 0;
			    document.getElementById("ratingOKbtn").classList.add("disabled");
			    document.getElementById("pesanUlasan").value = "";
			});

			$('#ratingOKbtn').on('click', function(){
				var pesan = document.getElementById("pesanUlasan").value;
				var rating = document.getElementById("starRating").value;
				var penerima = document.getElementById("viewedUser").innerHTML;
				$.ajax({
				    dataType: 'html',
				    url:"../ajax/beriUlasan.php",
				    method:'post',
				    data : {'pesan':pesan, 'rating': rating, 'penerima': penerima},
				    success:function(response){
				    	alert(response);
				    	var stars = document.getElementsByClassName("star");
						for (i = 0; i < stars.length; i++) {
					    	$(stars[i]).removeClass('selected');
					    }
					    var ratingValue = document.getElementById("starRating");
					    ratingValue.value = 0;
					    document.getElementById("ratingOKbtn").classList.add("disabled");
					    document.getElementById("pesanUlasan").value = "";
					    
				    }
				});
			});

			var tabs = document.querySelectorAll('.tabs');
			var pages = document.querySelectorAll('.userpage-page');
			var forEach = Array.prototype.forEach;
			if(localStorage.userpageSelectedTab){
				setActive(localStorage.userpageSelectedTab);
			} else {
				setActive(0);
			}
			forEach.call(tabs,addListener);
			function addListener(el, i){
				el.addEventListener('click', function(){
					setActive(i);
				})
			}

			function removeActive(el){
				el.classList.remove('active');
			}

			function setActive(i){
				localStorage.setItem("userpageSelectedTab",i);
				forEach.call(tabs, removeActive);
				forEach.call(pages, removeActive);
				tabs[i].classList.add('active');
				pages[i].classList.add('active');
			}
		});
	</script>
</head>
<body>
	<div class="backgroundHeader">
	</div>
	<div class="body">
		<?php include_once(ROOT_DIR . "/header.php"); ?>
		<div id="viewedUser" style="display: none;"><?php echo $username; ?></div>
		<div class="mainpage row" style="padding: 0px 50px">
			<div class="container-fluid" style="width: 1190px!important; margin: 0 auto!important;">
				<div class="row row-fluid">
					<div class="userpage-header">
						<div class="row header1">
							<div class="col-md-2">
								<div class="profpic-container">
									<div class="profpic"></div>
								</div>
							</div>
							<div class="col-md-10" style="height: 100%;">
								<div class="name-container">
									<div class="nama"><?php echo $nama;?></div>
								</div>
							</div>
						</div>
						<div class="row header2">
							<div class="col-md-12" style="height: 100%;">
								<button type="button" class="btn btnberiulasan" data-toggle="modal" data-target="#ulasanModal">Beri Ulasan</button>
								<button type="button" class="btn btnlihatdetailuser" data-toggle="modal" data-target="#userinfoModal" style="margin-right: 10px;">Informasi User</button>
							</div>
						</div>
					</div>
					<div id="userinfoModal" class="modal fade" role="dialog">
						<div class="modal-dialog">
					    	<div class="modal-content">
					    		<div class="modal-header">
					    			<button type="button" class="close" data-dismiss="modal">&times;</button>
					        		<h4 class="modal-title">Informasi User: <?php echo $nama; ?></h4>
					      		</div>
					    		<div class="modal-body">
					        		<table>
					        			<tr>
					        				<td>Email</td>
					        				<td>:</td>
					        				<td><?php echo $email;?></td>
					        			</tr>
					        			<tr>
					        				<td>Telepon</td>
					        				<td>:</td>
					        				<td><?php echo $telp;?></td>
					        			</tr>
					        			<tr>
					        				<td>Alamat</td>
					        				<td>:</td>
					        				<td><?php echo $alamat;?></td>
					        			</tr>
					        			<tr>
					        				<td>Kota</td>
					        				<td>:</td>
					        				<td><?php echo $kota;?></td>
					        			</tr>
					        			<tr>
					        				<td>Terdaftar Sejak</td>
					        				<td>:</td>
					        				<td><?php echo $tanggalreg;?></td>
					        			</tr>
					        		</table>
					    		</div>
					    		<div class="modal-footer">
					    			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					    		</div>
					    	</div>
						</div>
					</div>
					<div id="ulasanModal" class="modal fade" role="dialog">
						<div class="modal-dialog" style="max-width: 500px;">
					    	<div class="modal-content">
					    		<div class="modal-header">
					    			<button type="button" class="close" data-dismiss="modal">&times;</button>
					        		<h4 class="modal-title">Beri Ulasan</h4>
					      		</div>
					    		<div class="modal-body">
					    			<form>
						        		<table>
						        			<tr>
						        				<td><textarea id="pesanUlasan" name="pesanUlasan"></textarea></td>
						        			</tr>
						        			<tr>
						        				<td>
						        					<input type="hidden" name="starRating" id="starRating" value="0">
						        					<div class='rating-stars text-center' style="margin-top: 16px;">
												    	<ul id='stars'>
												      		<li class='star' data-value='1'>
												        		<i class='fa fa-star fa-fw'></i>
												    		</li>
												    		<li class='star' data-value='2'>
												        		<i class='fa fa-star fa-fw'></i>
												    		</li>
												    		<li class='star' data-value='3'>
												        		<i class='fa fa-star fa-fw'></i>
												    		</li>
												    		<li class='star' data-value='4'>
												      			<i class='fa fa-star fa-fw'></i>
												    		</li>
												    		<li class='star' data-value='5'>
												        		<i class='fa fa-star fa-fw'></i>
												    		</li>
												    	</ul>
													</div>
												</td>
						        			</tr>
						        		</table>
					        		</form>
					    		</div>
					    		<div class="modal-footer" style="text-align: left;">
					    			<button type="button" class="btn btn-default" id="ratingCloseBtn" data-dismiss="modal">Close</button>
					    			<button type="button" class="btn btn-default disabled" id="ratingOKbtn" data-dismiss="modal" style="float: right;">OK</button>
					    		</div>
					    	</div>
						</div>
					</div>
					<div class="userpage-tabbing">
						<ul class="nav nav-tabs">
						  	<li class="tabs active"><a href="#">Koleksi Buku</a></li>
						  	<li class="tabs"><a href="#">Ulasan</a></li>
						</ul>
					</div>
					<div class="userpage-page" id="userpage-page1" style="border: 1px solid lightgrey">
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
										<img src="<?php echo ROOT_URL; ?>../images/<?php echo $gambarBuku;?>" align="center">
										<div class="book-detail">
											<div class="book-name"><a href="<?php echo '../p/book/index.php?id='.$idbuku; ?>"><?php echo $data['judul'];?></a></div>
											<div class="book-author">by <?php echo $data['penulis'];?></div>
											<div class="book-price"><span class="harga">Rp <?php echo $data['hargasewa'];?> / minggu</span>
											<?php 
											if(isset($_SESSION['username'])){
												if($data[6] == $_SESSION['username']){ ?>
												<button type="button" class="btn add-to-cart disabled"><i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-shopping-cart"></i></button>
											<?php } else { ?>
												<button onclick="addtocart('<?php echo $idbuku; ?>')" type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-shopping-cart"></i></button>
											<?php }
											} else { ?>
												<button onclick="addtocart('<?php echo $idbuku; ?>')" type="button" class="btn add-to-cart"><i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-shopping-cart"></i></button>
											<?php } ?>
											</div>
										</div>
									</div>
								</li>
								<?php } ?>
							</ul>
						</div>
						<div class="text-center">
							<ul class="pagination">
					            <?php
					            	if ($page == 1) {
					            ?>
					                <li class="disabled"><a href="#">First</a></li>
					                <li class="disabled"><a href="#">&laquo;</a></li>
					            <?php
						            } else {
						                $link_prev = ($page > 1) ? $page - 1 : 1;
					            ?>
					                <li><a href="<?php echo ROOT_URL . '/u/?n=' . $username . '&page=1';?>">First</a></li>
					                <li><a href="<?php echo ROOT_URL . '/u/?n=' . $username . '&page='.$link_prev;?>">&laquo;</a></li>
					            <?php
						        	}
						            $query = mysqli_query($db,"SELECT COUNT(*) AS jumlah FROM buku WHERE username = '$username'");
						            $data = mysqli_fetch_array($query);
						            $jumlah_page = ceil($data['jumlah'] / $limit);
						            $jumlah_number = 3;
						            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
						            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page;
						            for ($i = $start_number; $i <= $end_number; $i++) {
						                $link_active = ($page == $i) ? 'class="active"' : '';
						            ?>
						                <li <?php echo $link_active; ?>><a href="<?php echo ROOT_URL . '/u/?n=' . $username . '&page='.$i;?>"><?php echo $i; ?></a></li>
						            <?php
						            }
						            if ($page == $jumlah_page) {
						            ?>
						                <li class="disabled"><a href="#">&raquo;</a></li>
						                <li class="disabled"><a href="#">Last</a></li>
						            <?php
						            } else {
						                $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
						            ?>
						                <li><a href="<?php echo ROOT_URL . '/u/?n=' . $username . '&page='.$link_next;?>">&raquo;</a></li>
						                <li><a href="<?php echo ROOT_URL . '/u/?n=' . $username . '&page='.$jumlah_page;?>">Last</a></li>
						            <?php
						            }
					            ?>
					        </ul>
				        </div>
					</div>
					<div class="userpage-page" id="userpage-page2" style="border: 1px solid lightgrey">
						<div class="wrapper-ulasan">
							<ul>
								<?php
									while($data = mysqli_fetch_array($queryUlasan)){
										$date = $data['tanggal'];
										$tanggal = date("j M Y", strtotime($date));
										$jam = date("H:i", strtotime($date));
								?>
								<li>
									<div class="displayUlasan">
										<div class="row">
											<div class="col-md-12">
												<div class="profpic">
													<div class="img"></div>
												</div>
												<div class="namaTanggal">
													<a class="nama" href="<?php echo ROOT_URL . '/u/?n=' . $data['username'];?>"><?php echo $data['namapengguna'];?></a>
													<span class="tanggal"><?php echo $tanggal . " , " . $jam . " WIB" ?></span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="starRatingDisplay">
													<?php
														$rating = $data['rating'];
														for($i = 0; $i < 5; $i++){
															if($i<$rating){
																echo "<span class=\"fa fa-star checked\"></span>";
															} else {
																echo "<span class=\"fa fa-star\"></span>";
															}
														}
													?>
												</div>
												<div class="message"><?php echo $data['pesan']; ?></div>
											</div>
										</div>
										
									</div>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include_once("../footer.php"); ?>
</body>
</html>
