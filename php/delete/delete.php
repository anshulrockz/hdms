<?php
include '../connect.php';
$table=$_GET['table'];
$id=$_GET['id'];
if(!$connection){
	die('connection err :'.mysqli_connect_error());
}

$query=mysqli_query($connection,"DELETE FROM $table WHERE id='$id'");
if($query!=1){
	?>
	<script> alert("Delete error: Client is associated with domain or hosting. Please delete them first")</script>
	<?php
	header("Refresh:0; url=../../nasters.php?action=failed");
	}
else
	header("Refresh:0; url=../../masters.php?action=success");
?>