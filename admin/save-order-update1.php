<?php
include 'dbconnect.php';

$orderid = $_POST['updateOrder'];
$exist = $_POST['existRec'];
$delete = $_POST['deleted'];
$quan = $_POST['quan'];
$tPrice = $_POST['tPrice'];
$ctr = 0;

//UPDATE ORDER INFO
//$sql = "UPDATE tblorders SET orderPrice = '$tPrice' WHERE orderID = '$orderid'";
//echo "SQL: " . $sql . "<br>";
//mysqli_query($conn,$sql);


//UPDATE ORDER REQUEST INFO
foreach ($exist as $a) {
	$sql = "UPDATE tblorder_request SET orderQuantity = ".$quan[$ctr]." WHERE order_requestID = '$a'";
	echo "SQL: " . $sql . "<br>";
	mysqli_query($conn,$sql);
	$ctr++;
}

foreach ($delete as $a) {
	$sql = "UPDATE tblorder_request SET orderRequestStatus = 'Deleted' WHERE order_requestID = '$a'";
	echo "SQL: " . $sql . "<br>";
	mysqli_query($conn,$sql);
	echo $a . " DELETED <br>";
}

if($ctr>0){
       header( "Location: orders.php" );
     } 
     else {
      echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);

?>