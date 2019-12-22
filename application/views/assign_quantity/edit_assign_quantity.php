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
            <h3 class="no-margin">Assign Quantity</h3>
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
                        <div class="alert alert-danger">
                        <center><?php echo $this->session->flashdata('err_message'); ?></center>
                        </div>
                <?php
                    }//end if($this->session->flashdata('err_message'))
                ?>
	</div>
    
    <div class="padding-md">
    <div class="costom-border-line">
        <form action="<?php echo SURL?>manage_assign_shop/edit_assign_quantity_process" enctype="multipart/form-data" method="post" id="frm_add" >
        <!-- /.row -->
        <div class="costom-forem">
        <div class="row">
        <div class="col-md-6">
        <label class="">Shop Name</label>
			<select name="shop_id" class="form-control">
				<?php foreach($all_shop as $shop_value){?>
                <option <?php if($shop_value['id'] == $assign_detail[0]['shop_id']){?> selected="selected"<?php }?> value="<?php echo $shop_value['id'];?>"><?php echo $shop_value['shop_title'];?></option>
                <?php }?>
            </select>
        </div><!--end of col-->
        <div class="col-md-6">
        <label class="">Product Name</label>
        <select name="product_id" class="form-control">
			<?php foreach($all_product as $shop_value){?>
            <option <?php if($shop_value['id'] == $assign_detail[0]['product_id']){?> selected="selected"<?php }?>  value="<?php echo $shop_value['id'];?>"><?php echo $shop_value['product_name'];?></option>
            <?php }?>
        </select>
        </div><!--end of col-->
     
        </div><!--end of row-->
        <br>
        <div class="row">
        <div class="col-md-6">
        <label class="">Previous Quantity</label>
		<input type="number" name="quantity" readonly="readonly" value="<?php echo $assign_detail[0]['quantity'];?>" id="quantity" required="required" class="form-control" />
        </div><!--end of col-->
        <div class="col-md-6">
        <label class="">New Quantity</label>
		<input type="number" name="new_quantity" value="" id="quantity" class="form-control" />
        </div><!--end of col-->
     
        </div><!--end of row-->
        <br>
        <!--end of row-->
        <div class="row">
        <div class="col-md-12">
        <br>
        <input type="submit" id="save" value="Assign" class="btn btn-success btn-sm bounceIn animation-delay5 pull-right submit" />
        
        <!--<button class="btn btn-success btn-sm bounceIn animation-delay5 login-link pull-right submit" id="save" type="submit" name="submit" value="submit" ><i class="fa fa-sign-in"></i> Update</button>-->
        </div>
        </div>
        </div>
        </form>
	</div>
    </div><!-- /.padding-md -->
</div>
	
	</div><!-- /wrapper -->

<?php echo $footer;?>