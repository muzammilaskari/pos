<?php echo $header_script;?>
	<!-- Overlay Div -->
<style>.bg-success1{ background-color:#0088c6;}</style>
	<div id="overlay" class="transparent"></div>
 <div id="wrapper" class="preload">
 		    <?php echo $header;?>
            <!-- /top-nav-->
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
            <h3 class="no-margin">Dashboard</h3>
            <span>Welcome <?php echo $this->session->userdata('user_name');?></span>
        </div><!-- /page-title -->
        
        <ul class="page-stats">
            
            <li>
               <!--  <div class="value">
                    <span>My Income</span>
                    <h4>$<strong id="currentBalance">150</strong></h4>
                </div> -->
                <?php if($this->session->userdata('check_in_status')==0){ ?>
                <a href="<?php echo base_url();?>check_in_out/check_in" class="btn btn-success btn-sm bounceIn animation-delay5 ">Check In</a>
                <?php } else if($this->session->userdata('check_in_status')==1) {  ?>
                <a href="<?php echo base_url();?>check_in_out/check_out" class="btn btn-danger btn-sm bounceIn animation-delay5 ">Check Out</a>
                <?php }?>  
            </li>
            <br>
            <br>
            <li>
  
            </li>
        </ul><!-- /page-stats -->
    </div><!-- /main-header -->
    
               <?php if(  $this->session->userdata('message')==1){ $this->session->set_userdata('message',0); ?>

<div class="alert alert-success text-center">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Checked In successfully.
        </div>



                <?php } else if($this->session->userdata('message')==2) {  $this->session->set_userdata('message',0); ?>
                    
<div class="alert alert-success text-center">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Checked Out successfully.</strong>
</div>

                    <?php }?> 
    <div class="padding-md">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <a href="<?php echo base_url();?>user_shop/manage_stock">
                <div class="panel-stat3 bg-danger">
                    <h5>Current  stock</h5>
            
                    <div class="stat-icon">
                        <i class="fa fa-bar-chart-o fa-3x"></i>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
            <a href="<?php echo base_url();?>user_shop/sales_sheet">
                <div class="panel-stat3 bg-success">
                    <h5>Sales Sheet</h5>
            
                    <div class="stat-icon">
                        <i class="fa fa-file-text-o fa-3x"></i>
                    </div>
                </div>
                </a>
            </div>
			
			<div class="col-sm-6 col-md-3">
            <a href="<?php echo base_url().'user_shop/assign_quantity';?>">
                <div class="panel-stat3 bg-primary">
                    <h5>Add Stock</h5>
            
                    <div class="stat-icon">
                        <i class="fa fa-shopping-cart fa-3x"></i>
                    </div>
                </div>
                </a>
            </div>
            
            <div class="col-sm-6 col-md-3">
            <a href="<?php echo base_url();?>user_shop/sales_listing_sheet">
                <div class="panel-stat3 bg-info ">
                    <h5>Sales Detail</h5>
            
                    <div class="stat-icon">
                        <i class="fa fa-table fa-3x"></i>
                    </div>
                    
                    
                </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
            <a href="<?php echo base_url();?>user_shop/sales_listing_sheet">
                <div class="panel-stat3 bg-success1">
                    <h5>Assigned Stock</h5>
            
                    <div class="stat-icon">
                        <i class="fa fa-check-square-o fa-3x"></i>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
            <a href="<?php echo base_url();?>check_in_out/check_in_out_history">
                <div class="panel-stat3 bg-warning">
                    <h5>Check In/Out History</h5>
            
                    <div class="stat-icon">
                        <i class="fa-li fa fa-check-square fa-3x"></i>
                    </div>
                </div>
                </a>
            </div>
            
            
            <!-- /.col -->
        </div>
        <!-- /.row -->
        
    </div><!-- /.padding-md -->
</div>
	
</div><!-- /wrapper -->

<?php echo $footer;?>

<script type="text/javascript">
    $(document).ready(function () {
        
    })
</script>