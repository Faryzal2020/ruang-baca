<?php
	session_start();
	include("../../config.php");
	
if(isset($_POST['submit']))
{
$errorMessage = "";
$judul=  $_POST['tambahbuku-judul'];
$penulis = $_POST['tambahbuku-penulis'];
$bahasa = $_POST['tambahbuku-bahasa'];
$deskripsi = $_POST['tambahbuku-sinopsis'];
$hargasewa = $_POST['tambahbuku-harga'];
$kategori = $_POST['kategori'];
echo $kategori;
$status = "Tersedia";
 
// validasi
 
if ($errorMessage != "" ) {
echo "<p class='message'>" .$errorMessage. "</p>" ;
}
else{
//insert buku ke database
$tambah="INSERT INTO buku(judul, penulis, idgenre, hargasewa, username, bahasa, deskripsi, status) VALUES ('$judul', '$penulis', '$kategori', '$hargasewa', '$_SESSION[username]', '$bahasa', '$deskripsi', '$status')";
mysqli_query($db,$tambah) or die(mysqli_error($db));
header('Location: index.php');
}
}
?>
