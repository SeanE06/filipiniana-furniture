<?php
include "titleHeader.php";
include "menu.php";
//session_start();
/*if(isset($GET['id'])){
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

<script>
$(document).ready(function(){
    $('#frequency').change(function(){
      var value = $("#frequency").val();
      $.ajax({
        type: 'post',
        url: 'reports-drop.php',
        data: {
          id: value,
        },
        success: function (response) {
          $( '#range' ).html(response);
        }
      });

      

    });//end change

    $("#gen").on('click',function(){
      //alert("BOO YAH LALALALALALAL HAPPINESS!!!");
      var value = $("#frequency").val();
      if(value==1){
        var date = $("#dateRep").val();
        $.ajax({
        type: 'post',
        url: 'sales-output.php',
        data: {
          id: value, d: date,
        },
        success: function (response) {
          $( '#reportsOut' ).html(response);
        }
      });
      }

      if(value==2){
        var m = $("#month").val();
        var y = $("#year").val();
        $.ajax({
        type: 'post',
        url: 'sales-output.php',
        data: {
          id: value, m: m, y:y,
        },
        success: function (response) {
          $( '#reportsOut' ).html(response);
        }
      });
      }

      if(value==3){
        var y = $("#year").val();
        $.ajax({
        type: 'post',
        url: 'sales-output.php',
        data: {
          id: value, y : y,
        },
        success: function (response) {
          $( '#reportsOut' ).html(response);
        }
      });
      }

    });
  });
  </script>
  <script src="plugins/bower_components/Chart.js/Chart.js"></script>
  <script src="plugins/bower_components/Chart.js/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js" ></script>


</head>
<body>
  <!-- Preloader -->
<!--div class="preloader">
<div class="cssload-speeding-wheel"></div>
</div-->
<!-- Toast Notification -->
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
              <li role="presentation" class="active" >
                <a id="temptitle" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"></span><span class="hidden-xs"></span><i class="ti-bar-chart"></i>&nbsp;<?php echo $titlePage?></a>
              </li>
            </ul>
          </h3>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="fabrics">
              <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                  <div class="row"> <!--LABELS-->
                    <div class="col-md-3">
                      <label class="control-label">FREQUENCY</label>
                    </div>
                    <div class="col-md-3">
                      <label class="control-label" id="lblrange">DATE</label>
                    </div>
                    <div class="col-md-4">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <select id="frequency" style="height:40px;" class="form-control" data-placeholder="Choose Category" tabindex="1" name="frequency"> 
                        <option value="1">Daily</option>
                        <option value="2">Monthly</option>
                        <option value="3">Annually</option>
                      </select>
                    </div>
                    <div id="range">
                    <div class="col-md-3">
                      <input type="date" id="dateRep" name ="dateRep" class="form-control" required/>
                      

                    </div>
                  </div>
                    <div class="col-md-3">
                      <button type="button" id="gen" class="btn btn-success waves-effect text-left"><i class="fa fa-check"></i>&nbsp;Generate</button>
                    </div>
                    <br><br>
                      <div class="sttabs tabs-style-flip" style="margin-top: 40px;">
                    <nav>
                      <ul>
                        <li><h3><a href="#myChart" class="ti-layout"><span> Table View</span></a></h3></li>
                        <li><h3><a href="#myTable" class="ti-bar-chart"><span> Chart View</span></a></h3></li>
                      </ul>
                    </nav>
                    <div class="content-wrap text-center" style="margin-top: -10px;">
                    <section id="myTable">
                        <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="barchart">
                          <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                          <div class="row" id="reportsOut">
                            <div class="table-responsive"> 
                              <table class="table color-bordered-table muted-bordered-table display" id="reportsTable">
                                <thead>
                                  <tr>
                                    <th style="text-align: left;">Order ID</th>
                                    <th style="text-align: left;">Customer Name</th>
                                    <th style="text-align: left;">Amount Due</th>
                                    <th style="text-align: left;">Amount Paid</th>
                                    <th style="text-align: left;">Remaining Balance</th>
                                  </tr>
                                </thead>
                                <tbody style="text-align: left;">

                                </tbody>
                              </table>
                            </div>
                          </div>
                          </div>
                          </div>
                          </div>
                        </div>
                    </section>
                    <section >
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="barchart">
                          <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                              <div class="row" id="reportsChart">
                                <div class="col-md-6">
                                <h2>BAR GRAPH</h2>
                                <canvas id="myChart" width="400" height="300" style="width: 100px; height: 100px;"></canvas>
                                </div>
                                <div class="col-md-6">
                                <h2>PIE GRAPH</h2>
                                <canvas id="my2ndChart" width="400" height="300" style="width: 100px; height: 100px;"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    </div>
                    </div>
                      </div>
                  </div>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
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
<script type="text/javascript">
var ctx = document.getElementById("myChart").getContext('2d');
var ctx2 = document.getElementById("my2ndChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
      responsive: false
    }
});
var my2ndChart = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
      responsive: false
    }
});

</script>

</body>
</html>