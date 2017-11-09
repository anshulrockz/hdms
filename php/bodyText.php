<?php

include 'connect.php';
$queryDomain=mysqli_query($connection,"SELECT domains.*, clients.client_name FROM domains LEFT JOIN clients ON domains.client_id=clients.id WHERE validity BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE()");
$countDomain=mysqli_num_rows($queryDomain);

$i=1;
$bodyText='Dear Admin,<br>'
$bodyText.=' <head>
				<style>
					table {
					    width:100%;
					}
					table, th, td {
					    border: 1px solid black;
					    border-collapse: collapse;
					}
					th, td {
					    padding: 5px;
					    text-align: left;
					}
					table tr:nth-child(even) {
					    background-color: #eee;
					}
					table tr:nth-child(odd) {
					   background-color:#fff;
					}
					table th {
					    background-color: black;
					    color: white;
					}
				</style>
			</head>';
			
$bodyText.=	'<table width="100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Domain </th>
						<th>Client Associated</th>
						<th>Provider </th>
						<th>Registration </th>
						<th>Valid Till</th>
					</tr>
				</thead>
				<tbody>';
								
if($countDomain>0){
	$i=1;
	while($row=mysqli_fetch_array($queryDomain)){
		$date=date_create($row["reg_date_domain"]);
		$date=date_format($date,"d-m-Y");
		$date1=date_create($row["validity"]);
		$date1=date_format($date1,"d-m-Y");
		$temp=$row["provider_id"];
		$query_pro=mysqli_query($connection,"SELECT * FROM providers WHERE id='$temp'");
		$row_pro=mysqli_fetch_array($query_pro);
	
		$bodyText.='
						<tr>
							<td>'.$i.'</td>
							<td>'.$row["domain_name"].'</td>
							<td>'.$row["client_name"].'</td>
							<td>'.$row_pro["name"].'</td>
							<td>'.$date.'</td>
							<td>'.$date1.'</td>
							
						</tr>';
		$i++;				
		}
	}
	else{
		$bodyText.='
		<tbody>
			<tr>
				<td></td>
				<td colspan=4>No records found!</td>
			</tr>		
			
		</tbody>';
	}

$bodyText.='</tbody></table>';
echo $bodyText;


?>