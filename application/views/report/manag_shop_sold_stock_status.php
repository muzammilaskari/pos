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
                        <strong>Shop Stock Sold </strong>
						<hr>
                         <div class="row">
                        <div class="col-md-3">
                        
                        <label>Start date</label>
                        <input type="text" class="form-control" name="selected_date1" value="<?php echo date('d-m-Y');?>" id="datepicker"/>
                       
                        </div>
                        <div class="col-md-3">
                       
                        <label>End Date</label>
                        <input type="text" class="form-control" name="selected_date2" value="<?php echo date('d-m-Y');?>" id="datepicker1"/>
                        
                        </div>
                       
                        
                        <div class="col-md-3 col-md-offset-1">
                        <label>Select Shop</label>
                        <div class="costom-control">
                        <?php if(count($all_shop_res)>0){?>
                        <select id="shop_list" class="form-control" onchange="product_roc()" >
                        <?php foreach($all_shop_res as $shop_detail){?>
							<option value="<?php echo $shop_detail['id'];?>"> <?php echo $shop_detail['shop_title'];?></option>
                        <?php }?>
                        </select>
                        <?php }?>
                        </div>
                        </div>
                        <div class="col-md-2">
                  <input type="button" name="calculate" onclick="product_roc()" id="calculate" value="View" class="btn costom-agline  btn-success btn-sm bounceIn animation-delay5 " />
                        <a target="_blank" href="#" id="print_hrf" class="btn costom-agline  btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-sign-in"></i> Print </a>
                        </div>
                        </div>
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
                                <!--<th>Date of Sale</th>-->
                                
                            </tr>
                        </thead>
                        <tbody id="res_responce">
                            
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
	//res_print()
  // we call the function
  $(function() {
	$("#datepicker").datepicker();
	
	$("#datepicker1").datepicker();
	// Pass the user selected date format.
	
	});
	
  product_roc();
});
	function del_rec(){
		if (confirm('Are you sure you want to Delete?')) {
			return true;
		} else {
			return false;
			// Do nothing!
		}
	}
	
	function res_print(){
		var p_id = $('#shop_list').val();
		var s_date = $("#datepicker").val();
		var e_date = $("#datepicker1").val();
		
		$("#print_hrf").attr("href", "<?php echo SURL; ?>manage_report/pdf_stock_sold_report_table/"+p_id+"/"+s_date+"/"+e_date)
		
	}
	
	function product_roc(){
		res_print();
		var p_id = $('#shop_list').val();
		var s_date = $("#datepicker").val();
		var e_date = $("#datepicker1").val();
		//alert(s_date);
		$.ajax({

                type: "POST",

                url: "<?php echo SURL; ?>manage_report/shop_stock_sold_report/",

                data: {s_id: p_id,s_date: s_date,e_date: e_date},

                success: function(result){
					 
						$("#res_responce").html(result);

                }

            });
		
	}
</script>	
	</div><!-- /wrapper -->

<?php echo $footer;?>