<?php
include "session-check.php";
include 'dbconnect.php';
session_start();

$prName = $_POST['_prodName'];
$prCtg = $_POST['_category'];
$type = $_POST['_type'];
$design = $_POST['design'];

$prFabric = 0;
if(isset($_POST['_fabric'])){
	$prFabric = $_POST['_fabric'];
}

$prPrice = $_POST['_price'];
$prFramework = $_POST['_framework'];
$prDesc = $_POST['_prodDesc'];
$dimension = $_POST['dimensions'];
$prodStat = "Pre-Order";
$pic = "";

//no shit by djmj
$time=time();
$date=date("Y/m/d");
$datetime=$date + $time;

$p = str_replace(',','',$prPrice);
$prPrice = $p;

if ($_FILES["image"]["error"] > 0)
{
 echo "Error: NO CHOSEN FILE";
 echo"INSERT TO DATABASE FAILED";
}
else
{
	$tmp_name = $_FILES["image"]["tmp_name"];
	$date = date("Y-m-d");
	$time = time();
 move_uploaded_file($tmp_name, "plugins/images/" . $date . $time . ".png");
 echo "SAVED" ;

 $pic = $date . $time . ".png";

}

$sql = "INSERT INTO `tblproduct` (`prodTypeID`,`prodCatID`,`prodFrameworkID`, `prodFabricID`, `productName`, `productDescription`, `productPrice`, `prodMainPic`, `prodSizeSpecs`,`prodStat`,`prodDesign`) VALUES ('$type','$prCtg', '$prFramework', '$prFabric', '$prName', '$prDesc', '$prPrice', '$pic', '$dimension', '$prodStat','$design')";

if (mysqli_query($conn, $sql)) {
	// Logs start here
	$sID = mysqli_insert_id($conn); // ID of last input;
	$date = date("Y-m-d");
	$logDesc = "Added new product ".$prName.", ID = " .$sID;
	$empID = $_SESSION['userID'];
	$logSQL = "INSERT INTO `tbllogs` (`category`, `action`, `date`, `description`, `userID`) VALUES ('Products', 'New', '$date', '$logDesc', '$empID')";
	mysqli_query($conn,$logSQL);
	// Logs end here
  	header( "Location: products.php?newSuccess" );
} else {
  	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
mysqli_close($conn);
?>