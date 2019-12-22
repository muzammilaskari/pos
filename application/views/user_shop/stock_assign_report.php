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
                    <style>.panel.panel-default .panel-heading{ padding-bottom:82px;}</style>    
        
                <div class="panel panel-default">
                
                    <div class="panel-heading">
                        <strong>Stock Assign Report</strong>
						<hr>
                        <div class="col-md-3">
                        <label>Select date</label>
                        <input type="text" class="form-control" name="selected_date1" value="<?php echo date('d-m-Y');?>" id="datepicker"/>
                        </div>
                        <div class="col-md-2">
                        <input type="button" name="calculate" onclick="product_roc()" id="calculate" value="View" class="btn costom-agline btn-success btn-sm bounceIn animation-delay5 " />
                        
                        </div>
                        
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
                                <!--<th>Date of Add</th>-->
                            </tr>
                        </thead>
                        <tbody id="res_responce">
                        <?php if(isset($shop_assign_stock) && (count($shop_assign_stock)>0)){$count = 1;?>
                        <?php foreach($shop_assign_stock as $product_assign){?>
                        	<tr>
                            	<td><?php echo $count;?></td>
                                <td><?php echo $product_assign['product_name'];?></td>
                                <td><?php echo $product_assign['quantity'];?></td>
                                <!--<td><?php echo date('Y-m-d',strtotime($product_added['created_date']));?></td>-->
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
                    <div></div>
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
  //product_roc();
// Datepicker Popups calender to Choose date.
	$(function() {
	$("#datepicker").datepicker();
	
	});
});
	
	
	function product_roc(){
		//alert('testing');
		var s_date = $("#datepicker").val();
		
		$.ajax({

                type: "POST",

                url: "<?php echo SURL; ?>user_shop/assign_stock_process/",

                data: {s_date: s_date},

                success: function(result){
					 
						$("#res_responce").html(result);

                }

            });
		
	}
	

	
	
</script>	
	</div><!-- /wrapper -->

<?php echo $footer;?>