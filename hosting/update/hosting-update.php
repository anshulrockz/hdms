<?php
	include '../../php/session.php';
	include '../../php/connect.php';
	include '../../php/extra.php';
	$id=$_GET['id'];
	if(!$connection){
		die("connectionn err:".mysqli_connect_error());
	}
	$query1=mysqli_query($connection,"SELECT * FROM hosting WHERE id_hosting='$id'");
	$result=mysqli_fetch_assoc($query1);
	
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Update-hosting</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Bootstrap-->
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!--//Bootstrap-->
		<link rel="stylesheet" type="text/css" href="../../style/sheet1.css">
		<link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
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
							<h2 class="">Update</h2>
						</div>
					</div>
					<div class="row">
						<div class="col underline">
							<ol class="breadcrumb">
							  <li class="breadcrumb-item"><a href="../../dashboard.php">Home</a></li>
							  <li class="breadcrumb-item"><a href="../../hosting.php">Hosting</a></li>
							  <li class="breadcrumb-item active">Hosting-update</li>
							</ol>
						</div>
					</div>
					<div class="row justify-content-between">
						<div class="col-md-9 text-left">
							<h2>Hosting information</h2>
						</div>
						<div class="col-md-3 text-right head">
							<a href="../../hosting.php"><button type="submit" value="submit" class="btn btn-info">
							<img src="../../img/back-2.png" height="20px" width="20px">Back to hosting list</button></a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php
							if(isset($_GET['action'])){
								if($_GET['action']=="update"){
									echo '<div class="alert alert-info alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Success!</strong> Details updated changed.
									</div>';
								}
							}
							?>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<form action="update.php?id=<?php echo $result['id_hosting']; ?>" method="post">
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="validationDefault01">Plan Name<span class="span-danger">*</span></label>
										<input type="text" name="hosting" value="<?php echo $result['hosting_name']; ?>" class="form-control" id="validationDefault01" placeholder="Plan name for hosting" required oninvalid="this.setCustomValidity('Please Enter valid plan name')">
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
													if($result3['id_type']==$result['server_type']){
														echo '<option select="selected" value="'.$result3['id_type'].'">'. ucwords($result3['name']).'</option>';
													}
													else{
														echo '<option value="'.$result3['id_type'].'">'. ucwords($result3['name']).'</option>';
													}
												}
											}
											else{
												echo "no server found!";
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
										<input type="date" class="form-control" value="<?php echo $result['reg_date_hosting']; ?>" id="validationDefault04" name="date" required>
									</div>
									<div class="col-md-3 mb-3">
										<label for="validationDefault05">Expiry<span class="span-danger">*</span></label>
										<input type="date" value="<?php echo $result['validity']; ?>"class="form-control" id="validationDefault05" name="period" required>
									</div>
									<div class="col-md-6 mb-3">
										<label for="validationDefault01">Provider</label>
										<select class="form-control" id="validationDefault1" name="provider" style="height:34px;" required>
											<option value="">Select provider</option>
											<?php 	
											$query2=mysqli_query($connection,"SELECT * FROM providers");
											$count2=mysqli_num_rows($query2);
											if($count2>0){
												while($result2=mysqli_fetch_array($query2)){ 
													if($result2['id']==$result['provider_id']){
														echo '<option selected="selected" value="'.$result2['id'].'">'. ucwords($result2['name']).'</option>';
													}
													else{
														echo '<option value="'.$result2['id'].'">'. ucwords($result2['name']).'</option>';
													}
		
												}
											}
											?>
										</select>
									
									</div>
									<div class="col-md-3 mb-3">
										<label >Server Space</label>
										<input type="text" class="form-control" value="<?php echo $result['server_space']; ?>" id="validationDefault04" name="server_space" placeholder="GB space on server">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="validationDefault01">Client<span class="span-danger">*</span></label>
										<select class="form-control" id="validationDefault1" name="client_id"  style="height:34px;" required>
										 <option value="">Select client</option>
										<?php
											$query4=mysqli_query($connection,"SELECT * FROM clients");
											$count4=mysqli_num_rows($query4);
											if($count4>0){
												while($result4=mysqli_fetch_array($query4)){
													if($result4['id']==$result['client_id']){
														echo '<option selected="selected" value="'.$result4['id'].'">'. ucwords($result4['client_name']).'</option>';
													}
													else{
														echo '<option value="'.$result4['id'].'">'. ucwords($result4['client_name']).'</option>';
													}
												}
											}
											else{
												echo "no server found!";
											}
										?>
										</select>
									</div>
									<div class="col-md-6 mb-3">
										<label for="validationDefault01">Domain<span class="span-danger">*</span></label>
										
										<input type="text" value="<?php echo $result['domain_id']; ?>" name="domain" class="form-control" id="domain" placeholder="Please enter domain name" required>
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="validationDefault01">Username<span class="span-danger">*</span></label>
										<input type="text5" value="<?php echo $result['username_hosting']; ?>" name="text5" class="form-control" id="validationDefault01" placeholder="Please provide domain name" required>
									</div>
									<div class="col-md-6">
										<label for="validationDefault01">Password<span class="span-danger">*</span></label>
										<input type="text" value="<?php echo $result['password_hosting']; ?>" name="text6" class="form-control" id="validationDefault01" placeholder="Please provide domain name" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="validationDefault01">Email ID<span class="span-danger">*</span></label>
										<input type="email" value="<?php echo $result['email_hosting']; ?>" name="text7" class="form-control" id="validationDefault01" placeholder="Please provide domain name" required>
									</div>
									<div class="col-md-6">
										<label for="validationDefault01">Password of Email ID<span class="span-danger">*</span></label>
										<input type="text" value="<?php echo $result['password_email_hosting']; ?>" name="text8" class="form-control" id="validationDefault01" placeholder="Please provide domain name" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="validationDefault01">Cpanel username<span class="span-danger">*</span></label>
										<input type="text" value="<?php echo $result['cpanel_hosting']; ?>" name="text9" class="form-control" id="validationDefault01" placeholder="Please provide cpanel username" required>
									</div>
									<div class="col-md-6">
										<label for="validationDefault01">Cpannel password<span class="span-danger">*</span></label>
										<input type="text" value="<?php echo $result['cpanel_password_hosting']; ?>" name="text10" class="form-control" id="validationDefault01" placeholder="Please provide cpanel password" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="validationDefault01">Additional Information</label>
										<textarea class="form-control" name="info" rows="3" placeholder="Any kind of aditional information" ><?php echo $result['info']; ?></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6  mb-1">
										<input class="btn btn-warning" value="Update" type="submit">
										<input class="btn btn-danger" value="Reset" type="reset">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div><h1></h1><br>
			</div>
				</div><h1></h1><br>
			</div>
		</div>
		<!--//Content-->
		
		<!--Footer-->
		<?php echo $footer?>
		<!--//Footer-->

	</body>
	<script type="text/javascript">
            $(document).ready(function(){
                $("#domain").autocomplete({
                    source:'../../php/searchlike.php',
                    minLength:1
                });
            });
    </script>
</html>
