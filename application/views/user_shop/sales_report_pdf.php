<!DOCTYPE html>
<html>
<head>
<title>POS | Transaction </title>
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
	 

}
</style>
<!--<link href="<?php echo base_url()?>assets/invoice/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/invoice/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
-->
</head>
<body>


<div class="container">
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
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Transaction Detail</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td style="border:solid 1px #ddd; padding:5px;"><strong>Sr No</strong></td>
        							<td style="border:solid 1px #ddd; padding:5px;" class="text-center"><strong>Product Names</strong></td>
                                    <td  style="border:solid 1px #ddd;padding:5px;" class="text-center"><strong>Product Code</strong></td>
                                    <td  style="border:solid 1px #ddd;padding:5px;" class="text-right"><strong>Unit Price</strong></td>
                                    <td  style="border:solid 1px #ddd;padding:5px;" class="text-center"><strong>Quantity</strong></td>
                                    <td  style="border:solid 1px #ddd;padding:5px;" class="text-center"><strong>Total Price</strong></td>
                                    
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <?php if(isset($sales_product_detail) and count($sales_product_detail)>0){
    							$total_price=0;
								?>
								<?php 
								
								foreach($sales_product_detail as $key=>$res){
								$total_price = $total_price + ($res['price']*$res['quantity']);
									
								?>
                                <tr>
    								<td style="border:solid 1px #ddd;padding:5px;"><?php echo $key+1;?></td>
    								<td style="border:solid 1px #ddd;padding:5px;" class="text-center"><?php echo $res['name']; ?></td>
    								<td style="border:solid 1px #ddd;padding:5px;" class="text-center"><?php echo $res['code']; ?></td>
                                    <td style="border:solid 1px #ddd;padding:5px;" class="text-right"><?php echo $res['price']; ?></td>
    								<td style="border:solid 1px #ddd;padding:5px;" class="text-center"><?php echo $res['quantity']; ?></td>
                                    <td style="border:solid 1px #ddd;padding:5px;" class="text-center"><?php echo $res['price']*$res['quantity']; ?></td>
    							</tr>
                                <?php }?>
                                <tr>
                                    <td colspan="5" style="border:solid 1px #ddd;padding:5px;text-align:right;">Total: </td>
									<td style="border:solid 1px #ddd;padding:5px;"><b><?php echo $total_price;?></b></td> 
                            	</tr>
                                <tr>
                                    <td colspan="5" style="border:solid 1px #ddd;padding:5px;text-align:right;">Discount: </td>
									<td style="border:solid 1px #ddd;padding:5px;"><b><?php echo $sales_detail['discount'];?> %</b></td>
                                    
                            	</tr>
								<tr>
                                    <td colspan="5" style="border:solid 1px #ddd;padding:5px;text-align:right;">Grand Total: </td>
									<td style="border:solid 1px #ddd;padding:5px;"><b><?php echo $sales_detail['total'];?></b></td> 
                            	</tr>
								<?php }else{?>
                                <tr>
                                    <td style="border:solid 1px #ddd;padding:5px;" colspan="6"> No record Found</td>
                                </tr>
                                <?php }?>
    						</tbody>
    					</table>
    				</div>
    			</div>
            </div>
            
            <div class="clearfix"></div>
            
			
            
            
    	</div>
    </div>
    
</div>

</body>
</html>