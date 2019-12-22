<?php echo $header_script;?>
<style>
.printable{
		display:none!important;
	}
</style>
<style type="text/css" media="print">
    
    @media print {
    .print_pdf_btn {
        display: none !important;
    }
    .print_logo {
        width: 135px !important;
        height: 65px !important;
        margin-bottom: -50px !important;
    }
	
	.table {
		border-collapse: collapse !important;
	  }
	 #wrapper{
		 display:none!important;
	 }
	 .printable{
		display:block!important;
		height:300px;
	}
	

}
</style>
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
                        <a href="<?php echo base_url();?>user_shop/sales_sheet" class="btn btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-shopping-cart"></i> Return to Sale Sheet</a>
                        
                         <a target="_blank" href="<?php echo base_url();?>user_shop/sales_detial_report/<?php echo $sales_detail['id'];?>" class="btn btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-file-pdf-o"></i> Print as PDF</a>
                       <a href="javascript:window.print()" class="btn btn-sm btn-success print bounceIn animation-delay5"><i class="fa fa-print"></i> Print</a>
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
                                <td>Sr No</td>
                                <td>Product Names</td>
                                <td>Product Code</td>
                                <td>Unit Price</td>
                                <td>Quantity</td>
                                <td>Total Price</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
							
							if(isset($sales_product_detail) && (count($sales_product_detail) > 0)){
								$total_price=0;
							?>
    						<?php 
							
							foreach($sales_product_detail as $key=>$res){
							$total_price = $total_price + ($res['price']*$res['quantity']);
								
							?>
                            <tr>
                                <td><?php echo $key+1;?></td>
                                <td><?php echo $res['name']; ?></td>
                                <td><?php echo $res['code']; ?></td>
                                <td><?php echo $res['price']; ?></td>
                                <td><?php echo $res['quantity']; ?></td>
                                <td><?php echo $res['price']*$res['quantity']; ?></td>
                                <!--<td><?php //if($res['payment_method']==0){ echo 'Cash'; }elseif($res['payment_method']==0){ echo 'Card';}else{echo 'Card';}?></td>-->
                               
                            </tr>
                            <?php }?>
                            <tr>
                                    <td colspan="5" style="text-align:right;">Total: </td>
									<td><b><?php echo $total_price;?></b></td> 
                            </tr>
                            <tr>
                                    <td colspan="5" style="text-align:right;">Discount: </td>
									<td><b><?php echo $sales_detail['discount'];?> %</b></td>
                                    
                            </tr>
						    <tr>
                                    <td colspan="5" style="text-align:right;">Grand Total: </td>
									<td><b><?php echo $sales_detail['total'];?></b></td> 
                            </tr>
							<?php }else{?>
                            <tr>
                                <td colspan="6">No record Found</td>
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
<div class="printable">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title row">
    			<div class="col-md-2" style="width:361px;">
                    <img class="img-responsive print_logo" src="<?php echo base_url()?>assets/invoice/images/logo.png">
                </div>
                <div class="col-md-10">
                	<h5 class="pull-right" style="float:right; width:400px; text-align:right;"></h5>
                </div>
    		</div>
    		<hr>
    		
    		
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div>
    			<!--<div class="panel-heading">
    				<h3 class="panel-title"><strong>Transaction Detail</strong></h3>
    			</div>-->
    			<!--<div class="panel-body">-->
    				<div class="table-responsive">
					    <!--<p><b>Transaction Date :</b> <?php echo date('d M, Y', strtotime($sales_detail['created_date']));?></p>-->
					    <?php 
						if($sales_detail['payment_method']==1){
							$payment_method="Card"; ?>
							<p><b>Pay By : </b><?php echo $payment_method;?></p>
							<?php if($sales_detail['sale_note']!=""){ ?>
							<p><b>Card Number : </b><?php echo $sales_detail['sale_note'];?></p>
						<?php }
						}
						else if($sales_detail['payment_method']==2){
							$payment_method="Online";?>
							<p><b>Pay By : </b><?php echo $payment_method;?></p>
							<?php if($sales_detail['sale_note']!=""){ ?>
							<p><b>Description : </b><?php echo $sales_detail['sale_note'];?></p>
						<?php }
						}
						else{
							$payment_method="Cash";
						?>
							<p><b>Transaction Date :</b> <?php echo date('d M, Y', strtotime($sales_detail['created_date']));?> &nbsp; &nbsp;<b>Bill No: </b><?php echo $sales_detail['id'];?></p>
                            <!--<p><b>Pay By : </b><?php echo $payment_method;?></p>-->
							<?php if($sales_detail['sale_note']!=""){ ?>
							<p><?php echo $sales_detail['sale_note'];?></p>
						<?php }
						}
						?>
						
					    
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td style="border:solid 1px #ddd; padding:5px;" class="text-center"><strong>Sr No</strong></td>
        							<td style="border:solid 1px #ddd; padding:5px;" class="text-center"><strong>Product Names</strong></td>
                                    
                                    <td  style="border:solid 1px #ddd;padding:5px;" class="text-center"><strong>Unit Price</strong></td>
                                    <td  style="border:solid 1px #ddd;padding:5px;" class="text-center"><strong>Quantity</strong></td>
                                    <td  style="border:solid 1px #ddd;padding:5px;" class="text-center"><strong>Total Price</strong></td>
                                    
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <?php if(isset($sales_product_detail) and count($sales_product_detail)>0){
									$total_price=0;
								?>
    							<?php foreach($sales_product_detail as $key=>$res){
									$total_price = $total_price + ($res['price']*$res['quantity']);
								?>
                                <tr>
    								<td style="border:solid 1px #ddd;padding:5px;"><?php echo $key+1;?></td>
    								<td style="border:solid 1px #ddd;padding:5px;"><?php echo $res['name']; ?></td>
    								
                                    <td style="border:solid 1px #ddd;padding:5px;"><?php echo $res['price']; ?></td>
    								<td style="border:solid 1px #ddd;padding:5px;"><?php echo $res['quantity']; ?></td>
                                    <td style="border:solid 1px #ddd;padding:5px;"><?php echo $res['price']*$res['quantity']; ?></td>
    							</tr>
                                <?php }?>
								<tr>
                                    <td colspan="4" style="border:solid 1px #ddd;padding:5px;text-align:right;">Total: </td>
									<td style="border:solid 1px #ddd;padding:5px;"><b><?php echo $total_price;?></b></td> 
                            	</tr>
                                <tr>
                                    <td colspan="4" style="border:solid 1px #ddd;padding:5px;text-align:right;">Discount: </td>
									<td style="border:solid 1px #ddd;padding:5px;"><b><?php echo $sales_detail['discount'];?> %</b></td>
                                    
                            	</tr>
								<tr>
                                    <td colspan="4" style="border:solid 1px #ddd;padding:5px;text-align:right;">Grand Total: </td>
									<td style="border:solid 1px #ddd;padding:5px;"><b><?php echo $sales_detail['total'];?></b></td> 
                            	</tr>
								
								<?php }?>
    						</tbody>
    					</table>
    				</div>
    			<!--</div>-->
            </div>
            
            <div class="clearfix"></div>
            
			
            
            
    	</div>
    </div>
    
</div>