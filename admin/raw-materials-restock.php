<?php
include "session-check.php";
include 'dbconnect.php';
 
$varid = $_SESSION['varid'];
$sup = $_POST['supplier'];
/*$pcs = $_POST['pcs'];

$box = $_POST['box'];*/
$quan = $_POST['quan'];
$status = "Listed";
$flag=0;


$sql = "INSERT INTO `tblmat_deliveries` (`supplierID`, `totalQuantity`, `mat_deliveryRemarks`, `mat_deliveryStatus`) VALUES ('$sup', '$quan','$status','$status')";
mysqli_query($conn, $sql);

$id = mysqli_insert_id($conn);
 
$sql1 = "INSERT INTO `tblmat_deliverydetails` (`del_matDelID`, `del_matVarID`, `del_quantity`, `del_remarks`) VALUES ('$id', '$varid','$quan','$status')";
mysqli_query($conn, $sql1);
$sID = mysqli_insert_id($conn);
$flag++;

$sql2 = "SELECT * FROM tblmat_inventory WHERE matVariantID = '$varid'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$sID = mysqli_insert_id($conn);

$added = $row2['matVarQuantity'] + $quan;
$sql4 = "UPDATE `tblmat_inventory` SET `matVarQuantity`='$added' WHERE `matVariantID`='$varid'";
mysqli_query($conn, $sql4);
$flag++;

$sql5 = "SELECT * FROM tblmat_var WHERE mat_varID = '$varid'";
$result5 = mysqli_query($conn, $sql5);
$row5 = mysqli_fetch_assoc($result5);
$name = $row5['mat_varDescription'];

if ($flag>0) {
	// Logs start here
<<<<<<< HEAD
	$sql5 = "SELECT * FROM tblmat_var WHERE mat_varID = '$varid'";
    $result5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($result5);
	 // ID of last input;
	$date = date("Y-m-d");
	$logDesc = "Added stocks on raw materials ".$row5['mat_varDescription'].", ID = " .$sID;
=======
	 // ID of last input;
	$date = date("Y-m-d");
	$logDesc = "Added new material ".$name.", ID = " .$sID.", Quantity = ".quan;
>>>>>>> 96805e0c372375df8d02677e190cda61290d24e1
	$empID = $_SESSION['userID'];
	$logSQL = "INSERT INTO `tbllogs` (`category`, `action`, `date`, `description`, `userID`) VALUES ('Material Restock', 'New', '$date', '$logDesc', '$empID')";
	mysqli_query($conn,$logSQL);
	// Logs end here
	$_SESSION['createSuccess'] = 'Success';
	header( 'Location: ' . $_SERVER['HTTP_REFERER']);
} 
 else {
    $_SESSION['actionFailed'] = 'Failed';
	header( 'Location: ' . $_SERVER['HTTP_REFERER']);
  }

/*if($box==0){
	$box = 1;
}

$total = $pcs * $box;
$supname = "";

$sql = "SELECT * FROM tblsupplier WHERE supplierID ='$sup'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
	$supname = $row['supCompName'];
}


$matname = "";
$sql = "SELECT * FROM tblmat_var a, tblmaterials b WHERE a.mat_varID = b.materialID AND variantID ='$id'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
	$matname = $row['variantDescription'] .' '. $row['materialName'];
	$quan = $row['variantQuantity'];

}


$gt = $total + $quan;
$desc = $supname . " supplied " . $total . " pcs of " . $matname;
$date = date("Y/m/d"); 

$sql1 = "INSERT INTO .`tblinventory_logs` (`inLogDescription`, `inLogDate`) VALUES ('$desc', '$date')";

mysqli_query($conn,$sql1);


$sql = "UPDATE tblmat_var SET variantQuantity = '$gt' WHERE variantID = '$id'"; 
if($sql){
  if (mysqli_query($conn, $sql)) {
   header( "Location: raw-materials-management.php?newSuccess" );
 } 
 else {
   header( "Location: raw-materials-management.php?actionFailed" );
}*/

mysqli_close($conn);

?>