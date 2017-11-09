<?php
include 'connect.php';
include 'session.php';

$text1=$_GET['id'];

$query=mysqli_query($connection,"SELECT status FROM clients WHERE id='$text1'");
$result=mysqli_fetch_assoc($query);
$status=$result['status'];
if($status=="Active"){
	$status="Inactive";
}
else{
	$status="Active";
}

if($connection->connect_error){
	die("Connection failed:".$connection->connect_error);
}
$sql="UPDATE clients SET status='$status' WHERE id='$text1'";

$result=mysqli_query($connection, $sql);
mysqli_close($connection);
header("Refresh:0; url=../clients.php?action=status");
?>
