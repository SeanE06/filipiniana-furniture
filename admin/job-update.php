<?php
include "session-check.php";
include 'dbconnect.php';

$id = $_SESSION['varname'];
$editName = $_POST['name'];
$editDescription = $_POST['desc'];

$editDescription = mysqli_real_escape_string($conn,$editDescription);

$updateSql = "UPDATE tbljobs SET jobName='$editName', jobDescription='$editDescription' WHERE jobID=$id";

if(mysqli_query($conn,$updateSql)){
	// Logs start here
	$sID = $id; // ID of last input;
	$date = date("Y-m-d");
	$logDesc = "Updated job ".$editName.", ID = " .$sID;
	$empID = $_SESSION['userID'];
	$logSQL = "INSERT INTO `tbllogs` (`category`, `action`, `date`, `description`, `userID`) VALUES ('Jobs', 'Update', '$date', '$logDesc', '$empID')";
	mysqli_query($conn,$logSQL);
	// Logs end here
	header( "Location: jobs.php?updateSuccess" );
} else {
	header( "Location: jobs.php?actionFailed" );
  }
?>