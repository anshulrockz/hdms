<?php

session_start();
if(empty($_SESSION)){
	header("location:login.php");
}
else{
	header("location:dashboard.php");
}

?>