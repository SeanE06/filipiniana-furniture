<?php
include "session-check.php";
include 'dbconnect.php';

$id = $_SESSION['varname'];
$editLocation = $_POST['location'];
$editAddress = $_POST['address'];
$editRemarks = $_POST['remarks'];

$editRemarks = mysqli_real_escape_string($conn,$editRemarks);

  // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$updateSql = "UPDATE tblbranches SET branchLocation='$editLocation', branchAddress='$editAddress', branchRemarks='$editRemarks' WHERE branchID=$id";

if(mysqli_query($conn,$updateSql)){
	$_SESSION['updateSuccess'] = 'Success';
	header( 'Location: ' . $_SERVER['HTTP_REFERER']);
} 
 else {
    $_SESSION['actionFailed'] = 'Failed';
	header( 'Location: ' . $_SERVER['HTTP_REFERER']);
 }
?>