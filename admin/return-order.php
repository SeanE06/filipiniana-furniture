<?php
include "titleHeader.php";
include "menu.php";  
include 'dbconnect.php';

if (isset($_GET['actionSuccess']))
{
  echo  '<script>';
  echo '$(document).ready(function () {';
    echo 'document.getElementById("actionSuccess").click();';
    echo '});';
echo '</script>';
}
else if (isset($_GET['actionFailed']))
{
  echo  '<script>';
  echo '$(document).ready(function () {';
    echo 'document.getElementById("actionFailed").click();';
    echo '});';
echo '</script>';
}

?>
<!DOCTYPE html>  
<html lang="en">
<head>
</head>
<body>
  <button class="tst5" id="actionFailed" style="display: none;"></button>
  <button class="tst6" id="actionSuccess" style="display: none;"></button>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="panel panel-info">
            <h3>
              <ul class="nav customtab2 nav-tabs" role="tablist">
                <button id="tempbtn" class="btn btn-lg btn-info pull-right" onclick="location.href='new-return.php';" aria-expanded="false" style="margin-right: 20px;"><span class="btn-label"><i class="ti-plus"></i></span>New</button>
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
                      <h2>List of Returned Furnitures</h2>
                      <div class="table-responsive">
                        <table class="table color-bordered-table muted-bordered-table dataTable display nowrap" id="tblCategories">
                          <thead>
                            <tr>
                              <th>Reference Order ID</th>
                              <th>Customer Name</th>
                              <th>Reason</th>
                              <th>Assessment</th>
                              <th>Status</th>
                              <th class="removeSort">Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            include "dbconnect.php";
                            $sql = "SELECT * from tblorder_return WHERE returnStatus != 'Archived'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result))
                            {
                              $orderID = getOrderID($row['returnID']);
                              $custName = getCustName($row['returnID']);
                              $quan = getQuan($row['returnID']);
                              echo('<td>'.$orderID.'</td>
                                <td>'.$custName.'</td>
                                <td>'.$row['returnReason'].'</td>
                                <td>'.$row['returnAssessment'].'</td>'
                                );
                              if($row['returnStatus']=='Pending'){
                                echo '<td><div class="progress progress-lg" style="border-radius:20px;">
                                  <h3 class="progress-bar progress-bar-warning active progress-bar-striped" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; font-family:system-ui;" role="progressbar"><p style="margin:6px;">'.$row['returnStatus'].'</p></h3>
                                </div></td>';
                              }
                              if($row['returnStatus']=='Production Ongoing'){
                                echo '<td><div class="progress progress-lg" style="border-radius:20px;">
                                  <h3 class="progress-bar progress-bar-warning active progress-bar-striped" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; font-family:system-ui;" role="progressbar"><p style="margin:6px;">'.$row['returnStatus'].'</p></h3>
                                </div></td>';
                              }
                              if($row['returnStatus']=='Start Delivery'){
                                echo '<td><div class="progress progress-lg">
                                  <h3 class="progress-bar progress-bar-success active progress-bar-striped" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; font-family:system-ui;" role="progressbar"><p style="margin:6px;">'.$row['returnStatus'].'</p></h3>
                                </div></td>';
                              }
                              if($row['returnStatus']=='Cancelled'){
                                echo '<td><div class="progress progress-lg">
                                  <h3 class="progress-bar progress-bar-danger active progress-bar-striped" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; font-family:system-ui;" role="progressbar"><p style="margin:6px;">'.$row['returnStatus'].'</p></h3>
                                </div></td>';
                              }
                              ?>
                              <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" href="del-form.php" data-remote="return-form.php?id=<?php echo $row['returnID']?> #update" data-target="#myModal"><i class="ti-pencil-alt"></i> Update</button>
                              </td>
                              <?php echo ('</tr>');

                            }
                            function getOrderID($id){
                              include "dbconnect.php";
                              $sql = "SELECT * FROM tblorder_return c, tblorders a, tblorder_request b WHERE c.tblorderReqID = b.order_requestID and b.tblOrdersID = a.orderID and c.returnID = '$id';";
                              $res = mysqli_query($conn,$sql);
                              $row = mysqli_fetch_assoc($res);
                              $oID = str_pad($row['orderID'], 6, '0', STR_PAD_LEFT);
                              $oID = "OR" . $oID;
                              return $oID;
                            }
                            function getCustName($id){
                              include "dbconnect.php";
                              $name = "";
                              $sql = "SELECT * FROM tblorder_return c, tblorders a, tblorder_request b,tblcustomer d WHERE c.tblorderReqID = b.order_requestID and b.tblOrdersID = a.orderID and c.returnID = '$id' and d.customerID = a.custOrderID;";
                              $res = mysqli_query($conn,$sql);
                              $row = mysqli_fetch_assoc($res);
                              $name = $row['customerLastName'].' '.$row['customerFirstName'].' '.$row['customerMiddleName'];
                              return $name;
                            }
                            function getQuan($id){
                              include "dbconnect.php";
                              $quan = 0;
                              $sql = "SELECT * FROM tbldelivery d, tblrelease_details c , tblorders a, tblorder_request b WHERE c.rel_orderReqID = b.order_requestID and b.tblOrdersID = a.orderID and d.deliveryID = c.rel_detailsID and d.deliveryID = '$id';";
                              $res = mysqli_query($conn,$sql);
                              while($row = mysqli_fetch_assoc($res)){
                                $quan += $row['rel_quantity'];
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