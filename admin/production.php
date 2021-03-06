<?php
session_start();
if(!isset($_SESSION["userID"]))
{
	header("Location: error.html");
}
?>
<!DOCTYPE html>

<html>
	<title>
		Filipiniana Furnitures - Accounts
	</title>
	<head>
		<!--meta tags-->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie-edge">
		<!--bootstrap 4-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<!--scripts-->
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<!--google icons-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<!--font awesome icons-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--my css-->
		<link rel="stylesheet" href="myStyle.css">
		<!--javascript-->
		<script src="js/myScript.js"></script>
	</head>
	<body>
		<div class="jumbotron-fluid">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<!--navbar-->
					<br><br>
					<nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-inverse">
					 	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					  	</button>
					  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
						  		<li class="nav-item">
									<a class="nav-link" href="access.php"><i class="fa fa-user-circle-o"></i>&nbsp;ACCOUNT <span class="sr-only">(current)</span></a>
						  		</li>
						  		<li class="nav-item">
									<a class="nav-link" href="accessproducts.php"><i class="fa fa-bed"></i>&nbsp;PRODUCTS</a>
						  		</li>
						  		<li class="nav-item">
									<a class="nav-link" href="customize1.php"><i class="fa fa-hand-pointer-o"></i>&nbsp;CUSTOMIZE</a>
						  		</li>
						  		<li class="nav-item active">
									<a class="nav-link" href="heyproduction.php"><i class="fa fa-cog fa-spin"></i>&nbsp;PRODUCTION</a>
						  		</li>
							</ul>
							<form class="form-inline my-2 my-lg-0">
						  		<input class="form-control mr-sm-2" type="text" placeholder="Search">
						  		<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
							</form>
					  </div>
					</nav>
				</div>
			</div>
			<br>
			<!--account-->
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-6 col-xl-6">
						<?php
						include "dbconnect--.php";
						$sql="SELECT * from tblproduction";
						$result=$conn->query($sql);
						if($result->num_rows>0)
						{
							while($row=$result->fetch_assoc())
							{
						?>
						<table class="table ">
							<thead class="thead-inverse">
								<tr>
									<th>Production Span</th>
									<th>Product Phase</th>
									<th>Production Status</th>
									<th>Production Remarks</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo "" . $row['prodDateStart'];?> up to <?php echo "" . $row['prodDateEnd'];?></td>
									<td><?php echo "" . $row['prodPhase'];?></td>
									<td><?php echo "" . $row['productionStatus'];?></td>
									<td><?php echo "" . $row['productionRemarks'];?></td>
								</tr>
							</tbody>
						</table>
						<?php
							}
						}
						$conn->close();
						?>
					</div>
				</div>
			</div>
			<br>
			<!--footer-->
			<footer class="footer" id="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 col-lg-3 col-xl-3">
							<h3 class="text-center">Connect with us</h3>
							<ul class="list-inline text-center">
								<li class="list-inline-item"><a href="#"><span class="fa fa-facebook-official fa-2x fa-inverse"></span></a></li>
								<li class="list-inline-item"><a href="#"><span class="fa fa-twitter-square fa-2x fa-inverse"></span></a></li>
							</ul>
						</div>
						<div class="col-md-3 col-lg-3 col-xl-3">
							<h3 class="text-center">Talk to us</h3>
							<p class="lead text-center"><a href="#" style="text-decoration:none;color:white;">FFat20@gmail.com</a></p>
						</div>
						<div class="col-md-3 col-lg-3 col-xl-3">
							<h3 class="text-center">Visit us</h3>
							<p class="text-center">#1738, Sesame street, <br>Barangay LS 97.1, Sim City</p>
						</div>
						<div class="col-md-3 col-lg-3 col-xl-3">
							<h3 class="text-center">Contact us</h3>
							<p class="lead text-center">09876543210</p>
						</div>
					</div>
				</div>
			</footer>
			<div class="jumbotron-fluid">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
						<button onClick="footerToggle()" class="btn text-primary text-center"style="background-color:white;"><i class="fa fa-copyright"></i>&nbsp;Aira and Friends. All rights reserved</button>
					</div>
				</div>
			</div>
			<!--modal-->
			<div class="modal fade" id="signupmodal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Product Name</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>