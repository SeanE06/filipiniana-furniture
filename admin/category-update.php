<?php
include "session-check.php";
include 'dbconnect.php';

$id = $_SESSION['varname'];
$editType = $_POST['type'];
$editName = $_POST['name'];
$editRemarks = $_POST['remarks'];

$editRemarks = mysqli_real_escape_string($conn,$editRemarks);

$updateSql = "UPDATE tblfurn_category SET categoryName='$editName', categoryRemarks='$editRemarks' WHERE categoryID=$id";

if(mysqli_query($conn,$updateSql)){
	// Logs start here
	$sID = $id; // ID of last input;
	$date = date("Y-m-d");
	$logDesc = "Updated category ".$editName.", ID = " .$sID;
	$empID = $_SESSION['userID'];
	$logSQL = "INSERT INTO `tbllogs` (`category`, `action`, `date`, `description`, `userID`) VALUES ('Category', 'Update', '$date', '$logDesc', '$empID')";
	mysqli_query($conn,$logSQL);
	// Logs end here
	$_SESSION['updateSuccess'] = 'Success';
	header( 'Location: ' . $_SERVER['HTTP_REFERER']);
} 
 else {
    $_SESSION['actionFailed'] = 'Failed';
	header( 'Location: ' . $_SERVER['HTTP_REFERER']);
  }
?>