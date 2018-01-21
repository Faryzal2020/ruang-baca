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
								<button type="button" class="btn btnlihatdetailuser" data-toggle="modal" data-target="#userinfoModal">Informasi User</button>
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
					<div class="userpage-tabbing">
						<ul class="nav nav-tabs">
						  	<li class="active"><a href="#">Koleksi Buku</a></li>
						  	<li><a href="#">Ulasan</a></li>
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
				</div>
			</div>
		</div>
	</div>
	<?php include_once("../footer.php"); ?>
</body>
</html>
