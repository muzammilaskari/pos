<?php echo $header_script;?>
	<!-- Overlay Div -->
	<div id="overlay" class="transparent"></div>

	<div id="wrapper" class="preload">
		    <?php echo $header;?><!-- /top-nav-->
		<!-- /top-nav-->
        <!--Start Left Panel-->
        <?php echo $sidebar;?>	
		<!--End Left Panel-->
        
<div id="main-container">
    <div id="breadcrumb">
        <div id="topbar">
  <ol class="breadcrumb"><li class="active">Dashboard</li></ol>
</div>
    </div><!-- /breadcrumb-->
    <div class="main-header clearfix">
        <div class="page-title">
            <h3 class="no-margin">Change Password</h3>
            <!--<span>Welcome back Mr.Admin</span>-->
        </div><!-- /page-title -->
        
        <ul class="page-stats">
            
            <!--<li>
                <div class="value">
                    <span>My Income</span>
                    <h4>$<strong id="currentBalance">150</strong></h4>
                </div>
                
            </li>-->
        </ul><!-- /page-stats -->
    </div><!-- /main-header -->
    <div class="col-md-12">
					 <?php
                            if($this->session->flashdata('err_message')){
                        ?>
                                <div class="alert alert-danger"><center><?php echo $this->session->flashdata('err_message'); ?><center></div>
                        <?php
                            }//end if($this->session->flashdata('err_message'))
                            
                            if($this->session->flashdata('ok_message')){
                        ?>
                                <div class="alert alert-success alert-dismissable"><center><?php echo $this->session->flashdata('ok_message'); ?><center></div>
                        <?php 
                            }
                        ?>
                </div>
                <div id="pass_res"></div>
    <div>&nbsp;</div>
    
    <div class="padding-md">
    <div class="costom-border-line">
        <form action="<?php echo SURL?>manage_user/change_pass_process" enctype="multipart/form-data" method="post" id="frm_add" >
        <div id="pass_res"></div>
        <!-- /.row -->
        <div class="costom-forem">
        <div class="row">
        <div class="col-md-6">
        <label class="">Old Password</label>
       <input type="password" placeholder="Old Password" required id="old_password" name="old_password" class="form-control">
        </div><!--end of col-->
        <div class="col-md-6">
        <label class="">New Password</label>
       <input type="password" placeholder="Password" required id="new_password" name="new_password" class="form-control">
        </div><!--end of col-->
     
        </div><!--end of row-->
        <br>
        <div class="row">
        <div class="col-md-6">
        <label class="">Confirm Password</label>
       <input type="password" placeholder="Confirm Password" required id="confirm_password" name="confirm_password" class="form-control">
        </div><!--end of col-->
        <div class="col-md-6">
        
        </div><!--end of col-->
     
        </div><!--end of row-->
        <br>
        
        </div><!--end of row-->
        <div class="row">
        <div class="col-md-12">
        <br>
        <input type="submit" id="save" value="Update" class="btn btn-success btn-sm bounceIn animation-delay5 pull-right submit" />
        <!--<button class="btn btn-success btn-sm bounceIn animation-delay5 login-link pull-right submit" id="save" type="submit" name="submit" value="submit" ><i class="fa fa-sign-in"></i> Update</button>-->
        </div>
        </div>
        </div>
        </form>
	</div>
    </div><!-- /.padding-md -->
</div>
<script>
	$(function () {
        $("#save").click(function () {
            var password = $("#new_password").val();
            var confirmPassword = $("#confirm_password").val();
            if (password != confirmPassword) {
				//$("#pass_res").text("Passwords do not match.");
				$("#pass_res").html("<div class='alert alert-danger'>Password Mismatch</div>");
                return false;
            }
            return true;
        });
    });
	</script>	
	</div><!-- /wrapper -->

<?php echo $footer;?>