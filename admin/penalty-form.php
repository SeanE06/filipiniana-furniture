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
<!-- New Penalty Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="newPenaltyModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="new">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="modalProduct">New Penalty</h3>
      </div>
      <form action="add-Penalty.php" method = "post">
        <div class="modal-body">
          <div class="descriptions">
            <div class="form-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Name</label><span id="x" style="color:red">*</span>
                    <input type="text" id="username" class="form-control" name="name" required/><span id="message"></span> </div>
                  </div>
                </div>
                <div class="row">
                    <input type="hidden" id="rate" name="type" value="Amount"/>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label">Rate</label><br><span id="x" style="color:red">*</span>
                        <input type="number" class="form-control" step="1.00" id="rate" name="rate" placeholder="0.00" style="text-align: right;" required/>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label">Remarks</label>
                        <input type="text" id="firstName" class="form-control" name="remarks"/> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect text-left" id="addFab" disabled=""><i class="fa fa-check"></i> Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              </div> 
            </form>
          </div>
        </div>
      </div>
      <!-- /.modal -->
      <!-- Update Penalty Modal -->
      <div class="modal fade" tabindex="-1" role="dialog" id="updatePenaltyModal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" id="update">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 class="modal-title" id="modalProduct">Update Penalty</h3>
            </div>
            <form action="penalty-update.php" method="post">
              <div class="modal-body">
                <div class="descriptions">
                  <?php
                  $tsql = "SELECT * FROM tblpenalty WHERE penaltyID = $jsID";
                  $tresult = mysqli_query($conn,$tsql);
                  $trow = mysqli_fetch_assoc($tresult);
                  ?>

                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Name</label><span id="x" style="color:red">*</span>
                          <input type="text" id="editname" class="form-control" name="name" value="<?php echo $trow['penaltyName']; $_SESSION['tempname'] = $trow['penaltyName'];?>" required/><span id="message"></span> </div>
                        </div>
                      </div>
                      <div class="row">
                          <input id="rem" type="hidden" name="type" value="Amount"/>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Rate</label><span id="x" style="color:red">*</span><br>
                              <input id="remText" type="number" class="form-control" step="1.00" name="rate" placeholder="0.00" style="text-align: right;" value="<?php echo $trow['penaltyRate'];?>"  required/>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Remarks</label>
                              <input type="text" id="remText" class="form-control" name="remarks" value="<?php echo $trow['penaltyRemarks'];?>"/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left" id="updateBtn" disabled=""><i class="fa fa-check"></i> Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.modal -->
            <!-- Delete Penalty Modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="deletePenaltyModal" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content" id="delete">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title">Delete Penalty</h3>
                  </div>
                  <div class="modal-body">
                    <h4>Are you sure you want to delete this penalty?</h4>
                  </div>
                  <div class="modal-footer">
                    <a href="delete-penalty.php?id=<?php echo $jsID;?>" type="button" role="button" class="btn btn-danger waves-effect text-left">Confirm</a>
                    <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>