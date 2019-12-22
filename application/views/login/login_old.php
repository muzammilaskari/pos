<!DOCTYPE html>

<html>

<head>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<meta charset="utf-8" />

<title>Inventory Managment</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<meta content="" name="description" />

<meta content="" name="author" />

<!-- BEGIN CORE CSS FRAMEWORK -->

<link href="<?php echo SURL; ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>

<link href="<?php echo SURL; ?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/css/animate.min.css" rel="stylesheet" type="text/css"/>

<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->

<link href="<?php echo SURL; ?>assets/css/style.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>

<!-- END CSS TEMPLATE -->

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="error-body no-top">

<div class="container">

  <div class="row login-container column-seperation">  

        <div class="text-center"><img src="<?php echo SURL; ?>assets/img/logo.png"></div>
		<br>
		<br>
		<div class="clearfix"></div>
		

        <div class="col-md-5 col-md-offset-4">

		
 <form id="frm_login" action="<?php echo SURL; ?>login" method="post" class="login-form">
		 <div class="row">

		 <div class="form-group col-md-10">

            <label class="form-label">Username</label>

            <div class="controls">

				<div class="input-with-icon  right">                                       

					<i class=""></i>

					<input type="text" name="txtusername" id="txtusername" class="form-control">                                

				</div>

            </div>

          </div>

          </div>

		  <div class="row">

          <div class="form-group col-md-10">

            <label class="form-label">Password</label>

            <span class="help"></span>

            <div class="controls">

				<div class="input-with-icon  right">                                       

					<i class=""></i>

					<input type="password" name="txtpassword" id="txtpassword" class="form-control">                                 

				</div>

            </div>

          </div>

          </div>

		  <div class="row">
<div id="error"></div>
          <div class="control-group  col-md-10">

            <div class="checkbox checkbox check-success"> 
			
              <input type="checkbox" id="checkbox1" value="1">

              <!--<label for="checkbox1">Keep me reminded </label>
			  <a href="forgot.php">Trouble login in?</a>-->


            </div>

          </div>

          </div>

          <div class="row">

            <div class="col-md-10">
  <input type="button" value="Login" id="login" class="btn btn-primary btn-cons pull-right">
            </div>

          </div>

		  </form>

        </div>

     

    

  </div>

</div>



<!-- END CONTAINER -->

<!-- BEGIN CORE JS FRAMEWORK-->

<script src="<?php echo SURL; ?>assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

<script src="<?php echo SURL; ?>assets/js/login.js" type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function() {  

        $("#frm_login").validate({

        }); 

        $("#login").click(function(){
            $.ajax({

                type: "POST",

                url: "<?php echo SURL; ?>login/login_process/",

                data: $("#frm_login").serialize(),

                success: function(result){
					 //$("#error").html(result);
					 if(result){
						 window.location.href = '<?php echo SURL; ?>dashboard';
					 }else{
						$("#error").show();
						$("#error").html("<div class='alert alert-danger'>Wrong User name or Password</div>"); 
					 }
                  /*if(result=='')
                  {
					 

                    $("#error").show();

                    $("#error").html("<div class='alert alert-danger'>Wrong Email or Password</div>");

                    //setTimeout(function(){ $("#error").hide(); }, 3000);

                  } 
                  else
                  {
					 
                      window.location.href = '<?php echo SURL; ?>dashboard';
                  } */               

                }

            });       

        });

    });

</script>

<!-- BEGIN CORE TEMPLATE JS -->

<!-- END CORE TEMPLATE JS -->

</body>

</html>