<?php
	session_start();
	include("../../config.php");
	
if(isset($_POST['submit']))
{
$errorMessage = "";
$isiquotes=$_POST['isiquotes'];
$sumber=$_POST['tambahquote-sumber'];
 
// validasi
 
if ($errorMessage != "" ) {
echo "<p class='message'>" .$errorMessage. "</p>" ;
}
else{
//insert quotes ke database
$tambah="INSERT INTO quotes(username,sumber, isiquotes) VALUES ('$_SESSION[username]','$sumber','$isiquotes')";
mysqli_query($db,$tambah) or die(mysqli_error($db));
header('Location: index.php');
}
}
?>
