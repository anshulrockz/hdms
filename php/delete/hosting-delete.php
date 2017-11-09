<?php
include '../connect.php';
$id=$_GET['id'];
if(!$connection){
	die('connection err'.mysqli_connect_error());
}
$query=mysqli_query($connection,"DELETE FROM hosting WHERE id_hosting='$id'");
header("Refresh:0; url=../../hosting.php?action=delete");
mysqli_close($connection);
?>