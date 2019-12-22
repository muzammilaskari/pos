<aside class="fixed skin-6">
			<div class="sidebar-inner scrollable-sidebar">
				<div class="size-toggle">
					<a class="btn btn-sm" id="sizeToggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="btn btn-sm pull-right logoutConfirm_open"  href="<?php echo SURL;?>login/logout_user">
						<i class="fa fa-power-off red"></i>
					</a>
				</div><!-- /size-toggle -->	
				<div class="user-block clearfix">
					<div class="costom-logo-img">
					<img  src="<?php echo SURL; ?>assets/inner/images/t1-user_profile_1.png" alt="user avatar" />
                    </div>
					<div class="detail"><br>
					<strong>User</strong>:
						<strong><?php echo $this->session->userdata('user_name');?></strong>
						
						<ul class="list-inline">
							<!--<li><a href="#">Edit Profile</a></li>-->
                            <li><h4>Shop: <?php echo $this->session->userdata('shop_name');?></h4></li>
						</ul>
					</div>
				</div><!-- /user-block -->
							<div class="main-menu">
					
                    <ul>
				
						
                    <li class="dashboard">
                        <a href="<?php echo base_url().'user_shop';?>">
                            <span class="menu-icon"> <i class="fa fa-desktop fa-lg"></i></span>
                            <span class="text">Dashboard</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    
                    <li class="dashboard">
                        <a href="<?php echo base_url().'user_shop/manage_stock';?>">
                            <span class="menu-icon"> <i class="fa fa-bar-chart-o fa-lg" aria-hidden="true"></i> </span>
                            <span class="text">Current Stock</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    
                    <li class="dashboard">
                        <a href="<?php echo base_url().'user_shop/sales_sheet';?>">
                            <span class="menu-icon"> <i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i> </span>
                            <span class="text">Sales Sheet</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    
                    <li class="dashboard">
                        <a href="<?php echo base_url().'user_shop/assign_quantity';?>">
                            <span class="menu-icon"> <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i> </span>
                            <span class="text">Add Stock</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    
                    <li class="dashboard">
                        <a href="<?php echo base_url().'user_shop/sales_listing_sheet';?>">
                            <span class="menu-icon"> <i class="fa fa-table fa-lg" aria-hidden="true"></i> </span>
                            <span class="text">Sales Detail</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    
                    <li class="dashboard">
                        <a href="<?php echo base_url().'user_shop/assign_stock';?>">
                            <span class="menu-icon"> <i class="fa fa-check-square-o" aria-hidden="true"></i> </span>
                            <span class="text">Assigned Stock</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    <li class="dashboard">
                        <a href="<?php echo base_url().'check_in_out/check_in_out_history';?>">
                            <span class="menu-icon"> <i class="fa fa-check-square-o" aria-hidden="true"></i> </span>
                            <span class="text">Check In/Out History</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    
                    </ul>
                    
                    
				</div>
                <!-- /main-menu -->
                
			</div><!-- /sidebar-inner -->
		</aside>