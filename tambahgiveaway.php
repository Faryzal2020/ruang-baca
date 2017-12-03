<?php
	session_start();
	include("../../config.php");
	$queryGiveaway = mysqli_query($db,"SELECT b.idgiveaway, b.username, b.judulbuku, b.penulisbuku, b.isigiveaway, b.status, b.tanggalinput, b.filegambar FROM giveaway as b WHERE username = '$username'");	

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
$judulbuku=  $_POST['tambahgiveaway-judulbuku'];
$penulisbuku = $_POST['tambahgiveaway-penulisbuku'];
$isigiveaway = $_POST['tambahgiveaway-isigiveaway'];
$status = "Tersedia";
$filegambar = $_FILES['userfile']['name'];
 
// validasi
 
if ($errorMessage != "" ) {
echo "<p class='message'>" .$errorMessage. "</p>" ;
}
else{
//insert buku ke database
$tambah="INSERT INTO buku(judulbuku, penulisbuku, isigiveaway, status, filegambar) VALUES ('$judulbuku', '$penulisbuku', '$isigiveaway', '$_SESSION[username]', '$status', '$filegambar')";
mysqli_query($db,$tambah) or die(mysqli_error($db));
header('Location: index.php');
}
}
?>
