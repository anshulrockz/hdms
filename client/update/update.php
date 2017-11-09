<?php
include '../../php/connect.php';
include '../../php/session.php';

$text1=$_POST['name'];
$text2=$_POST['organisation'];
$text=$_POST['website'];
$text3=$_POST['email'];
$text4=$_POST['mobile'];
$text5=$_POST['phone'];
$text6=$_POST['address'];
$text7=$_POST['country'];
$text8=$_POST['pin'];
$text9=$_POST['state'];
$text10=$_GET['id'];
$text11=$_POST['city'];


if($connection->connect_error){
	die("Connection failed:".$connection->connect_error);
}
$sql="UPDATE clients SET client_name='$text1', email='$text3', mobile='$text4', organisation='$text2', website='$text', address='$text6', country='$text7', pin='$text8', state='$text9', city='$text11'  WHERE id='$text10'";
$result=mysqli_query($connection, $sql);
$connection->close();
header("Refresh:0; url=client-update.php?action=success&id=$text10");
?>
