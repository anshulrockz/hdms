<?php
	include "connect.php";
	if(!$connection){
		die('connection err'.mysqli_connect_error()); 
		header("location:../index.php");
	}
	$username=$_POST['user'];
	$password=$_POST['password'];
	
	$query=mysqli_query($connection,"SELECT user, password FROM users WHERE user='$username'");
	$count=mysqli_num_rows($query);
	if($count<1){
		header("location:../login.php?action=error");
		die();
	}
	$result=mysqli_fetch_assoc($query);
	$hash=$result['password'];
	if(password_verify($password, $hash)){
		session_start();
		$_SESSION['user']=$username;
		header("location:../dashboard.php");
	}
	else{
		header("location:../login.php?action=failed");
	}
	
?>