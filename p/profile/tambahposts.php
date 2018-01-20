<?php
	session_start();
	include("../../config.php");
	

if(isset($_POST['submit']))
{
$uploaddir = ROOT_DIR . "/images/";
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
/*
echo "<p>";

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed";
}*/
$errorMessage = "";
$judul=  $_POST['tambahposts-judul'];
$isi = addslashes($_POST['tambahposts-isiposts']);
$filegambar = $_FILES['userfile']['name'];
 
// validasi
 
if ($errorMessage != "" ) {
echo "<p class='message'>" .$errorMessage. "</p>" ;
}
else{
//insert buku ke database
$tambah="INSERT INTO readingjournal(juduljurnal, tulisan, username, filegambar) VALUES ('$judul', '$isi', '$_SESSION[username]', '$filegambar')";
mysqli_query($db,$tambah) or die(mysqli_error($db));
header('Location: index.php');
}
}
?>
