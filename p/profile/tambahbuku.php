<?php
	session_start();
	include("../../config.php");
	

if(isset($_POST['submit']))
{
$uploaddir = '/var/www/html/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
/*
echo "<p>";

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed";
}*/
$errorMessage = "";
$judul=  $_POST['tambahbuku-judul'];
$penulis = $_POST['tambahbuku-penulis'];
$bahasa = $_POST['tambahbuku-bahasa'];
$deskripsi = $_POST['tambahbuku-sinopsis'];
$hargasewa = $_POST['tambahbuku-harga'];
$kategori = $_POST['kategori'];
$status = "Tersedia";
$filegambar = $_FILES['userfile']['name'];
 
// validasi
 
if ($errorMessage != "" ) {
echo "<p class='message'>" .$errorMessage. "</p>" ;
}
else{
//insert buku ke database
$tambah="INSERT INTO buku(judul, penulis, idgenre, hargasewa, username, bahasa, deskripsi, status, filegambar) VALUES ('$judul', '$penulis', '$kategori', '$hargasewa', '$_SESSION[username]', '$bahasa', '$deskripsi', '$status', '$filegambar')";
mysqli_query($db,$tambah) or die(mysqli_error($db));
header('Location: index.php');
}
}
?>
