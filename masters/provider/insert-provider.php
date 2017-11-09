<?php

include '../../php/connect.php';
include '../../php/session.php';
$text1=$_POST['provider'];
$text2=$_POST['website'];
$text5=$_POST['description'];


if($connection->connect_error){
	die("Connection failed:".$connection->connect_error);
}

$sql="SELECT * FROM providers WHERE name='$text1'";
$query=mysqli_query($connection, $sql);
$count=mysqli_num_rows($query);

if($count>0){
	
	header("Refresh:0; url=../../masters.php?action=failed");
}
else{
	$sql2="INSERT INTO providers (id, name, website, description, reg) VALUES ('','$text1', '$text2', '$text5', now())";
	$result=mysqli_query($connection, $sql2);
	$connection->close();
	header("Refresh:0; url=../../masters.php?action=success");
}

	
?>
