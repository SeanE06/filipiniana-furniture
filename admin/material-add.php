<?php
include "session-check.php";
include 'dbconnect.php';
session_start();

$name = $_POST['name'];
$type = $_POST['type'];
$str = $_POST['attribs'];
$des = $_POST['desc'];
$ucat = $_POST['uncID'];
$valu = $_POST['uvalue'];
$un = $_POST['unid'];
$status = "Listed";
$flag = 0;
$unit = $_POST['unit'];

//$attribs = substr(trim($str), 0, -1);

//ATTRIBUTES SAVING
/*$sql = "SELECT * FROM tblattributes;";$res = mysqli_query($conn,$sql);
$cnt = 0;$temp = "";while($row = mysqli_fetch_assoc($res)){$temp = $temp . $row["attributeName"] . ",";}$cnt = 0;$temp = substr(trim($str), 0, -1);$temp1 = explode(",", $temps);foreach($str as $a){if($a!=$temp1[$ctr]){$cnt++;$sql1 = "INSERT INTO `tblattributes` (`attributeName`, `attributeStatus`) VALUES ('','Active');";echo $sql1;$ctr++;}
	}*/
/*if($cnt>0){$sql1 = "INSERT INTO `tblattributes` (`attributeName`, `attributeStatus`) VALUES ('', 'Active');"}*/

$sql = "INSERT INTO `tblmaterials` (`materialType`, `materialName`, `materialStatus`) VALUES ('$type', '$name','$status')";
mysqli_query($conn,$sql);
$flag++;
$last_id = mysqli_insert_id($conn);
echo $sql . "<br>";

$count = count($_POST['attribs']);


for($i=0;$i<=$count;$i++){
    $aID = $str[$i];
    if($ucat[$i]=='0'){
        $varDes = $des[$i];
        $sql = "INSERT INTO `tblmat_var` (`materialId`, `attributeID`, `mat_varDescription`,`mat_varStatus`) VALUES ('$last_id', '$aID','$varDes','Active')";
        mysqli_query($conn,$sql);
        $flag++;
        echo $sql . "<br>";
    }
    else{
        $catID = $ucat[$i];
        $unitValue = $valu[$i];
        $unitID = $un[$i];
        $sql = "INSERT INTO `tblmat_var` (`materialId`, `attributeID`, `uncategoryID`,`unitValue`,`unID`,`mat_varStatus`) VALUES ('$last_id', '$aID','$catID','$unitValue','$unitID','Active')";
        mysqli_query($conn,$sql);
        $flag++;
        echo $sql . "<br>";
    }
    
}

if ($flag>0) {
  	// Logs start here
	$sID = $last_id; // ID of last input;
	$date = date("Y-m-d");
	$logDesc = "Added new material ".$name.", ID = " .$sID;
	$empID = $_SESSION['userID'];
	$logSQL = "INSERT INTO `tbllogs` (`category`, `action`, `date`, `description`, `userID`) VALUES ('Materials', 'New', '$date', '$logDesc', '$empID')";
	mysqli_query($conn,$logSQL);
	// Logs end here
	header( "Location: materials.php?newSuccess" );
} else {
  	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
mysqli_close($conn);
?>