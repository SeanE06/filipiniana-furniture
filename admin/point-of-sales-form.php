<?php
include "menu.php";
include 'dbconnect.php';
session_start();
if(isset($GET['id'])){
  $jsID = $_GET['id']; 
}
$jsID=$_GET['id'];

$_SESSION['varname'] = $jsID;
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE>
<html>
<head>
</head>
<body>
  <!-- New Customer Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="newCustomerModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="newCustomer">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title" id="modalProduct">New Customer</h3>
          <h7 class="modal-title" id="modalProduct"><span id="x" style="color:red"> *</span> - this fields are Required.</h7> 
        </div>
        <div class="modal-body">
          <div class="descriptions">

            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">First Name:</label><span id="x" style="color:red"> *</span>
                    <input type="text" id="edit1" class="form-control" onkeyup="inputValidate('1')" name="newfirstn" required/><span id="message1"></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Middle Name:</label>
                    <input type="text" id="edit2" class="form-control" onkeyup="inputValidate('2')" name="newmidn"/><span id="message2"></span> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="hidden" name="customerIds" id="customerIds">
                    <label class="control-label">Last Name:</label><span id="x" style="color:red"> *</span>
                    <input type="text" id="edit3" class="form-control" onkeyup="inputValidate('3')" name="newlastn" value="" required/><span id="message3"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Address</label><span id="x" style="color:red"> *</span>
                    <input type="text" id="edit4" class="form-control" onkeyup="inputValidate('4')" name="newcustoadd" required/><span id="message4"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Contact number</label><span id="x" style="color:red"> *</span>
                    <input type="text" data-mask="+63 (999) 999-9999" id="edit5" class="form-control" name="newcustocont" required/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Email</label><span id="x" style="color:red"> *</span>
                    <input type="email" id="edit6" class="form-control" onkeyup="validate('6')" name="newcustoemail" required/><span id="message6"></span> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal-footer">
          <h4 id='msg'></h4>
          <button type="button" class="btn btn-success waves-effect text-left" id="saveCustBtn" onclick="addnewCust()" disabled><i class="fa fa-check"></i> Done</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
</div>
<!-- /.modal -->
<!-- Add Payment Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addPaymentModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="addPayment">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="modalProduct">Payment</h3>
      </div>
      <form action="job-update.php" method="post">
        <div class="modal-body">
          <div class="descriptions">
            <div class="form-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">


                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success waves-effect text-left" id="updateBtn" disabled><i class="fa fa-check"></i> Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
      </div>
    </div>

  </div>
</div>
<!-- /.modal -->
</body>
</html>