<div id="sidebar-floatdiv" class="col-md-3" style="position: relative;">
  <?php if(isset($session['PATIENT_ID']) && !empty($session['PATIENT_ID'])){ ?>
  
  <div class="memberlogin-wps col-md-12">
    <h2><?php echo $session['PATIENT_NAME']; ?></h2>    
    <div class="newuser-wps col-md-12"> 
    <a href="<?php echo base_url("index.php/myaccount"); ?>" class="btn btn-block btn-primary btn-grey<?php if($this->router->fetch_class() == 'myaccount'){ ?> active <?php } ?>">My Account</a> 
    <a href="<?php echo base_url("index.php/orders"); ?>" class="btn btn-block btn-primary btn-grey<?php if($this->router->fetch_class() == 'orders'){ ?> active <?php } ?>">My Orders</a> 
    <a href="<?php echo base_url("index.php/members/logout"); ?>" class="btn btn-block btn-primary btn-grey">Logout</a>
    </div>    
  </div>
  <?php  }else{ ?>
  <div class="memberlogin-wps col-md-12">
    <h2>Patient Login</h2>
    <div class="col-md-12">
    
      <?php if(isset($session['LOGIN_ERROR'])){ ?>
      <div class="error"><?php echo $session['LOGIN_ERROR']; ?></div>
      <?php } ?>
      <?php if(isset($session['FORGOT_SUCESS'])){ ?>
      <div class="sucess"><?php echo $session['FORGOT_SUCESS']; ?></div>
      <?php } ?>
      <div id="login">
      <form action="<?php echo base_url('index.php/members/login'); ?>" id="login-form" class="validate-form" role="form" method="post">
        <div class="form-group">
         
          <input type="text" name="userName" class="form-control required" id="exampleInputEmail1" onkeyup="gonext(this.event,1)"  placeholder="Username" >
        </div>
        <div class="form-group">
     
          <input type="password" name="password" class="form-control required" id="exampleInputPassword1" onkeyup="gonext(this.event,2)"  placeholder="Password" >
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary pull-right">LOGIN</button>
          <a class=" pull-right" onclick="showForgot(1);">FORGET PASSWORD</a>
          <!--<button type="button" class="btn btn-primary pull-right" onclick="showForgot(1);">FORGOT PASSWORD</button>-->
        </div>
      </form>
      </div>
	<div id="forgot" style=" display:none;">
      <form action="<?php echo base_url('index.php/members/forgot'); ?>" id="forgot-form" class="validate-form" role="form" method="post">
        <div class="form-group">
          <input type="text" name="emailid" class="form-control required email" id="emailid" placeholder="Email ID" >
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary pull-right">SUBMIT</button>
          <button type="button" class="btn btn-primary " onclick="showForgot(0);">Cancel</button>
        </div>
      </form>
	</div>
    </div>
    <div class="newuser-wps col-md-12">
     
      <a href="<?php echo base_url("index.php/members/register"); ?>" class="btn btn-block btn-primary btn-grey">Register</a> </div>
  </div>
  <?php } ?>
  
  <div id="floatDiv" class="col-md-12" style="position: absolute; top:255px; left: 0; z-index:1000;">
  
  <div class="col-md-12 cart-sdwps" id="show-cart-items">
      <?php $this->load->view('frontend/includes/sidecart');?>
    
  </div>
  
  </div>
  
</div>
<?php /*?><script type="text/javascript">
(function( $ ){
  $.fn.containedStickyScroll = function( options ) {
  
	var defaults = {  
		oSelector : this.selector,
		unstick : true,
		easing: 'linear',
		duration: 500,
		queue: false,
		closeChar: '^',
		closeTop: 0,
		closeRight: 0  
	}  
                  
	var options =  $.extend(defaults, options);
  
	if(options.unstick == true){  
		this.css('position','relative');
		this.append('<a class="scrollFixIt">' + options.closeChar + '</a>');
		jQuery(options.oSelector + ' .scrollFixIt').css('position','absolute');
		jQuery(options.oSelector + ' .scrollFixIt').css('top',options.closeTop + 'px');
		jQuery(options.oSelector + ' .scrollFixIt').css('right',options.closeTop + 'px');
		jQuery(options.oSelector + ' .scrollFixIt').css('cursor','pointer');
		jQuery(options.oSelector + ' .scrollFixIt').click(function() {
			getObject = options.oSelector;
			jQuery(getObject).animate({ top: "0px" },
				{ queue: options.queue, easing: options.easing, duration: options.duration });
			jQuery(window).unbind();
			jQuery('.scrollFixIt').remove();
		});
	} 
  	jQuery(window).scroll(function() {
  		getObject = options.oSelector;
        if(jQuery(window).scrollTop() > (jQuery(getObject).parent().offset().top) &&
           (jQuery(getObject).parent().height() + jQuery(getObject).parent().position().top - 30) > (jQuery(window).scrollTop() + jQuery(getObject).height())){
        	jQuery(getObject).animate({ top: (jQuery(window).scrollTop() - jQuery(getObject).parent().offset().top) + "px" }, 
            { queue: options.queue, easing: options.easing, duration: options.duration });
        }
        else if(jQuery(window).scrollTop() < (jQuery(getObject).parent().offset().top)){
        	jQuery(getObject).animate({ top: "0px" },
            { queue: options.queue, easing: options.easing, duration: options.duration });
        }
	});
  };
})( jQuery );
jQuery(document).ready(function(){
			jQuery('#floatDiv').containedStickyScroll();
		});
</script><?php */?>
<script type="text/javascript">

var intex=1;
var minheight="";
function text1(){
	if(document.body.clientWidth>768) {
		
		if(minheight!="")
			$('#sidebar-floatdiv').css('min-height',minheight);
		minheight=$('#sidebar-floatdiv').css('min-height');
		intex=2;
		var ele=document.getElementById('CartDivmob');
		if(ele!=null)
			ele.setAttribute('id','floatDiv');
		$('#floatDiv').attr('style','position: absolute;top:255px;    left: 0;     width: auto; z-index:1000;');
		$(window).scroll(function () {
		 var minlength=253;
		 
		 <?php if($this->router->fetch_class() == 'main' && $this->router->fetch_method() == 'index') { ?>
		 var height = $(".slide-wps").height()
		 if(height > 750)
		 minlength = 253;
		 else
		  minlength = 173;
		  
		  
		 if(height > 750)
		 minlength = (minlength + 502);
		 else
		  minlength = (minlength + 402);
		 <?php }else{ ?>
		  minlength = (minlength + 152);
		 <?php } ?>
		 var  toppos = ($(document).scrollTop()-minlength);
		 var maxhh=document.getElementById('footer').offsetTop-document.getElementById('floatDiv').offsetHeight - 400;
		 <?php if($this->router->fetch_class() == 'main' && $this->router->fetch_method() == 'index') { ?>
		 if(height > 750)
		  maxhh = (maxhh - 402);
		 else
		  maxhh = (maxhh - 302);
		 <?php }else{ ?>
		 maxhh = (maxhh - 402);
		 <?php } ?>
		 
		 set = ($(document).scrollTop()-minlength)+"px";
		if(toppos <253)
		 {
		  set="253px"; 
		 }
		
		 if(maxhh>toppos)
		  $('#floatDiv').animate({top:set},{duration:1000,queue:false});
		  
		});
		$(document).ready(function(){
		  var width = $('#floatDiv').outerHeight(true) + 253;
		  $('#sidebar-floatdiv').css('min-height', width+'px');
		  $( "#show-inner-cart-items" ).css('display','block');
		  $( "#carth2" ).off('click');
		});
		
	} else {
		$('#sidebar-floatdiv').css('min-height',0);
		if( $( "#show-inner-cart-items" ).css('display')!='none') {
			 $( "#show-inner-cart-items" ).css('display','block');
		} else {
			$('#show-inner-cart-items').hide();
		}
		if(intex==1)
			$('#show-inner-cart-items').hide();
		intex=2;
		
		if($("#floatDiv").length != 0) {
						
			var ele=document.getElementById('floatDiv');
			ele.setAttribute('id','CartDivmob');
			ele.removeAttribute('style');
			ele.style.top='0px';
		}
		$('#CartDivmob h2').click(function(e) { 
		$( "#show-inner-cart-items" ).toggle( "slow", function() {
		});
	});
	}
}
/*$(document).ready(function(e) {
   $( "#CartDivmob h2" ).on('click');
	//$( "#CartDivmob" ).click(function() {
	$(document).on('click', '#CartDivmob h2', function(e) { 
		$( "#show-inner-cart-items" ).toggle( "slow", function() {
		});
	});
});*/
$(document).ready(function(e) {
    text1();
	
});
$( window ).resize(function() {
	text1();
});
</script>
    
<script>
	function showForgot(id)
	{
		if(id==1){
			$('#forgot').show();
			$('#login').hide();
		} else {
			$('#forgot').hide();
			$('#login').show();
		}
	}
</script>
<script>
 function gonext(e,id)
  {
   if(keyCode==13) {
    if(id==1) {
   // e.preventDefault();
    document.getElementById('exampleInputPassword1').focus();
   }
    if(id==2) {
    //e.preventDefault();
    document.getElementById('login-form').submit();
   }
   }
  }</script>