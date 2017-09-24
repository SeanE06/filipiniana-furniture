<?php
include "session-check.php";
include 'dbconnect.php';

$id = $_SESSION['varname'];

$name = $_POST['name'];
$type = $_POST['type'];
$str = $_POST['attribs'];
//$exist = $_POST['exist'];
$status = "Listed";
$flag = 0;

$name = mysqli_real_escape_string($conn,$name);
$type = mysqli_real_escape_string($conn,$type);
$str = mysqli_real_escape_string($conn,$str);

$sql = "UPDATE `tblmaterials` SET `materialType`='$type', `materialName`='$name' WHERE `materialID`='$id';";
mysqli_query($conn,$sql);
echo $sql . "<br>";

/*
echo $exist . "<br>";

$attribs = explode(',',$exist);
$ctr = 0;
$new = explode(',',$str);


$existingAttribs = "SELECT * FROM tblmat_attribs WHERE matID = '$id'";
$existing = mysqli_query($conn,$existingAttribs);

while($row = mysqli_fetch_assoc($existing)){
	if($attribs[$ctr]!=$row['attribID']){
		echo "nadelete"  . $row['attribID']. "<br>";
		$ctr++;
	}
	else{
		echo "nadelete????<br>";
	}
}*/

$attribArr = "";
$attribs = "SELECT * from tblattributes where attributeID NOT IN (SELECT attribID from tblmat_attribs a, tblattributes b WHERE a.attribID = b.attributeID AND a.matID = '$id');";
$attributes = mysqli_query($conn,$attribs);
while($row = mysqli_fetch_assoc($attributes)){
	$attribArr = $attribArr . $row["attributeID"] . ",";
	echo $attribArr . "<br>";
}
$flag++;
$temp = substr(trim($attribArr), 0, -1);
$att = explode(',',$temp);

foreach($att as $a){
		foreach($str as $r){
		if($a==$r){
			echo $a . "=" . $r . "<br>";
			$newSql = "INSERT INTO `tblmat_attribs` (`matId`, `attribID`, `mat_attribStatus`) VALUES ('$id', '$r','Active')";
			mysqli_query($conn,$newSql);
			echo $newSql . "<br>";
			$flag++;
		}
		}
		}

if ($flag>0) {
	// Logs start here
	$sID = $id; // ID of last input;
	$date = date("Y-m-d");
	$logDesc = "Updated material ".$name.", ID = " .$sID;
	$empID = $_SESSION['userID'];
	$logSQL = "INSERT INTO `tbllogs` (`category`, `action`, `date`, `description`, `userID`) VALUES ('Materials', 'Update', '$date', '$logDesc', '$empID')";
	mysqli_query($conn,$logSQL);
	// Logs end here
	$_SESSION['updateSuccess'] = 'Success';
	header( 'Location: ' . $_SERVER['HTTP_REFERER']);
} 
 else {
    $_SESSION['actionFailed'] = 'Failed';
	header( 'Location: ' . $_SERVER['HTTP_REFERER']);
  }
mysqli_close($conn);
?>