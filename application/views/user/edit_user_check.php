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
        <h3 class="no-margin">Edit User</h3>
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
    
    <div class="padding-md">
        <div class="costom-border-line">
            <form action="<?php echo SURL?>edit_check_in_out/edit_check_process" enctype="multipart/form-data" method="post" id="frm_add" >
                <div id="pass_res"></div>
                <!-- /.row -->
                <div class="costom-forem">
                   <div class="row">
                        <div class="col-md-6">
                            <label class="">User Name</label>
                            <input type="text" readonly="readonly" value="<?php echo $user_data[0]['user_name'];?>" placeholder="Shop Login" required name="user_name" class="form-control">
                        </div><!--end of col-->
                        <div class="col-md-6">
                            <label class="">Shop Title</label>
                            <input type="text" readonly="readonly" value="<?php echo $user_data[0]['shop_title'];?>" placeholder="Shop Title" required name="shop_title" class="form-control">
                        </div><!--end of col-->
 
                    </div><!--end of row-->
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="">Check In Time</label>
                            <input type="text"  value="<?php echo $user_data[0]['check_in_time'];?>" placeholder="Check In Time" id="datepicker" required name="check_in_time" class="form-control">
                        </div><!--end of col-->
                        <div class="col-md-6">
                            <label class="">Check Out Time</label>
                            <input type="text" value="<?php echo $user_data[0]['check_out_time'];?>" placeholder="Check Out Time" id="datepicker2" required name="check_out_time" class="form-control">
                        </div><!--end of col-->
                   </div><!--end of row-->
                   <br>
                   <div class="row">
                   <div class="col-md-6">
                            <label class="">Total Hours</label>
                            <input type="text" readonly="readonly" value="<?php echo $user_data[0]['total_hours'];?>" placeholder="Total Hours" required name="total_hours" class="form-control">
                        </div><!--end of col-->
                    <div class="col-md-6">
                        <label class="">Salary Per Hour</label>
                        <input type="text"  value="<?php echo $user_data[0]['salary_per_h'];?>" placeholder="Salary Per Hour" required name="salary_per_h" id="salary_per_h" class="form-control">
                    </div><!--end of col-->
                </div><!--end of row-->
                 <br>
                   <div class="row">
                   <div class="col-md-6">
                            <label class="">Total Salary</label>
                            <input type="text" readonly="readonly" value="<?php echo $user_data[0]['total_salary'];?>" placeholder="Total Salary" required name="total_salary" class="form-control">
                        </div><!--end of col-->
                </div><!--end of row-->
                <div class="row">
                    <div class="col-md-12">
                        <br><input type="hidden"  name="id" value="<?php echo $user_data[0]['id']; ?>" class="form-control">
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
      $(document).ready(function(){
  // we call the function
  //product_roc();
  //product_roc();
// Datepicker Popups calender to Choose date.
$(function() {
    $("#datepicker").datepicker();
    
});
$(function() {
    $("#datepicker2").datepicker();
    
});
});
	$(function () {
        $("#save").click(function () {
            var password = $("#password").val();
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