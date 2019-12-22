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
            <h3 class="no-margin">Edit Shop</h3>
            <!--<span>Welcome back Mr.Admin</span>-->
        </div><!-- /page-title -->
        
        <ul class="page-stats">
            
           <!-- <li>
                <div class="value">
                    <span>My Income</span>
                    <h4>$<strong id="currentBalance">150</strong></h4>
                </div>
                
            </li>-->
        </ul><!-- /page-stats -->
    </div><!-- /main-header -->
    
    
    <div class="padding-md">
    <div class="costom-border-line">
        <form action="<?php echo SURL?>manage_shop/edit_shop_process" enctype="multipart/form-data" method="post" id="frm_add" >
        <!-- /.row -->
        <div class="costom-forem">
        <div class="row">
        <div class="col-md-12">
        <label class="">Shop Name</label>
       <input type="text" placeholder="Shop Name" required value="<?php echo $shop_detail[0]['shop_title']?>" id="shop_title" name="shop_title" class="form-control">
        </div><!--end of col-->

     
        </div><!--end of row-->
        <br>
        <div class="row">
        <div class="col-md-6">
        <label class="">Shop Start Time</label>
       <input type="time" placeholder="Shop Start Time" required value="<?php echo $shop_detail[0]['start_time']?>" name="start_time" class="form-control">
        </div><!--end of col-->
        <div class="col-md-6">
        <label class="">Shop Close Time</label>
       <input type="time" placeholder="Shop Close Time" required value="<?php echo $shop_detail[0]['close_time']?>"   name="close_time" class="form-control">
        </div><!--end of col-->
     
        </div><!--end of row-->
        <br>
        <div class="row">
        <div class="col-md-12">
        <label class="">Detail</label>
       <textarea rows="5" class="form-control" name="shop_detail"><?php echo $shop_detail[0]['shop_detail']?></textarea>
        </div><!--end of col-->
        
        </div><!--end of row-->
        <br>
        <div class="row">
        <div class="col-md-6">
        <label class="">Status</label>
		<select name="status" class="form-control">
        	<option <?php if($shop_detail[0]['status'] == 1){?> selected="selected" <?php }?> value="1">Active</option>
            <option <?php if($shop_detail[0]['status'] == 0){?> selected="selected" <?php }?> value="0">In-Active</option>
        </select>
        </div><!--end of col-->
        
        </div><!--end of row-->
        <br>
        <div class="row">
        <div class="col-md-12">
        <br><input type="hidden" value="<?php echo $shop_detail[0]['id']?>"  name="id" class="form-control">
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