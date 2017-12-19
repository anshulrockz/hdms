<?php
include '../../php/session.php';
include '../../php/connect.php';
include '../../php/extra.php';
	$id=$_GET['id'];
	if(!$connection){
		die("connectionn err:".mysqli_connect_error());
	}
	//$query=mysqli_query($connection,"SELECT * FROM clients LEFT JOIN domains ON domains.client_id=clients.id JOIN hosting ON hosting.client_id=clients.id WHERE id='$id'");
	$query=mysqli_query($connection,"SELECT * FROM hosting WHERE id_hosting='$id'");
	$count=mysqli_num_rows($query);
	$result=mysqli_fetch_array($query);
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Details-Domain</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Bootstrap-->
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!--//Bootstrap-->
		<link rel="stylesheet" type="text/css" href="../../style/sheet1.css">
	</head>
	<body>
		<!--Header-->
		<div class="container-fluid">
			<div class="row header">
				<div class="col-md-3 col-sm-6 col-xs-6">
					<img src="../../img/TechStreet.png" width="100%" >
				</div>
				<div class="col-md-7 host">
					<h1>Hosting and domain management system</h1>
				</div>
				<div class="col-md-2 col-sm-6 col-xs-6 ">
					<div class="dropdown">
						<button type="submit" value="submit" class="dropbtn">
						<img id="admin" src="../../img/profile-1.png" height="30px" width="30px"></button><h4 style="display:inline"> Admin</h4>
						<div class="dropdown-content">
							<br>
							<a href="../../pass-change.php">Change Password</a>
							<a class="underline" href="../../php/logout.php">Log Out </a>
						</div>
					</div>
                </div>
			</div>
		</div>
		<!--//Header-->
		<!--Content-->
		<div class="container-fluid">
			<div class="row">
			<!--SideNav-->
				<div class="col-md-3 col-sm-12"><br>
					<div class="list-group">
						<a class="list-group-item  list-group-item-action " href="../../dashboard.php" class=""><span class="glyphicon glyphicon-th"></span> Dashboard</a>
						<a class="list-group-item list-group-item-action" href="../../masters.php"><span class="glyphicon glyphicon-queen"></span> Masters</a>
						<a class="list-group-item list-group-item-action " href="../../clients.php"> <span class="glyphicon glyphicon-user"></span> Clients</a>
						<a class="list-group-item list-group-item-action " href="../../domain.php"><span class="glyphicon glyphicon-globe"></span> Domains</a>
						<a class="list-group-item list-group-item-action active" href="../../hosting.php"><span class="glyphicon glyphicon-cloud-upload"></span> Hosting</a>
						<a class="list-group-item list-group-item-action " href="../../reports.php"><span class="glyphicon glyphicon-list-alt"></span> Reports</a>
					</div>
				</div>
			<!--//SideNav-->
				<div class="col-md-9 col-sm-12" >
					<div class="row" >
						<div class="col" >
							<h2 class="">Hosting Details</h2>
						</div>
					</div>
					<div class="row">
						<div class="col underline">
							<ol class="breadcrumb">
							  <li class="breadcrumb-item"><a href="../../dashboard.php">Home</a></li>
							  <li class="breadcrumb-item"><a href="../../hosting.php">hosting</a></li>
							  <li class="breadcrumb-item active">Details-hosting</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 col-auto mr-auto text-left">
							<h2>Details</h2>
						</div>
						<div class="col-md-3 text-right head">
							<a href="../../hosting.php"><button type="submit" value="submit" class="btn btn-info">
							<img src="../../img/back-2.png" height="20px" width="20px">Back to hosting list</button></a>
						</div>
					</div>
					<br>
					<div class="row justify-content-center" >
					
						<table class="col-md-12 table table-responsive" style="width:80%">
						<tbody>
							<tr>
								<th>Domain:</th>
								<td><?php echo $result['domain_id']; ?></td>
							</tr>
							<tr>
								<th>Hosting:</th>
								<td><?php echo $result['hosting_name']; ?></td>
							</tr>
							<tr>
								<th>Client:</th>
								<td>
									<?php 
									$temp2=$result['client_id']; 
									$query2=mysqli_query($connection,"SELECT * FROM clients WHERE id='$temp2'");
									$result2=mysqli_fetch_array($query2);
									echo $result2["client_name"];
									?>
								</td>
							</tr>
							<tr>
								<th>Server category:</th>
								<td><?php echo $result['server_category']; ?></td>
							</tr>
							<tr>
								<th>Server type:</th>
								<td>
									<?php 
									$temp2=$result['server_type']; 
									$query2=mysqli_query($connection,"SELECT * FROM host_type WHERE id_type='$temp2'");
									$result2=mysqli_fetch_array($query2);
									echo $result2["name"];
									?>
								</td>
							</tr>
							<tr>
								<th>Server space:</th>
								<td><?php echo $result['server_space']; ?></td>
							</tr>
							<tr>
								<th>Registration date:</th>
								<td><?php $date=date_create($result["reg_date_hosting"]); echo $date2=date_format($date,"d-F-Y"); ?></td>
							</tr>
							<tr>
								<th>Valid till:</th>
								<td><?php $date=date_create($result["validity"]); echo $date2=date_format($date,"d-F-Y"); ?></td>
							</tr>
							<tr>
								<th>Username:</th>
								<td>
									<?php 
									echo $result['username_hosting']; 
									?>
								</td>
							</tr>
							<tr>
								<th>Password:</th>
								<td>
									<?php 
									echo $result['password_hosting']; 
									?>
								</td>
							</tr>
							<tr>
								<th>Email:</th>
								<td>
									<?php 
									echo $result['email_hosting']; 
									?>
								</td>
							</tr>
							<tr>
								<th>Email Password:</th>
								<td>
									<?php 
									echo $result['password_email_hosting'];
									?>
								</td>
							</tr>
							<tr>
								<th>Cpanel Username:</th>
								<td>
									<?php 
									echo $result['cpanel_hosting'];
									?>
								</td>
							</tr>
							<tr>
								<th>Cpanel Password:</th>
								<td>
									<?php 
									echo $result['cpanel_password_hosting'];
									?>
								</td>
							</tr>
							<tr>
								<th>Info:</th>
								<td><?php echo $result['info']; ?></td>
							</tr>
						</tbody>
						</table>
					
					</div>
				</div><h1></h1><br>
			</div>
		</div>
		<!--//Content-->
		
		<!--Footer-->
		<?php echo $footer?>
		<!--//Footer-->
		
	</body>
</html>
