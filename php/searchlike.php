<?php
include "connect.php";
$keyWord=$_GET["term"];
$json = [];
//"SELECT * FROM domains WHERE domain_name LIKE '%$keyWord%'";
$query=mysqli_query($connection,"SELECT * FROM domains WHERE domain_name LIKE '%$keyWord%' LIMIT 10 ");
$count= mysqli_num_rows($query);
if($count > 0){
    while ($row = mysqli_fetch_array($query)) {
		$json[] = $row['domain_name'];
    }
	 echo json_encode($json);
}
?>