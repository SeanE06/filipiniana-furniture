<?php
include "userconnect.php";
$sql = "SELECT * FROM tblcompany_info";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="image/favicon.ico" rel="icon" />
	<link rel="stylesheet" href="css/myStyle.css">
	<title>Orders - <?php echo $row['comp_name']?></title>
	<meta name="description" content="Furniture shop">
	<script type="text/javascript" src="js/myScript.js"></script>
	<?php include"css.php";?>
</head>
<body style="background: #ffffff;">
	<?php 
	include "header.php";
	if(!isset($_SESSION["userID"]))
	{
		echo "<script>
		window.location.href='login.php';
		alert('You have no access here. You must logged in first.');
		</script>";
	}
	?>
	<div id="container">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="home.php"><i class="fa fa-home"></i></a></li>
        		<li><a href="orders.php">Orders</a></li>
			</ul>
			<br>
			<div class="row">
				<?php include "accountmenu.php"; ?>
				<!--Middle Part Start-->
				<div class="col-sm-9" id="content">
					<h2>My Orders</h2>
					<div class="row">
						<div class="col-sm-12">
							<div class="col-md-12">
						<div class="row">
							<div class="table-responsive">          
								<table class="table table-hover table-striped">
									<thead>
										<tr>
											<th>Order #</th>
											<th>Placed On</th>
											<th>Total</th>
											<th>Status</th>
											<th>View Order Details</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php

									include "userconnect.php";
										$id = $_SESSION["userID"];

										$usql = "SELECT * FROM tbluser where userID = '$id';";
										$uresult = mysqli_query($conn,$usql);
										$urow = mysqli_fetch_assoc($uresult);

										$uid = $urow['userCustID'];

										$sqls = "SELECT * FROM tblorders where custOrderID = '$uid';";
										$sresult = mysqli_query($conn,$sqls);
										

										while($srow = mysqli_fetch_assoc($sresult)){
											$rid = str_pad($srow['orderID'], 6, '0', STR_PAD_LEFT);
											$oid = $srow['orderID'];
											$stat = $srow['orderStatus']; 
											if($stat == 'WFA'){ 
												$stat = "Waiting for Approval";
											}
											else if($stat == 'WFP')
											{ 
												$stat = "Waiting for Payment";
											}

										?>

										<tr>
											<td style="color:#1A9CB7;"><?php echo $rid;?></td>
											<td><?php echo $srow['dateOfReceived'];?></td>
											<td>₱ <?php echo $srow['orderPrice'];?></td>
											<td><?php echo $stat;;?></td>
											<td>
												<?php echo $row['orderID']; echo '<a class="btn btn-primary" data-toggle="modal" data-target="#myModal" href="order-management-modals.php" data-remote="order-management-modals.php?id='.$row['orderID'].' #viewInfo">View</a>';
												?>
											</td>

											<td></td>
											<?php
											if($stat=='Waiting for Approval'){
												echo '<td><a href="cancel-ordReq.php?id='.$oid.'" style="color:#1A9CB7;">CANCEL REQUEST</a></td>';
											}
											?>
										</tr>

										<?php
										}

										?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
						</div>
					</div>
				</div>
				<!--Middle Part End -->
			</div>
		</div>
	</div>
	<div id="myModal" class="modal fade" role="dialog " aria-hidden="true" style="display: none;" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <!-- Modal content -->
            <div class="modal-content clearable-content">
            <div class="modal-body">

            </div>
            </div>
          </div>
          </div>
        </div>
	<?php include"footer.php";?>
	<!--img src="pics/userpictures/<?php echo "" . $row["customerDP"];?>" style="height:150px; width:150px;" alt="Product" class="img-responsive profilepic"/-->
	<?php include "scripts.php";?>
</body>
</html>