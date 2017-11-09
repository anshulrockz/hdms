<?php
include '../../php/connect.php';
include '../../php/session.php';

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

$text4=$_GET['id'];

if($connection->connect_error){
	die("Connection failed:".$connection->connect_error);
}
$sql="UPDATE `domains` SET `domain_name`='$text1' , `validity`='$text7', `reg_date_domain`='$text6', `username_domain`='$user_domain', `password_domain`='$password_domain', `email_domain`='$email_domain', `password_email_domain`='$password_email_domain', `info`='$text8', `client_id`='$text2', `provider_id`='$text5' WHERE id_domain='$text4'";

$result=mysqli_query($connection, $sql);
$connection->close();
header("Refresh:0; url=domain-update.php?action=update&id=$text4");

?>
