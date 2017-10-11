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
  <div class="modal fade" tabindex="-1" role="dialog" id="newModeofPaymentModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="new">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title" id="modalProduct">New Mode of Payment</h3>
        </div>
            <form action="add-modeofpayment.php" method="post">
        <div class="modal-body">
          <div class="descriptions">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label">Description</label>
                      <input type="text" id="jobName" class="form-control" placeholder="Description" name="desc">
                    </div>
                  </div>
                </div>
         </div>
         </div>
         </div>

                <div class="modal-footer">
                 <input type="submit" class="btn btn-success waves-effect text-left" value="Save">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               </div>
           </form>
       </div>
     </div>
   </div>
 <!-- /.modal -->
 <!-- Update Mode of Payment Modal -->
 <div class="modal fade" tabindex="-1" role="dialog" id="updateModeofPaymentModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="update">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="modalProduct">Update Mode of Payment</h3>
      </div>
      <form action="modeofpayment-update.php" method="post">
        <div class="modal-body">
          <div class="descriptions">
            <?php
            $tsql = "SELECT * FROM tblmodeofpayment WHERE modeofpaymentID = $jsID";
            $tresult = mysqli_query($conn,$tsql);
            $trow = mysqli_fetch_assoc($tresult);
            ?>
            <div class="form-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Description</label>
                    <input type="text" id="jobName" class="form-control" placeholder="Remarks" name="desc" value="<?php echo $trow['modeofpaymentDesc'];?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-check"></i> Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
    </form>
      </div>
  </div>
</div>
<!-- /.modal -->
<!-- Delete Mode of Payment Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteModeofPaymentModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" id="delete">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title">Delete Mode of Payment</h3>
      </div>
      <div class="modal-body">
        <h4>Are you sure you want to delete this mode of payment?</h4>
      </div>
      <div class="modal-footer">
        <a href="delete-modeofpayment.php?id=<?php echo $jsID;?>" type="button" role="button" class="btn btn-danger waves-effect text-left">Confirm</a>
        <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>