<?php
include 'connect.php';

//session_start();
//$timeout = 600;
//if(empty($_SESSION)){
	//header("refresh:0;url=index.php");
//}

$user=$_POST['user'];
$password=$_POST["password"];
$npassword=$_POST['npassword'];
$cpassword=$_POST['cpassword'];

$temp=password_hash($password, PASSWORD_BCRYPT);

if(!$connection){
	die("connectionn err:".mysqli_connect_error());
}
$sql="INSERT INTO users (id_user, user, password, reg) VALUES ('','$user', '$temp', now())";
$query=mysqli_query($connection,$sql);
echo $sql;
?>