<?php
include "session-check.php";
include 'dbconnect.php';

$id = $_SESSION['varname'];
$editName = $_POST['name'];
$editDescription = $_POST['desc'];
$rating = $_POST['rating'];

$editDescription = mysqli_real_escape_string($conn,$editDescription);

$updateSql = "UPDATE tblfabric_texture SET textureName='$editName', textureRating='$rating', textureDescription='$editDescription' WHERE textureID=$id";

if(mysqli_query($conn,$updateSql)){
	// Logs start here
	$sID = $id; // ID of last input;
	$date = date("Y-m-d");
	$logDesc = "Updated fabric texture ".$editName.", ID = " .$sID;
	$empID = $_SESSION['userID'];
	$logSQL = "INSERT INTO `tbllogs` (`category`, `action`, `date`, `description`, `userID`) VALUES ('Fabric Texture', 'Update', '$date', '$logDesc', '$empID')";
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