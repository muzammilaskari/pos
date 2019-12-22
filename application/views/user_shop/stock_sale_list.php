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
    
    
    <div class="padding-md">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                        <div id="placeholder"  style="height:1px; visibility:hidden;"></div>
                
                
                </div><!-- /panel -->
                        
        
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong><h3>Sales Detail </h3></strong>
						<hr>
                        <a href="<?php echo base_url();?>user_shop/sales_sheet" class="btn btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-sign-in"></i>Return to Sale Sheet</a>
                        <!--<a href="<?php echo base_url();?>manage_product/add_product" class="btn btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-sign-in"></i> Add Product</a>-->
        <!--<button class="btn btn-success btn-sm bounceIn animation-delay5 " id="submit" type="submit" name="submit" value="submit" ><i class="fa fa-sign-in"></i> Add</button>-->
                        <!--<span class="badge badge-info pull-right">	
                            <a href="#" style="color:#fff;">View All</a>
                        </span>-->
                    </div>
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
                    
                    
                    <div class="costom-table-agline">
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="costom-thead-bg">
                            <tr>
                                <td>#</td>
                                <td>Comments</td>
                                <td>Product Names</td>
                                <td>Total Price</td>
                                <td>Sales Reference</td>
                                <td>Payment Method</td>
                                <td>Discount (%)</td>
                                <td>Date</td>
                                <td>Detail View</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($shop_sale_stock) && (count($shop_sale_stock) > 0)){$count = 1;
									foreach($shop_sale_stock as $res){ $temp_str = '';	
							?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $res['sale_note']; ?></td>
                                <td>
								<?php foreach($product_sale_stock as $product_name){
										if($product_name['sale_id'] == $res['id']){
									?>
                                <?php $temp_str .= $product_name['product_name'].','; ?>
                                <?php }	}
								echo rtrim($temp_str,',');
								?>
                                </td>
                                <td><?php echo $res['total']; ?></td>
                                <td>
								<?php foreach($product_sale_stock as $product_name){
										if($product_name['sale_id'] == $res['id']){
									?>
                                <?php echo $product_name['sale_ref']; ?>
                                <?php break;}	}?>
                                </td>
                                <td><?php if($res['payment_method']==0){ echo 'Cash'; }elseif($res['payment_method']==0){ echo 'Card';}else{echo 'Card';}?></td>
                                <td><?php echo $res['discount']; ?></td>
                                <td><?php echo date('M d Y',strtotime($res['created_date'])); ?></td>
                                <td><a href="<?php echo base_url();?>user_shop/sale_detail_result/<?php echo $res['id'];?>">View</a></td>
                               
                            </tr>
                            <?php $count++;}
							}else{?>
                            <tr>
                                <td colspan="4">No record Found</td>
                            </tr>
                            <?php }?>
                            
                        </tbody>
                    </table>
                    </div>
                    </div>
                </div><!-- /panel -->
                
            </div><!-- /.col -->
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.padding-md -->
</div>
<script>
	function del_rec(){
		if (confirm('Are you sure you want to Delete?')) {
			return true;
		} else {
			return false;
			// Do nothing!
		}
	}
</script>	
	</div><!-- /wrapper -->

<?php echo $footer;?>