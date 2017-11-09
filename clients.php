<?php
include 'php/session.php';
include 'php/connect.php';
include 'php/extra.php';
	if(!$connection){
		die("connectionn err:".mysqli_connect_error());
	}
	$query=mysqli_query($connection,"SELECT * FROM clients");
	$count=mysqli_num_rows($query);
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Clients</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--StyleSheet-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style/sheet1.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
		<!--//StyleSheet-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
						<a class="list-group-item  list-group-item-action  " href="dashboard.php" class=""><span class="glyphicon glyphicon-th"></span> Dashboard</a>
						<a class="list-group-item list-group-item-action" href="masters.php"><span class="glyphicon glyphicon-queen"></span> Masters</a>
						<a class="list-group-item list-group-item-action active" href="clients.php"> <span class="glyphicon glyphicon-user"></span> Clients</a>
						<a class="list-group-item list-group-item-action " href="domain.php"><span class="glyphicon glyphicon-globe"></span> Domains</a>
						<a class="list-group-item list-group-item-action" href="hosting.php"><span class="glyphicon glyphicon-cloud-upload"></span> Hosting</a>
						<a class="list-group-item list-group-item-action " href="reports.php"><span class="glyphicon glyphicon-list-alt"></span> Reports</a>
					</div>
				</div>
			<!--//SideNav-->
				<div class="col-md-9">
					<main class="col-sm-12" role="main">
						<div class="row " >
							<div class="col-md-10" >
								<h2 class="">Clients</h2>
							</div>
							<div class="col-md-2 head">
								<a href="client/add-client.php"><button class="btn btn-primary" type="submit"><img src="img/add-button.png" height="10px" width="10px">Add clients </button></a>
							</div>
						</div>
						
						<div class="row" >
							<div class="col underline" >
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
									<li class="breadcrumb-item active">Clients</li>
								</ol>
							</div>
						</div>
					<div class="row ">
						<div class="col-md-12">
							<?php
							if(isset($_GET['action'])){
								if($_GET['action']=="status"){
									echo '<div class="alert alert-success alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Success!</strong> User state changed.
									</div>';
									}
								if($_GET['action']=="failed"){
									echo '<div class="alert alert-danger alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Failed!</strong> Operation failed.
									</div>';
									}
								if($_GET['action']=="Error"){
									echo '<div class="alert alert-danger alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Error!</strong> Domain or Hosting are associated.
									</div>';
									}
								if($_GET['action']=="Success"){
									echo '<div class="alert alert-success alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>Success!</strong> operation success.
									</div>';
									}
							}
							?>
						</div>
					</div>
						<section class="row">
							<table class="table table-responsive" id="dataTable">
								<thead class="thead-default">
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Email ID </th>
										<th>Mobile Number </th>
										<th>Organisation </th>
										<th>Status</th>
										<th style="width:125px">Action</th>
									</tr>
								</thead>
								<tbody id="table">
								<?php 
									if($count>0){
										$i=1;
										while($row=mysqli_fetch_array($query)){
											if($row["status"]=="Active"){
												$btn= "btn-success";
											}
											if($row["status"]=="Inactive"){
												$btn= "btn-danger";
											}
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $row["client_name"];?></td>
									<td><?php echo $row["email"];?></td>
									<td><?php echo $row["mobile"];?></td>
									<td><?php echo $row["organisation"];?></td>
									<td>
										<a class="btn <?php echo $btn ?> " style="width:80px" title="Change status" href="php/status.php?id=<?php echo $row["id"];?>"><?php echo $row["status"];?></a>
									</td>
									<td>
										<a class="btn btn-primary" title="view details" href="client/view/client-details.php?id=<?php echo $row["id"];?>" ><img src="img/view.png" height="20px" width="20px"></a>
										<a class="btn btn-warning" title="update" href="client/update/client-update.php?action=up&id=<?php echo $row["id"];?>"><img src="img/updates-1.png" height="20px" width="20px"></a>
										<a class="btn btn-danger" title="delete" href="php/delete/client-delete.php?id=<?php echo $row["id"];?>" onclick="return confirm('Are you sure?')"><img src="img/delete-2.png" height="20px" width="20px"></a>
									</td>
								</tr>
								<?php	$i++;		
										}
									}
									else{
								?>
								<tr>
									<td></td>
									<td colspan="5"><?php echo "No records found"; ?></td>
								</tr>
								<?php	
									}	?>
								</tbody>
							</table>
						</section>
					</main>
				</div>
			</div>
		</div>
		<!--//Content-->
		
		<!--Footer-->
		<?php echo $footer?>
		<!--//Footer-->
		
	</body>
	<!--JS-->
	<script>
	$(document).ready(function() {
	    $('#dataTable').DataTable();
	} );
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<!--//JS-->
	
</html>
