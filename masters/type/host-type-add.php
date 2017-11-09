<?php
	include '../../php/session.php';
	include '../../php/connect.php';
	if($connection->connect_error){
		die("Connection failed:".$connection->connect_error);
	}
	
	
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Add host type</title>
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
				<div class="col-md-12 col-sm-12">
					<h2></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-12">
					<div class="list-group">
						<a class="list-group-item  list-group-item-action  " href="../../dashboard.php" class=""><span class="glyphicon glyphicon-th"></span> Dashboard</a>
						<a class="list-group-item  list-group-item-action active" href="../../masters.php" class=""><span class="glyphicon glyphicon-queen"></span> Masters</a>
						<a class="list-group-item  list-group-item-action  " href="../../clients.php" class=""><span class="glyphicon glyphicon-user"></span> Clients</a>
						<a class="list-group-item list-group-item-action " href="../../domain.php"><span class="glyphicon glyphicon-globe"></span> Domains</a>
						<a class="list-group-item list-group-item-action" href="../../hosting.php"><span class="glyphicon glyphicon-cloud-upload"></span> Hosting</a>
						<a class="list-group-item list-group-item-action " href="reports.php"><span class="glyphicon glyphicon-list-alt"></span> Reports</a>
					</div>
				</div>
				<div class="col-md-9 col-sm-12" >
					<div class="row" >
						<div class="col" >
							<h2 class="">Host type</h2>
						</div>
					</div>
					<div class="row">
						<div class="col underline">
							<ol class="breadcrumb">
							  <li class="breadcrumb-item"><a href="../../dashboard.php">Home</a></li>
							  <li class="breadcrumb-item"><a href="../../masters.php">Masters</a></li>
							  <li class="breadcrumb-item active">Host-type-add</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 text-left">
							<h2>Host type Information</h2>
						</div>
						<div class="col-md-3 text-right head">
							<a href="../../masters.php"><button type="submit" value="submit" class="btn btn-info">
							<img src="../../img/back-2.png" height="20px" width="20px">Back to Masters</button></a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<form class="" action="insert-host-type.php" method="post">
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="validationDefault01">Host type<span class="span-danger">*</span></label>
										<input type="text" name="host-type" class="form-control" id="validationDefault01" placeholder="Please provider host type" required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="validationDefault03">Description</label>
										<textarea type="text" name="description" class="form-control" id="validationDefault03" placeholder="Write any description" rows="4" ></textarea>
										<div class="invalid-feedback">
											Please provide a valid city.
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6  mb-1">
										<input class="btn btn-primary" value="Add" type="submit">
										<input class="btn btn-danger" value="Reset" type="reset">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div><h1></h1><br>
			</div>
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
