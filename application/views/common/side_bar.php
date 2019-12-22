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
					<div class="detail">
						<strong>admin</strong>
						
						<ul class="list-inline">
							<!--<li><a href="#">Edit Profile</a></li>-->
						</ul>
					</div>
				</div><!-- /user-block -->
							<div class="main-menu">
					
                    <ul>
				<li class="dashboard">
                        <a href="<?php echo base_url().'dashboard';?>">
                            <span class="menu-icon"> <i class="fa fa-desktop fa-lg"></i></span>
                            <span class="text">Dashboard</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    
                    <li class="dashboard">
                        <a href="<?php echo base_url().'manage_user/all_users';?>">
                            <span class="menu-icon"><i class="fa fa-home fa-lg" aria-hidden="true"></i></span>
                            <span class="text">Manage User</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    
                    <li class="dashboard">
                        <a href="<?php echo base_url().'manage_shop/all_shops';?>">
                            <span class="menu-icon"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></span>
                            <span class="text">Manage Shops</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    
                    <li class="dashboard">
                        <a href="<?php echo base_url().'manage_product/all_products';?>">
                            <span class="menu-icon"><i class="fa fa-tag fa-lg" aria-hidden="true"></i></span>
                            <span class="text">Manage Products</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    <li class="dashboard">
                        <a href="<?php echo base_url().'manage_offers/all_offers';?>">
                            <span class="menu-icon"> <i class="fa fa-gift fa-lg" aria-hidden="true"></i></span>
                            <span class="text">Manage Offers</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>
                    
                    <li class="user openable">
                       <a href="#">
                       <span class="menu-icon">
                       <i class="fa fa-archive fa-lg"></i> 
                       </span>
                       <span class="text">
                       Manage Stocks
                       </span>
                       <span class="menu-hover"></span>
                       </a>
                       <ul class="submenu" style="display: none;">
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_assign_shop';?>">
                             <span class="submenu-label lftmrn">
                             	Shop Stocks
                             </span>
                             </a>
                          </li>
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_product/list_product';?>">
                             <span class="submenu-label lftmrn">
                             	Manage Warehouse Stocks
                             </span>
                             </a>
                          </li>
                       </ul>
                    </li>
                    
                    <li class="user openable">
                       <a href="#">
                       <span class="menu-icon">
                       <i class="fa fa-archive fa-lg"></i> 
                       </span>
                       <span class="text">
                       Manage Expense
                       </span>
                       <span class="menu-hover"></span>
                       </a>
                       <ul class="submenu" style="display: none;">
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_expense/all_expense';?>">
                             <span class="submenu-label lftmrn">
                             	Expense Type
                             </span>
                             </a>
                          </li>
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_expense/expense_detail';?>">
                             <span class="submenu-label lftmrn">
                             	Expense Detail
                             </span>
                             </a>
                          </li>
                        
                       </ul>
                    </li>
                  
                    <!--<li class="dashboard">
                        <a href="<?php //echo base_url().'manage_assign_shop';?>">
                            <span class="menu-icon"> <i class="fa fa-archive fa-lg" aria-hidden="true"></i> </span>
                            <span class="text">Manage Stocks</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>-->
                    <!-- only for temp -->
                    <!--
                    <li class="dashboard">
                        <a href="<?php //echo base_url().'manage_product/list_product';?>">
                            <span class="menu-icon"> <i class="fa fa-archive fa-lg" aria-hidden="true"></i> </span>
                            <span class="text">Manage Warehouse Stocks</span>
                            <span class="menu-hover"></span>
                        </a>
                    </li>-->
                     <!-- End only for temp -->
                     <li class="user openable">
                       <a href="#">
                       <span class="menu-icon">
                       <i class="fa fa-file fa-lg"></i> 
                       </span>
                       <span class="text">
                       Reports
                       </span>
                       <span class="menu-hover"></span>
                       </a>
                       
                       <ul class="submenu for_scroll" style="display: none;">
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_expense/calculte_income';?>">
                             <span class="submenu-label lftmrn">
                             	Income Report
                             </span>
                             </a>
                          </li>
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_report/shop_reorder_report';?>">
                             <span class="submenu-label lftmrn">
                             	Reorder Notification
                             </span>
                             </a>
                          </li>
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_report/overall_stock_status';?>">
                             <span class="submenu-label lftmrn">
                             	Overall Stock Status
                             </span>
                             </a>
                          </li>
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_report/shop_stock';?>">
                             <span class="submenu-label lftmrn">
                             	Stock Status on Each Shop
                             </span>
                             </a>
                          </li>
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_report';?>">
                             <span class="submenu-label lftmrn">
                             	Warehouse Stock Status
                             </span>
                             </a>
                          </li>
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_report/voerall_stock_return';?>">
                             <span class="submenu-label lftmrn">
                             	Overall Stock Return
                             </span>
                             </a>
                          </li>
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_report/shop_return_stock';?>">
                             <span class="submenu-label lftmrn">
                             	Stock Return By Each Shop
                             </span>
                             </a>
                          </li>
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_report/shop_sold_stock';?>">
                             <span class="submenu-label lftmrn">
                             	Sold On Each Shop
                             </span>
                             </a>
                          </li>
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_report/stock_in_report';?>">
                             <span class="submenu-label lftmrn">
                             	Stock In Report
                             </span>
                             </a>
                          </li>
                          <li class="manageusers">
                             <a href="<?php echo base_url().'manage_report/expense_report';?>">
                             <span class="submenu-label lftmrn">
                             	Expense Report
                             </span>
                             </a>
                          </li>
                          <li class="manageusers">
                             <a href="<?php echo SURL.'check_in_out_report/check_in_out_history';?>">
                             <span class="submenu-label lftmrn">
                              Employee Check In/Out Report
                             </span>
                             </a>
                          </li>
                       </ul>
                    </li>
                    
                    </ul>
                    
                    
				</div>
                <!-- /main-menu -->
                
			</div><!-- /sidebar-inner -->
		</aside>