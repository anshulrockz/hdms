<?php
include '../connect.php';
$connection = mysqli_connect($server, $usernm, $password, $db_nm);
$id=$_GET['id'];
if(!$connection){
	die('connection err'.mysqli_connect_error());
}
$query=mysqli_query($connection,"DELETE FROM domains WHERE id_domain='$id'");
header("Refresh:0; url=../../domain.php?action=delete");
mysqli_close($connection);
?>