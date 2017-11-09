<?php
include '../../php/connect.php';
include '../../php/session.php';
$updateId=$_GET['id'];
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
if($count1>1){
	header("Refresh:0; url=hosting-update.php?action=failed");
}
else{
	$sql="UPDATE `hosting` SET `hosting_name`='$text1', `server_category`='$text3',`server_type`='$text5', `server_space`='$text6', `reg_date_hosting`='$text7', `validity`='$text8', `url`='',`username_hosting`='$username', `password_hosting`='$password', `email_hosting`='$email', `password_email_hosting`='$password_email', `cpanel_hosting`='$cpanelUsername', `cpanel_password_hosting`='$cpanelPassword',`info`='$text11', `client_id`='$text2', `domain_id`='$text4', `provider_id`='$text9' WHERE id_hosting='$updateId'";
	$result=mysqli_query($connection, $sql);
	header("Refresh:0; url=../../hosting.php?action=update");
}
$connection->close();

?>
