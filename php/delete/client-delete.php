<?php
include '../connect.php';
$connection = mysqli_connect($server, $usernm, $password, $db_nm);
$id=$_GET['id'];
if(!$connection){
	die('connection err :'.mysqli_connect_error());
}

$query=mysqli_query($connection,"DELETE FROM clients WHERE id='$id'");
if($query!=1){
	?>
	<script> alert("Delete error: Client is associated with domain or hosting. Please delete them first")</script>
	<?php
	header("Refresh:0; url=../../clients.php?action=error");
	}
else
	header("Refresh:0; url=../../clients.php?action=success");
?>