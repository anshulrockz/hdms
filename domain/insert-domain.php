<?php
include '../php/connect.php';
include '../php/session.php';
if($connection->connect_error){
	die("Connection failed:".$connection->connect_error);
}

$text1=$_POST['domain'];
$text2=$_POST['client_id'];
$text5=$_POST['provider'];
$text6=$_POST['date'];
$text7=$_POST['validity'];
$text8=$_POST['info'];
$user_domain=$_POST['text5'];
$password_domain=$_POST['text6'];
$email_domain=$_POST['text7'];
$password_email_domain=$_POST['text8'];

$sql1="SELECT domain_name FROM domains WHERE domain_name='$text1'";
$query1=mysqli_query($connection,$sql1);
$count1=mysqli_num_rows($query1);
if($count1>0){
	header("Refresh:0; url=add-domain.php?action=failed");
}
else{
	$sql="INSERT INTO `domains`(`id_domain`, `domain_name`, `validity`, `reg_date_domain`, `username_domain`, `password_domain`, `email_domain`, `password_email_domain`, `info`, `client_id`, `provider_id`, `reg_domain`) VALUES ('','$text1', '$text7', '$text6', '$user_domain', '$password_domain', '$email_domain','$password_email_domain','$text8', '$text2','$text5',now())";
	$result=mysqli_query($connection, $sql);
	
	header("Refresh:0; url=add-domain.php?action=success");
}
mysqli_close($connection);

?>
