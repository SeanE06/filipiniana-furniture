<?php
include "session-check.php";
include 'dbconnect.php';

$name = $_POST['name'];
$desc = $_POST['desc'];
$rating = $_POST['rating'];
$status = "Listed";

$desc = mysqli_real_escape_string($conn,$desc);

$sql = "INSERT INTO `tblfabric_texture` (`textureName`,`textureRating`, `textureDescription`, `textureStatus`) VALUES ('$name', '$rating','$desc', '$status')";

if(mysqli_query($conn,$sql)){
	// Logs start here
	$sID = mysqli_insert_id($conn); // ID of last input;
	$date = date("Y-m-d");
	$logDesc = "Added new fabric texture ".$name.", ID = " .$sID;
	$empID = $_SESSION['userID'];
	$logSQL = "INSERT INTO `tbllogs` (`category`, `action`, `date`, `description`, `userID`) VALUES ('Fabric Texture', 'New', '$date', '$logDesc', '$empID')";
	mysqli_query($conn,$logSQL);
	// Logs end here
	$_SESSION['createSuccess'] = 'Success';
	header( 'Location: ' . $_SERVER['HTTP_REFERER']);
} 
 else {
    $_SESSION['actionFailed'] = 'Failed';
	header( 'Location: ' . $_SERVER['HTTP_REFERER']);
  }
?>