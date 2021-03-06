<?php
include "dbconnect.php";

$id = $_POST["id"];

if($id=="1"){ // most ordered furniture
	$tempSQL = '';
	$tempID = "";
	$ctr = 0;
	$sql = "SELECT *,SUM(b.orderQuantity) as quan FROM tblproduct a, tblorder_request b WHERE a.productID = b.orderProductID GROUP BY b.orderProductID order by quan DESC;";
	
	$result = mysqli_query($conn, $sql);
	echo "
	<div class='table-responsive'>
    <table class='table color-bordered-table muted-bordered-table queriesDataTable display' id='tblQuery'>
    <thead>
	<tr>
	<th>Product ID</th>
	<th>Product Name</th>
	<th>Product Description</th>
	<th>Product Price</th>
	<th style='text-align:center'>Quantity Ordered</th>
	</tr>
	</thead>
	<tbody>";
	while ($row = mysqli_fetch_assoc($result)){
		$prodID = str_pad($row['productID'], 6, '0', STR_PAD_LEFT);
		echo ('<tr><td>'.$prodID.'</td>
			<td>'.$row['productName'].'</td>
			<td>'.$row['productDescription'].'</td>
			<td>&#8369;'.number_format($row['productPrice'],2).'</td>
			<td style="text-align:center">'.$row['quan'].'</td>
			</tr>'); 
	$ctr++;
	}
	if($ctr==0){
		echo "<td colspan='6' style='text-align:center'><p style='text-align:center; font-family:inherit; font-size:25px;'>NOTHING TO SHOW</p></td>";
		echo "</tbody>";
	}
	else{
		echo "
	</tbody>
	</table>
	</div>
	<script>
	$(document).ready(function () {
	  var table = $('.queriesDataTable').DataTable({
	    'order': [],
	    'pageLength': 5,
	    'lengthMenu': [[5,10, 25, 50, -1], [5,10, 25, 50, 'All']],
	    'aoColumnDefs' : [
	    {
	     'bSortable' : false,
	     'aTargets' : [ 'removeSort' ]
	   }]
	 });
	});
	</script>";
	}
} 

else if($id=="2"){ // customer info
	$ctr = 0;
	$sql = "SELECT * FROM tblcustomer;";
	$result = mysqli_query($conn, $sql);
	echo "
	<div class='table-responsive'>
    <table class='table color-bordered-table muted-bordered-table queriesDataTable display' id='tblQuery'>
	<thead>
	<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Address</th>
	<th>Contact Number</th>
	<th>Email Address</th>
	<th>Status</th>
	</tr>
	</thead>
	<tbody>";
	while ($row = mysqli_fetch_assoc($result)){
		$prodID = str_pad($row['customerID'], 6, '0', STR_PAD_LEFT);
		echo ('<tr><td>'.$prodID.'</td>
			<td>'.$row['customerFirstName']." ".$row['customerMiddleName']." ".$row['customerLastName'].'</td>
			<td>'.$row['customerAddress'].'</td>
			<td>'.$row['customerContactNum'].'</td>
			<td>'.$row['customerEmail'].'</td>
			<td>'.$row['customerStatus'].'</td>
			</tr>'); 
	$ctr++;
	}
	if($ctr==0){
		echo "<td colspan='6' style='text-align:center'><p style='text-align:center; font-family:inherit; font-size:25px;'>NOTHING TO SHOW</p></td>";
		echo "</tbody>";
	}
	else{
		echo "
	</tbody>
	</table>
	</div>
	<script>
	$(document).ready(function () {
	  var table = $('.queriesDataTable').DataTable({
	    'order': [],
	    'pageLength': 5,
	    'lengthMenu': [[5,10, 25, 50, -1], [5,10, 25, 50, 'All']],
	    'aoColumnDefs' : [
	    {
	     'bSortable' : false,
	     'aTargets' : [ 'removeSort' ]
	   }]
	 });
	});
	</script>";
	}
} 

else if($id=="3"){ // loyal customer
	$ctr = 0;
	$sql = $sql = "SELECT *, SUM(b.orderQuantity) as quan, SUM(c.orderPrice) as tprice FROM tblcustomer d, tblorder_request b, tblorders c WHERE d.customerID = c.custOrderID and c.orderID = b.tblOrdersID GROUP BY c.custOrderID order by quan DESC;";
	$result = mysqli_query($conn, $sql);
	echo "
	<div class='table-responsive'>
    <table class='table color-bordered-table muted-bordered-table queriesDataTable display' id='tblQuery'>
	<thead>
	<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Contact Number</th>
	<th>Email Address</th>
	<th style='text-align:center;'>Quantity Ordered</th>
	<th style='text-align:center;'>Total Amount</th>
	</tr>
	</thead>
	<tbody>";
	while ($row = mysqli_fetch_assoc($result)){
		$prodID = str_pad($row['customerID'], 6, '0', STR_PAD_LEFT);
		echo ('<tr><td>'.$prodID.'</td>
			<td>'.$row['customerFirstName']." ".$row['customerMiddleName']." ".$row['customerLastName'].'</td>
			<td>'.$row['customerContactNum'].'</td>
			<td>'.$row['customerEmail'].'</td>
			<td style="text-align:center;">'.$row['quan'].'</td>
			<td style="text-align:center;">&#8369;'.number_format($row['tprice'],2).'</td>
			</tr>'); 
	$ctr++;
	}
	if($ctr==0){
		echo "<td colspan='6' style='text-align:center'><p style='text-align:center; font-family:inherit; font-size:25px;'>NOTHING TO SHOW</p></td>";
		echo "</tbody>";
	}
	else{
		echo "
	</tbody>
	</table>
	</div>
	<script>
	$(document).ready(function () {
	  var table = $('.queriesDataTable').DataTable({
	    'order': [],
	    'pageLength': 5,
	    'lengthMenu': [[5,10, 25, 50, -1], [5,10, 25, 50, 'All']],
	    'aoColumnDefs' : [
	    {
	     'bSortable' : false,
	     'aTargets' : [ 'removeSort' ]
	   }]
	 });
	});
	</script>";
	}
} 


else if($id=="4"){ // loyal customer
	$ctr = 0;
	$sql = $sql = "SELECT * FROM tblcustomer";
	$result = mysqli_query($conn, $sql);
	echo "
	<div class='table-responsive'>
    <table class='table color-bordered-table muted-bordered-table queriesDataTable display' id='tblQuery'>
	<thead>
	<tr>
	<th>Customer ID</th>
	<th>Customer Name</th>
	<th>Contact Number</th>
	<th>Email Address</th>
	<th>Remaining Balance</th>
	</tr>
	</thead>
	<tbody>";

	while ($row = mysqli_fetch_assoc($result)){
		$bal = getBal($row['customerID']);
		if($bal!=0){
			
		$ctr++;
			$prodID = str_pad($row['customerID'], 6, '0', STR_PAD_LEFT);
			echo ('<tr><td>'.$prodID.'</td>
				<td>'.$row['customerFirstName']." ".$row['customerMiddleName']." ".$row['customerLastName'].'</td>
				<td>'.$row['customerContactNum'].'</td>
				<td>'.$row['customerEmail'].'</td>
				<td style="text-align:center;">&#8369;'.number_format($bal,2).'</td>
				</tr>'); 
		}
	}
	if($ctr==0){
		echo "<td colspan='6' style='text-align:center'><p style='text-align:center; font-family:inherit; font-size:25px;'>NOTHING TO SHOW</p></td>";
		echo "</tbody>";
	}
	else{
		echo "
	</tbody>
	</table>
	</div>
	<script>
	$(document).ready(function () {
	  var table = $('.queriesDataTable').DataTable({
	    'order': [],
	    'pageLength': 5,
	    'lengthMenu': [[5,10, 25, 50, -1], [5,10, 25, 50, 'All']],
	    'aoColumnDefs' : [
	    {
	     'bSortable' : false,
	     'aTargets' : [ 'removeSort' ]
	   }]
	 });
	});
	</script>";
	}
	} 



else if($id=="5"){ // loyal customer
	$ctr = 0;
	$sql = "SELECT * FROM tblorders a, tblcustomer b WHERE a.custOrderID = b.customerID and a.orderStatus = 'Cancelled'";
	$result = mysqli_query($conn, $sql);
	echo "
	<div class='table-responsive'>
    <table class='table color-bordered-table muted-bordered-table queriesDataTable display' id='tblQuery'>
	<thead>
	<tr>
	<th>Order ID</th>
	<th>Customer Name</th>
	<th>Contact Number</th>
	<th>Order Price</th>
	<th>Reason</th>
	</tr>
	</thead>
	<tbody>";

	while ($row = mysqli_fetch_assoc($result)){
		$ctr++;
		$bal = getBal($row['orderID']);
		$prodID = str_pad($row['orderID'], 6, '0', STR_PAD_LEFT);
		echo ('<tr><td>'.$prodID.'</td>
			<td>'.$row['customerFirstName']." ".$row['customerMiddleName']." ".$row['customerLastName'].'</td>
			<td>'.$row['customerContactNum'].'</td>
			<td>&#8369;'.number_format($row['orderPrice'],2).'</td>
			<td style="text-align:center;">'.$row['orderRemarks'].'</td>
			</tr>'); 
	}
	if($ctr==0){
		echo "<td colspan='6' style='text-align:center'><p style='text-align:center; font-family:inherit; font-size:25px;'>NOTHING TO SHOW</p></td>";
		echo "</tbody>";
	}
	else{
		echo "
	</tbody>
	</table>
	</div>
	<script>
	$(document).ready(function () {
	  var table = $('.queriesDataTable').DataTable({
	    'order': [],
	    'pageLength': 5,
	    'lengthMenu': [[5,10, 25, 50, -1], [5,10, 25, 50, 'All']],
	    'aoColumnDefs' : [
	    {
	     'bSortable' : false,
	     'aTargets' : [ 'removeSort' ]
	   }]
	 });
	});
	</script>";
	}

} 


else if($id=="6"){ // loyal customer
	$ctr = 0;
	$sql = "SELECT * FROM tblorders a, tblcustomer b WHERE a.custOrderID = b.customerID and a.orderStatus = 'Rejected'";
	$result = mysqli_query($conn, $sql);
	echo "
	<div class='table-responsive'>
    <table class='table color-bordered-table muted-bordered-table queriesDataTable display' id='tblQuery'>
	<thead>
	<tr>
	<th>Order ID</th>
	<th>Customer Name</th>
	<th>Contact Number</th>
	<th>Order Price</th>
	<th>Reason</th>
	</tr>
	</thead>
	<tbody>";

	while ($row = mysqli_fetch_assoc($result)){
		$ctr++;
		$bal = getBal($row['orderID']);
		$prodID = str_pad($row['orderID'], 6, '0', STR_PAD_LEFT);
		echo ('<tr><td>'.$prodID.'</td>
			<td>'.$row['customerFirstName']." ".$row['customerMiddleName']." ".$row['customerLastName'].'</td>
			<td>'.$row['customerContactNum'].'</td>
			<td>&#8369;'.number_format($row['orderPrice'],2).'</td>
			<td style="text-align:center;">'.$row['orderRemarks'].'</td>
			</tr>'); 
	}
	if($ctr==0){
		echo "<td colspan='6' style='text-align:center'><p style='text-align:center; font-family:inherit; font-size:25px;'>NOTHING TO SHOW</p></td>";
		echo "</tbody>";
	}
	else{
		echo "
	</tbody>
	</table>
	</div>
	<script>
	$(document).ready(function () {
	  var table = $('.queriesDataTable').DataTable({
	    'order': [],
	    'pageLength': 5,
	    'lengthMenu': [[5,10, 25, 50, -1], [5,10, 25, 50, 'All']],
	    'aoColumnDefs' : [
	    {
	     'bSortable' : false,
	     'aTargets' : [ 'removeSort' ]
	   }]
	 });
	});
	</script>";
	}

} 

else if($id=="8"){ // loyal customer
	$ctr = 0;
	$sql = "SELECT * FROM tblorders a, tblcustomer b WHERE a.custOrderID = b.customerID and a.orderStatus = 'Archived'";
	$result = mysqli_query($conn, $sql);
	echo "
	<div class='table-responsive'>
    <table class='table color-bordered-table muted-bordered-table queriesDataTable display' id='tblQuery'>
	<thead>
	<tr>
	<th>Order ID</th>
	<th>Customer Name</th>
	<th>Contact Number</th>
	<th>Order Price</th>
	<th>Reason</th>
	</tr>
	</thead>
	<tbody>";

	while ($row = mysqli_fetch_assoc($result)){
		$ctr++;
		$bal = getBal($row['orderID']);
		$prodID = str_pad($row['orderID'], 6, '0', STR_PAD_LEFT);
		echo ('<tr><td>'.$prodID.'</td>
			<td>'.$row['customerFirstName']." ".$row['customerMiddleName']." ".$row['customerLastName'].'</td>
			<td>'.$row['customerContactNum'].'</td>
			<td>&#8369;'.number_format($row['orderPrice'],2).'</td>
			<td style="text-align:center;">'.$row['orderRemarks'].'</td>
			</tr>'); 
	}
	if($ctr==0){
		echo "<td colspan='6' style='text-align:center'><p style='text-align:center; font-family:inherit; font-size:25px;'>NOTHING TO SHOW</p></td>";
		echo "</tbody>";
	}
	else{
		echo "
	</tbody>
	</table>
	</div>
	<script>
	$(document).ready(function () {
	  var table = $('.queriesDataTable').DataTable({
	    'order': [],
	    'pageLength': 5,
	    'lengthMenu': [[5,10, 25, 50, -1], [5,10, 25, 50, 'All']],
	    'aoColumnDefs' : [
	    {
	     'bSortable' : false,
	     'aTargets' : [ 'removeSort' ]
	   }]
	 });
	});
	</script>";
	}

} 

else if($id=="7"){ // LOGS PU
	$ctr = 0;
	$sql = "SELECT * FROM tbllogs a, tbluser b, tblemployee c where a.userID = b.userID and c.empID = b.userEmpID";
	$result = mysqli_query($conn, $sql);
	echo "
	<div class='table-responsive'>
    <table class='table color-bordered-table muted-bordered-table queriesDataTable display' id='tblQuery'>
	<thead>
	<tr>
	<th>Date</th>
	<th>Action</th>
	<th>Category</th>
	<th>Description</th>
	<th>Actor</th>
	</tr>
	</thead>
	<tbody>";

	while ($row = mysqli_fetch_assoc($result)){
		$ctr++;

		$date = date_create($row['date']);
		$date = date_format($date,"F d, Y");
		echo ('
			<tr>
				<td>' . $date. '</td>
				<td>'. $row['action'] . '</td>
				<td>' . $row['category'] . '</td>
				<td>' . $row['description'] . '</td>
				<td>' . $row['empFirstName'] . ' '. $row['empMidName']  .' '. $row['empLastName'].'</td>
			</tr>'); 
	}
	if($ctr==0){
		echo "<td colspan='6' style='text-align:center'><p style='text-align:center; font-family:inherit; font-size:25px;'>NOTHING TO SHOW</p></td>";
		echo "</tbody>";
	}
	else{
		echo "
	</tbody>
	</table>
	</div>
	<script>
	$(document).ready(function () {
	  var table = $('.queriesDataTable').DataTable({
	    'order': [],
	    'pageLength': 5,
	    'lengthMenu': [[5,10, 25, 50, -1], [5,10, 25, 50, 'All']],
	    'aoColumnDefs' : [
	    {
	     'bSortable' : false,
	     'aTargets' : [ 'removeSort' ]
	   }]
	 });
	});
	</script>";
	}

} 



else if($id=="9"){ // LOGS PU
	$ctr = 0;
	$sql = "SELECT * FROM tblnewsletter a, tbluser b, tblemployee c where a.newsletterAuthor = b.userID and c.empID = b.userEmpID";
	$result = mysqli_query($conn, $sql);
	echo "
	<div class='table-responsive'>
    <table class='table color-bordered-table muted-bordered-table queriesDataTable display' id='tblQuery'>
	<thead>
	<tr>
	<th>Date</th>
	<th>Content</th>
	<th>Author</th>
	<th>Status</th>
	</tr>
	</thead>
	<tbody>";

	while ($row = mysqli_fetch_assoc($result)){
		$ctr++;

		$date = date_create($row['newsletterDate']);
		$date = date_format($date,"F d, Y");
		echo ('
			<tr>
				<td>' . $date. '</td>
				<td>'. $row['newsletterContent'] . '</td>
				<td>' . $row['empFirstName'] . ' '. $row['empMidName']  .' '. $row['empLastName'].'</td>
				<td>'. $row['newsletterStatus'] . '</td>
			</tr>'); 
	}
	if($ctr==0){
		echo "<td colspan='6' style='text-align:center'><p style='text-align:center; font-family:inherit; font-size:25px;'>NOTHING TO SHOW</p></td>";
		echo "</tbody>";
	}
	else{
		echo "
	</tbody>
	</table>
	</div>
	<script>
	$(document).ready(function () {
	  var table = $('.queriesDataTable').DataTable({
	    'order': [],
	    'pageLength': 5,
	    'lengthMenu': [[5,10, 25, 50, -1], [5,10, 25, 50, 'All']],
	    'aoColumnDefs' : [
	    {
	     'bSortable' : false,
	     'aTargets' : [ 'removeSort' ]
	   }]
	 });
	});
	</script>";
	}

} 

function getBal($id){
	include "dbconnect.php";
	$down = 0;
	$bal = 0;
	$sql = "SELECT * FROM tblinvoicedetails a, tblpayment_details b, tblorders c, tblcustomer d WHERE c.orderID = a.invorderID and a.invoiceID = b.invID and d.customerID = c.custOrderID and d.customerID = '$id'";
	$res = mysqli_query($conn,$sql);
	$tpay = 0;
	$price = 0;
	while($trow = mysqli_fetch_assoc($res)){
		$tpay = $tpay + $trow['amountPaid'];
		$price = $trow['orderPrice'];
	}
	$down = $tpay;
	$bal = $price - $down;
	return $bal;
}
?> 