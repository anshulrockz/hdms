<?php
session_start();
if(!empty($_SESSION)){
	header("location:dashboard.php");
}
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<!--Bootstrap-->
		 <link href="style.css" rel="stylesheet">
		 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!--//Bootstrap-->
		<link rel="stylesheet" type="text/css" href="style/sheet1.css">
		
	</head>
	<body>
		<!--Header-->
		<div class="container-fluid">
			<div class="row header">
				<div class="col-md-3 col-sm-6 col-xs-6">
					<img src="img/TechStreet.png" width="100%" >
				</div>
				<div class="col-md-7 host">
					<h1>Hosting and domain management system</h1>
				</div>
			</div>
		</div>
		<!--//Header-->
		<!--Content-->
		<div class="container" style="min-height:76.5%">
			<div class="row justify-content-center">
				<div class="col-md-4 col-sm-12" style="padding-top:50px;padding-bottom:5px;">
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
							<strong>Invalid!</strong> Password.
							</div>';
							}
						if($_GET['action']=="error"){
							echo '<div class="alert alert-danger alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
							<strong>Invalid!</strong>  User name.
							</div>';
							}
						if($_GET['action']=="success"){
							echo '<div class="alert alert-success alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
							<strong>Success!</strong> operation success.
							</div>';
							}
					}
					?>
				</div>
			</div>
			<div class="row justify-content-center" >
				<div class="col-md-4 col-sm-12" style="padding-bottom:50px;">
					<div style="background-color:#337AAE;color:white;padding: 1em"><h2>Login</h2>
					<form class="" action="php/login.php" method="post">
						<div class="form-group row ">
							<label for="text" class="form-control-label col-sm-12" >User Name
							<input type="text" class="form-control " placeholder="please enter your user name" name="user" required></label> 
						</div>
						<div class="form-group  row ">
							<label for="password" class="form-control-label col-sm-12">Password 
							<input type="password" class="form-control " placeholder="please enter your Password" name="password" required></label> 
						</div>
						<div class="form-group  row "> 
							<label for="password" class="form-control-label col-sm-12">
							<button type="submit" class="btn btn-block btn-success col-sm-12">Login</button></label>
						</div>
					</form></div>
				</div>
			</div>
		</div>
		<!--//Content-->
		<!--Footer-->
		<div class="container-fluid">
			<div class="row header">
				<div class="col-md-4 ">
					
				</div>
				<div class="col-md-4">
					<span>All rights reserved. Techstreet solutions pvt ltd <span class="glyphicon glyphicon-copyright-mark"></span><?php echo date("Y"); ?></span>
				</div>
				<div class="col-md-4">
					
				</div>
			</div>
		</div>
		<!--//Footer-->
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
<?php
	
?>
