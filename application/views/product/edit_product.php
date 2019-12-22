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
            <h3 class="no-margin">Edit Product</h3>
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
        <form action="<?php echo SURL?>manage_product/edit_product_process" enctype="multipart/form-data" method="post" id="frm_add" >
        <!-- /.row -->
        <div class="costom-forem">
        <div class="row">
        <div class="col-md-6">
        <label class="">Product Name</label>
       <input type="text" placeholder="Product Name" required id="product_name" value="<?php echo $product_detail[0]['product_name']?>" name="product_name" class="form-control">
        </div><!--end of col-->
        <div class="col-md-6">
        <label class="">Quantity</label>
       <input type="text" readonly="readonly" placeholder="Product Quentity" required id="quantity" value="<?php echo $product_detail[0]['quantity']?>" name="quantity" class="form-control">
        </div><!--end of col-->
     
        </div><!--end of row-->
        <br>
        <div class="row">
        <div class="col-md-6">
        <label class="">New Quantity</label>
       <input type="text" placeholder="Product Quentity" id="new_quantity" value="" name="new_quantity" class="form-control">
        </div><!--end of col-->
        <div class="col-md-6">
        <label class="">Price</label>
       <input type="text" placeholder="Price" required id="price" name="price"  value="<?php echo $product_detail[0]['price']?>"class="form-control">
        </div><!--end of col-->
     
        </div><!--end of row-->
        <br>
        <div class="row">
        <div class="col-md-6">
        <label class="">Reorder Level</label>
       <input type="text" placeholder="Reorder Level" required id="reorder_level" value="<?php echo $product_detail[0]['reorder_level']?>" name="reorder_level" class="form-control">
        </div><!--end of col-->
        <div class="col-md-6">
        <div id="pass_res"></div>
        <label class="">Status</label>
		<select name="status" class="form-control">
        	<option <?php if($product_detail[0]['status'] == 1){?> selected="selected" <?php }?> value="1">Active</option>
            <option <?php if($product_detail[0]['status'] == 0){?> selected="selected" <?php }?> value="0">In-Active</option>
        </select>
        </div><!--end of col-->
     
        </div><!--end of row-->
        <div class="row">
        <div class="col-md-12">
        <br><input type="hidden" name="id" value="<?php echo $product_detail[0]['id']; ?>" class="form-control">
        <input type="submit" id="save" value="Update" class="btn btn-success btn-sm bounceIn animation-delay5 pull-right submit" />
        
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