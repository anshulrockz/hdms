<?php
include '../../php/session.php';
include '../../php/connect.php';
include '../../php/extra.php';
$id=$_GET['id'];
if(!$connection){
	die("connectionn err:".mysqli_connect_error());
}

$sql1="SELECT clients.*, countries.name AS countryname, states.name AS statename, cities.name AS cityname FROM clients 
	LEFT JOIN countries ON countries.id=clients.country 
	LEFT JOIN states ON states.id=clients.state
	LEFT JOIN cities ON cities.id=clients.city WHERE clients.id='$id'";
$query1=mysqli_query($connection,$sql1);
$result=mysqli_fetch_assoc($query1);
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
						<a class="list-group-item list-group-item-action active" href="../../clients.php"> <span class="glyphicon glyphicon-user"></span> Clients</a>
						<a class="list-group-item list-group-item-action " href="../../domain.php"><span class="glyphicon glyphicon-globe"></span> Domains</a>
						<a class="list-group-item list-group-item-action" href="../../hosting.php"><span class="glyphicon glyphicon-cloud-upload"></span> Hosting</a>
						<a class="list-group-item list-group-item-action " href="../../reports.php"><span class="glyphicon glyphicon-list-alt"></span> Reports</a>
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
							  <li class="breadcrumb-item"><a href="../../dashboard.php">Home</a></li>
							  <li class="breadcrumb-item"><a href="../../clients.php">Clients</a></li>
							  <li class="breadcrumb-item active">Client-details</li>
							</ol>
						</div>
					</div>
					
					
					
					<div class="row justify-content-end">
						<div class="col-md-4 col-auto mr-auto text-left">
							<h2>Client Information</h2>
						</div>
						<div class="col-md-3 text-right head">
							<a href="../../clients.php"><button type="submit" value="submit" class="btn btn-info">
							<img src="../../img/back-2.png" height="20px" width="20px">Back to client list</button></a>
						</div>
					</div>
					<div class="row">
						
					</div>
					
					<div class="row">
						<table class="col-md-6 table table-bordered" >
							<tbody>
								<tr>
									<th>Name:</th>
									<td><?php echo $result['client_name']; ?></td>
								</tr>
								<tr>
									<th>Email ID:</th>
									<td><?php echo $result['email']; ?></td>
								</tr>
								<tr>
									<th>Mobile:</th>
									<td><?php echo $result['mobile']; ?></td>
								</tr>
								<tr>
									<th>Phone:</th>
									<td><?php echo $result['phone']; ?></td>
								</tr>
								<tr>
									<th>Organisation:</th>
									<td><?php echo $result['organisation']; ?></td>
								</tr>
								<tr>
									<th>Website:</th>
									<td><?php echo $result['website']; ?></td>
								</tr>
								<tr>
									<th>Address:</th>
									<td><?php echo $result['address']."<br>".$result['cityname']; ?></td>
								</tr>
								<tr>
									<th>State:</th>
									<td><?php echo $result['statename']; ?></td>
								</tr>
								<tr>
									<th>Country:</th>
									<td><?php echo $result['countryname']; ?></td>
								</tr>
								<tr>
									<th>PIN:</th>
									<td><?php echo $result['pin']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
							
						<?php
						$sql2="SELECT * FROM domains WHERE client_id='$id'";
						$query2=mysqli_query($connection,$sql2);
						$count2=mysqli_num_rows($query2);
						$i=1;
						if($count2>0){
						while($result2=mysqli_fetch_array($query2)){
						?>
							
					<div class="row">
						<div class="col-md-4 col-auto mr-auto text-left">
							
						</div>
					</div>
					<div class="col-sm-11 col-md-4">
						<table class=" table table-bordered">
						<tbody>
							<tr>
								<th colspan="2">Domain Information<div class="badge"><?php echo $i; $i++;?></div></th>
							</tr>
							<tr>
								<th>Domain:</th>
								<td><?php echo $result2['domain_name']; ?></td>
							</tr>
							<tr>
								<th>Domain provider:</th>
								<td>
									<?php 
									$temp=$result2['provider_id']; 
									$query_pro=mysqli_query($connection,"SELECT * FROM providers WHERE id='$temp'");
										$row_pro=mysqli_fetch_array($query_pro);
										echo $row_pro["name"];
									?>
								</td>
							</tr>
							<tr>
								<th>Registration date:</th>
								<td><?php echo $result2['reg_date_domain']; ?></td>
							</tr>
							<tr>
								<th>Validity:</th>
								<td><?php echo $result2['validity']; ?></td>
							</tr>
							</tbody>
						</table>
					</div>
								<?php
									} 
								}	
								$sql3="SELECT * FROM hosting LEFT 
								JOIN clients ON hosting.client_id=clients.id WHERE client_id='$id'";
								$query3=mysqli_query($connection,$sql3);
								$count3=mysqli_num_rows($query3);
								$i=1;
								if($count3>0){
								while($result3=mysqli_fetch_assoc($query3)){
								?>	
					<div class="row">
						<div class="col-md-4 col-auto mr-auto text-left">
							
						</div>
					</div>
							<div class="col-sm-11 col-md-4">
								<table class=" table table-bordered ">
									<tbody>
										<tr>
											<th colspan="2">Hosting Information<div class="badge"><?php echo $i; $i++;?></div></th>
										</tr>
										<tr>
											<th>Hosting:</th>
											<td><?php echo $result3['hosting_name']; ?></td>
										</tr>
										<tr>
											<th>Server type:</th>
											<td>
												<?php 
												$temp4=$result3['server_type']; 
												$query4=mysqli_query($connection,"SELECT * FROM host_type WHERE id_type='$temp4'");
												$result4=mysqli_fetch_array($query4);
												echo $result4["name"];
												?>
											</td>
										</tr>
										<tr>
											<th>Server space:</th>
											<td>
												<?php 
												$temp5=$result3['provider_id']; 
												$query5=mysqli_query($connection,"SELECT * FROM providers WHERE id='$temp5'");
												$result5=mysqli_fetch_array($query5);
												echo $result5["name"];
												?>
											</td>
										</tr>
										<tr>
											<th>Email ID:</th>
											<td><?php echo $result3['email_hosting']; ?></td>
										</tr>
										<tr>
											<th>Registration date:</th>
											<td><?php echo $result3['reg_date_hosting']; ?></td>
										</tr>
										<tr>
											<th>Validity:</th>
											<td><?php echo $result3['validity']; ?></td>
										</tr>
										<tr>
											<th>Info:</th>
											<td><?php echo $result3['info']; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
								<?php
									}
								}
								?>
				</div>
			</div>
		</div>
		
		<!--//Content-->
		
		<!--Footer-->
		<?php echo $footer?>
		<!--//Footer-->
		
	</body>
</html>
