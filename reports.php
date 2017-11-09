<?php
include 'php/session.php';
include 'php/connect.php';
include 'php/extra.php';
if(!$connection){
	die("connectionn err:".mysqli_connect_error());
}
	
$queryDomain=mysqli_query($connection,"SELECT domains.*, clients.client_name FROM domains LEFT JOIN clients ON domains.client_id=clients.id WHERE validity BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE()");
$countDomain=mysqli_num_rows($queryDomain);


$queryHosting=mysqli_query($connection,"SELECT hosting.*, clients.client_name, domains.domain_name FROM hosting 
LEFT JOIN clients ON hosting.client_id=clients.id
LEFT JOIN domains	ON hosting.domain_id = domains.id_domain 
WHERE hosting.validity BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE()");

$countHosting=mysqli_num_rows($queryHosting);
	
	
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Reports</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--StyleSheet-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style/sheet1.css">
		<link rel="stylesheet" type="text/css" href="style/sheet2.css">
		<!--//StyleSheet-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
	</head>
	<body>
		
		<!--Header-->
		<?php echo $header; ?>
		<!--//Header-->
		
		<!--Content-->
		<div class="container-fluid">
			<div class="row">
				<!--SideNav-->
				<div class="col-md-3 col-sm-12"><br>
					<div class="list-group">
						<a class="list-group-item  list-group-item-action " href="dashboard.php" class=""><span class="glyphicon glyphicon-th"></span> Dashboard</a>
						<a class="list-group-item list-group-item-action" href="masters.php"><span class="glyphicon glyphicon-queen"></span> Masters</a>
						<a class="list-group-item list-group-item-action " href="clients.php"> <span class="glyphicon glyphicon-user"></span> Clients</a>
						<a class="list-group-item list-group-item-action " href="domain.php"><span class="glyphicon glyphicon-globe"></span> Domains</a>
						<a class="list-group-item list-group-item-action" href="hosting.php"><span class="glyphicon glyphicon-cloud-upload"></span> Hosting</a>
						<a class="list-group-item list-group-item-action active" href="reports.php"><span class="glyphicon glyphicon-list-alt"></span> Reports</a>
					</div>
				</div>
			<!--//SideNav-->
					<main class="col-md-9" role="main">
						<div class="row " >
							<div class="col-md-10" >
								<h2>Expiring</h2>
							</div>
							<div class="col-md-1 head" style="padding-top:20px;display:block;">
								<button class="btn btn-primary" onclick="PrintDiv()">Print</button>
							</div>
						</div>
						
						<!--breadcrumb-->
						<div class="row" >
							<div class="col underline" >
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
									<li class="breadcrumb-item active">Reports</li>
								</ol>
							</div>
						</div>
						<!--//breadcrumb-->
						
						<div class="row ">
						<div class="col-md-12">
							<?php
							if(isset($_GET['action'])){
								if($_GET['action']=="status"){
									echo '<div class="alert alert-success alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Success!</strong> User state changed.
									</div>';
									}
								if($_GET['action']=="failed"){
									echo '<div class="alert alert-danger alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Failed!</strong> Operation failed.
									</div>';
									}
								if($_GET['action']=="Error"){
									echo '<div class="alert alert-danger alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Error!</strong> Domain or Hosting are associated.
									</div>';
									}
								if($_GET['action']=="Success"){
									echo '<div class="alert alert-success alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Success!</strong> operation success.
									</div>';
									}
							}
							?>
						</div>
					</div>
					<div class="container-fluid" >
						
						<div class="tab row">
							<button class=" col-md-2 tablinks active" onclick="openCity(event, 'domain')" id="defaultOpen">Domain</button>
							<button class=" col-md-2 tablinks" onclick="openCity(event, 'hosting')">Hosting</button>
							
						</div>

						<div id="domain" class="row tabcontent " style="display:block;">
							<div class="row" >
								<form class="form-inline">
									<div class="col-md-10">
									<input type="date" name="start_date" id="start_date" class="form-control" placeholder="From">
									
									<input type="date" name="end_date" id="end_date" class="form-control" placeholder="From">
									
									<input type="button" onclick="searchDomain()" id="search" value="Search" class="btn btn-info" />
									</div>
								</form>
							</div><br>
							<table class="table table-responsive printDiv" id="domainPrint">
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
								<tbody id="resDomain">
								<?php 
									if($countDomain>0){
										$i=1;
										while($row=mysqli_fetch_array($queryDomain)){
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $row["domain_name"];?></td>
									<td><?php echo $row["client_name"];?></td>
									<td>
									<?php 
										$temp=$row["provider_id"];
										$query_pro=mysqli_query($connection,"SELECT * FROM providers WHERE id='$temp'");
										$row_pro=mysqli_fetch_array($query_pro);
										echo $row_pro["name"];
									?>
									</td>
									<td><?php $date=date_create($row["reg_date_domain"]); echo $date2=date_format($date,"d-F-Y");?></td>
									<td><?php $date=date_create($row["validity"]); echo $date2=date_format($date,"d-F-Y");?></td>
								</tr>
								<?php		$i++;
										}
									}
									else{
								?>
								<tr>
									<td></td>
									<td colspan="5"><?php echo "No records found"; ?></td>
								</tr>
								<?php		}		?>
								</tbody>
							</table>
						</div>

						<div id="hosting" class="row tabcontent ">
							<div class="row" >
								<form class="form-inline">
									<div class="col-md-10">
										<input type="date" name="start_date2" id="start_date2" class="form-control" />
									
										<input type="date" name="end_date2" id="end_date2" class="form-control" />
									
									    <input type="button" onclick="searchHosting()" id="search" value="Search" class="btn btn-info" />
									</div>
								</form>
							</div>
							<br>
						  	<table class="table table-responsive" id="hostingPrint">
								<thead >
									<tr>
										<th>#</th>
										<th>Domain Name </th>
										<th>Hosting Plan </th>
										<th>Client Name </th>
										<th>Server Type </th>
										<th>Registration Date </th>
										<th>Valid Till </th>
									</tr>
								</thead>
								<tbody id="resHosting">
								<?php 
									if($countHosting>0){
										$i=1;
										while($row=mysqli_fetch_array($queryHosting)){
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $row["domain_name"];?></td>
									<td><?php echo $row["hosting_name"];?></td>
									<td><?php echo $row["client_name"];?></td>
									<td><?php
											$temp1=$row["server_type"];
											$query1=mysqli_query($connection,"SELECT * FROM host_type WHERE id_type='$temp1'");
											$result1=mysqli_fetch_assoc($query1);
											echo $result1["name"]; 
										?>
									</td>	
									<td><?php $date=date_create($row["reg_date_hosting"]); echo $date2=date_format($date,"d-F-Y"); ?></td>
									<td><?php $date=date_create($row["validity"]); echo $date2=date_format($date,"d-F-Y");?></td>
								</tr>
								<?php			
										}
									$i++;
									}
									else{
								?>
								<tr>
									<td></td>
									<td colspan="5"><?php echo "No records found"; ?></td>
								</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
							

						
						</div>
					</main>
				</div>
			</div>
		<!--//Content-->
		
		<!--Footer-->
		<?php echo $footer?>
		<!--//Footer-->
		
	</body>
	<!--JS-->
	 <script>
		function openCity(evt, cityName) {
		    var i, tabcontent, tablinks, table;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    table= document.getElementsByClassName("table");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		        table[i].className = table[i].className.replace(" printDiv", "");
		    }
		    document.getElementById(cityName).style.display = "block";
		    document.getElementById(cityName+"Print").className += " printDiv";
		    evt.currentTarget.className += " active";
		}
		
		function PrintDiv() {
		  	var w = window.open();
		  	var data = $(".printDiv").html();
		    $(w.document.body).html("<table style='text-align:left;width:100%'>"+data+"</table>");
		    w.print();
		}
		
	</script>
	<script>
	
		function searchDomain(){
			
			var start_date = document.getElementById("start_date").value;
			var end_date = document.getElementById("end_date").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("resDomain").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","php/search.php?table=domains&from="+start_date+"&to="+end_date,false);
			xmlhttp.send(null);
	    }
	    function searchHosting(){
			
			var start_date = document.getElementById("start_date2").value;
			var end_date = document.getElementById("end_date2").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("resHosting").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","php/search.php?table=hosting&from="+start_date+"&to="+end_date,false);
			xmlhttp.send(null);
	    }
	
		

		// Get the element with id="defaultOpen" and click on it
		//document.getElementById("defaultOpen").click();

	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<!--//JS-->
	
</html>
