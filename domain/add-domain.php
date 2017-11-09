<?php
include '../php/session.php';
include '../php/connect.php';
include '../php/extra.php';
	if(!$connection){
		die("connectionn err:".mysqli_connect_error());
	}
	
	$query1=mysqli_query($connection,"SELECT * FROM hosting");
	$count1=mysqli_num_rows($query1);
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Domain</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Bootstrap-->
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!--//Bootstrap-->
		<link rel="stylesheet" type="text/css" href="../style/sheet1.css">
	</head>
	<body>
		<!--Header-->
		<div class="container-fluid">
			<div class="row header">
				<div class="col-md-3 col-sm-6 col-xs-6">
					<img src="../img/TechStreet.png" width="100%" >
				</div>
				<div class="col-md-7 host">
					<h1>Hosting and domain management system</h1>
				</div>
				<div class="col-md-2 col-sm-6 col-xs-6 ">
					<div class="dropdown">
						<button type="submit" value="submit" class="dropbtn">
						<img id="admin" src="../img/profile-1.png" height="30px" width="30px"></button><h4 style="display:inline"> Admin</h4>
						<div class="dropdown-content">
							<br>
							<a href="../pass-change.php">Change Password</a>
							<a class="underline" href="../php/logout.php">Log Out </a>
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
						<a class="list-group-item  list-group-item-action " href="../dashboard.php" class=""><span class="glyphicon glyphicon-th"></span> Dashboard</a>
						<a class="list-group-item list-group-item-action" href="../masters.php"><span class="glyphicon glyphicon-queen"></span> Masters</a>
						<a class="list-group-item list-group-item-action " href="../clients.php"> <span class="glyphicon glyphicon-user"></span> Clients</a>
						<a class="list-group-item list-group-item-action active" href="../domain.php"><span class="glyphicon glyphicon-globe"></span> Domains</a>
						<a class="list-group-item list-group-item-action" href="../hosting.php"><span class="glyphicon glyphicon-cloud-upload"></span> Hosting</a>
						<a class="list-group-item list-group-item-action " href="../reports.php"><span class="glyphicon glyphicon-list-alt"></span> Reports</a>
					</div>
				</div>
			<!--//SideNav-->
				<div class="col-md-9" >
					<div class="row" >
						<div class="col" >
							<h2 class="">Add Domain</h2>
						</div>
					</div>
					<div class="row">
						<div class="col underline">
							<ol class="breadcrumb ">
							  <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
							  <li class="breadcrumb-item"><a href="../domain.php">Domains</a></li>
							  <li class="breadcrumb-item active">Add-domain</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<?php
							if(isset($_GET['action'])){
								if($_GET['action']=="failed"){
									echo '<div class="alert alert-danger alert-dismissable">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
										<strong>Failed!</strong> Domain already present. Please provide unique domain.
									</div>';
								}
								if($_GET['action']=="success"){
									echo '<div class="alert alert-success alert-dismissable">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
										<strong>Success!</strong> Domain add successfully.
									</div>';
								}
							}
							?>
						</div>
					</div>
					<div class="row">
						<div class="col" >
							<div class="row ">
								<div class="col-md-9 text-left">
									<h3 class="">Domain Information</h3>
								</div>
								<div class="col-md-3 text-right head">
									<a href="../domain.php"><button type="submit" value="submit" class="btn btn-info">
									<img src="../img/back-2.png" height="20px" width="20px">Back to domain list</button></a>
								</div>
							</div>
							<br>
							<form class="" action="insert-domain.php" method="post">
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="validationDefault01">Domain Name<span class="span-danger">*</span></label>
										<input type="text" name="domain" class="form-control" id="validationDefault01" placeholder="Please provide domain name" required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="validationDefault01">Domain Provider<span class="span-danger">*</span></label>
										<select class="form-control" id="validationDefault1" name="provider" style="height:34px;" required>
											<option value="">Select provider</option>
											<?php 	
											$query2=mysqli_query($connection,"SELECT * FROM providers");
											$count2=mysqli_num_rows($query2);
											if($count2>0){
												while($result=mysqli_fetch_array($query2)){ 
											?>
											<option value="<?php echo $result['id'];?>"><?php echo $result['name']; ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
									<div class="col-md-3 mb-3">
										<label for="validationDefault01">Registration Date<span class="span-danger">*</span></label>
										<input type="date" class="form-control" id="validationDefault01" placeholder="Date of registration" name="date" required>
									</div>
									<div class="col-md-3 mb-3">
										<label for="validationDefault01">Expiry<span class="span-danger">*</span></label>
										<input type="date" name="validity" class="form-control" id="validationDefault01" required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6 mb-3 form-group">
										<label for="validationDefault1">Clients<span class="span-danger">*</span></label>
										<select class="form-control" id="validationDefault1" name="client_id"  style="height:34px;" required>
											<option value="">Select Client</option>
											<?php
											$query=mysqli_query($connection,"SELECT * FROM clients");
											$count=mysqli_num_rows($query);
											if($count>0){
												while($row=mysqli_fetch_array($query)){ 
											?>
											<option value="<?php echo $row['id'];?>">
												<?php echo $row['client_name']."-(".$row['email'].")"; ?>
											</option>
											<?php		
												}
											}
											
											?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="validationDefault01">Username<span class="span-danger">*</span></label>
										<input type="text" name="text5" class="form-control" id="validationDefault01" placeholder="Please provide domain name" required>
									</div>
									<div class="col-md-6">
										<label for="validationDefault01">Password<span class="span-danger">*</span></label>
										<input type="password" name="text6" class="form-control" id="validationDefault01" placeholder="Please provide domain name" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="validationDefault01">Email ID<span class="span-danger">*</span></label>
										<input type="text" name="text7" class="form-control" id="validationDefault01" placeholder="Please provide domain name" required>
									</div>
									<div class="col-md-6">
										<label for="validationDefault01">Password of Email ID<span class="span-danger">*</span></label>
										<input type="password" name="text8" class="form-control" id="validationDefault01" placeholder="Please provide domain name" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="validationDefault01">Additional Information</label>
										<textarea class="form-control" name="info" rows="3" placeholder="Any kind of aditional information" ></textarea>
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
				</div>
				<h1></h1><br>
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
	<!--JS-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--//JS-->
</html>
