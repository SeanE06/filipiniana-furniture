<?php
include "session-check.php";
include 'dbconnect.php';
session_start();

if(isset($GET['id'])){
	$jsID = $_GET['id']; 
}
$jsID=$_GET['id'];

$updateSql = "UPDATE tblfabric_type SET f_typeStatus = 'Archived'  WHERE f_typeID = '$jsID'";

if(mysqli_query($conn,$updateSql)){
	// Logs start here
	$sID = $jsID; // ID of last input;
	$date = date("Y-m-d");
	$logDesc = "Deactivated fabric type ".$editName.", ID = " .$sID;
	$empID = $_SESSION['userID'];
	$logSQL = "INSERT INTO `tbllogs` (`category`, `action`, `date`, `description`, `userID`) VALUES ('Fabric Type', 'Deactivate', '$date', '$logDesc', '$empID')";
	mysqli_query($conn,$logSQL);
	// Logs end here
	header( "Location: fabric-type.php?deactivateSuccess" );
}
else {
	echo "Error: " . $updateSql . "<br>" . mysqli_error($conn);
}
?>