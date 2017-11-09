<?php
include "connect.php";
$from=$_GET["from"];
$to=$_GET["to"];
if(empty($from) || empty($from)){
	die("<tr><td colspan=5>Please select dates</td></tr>");
}

$table=$_GET["table"];
$output='';
$i=1;
$str="Are you sure?";
$query=mysqli_query($connection,"SELECT * FROM $table WHERE validity BETWEEN '$from' AND '$to'");
$count= mysqli_num_rows($query);
if($count > 0){
    while ($row = mysqli_fetch_array($query)) {
		//$date=explode(' ',$row["reg_date"]);
		$date=date_create($row["reg_date_domain"]);
		$date=date_create($row["validity"]);
        $output.='<tr>
									<td></td>
									<td>'.$row["domain_name"].'</td>
									<td>'.$row["client_id"].'</td>
									<td>'.$temp=$row["provider_id"].'</td>
									<td>'.$date2=date_format($date,"d-F-Y").'</td>
									<td>'.$date2=date_format($date,"d-F-Y").'</td>
								</tr>'  ; 
    }
     echo $output;
}
else {
    echo '<tr><td colspan=4>No data found</td></tr>';    
}
?>