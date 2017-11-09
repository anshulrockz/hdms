<?php
//include 'php/session.php';
include 'php/connect.php';
	if(!$connection){
		die("connectionn err:".mysqli_connect_error());
	}
	
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Admin</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Bootstrap-->
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<!--//Bootstrap-->
		<link rel="stylesheet" type="text/css" href="style/sheet1.css">
	</head>
	<body>
		<!--Header-->
		<div class="container-fluid">
			<div class="row header">
				<div class="col-md-3 col-xs-3">
					<label><h2>Menu</h2></label>
				</div>
				<div class="col-md-7  host">
					<h1>Hosting and domain management system</h1>
				</div>
				<div class="col-md-1 col-sm-6 col-xs-3 head">
                    <a href="php/logout.php"><button type="submit" value="submit" class="btn btn-danger">Log Out <img src="img/logout-2.png" height="20px" width="20px"></button></a>
                </div>
			</div>
		</div>
		<!--//Header-->
		<!--Content-->
		<div class="container-fluid">
		<!--SideNav-->
				<div class="col-md-3 col-sm-12"><br>
					<div class="list-group">
						<a class="list-group-item  list-group-item-action active " href="dashboard.php" class=""><span class="glyphicon glyphicon-th"></span> Dashboard</a>
						<a class="list-group-item list-group-item-action" href="masters.php"><span class="glyphicon glyphicon-user"></span> Masters</a>
						<a class="list-group-item list-group-item-action " href="clients.php"> <span class="glyphicon glyphicon-user"></span> Clients</a>
						<a class="list-group-item list-group-item-action " href="domain.php"><span class="glyphicon glyphicon-globe"></span> Domains</a>
						<a class="list-group-item list-group-item-action" href="hosting.php"><span class="glyphicon glyphicon-cloud-upload"></span> Hosting</a>
						<a class="list-group-item list-group-item-action " href="reports.php"><span class="glyphicon glyphicon-cloud-upload"></span> Reports</a>
					</div>
				</div>
				<!--//SideNav-->
				<div class="col-md-9">
					<main class="col-sm-12 dashbox2" role="main">
						<div class="row " >
							<div class="col-md-10 col-xs-6 col-sm-10" >
								<h2 class="">Hostings</h2>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-6 head">
									<a href="hosting/add-hosting.php"><button class="btn btn-primary" type="submit"><img src="img/add-button.png" height="10px" width="10px">Add hosting</button></a>
							</div>
						</div>
						
						<div class="row" >
							<div class="col underline" >
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Hosting</li>
								</ol>
							</div>
						</div>
						
						<section class="row text-center placeholders">
						<form class="form" action="php/password.php" method="post">
							<div class="col">
								<label>User name</label>
								<input type="text" name="user">
							</div>
							<div class="col">
								<label>Current password</label>
								<input class="" type="password" name="password">
							</div>
							<div class="col">
								<label>New password</label>
								<input class="" type="password" name="npassword">
							<div>
							<div class="col">
								<label>Confirm password</label>
								<input class="" type="password" name="cpassword">
							<div>
							<div class="col">
								<input type="submit" value="Submit">
								<input class="" value="Cancel" type="button">
							<div>
						</form>
						</section>
						</div>
					</main>
				</div>
			
		<!--//Content-->
		<!--Footer-->
		<div class="container-fluid">
			<div class="row header">
				<div class="col-md-4 ">
					
				</div>
				<div class="col-md-4">
					<span>All rights reserved. Techstreet solutions pvt. ltd</span>
				</div>
				<div class="col-md-4">
					
				</div>
			</div>
		</div>
		<!--//Footer-->
	</body>
</html>
