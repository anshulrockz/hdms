<?php
	include 'php/session.php';
	include 'php/connect.php';
	include 'php/extra.php';
	if($connection->connect_error){
		die("Connection failed:".$connection->connect_error);
	}
	
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Password</title>
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
				<div class="col-md-9 col-sm-12" >
					<div class="row" >
						<div class="col" >
							<h2 class="">Profile</h2>
						</div>
					</div>
					<div class="row">
						<div class="col underline">
							<ol class="breadcrumb">
							  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
							  <li class="breadcrumb-item active">Change-password</li>
							</ol>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-9 text-left">
							<h2>Change Password</h2>
						</div>
						<div class="col-md-3 text-right head">
							<a href="dashboard.php"><button type="submit" value="submit" class="btn btn-info">
							<img src="img/back-2.png" height="20px" width="20px">Back to home</button></a>
						</div>
					</div>
					
					<div class="row justify-content-center">
						<div class="col-md-12 col-sm-12" >
							<?php
							if(isset($_GET['action'])){
								if($_GET['action']=="warnng"){
									echo '<div class="alert alert-warning alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Warnng!</strong> Please login.
									</div>';
									}
								if($_GET['action']=="failed"){
									echo '<div class="alert alert-danger alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Invalid!</strong> New password.
									</div>';
									}
								if($_GET['action']=="failed2"){
									echo '<div class="alert alert-danger alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Invalid!</strong> Old  password.
									</div>';
									}
								if($_GET['action']=="error"){
									echo '<div class="alert alert-danger alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Invalid!</strong>  Password pattern.
									</div>';
									}
								if($_GET['action']=="success"){
									echo '<div class="alert alert-success alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Success!</strong> Password changed.
									</div>';
									}
							}
							?>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<form class="" action="php/update-pass.php" method="post">
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="validationDefault01">User Name<span class="span-danger">*</span></label>
										<input disabled type="text" value="admin" name="user" class="form-control" id="validationDefault01" placeholder="provider name" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="validationDefault01">Old Password<span class="span-danger">*</span></label>
										<input type="password" name="password"  class="form-control" id="validationDefault01" placeholder="Enter old password" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="validationDefault01">New Password<span class="span-danger">*</span></label>
										<input type="password" name="npassword" class="form-control" id="validationDefault01" placeholder="Enter new password"> <!--pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required-->
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="validationDefault01">Confirm Password<span class="span-danger">*</span></label>
										<input type="password" name="cpassword" class="form-control" id="validationDefault01" placeholder="Enter new password again"> <!--pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required-->
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-6 mb-3 ">
										<div class="outlinebox jumbotron" >
											<label class="" for="validationDefault01">
												<h3>To make your password stronger</h3>
												<ul>
													<li>Make it atleast 6 characters</li>
													<li>Add atleast a upper case letter</li>
													<li>Add atleast a lower case letter</li>
													<li>Add atleast a number</li>
													<li>Add atleast one !@#$%</li>
												</ul>
											</label>
										</div>
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-3  mb-1">
										<input class="btn btn-warning" value="Update" type="submit">
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
		<?php echo $footer?>
		<!--//Footer-->
		
	</body>
	<script>
		function validateForm()
		{
		  var valfirst= document.getElementById("validationName").value;
		  var valsecond=document.getElementById("validationEmail").value;
		  var valthird=document.getElementById("validationMobile").value;
		    
		  if(valfirst == null || valfirst == "")
		  {
		    document.getElementById("name_err").innerHTML="* Name is required";
		    return false;
		  }
		  if (valsecond == null || valsecond == "")
		  {
		    document.getElementById("email_err").innerHTML="* Email is required";
		    return false;
		  } 
		  if (valthird == null || valthird == "" || valthird < "7000000000" || valthird > "99999999999")
		  {
		    document.getElementById("mobile_err").innerHTML="* Mobile number is required";
		    return false;
		  } 
		  else
		  {
		  	return true;
		  }
		}
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
