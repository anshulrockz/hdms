
		<!--Header-->
		<?php $header= '<div class="container-fluid">
			<div class="row header">
				<div class="col-md-3 col-sm-6 col-xs-6">
					<img id="logo" src="img/TechStreet.png" width="100%" >
				</div>
				<div class="col-md-7 host">
					<h1>Hosting and domain management system</h1>
				</div>
				<div class="col-md-2 col-sm-6 col-xs-6 ">
					<div class="dropdown">
						<button type="submit" value="submit" class="dropbtn">
						<img id="admin" src="img/profile-1.png" height="30px" width="30px"></button><h4 style="display:inline"> Admin</h4>
						<div class="dropdown-content">
							<br>
							<a href="pass-change.php">Change Password</a>
							<a class="underline" href="php/logout.php">Log Out </a>
						</div>
					</div>
                </div>
			</div>
		</div>' ?>
		<!--//Header-->
		
		
		
		<!--SideNav-->
			<?php $sideNav='	<div class="col-md-3 col-sm-12"><br>
					<div class="list-group">
						<a class="list-group-item  list-group-item-action active " href="dashboard.php" class=""><span class="glyphicon glyphicon-th"></span> Dashboard</a>
						<a class="list-group-item list-group-item-action" href="masters.php"><span class="glyphicon glyphicon-user"></span> Masters</a>
						<a class="list-group-item list-group-item-action " href="clients.php"> <span class="glyphicon glyphicon-user"></span> Clients</a>
						<a class="list-group-item list-group-item-action " href="domain.php"><span class="glyphicon glyphicon-globe"></span> Domains</a>
						<a class="list-group-item list-group-item-action" href="hosting.php"><span class="glyphicon glyphicon-cloud-upload"></span> Hosting</a>
						<a class="list-group-item list-group-item-action " href="reports.php"><span class="glyphicon glyphicon-cloud-upload"></span> Reports</a>
					</div>
				</div>'; ?>
				<!--//SideNav-->
				
						<!--Breadcrimb-->
						<?php $breadcrimb='<div class="row" >
							<div class="col underline" >
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Hosting</li>
								</ol>
							</div>
						</div>';?>
						<!--//Breadcrumb-->
						
						
			
		
		<!--Footer-->
		<?php $footer='<div class="container-fluid">
			<div class="row header">
				<div class="col-md-4 ">
					
				</div>
				<div class="col-md-4">
					<span>All rights reserved. Techstreet solutions pvt. ltd</span>
				</div>
				<div class="col-md-4">
					
				</div>
			</div>
		</div>'?>
		<!--//Footer-->