<?php
include '../php/connect.php';
include '../php/session.php';

$text1=$_POST['hosting'];
$text2=$_POST['client_id'];
$text3=$_POST['server_category'];
$text4=$_POST['domain'];
$text5=$_POST['server_type'];
$text6=$_POST['server_space'];
$text7=$_POST['date'];
$text8=$_POST['period'];
$text9=$_POST['provider'];
$text11=$_POST['info'];
$username=$_POST['text5'];
$password=$_POST['text6'];
$email=$_POST['text7'];
$password_email=$_POST['text8'];
$cpanelUsername=$_POST['text9'];
$cpanelPassword=$_POST['text10'];

if($connection->connect_error){
	die("Connection failed:".$connection->connect_error);
}

$sql1="SELECT hosting_name, client_id FROM hosting WHERE hosting_name='$text1' AND client_id='$text2'";
$query1=mysqli_query($connection,$sql1);
$count1=mysqli_num_rows($query1);
if($count1>0){
	header("Refresh:0; url=add-hosting.php?action=failed");
}

else{
	$sql="INSERT INTO `hosting`(`id_hosting`, `hosting_name`, `server_category`, `server_type`, `server_space`, `reg_date_hosting`, `validity`, `username_hosting`, `password_hosting`, `email_hosting`, `password_email_hosting`, `cpanel_hosting`, `cpanel_password_hosting`, `info`, `client_id`, `domain_id`, `provider_id`, `reg_hosting`) VALUES 
								('', 				'$text1', 		'$text3', 		'$text5', 			'$text6', 		'$text7', 	'$text8', 	'$username', 		'$password',			'$email', 		'$password_email',		'$cpanelUsername','$cpanelPassword',		'$text11','$text2',		'$text4',	'$text9',		now())";
	$query=mysqli_query($connection, $sql);
	header("Refresh:0; url=add-hosting.php?action=success");
}
mysqli_close($connection);
?>
