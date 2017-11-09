<?php

include '../../php/connect.php';
include '../../php/session.php';
$text1=$_POST['host-type'];
$text2=$_POST['description'];

if(empty($text1)){
	header("Refresh:0; url=../../masters.php?action=failed");
}

if($connection->connect_error){
	die("Connection failed:".$connection->connect_error);
}

$sql="SELECT * FROM host_type WHERE name='$text1'";
$query=mysqli_query($connection, $sql);
$count=mysqli_num_rows($query);

if($count>0){
	header("Refresh:0; url=../../masters.php?action=failed");
}
else{
	$sql2="INSERT INTO host_type (id_type, name, description, reg_date_type) VALUES ('','$text1', '$text2', now())";
	$result=mysqli_query($connection, $sql2);
	$connection->close();
	header("Refresh:0; url=../../masters.php?action=success");
}

	
?>
