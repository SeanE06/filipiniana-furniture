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
<!-- New Framework Material Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="newFrameworkMaterialModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="new">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="modalProduct">New Material</h3>
      </div>
      <form action="material-add.php" method = "post">
        <div class="modal-body">
          <div class="descriptions">
            <div class="form-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Name</label><span id="x" style="color:red"> *</span>
                    <input type="text" id="username" class="form-control" name="name" required /><span id="message"></span> </div>
                  </div>
                </div>
                <label class="box-title">Variant Attributes(Ex.Type, Color, Pattern)</label><span id="x" style="color:red"> *</span>
                
                <div class="form-group">
                <div id="tags" class="col-md-12">
                  <input type="text" value="" placeholder="Add a tag" />
                </div>
              </div>

                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group">
                      <textarea class="form-control" rows="4" name="attribs" placeholder="Ex. Size, Color, Design"></textarea>
                    </div>
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
<!-- /.modal 
  <!-- Update Framework Material Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="updateFrameworkMaterialModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="update">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title" id="modalProduct">Update Material</h3>
        </div>
        <form enctype="multipart/form-data" role="form" action="material-update.php" method="post">
          <div class="modal-body">
            <div class="descriptions">
              <?php
              $tsql = "SELECT * FROM tblmaterials WHERE materialID = $jsID";
              $tresult = mysqli_query($conn,$tsql);
              $trow = mysqli_fetch_assoc($tresult);
              ?>

              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label">Name</label><span id="x" style="color:red"> *</span>
                      <input type="text" id="username" class="form-control" name="name" value="<?php echo $trow['materialName']; $_SESSION['tempname'] =$trow['materialName'];?>"required /><span id="message"></span> </div>
                    </div>
                  </div>
                  <label class="box-title">Variant Attributes(Ex.Type, Color, Pattern)</label><span id="x" style="color:red"> *</span>
                  <div class="row">
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <textarea class="form-control" rows="4" name="attribs" placeholder="Ex. Color, Design,Type"><?php echo $trow['materialVarAttribs'];?></textarea>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success waves-effect text-left" id="addFab" disabled=""><i class="fa fa-check"></i> Save</button>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            </div>

          </div>
        </form>
      </div>
    </div>
    <!-- /.modal -->

    <!-- Delete Framework Material Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteFrameworkMaterialModal" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content" id="delete">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 class="modal-title">Deactivate Material</h3>
          </div>
          <div class="modal-body">
            <h4>Are you sure you want to deactivate this Material?</h4>
          </div>
          <div class="modal-footer">
            <a href="material-delete.php?id=<?php echo $jsID;?>" type="button" role="button" class="btn btn-danger waves-effect text-left">Confirm</a>
            <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>