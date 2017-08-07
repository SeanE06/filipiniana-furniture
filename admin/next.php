<?php
$activePage = basename($_SERVER['PHP_SELF'],".php");
include "menu.php";
//session_start();
/*
if(isset($_GET['customerId'])){
$jsID = $_GET['customId']; 
}*/
//$_SESSION['varname'] = 3;
include 'dbconnect.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>  
<html lang="en">
<head>
  <script>
  $(document).ready(function(){

    $("#selectCust").hide();
    $("#existCust").on('change',function(){
      if($(this).prop("checked")){
        $("#selectCust").show();
      }
      else{
        $("#selectCust").hide();
      }
    });
  });

  </script>
  <title>Check-Out</title>
  <link rel="icon" type="image/x-icon" sizes="16x16" href="plugins/images/favicon.ico">
</head>
<body class ="fix-header fix-sidebar">
  <!-- Preloader -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <h4 class="box-title">
            <h3>
              <ul class="nav customtab2 nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a aria-controls="proorders" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Check-Out</span></a>
                </li>
              </ul>
            </h3>
          </h4>
          <div class="orderconfirm">
            <form action="add-customer.php" method = "post">
              <div class="panel-group wiz-aco" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h3>Customer Information</h3>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      <div class="row">
                        <div class="descriptions">
                          <div class="form-body">
                            <div class="row">
                              <div class="col-md-4">
                                <input type="checkbox" name="existCust" id="existCust" value="existing"/>
                                Existing Customer Information?
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4" id="selectCust">
                                <input type="hidden" id="isBool" name="isBool" value="new">
                                <select id="savedCustomer" style="height:40px;" class="form-control" data-placeholder="Choose Customer Name" tabindex="1" name="customer"> 
                                  <option value="">Choose a Customer</option>
                                  <?php
                                  $sql = "SELECT * FROM tblcustomer ORDER BY customerLastName ASC;";
                                  $result = mysqli_query($conn, $sql);
                                  while ($row = mysqli_fetch_assoc($result))
                                  {
                                    if($row['customerStatus'] != "Archived"){
                                      echo('<option value='.$row['customerID'].'>'.$row['customerLastName'].', '.$row['customerFirstName'].', '.$row['customerMiddleName'].'</option>
                                        ');
                                    }
                                  }
                                  ?>
                                </select>
                              </div>

                              <?php
                              $sql = "SELECT * FROM tblcustomer;";
                              $result = mysqli_query($conn, $sql);
                              while ($row = mysqli_fetch_assoc($result))
                              {
                                if($row['customerStatus'] != "Archived"){
                                  echo('
                                    <input type="hidden" id="lstName'.$row['customerID'].'" value="'.$row['customerLastName'].'">
                                    <input type="hidden" id="firstName'.$row['customerID'].'" value="'.$row['customerFirstName'].'">
                                    <input type="hidden" id="midName'.$row['customerID'].'" value="'.$row['customerMiddleName'].'">
                                    <input type="hidden" id="address'.$row['customerID'].'" value="'.$row['customerAddress'].'">
                                    <input type="hidden" id="contact'.$row['customerID'].'" value="'.$row['customerContactNum'].'">
                                    <input type="hidden" id="email'.$row['customerID'].'" value="'.$row['customerEmail'].'">
                                    ');
                                }
                              }
                              ?>

                              <script type="text/javascript">
                              $(document).ready(function(){
                                $('#thisBtnSucks').removeAttr('href');




                                $('#savedCustomer').change(function(){

                                  var id = $('#savedCustomer').val();

                                  if(id==""){
                                    $('#customerIds').attr('value',"");
                                    $('#submitBtn').attr('type',"submit");
                                    $('#isBool').attr('value','new');
                                    $('#submitBtn').attr('onclick',"");
                                    $('#ln').attr('value',"");
                                    $('#ln').attr('readonly',false);
                                    $('#fn').attr('value',"");
                                    $('#fn').attr('readonly',false);
                                    $('#mn').attr('value',"");
                                    $('#mn').attr('readonly',false);
                                    $('#custadd').attr('value',"");
                                    $('#custadd').attr('readonly',false);
                                    $('#custcont').attr('value',"");
                                    $('#custcont').attr('readonly',false);
                                    $('#custemail').attr('value',"");
                                    $('#custemail').attr('readonly',false);
                                  }
                                  else{
                                    $('#isBool').attr('value','existing');
                                    $('#submitBtn').attr('type',"button");
                                    $('#submitBtn').attr('onclick',"location.href='receipt.php';");

                                    $('#customerIds').attr('value',id);
                                    $('#ln').attr('value',$('#lstName'+id+'').val());
                                    $('#ln').html($('#lstName'+id+'').val());
                                    $('#ln').attr('readonly',true);
                                    $('#fn').attr('value',$('#firstName'+id+'').val());
                                    $('#fn').attr('readonly',true);
                                    $('#mn').attr('value',$('#midName'+id+'').val());
                                    $('#mn').attr('readonly',true);
                                    $('#custadd').attr('value',$('#address'+id+'').val());
                                    $('#custadd').attr('readonly',true);
                                    $('#custcont').attr('value',$('#contact'+id+'').val());
                                    $('#custcont').attr('readonly',true);
                                    $('#custemail').attr('value',$('#email'+id+'').val());
                                    $('#custemail').attr('readonly',true);
                                  }
                                });
});
</script>

<div class="col-md-4">
</div>
<div class="col-md-4">
</div>
</div>
<br>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label class="control-label">First Name:</label><span id="x" style="color:red"> *</span>
      <input type="text" id="fn" class="form-control" name="firstn" required/> 
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label class="control-label">Middle Name:</label>
      <input type="text" id="mn" class="form-control" name="midn"/> 
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <input type="hidden" name="customerIds" id="customerIds">
      <label class="control-label">Last Name:</label><span id="x" style="color:red"> *</span>
      <input type="text" id="ln" class="form-control" name="lastn" value="" required/>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label class="control-label">Address</label><span id="x" style="color:red"> *</span>
      <textarea id="custadd" class="form-control" name="custadd" required></textarea>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label">Contact number</label><span id="x" style="color:red"> *</span>
      <input type="number" id="custcont" class="form-control" name="custocont" style="text-align:right" required/>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label">Email</label><span id="x" style="color:red"> *</span>
      <input type="email" id="custemail" class="form-control" name="custoemail" required/> 
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingTwo">
    <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <h3>Order Details</h3>
      </a>
    </h4>
  </div>
  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
    <div class="panel-body">
      <div class="row">
        <div class="descriptions">
          <div class="col-md-12">
            <div class="table-responsive" style="clear: both;">
              <table class="table table-bordered display nowrap" id="tblPackages">
                <thead>
                  <tr>
                    <h4>
                      <th style="text-align: center;">Furniture Name</th>
                      <th style="text-align: center;">Furniture Description</th>
                      <th style="text-align: center;">Unit Price</th>
                      <th style="text-align: center;">Quantity</th>
                      <th style="text-align: center;">Total Price</th></h4>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $removed = $_POST['removed'];
                    $priceremoved = $_POST['priceremoved'];
                    $quantremoved = $_POST['quantremoved'];
                    $selected = $_POST['cart'];
                    $selectedQuant = $_POST['quant'];
                    $selectedPrice = $_POST['price'];
                    $tempPrice = 0;
                    $tempQuant = 0;

                    $totPrice = $_POST['totalPrice'];
                    $totQuant = $_POST['totalQuant'];

                    $ctr = 0;
                    $pCtr = 0;
                    $quantarray = array();
                    $pricearray = array();
                    $removearray = array();
                    $priceremovearray = array();
                    $quantremovearray = array();

                    foreach ($removed as $removedItem) {
                      array_push($removearray, $removedItem);
                    }
                    foreach ($priceremoved as $priceremovedItem) {
                      array_push($priceremovearray, $priceremovedItem);
                    }
                    foreach ($quantremoved as $quantremovedItem) {
                      array_push($quantremovearray, $quantremovedItem);
                    }

                    foreach ($selectedQuant as $itemQuant) {
                      if(!in_array($itemQuant, $quantremovearray)){
                        $tempQuant =+ $itemQuant;
                        array_push($quantarray,$itemQuant);
                      }
                      else{
                      }
                    } 
                    foreach ($selectedPrice as $itemPrice) {
                      if(!in_array($itemPrice, $priceremovearray)){
                        $tempPrice =+ $itemPrice;
                        array_push($pricearray,$itemPrice);
                      }
                      else{
                      }
                    }
                    foreach ($selected as $items) {
                      if(!in_array($items, $removearray)){
                        $sql = "SELECT * FROM tblproduct where productID = '$items';";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                          while ($row = mysqli_fetch_assoc($result)) {
                            $ctr++; 
                            $pCtr++;                            
                            echo ('
                              <tr>
                              <td><input id="cart'.$ctr.'" name="cart[]" value="'.$items.'" type="hidden"/>'.$row['productName'].'</td>
                              <td style="text-align: center;">'.$row['productDescription'].'</td>
                              <td style="text-align: center;">'.number_format($row['productPrice'],2).'</td>
                              <td style="text-align: center;">'.$quantarray[$ctr-1].'<input id="quant'.$ctr.'" name="quant[]" value="'.$quantarray[$ctr-1].'" type="hidden"/></td>
                              <td id="price'.$ctr.'"  style="text-align: center;">&#8369;'.number_format($pricearray[$pCtr-1],2).'<input id="price'.$ctr.'" name="prices[]" value="'.$pricearray[$pCtr-1].'" type="hidden"/></td></tr>');?>
                            <?php    
                          }
                        }
                      }
                    }
                    ?>

                    <tfoot>
                      <td colspan="3" style="text-align:right;"><b> GRAND TOTAL</b></td>
                      <td style="text-align: center;">&#8369; <?php echo ('<input id="totalQuant" name="totalQuant" value ="'.$totQuant.'" type="hidden"/>'.$totQuant.''); ?></td>
                      <td id="totalPrice" style="text-align: center;">&#8369; <?php echo number_format($totPrice,2); ?></td>
                      <input type="hidden" name="totalPrice" value="<?php echo $totPrice; ?>">
                    </tfoot>
                  </tbody>

                  <script type="text/javascript">
                  var tempPrice = parseInt($('#totalPrice').html());
                  var tempTQuant = parseInt($('#totalQuant').val());
                  var realPrice = 0;
                  var totalPrice =0;
                  var price = 0;
                  var quant = 0;
                  var flag = 0;
                  function sendData(ctr){
                    realPrice = parseInt($('#prices'+ctr).val())/ parseInt($('#quant'+ctr).val()) ;
                    price = parseInt($('#prices'+ctr).val());
                  }

                  function passValue(ctr){

                    quant = parseInt($('#quant'+ctr).val());
                    var temRice = quant * price;
                    alert(temRice);
                    $('#price'+ctr).html(0);
                    $('#price'+ctr).html(String(quant * realPrice));

//total Score

if(flag == 0 ){
  totalPrice = tempPrice - price;
  var e = totalPrice +(quant * realPrice);
  alert(e);
  $('#totalPrice').html(0);
  $('#totalPrice').html(String(e));
  flag = 1;
}
else if(flag == 1){
  var tPrice = parseInt($('#totalPrice').html());
  alert(quant * parseInt($('#prices'+ctr).val()));
  $('#totalPrice').html(0);
  $('#totalPrice').html(tPrice+(quant * parseInt($('#prices').val())));
}
}
</script>

</table>
</div>

<div class="row">
  <div class="col-md-8">
    <div class="form-group">
      <label class="control-label">Order Remarks</label>
      <textarea name="orderremarks" id="orderremarks" class="form-control"></textarea>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label class="control-label">Pick up/Delivery Date</label>
      <input type="date" id="pdate" class="form-control" name="pidate" required/> 
    </div>
  </div>
</div>

<!--<div class="row">
  <div class="col-md-6">
    <label class="control-label">Received By:</label>
    <select id="emp" style="height:40px;" class="form-control" data-placeholder="Choose Employee" tabindex="1" name="emp"> <option value="" ></option>
      <?php
      $delsql = "SELECT * FROM tblemployee;";
      $delresult = mysqli_query($conn,$delsql);
      while($delrow = mysqli_fetch_assoc($delresult)){
        echo('<option value="'.$delrow['empID'].'">'.$delrow['empLastName'].','.$delrow['empFirstName'].','.$delrow['empMidName'].'</option>');
      }
      ?>
    </select>
  </div> 
</div>-->

</div>
</div>
</div>  
</div>
</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingThree">
    <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <h3>Delivery Information</h3>
      </a>
    </h4>
  </div>
  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
    <div class="panel-body">
      <div class="row">
        <div class="descriptions">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <h4><b>For:</b> <label class="radio-inline"><input type="radio" id="ratePick" name="type" value="Pick-up" checked/> Pick-up</label>
                  <label class="radio-inline"><input type="radio" id="rateDel" name="type" value="Delivery"/> Delivery</label></h4>
                </div>
              </div>
            </div>

            <div class="deliveryDetails">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Delivery Address</label>
                    <div class="row">
                      <div class="col-md-3">
                        <input type="text" id="da" class="form-control" name="deladd[]" placeholder="#1528 Kagawad Street" disabled required/>
                      </div>
                      <div class="col-md-3">
                        <input type="text" id="city" class="form-control" name="deladd[]" placeholder="Batasan Hills" disabled required/>
                      </div>
                      <div class="col-md-3">
                        <input type="text" id="zip" class="form-control" name="deladd[]" placeholder="Quezon City" disabled required/>
                      </div>
                      <div class="col-md-3">
                        <select id="delloc" style="height:40px;" class="form-control" data-placeholder="Choose Delivery Location" tabindex="1" name="delloc" disabled> 
                          <option value="">Choose a Location</option>
                          <?php
                          $delsql = "SELECT * FROM tbldelivery_rates;";
                          $delresult = mysqli_query($conn,$delsql);
                          while($delrow = mysqli_fetch_assoc($delresult)){
                            echo('<option value="'.$delrow['delRate'].'">'.$delrow['delLocation'].'</option>');
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Delivery Rate</label>
                            <input type="number" style="text-align:right;" id="dRate" class="form-control" value='0' readonly/>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <script type="text/javascript">
              $(document).ready(function(){
                $('#ratePick').click(function(){ 

                  if($('#ratePick').is(':checked')){ 
                    $('#da').prop('disabled',true);
                    $('#city').prop('disabled',true);
                    $('#zip').prop('disabled',true);
                    $('#delloc').prop('disabled',true);
                    $('#da').val('');
                    $('#city').val('');
                    $('#zip').val('');
                    $('#delloc').val('');

                    $('#dRate').val(0);

                    if($('#aTendered').val() < (x / 2)){
                      Math.round($('#aTendered').val( (x / 2)+d));
                    }
                    else if($('#aTendered').val() >= (x / 2)){
                      var e = parseInt($('#aTendered').val());
                      Math.round($('#dChange').val((x-$('#aTendered').val())+d));
                    }
                  }

                });
                $('#rateDel').click(function(){
                  if($('#rateDel').is(':checked')){ 
                    $('#dRate').val(0);
                    $('#da').prop('disabled',false);
                    $('#city').prop('disabled',false);
                    $('#zip').prop('disabled',false);
                    $('#delloc').prop('disabled',false);
                    $('#da').val('');
                    $('#city').val('');
                    $('#zip').val('');
                    $('#delloc').val('');

                    if($('#aTendered').val() < (x / 2)){
                      Math.round($('#aTendered').val( (x / 2)+d));
                    }
                    else if($('#aTendered').val() >= (x / 2)){
                      var e = parseInt($('#aTendered').val());
                      Math.round($('#dChange').val((x-$('#aTendered').val())+d));
                    }
                  }
                });



                $('#delloc').change(function(){
                  var x = parseInt($('#totalPrice').html());
                  var y =  parseInt($('#aTendered').val());
                  Math.round($('#aTendered').val( x / 2));
                  $('#dRate').val(parseInt($('#delloc').val()));
                  var d = parseInt($('#dRate').val());

                  if($('#aTendered').val() < (x / 2)){
                    Math.round($('#aTendered').val( (x / 2)+d));
                    Math.round($('#dChange').val($('#aTendered').val( (x / 2)+d)));
                  }
                  else if($('#aTendered').val() >= (x / 2)){
                    var e = parseInt($('#aTendered').val());
                    Math.round($('#dChange').val((x-$('#aTendered').val())+d));
                  }
                });
              });

$(document).ready(function(){
  var x = parseInt($('#totalPrice').html());
  var y =  parseInt($('#aTendered').val());
  Math.round($('#aTendered').val( x / 2));

  var d = parseInt($('#dRate').val());
  if($('#aTendered').val() < (x / 2)){
    Math.round($('#aTendered').val( (x / 2))+d);
  }
  else if($('#aTendered').val() >= (x / 2)){
    var e = parseInt($('#aTendered').val());
    Math.round($('#dChange').val((x-$('#aTendered').val())+d));
  }

  $('#aTendered').keyup(function(){
    if($('#aTendered').val() < (x / 2)){
      Math.round($('#aTendered').val( (x / 2)+d));
    }
    else if($('#aTendered').val() >= (x / 2)){
      var e = parseInt($('#aTendered').val());
      Math.round($('#dChange').val((x-$('#aTendered').val())+d));
    }
  });
});
</script>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingFour">
    <h4 class="panel-title">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        <h3>Payment</h3>
      </a>
    </h4>
  </div>
  <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
    <div class="panel-body pull-right">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label">Order Price</label>
              <input style="text-align:right;" id="oPrice" class="form-control" value="Php <?php echo number_format($totPrice,2)?>" disabled/>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label">Delivery Rate</label>
              <input type="number" style="text-align:right;" id="dRate" class="form-control" value='0' readonly/>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label">Amount Due</label>
              <input type="number" style="text-align:right;" id="" class="form-control" name="a" disabled/></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">Downpayment <span id="x" style="color:red"> *</span>
                  <h6><em>Note: Downpayment must be 50% of the total amount</em></h6></label>
                  <h6><em style="color:red">50% of Amount Due= </em>
                    <?php echo "Php " . number_format($totPrice * .5,2);?></h6>
                    <input type="number" style="text-align:right;" id="aTendered" class="form-control" name="aTendered" required/></div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-5 pull-right">
                    <button type="submit" class="btn btn-success waves-effect pull-right" id="addFab"><i class="fa fa-check"></i> Save & Print</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</body> 

<script type="text/javascript">
(function(){
  $('#accordion').wizard({
    step: '[data-toggle="collapse"]',
    buttonsAppendTo: '.panel-collapse',
    templates: {
      buttons: function(){
        var options = this.options;
        return '<div class="panel-footer"><ul class="pager">' +
        '<li class="previous">'+
        '<a href="#'+this.id+'" data-wizard="back" role="button">'+options.buttonLabels.back+'</a>' +
        '</li>' +
        '<li class="next">'+
        '<a href="#'+this.id+'" data-wizard="next" role="button">'+options.buttonLabels.next+'</a>' +
        '<button href="#'+this.id+'" data-wizard="finish" type="submit" class="btn btn-success waves-effect pull-right" id="addFab"><i class="fa fa-check"></i> Save & Print Receipt</button>' +
        '</li>'+
        '</ul></div>';
      }
    },
    onBeforeShow: function(step){
      step.$pane.collapse('show');
    },
    onBeforeHide: function(step){
      step.$pane.collapse('hide');
    },
    onFinish: function(){
      window.location.href = 'receipt.php?id='+id;
    }
  });
})();
</script>
</html>