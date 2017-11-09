<?php
include 'php/session.php';
include 'php/connect.php';
include 'php/extra.php';
	if(!$connection){
		die("connectionn err:".mysqli_connect_error());
	}
	$query=mysqli_query($connection,"SELECT * FROM domains WHERE validity BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE()");
	$domain1=mysqli_num_rows($query);
	
	$query1=mysqli_query($connection,"SELECT * FROM domains");
	$domain=mysqli_num_rows($query1);
	
	$query2=mysqli_query($connection,"SELECT * FROM clients");
	$clients=mysqli_num_rows($query2);
	
	$query4=mysqli_query($connection,"SELECT * FROM hosting WHERE validity BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE()");
	$hosting4=mysqli_num_rows($query4);
	$query3=mysqli_query($connection,"SELECT * FROM hosting");
	$hosting=mysqli_num_rows($query3);
	mysqli_close($connection);
	
	
	
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Dashboard</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Bootstrap-->
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!--//Bootstrap-->
		<link rel="stylesheet" type="text/css" href="style/sheet1.css">
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
						<a class="list-group-item  list-group-item-action active" href="dashboard.php" class=""><span class="glyphicon">&#xe011;</span> Dashboard</a>
						<a class="list-group-item list-group-item-action" href="masters.php"><span class="glyphicon glyphicon-queen"></span> Masters</a>
						<a class="list-group-item list-group-item-action " href="clients.php"> <span class="glyphicon glyphicon-user"></span> Clients</a>
						<a class="list-group-item list-group-item-action " href="domain.php"><span class="glyphicon glyphicon-globe"></span> Domains</a>
						<a class="list-group-item list-group-item-action" href="hosting.php"><span class="glyphicon glyphicon-cloud-upload"></span> Hosting</a>
						<a class="list-group-item list-group-item-action " href="reports.php"><span class="glyphicon glyphicon-list-alt"></span> Reports</a>
					</div>
				</div>
			<!--//SideNav-->
				
				
					<main class="col-md-9" role="main">
						<div class="row">
							<div class="col">
								<h1>Dashboard</h1>
							</div>
						</div>
						
						<section class="row">
								<a class="placeholder dashbox" style="text-align:center;" href="clients.php" >
									<div class="numicon btn-warning">
										<?php 
											if($clients>1000){
												$clients=$clients/1000;
											echo $clients."k";
											}
											else{
												echo $clients;
											}
										?>
									</div>
									<h4>Clients</h4>
									<span class="text-muted">Total number of clients</span>
								</a>
								<a class="placeholder dashbox" href="domain.php" >
									<div class="numicon btn-info">
										<?php 
											if($domain>1000){
												$domain=$domain/1000;
											echo $domain."k";
											}
											else{
												echo $domain;
											}
										?>
									</div>
									<h4>Domains</h4>
									<span class="text-muted">Total number of domains</span>
								</a>
								<a class="placeholder dashbox" href="hosting.php" >
									<div class="numicon btn-success">
										<?php 
											if($hosting>1000){
												$hosting=$hosting/1000;
											echo $hosting."k";
											}
											else{
												echo $hosting;
											}
										?>
									</div>
									<h4>Hostings</h4>
									<span class="text-muted">Total number of Hosting</span>
								</a>
								
						</section>
						<div class="row">
							<div class="col">
								<h1>Expiry</h1>
							</div>
						</div>
						<section class="row text-center placeholders">
							
								<a class="placeholder dashbox" href="reports.php?action=domain" style="text-decoration:none;">
									<div class="numicon btn-danger">
										<?php echo $domain1; ?>
									</div>
									<h4>Domains</h4>
									<span class="text-muted">Total number of domain expired with in a month</span>
								</a>
							
								<a class="placeholder dashbox" href="reports.php?action=hosting" style="text-decoration:none;">
									<div class="numicon btn-danger">
										<?php echo $hosting4; ?>
									</div>
									<h4>Hostings</h4>
									<span class="text-muted">Total number of hosting plans expired with in a month</span>
								</a>
							

						</section>
						<div class="row">
							
						</div>
					</main>
			</div>
		</div>
		<!--//Content-->
		<!--Footer-->
		<?php echo $footer?>
		<!--//Footer-->
	</body>
</html>
