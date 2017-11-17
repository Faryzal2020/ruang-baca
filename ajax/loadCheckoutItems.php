<?php 
	session_start();
	include_once("../config.php");

	$idbuku = $_POST['idbuku'];
	$username = $_POST['username'];

	$queryBuku = mysqli_query($db,"SELECT b.idbuku, b.judul, b.penulis, b.hargasewa, b.filegambar, b.deskripsi FROM buku as b WHERE b.idbuku = '$idbuku'");

	while($data = mysqli_fetch_array($queryBuku)){
		$urlGambar = ROOT_DIR . "/images/" . $data['filegambar'];
		$idbuku = $data['idbuku'];
		if(file_exists($urlGambar)){
			$gambarBuku = $data['filegambar'];
		} else {
			$gambarBuku = "default_cover.JPG";
		}

		echo	"<td>
					<span>
						<img src=\"".ROOT_URL."/images/".$gambarBuku."\" width=\"70\" style=\"margin-right: 10px;\">
					</span>
					<span>
						<div><a href=\"\" class=\"item-name\">".$data['judul']."</a></div>
						<span><small>by ".$data['penulis']."</small></span>
					</span>
				</td>
				<td style=\"width:16%\">
					<span style=\"float: unset; display: block;\">
						<b>Harga Sewa</b>
					</span>
					<span style=\"float: unset; display: block;\">Rp <label class=\"hargaSewaPerBuku-".$username."\">".$data['hargasewa']."</label></span>
				</td>
				<td style=\"width:25%\">
					<button class=\"btn item-operation\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</button>
					<button class=\"btn item-operation\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</button>
				</td>";
	}
?>