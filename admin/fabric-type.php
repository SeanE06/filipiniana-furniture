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
   $(document).ready(function(){
    var userkey = '';
     $('body').on('keyup','#username',function(){
    var user = $(this).val();
    var flag = true;


    userkey = $(this).val();
      userkey = userkey.slice(userkey.length -1 , userkey.length);
    if(userkey == '\\'){
        $('#addFab').prop('disabled',true);$('#notif').html('Some Fields have Error');
      $('#message').html('Symbols not allowed');
      $('#username').css('border-color','red');
      }else{
    $.post('fab-type-check.php',{username : user}, function(data){
     
     if(data == 'Already Exist!'){
       
          $('#addFab').prop('disabled',true);$('#notif').html('Some Fields have Error');
      $('#message').html(data);
      $('#username').css('border-color','red');
     }
     else if(data == 'Symbols not allowed'){
       
          $('#addFab').prop('disabled',true);$('#notif').html('Some Fields have Error');
      $('#message').html(data);
      $('#username').css('border-color','red');
     }
     else if(data == 'No white Space'){
  

          $('#addFab').prop('disabled',true);$('#notif').html('Some Fields have Error');
      $('#message').html(data);
      $('#username').css('border-color','red');
     }
     else if(data == ''){
      error = 0;
          $('#message').html('');
          $('#addFab').prop('disabled',true);$('#notif').html('');
      $('#username').css('border-color','black');
     }

     
     else if(data == 'Good!'){
      error = 0;
       $('#message').html('');
     $('#addFab').prop('disabled',false);$('#notif').html('');
      $('#username').css('border-color','limegreen');
     }
      
    
    });

    
}
  });

});


   $(document).ready(function(){
var temprem;
var tempname;
var error = 0;
var flag = true;
var userkey = '';
 



  $('body').on('keyup','#editname',function(){
    var user = $(this).val();
    
      tempname = $('#editname').val();
      temprem = $('#rem').val();

      userkey = $('#editname').val();
      userkey = userkey.slice(userkey.length -1 , userkey.length);

      if(userkey == '\\'){
        $('#updateBtn').prop('disabled',true);$('#notif').html('Some Fields have Error');
      $('#message').html('Symbols not allowed');
      $('#editname').css('border-color','red');
      }else{
    $.post('fab-type-Ucheck.php',{username : user}, function(data){
     
     if(data == 'unchanged'){
      error = 0;
       $('#message').html('');
          $('#updateBtn').prop('disabled',false);$('#notif').html('');
      $('#editname').css('border-color','black');
     }
     else if(data == 'Already Exist!'){
       error++;
          $('#updateBtn').prop('disabled',true);$('#notif').html('Some Fields have Error');
      $('#message').html(data);
      $('#editname').css('border-color','red');
     }
     else if(data == 'Symbols not allowed'){
       error++;
          $('#updateBtn').prop('disabled',true);$('#notif').html('Some Fields have Error');
      $('#message').html(data);
      $('#editname').css('border-color','red');
     }
     else if(data == 'No white Space'){
       error++;

          $('#updateBtn').prop('disabled',true);$('#notif').html('Some Fields have Error');
      $('#message').html(data);
      $('#editname').css('border-color','red');
     }
     else if(data == ''){
      error = 0;
          $('#message').html('');
          $('#updateBtn').prop('disabled',true);$('#notif').html('');
      $('#editname').css('border-color','black');
     }

     
     else if(data == 'Good!'){
      error = 0;
       $('#message').html('');
     $('#updateBtn').prop('disabled',false);$('#notif').html('');
      $('#editname').css('border-color','limegreen');
     }


    });
}
    

  });
        $('body').on('change','#select',function(){
          if($(this).val() == '--'){


          $('#updateBtn').prop('disabled',true);

            }
            else{
          if(error == 0){
          $('#updateBtn').prop('disabled',false);
        }
        else{
          $('#updateBtn').prop('disabled',true);
        }
        }


      });

        $('body').on('keyup','#remText',function(){
        var tem = $(this).val();
        if(error == 0){
        flag = false;
        if(!flag){
          $('#updateBtn').prop('disabled',false);
        }
        }
      });

});

$(document).ready(function(){
  $("#archiveTable").hide();
  $('#archiveSwitch').change(function(){
    if($(this).prop("checked")) {
      $('#archiveTable').show();
      $('#archiveTitle').css({'display' : ''});
      $("#tempbtn").hide();
      $('#mainTable').hide();
    } else {
      $('#archiveTable').hide();
      $('#archiveTitle').css({'display' : 'none'});
      $('#mainTable').show();
      $("#tempbtn").show();
    }
  });

  // Tooltip only Text
  $('.masterTooltip').hover(function(){
          // Hover over code
          var title = $(this).attr('title');
          $(this).data('tipText', title).removeAttr('title');
          $('<p class="tooltipsy"></p>')
          .text(title)
          .appendTo('body')
          .fadeIn('slow');
  }, function() {
          // Hover out code
          $(this).attr('title', $(this).data('tipText'));
          $('.tooltipsy').remove();
  }).mousemove(function(e) {
          var mousex = e.pageX + -100; //Get X coordinates
          var mousey = e.pageY + -15; //Get Y coordinates
          $('.tooltipsy')
          .css({ top: mousey, left: mousex })
  });
});
  </script>
</head>
<body>
<!-- Preloader -->
  <!--div class="preloader">
    <div class="cssload-speeding-wheel"></div>
  </div-->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="panel panel-info">
            <h3>
              <ul class="nav customtab2 nav-tabs" role="tablist">
                <button id="tempbtn" class="btn btn-lg btn-info pull-right" data-toggle="modal" href="fab-type-form.php" data-remote="fab-type-form.php #new" data-target="#myModal" aria-expanded="false" style="margin-right: 20px;"><span class="btn-label"><i class="ti-plus"></i></span>New</button>
                <li role="presentation" class="active" >
                <a id="temptitle" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"></span><span class="hidden-xs"></span><i class="ti-vector"></i>&nbsp;<span id="archiveTitle" style="display: none;">Archived</span>&nbsp;<?php echo $titlePage?></a>
              </li>
            </ul>
          </h3>
          <div class="pull-right" style="margin-right: 20px; margin-top: -10px;">
            <a href="javascript:void(0)" title="Archives" class="masterTooltip"><input type="checkbox" class="js-switch" id="archiveSwitch" data-color="#f96262" style="display: none;" data-switchery="true"></a>
          </div>
            <div class="tab-content">
              <!-- FABRIC TYPE -->
              <div role="tabpanel" class="tab-pane fade active in" id="fabrics">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                  <div class="panel-body">                
                    <div class="row">
                      <div class="table-responsive" id="mainTable">
                        <table class="table color-bordered-table muted-bordered-table dataTable display" id="tblFabricType">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Texture</th>
                              <th>Description</th>
                              <th class="removeSort">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                              <?php
                              $sql = "SELECT * FROM tblfabric_type;";
                              $result = mysqli_query($conn, $sql);
                              while ($row = mysqli_fetch_assoc($result))
                              {
                                if($row['f_typeStatus']=="Listed"){
                                  echo('<tr>
                                    <td>'.$row['f_typeName'].'</td>');
                                  $name = textureName($row['f_typeTextureID']);
                                  echo'<td>'.$name.'</td>'; 
                                  echo ('<td>'.$row['f_typeWeaves'].'</td>');
                              ?>
                                  <td>
                                    <!-- UPDATE -->
                                    <button type="button" class="btn btn-success" data-toggle="modal" href="fab-type-form.php" data-remote="fab-type-form.php?id=<?php echo $row['f_typeID'];?> #update" data-target="#myModal"><i class='ti-pencil-alt'></i> Update</button>
                                    <!-- DELETE -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" href="fab-type-form.php" data-remote="fab-type-form.php?id=<?php echo $row['f_typeID'];?> #delete" data-target="#myModal"><i class='ti-close'></i> Deactivate</button>
                                  </td>
                                  <?php echo ('</tr>'); }}

                                  function textureName($id){
                                    include "dbconnect.php";
                                    $pattern = "";
                                    $sql = "SELECT textureName from tblfabric_texture WHERE textureID = $id";
                                    $result = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                      $name = $row['textureName'];
                                    }
                                    return $name;
                                  }
                                  ?>
                                
                                <script type="text/javascript">
                                  function confirmDelete(id) {
                                    if (confirm("Are you sure you want to delete")) {
                                      window.location.href="delete-fabric.php?id="+id+"";
                                    }
                                  }
                                  function edit(id) {
                                    window.location.href="update-fabric.php?id="+id+"";
                                  }
                                </script>
                              </tbody>
                            </table>

                          </div>
                        </div>

                        <div id="archiveTable">
                          <div class="table-responsive"> 
                            <table class="table color-bordered-table muted-bordered-table dataTable display">
                              <thead>
                                <tr>
                              <th>Name</th>
                              <th>Texture</th>
                              <th>Weaves</th>
                              <th class="removeSort">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                               <?php
                              $sql = "SELECT * FROM tblfabric_type;";
                              $result = mysqli_query($conn, $sql);
                              while ($row = mysqli_fetch_assoc($result))
                              {
                                if($row['f_typeStatus']=="Archived"){
                                  echo('<tr>
                                    <td>'.$row['f_typeName'].'</td>');
                                  $name = textureName($row['f_typeTextureID']);
                                  echo'<td>'.$name.'</td>'; 
                                  echo ('<td>'.$row['f_typeWeaves'].'</td>');
                              ?>
                                  <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" href="reactivate-form.php" data-remote="reactivate-form.php?rName=Fabric+Type&amp;id=<?php echo $row['f_typeID']?> #reactivate" data-target="#myModal"><i class="ti-reload"></i> Reactivate</button> 
                                  </td>
                                  <?php echo ('</tr>'); }}?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.modal -->
                </div>
              </div>  
            </div>
          </div>
          <!-- /.container-fluid -->
          <!--footer class="footer text-center"> 2017 &copy; Filipiniana Furniture </footer-->
        </div>
        <!-- /#page-wrapper -->
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
    </body>
    </html>