<!DOCTYPE html>
<html>
  <head>
    <title>
      Login | Inventory Management
    </title>
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo SURL; ?>assets/stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo SURL; ?>assets/stylesheets/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
    <link href="<?php echo SURL; ?>assets/stylesheets/hightop-font.css" media="all" rel="stylesheet" type="text/css" /><link href="<?php echo SURL; ?>assets/stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
    <script src="<?php echo SURL; ?>assets/javascripts/jquery-1.8.3.min.js" type="text/javascript"></script>
	<!--<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>-->
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/raphael.min.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/jquery.mousewheel.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/jquery.vmap.min.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/jquery.vmap.sampledata.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/jquery.bootstrap.wizard.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/fullcalendar.min.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/gcal.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/datatable-editable.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/jquery.easy-pie-chart.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/excanvas.min.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/jquery.isotope.min.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/masonry.min.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/modernizr.custom.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/select2.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/styleswitcher.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/wysiwyg.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/jquery.inputmask.min.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/jquery.validate.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/bootstrap-fileupload.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/bootstrap-timepicker.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/bootstrap-colorpicker.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/bootstrap-switch.min.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/daterange-picker.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/date.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/morris.min.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/skycons.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/jquery.sparkline.min.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/fitvids.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/main.js" type="text/javascript"></script>
	<script src="<?php echo SURL; ?>assets/javascripts/respond.js" type="text/javascript"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  </head>
  <style>body.login1 .login-container {
	  height:auto;
	  }
  </style>
  <body class="login1">
  <div class="container">
  <div class="row text-center">
  <div class="col-md-12">
  <div class="costom-form-logo">	
  <img  src="<?php echo SURL; ?>assets/images/t1-user_profile_1.png" alt="user avatar" />
  </div>
  </div>
  </div>
  </div>
    <!-- Login Screen -->
    <div class="login-wrapper">
    
      <div class="login-container">
      
        <h1>
          <a href="#">Inventory Management System</a>
        </h1>
        <form id="frm_login" action="<?php echo SURL; ?>login" method="post" class="login-form">
          <div class="form-group">
            <input type="text" name="txtusername" id="txtusername" placeholder="User Name" class="form-control">
          </div>
          <div class="form-group">
            <!--<input class="form-control" placeholder="Password" type="text">-->
            <input type="password" name="txtpassword" placeholder="Password" id="txtpassword" class="form-control">
          </div>
          <div class="form-options clearfix">
            <!--<a class="pull-right" href="#">Forgot password?</a>-->
            <div class="text-left">
              <!--<label class="checkbox"><input type="checkbox"><span>Remember me</span></label>-->
            </div>
          </div>
         <div id="error"></div> 
          
         
        <div class="form-options clearfix">
        	<input type="button" value="Login" id="login" class="btn btn-danger full_width">
          <!--<a class="btn btn-danger full_width" href="index.html">Submit</a>-->
        </div> 
        </form>
        <p class="signup">
          <a style="display:none" data-toggle="modal" href="#tallModal" id="login_popup" class="btn btn-danger full_width">Submit</a>
        </p>
      </div>
    </div>
<div id="tallModal" class="modal modal-wide fade">
  <div class="modal-dialog">
  <div class="started-modal-contant">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Select Shop</h4>
      </div>
      <div class="modal-body">
      <div class="container row_for_mobile">
        <div class="row text-center">
        <?php if(isset($all_shop) && (count($all_shop)>0)){
				foreach($all_shop as $shop_res){
			?>
        		<div class="col-md-2 col-sm-3 col-xs-6">
					<div class="start-popup-box">
						<a href="<?php echo base_url();?>user_shop/shop_detail/<?php echo $shop_res['id'];?>"><h3><?php echo $shop_res['shop_title'];?></h3></a>
						<a href="<?php echo base_url();?>user_shop/shop_detail/<?php echo $shop_res['id'];?>"></i><i class="fa fa-shopping-cart fa-3x"></i></a>
					</div><!--start-modal-box-->
				</div>
        <?php }}else{?>
        	<div class="col-md-3">
                <div class="start-popup-box">
                    <p>No Result Found</p>
                </div><!--start-modal-box-->
            </div>
        <?php }?>
      </div><!--end of row-->
      
      </div><!--end of container-->
      </div>
      
    </div><!-- /.modal-content -->
    </div>
  </div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">

    /*$(document).ready(function() {  

        $("#frm_login").validate({

        }); */

        $("#login").click(function(){
			
            $.ajax({

                type: "POST",

                url: "<?php echo SURL; ?>login/login_process/",

                data: $("#frm_login").serialize(),

                success: function(result){
					 //$("#error").html(result);
					 if(result==1){
						 window.location.href = '<?php echo SURL; ?>dashboard';
						 //$('#login_popup').trigger('click');
						 //$('#login_popup').click();
					 }else if(result==2){
						 $('#login_popup').click();
					 }else{
						$("#error").show();
						$("#error").html("<div class='alert alert-danger'>Wrong User name or Password</div>"); 
					 }
                                

                }

            });       

        //});

    });
	
	$('input').keyup(function(e){
    if(e.keyCode == 13)
		{
			//alert('testing');
			$('#login').trigger('click');
		}
	});
	
	/*$(".modal-wide").on("show.bs.modal", function() {
		var height = $(window).height() - 200;
		$(this).find(".modal-body").css("max-height", height);
	});*/

</script>
    <!-- End Login Screen -->
  </body>
</html>