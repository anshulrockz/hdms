<?php   
include 'connect.php';
include 'session.php';
if(!$connection){
	die("connectionn err:".mysqli_connect_error());
}

$user="admin";//$_POST['user'];
$password=$_POST['password'];
$npassword=$_POST['npassword'];
$cpassword=$_POST['cpassword'];

$query=mysqli_query($connection,"SELECT user, password FROM users WHERE user='$user'");
$result=mysqli_fetch_assoc($query);
$hash=$result['password'];
if(password_verify($password, $hash)){
	if($npassword==$cpassword){
		if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z!@#$%]{6,16}$/', $npassword)) {
			header("location:../pass-change.php?action=error");
		}
		else{
			$password=password_hash("$npassword", PASSWORD_BCRYPT);
			$str="UPDATE users SET password='$password' WHERE user='$user'";
			$query1=mysqli_query($connection,$str);
			header("refresh:0;url=../pass-change.php?action=success");
		}
	}
	else{
		header("refresh:0;url=../pass-change.php?action=failed");
	}
}
else{
	header("refresh:0;url=../pass-change.php?action=failed2");
}
 mysqli_close($connection);
?>