<?php echo $header_script;?>
	<!-- Overlay Div -->
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
        <div class="row">
        <a href="<?php echo base_url();?>manage_user/all_users">
            <div class="col-sm-6 col-md-3">
                <div class="panel-stat3 bg-danger">
                    <h5>Manage Users</h5>
                    
                    <div class="stat-icon">
                        <i class="fa fa-user fa-3x"></i>
                    </div>
                    
                    <div class="loading-overlay">
                        <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
                    </div>
                </div>
            </div><!-- /.col -->
            </a>
            
            <a href="<?php echo base_url();?>manage_shop/all_shops">
            <div class="col-sm-6 col-md-3">
			
                <div class="panel-stat3 bg-info" style=" background-color:#8139b3;">
                    <h5>Manage Shops</h5>
                    
                    <div class="stat-icon">
                        <i class="fa fa-shopping-cart fa-3x"></i>
                    </div>
                    
                    <div class="loading-overlay">
                        <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
                    </div>
                
				</div>
            </div><!-- /.col -->
            </a>
             <a href="<?php echo base_url();?>manage_product/all_products">
            <div class="col-sm-6 col-md-3">
                <div class="panel-stat3 bg-info">
                   <h5>Manage Products</h5>
                    
                    <div class="stat-icon">
                        <i class="fa fa-hdd-o fa-3x"></i>
                    </div>
                    
                </div>
            </div><!-- /.col -->
            </a>
			
			<a href="<?php echo base_url().'manage_offers/all_offers';?>">
            <div class="col-sm-6 col-md-3">
			
                <div class="panel-stat3 bg-primary"> 
                   <h5>Manage Offer</h5>
                    
                    <div class="stat-icon">
                        <i class="fa fa-gift fa-3x"></i>
                    </div>
                    
                
				</div>
            </div><!-- /.col -->
            </a>
            <a href="<?php echo base_url();?>manage_assign_shop">
            <div class="col-sm-6 col-md-3">
                <div class="panel-stat3 bg-success">
                    <h5>Manage Stocks</h5>
            
                    <div class="stat-icon">
                        <i class="fa fa-bar-chart-o fa-3x"></i>
                    </div>
                    
                    
                </div>
            </div>
            </a>
            
            <a href="<?php echo base_url();?>manage_expense/all_expense">
            <div class="col-sm-6 col-md-3">
                <div class="panel-stat3 bg-info" style=" background-color:#47b3ff;">
                   <h5>Manage Expense</h5>
                        <div class="stat-icon">
                        <i class="fa fa-credit-card fa-3x"></i>
                    </div>
                    
                </div>
            </div><!-- /.col -->
            </a>
            
            <a href="<?php echo base_url();?>manage_report">
            <div class="col-sm-6 col-md-3">
                <div class="panel-stat3 bg-warning">
                    <h5>Reports</h5>
                    
                    <div class="stat-icon">
                        <i class="fa fa-file fa-3x"></i>
                    </div>
                    
                    <div class="loading-overlay">
                        <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
                    </div>
                </div>
            </div>
            </a>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        
    </div><!-- /.padding-md -->
</div>
	
</div><!-- /wrapper -->

<?php echo $footer;?>