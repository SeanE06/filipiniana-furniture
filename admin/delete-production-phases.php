<?php
session_start();
if(isset($GET['id'])){
	$jsID = $_GET['id']; 
}
$jsID=$_GET['id'];

include 'dbconnect.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$updateSql = "UPDATE tbl SET Status = '' WHERE ID = '$jsID'";
        // Check connection

if(mysqli_query($conn,$updateSql)){
	header( "Location: production-phases.php?deactivateSuccess" );
}
else {
	echo "Error: " . $updateSql . "<br>" . mysqli_error($conn);
}
?>