<?php
include "dbconnect.php";
$id = $_POST['id'];
$rsql = "SELECT * FROM tblpromos a, tblpromo_condition b, tblpromo_promotion c WHERE a.promoID = b.conPromoID and a.promoID = c.proPromoID and promoID = $id";
$rresult = mysqli_query($conn,$rsql);
$row = mysqli_fetch_assoc($rresult);
echo '
<div style="border:2px solid">
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="white-box text-center"> 
    <img src="plugins/images/'.$row['promoImage'].' alt="Unavailable" class="img-responsive"> 
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center;">
        <h4 class="box-title">Description</h4>
        <p>'. $row['promoDescription'].'</p>
    </div>
</div>
</div>
</div>';
?>
