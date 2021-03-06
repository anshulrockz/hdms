<?php
	include '../php/session.php';
	include '../php/connect.php';
	include '../php/extra.php';
	if($connection->connect_error){
		die("Connection failed:".$connection->connect_error);
	}
	
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Clients</title>
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
						<a class="list-group-item list-group-item-action active" href="../clients.php"> <span class="glyphicon glyphicon-user"></span> Clients</a>
						<a class="list-group-item list-group-item-action " href="../domain.php"><span class="glyphicon glyphicon-globe"></span> Domains</a>
						<a class="list-group-item list-group-item-action" href="../hosting.php"><span class="glyphicon glyphicon-cloud-upload"></span> Hosting</a>
						<a class="list-group-item list-group-item-action " href="../reports.php"><span class="glyphicon glyphicon-list-alt"></span> Reports</a>
					</div>
				</div>
			<!--//SideNav-->
				<div class="col-md-9 col-sm-12" >
					<div class="row" >
						<div class="col" >
							<h2 class="">Add Client</h2>
						</div>
					</div>
					<div class="row">
						<div class="col underline">
							<ol class="breadcrumb">
							  <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
							  <li class="breadcrumb-item"><a href="../clients.php">Clients</a></li>
							  <li class="breadcrumb-item active">Add client</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 text-left">
							<h2>Client Information</h2>
						</div>
						<div class="col-md-3 text-right head">
							<a href="../clients.php"><button type="submit" value="submit" class="btn btn-info">
							<img src="../img/back-2.png" height="20px" width="20px">Back to client list</button></a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<?php
							if(isset($_GET['action'])){
								if($_GET['action']=="failed"){
									echo '<div class="alert alert-danger alert-dismissable">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
										<strong>Failed!</strong> Client already present with same email id. Please provide unique email id.
									</div>';
								}
								if($_GET['action']=="success"){
									echo '<div class="alert alert-success alert-dismissable">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
										<strong>Success!</strong> Client added successfully.
									</div>';
								}
							}
							?>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<form class="" action="insert-client.php" method="post" >
								<div class="row">
									<div class="col-md-12 mb-3">
										<label >Name<span class="error" id="name_err"></span></label>
										<input type="text" for="name_err" name="name" class="form-control" id="validationName" placeholder="Enter full name" >
										
										<div ></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 mb-3">
									  <label for="validationDefault01">Email Id<span class="error" id="email_err"></span></label>
									  <input type="email" name="email" class="form-control" id="validationEmail" placeholder="Please enter your email id" required>
								
									</div>
									<div class="col-md-3 mb-3">
									  <label for="validationDefault02">Mobile<span class="error" id="mobile_err"></span></label>
									  <input type="text" name="mobile" class="form-control" id="validationMobile" placeholder="Enter 10 digit mobile number" title="enter a valid phone number" pattern="[0-9]{10}$" min="7000000000" max="9999999999" required>
									</div>
									<div class="col-md-3 mb-3">
									  <label for="validationDefault02">Phone</label>
									  <input type="text" name="phone" class="form-control" id="validationDefault02" placeholder="Enter work phone number">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 mb-3">
									  <label for="validationDefault01">Organisation</label>
									  <input type="text" name="organisation" class="form-control" id="validationDefault01" placeholder="Please enter Organization/bussiness name">
									</div>
									<div class="col-md-6 mb-3">
									  <label for="validationDefault02">Website</label>
									  <input type="text" name="website" class="form-control" id="validationDefault02" placeholder="Enter Website" >
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="validationDefault03">Address</label>
										<textarea name="address" class="form-control" id="validationDefault03" placeholder="Enter your Door no, enter your street name." rows="4" ></textarea>
										<div class="invalid-feedback">
											Please provide a valid city.
										</div>
									</div>
									<div class="col-md-6 form-group mb-3">
										<div class="row">
											<div class="col">
											  <label for="validationDefault04">Counrty<span class="error" id="country_err"></span></label>
												<select style="height: 32px;" name="country" class="form-control countries" id="countryId" >
													<option value="">Select Country</option>
													
												</select>
											</div>
											<div class="col">
												<label for="validationDefault05">State</label>
												<select style="height: 34px;" name="state" class="form-control states" id="stateId" >
													<option value="">Select State</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<label for="validationDefault04">City</label>
												<select style="height: 34px;" name="city" class="form-control cities" id="cityId" >
													<option value="">Select City</option>
												</select>
											</div>
											<div class="col">
											  <label for="validationDefault04">Pin code</label>
											  <input type="text" class="form-control" id="validationDefault04" name="pin" placeholder="Please provide postal address" >
											  <div class="invalid-feedback">
												Please provide a valid state.
											  </div>
											</div>
										</div>
									</div>
									<div class="row">
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-6  mb-1">
										<input class="btn btn-primary" value="Add" onclick="return validateForm()" type="submit">
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
		
		<!--JS-->
		<script>
		function validateForm()
		{
		  var valfirst= document.getElementById("validationName").value;
		  var valsecond=document.getElementById("validationEmail").value;
		  var valthird=document.getElementById("validationMobile").value;
		  var val4=document.getElementById("countryId").value;
		    
		  if(valfirst == null || valfirst == "")
		  {
		    document.getElementById("name_err").innerHTML="* required";
		    return false;
		  }
		  if (valsecond == null || valsecond == "")
		  {
		    document.getElementById("email_err").innerHTML="* required";
		    return false;
		  } 
		  if (valthird == null || valthird == "" || valthird < "7000000000" || valthird > "99999999999")
		  {
		    document.getElementById("mobile_err").innerHTML="* required";
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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>   
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="js/location.js"></script>  
		<!--//JS-->
	</body>
</html>
