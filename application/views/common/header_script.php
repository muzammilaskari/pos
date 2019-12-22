<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Inventory :: Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <!-- Bootstrap core CSS -->
    
    <link href="<?php echo SURL; ?>assets/inner/css/bootstrap.min.css" rel="stylesheet">
	

    <!-- Font Awesome -->
	<link href="<?php echo SURL; ?>assets/inner/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Pace -->
	<link href="<?php echo SURL; ?>assets/inner/css/pace.css" rel="stylesheet">
	<link href="<?php echo SURL; ?>assets/inner/css/demo.css" rel="stylesheet">
	<link href="<?php echo SURL; ?>assets/inner/css/docs.css" rel="stylesheet">
	
	<!-- Color box -->
	<link href="<?php echo SURL; ?>assets/inner/css/colorbox/colorbox.css" rel="stylesheet">
	<!-- flatui -->
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<!-- Morris -->
	<link href="<?php echo SURL; ?>assets/inner/css/morris.css" rel="stylesheet"/>	
    
    	<!-- Datatable -->
	<link href="<?php echo SURL; ?>assets/inner/css/jquery.dataTables_themeroller.css" rel="stylesheet">
	
	<!-- Endless -->
	<link href="<?php echo SURL; ?>assets/inner/css/custom.min.css" rel="stylesheet">
	<link href="<?php echo SURL; ?>assets/inner/css/custom-skin.css" rel="stylesheet">
    
    
	<!-- Chosen -->
	<link href="<?php echo SURL; ?>assets/inner/css/chosen/chosen.min.css" rel="stylesheet"/>

	<!-- Datepicker -->
	<link href="<?php echo SURL; ?>assets/inner/css/datepicker.css" rel="stylesheet"/>
	
	<!-- Timepicker -->
	<link href="<?php echo SURL; ?>assets/inner/css/bootstrap-timepicker.css" rel="stylesheet"/>
	
	<!-- Slider -->
	<!--<link href="css/slider.css" rel="stylesheet"/>-->
	
	<!-- Tag input -->
	<link href="<?php echo SURL; ?>assets/inner/css/jquery.tagsinput.css" rel="stylesheet"/>

	<!-- WYSIHTML5 -->
	<link href="<?php echo SURL; ?>assets/inner/css/bootstrap-wysihtml5.css" rel="stylesheet"/>
	
	<!-- Dropzone -->
	<link href="<?php echo SURL; ?>assets/inner/css/dropzone/dropzone.css" rel="stylesheet"/>
        <link href="<?php echo SURL; ?>assets/inner/css/flexslider.css" rel="stylesheet"/>
	    
    <link href="<?php echo SURL; ?>assets/inner/css/style.css" rel="stylesheet">
   <link href="<?php echo SURL; ?>assets/inner/css/animate.css" rel="stylesheet">

   <!--<link href="js/zebra/css/demo.css" rel="stylesheet">-->
    
	<!-- Le javascript
  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery -->
<!--	<script src="assets/inner/js/jquery-1.10.2.min.js"></script>-->
<script src="<?php echo SURL; ?>assets/inner/js/jquery.min.js"></script>
<!--<script src="<?php echo SURL; ?>assets/inner/js/jquery-1.8.3.min.js"></script>-->
<!-- Bootstrap -->
<script src="<?php echo SURL; ?>assets/inner/js/bootstrap.min.js"></script>

<script src="<?php echo SURL; ?>assets/inner/js/sitefunctions.js"></script>


<!-- Chosen -->
<script src="<?php echo SURL; ?>assets/inner/js/chosen.jquery.min.js"></script>	

<!-- Mask-input -->
<script src="<?php echo SURL; ?>assets/inner/js/jquery.maskedinput.min.js"></script>	

<!-- Datepicker -->
<script src="<?php echo SURL; ?>assets/inner/js/bootstrap-datepicker.min.js"></script>	

<!-- Timepicker -->
<script src="<?php echo SURL; ?>assets/inner/js/bootstrap-timepicker.min.js"></script>	

<!-- Slider -->
<script src="<?php echo SURL; ?>assets/inner/js/bootstrap-slider.min.js"></script>	

<!-- Tag input -->
<script src="<?php echo SURL; ?>assets/inner/js/jquery.tagsinput.min.js"></script>	

<!-- WYSIHTML5 -->
<script src="<?php echo SURL; ?>assets/inner/js/wysihtml5-0.3.0.min.js"></script>	
<script src="<?php echo SURL; ?>assets/inner/js/uncompressed/bootstrap-wysihtml5.js"></script>	

<!-- Dropzone -->
<!--<script src='js/dropzone.min.js'></script>-->	

<!-- Modernizr -->
<script src="<?php echo SURL; ?>assets/inner/js/modernizr.min.js"></script>

<!-- Pace -->
<script src="<?php echo SURL; ?>assets/inner/js/pace.min.js"></script>

<!-- Popup Overlay -->
<script src="<?php echo SURL; ?>assets/inner/js/jquery.popupoverlay.min.js"></script>

<!-- Slimscroll -->
<script src="<?php echo SURL; ?>assets/inner/js/jquery.slimscroll.min.js"></script>

<!-- Cookie -->
<script src="<?php echo SURL; ?>assets/inner/js/jquery.cookie.min.js"></script>

<!-- Endless -->
<script src="<?php echo SURL; ?>assets/inner/js/customjs/customjs_form.js"></script>
<script src="<?php echo SURL; ?>assets/inner/js/customjs/customjs.js"></script>

<!-- Datatable -->
<script src="<?php echo SURL; ?>assets/inner/js/jquery.dataTables.min.js"></script>	

<!-- Modernizr -->
<script src="<?php echo SURL; ?>assets/inner/js/modernizr.min.js"></script>

<!-- Verify.js (with Notify.js included) -->
<!--<script src="<?php echo SURL; ?>assets/inner/js/verify.notify.min.js"></script>-->

<script type="text/javascript" src="<?php echo SURL; ?>assets/inner/js/flexslider/jquery.flexslider.js"></script>

<!--START: DATA GRID Files-->
    <script type="text/javascript" src="<?php echo SURL;?>assets/js/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo SURL;?>assets/js/jquery.dataTables/1.9.4/jquery.dataTables.delay.min.js"></script>
<!-- Datatable Bootstrap Addon -->


           
<script>
    /*
    $(function () {

        //jQuery popup overlay
        $('#darkCustomModal').popup({
            pagecontainer: '.container',
            transition: 'all 0.3s'
        });
        $('#dataTable').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "bSort": true,
            "iDisplayLength": 50,
            
           
            "aLengthMenu": [[50, 100, -1], [50, 100, "All"]],
            "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,
                    "order": [[ 9, "desc" ]]
                }]
        });
        $('#chk-all').click(function () {
            if ($(this).is(':checked')) {
                $('#responsiveTable').find('.chk-row').each(function () {
                    $(this).prop('checked', true);
                    $(this).parent().parent().parent().addClass('selected');
                });
            }
            else {
                $('#responsiveTable').find('.chk-row').each(function () {
                    $(this).prop('checked', false);
                    $(this).parent().parent().parent().removeClass('selected');
                });
            }
        });
    });*/</script>
    <script>
   /* $('body').on('click', '#forgot_pass_link', function () {
        $("#fgotpass_panel").show('slow');
        $("#loginPanel").hide('slow');
    });
    $('body').on('click', "#login-back", function () {
        $("#fgotpass_panel").hide('slow');
        $("#loginPanel").show('slow');
    }); 
       

    
   $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 112,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: true,
        
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });*/
</script>    
  </head><body class="overflow-hidden">