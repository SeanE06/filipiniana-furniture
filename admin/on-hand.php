<?php
include "session-check.php";
include 'dbconnect.php';
$reason = $_POST['reason'];
$date = new DateTime();
$orderdaterec = $date->format('Y-m-d');;

if($reason==1){
	$prodID = $_POST['name'];
	$orderReq = $_POST['check'];
	$quan = $_POST['quan'];
	$remarks = $_POST['remarks'];

	$sqlo = "SELECT * FROM tblorder_request WHERE order_requestID = '$orderReq'";
	$res = mysqli_query($conn,$sqlo);
	$row = mysqli_fetch_assoc($res);
	$orderID = str_pad($row['tblOrdersID'], 6, '0', STR_PAD_LEFT);
	$orderQuan = getFin($orderReq);
	$reason = "For Order ID ". $orderID;

	if($quan>$orderQuan){
		$quan = $orderQuan;
	}


	$checkProd = "SELECT * FROM tblproduction WHERE productionOrderReq = '$orderReq'";
	$cRes = mysqli_query($conn,$checkProd);
	$cRows = mysqli_num_rows($cRes);
	if($cRows==0){
		$sql1 = "UPDATE `tblorder_request` SET `orderRequestStatus`='Ready for release' WHERE `order_requestID`='$orderReq';";
		mysqli_query($conn,$sql1);
		$sql1 = "UPDATE `tblorder_requestcnt` SET `orreq_prodFinish`='$quan' WHERE `orreq_ID`='$orderReq';";
		mysqli_query($conn,$sql1);
		finishOrder($orderReq);
		$sql = "SELECT * FROM tblonhand WHERE ohProdID ='$prodID'";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($res);
		$eQuan = $row['ohQuantity'] - $quan;

		$updateSql = "UPDATE tblonhand SET ohQuantity='$eQuan' WHERE ohProdID='$prodID'";
		if(mysqli_query($conn,$updateSql)){

			$sql2 = "INSERT INTO `tblpull_out` (`pullout_fID`, `pullout_Date`, `pullout_quantity`, `pullout_reason`, `pullout_Remarks`) VALUES ('$prodID', '$orderdaterec', '$quan', '$reason', '$remarks');";


			$_SESSION['createSuccess'] = 'Success';
			header( 'Location: ' . $_SERVER['HTTP_REFERER']);
		} 
		else {
			$_SESSION['actionFailed'] = 'Failed';
			header( 'Location: ' . $_SERVER['HTTP_REFERER']);

		}
	}
	else{
		echo "<script>
      window.location.href='product-management.php';
      alert('Failed. This order is already undergoing production.');
      </script>";
	}
}
else if($reason==2){

	$prodID = $_POST['name'];
	$quan = $_POST['quan'];
	$remarks = $_POST['remarks'];
	$reason = "Repair";

	$sql = "SELECT * FROM tblonhand WHERE ohProdID ='$prodID'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($res);
	$eQuan = $row['ohQuantity'] - $quan;

	$updateSql = "UPDATE tblonhand SET ohQuantity='$eQuan' WHERE ohProdID='$prodID'";

	if(mysqli_query($conn,$updateSql)){

		$sql2 = "INSERT INTO `tblpull_out` (`pullout_fID`, `pullout_Date`, `pullout_quantity`, `pullout_reason`, `pullout_Remarks`) VALUES ('$prodID', '$orderdaterec', '$quan', '$reason', '$remarks');";
		if(mysqli_query($conn,$sql2)){
			$ordershipadd  = "For management";
			$date = new DateTime();
			$orderdaterec = $date->format('Y-m-d H:i:s');
			$orderstat = "Pending";
			$ordertype = "Management Order";
			$employee = $_SESSION['userID'];

			$pssql = "INSERT INTO `tblorders` (`receivedbyUserID`,`dateOfReceived`,`dateOfRelease`,`custOrderID`,`orderPrice`,`orderStatus`,`shippingAddress`,`orderType`,`orderRemarks`) VALUES ('$employee','$orderdaterec', '$orderdatepick','0','$totalPrice','$orderstat','N/A','$ordertype','$remarks')";
			if (mysqli_query($conn, $pssql)){
				$orderid = mysqli_insert_id($conn);
				$unitPrice = unitPrice($prodID);
				$sql1 = "INSERT INTO `tblorder_request` (`orderProductID`,`prodUnitPrice`,`tblOrdersID`,`orderRemarks`,`orderQuantity`,`orderRequestStatus`) VALUES ('$prodID','$unitPrice', '$orderid','$remarks','$quan','Active')"; 
				mysqli_query($conn,$sql1);
				$orReqID = mysqli_insert_id($conn);
				$sql3 = "INSERT INTO `tblorder_requestcnt` (`orreq_ID`, `orreq_quantity`) VALUES ('$orReqID','$quan')";
				mysqli_query($conn,$sql3);
			}
			else{
				$_SESSION['actionFailed'] = 'Failed';
				header( 'Location: ' . $_SERVER['HTTP_REFERER']);
			}
			$_SESSION['createSuccess'] = 'Success';
			header( 'Location: ' . $_SERVER['HTTP_REFERER']);
		}
		else{
			$_SESSION['actionFailed'] = 'Failed';
			header( 'Location: ' . $_SERVER['HTTP_REFERER']);

		}

	} 
	else {
		$_SESSION['actionFailed'] = 'Failed';
		header( 'Location: ' . $_SERVER['HTTP_REFERER']);
	}
}
else{
	$prodID = $_POST['name'];
	$quan = $_POST['quan'];
	$remarks = $_POST['remarks'];
	$reason = "Other";

	$sql = "SELECT * FROM tblonhand WHERE ohProdID ='$prodID'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($res);
	$eQuan = $row['ohQuantity'] - $quan;

	$updateSql = "UPDATE tblonhand SET ohQuantity='$eQuan' WHERE ohProdID='$prodID'";

	if(mysqli_query($conn,$updateSql)){

		$sql2 = "INSERT INTO `tblpull_out` (`pullout_fID`, `pullout_Date`, `pullout_quantity`, `pullout_reason`, `pullout_Remarks`) VALUES ('$prodID', '$orderdaterec', '$quan', '$reason', '$remarks');";
		if(!mysqli_query($conn,$sql2)){
			$_SESSION['actionFailed'] = 'Failed';
			header( 'Location: ' . $_SERVER['HTTP_REFERER']);
			//echo "ERROR!!" . mysqli_error($conn);
		}
		else{
			$_SESSION['createSuccess'] = 'Success';
			header( 'Location: ' . $_SERVER['HTTP_REFERER']);
		}
	} 
	else {
		$_SESSION['actionFailed'] = 'Failed';
		header( 'Location: ' . $_SERVER['HTTP_REFERER']);
	}
}


function finishOrder($id){
	include "dbconnect.php";
	$sql1 = "SELECT * FROM tblorders a, tblorder_request b WHERE a.orderID = b.tblOrdersID and b.order_requestID = $id";
	$res1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_assoc($res1);
	$orderID = $row1['orderID'];
	$ordReqCtr = 0;
	$finCtr = 0;
	$sql2 = "SELECT * FROM tblorders a, tblorder_request b WHERE a.orderID = b.tblOrdersID and a.orderID = $orderID";
	$res2 = mysqli_query($conn,$sql2);
	while($row2 = mysqli_fetch_assoc($res2)){
		$ordReqCtr++;
		if($row2['orderRequestStatus']=='Ready for release'){
			$finCtr++;
			$oSQL = "UPDATE tblorders SET orderStatus ='Ready for release' WHERE orderID = $orderID";
			mysqli_query($conn,$oSQL);
		}
	}

	if(($finCtr==$ordReqCtr) and ($finCtr!=0) and ($ordReqCtr!=0)){
		$oSQL = "UPDATE tblorders SET orderStatus ='Ready for release' WHERE orderID = $orderID";
		mysqli_query($conn,$oSQL);
	}
	return 0;
}

function unitPrice($id){
	include "dbconnect.php";
	$price = 0;
	$sql = "SELECT * from tblproduct WHERE productID = '$id'";
	$res = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($res)){
		$price = $row['productPrice'];
	}
	return $price;
}

function getFin($id){
	include "dbconnect.php";
	$sql1 = "SELECT * FROM tblorder_requestcnt WHERE orreq_ID = $id";
	$res = mysqli_query($conn,$sql1);
	$row = mysqli_fetch_assoc($res);
	$orid = $row['orreq_quantity'];

	$prfin = $row['orreq_prodFinish'];
	$ret = $row['orreq_returned'];
	$rel = $row['orreq_released'];

	$total = $prfin + $ret + $rel;
	$quan = $orid - $total;
	return $quan;
}

?>