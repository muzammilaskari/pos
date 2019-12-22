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
                        <strong>Warehouse Stock Status </strong>
						<hr>
                        <a target="_blank" href="<?php echo base_url();?>manage_report/pdf_overall_stock_status_tables" class="btn btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-sign-in"></i> Print </a>
                        <!--<a href="<?php echo base_url();?>manage_assign_shop/assign_quantity" class="btn btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-sign-in"></i> Quantity Assign</a>-->
        <!--<button class="btn btn-success btn-sm bounceIn animation-delay5 " id="submit" type="submit" name="submit" value="submit" ><i class="fa fa-sign-in"></i> Add</button>-->
                        <!--<span class="badge badge-info pull-right">	
                            <a href="#" style="color:#fff;">View All</a>
                        </span>-->
                    </div>
                    </div>
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
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Reorder</th>
                            </tr>
                        </thead>
                        <tbody id="res_responce">
                        <?php if(isset($all_product) && (count($all_product)>0)){$count = 1;?>
                        <?php foreach($all_product as $product){?>
                        	<tr>
                            	<td><?php echo $count;?></td>
                                <td><?php echo $product['product_name'];?></td>
                                <td><?php echo $product['quantity'];?></td>
                                <td><?php echo $product['price'];?></td>
                                <td><?php echo $product['reorder_level'];?></td>
                            </tr>
                        <?php $count++;}?>
                        <?php }else{?>
                        	<tr>
                            	<td colspan="4">No Record Found</td>
                            </tr>
                        <?php }?>
                            
                        </tbody>
                    </table>
                    </div>
                    </div>
                    <div ></div>
                </div><!-- /panel -->
                
            </div><!-- /.col -->
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.padding-md -->
</div>

<script>
$(document).ready(function(){
  // we call the function
  //product_roc();
});
	
	
</script>	
	</div><!-- /wrapper -->

<?php echo $footer;?>