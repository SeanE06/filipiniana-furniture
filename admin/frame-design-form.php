<?php

session_start();
if(isset($GET['id'])){
  $jsID = $_GET['id']; 
}
$jsID=$_GET['id'];

$_SESSION['varname'] = $jsID;
include 'dbconnect.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
<!-- New Framework Design Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="newFrameworkDesignModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="new">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="modalProduct">New Design</h3>
      </div>
      <div class="modal-body">
        <div class="descriptions">
          <form action="add-frame-design.php" method = "post">
            <div class="form-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Name</label><span id="x" style="color:red"> *</span>
                    <input type="text" id="frameDesignName" class="form-control" name="name" required/><span id="frameDesignNameValidate"></span> </div>
                  </div>
                </div>
                <label class="box-title">Description</label>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group">
                      <textarea class="form-control" rows="4" name="desc"> </textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer"><span id="notif" style="color:red"></span>
                <button type="submit" class="btn btn-success waves-effect text-left" id="saveBtn" disabled=""><i class="fa fa-check"></i> Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              </div>								  
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.modal -->
  <!-- Update Framework Design Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="updateFrameworkDesignModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="update">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title" id="modalProduct">Update Design</h3>
        </div>
        <form enctype="multipart/form-data" role="form" action="frame-design-update.php" method="post">
          <div class="modal-body">
            <div class="descriptions">
              <?php
              $tsql = "SELECT * FROM tblframe_design WHERE designID = $jsID";
              $tresult = mysqli_query($conn,$tsql);
              $trow = mysqli_fetch_assoc($tresult);
              ?>

              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label">Name</label><span id="x" style="color:red"> *</span>
                      <input type="text" id="editname" class="form-control" name="name" value="<?php echo $trow['designName']; $_SESSION['tempname'] = $trow['designName'];?>" required/><span id="message"></span> </div>
                    </div>
                  </div>
                  <label class="box-title">Description</label>
                  <div class="row">
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <textarea id="remText" class="form-control" rows="4" name="desc"><?php echo $trow['designDescription'];?></textarea>
                      </div>
                    </div>
                  </div>
                </div> 

              </div>
            </div>
            <div class="modal-footer"><span id="notif" style="color:red"></span>
              <button type="submit" class="btn btn-success waves-effect text-left" id="updateBtn" disabled=""><i class="fa fa-check"></i> Save</button>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            </div>

          </div>
        </form>
      </div>
    </div>
    <!-- /.modal -->

    <!-- Delete Framework Design Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteFrameworkDesignModal" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content" id="delete">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 class="modal-title">Deactivate Design</h3>
          </div>
          <div class="modal-body">
            <h4>Are you sure you want to deactivate this Design?</h4>
          </div>
          <div class="modal-footer">
            <a href="delete-frame-design.php?id=<?php echo $jsID;?>" type="button" role="button" class="btn btn-danger waves-effect text-left">Confirm</a>
            <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>