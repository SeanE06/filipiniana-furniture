<?php
include "dbconnect.php";

$invID = 0;
$orderID = $_POST['orderID'];
$paid = $_POST['paid'];
$sql = "SELECT * FROM tblinvoicedetails WHERE invorderID = '$orderID'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
$invID = $row['invoiceID'];

$uOrSQL = "UPDATE tblorders SET orderStatus = 'Pending', orderType = 'Management Order' WHERE orderID = '$orderID'";
mysqli_query($conn,$uOrSQL);

echo $invID;
echo $paid;
$mop = $_POST['mop'];
$date = new DateTime();
$orderdaterec = $date->format('Y-m-d H:i:s');

$sqlU = "UPDATE tblpayment_details SET paymentStatus = 'Returned' WHERE invID = '$invID'";
if(!mysqli_query($conn,$sqlU)){
	echo "Error" . mysqli_error($conn);
}

$paysql = "INSERT INTO `tblpayment_details` (`invID`, `dateCreated`, `amountPaid`, `mopID`, `paymentStatus`) VALUES ('$invID', '$orderdaterec', '$paid', '$mop', 'Paid');";
mysqli_query($conn,$paysql);
$receiptID = mysqli_insert_id($conn);
	echo '<script type="text/javascript">
	window.open("return-receipt.php?id='.$receiptID.'","_blank")
	</script>';

	echo "<script>
	window.location.href='orders.php';
	alert('Record Saved.');
	</script>";

mysqli_close($conn);
?>