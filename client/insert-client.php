<?php
$text1=$text2=$text3=$text4=$text5=$text6=$text7=$text8=$text9=$text10=$text="Not found";
include '../php/connect.php';
include '../php/session.php';
$text1=$_POST['name'];
$text2=$_POST['organisation'];
$text3=$_POST['email'];
$text4=$_POST['mobile'];
$text5=$_POST['phone'];
$text6=$_POST['address'];
$text7=$_POST['country'];
$text8=$_POST['pin'];
$text9=$_POST['state'];
$text10=$_POST['city'];
$text=$_POST['website'];
$status="Active";

$sql1="SELECT email FROM clients WHERE email='$text3'";
$query1=mysqli_query($connection,$sql1);
$count1=mysqli_num_rows($query1);

if($connection->connect_error){
	die("Connection failed:".$connection->connect_error);
}
if($count1>0){
	header("Refresh:0; url=add-client.php?action=failed");
}
else{
	$sql="INSERT INTO `clients`(`id`, `client_name`, `email`, `mobile`, `phone`, `status`, `organisation`, `website`, `address`, `country`, `state`, `city`, `pin`, `reg_date`) VALUES ('','$text1', '$text3', '$text4','$text5', '$status', '$text2', '$text', '$text6', '$text7', '$text9', '$text10', '$text8', now())";
	$result=mysqli_query($connection, $sql);
	header("Refresh:0; url=add-client.php?action=success");
}


mysqli_close($connection);

?>
