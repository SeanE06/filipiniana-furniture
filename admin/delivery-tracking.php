<?php
include "titleHeader.php";
include "menu.php";  
//session_start();
/* if(isset($GET['id'])){
$jsID = $_GET['id']; 
}
$jsID=$_GET['id'];
$_SESSION['varname'] = $jsID;*/
include 'dbconnect.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['newSuccess']))
{
  echo  '<script>';
  echo '$(document).ready(function () {';
  echo 'document.getElementById("toastNewSuccess").click();';
  echo '});';
  echo '</script>';
}
else if (isset($_GET['updateSuccess']))
{
  echo  '<script>';
  echo '$(document).ready(function () {';
  echo 'document.getElementById("toastUpdateSuccess").click();';
  echo '});';
  echo '</script>';
}
else if (isset($_GET['deactivateSuccess']))
{
  echo  '<script>';
  echo '$(document).ready(function () {';
  echo 'document.getElementById("toastDeactivateSuccess").click();';
  echo '});';
  echo '</script>';
}

?>
<!DOCTYPE html>  
<html lang="en">
<head>
</head>
<body>
  <button class="tst1" id="toastNewSuccess" style="display: none;"></button>
  <button class="tst2" id="toastUpdateSuccess" style="display: none;"></button>
  <button class="tst3" id="toastDeactivateSuccess" style="display: none;"></button>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="panel panel-info">
            <h3>
              <ul class="nav customtab2 nav-tabs" role="tablist">
                <button id="tempbtn" class="btn btn-lg btn-info pull-right" onclick="location.href='new-delivery.php';" aria-expanded="false" style="margin-right: 20px;"><span class="btn-label"><i class="ti-plus"></i></span>New</button>
                <li role="presentation" class="active">
                  <a id="temptitle" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"></span><span class="hidden-xs"></span><i class="ti-check-box"></i>&nbsp;<?php echo $titlePage?></a>
                </li>
              </ul>
            </h3>
            <div class="tab-content">
              <!-- CATEGORY -->
              <div role="tabpanel" class="tab-pane fade active in" id="job">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                  <div class="panel-body">
                    <div class="row">
                      <div class="table-responsive">
                        <table class="table color-bordered-table muted-bordered-table dataTable display nowrap" id="tblCategories">
                          <thead>
                            <tr>
                              <th>Delivery Code</th>
                              <th>Order ID</th>
                              <th>Customer Name</th>
                              <th style="text-align:right">No. of items</th>
                              <th>Status</th>
                              <th class="removeSort">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                              <?php
                              include "dbconnect.php";
                              $sql = "SELECT * from tbldelivery WHERE deliveryStatus != 'Archived'";
                              $result = mysqli_query($conn, $sql);
                              while ($row = mysqli_fetch_assoc($result))
                              {

                                $delID = str_pad($row['deliveryID'], 6, '0', STR_PAD_LEFT);
                                $delID = "DEL" . $delID;
                                $orderID = getOrderID($row['deliveryID']);
                                $custName = getCustName($row['deliveryID']);
                                $quan = getQuan($row['deliveryID']);
                                  echo('<td>'. $delID .'</td>
                                    <td>'.$orderID.'</td>
                                    <td>'.$custName.'</td>
                                    <td style="text-align:right">'.$quan.'</td>
                                    <td>'.$row['deliveryStatus'].'</td>
                                    ');?>
                                    <td>
                                      <!-- VIEW -->
                                      <!--<button type="button" class="btn btn-success" data-toggle="modal" href="del-form.php" data-remote="del-form.php?oID=<?php echo $row['order_requestID']?>&amd;smth=<?php echo $row['productID'] ?>&amp;id=<?php echo $row['deliveryID']?> #update" data-target="#myModal">Update</button>-->
                                      <button type="button" class="btn btn-success" data-toggle="modal" href="del-form.php" data-remote="del-form.php?id=<?php echo $row['deliveryID']?> #update" data-target="#myModal"><i class="ti-pencil-alt"></i> Update</button>
                                      <button type="button" class="btn btn-danger" data-toggle="modal" href="del-form.php" data-remote="del-form.php?id=<?php echo $row['deliveryID']?> #update" data-target="#myModal"><i class="ti-receipt"></i> Delivery Receipt</button>
                                    </td>
                                    <?php echo ('</tr>');
                                  
                                }
                                function getOrderID($id){
                                  include "dbconnect.php";
                                  $sql = "SELECT * FROM tbldelivery d, tbldelivery_details c , tblorders a, tblorder_request b WHERE c.del_orderReqID = b.order_requestID and b.tblOrdersID = a.orderID and d.deliveryID = c.del_deliveryID and d.deliveryID = '$id';";
                                  $res = mysqli_query($conn,$sql);
                                  $row = mysqli_fetch_assoc($res);
                                  $oID = str_pad($row['orderID'], 6, '0', STR_PAD_LEFT);
                                  return $oID;
                                }
                                function getCustName($id){
                                  include "dbconnect.php";
                                  $name = "";
                                  $sql = "SELECT * FROM tbldelivery d, tbldelivery_details c , tblorders a, tblorder_request b, tblcustomer e WHERE c.del_orderReqID = b.order_requestID and b.tblOrdersID = a.orderID and d.deliveryID = c.del_deliveryID and a.custOrderID=e.customerID and d.deliveryID = '$id';";
                                  $res = mysqli_query($conn,$sql);
                                  $row = mysqli_fetch_assoc($res);
                                  $name = $row['customerLastName'].' '.$row['customerFirstName'].' '.$row['customerMiddleName'];
                                  return $name;
                                }
                                function getQuan($id){
                                  include "dbconnect.php";
                                  $quan = 0;
                                  $sql = "SELECT * FROM tbldelivery d, tbldelivery_details c , tblorders a, tblorder_request b WHERE c.del_orderReqID = b.order_requestID and b.tblOrdersID = a.orderID and d.deliveryID = c.del_deliveryID and d.deliveryID = '$id';";
                                  $res = mysqli_query($conn,$sql);
                                  while($row = mysqli_fetch_assoc($res)){
                                    $quan += $row['del_quantity'];
                                  }
                                  return $quan;
                                }
                              ?>
                            
                            <script type="text/javascript">
                              function confirmDelete(id) {
                               window.location.href="delete-modeofpayment.php?id="+id+"";
                             }
                             function edit(id){
                              window.location.href="update-modeofpayment.php?id="+id+"";
                            }
                          </script>
                        </tbody>
                      </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
<!-- New Framework Mo
  <!-- /.modal -->
</div>
</div>  
</div>
</div>
<!-- /.container-fluid -->
<!--footer class="footer text-center"> 2017 &copy; Filipiniana Furniture </footer-->
</div>
<!-- /#page-wrapper -->
</div>

<div id="myModal" class="modal fade" role="dialog " aria-hidden="true" style="display: none;" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal content-->
      <div class="modal-content clearable-content">
        <div class="modal-body">

        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on('hidden.bs.modal', function (e) {
    var target = $(e.target);
    target.removeData('bs.modal')
    .find(".clearable-content").html('');
  });
</script>
</body>
</html>