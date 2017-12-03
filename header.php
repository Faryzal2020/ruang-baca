	<script type="text/javascript">
		$(document).ready(function(){
			Storage.prototype.setObj = function(key, obj) {
			    return this.setItem(key, JSON.stringify(obj))
			}
			Storage.prototype.getObj = function(key) {
			    return JSON.parse(this.getItem(key))
			}
			refreshCart();

			function refreshCart(){
				if(document.getElementById("loggedUsername").innerHTML == ""){
					var cart = [];
					localStorage.setObj('cart',cart);
				}
				var cart = localStorage.getObj('cart');
				if(cart.length <= 0){
					document.getElementById("cartBtn").classList.toggle("disabled", true);
					document.getElementById("cart-info").style.display = "none";
					document.getElementById("cart-kosong").style.display = "block";
				} else {
					document.getElementById("cartBtn").classList.toggle("disabled", false);
					document.getElementById("cart-info").style.display = "block";
					document.getElementById("cart-kosong").style.display = "none";
					for (var i = cart.length - 1; i >= 0; i--) {
						getBookToCart(cart[i],i);
					}
				}
			}
			
			function cartItemCount(){
				var item = document.getElementsByClassName('cartItem');
				var price = document.getElementsByClassName('cartItemPrice');
				var total = 0;
				document.getElementById('cartItemCount').innerHTML = item.length;
				for (var i = price.length - 1; i >= 0; i--) {
					total += parseInt(price[i].innerHTML);
				}
				document.getElementById('cartPriceTotal').innerHTML = total;
			}

			function getBookToCart(idbuku, i){
				var url = document.getElementById("ROOT-URL").innerHTML + "/ajax/getBookToCart.php";
				$.ajax({
				    dataType: 'html',
				    url:url,
				    method:'post',
				    data : {'idbuku':idbuku, 'num':i},
				    success:function(response){
				    	var divider = document.getElementById('divider');
				    	var li = document.createElement('li');
				    	li.innerHTML = response;
				    	li.className = "cartItem";
				    	divider.parentNode.insertBefore(li,divider);
				    	cartItemCount();
				    }
				});
			}
		});
		function removeFromCart(idbuku){
			Storage.prototype.setObj = function(key, obj) {
			    return this.setItem(key, JSON.stringify(obj))
			}
			Storage.prototype.getObj = function(key) {
			    return JSON.parse(this.getItem(key))
			}
			var cart = localStorage.getObj('cart');
			var index = cart.indexOf(idbuku);
			if(index > -1){
				cart.splice(index, 1);
			}
			localStorage.setObj('cart',cart);
			location.reload();
		}
		function emptyCart(){
			if(confirm("Kosongkan keranjang?")){
				var cart = [];
				localStorage.setObj('cart',cart);
				location.reload();
			}
		}
		function logout(){
			var url = document.getElementById("ROOT-URL").innerHTML + "/ajax/logoutRequest.php";
			$.ajax({
		        dataType: 'html',
		        url:url,
		        method:'post',
		        data : {},
		        success:function(response){
		        	window.location.href = '<?php echo ROOT_URL; ?>';
		        }
		    });
		}
	</script>
	<div class="header">
		<label id="loggedUsername" style="display: none;"><?php if(!isset($_SESSION['username'])){echo "";}else{echo $_SESSION['username'];} ?></label>
		<label id="ROOT-URL" style="display: none"><?php echo ROOT_URL; ?></label>
		<div class="topcolor" style="height: 10px; background-color: #7cb71b"></div>
		<div class="headerTop">
			<div class="logo">
				<img onclick="window.location.href = '<?php echo ROOT_URL; ?>'" style="" src="
					<?php if(file_exists('images/logo3.PNG')){echo 'images/logo3.PNG';} else { echo ROOT_URL . '/images/logo3.PNG';}?>" width="200">
			</div>
			<div class="cart container">
				<div class="dropdown">
					<button id="cartBtn" class="cartBtn dropdown-toggle disabled" type="button" data-toggle="dropdown">
						<span class="cart-icon"><i class="glyphicon glyphicon-shopping-cart"></i> Cart</span>
						<div class="cart-info" id="cart-info"><span id="cartItemCount"></span> Item(s) | Rp <span id="cartPriceTotal"></span></div>
						<span id="cart-kosong">Kosong</span>
					</button>
					<ul class="dropdown-menu cart-dropdown" id="cartItemList">
						<li class="divider" id="divider"></li>
						<li>
							<button onclick="emptyCart()" class="btn clear-cart"><span class="glyphicon glyphicon-remove"></span> Kosongkan</button>
							<button onclick="window.location.href = '<?php echo ROOT_URL . '/p/checkout';?>'" class="btn checkout" style="float: right;"><span class="glyphicon glyphicon-share"></span> Check Out</button>
						</li>
					</ul>
				</div>
			</div>
			<?php if(isset($_SESSION['username'])){?>
				<button class="btn userProfile" onclick="window.location.href = '<?php echo ROOT_URL . '/p/profile';?>'">
					<table>
						<tr>
							<td class="profpic"></td>
							<td class="nama" style="padding-left: 10px"><?php echo $_SESSION['username']; ?></td>
						</tr>
					</table>
				</button>
				<a class="btn logout" onclick="logout()">Log Out</a>
			<?php }else{?>
				<a class="btn register" href="<?php echo ROOT_URL . '/p/register';?>">Register</a>
				<a class="btn login" href="<?php echo ROOT_URL . '/p/login';?>">Login</a>
			<?php } ?>
			
			
		</div>
	</div>