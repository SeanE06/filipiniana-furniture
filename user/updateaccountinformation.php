<?php
session_start();
include "userconnect.php";
$un = $_POST["uname"];
$op = $_POST["opass"];
$up = $_POST["upass"];
$cp = $_POST["cpass"];

$un = mysqli_real_escape_string($conn, $un);
$up = mysqli_real_escape_string($conn, $up);
$op = mysqli_real_escape_string($conn, $op);
$cp = mysqli_real_escape_string($conn, $cp);

$select=$conn->query("SELECT * from tbluser where userCustID = 1");
$row=$select->fetch_assoc();
$dbpass=$row["userPassword"];

if(!empty($un)&&empty($op)&&empty($up)&&empty($cp)){
	$usernamesql="UPDATE tbluser SET username='$un' where userID =1 ";
	if($conn->query($usernamesql)==true){
		echo "<script type='text/javascript'>
		alert('Successfully Saved');
		</script>";
	}
}
else if(!empty($un)&&!empty($op)&&!empty($up)&&!empty($cp)){
	if($up==$dbpass){
		echo "<script type='text/javascript'>
		alert('That is already your password');
		</script>";
	}
	else if($op==$dbpass){
		if($up==$cp){
			$usersql="UPDATE tbluser SET username='$un', userPassword='$up'";
			if($conn->query($usersql)==true){
			echo "<script type='text/javascript'>
			alert('Successfully Saved');
			</script>";
			}
		}
		else{
			echo "<script type='text/javascript'>
			alert('Passwords does not match');
			</script>";
		}
	}
}
else if(!empty($un)&&!empty($op)&&empty($up)&&empty($cp)){
	echo "<script type='text/javascript'>
	alert('That is a not your old password.');
	</script>";
}
$conn->close();
?>