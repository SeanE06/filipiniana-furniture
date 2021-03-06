<?php
$activePage = basename($_SERVER['PHP_SELF'],".php");
include "menu.php";
//session_start();

$jsID = 0;
if(isset($_GET['id'])){
  $jsID = $_GET['id']; 
}

$notifID = 0;
if(isset($_GET['notif'])){
  $notifID = $_GET['notif']; 
}
//$_SESSION['varname'] = 3;
include 'dbconnect.php';
?>
<!DOCTYPE html>  
<html lang="en">
<head>
 <script>
 $(document).ready(function(){
  $("#check").hide();
  $("#mop").on('change',function(){
    var val = $("#mop").val();
    if(val==1){
      $("#check").hide();
      $("#cash").show();
      $("#cNum").val("");
      $("#cAmount").val("");
    }
    else if(val==2){
      $("#cash").hide();
      $("#check").show();
      $("#aTendered").val("");
        //$("#dChange").val("0");
      }
    });
});

 $(document).ready(function(){
  $('#aTendered').on('keyup',function(){
    var mat = $("#aTendered").val();
    var bal = $("#balance").val();
    if(isNaN(mat)){
      var e = "Please input a valid number.";
      $("#error").html(e);
      $('#aTendered').css('border-color','red');
      $('#saveBtn').prop('disabled',true);
    }
    else if(mat<0){
      var e = "Numbers less than 0 are not allowed";
      $("#error").html(e);
      $('#aTendered').css('border-color','red');
      $('#saveBtn').prop('disabled',true);
    }
    else if(mat==""){
      var e = "";
      var change = 0.00;
      $("#dChange").val(change);
      $("#error").html(e);
      $('#aTendered').css('border-color','gray');
      $('#saveBtn').prop('disabled',true);
    }
    else{
      var e = "";
      var change = mat - bal;
      var change = change + ".00";
      $("#dChange").val(change);
      $("#error").html(e);
      $('#aTendered').css('border-color','gray');
      $('#saveBtn').prop('disabled',false);
      
    }

        /*
          if(mat>bal){ //if may malaki diba? hahaha
            var e = "";
            var e = "Please input a valid number.";
            $("#error").html(e);
            $('#aTendered').css('border-color','red');
            $('#saveBtn').prop('disabled',true);
          }*/

        });
});

$(document).ready(function(){
  $('#cNum').on('keyup',function(){
    var mat = $("#cNum").val();
    if(isNaN(mat)){
      var e = "Please input a valid number.";
      $("#cNumError").html(e);
      $('#cNum').css('border-color','red');
      $('#saveBtn').prop('disabled',true);
    }
    else if(mat<0){
      var e = "Numbers less than 0 are not allowed";
      $("#cNumError").html(e);
      $('#cNum').css('border-color','red');
      $('#saveBtn').prop('disabled',true);
    }
    else{
      var e = "";
      $("#cNumError").html(e);
      $('#cNum').css('border-color','gray');
      $('#saveBtn').prop('disabled',false);
    }

  });
});

$(document).ready(function(){
  $('#cAmount').on('keyup',function(){
    var mat = $("#cAmount").val();
    if(isNaN(mat)){
      var e = "Please input a valid number.";
      $("#cAmountError").html(e);
      $('#cAmount').css('border-color','red');
      $('#saveBtn').prop('disabled',true);
    }
    else if(mat<0){
      var e = "Numbers less than 0 are not allowed";
      $("#cAmountError").html(e);
      $('#cAmount').css('border-color','red');
      $('#saveBtn').prop('disabled',true);
    }
    else{
      var e = "";
      $("#cAmountError").html(e);
      $('#cAmount').css('border-color','gray');
      $('#saveBtn').prop('disabled',false);
    }

  });
});

</script>
<title>Order Payment</title>
<link rel="icon" type="image/x-icon" sizes="16x16" href="plugins/logo/favicon.ico">
</head>
<body class ="fix-header fix-sidebar">
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="panel panel-info">
            <h3>
              <ul class="nav customtab2 nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a aria-controls="proorders" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"><i class="ti-receipt"></i> Confirm Payment</span></a>
                </li>
              </ul>
            </h3>
            <div class="tab-content">
              <!-- CATEGORY -->
              <div role="tabpanel" class="tab-pane fade active in">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                  <div class="panel-body">
                    <form action="payment-proof-confirm.php" method = "post">
                      <input type="hidden" name="orderID" id="orderID" value="<?php echo $jsID?>">
                      <input type="hidden" name="notifID" id="notifID" value="<?php echo $notifID?>">
                      <div class="row" style="margin-top: -30px;">
                        <div class="col-md-8">


                          <div class="row">
                            <h2 style="font-family: inherit; font-weight: bolder;">PROOF OF PAYMENT</h2>
                            <?php
                            include "dbconnect.php";
                            $sql = "SELECT * FROM tblnotification a, tblorders b, tblcustomer c WHERE b.orderID = a.tblorderID and a.tblcustomerID = c.customerID and a.id='$notifID';";
                            $res = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($res);
                            ?>
                            <div class="col-md-5">
                              <table class="table product-overview">
                                <tr>
                                  <td><b>Customer Name</b></td>
                                  <td><?php echo $row['customerLastName'].','.$row['customerFirstName'].'  '.$row['customerMiddleName']?></td>
                                </tr>
                                <tr>
                                  <td><b>Date Paid</b></td>
                                  <td><?php echo $row['datePaid']?></td>
                                </tr>
                                <tr>
                                  <td><b>Amount Paid</b></td>
                                  <td>Php <?php echo $row['amountPaid']?></td>
                                </tr>
                              </table>
                            </div>
                            <div class="col-md-7">
                              <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="white-box text-center"> 
                                  <img src="../user/pics/paymentproof/<?php echo $row['proofPicture']?>" alt="Unavailable" class="img-responsive" width="250px" length="300px"> 
                                </div>
                              </div>

                            </div>
                          </div>
                          <h2 style="font-family: inherit; font-weight: bolder;">ORDERS</h2>
                          <div class="table-responsive">
                            <table class="table product-overview" id="cartTbl">
                              <thead>
                                <th style="text-align:left">Furniture Name</th>
                                <th style="text-align:left">Furniture Description</th>
                                <th style="text-align:right;">Unit Price</th>
                                <th style="text-align:right;">Quantity</th>
                                <th style="text-align:right;">Total Price</th>
                              </thead>
                              <tbody>
                                <?php
                                include "dbconnect.php";
                                $tQuan = 0;
                                $tPrice = 0;

                                $sql1 = "SELECT * FROM tblorder_request a, tblorders b, tblproduct c WHERE c.productID = a.orderProductID and b.orderID = a.tblOrdersID and b.orderID = '$jsID'";
                                $res = mysqli_query($conn,$sql1);
                                while($row = mysqli_fetch_assoc($res)){
                                  echo '<tr>
                                  <td>'.$row['productName'].'</td>
                                  <td>'.$row['productDescription'].'</td>
                                  <td style="text-align:right;">&#8369; '.number_format($row['productPrice'],2).'</td>
                                  <td style="text-align:right;">'.$row['orderQuantity'].'</td>';
                                  $tPrice = $row['orderQuantity'] * $row['productPrice'];
                                  $tPrice =  number_format($tPrice,2);
                                  echo '<td style="text-align:right;">&#8369; '.$tPrice.'</td></tr>';
                                  $tPrice = $row['orderPrice'];
                                  $tQuan = $tQuan + $row['orderQuantity'];
                                }
                                ?>
                              </tbody>
                              <tfoot style="text-align:right;">
                                <td></td>
                                <td colspan="2" style="text-align:right;"><i class="fa fa-caret-right text-info"></i><b> GRAND TOTAL</b></td>
                                <td id="totalQ" style="text-align:right;"><mark><strong><span><?php echo $tQuan?></span></bold></mark></td>
                                <td id="totalPrice" style="text-align:right;"><mark><strong><span>&#8369;&nbsp;<?php echo number_format($tPrice,2)?></span></strong></mark></td>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                        <div class="col-md-4"> 
                          <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body blue-gradient">
                              <h2 style="text-align:center; font-family: inherit; font-weight: bolder;">PAYMENT</h2>
                              <?php
                              $down = 0;
                              $bal = 0;
                              $sql = "SELECT * FROM tblinvoicedetails a, tblpayment_details b, tblorders c, tblmodeofpayment d WHERE c.orderID = a.invorderID and d.modeofpaymentID = b.mopID and a.invoiceID = b.invID and c.orderID = '$jsID'";
                              $res = mysqli_query($conn,$sql);
                              $tpay = 0;
                              while($trow = mysqli_fetch_assoc($res)){
                                $date = date_create($trow['dateCreated']);
                                $date = date_format($date,"F d, Y");
                                $tpay = $tpay + $trow['amountPaid'];
                              }
                              $down = $tpay;
                              $bal = $tPrice - $down;
                              ?>
                              <h4 style="font-weight: bolder;">Amount Due <span class="pull-right" id="sideAmountDue" style="color: #e50000"> &#8369; <?php echo number_format($bal,2)?></span></h4>
                              <hr>
                              <label class="control-label" style="font-weight: bolder;">Mode of Payment:</label>
                              <select class="form-control" data-placeholder="Add Payment" tabindex="1" name="mop" id="mop">
                               <?php
                               $delsql = "SELECT * FROM tblmodeofpayment;";
                               $delresult = mysqli_query($conn,$delsql);
                               while($delrow = mysqli_fetch_assoc($delresult)){
                                echo('<option value="'.$delrow['modeofpaymentID'].'" selected>'.$delrow['modeofpaymentDesc'].'</option>');
                              }
                              ?>
                            </select>
                            <hr>
                            <input type="hidden" id="balance" value="<?php echo $bal?>">
                            <div id="cash">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" style="font-weight: bolder;">Amount Paid</label><span id="x" style="color:red"> *</span>
                                    <input type="text" style="text-align:right;" id="aTendered" class="form-control" name="aTendered"/>
                                    <p id="error"></p>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div id="check">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" style="font-weight: bolder;">Check Number</label><span id="x" style="color:red"> *</span>
                                    <input type="text" style="text-align:right;" id="cNum" class="form-control" name="cNumber"/>
                                    <p id="cNumError"></p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" style="font-weight: bolder;">Amount</label><span id="x" style="color:red"> *</span>
                                    <input type="text" id="cAmount" style="text-align:right;" class="form-control" name="cAmount"/> 
                                    <p id="cAmountError"></p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" style="font-weight: bolder;">Remarks</label>
                                    <textarea style="text-align:right;" class="form-control" name="remarks"></textarea> 
                                    <p id="cAmountError"></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin:10px">
                              <button data-wizard="finish" type="submit" class="btn btn-success waves-effect pull-right" id="saveBtn" disabled><i class="ti-check"></i> Save</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
    <!-- /.container-fluid -->
    <!--footer class="footer text-center"> 2017 &copy; Filipiniana Furniture </footer-->
  </div>
  <!-- /#page-wrapper -->
</div>
</body> 
</html>