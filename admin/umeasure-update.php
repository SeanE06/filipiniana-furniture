<?php
include "session-check.php";
include 'dbconnect.php';

$id = $_SESSION['varname'];
$editType = $_POST['uType'];
$editUnit = $_POST['uUnit'];
$cats = $_POST['attribs'];

$updateSql = "UPDATE tblunitofmeasure SET unType='$editType', unUnit='$editUnit' WHERE unID=$id;";

$deleteSql = "DELETE FROM tblunit_cat WHERE unitID=$id;";
mysqli_query($conn,$deleteSql);

foreach($cats as $a)
{$sql = "INSERT INTO `tblunit_cat` (`unitID`, `uncategoryName`, `unitcatStatus`) VALUES ('$id', '$a','Active')";
mysqli_query($conn,$sql);}

if(mysqli_query($conn,$updateSql)){
	// Logs start here
	$sID = $id; // ID of last input;
	$date = date("Y-m-d");
	$logDesc = "Updated unit of measurement ".$editType.", ID = " .$sID;
	$empID = $_SESSION['userID'];
	$logSQL = "INSERT INTO `tbllogs` (`category`, `action`, `date`, `description`, `userID`) VALUES ('Unit of Measurement', 'Update', '$date', '$logDesc', '$empID')";
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