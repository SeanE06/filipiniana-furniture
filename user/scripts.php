<!-- JS Part Start--><?php 
include "product-form.php";
?>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-2.2.3.js"></script>
<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
<script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="js/myScript.js"></script>
<script type="text/javascript" src="js/toast-master/js/jquery.toast.js"></script>
<script type="text/javascript" src="js/toastr.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript" src="js/jquery.mycart.js"></script>

<!-- JS Part End-->
<script>




jQuery(document).ready(function() {		
   jQuery("#slider1").revolution({
      sliderType:"standard",
      sliderLayout:"fullwidth",
      delay:9000,
      navigation: {
		  onHoverStop: "off",
          arrows:{enable:true},
		  touch: {
                                    touchenabled: "on",
                                    swipe_threshold: 75,
                                    swipe_min_touches: 1,
                                    swipe_direction: "horizontal",
                                    drag_block_vertical: false
                                },
		  bullets: {
                                    enable: true,
                                    hide_onmobile: true,
                                    style: "hermes",
                                    hide_onleave: false,
                                    direction: "horizontal",
                                    h_align: "center",
                                    v_align: "bottom",
                                    h_offset: 20,
                                    v_offset: 20,
                                    space: 5,
                                    tmp: ''
                                },
      },
	  
								
	   gridwidth:1230,
      gridheight:480
    });		
});	
</script>







<script type="text/javascript">

$(document).ready(function(){

  
var q = 0;
$('#addBtn').attr('data-quantity',q);
  $('body').on('change','#quan',function(e){
    e.stopImmediatePropagation();
    e.preventDefault();
    q = $('#quan').val();
     if(q <= 0){

      $('#addBtn').attr('data-quantity',0);
    $('#addBtn').prop('disabled',true);
      $('#message').html('Input Quantity');
      $('#message').css('color','red');
      
      
    }else{
      $('#addBtn').attr('data-quantity',''+q);
      $('#addBtn').prop('disabled',false);
      $('#message').html('');
    }


  });

  $('body').on('keyup','#quan',function(){
    q = $('#quan').val();
     if(q <= 0){

      $('#addBtn').attr('data-quantity',0);
    $('#addBtn').prop('disabled',true);
      $('#message').html('Input Quantity');
      $('#message').css('color','red');
      
      
    }else{
      $('#addBtn').attr('data-quantity',''+q);
      $('#addBtn').prop('disabled',false);
      $('#message').html('');
    }


  });
});

$(document).ready(function(){
  
var q = 0;
$('#paddBtn').attr('data-quantity',q);
  $('body').on('change','#pquan',function(){
    q = $('#pquan').val();
     if(q <= 0){

      $('#paddBtn').attr('data-quantity',0);
    $('#paddBtn').prop('disabled',true);
      $('#pmessage').html('Input Quantity');
      $('#pmessage').css('color','red');
      
      
    }else{
      $('#paddBtn').attr('data-quantity',''+q);
      $('#paddBtn').prop('disabled',false);
      $('#pmessage').html('');
    }


  });

  $('body').on('keyup','#pquan',function(){
    q = $('#pquan').val();
     if(q <= 0){

      $('#paddBtn').attr('data-quantity',0);
    $('#paddBtn').prop('disabled',true);
      $('#pmessage').html('Input Quantity');
      $('#pmessage').css('color','red');
      
      
    }else{
      $('#paddBtn').attr('data-quantity',''+q);
      $('#paddBtn').prop('disabled',false);
      $('#pmessage').html('');
    }


  });

  $('body').on('click','#addBtn',function(){
    var id = $(this).val();
    checkPromo(id);
  });

  $('body').on('click','#addPBtn',function(){
    var id = $(this).val();
    checkPromo(id);
  });


});

function in_array(array, id) {
    for(var i=0;i<array.length;i++) {
        return (array[i][0].id === id)
    }
    return false;
}

function checkPromo(id){
  var checker = $('#promoChecker'+id).val();
  if(checker != 0 && !isNaN(checker)){
    var value = sessionStorage.getItem('promoid');
    
      if(value != null){
            prodwithpromo = value.split(',');
           }
          
    if(!in_array(prodwithpromo,id)){
    prodwithpromo.push(id);
    prodwithpromo = prodwithpromo.filter(function(item, pos) {
    return prodwithpromo.indexOf(item) == pos;
})
    sessionStorage.setItem('promoid',prodwithpromo);
    }
  }
  else{
  }
}

function remove(array, element) {
    const index = array.indexOf(element);
    array.splice(index, 1);
}


function checkLog(){

var logcheck = $('#logcheck').val();

if(logcheck != 'yes'){
  alert('You must log in First!');
  $('#checkoutBtn').prop('class','btn btn-primary');
  location.href = "login.php"; 
}else{

  $('#checkoutBtn').prop('class','btn btn-primary my-cart-checkout');
  $('#checkoutBtn').click();
}

}

 var array = [];
 var parray = [];

var prod = [];
var prodID = [];
 var prodwithpromo = [];

  $(function () {

  var goToCartIcon = function($addTocartBtn){
    var $cartIcon = $(".my-cart-icon");
    var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
    $addTocartBtn.prepend($image);
    var position = $cartIcon.position();
    $image.animate({
      top: position.top,
      left: position.left
    }, 500 , "linear", function() {
      $image.remove();
    });
  }

  $('.my-cart-btn').myCart({
    classCartIcon: 'my-cart-icon',
    classCartBadge: 'my-cart-badge',
    affixCartIcon: true,
    checkoutCart: function(products) {

      $.each(products, function(){
        console.log(this);
        var obj = this;

        var ttp = $('#totalGrand').val();
        var ttq = $('#totalQuant').val();
        sessionStorage.setItem('totalQuant',ttq);
        sessionStorage.setItem('totalPrice',ttp);
        
        if(obj.id.toString().charAt(0) != 'P'){
        var keys = Object.keys(obj).map(function (key) { return obj[key]; });
        
        if(ttp>0){

        

        var value = sessionStorage.getItem('promoid');
    
      if(value != null && !isNaN(value)){
            prodwithpromo = value.split(',');
             if(!in_array(prodwithpromo,this.id)){
          prod.push(this.id);
        sessionStorage.setItem('prodpromo',prod);
        }
           }

        


        array.push(keys);


        sessionStorage.removeItem('promoid');
        sessionStorage.setItem('item',array);
        location.href = "checkout.php";
          
        }else{
          alert('Cart is Empty');
        }
        }
        else if(obj.id.toString().charAt(0) == 'P'){ //package

          var pkeys = Object.keys(obj).map(function (key) { return obj[key]; });
        
        if(ttp>0){
        parray.push(pkeys);
        
        sessionStorage.setItem('pitem',parray);
        location.href = "checkout.php";
          
        }else{
          alert('Cart is Empty');
        }
        }

        

        
      });



    },
    clickOnAddToCart: function($addTocart){
      
      goToCartIcon($addTocart);
    },
    getDiscountPrice: function(products) {
      var total = 0;
      $.each(products, function(){
        total += this.quantity * this.price;
      });
      return total * 0.5;
    }
  });

});
</script>
