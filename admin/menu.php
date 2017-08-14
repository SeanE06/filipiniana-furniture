<?php
session_start();
if(!isset($_SESSION["userEmpID"]))
{
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <?php
  include 'dbconnect.php';
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  ?>
  <!-- Bootstrap Core CSS -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="plugins/bower_components/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
  <!-- Menu CSS -->
  <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
  <!-- Dropify CSS -->
  <link href="plugins/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet">
  <!-- toast CSS -->
  <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
  <!-- DataTable CSS -->
  <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="plugins/bower_components/datatables/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <!-- Timeline CSS -->
  <!--link href="../plugins/bower_components/horizontal-timeline/css/horizontal-timeline.css" rel="stylesheet">
  <link href="../plugins/bower_components/timeliner/src/css/jquery-timeliner.css" rel="stylesheet">
  <link href="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet"-->
  <!-- morris CSS -->
  <!--link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet"-->
  <!-- animation CSS -->
  <link href="css/animate.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">

  <link href="css/literallycanvas.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="css/colors/default.css" id="theme"  rel="stylesheet">

  <link href="css/select2.min.css" rel="stylesheet">

  <!-- Wizard CSS -->
  <link href="plugins/bower_components/jquery-wizard-master/css/wizard.css" rel="stylesheet">

  <!-- FormValidation -->
  <link rel="stylesheet" href="plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-19175540-9', 'auto');
  ga('send', 'pageview');
  </script>
</head>
<body class ="fix-header fix-sidebar">
  <!-- Preloader -->
<!--div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div-->
<div id="wrapper">

  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
      <div class="top-left-part"><a class="logo" href="dashboard.php"><b><!--This is light logo icon--><?php
        include "dbconnect.php";
        $sql="SELECT * from tblcompany_info";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
          while($row=$result->fetch_assoc())
          {
        ?>
          <img width="60" height="62" class="mx-auto d-block img-fluid animated tada" src="/admin/plugins/images/<?php echo "" .$row['comp_logo'];?>">
        
        <?php
          }
        }
        ?>
        </b>
        <span class="hidden-xs"><!--This is light logo text--><?php
          include "dbconnect.php";
          $sql="SELECT * from tblcompany_info";
          $result=$conn->query($sql);
          if($result->num_rows>0)
          {
            while($row=$result->fetch_assoc())
            {
          ?>
          <span class="light-logo" style="font-weight: bolder; letter-spacing: 3px; float:right; color: #4A4A4A; margin-left: 75px; margin-top: -55px; font-family: Helvetica;"><?php echo "" . $row['comp_name'];?></span>
          <?php
            }
          }
          $conn->close();
          ?></span></a></div>
      <ul class="nav navbar-top-links navbar-left hidden-xs">
        <li><a href="javascript:void(0)" class="hideMenu open-close hidden-xs waves-effect waves-light hidden"><i class="icon-arrow-left-circle ti-menu" hidden></i></a></li>
        <li>

        </li>
      </ul>
      <ul class="nav navbar-top-links navbar-right pull-right">
        <!--li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
        </a>
        <ul class="dropdown-menu mailbox animated bounceInDown">
          <li>
            <div class="drop-title">You have no messages</div>
          </li>
        </ul>
      </li-->

      <!-- /.dropdown -->
      <!-- .Megamenu -->
    <li class="mega-dropdown">
      <a href="javascript:void(0)" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" role="button" aria-expanded="false"> 
      <?php
          include "dbconnect.php";
          $sql = "SELECT * FROM tblemployee a inner join tbluser b where a.empID = b.userEmpID and userID='" . $_SESSION["userID"] . "'";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result))
          {
            if($row['userStatus']=="active" && $row['userType']=="admin")
			{
              echo('<span>'.$row['empFirstName'].' '.$row['empMidName'].' '.$row['empLastName'].'</span>');
            }
          }
      ?> 
      <span class="caret"></span>
      </a>
      <!--a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><div><img src="../plugins/images/users/user-male-icon.png" alt="user-img" class="img-circle" style="height: 55px;"></div> <i class="icon-options-vertical"></i></a-->
      <ul class="dropdown-menu animated flipInY">
      <!--li><a href="#"><i class="ti-user"></i> My Profile</a></li>
      <li role="separator" class="divider"></li>
      <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
      <li role="separator" class="divider"></li-->
      <li>
      <a href="javascript:void(0)" class="dropdown-toggle waves-effect waves-light"><i class="fa fa-power-off"></i> Logout</a>
      </li>
      </ul>
    </li>
      <!-- /.Megamenu -->
    </ul>
  </div>
  <!-- /.navbar-header -->
  <!-- /.navbar-top-links -->
  <!-- /.navbar-static-side -->
</nav>
<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse slimscrollsidebar">
    <div class="user-profile">
      <div class="dropdown user-pro-body">

      </div>
    </div>

    <ul class="nav" id="side-menu">

      <li class="sidebar-search hidden-sm hidden-md hidden-lg">
        <div class="input-group custom-search-form">
          <input type="text" class="form-control" style="display: none;">
          <span class="input-group-btn">
            <button style="visibility:hidden;" class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
          </span> 
        </div>
      </li>

      <li><a href="dashboard.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw ti-clipboard"></i> <span class="hide-menu">Dashboard</span></a>
      </li>

      <li><a href="javascript:void(0)" class="waves-effect"><i class="linea-icon linea-basic fa-fw ti-settings"></i> <span class="hide-menu">Maintenance<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">

          <li><a href="javascript:void(0)" class="waves-effect">Raw Materials<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
              <li><a href="supplier.php">Supplier</a></li>
              <li><a href="unit-of-measurement-category.php">Unit of Measurement Category</a></li>
              <li><a href="unit-of-measurement.php">Unit of Measurement</a></li>
              <li><a href="material-attribute.php">Material Attributes</a></li>
              <li><a href="material-type.php">Material Type</a></li>
              <li><a href="materials.php">Materials</a></li>
              <li><a href="material-variants.php">Material Variants</a></li>
            </ul>
          </li>

          <li><a href="javascript:void(0)" class="waves-effect">Furniture<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">

              <li><a href="category.php">Categories</a></li>
              <li><a href="furniture-type.php">Types</a></li>
              
              <li><a href="javascript:void(0)" class="waves-effect">Design<span class="fa arrow"></span></a>
                <ul class="nav nav-fourth-level">
                  <li><a href="javascript:void(0)" class="waves-effect">Fabric<span class="fa arrow"></span></a>
                    <ul class="nav nav-fifth-level">
                      <li><a href="fabric-texture.php">Textures</a></li>
                      <li><a href="fabric-type.php">Types</a></li>
                      <li><a href="fabric-pattern.php">Patterns</a></li>
                      <li><a href="fabrics.php">Fabrics Formed</a></li>
                    </ul>
                  </li>
                </ul>
                <ul class="nav nav-fourth-level">
                  <li><a href="javascript:void(0)" class="waves-effect">Frame<span class="fa arrow"></span></a>
                    <ul class="nav nav-fifth-level">
                      <li><a href="frame-design.php">Designs</a></li>
                      <li><a href="framework-material.php">Materials</a></li>
                      <li><a href="frameworks.php">Frameworks</a></li>
                    </ul>
                  </li>
                </ul>
              </li> 
              <li><a href="products.php">Products</a></li>
            </ul>
          </li>

          <li><a href="packages.php">Packages</a></li>
          <li><a href="production-information.php">Production Information</a></li>

          <li><a href="javascript:void(0)" class="waves-effect">Manpower<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
              <li><a href="jobs.php">Jobs</a></li>
              <li><a href="employees.php">Employees</a></li>
            </ul>
          </li>

          <li><a href="javascript:void(0)" class="waves-effect">Promos & Delivery Rates<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
              <li><a href="promo.php">Promos</a></li>
              <li><a href="delivery-rates.php">Delivery Rates</a></li>
            </ul>
          </li>
        </ul>
      </li>

      <li><a href="javascript:void(0)" class="waves-effect"><i class="linea-icon linea-basic fa-fw ti-server"></i> <span class="hide-menu">Transaction<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">
          <li><a href="point-of-sales.php">Point of Sales</a></li>
          <li><a href="raw-materials-management.php">Raw Materials Management</a></li>
          <li><a href="product-management.php">Product Management</a></li>
          <li><a href="javascript:void(0)" class="waves-effect">Order Management<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
              <li><a href="shop.php">Shop</a></li>
              <li><a href="orders.php">Orders</a></li>
              <li><a href="collections.php">Collections</a></li>
            </ul>
          </li>
          <li><a href="production-tracking.php">Production Tracking</a></li>
          <li><a href="delivery-tracking.php">Delivery Tracking</a></li>
        </ul>
      </li>

      <li><a href="queries.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw fa-fw ti-pencil"></i> <span class="hide-menu">Queries</span></a>
      </li>

      <li><a href="javascript:void(0)" class="waves-effect"><i class="linea-icon linea-basic fa-fw ti-bar-chart"></i><span class="hide-menu">Reports<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">
          <li><a href="sales-reports.php">Sales Report</a></li>
        </ul>
      </li>

      <li><a href="javascript:void(0)" class="waves-effect"><i class="linea-icon linea-basic fa-fw ti-wand"></i> <span class="hide-menu">Utilities<span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">
          <li><a href="javascript:void(0)" class="waves-effect">Company<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">

              <li><a href="company-information.php">Company Information</a></li>
              <li><a href="branches.php">Branches</a></li>
            </ul>
          </li>
          <li><a href="javascript:void(0)" class="waves-effect">Archives<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
              <li><a href="javascript:void(0)">Supplier</a></li>

              <li><a href="javascript:void(0)">Unit of Measurement</a></li>

              <li><a href="javascript:void(0)" class="waves-effect">Raw Materials<span class="fa arrow"></span></a>
                <ul class="nav nav-fourth-level">
                  <li><a href="javascript:void(0)">Materials</a></li>
                  <li><a href="javascript:void(0)">Material Variants</a></li>
                </ul>
              </li>

              <li><a href="javascript:void(0)" class="waves-effect">Furniture<span class="fa arrow"></span></a>
                <ul class="nav nav-fourth-level">
                  <li><a href="javascript:void(0)" class="waves-effect">Design<span class="fa arrow"></span></a>
                    <ul class="nav nav-fifth-level">
                      <li><a href="javascript:void(0)" class="waves-effect">Fabric<span class="fa arrow"></span></a>
                        <ul class="nav nav-sixth-level">
                          <li><a href="javascript:void(0)">Textures</a></li>
                          <li><a href="javascript:void(0)">Types</a></li>
                          <li><a href="javascript:void(0)">Patterns</a></li>
                          <li><a href="javascript:void(0)">Fabrics Formed</a></li>
                        </ul>
                      </li>
                    </ul>
                    <ul class="nav nav-fifth-level">
                      <li><a href="javascript:void(0)" class="waves-effect">Frame<span class="fa arrow"></span></a>
                        <ul class="nav nav-sixth-level">
                          <li><a href="javascript:void(0)">Designs</a></li>
                          <li><a href="javascript:void(0)">Materials</a></li>
                          <li><a href="javascript:void(0)">Frameworks</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li> 
                  <li><a href="javascript:void(0)">Categories</a></li>
                  <li><a href="javascript:void(0)">Types</a></li>
                  <li><a href="javascript:void(0)">Products</a></li>
                </ul>
              </li>

              <li><a href="javascript:void(0)">Packages</a></li>
              <li><a href="javascript:void(0)">Production Information</a></li>

              <li><a href="javascript:void(0)" class="waves-effect">Manpower<span class="fa arrow"></span></a>
                <ul class="nav nav-fourth-level">
                  <li><a href="javascript:void(0)">Jobs</a></li>
                  <li><a href="javascript:void(0)">Employees</a></li>
                </ul>
              </li>

              <li><a href="javascript:void(0)" class="waves-effect">Promos & Delivery Rates<span class="fa arrow"></span></a>
                <ul class="nav nav-fourth-level">
                  <li><a href="javascript:void(0)">Promos</a></li>
                  <li><a href="javascript:void(0)">Delivery Rates</a></li>
                </ul>
              </li>

            </ul>
          </li>
          <li><a href="users.php">Users</a></li>
          <li><a href="mode-of-payment.php">Mode of Payment</a></li>
          <li><a href="penalties.php">Penalties</a></li>

          <li><a href="javascript:void(0)" class="waves-effect">Defaults<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
              <li><a href="default-downpayment.php">Default Downpayment</a></li>
              <li><a href="phases.php">Production Phases</a></li>
              <li><a href="javascript:void(0)">Variant Attributes</a></li>
              <li><a href="javascript:void(0)">Product Design Phases</a></li>
            </ul>
          </li>
        </ul>
      </li>

    </ul>
  </div>
</div>
</div>
<!-- Left navbar-header end -->
<!-- Page Content -->
<!-- /#wrapper -->
<!-- jQuery -->
<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script>
$(document).ready(function () {
  var url = window.location;
  var element = $('ul.nav a').filter(function () {
    return this.href == url;
  });
  if(element){
    element.addClass('active').parents('#side-menu ul').addClass('in');
    element.parents('#side-menu li').addClass('active');
  } 
});
</script>
<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<script>
$(document).ready(function () {
  $('#side-menu').slimScroll({
    height: '800px',
    size: '8px',
    color: '#105db2',
    wheelStep: 3,
    railVisible: true,
    alwaysVisible: true
  });
});
</script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Counter js -->
<script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!--Morris JavaScript -->
<!--script src="../plugins/bower_components/raphael/raphael-min.js"></script>
<script src="../plugins/bower_components/morrisjs/morris.js"></script>
<script src="js/dashboard1.js"></script-->
  <script src="plugins/bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
  <script src="plugins/bower_components/bootstrap-table/dist/bootstrap-table.ints.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="js/custom.min.js"></script>
  <script src="js/jasny-bootstrap.js"></script>
  <!-- Print Preview -->
  <script src="plugins/bower_components/printmaster/dist/jQuery.print.min.js"></script>
  <!-- jQuery file upload -->
  <script src="plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
  <!-- File Export -->
  <script src="js/cbpFWTabs.js"></script>
  <script type="text/javascript">

  $(document).ready(function () {

    [].slice.call( document.querySelectorAll( '.sttabs' ) ).forEach( function( el ) {
      new CBPFWTabs( el );
    });

  });
  </script>
  <!-- Sparkline chart JavaScript -->
  <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
  <!-- Style Switcher -->
  <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
  <!-- Toastr -->
  <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
  <script src="js/toastr.js"></script>
  <!-- Color Picker -->
  <script src="js/jscolor.js"></script>
  <script src="js/colorpicker-color.js"></script>
  <script src="js/colorpicker-component.js"></script>
  <script src="js/colorpicker-defaults.js"></script>
  <script src="js/colorpicker-plugin-wrapper.js"></script>
  <!-- Data Tables -->
  <script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
  <!-- start - This is for export functionality only -->
  <script src="plugins/bower_components/datatables/dataTables.buttons.min.js"></script>
  <script src="plugins/bower_components/datatables/buttons.flash.min.js"></script>
  <script src="plugins/bower_components/jszip/dist/jszip.min.js"></script>
  <script src="plugins/bower_components/pdfmake/build/pdfmake.min.js"></script>
  <script src="plugins/bower_components/pdfmake/build/vfs_fonts.js"></script>
  <script src="plugins/bower_components/datatables/buttons.html5.min.js"></script>
  <script src="plugins/bower_components/datatables/buttons.print.min.js"></script>
  <script src="js/select2.min.js"></script>
  <!-- end - This is for export functionality only -->
  <!-- Horizontal-timeline JavaScript -->
  <!--script src="../plugins/bower_components/horizontal-timeline/js/horizontal-timeline.js"></script-->
  <!-- Vertical-timeline JavaScript -->
<!--script src="../plugins/bower_components/timeliner/src/js/jquery-timeliner.js"></script>
  <script src="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script-->
    <!-- Table Search -->
    <script>
    $(document).ready(function () {
      var table = $('.dataTable').DataTable({
        "order": [],
        "pageLength": 5,
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
        "aoColumnDefs" : [
        {
         'bSortable' : false,
         'aTargets' : [ 'removeSort' ]
       }]
     });
    });
    </script>

    <script>
    $(document).ready(function () {
      $('#reportsTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
    });
    </script>

    <script type='text/javascript'>
//<![CDATA[
jQuery(function($) { 'use strict';
  $("#printReceipt").find('.print-link').on('click', function() {
      //Print ele2 with default options
      $.print("#printReceipt");
    });
});
//]]>
</script>

<!-- InstaFilta -->
<script src="plugins/bower_components/instaFilta/instafilta.min.js" type="text/javascript"></script>
<script src="js/mask.js"></script>
<script src="js/literallycanvas.js"></script>
<script src="js/literallycanvas-core.js"></script>
<script src="js/literallycanvas-core.min.js"></script>

<!-- Form Wizard JavaScript -->
<script src="plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js"></script>
<!-- FormValidation plugin and the class supports validating Bootstrap form -->
<script src="plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js"></script>
<script src="plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js"></script>

<!--script type="text/javascript">
$(window).on('load',function() {
    setTimeout(function() {
       $("#page-wrapper:not(.sidebar), .navbar-header").hover(function () {
        $( '.hideMenu' ).trigger('click', function() {
            return false;
        });
      });
    },1000);
});
</script-->


<script type="text/javascript">
  $("document").ready(function(e) {
    setTimeout(function() {
      if( $('.sidebar').is(":hover") ){
        e.preventDefault();
    } 
    else{
       $(".hideMenu").trigger('click');
     }
    },2000);
});
  $("document").ready(function() {
    setTimeout(function() {
       $(".sidebar").mouseenter(function () {
        $(".hideMenu").trigger('click');
      });

       $(".sidebar").mouseleave(function () {
        $(".hideMenu").trigger('click');
      });
    },2000);
});
</script>

<!--script type="text/javascript">
  $("document").ready(function() {
    function menuHover() {
      //Hover
      $('#page-wrapper, .navbar-header').hover(function(){
         $(".hideMenu").trigger('click');
      }).mouseout(function(){

      });
    }
    menuHover();
});
</script-->

</body>
</html>