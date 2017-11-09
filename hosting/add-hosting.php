<?php
include '../php/session.php';
include '../php/connect.php';
include '../php/extra.php';

	if(!$connection){
		die("connectionn err:".mysqli_connect_error());
	}
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Hosting</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Bootstrap-->
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!--//Bootstrap-->
		<link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="../style/sheet1.css">
		<script type="text/javascript"
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript"
		src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
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
							<a href="../../pass-change.php">Change Password</a>
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
						<a class="list-group-item list-group-item-action " href="../domain.php"><span class="glyphicon glyphicon-globe"></span> Domains</a>
						<a class="list-group-item list-group-item-action active" href="../hosting.php"><span class="glyphicon glyphicon-cloud-upload"></span> Hosting</a>
						<a class="list-group-item list-group-item-action " href="../reports.php"><span class="glyphicon glyphicon-list-alt"></span> Reports</a>
					</div>
				</div>
			<!--//SideNav-->
				<div class="col-md-9 col-sm-12" >
					<div class="row" >
						<div class="col" >
							<h2 class="">Add Hosting</h2>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col underline">
							<ol class="breadcrumb">
							  <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
							  <li class="breadcrumb-item"><a href="../hosting.php">Hosting</a></li>
							  <li class="breadcrumb-item active">Add-hoasting</li>
							</ol>
						</div>
					</div>
					<div class="row justify-content-between">
						<div class="col-md-9 ">
							<h2>Hosting information</h2>
						</div>
						<div class="col-md-3 text-right head">
							<a href="../hosting.php"><button type="submit" value="submit" class="btn btn-info">
							<img src="../img/back-2.png" height="20px" width="20px">Back to hosting list</button></a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<?php
							if(isset($_GET['action'])){
								if($_GET['action']=="failed"){
									echo '<div class="alert alert-danger alert-dismissable">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
										<strong>Failed!</strong> Hosting with this name and client already present. Please provide another name or client.
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
						<div class="col">
							<form action="insert-hosting.php" method="post">
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="validationDefault01">Plan Name<span class="span-danger">*</span></label>
										<input type="text" name="hosting" class="form-control" id="validationDefault01" placeholder="Plan name for hosting" required oninvalid="this.setCustomValidity('Please Enter valid plan name')">
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 mb-3">
										<label >Server Type<span class="span-danger">*</span></label>
										<select class="form-control" name="server_type" style="height:32px;">
										<?php
											$query3=mysqli_query($connection,"SELECT * FROM host_type");
											$count3=mysqli_num_rows($query3);
											if($count3>0){
												while($result3=mysqli_fetch_array($query3)){
													echo '<option value="'.$result3['id_type'].'">'. ucwords($result3['name']).'</option>';
												}
											}
											else{
												echo "no data!";
											}
										?>
										</select>
									</div>
									<div class="col-md-3 mb-3">
										<label for="validationDefault01">Server Category<span class="span-danger">*</span></label>
										<select class="form-control" name="server_category" style="height:32px;" >
											<option value="Windows">Windows</option>
											<option value="Linux">Linux</option>
											<option value="Cloud">Cloud</option>
										</select>
									</div>
									
									<div class="col-md-3 mb-3">							
										<label >Registration Date<span class="span-danger">*</span></label>
										<input type="date" class="form-control" id="validationDefault04" name="date" required>
									</div>
									<div class="col-md-3 mb-3">
										<label for="validationDefault05">Expiry<span class="span-danger">*</span></label>
										<input type="date" class="form-control" id="validationDefault05" name="period" placeholder="mm/yy" required>
									</div>
									<div class="col-md-6 mb-3">
										<label for="validationDefault01">Provider</label>
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
										<label >Server Space</label>
										<input type="text" class="form-control" id="validationDefault04" name="server_space" placeholder="GB space on server">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="validationDefault01">Client<span class="span-danger">*</span></label>
										<select class="form-control" id="validationDefault1" name="client_id"  style="height:34px;" required>
										 <option value="">Select client</option>
										<?php
										$query1=mysqli_query($connection,"SELECT * FROM clients");
										$count1=mysqli_num_rows($query1);
										if($count1>0){
											while($row=mysqli_fetch_array($query1)){ 
										?>
											<option value="<?php echo $row['id'];?>">
												<?php echo $row['client_name'].'-('.$row['email'].')'; ?>
											</option>
										<?php	
											}
										}
										else{
											echo "no client found!";
										}
										?>
										</select>
									</div>
									<div class="col-md-6 mb-3">
										<label for="validationDefault01">Domain<span class="span-danger">*</span></label>
										
										<input type="text" name="domain" class="form-control" id="domain" placeholder="Please enter domain name" required>
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="validationDefault01">Username<span class="span-danger">*</span></label>
										<input type="text5" name="text5" class="form-control" id="validationDefault01" placeholder="Please provide username of hosting plan" autocomplete="off" required>
									</div>
									<div class="col-md-6">
										<label for="validationDefault01">Password<span class="span-danger">*</span></label>
										<input type="password" name="text6" class="form-control" id="validationDefault01" autocomplete="off" placeholder="Please provide password" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="validationDefault01">Email ID<span class="span-danger">*</span></label>
										<input type="email" name="text7" class="form-control" id="validationDefault01" placeholder="Please provide email of client" required>
									</div>
									<div class="col-md-6">
										<label for="validationDefault01">Password of Email ID<span class="span-danger">*</span></label>
										<input type="password" name="text8" class="form-control" id="validationDefault01" placeholder="Please provide email password" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="validationDefault01">Cpanel username<span class="span-danger">*</span></label>
										<input type="text" name="text9" class="form-control" id="validationDefault01" placeholder="Please provide cpanel username" required>
									</div>
									<div class="col-md-6">
										<label for="validationDefault01">Cpannel password<span class="span-danger">*</span></label>
										<input type="password" name="text10" class="form-control" id="validationDefault01" placeholder="Please provide cpanel password" required>
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
			</div>
		</div>
		<!--//Content-->
		
		<!--Footer-->
		<?php echo $footer?>
		<!--//Footer-->
		
	</body>
	<!--JS-->
		
 
        <script type="text/javascript">
                $(document).ready(function(){
                    $("#domain").autocomplete({
                        source:'../php/searchlike.php',
                        minLength:1
                    });
                });
        </script>
	
	<!--//JS-->
</html>
