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
            <h3 class="no-margin">Edit Expense Detail</h3>
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
    <div>&nbsp;</div>
    
    <div class="padding-md">
    <div class="costom-border-line">
        <form action="<?php echo SURL?>manage_expense/edit_expense_detail_process" enctype="multipart/form-data" method="post" id="frm_add" >
        <div id="pass_res"></div>
        <!-- /.row -->
        <div class="costom-forem">
        <div class="row">
        <div class="col-md-6">
        <label class="">Expense Type</label>
       	<select name="type_id" class="form-control">
        	<?php foreach($all_type as $type){?>
        	<option <?php if($expense_detail[0]['type_id'] == $type['id']){?> selected="selected" <?php }?> value="<?php echo $type['id'];?>"><?php echo $type['expense_title'];?></option>
            <?php }?>
        </select>
        </div><!--end of col-->
        <div class="col-md-6">
        <label class="">Expense Amount</label>
       <input type="number" placeholder="Amount" value="<?php echo $expense_detail[0]['expense_amount']?>" required name="expense_amount" class="form-control">
        </div><!--end of col-->
     
        </div><!--end of row-->
        <br>
        <div class="row">
        <div class="col-md-6">
        <label class="">Expense Date</label>
       <input type="text" id="datepicker" value="<?php echo date('d-m-Y',strtotime($expense_detail[0]['expense_date']));?>" required name="expense_date" class="form-control">
        </div><!--end of col-->
        <div class="col-md-6">
        <label class="">Detail</label>
       <textarea rows="5" class="form-control" required name="expense_comment"> <?php echo $expense_detail[0]['expense_comment']?></textarea>
        </div><!--end of col-->
        
     
        </div><!--end of row-->
        <br>
        <div class="row">
        <div class="col-md-6">
        <label class="">Status</label>
		<select name="status" class="form-control">
        	<option <?php if($expense_detail[0]['status'] == 1){?> selected="selected" <?php }?> value="1">Active</option>
            <option <?php if($expense_detail[0]['status'] == 0){?> selected="selected" <?php }?> value="0">In-Active</option>
        </select>
        </div><!--end of col-->
        <div class="col-md-6">
        
        <!--<label class="">Address</label>
       <input type="text" class="form-control" placeholder="">-->
        </div><!--end of col-->
     
        </div><!--end of row-->
        <div class="row">
        <div class="col-md-12">
        <br>
        <input type="hidden" name="id" id="id" value="<?php echo $expense_detail[0]['id'];?>"  />
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
 
// Datepicker Popups calender to Choose date.
	$(function() {
	$("#datepicker").datepicker();
	
	});
});
	</script>	
	</div><!-- /wrapper -->

<?php echo $footer;?>