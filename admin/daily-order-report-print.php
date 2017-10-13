<?php
set_include_path(get_include_path() . PATH_SEPARATOR . "/path/to/dompdf-master");
require_once "dompdf/autoload.inc.php";
use Dompdf\Dompdf;
ob_start();

$day = $_GET['day'];
$month = $_GET['month'];
$year = $_GET['year'];

function ordinal_suffix($num){
    $num = $num % 100; // protect against large numbers
    if($num < 11 || $num > 13){
         switch($num % 10){
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
        }
    }
    return 'th';
}

$dayWithSuffix = ordinal_suffix($day);

if($month == 1){
  $month = 'January';
}
if($month == 2){
  $month = 'February';
}
if($month == 3){
  $month = 'March';
}
if($month == 4){
  $month = 'April';
}
if($month == 5){
  $month = 'May';
}
if($month == 6){
  $month = 'June';
}
if($month == 7){
  $month = 'July';
}
if($month == 8){
  $month = 'August';
}
if($month == 9){
  $month = 'September';
}
if($month == 10){
  $month = 'October';
}
if($month == 11){
  $month = 'November';
}
if($month == 12){
  $month = 'December';
}

$dates =  $day . $dayWithSuffix . $month . $year;

?>
<!DOCTYPE html>
<head>
  <title><?php echo $orderID = $dates?></title>
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php

$day = $_GET['day'];
$month = $_GET['month'];
$year = $_GET['year'];

if($month == 1){
  $month = 'January';
}
if($month == 2){
  $month = 'February';
}
if($month == 3){
  $month = 'March';
}
if($month == 4){
  $month = 'April';
}
if($month == 5){
  $month = 'May';
}
if($month == 6){
  $month = 'June';
}
if($month == 7){
  $month = 'July';
}
if($month == 8){
  $month = 'August';
}
if($month == 9){
  $month = 'September';
}
if($month == 10){
  $month = 'October';
}
if($month == 11){
  $month = 'November';
}
if($month == 12){
  $month = 'December';
}

include "dbconnect.php";
$sql = "SELECT * FROM tblcompany_info";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
?>
<body>
  <div>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div style="text-align: center;">
          <img height="55px" src="plugins/images/<?php echo $row['comp_logo'];?>"/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div style="text-align: center;">
          <p style='font-family:inherit; font-size:28px;'><?php echo $row['comp_name'];?></p>
          <h5><?php echo $row['comp_address'];?></h5>
          <h5>Phone: <?php echo $row['comp_num'];?></h5>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div style="text-align: center;">
          <p style="text-align: center; font-family: inherit; font-weight: bolder; font-size: 20px;">- DAILY ORDER REPORT -</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div style="text-align: center;">
          <?php
          include "dbconnect.php";
          $sql = "SELECT * FROM tblcustomer a, tblorders b WHERE a.customerID = b.custOrderID and b.orderID = '$month'";
          $res = mysqli_query($conn,$sql);
          $custRow = mysqli_fetch_assoc($res);
          ?>
          <span style="text-align: center; font-family: inherit; font-weight: bolder; font-size: 20px;"><?php $orderID = $dates; echo $orderID;
          $orderReportID = "DailyOrderReport". $orderID;?></span>
        </div>
      </div>
    </div>

    <br>
    <?php
      $date = $dates;
  $newDate = new DateTime($date);
  $resultDate = $newDate->format('Y-m-d');
  $explodeDate = explode('-',$resultDate);

  $y = "";
  $m = "";
  $d = "";

  $y = $explodeDate[0];
  $m = $explodeDate[1];
  $d = $explodeDate[2];

  $tempSQL = '';
  $tempID = "";
  $tQuan = 0;
  $tPrice = 0;
  $ctr = 0;

  $sql = "SELECT * FROM tblorders WHERE orderStatus!='Archived' and dateOfReceived = '$resultDate' order by orderID;";
  $result = mysqli_query($conn, $sql);
  echo "
  <div class='table-responsive'>
    <table class='table color-bordered-table muted-bordered-table reportsDataTable display' id='reportsOut'>
    <thead>
  <tr>
    <th>Order ID</th>
    <th>Date Received</th>
    <th>Customer Name</th>
    <th style='text-align:right'>Amount Due</th>
    <th style='text-align:right'>Quantity Ordered</th>
    <th style='text-align:right'>Remaining Balance</th>
  </tr>
  </thead>
  <tbody>";
   while ($row = mysqli_fetch_assoc($result)){
    $orderID = str_pad($row['orderID'], 6, '0', STR_PAD_LEFT);
    $count_prod = pCount($row['custOrderID']);
    $get_date = getDates($row['orderID']);
    $get_name = orderCon($row['orderID']);
    $bal = getBal($row['orderID'], $row['orderPrice']);
    $qnts = pCount($row['orderID']);
    $paymentStat = getStat($row['orderID'], $row['orderPrice']);
    $date = date_create($row['dateOfReceived']);
    $date = date_format($date,"F  d, Y");
    echo ('
      <tr>
      <td>'.$orderID.'</td>
      <td>'.$date.'</td>
      <td>'.$get_name.'</td>
      <td style="text-align:right">Php '.number_format($row['orderPrice'],2).'</td>
      <td style="text-align:right">'.$qnts.'</td>
      <td style="text-align:right">Php '.number_format($bal,2).'</td>
      </tr>
      ');
  $ctr++;
  }
    echo '
     </tbody>
  <tfoot style="text-align:right;">
  </tfoot>
  </table>
  </div>
  <script>
  $(document).ready(function () {
    var table = $(".reportsDataTable").DataTable({
      "order": [],
      "pageLength": 5,
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
      "aoColumnDefs" : [
      {
       "bSortable" : false,
       "aTargets" : [ "removeSort" ]
     }]
   });
  });
  </script>';

  function pCount($id){
                              include "dbconnect.php";
                              $cnt = 0;
                              $sql = "SELECT COUNT(*) AS NO FROM tblorder_request WHERE tblOrdersID ='$id'";
                              $result = mysqli_query($conn,$sql);
                              while($row = mysqli_fetch_assoc($result)){
                                $cnt = $row['NO'];
                              }
                              return $cnt;
                            }
                            function getDates($id){
                              include "dbconnect.php";

                              $sql = "SELECT * FROM tblorders WHERE orderID='$id'";
                              $result = mysqli_query($conn,$sql);
                              $row = mysqli_fetch_assoc($result);
                              $dates = $row['dateOfReceived'];
                              return $dates;
                            }
                            function orderCon($id){
                              include "dbconnect.php";
                              $sql = "SELECT * FROM tblorders WHERE orderID='$id'";
                              $result = mysqli_query($conn,$sql);
                              $row = mysqli_fetch_assoc($result);
                              $dates = $row['custOrderID'];
                              return getName($dates);
                            }

                            function getName($id){
                              include "dbconnect.php";

                              $sql = "SELECT * FROM tblcustomer WHERE customerID='$id'";
                              $result = mysqli_query($conn,$sql);
                              $row = mysqli_fetch_assoc($result);
                              $name = $row['customerLastName'].','.$row['customerFirstName'].'  '.$row['customerMiddleName'];
                              return $name;
                            }    
                            function getBal($id,$price){
                              include "dbconnect.php";
                              $down = 0;
                              $bal = 0;
                              $sql = "SELECT * FROM tblinvoicedetails a, tblpayment_details b, tblorders c WHERE c.orderID = a.invorderID and a.invoiceID = b.invID and c.orderID = '$id'";
                              $res = mysqli_query($conn,$sql);
                              $tpay = 0;
                              while($trow = mysqli_fetch_assoc($res)){
                                $tpay = $tpay + $trow['amountPaid'];
                              }
                              $down = $tpay;
                              $bal = $price - $down;
                            return $bal;
                            }    
                            function getStat($id,$price){
                              include "dbconnect.php";
                              $down = 0;
                              $bal = 0;
                              $sql = "SELECT * FROM tblinvoicedetails a, tblpayment_details b, tblorders c WHERE c.orderID = a.invorderID and a.invoiceID = b.invID and c.orderID = '$id'";
                              $res = mysqli_query($conn,$sql);
                              $tpay = 0;
                              while($trow = mysqli_fetch_assoc($res)){
                                $tpay = $tpay + $trow['amountPaid'];
                              }
                              $down = $tpay;
                              $bal = $price - $down;
                              if($bal==$price){
                                return "No downpayment";
                              }
                              else if($bal==0){
                                return "Paid";
                              }
                              else{
                                return "Not fully paid";
                              }
                            }
  
    ?>
    <br>

    <?php
    $down = 0;
    $bal = 0;
    $sql = "SELECT * FROM tblinvoicedetails a, tblpayment_details b, tblorders c WHERE c.orderID = a.invorderID and a.invoiceID = b.invID and c.orderID = '$month'";
    $res = mysqli_query($conn,$sql);
    $tpay = 0;
    while($trow = mysqli_fetch_assoc($res)){
      $tpay = $tpay + $trow['amountPaid'];
    }
    $down = $tpay;
    $bal = $tPrice - $down;
    ?>

    <div class="row">
      <div class="col-md-6">
        <p><?php 
        session_start();
        include "dbconnect.php"; 
        $datepr = date("Y-m-d");
        $sql5 = "SELECT * FROM tblemployee a inner join tbluser b where a.empID = b.userEmpID and userID='" . $_SESSION["userID"] . "'";
        $result5 = mysqli_query($conn, $sql5);
        while ($row5 = mysqli_fetch_assoc($result5))
        { 
          if($row5['userStatus']=="Active" && $row5['userType']=="admin")
          {
            echo('Printed By: '.$row5['empFirstName'].' '.$row5['empMidName'].' '.$row5['empLastName'].'     ['.$datepr.']');
          }
        }  ?></p>
      </div>
    </div>
  </body> 
  </html>

  <?php
  $html = ob_get_clean();
  $dompdf = new DOMPDF();
  $dompdf->load_html($html);
  $dompdf->render();
  $dompdf->stream($orderReportID, array("Attachment" => 0));
  ?>