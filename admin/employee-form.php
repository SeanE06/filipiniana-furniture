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
<script type="text/javascript">

</script>
<body>
  <!-- New Employee Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="newEmployeeModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="new">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title" id="modalProduct">New Employee</h3>
        </div>
        <form action="add-employee.php" method = "post">
          <div class="modal-body">
            <div class="descriptions">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label">First name</label><span id="x" style="color:red"> *</span>
                      <input type="text" id="first" class="form-control" name="fn" onkeypress="nonumber()" onkeyup="validateInput('first')" required/><span id="messagefirst"></span></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label">Middle Name</label>
                        <input type="text" id="mid" onkeyup="validateInput('mid')" onkeypress="nonumber()" class="form-control" name="mn"/><span id="messagemid"></span> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label">Last Name</label><span id="x" style="color:red"> *</span>
                        <input type="text" id="last" onkeyup="validateInput('last')" onkeypress="nonumber()" class="form-control" name="ln" required/><span id="messagelast"></span> </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Job</label><span id="x" style="color:red"> *</span>
                        
                          <select class="form-control" multiple="multiple" id="job" data-placeholder="Choose a Job" tabindex="1" name="job[]">
                            <?php
                            $sql = "SELECT * FROM tbljobs order by jobName;";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result))
                            {
                              if($row['jobStatus']=='Listed'){
                                echo('<option value='.$row['jobID'].'>'.$row['jobName'].'</option>');
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div id="jobArray">
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Remarks</label>
                          <textarea class="form-control" id="remarks" name="remarks"></textarea>
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
        <!-- /.modal -->
        <!-- Update Employee Modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="updateEmployeeModal" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" id="update">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="modalProduct">Update Employee</h3>
              </div>
              <form action="employee-update.php" method="post" role="form">
                <div class="modal-body">
                  <div class="descriptions">
                    <?php
                    $tsql = "SELECT * FROM tblemployee WHERE empID = $jsID";
                    $tresult = mysqli_query($conn,$tsql);
                    $trow = mysqli_fetch_assoc($tresult);
                    ?>
                    <div class="form-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">First name</label><span id="x" style="color:red"> *</span>
                            <input type="text" id="editf" class="form-control" name="fn" value="<?php echo $trow['empFirstName']; ?>" onkeyup="validateUpdate('f')" onkeypress="nonumber()" required/><span id="messagef"></span> </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Middle Name</label>
                              <input type="text" onkeyup="validateUpdate('m')" id="editm"  onkeypress="nonumber()" class="form-control" name="mn" value="<?php echo $trow['empMidName']; ?>"/><span id="messagem"></span> 
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Last Name</label><span id="x" style="color:red"> *</span>
                              <input type="text" onkeyup="validateUpdate('l')" onkeypress="nonumber()" id="editl" class="form-control" name="ln" value="<?php echo $trow['empLastName']; ?>" required/><span id="messagel"></span> </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="control-label">Job</label><span id="x" style="color:red"> *</span>
                                <select id="select" multiple="multiple" class="form-control" data-placeholder="Choose a Job" tabindex="1">
                                  <?php
                                  include "dbconnect.php";
                                  $sql1 = "SELECT * from tblemp_job WHERE emp_empID = '$jsID';";
                                  $res = mysqli_query($conn,$sql1);
                                  $jobs = "";
                                  while($jrow = mysqli_fetch_assoc($res)){
                                    if($jrow['emp_jobStatus'] != 'Archived'){
                                    $jobs = $jobs . $jrow['emp_jobDescID'] . ",";
                                    echo $jobs;
                                    }
                                  }
                                  $temp = substr(trim($jobs), 0, -1);
                                  $jobs = explode(',',$temp);

                                  $sql = "SELECT * FROM tbljobs order by jobName;";
                                  $result = mysqli_query($conn, $sql);
                                  $cnt = 0;
                                  while ($row = mysqli_fetch_assoc($result))
                                  {
                                    if($row['jobStatus']=='Listed'){
                                      if ($jobs[$cnt] == $row['jobID'])
                                      {
                                        echo('<option value='.$row['jobID'].' selected="selected">'.$row['jobName'].'</option>');
                                        $cnt++;
                                      }
                                      else
                                      {
                                      echo('<option value='.$row['jobID'].'>'.$row['jobName'].'</option>');
                                      }

                                    }
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div id="removedJob">
                          </div>
                          <div id="addedJob">
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="control-label">Remarks</label>
                                <textarea id="remText" class="form-control" name="remarks"><?php echo $trow['empRemarks'];?></textarea>
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
              </div>
              <!-- /.modal -->
              <!-- Delete Employee Modal -->
              <div class="modal fade" tabindex="-1" role="dialog" id="deleteEmployeeModal" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content" id="delete">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 class="modal-title">Deactivate Employee</h3>
                    </div>
                    <div class="modal-body">
                      <h4>Are you sure you want to deactivate this Employee?</h4>
                    </div>
                    <div class="modal-footer">
                      <a href="delete-employee.php?id=<?php echo $jsID;?>" type="button" role="button" class="btn btn-danger waves-effect text-left">Confirm</a>
                      <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>       
            </body>
            </html>