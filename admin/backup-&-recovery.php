<?php
include "titleHeader.php";
include "menu.php";
include 'dbconnect.php';
include 'toastr-buttons.php';

if (!empty($_SESSION['createSuccess'])) {
  echo  '<script>
          $(document).ready(function () {
            $("#toastNewSuccess").click();
          });
        </script>';
  unset($_SESSION['createSuccess']);
}
if (!empty($_SESSION['updateSuccess'])) {
  echo  '<script>
          $(document).ready(function () {
            $("#toastUpdateSuccess").click();
          });
        </script>';
  unset($_SESSION['updateSuccess']);
}
if (!empty($_SESSION['deactivateSuccess'])) {
  echo  '<script>
          $(document).ready(function () {
            $("#toastDeactivateSuccess").click();
          });
        </script>';
  unset($_SESSION['deactivateSuccess']);
}
if (!empty($_SESSION['reactivateSuccess'])) {
  echo  '<script>
          $(document).ready(function () {
            $("#toastReactivateSuccess").click();
          });
        </script>';
  unset($_SESSION['reactivateSuccess']);
}
if (!empty($_SESSION['actionFailed'])) {
  echo  '<script>
          $(document).ready(function () {
            $("#toastFailed").click();
          });
        </script>';
  unset($_SESSION['actionFailed']);
}

?>
<!DOCTYPE html>  
<html lang="en">
<head>
  <script>
  function checkOnlyOne(b){

  var x = document.getElementsByClassName('daychecks');
  var i;

  for (i = 0; i < x.length; i++) {
    if(x[i].value != b) x[i].checked = false;
  }
  }

  $(document).ready(function(){
  $("#automatic").hide();
  $('#aut').change(function(){
    if($(this).prop("checked")) {
      $('#automatic').show();
      $("#manual").hide();
    }
  });
  $('#man').change(function(){
    if($(this).prop("checked")) {
      $('#manual').show();
      $("#automatic").hide();
    }
  });
});
  </script>
</head>
<body>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
          <div class="panel panel-info">
            <h3>
              <ul class="nav customtab2 nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"></span><i class="ti-wand"></i>&nbsp;<?php echo $titlePage?></a>
                </li>
              </ul>
            </h3>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="default-downpayment">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                  <div class="panel-body">
                <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="text-align:center;">
                     <label class="control-label">Select Database Backup & Recovery Option</label>
                      <br>
                      <input class="daychecks" onclick="checkOnlyOne(this.value);" type="radio" name="reoccur_weekday" value="Manual" id="man" checked/>Manual&nbsp;&nbsp;&nbsp;
                      <input class="daychecks" onclick="checkOnlyOne(this.value);" type="radio" name="reoccur_weekday" value="Automatic" id="aut" />Automatic&nbsp;&nbsp;&nbsp;
                  </div>
                </div>

                <div id = "automatic">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="text-align:center;">
                      <label class="control-label">Backup Time Frequency</label>
                      <br>
                      <select name="backup">
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                      </select>
                     </div>
                  </div>
                </div>
                <div class="row">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-success" onclick="setTimeout(function() { alert('Backup Settings Successfully Saved!'); }, 800);" href="javascript:void(0)"><i class="ti-check"></i> Save</button>
                  </div>
                </div>
              </div>
                 <div id = "manual">
                  <div class="row">
                    <div class="col-md-7 pull-right" style="margin-right:30px;">
                      <form action="../database/myphp-backup.php" target="_blank" method="get">
                        <button type="submit" class="btn btn-success"><i class="ti-back-right"></i> Backup Now</button>
                      </form>
                      <br>
                      <form action="../database/myphp-restore.php" target="_blank" method="get">
                        <button type="submit" class="btn btn-success"><i class="ti-back-left"></i> Restore Now</button>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
    <!--footer class="footer text-center"> 2017 &copy; Filipiniana Furniture </footer-->
  </div>
</div>
</body>
</html>