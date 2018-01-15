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
	<script type="text/javascript">
		$(document).ready(function(){
			function getSum(total, num){
				return total + num;
			}
			Storage.prototype.setObj = function(key, obj) {
			    return this.setItem(key, JSON.stringify(obj))
			}
			Storage.prototype.getObj = function(key) {
			    return JSON.parse(this.getItem(key))
			}

			refreshCheckoutItems();
			function refreshCheckoutItems(){
				var cart = localStorage.getObj('cart');
				var i;
				var owners = [];
				for (i = cart.length - 1; i >= 0; i--) {
					var owner = getBookOwner(cart[i]);
					var id = owner[1]+"-table";
					if(!document.getElementById(id)){
						owners.push(owner[1]);
						var divider = document.getElementById('total-payment-container');
				    	var tabel = document.createElement('table');
				    	tabel.innerHTML = "<tr><th colspan=\"3\">Peminjaman buku dari: <span>"+owner[0]+"</span></th></tr><tr id=\""+owner[1]+"-table\"></tr><tr id=\""+owner[1]+"-table2\"></tr>"
				    	tabel.className = "order-detail-table "+owner[1];
				    	divider.parentNode.insertBefore(tabel,divider);
					}
					loadCheckoutItems(cart[i], owner[0], owner[1]);
				}
				console.log(owners);
				var i = owners.length-1;
				while(i>=0) {
					var id = owners[i] + "-table2";
					var ownerTable = document.getElementById(id);
					var tr = document.createElement('tr');
					tr.innerHTML = document.getElementById('transaction-detail').innerHTML;
					tr.className = "transaction-detail";
					var tr2 = document.createElement('tr');
					tr2.innerHTML = document.getElementById('transaction-detail-tfoot').innerHTML;
					ownerTable.parentNode.insertBefore(tr, ownerTable);
					ownerTable.parentNode.insertBefore(tr2, ownerTable);
					var classname = "hargaSewaPerBuku-"+owners[i];
					var subtotal = document.getElementsByClassName("subtotal-price")[0];
					var ongkir = document.getElementsByClassName("ongkir")[0];
					var total = document.getElementsByClassName("total-price")[0];
					var totalPembayaran = document.getElementById("total-pembayaran");
					
					var hargasewa = document.getElementsByClassName(classname);
					for (var j = hargasewa.length - 1; j >= 0; j--) {
						subtotal.innerHTML = parseInt(hargasewa[j].innerHTML) + parseInt(subtotal.innerHTML);
					}
					total.innerHTML = parseInt(subtotal.innerHTML) + parseInt(ongkir.innerHTML);
					totalPembayaran.innerHTML = parseInt(total.innerHTML) + parseInt(totalPembayaran.innerHTML);
					i--;
				}
			}

			function getBookOwner(idbuku){
				var url = document.getElementById("ROOT-URL").innerHTML + "/ajax/getBookOwner.php";
				var owner = [];
				$.ajax({
				    dataType: 'json',
				    url:url,
				    async: false,
				    method:'post',
				    data : {'idbuku':idbuku},
				    success:function(response){
				    	owner.push(response[0]);
				    	owner.push(response[1]);
				    }
				});
				return owner;
			}

			function loadCheckoutItems(idbuku, nama, username){
				var url = document.getElementById("ROOT-URL").innerHTML + "/ajax/loadCheckoutItems.php";
				$.ajax({
				    dataType: 'html',
				    url:url,
				    async: false,
				    method:'post',
				    data : {'idbuku':idbuku, 'username':username},
				    success:function(response){
				    	var id = username + "-table";
				    	var table = document.getElementById(id);
				    	var item = document.createElement('tr');
				    	item.innerHTML = response;
				    	item.className = "cart-item";
				    	table.parentNode.insertBefore(item, table);
				    }
				});
			}
		});
		function pinjamBuku(){
			var url = document.getElementById("ROOT-URL").innerHTML + "/ajax/pinjamBuku.php";
			var cart = localStorage.getObj('cart');
			var jsonstring = JSON.stringify(cart);
			var totalPembayaran = parseInt(document.getElementById("total-pembayaran").innerHTML);
			$.ajax({
			    dataType: 'html',
			    url:url,
			    method:'post',
			    data : {'data':jsonstring, 'totalBayar': totalPembayaran},
			    success:function(response){
			    	alert(response);
			    	var cart = [];
			    	localStorage.setObj('cart',cart);
			    	window.location.href = "<?php echo ROOT_URL.'/';?>";
			    }
			});
		}
	</script>
	<div class="mainpage row" style="padding: 0px 50px">
		<div class="container-fluid" style="width: 950px!important; margin: 0 auto!important;">
			<div class="row row-fluid">
				<table class="order-detail-table">
				</table>
				<div class="total-payment-container" id="total-payment-container">
					<div class="container-total">
						<p>
							<small>Total Pembayaran</small>
						</p>
						<h4>
							<b>Rp <label id="total-pembayaran">0</label></b>
						</h4>
					</div>
					<div class="bottom-buttons">
						<button onclick="window.location.href = '<?php echo ROOT_URL;?>'" class="btn kembali-btn"><i class="fa fa-chevron-left"></i> Kembali</button>
						<button onclick="pinjamBuku()" class="btn lanjut-btn float-right">Pinjam Buku <i class="fa fa-chevron-right"></i></button>
					</div>
					<table id="transaction-detail-table" style="display: none;">
						<tr class="transaction-detail" id=transaction-detail>
							<td>
								<!--<b>Alamat Tujuan</b>
								<a href="">Edit</a>
								<p class="receiver-address">
									<strong>Fakhrizal Andyko</strong>
									<br> Jalan Raya Kampung Pabuaran, Perum Nirmala Asri Blok A No.2, Kelurahan Jatiranggon
									<br> Jatisampurna Kota Bekasi, 17432
									<br> Jawa Barat
									<br> Telp: 08972572573
								</p>-->
							</td>
							<td>
								<p>
									<b>Subtotal</b>
									<span class="block">Rp <label class="subtotal-price">0</label></span>
								</p>
							</td>
							<td>
								<p>
									<b>Metode Pengiriman:</b>
									<span style="display:block;">COD</span>
									<b style="display:block;">Ongkos Kirim:</b>
									<span class="block">Rp <label class="ongkir">0</label></span>
								</p>
							</td>
						</tr>
						<tr id="transaction-detail-tfoot"><td colspan="3">
							<span><a href=""><small><i class="glyphicon glyphicon-remove"></i> Hapus Semua</small></a></span>
							<span style="float: right;">Total <b>Rp <label class="total-price">0</label></b></span>
						</td></tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once("../../footer.php"); ?>
</body>
</html>