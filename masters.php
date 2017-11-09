<?php
include 'php/session.php';
include 'php/connect.php';
include 'php/extra.php';
	if(!$connection){
		die("connectionn err:".mysqli_connect_error());
	}
	$query1=mysqli_query($connection,"SELECT * FROM providers");
	$count1=mysqli_num_rows($query1);
	$query2=mysqli_query($connection,"SELECT * FROM host_type");
	$count2=mysqli_num_rows($query2);
?>
<DOCTYPE HTML>
<html>
	<head>
		<title>Masters</title>
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
						<a class="list-group-item  list-group-item-action  " href="dashboard.php" class=""><span class="glyphicon glyphicon-th"></span> Dashboard</a>
						<a class="list-group-item list-group-item-action active" href="masters.php"><span class="glyphicon glyphicon-queen"></span> Masters</a>
						<a class="list-group-item list-group-item-action " href="clients.php"> <span class="glyphicon glyphicon-user"></span> Clients</a>
						<a class="list-group-item list-group-item-action " href="domain.php"><span class="glyphicon glyphicon-globe"></span> Domains</a>
						<a class="list-group-item list-group-item-action" href="hosting.php"><span class="glyphicon glyphicon-cloud-upload"></span> Hosting</a>
						<a class="list-group-item list-group-item-action " href="reports.php"><span class="glyphicon glyphicon-list-alt"></span> Reports</a>
					</div>
				</div>
			<!--//SideNav-->
					<main class="col-md-9" role="main">
						<div class="row " >
							<div class="col-md-10" >
								<h2 class="">Masters</h2>
							</div>
						</div>
						
						<div class="row" >
							<div class="col underline" >
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
									<li class="breadcrumb-item active">Masters</li>
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
											<strong>Failed!</strong> Already present.
										</div>';
									}
									if($_GET['action']=="success"){
										echo '<div class="alert alert-success alert-dismissable">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<strong>Success!</strong> Added successfully.
										</div>';
									}
								}
								?>
							</div>
						</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col align-self-start">
										<h3>Providers</h3>
									</div>
									<div class="col align-self-end head">
										<a href="masters/provider/provider-add.php"><button class="btn btn-primary"type="submit" ><img src="img/add-button.png" height="15px" width="15px">Add More</button></a>
									</div>
								</div>
								<br>
								<table class="table justify-content-center" style="width:100%">
									<thead>
										<tr>
											<th>Title</th>
											<th>Website </th>
											<th> Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									if($count1>0){ 
										while($result=mysqli_fetch_array($query1)){
											
									?>
										<tr>
											<td><?php echo ucwords($result['name']); ?></td>
											<td><a target="_blank" href="<?php echo ucwords($result['website']); ?>"><?php echo ucwords($result['website']); ?></a></td>
											<th><a class="btn btn-danger btn-block" title="delete" href="php/delete/delete.php?table=providers&id=<?php echo $result["id"];?>" onclick="return confirm('Are you sure?')"><img src="img/delete-2.png" height="20px" width="20px"></a></th>
										</tr>
									
								
								<?php
										}
									}
									else{
										echo"<tr>
												<th colspan=2>No providers present!</th>
											</tr>";
									}
								?>
									</tbody>
								</table>
							</div>
									
							<div class="col-md-6">
							<div class="row ">
								<div class="col align-self-start">
									<h3>Hosting type</h3>
								</div>
								<div class="col align-self-end head">
									<a href="masters/type/host-type-add.php"><button class="btn btn-primary"type="submit" ><img src="img/add-button.png" height="15px" width="15px">Add More</button></a>
								</div>
							</div>
									<table class="table justify-content-center" style="margin:20px;width:100%">
										<thead>
											<tr>
												<th># </th>
												<th>Title </th>
												<th> Action</th>
											</tr>
										</thead>
										<tbody>
									<?php
										if($count2>0){ 
											$i=1;
											$str='Are you sure?';
											while($result2=mysqli_fetch_array($query2)){
												
												echo'
													<tr>
														<th>'.$i.'. </th>
														<td>'.ucwords($result2['name']).'</td>
														<th><a class="btn btn-danger" title="delete" href="php/delete/delete.php?table=hostt_type&id="'.$result["id"].'" onclick="return confirm('.$str.')"><img src="img/delete-2.png" height="20px" width="20px"></a></th>
													</tr>';
												$i++;
											}
										}
										else{
											echo"<th></th>
												 <th>No host types present!</th>";
										}
									?>
									
									</tbody>
									</table>
								
					</main>
				
		<!--//Content-->
		
		<!--Footer-->
		<?php echo $footer?>
		<!--//Footer-->
		
	</body>
	<script>
	function search(str){
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("table").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","php/search.php?table=clients&str="+str,false);
		xmlhttp.send(null);
    }
	</script>
</html>
