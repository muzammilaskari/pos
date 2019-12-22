
  <div class="page-sidebar" id="main-menu">

    <!-- BEGIN MINI-PROFILE -->

    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">

      <div class="user-info-wrapper">

        <div class="profile-wrapper"> <?php if($this->session->userdata('user_image')=='') {?> <img src="<?php echo SURL; ?>assets/profile_images/default-pic.png"  alt="" width="69" height="69" /> <?php } else{ ?>   <img src="<?php echo SURL; ?>assets/profile_images/thumb/<?php echo $this->session->userdata('user_image'); ?>"  alt="" width="69" height="69" />   <?php } ?> </div>

        <!-- data-src="<?php //echo SURL; ?>assets/img/profiles/avatar.jpg" -->

        <div class="user-info">

          <div class="greeting">Welcome</div>

          <div class="username"><?php echo $this->session->userdata('user_name'); ?></span></div>

          <div class="status"></div>

        </div>

      </div>

      <!-- END MINI-PROFILE -->

      <!-- BEGIN SIDEBAR MENU -->


      <ul>

        <li class="start "> <a href="<?php echo SURL?>dashboard/" > <i class="icon-custom-home"></i> <span class="title">Dashboard</span>  </a> </li>				
		
        
                <?php 
					if($this->session->userdata('user_type')==1)
				{	
				?>	
		<li> <a href="<?php echo SURL; ?>users/manage_interior" > <i class="fa fa-check-circle"></i> <span class="title">Design Firm</span> <span class="selected"></span> <span class="arrow open"></span> </a> 
		
			<ul class="sub-menu">
			<!--	<li > <a href="<?php echo SURL; ?>users/manage_interior"> Manage Interior Designer </a> </li>-->
							
			<!--	<li > <a href="<?php echo SURL; ?>users/add_interior"> Add Interior Designer </a> </li>-->
				
				
			</ul>
            
		</li>
		
		<?php
				}
				?>
                <?php 
					if($this->session->userdata('user_type')==1)
				{	
				?>	
		<li> <a href="<?php echo SURL; ?>users/manage_contractor" > <i class="fa fa-check-circle"></i> <span class="title">Contractor</span> <span class="selected"></span> <span class="arrow open"></span> </a> 
		
			<ul class="sub-menu">
<!--				<li > <a href="<?php echo SURL; ?>users/manage_contractor"> Manage Main Contractor </a> </li>
							
				<li > <a href="<?php echo SURL; ?>users/add_contractor"> Add Main Contractor </a> </li>-->
				
				
			</ul>
            
		</li>
		
		<?php
				}
				?>
                
                
                
                <?php 
					if($this->session->userdata('user_type')==1)
				{	
				?>	
		<!--<li> <a href="" > <i class="fa fa-check-circle"></i> <span class="title">Sub Contractor</span> <span class="selected"></span> <span class="arrow open"></span> </a> 
		
			<ul class="sub-menu">
				<li > <a href="<?php echo SURL; ?>users/manage_subcontractor"> Manage Sub Contractor </a> </li>
							
				<li > <a href="<?php echo SURL; ?>users/add_subcontractor"> Add Sub Contractor </a> </li>
				
				
			</ul>
            
		</li>-->
		
		<?php
				}
				?>
                
                 <?php 
					if($this->session->userdata('user_type')==1)
				{	
				?>	
		<li> <a href="<?php echo SURL; ?>users/manage_owner" > <i class="fa fa-check-circle"></i> <span class="title">Owners</span> <span class="selected"></span> <span class="arrow open"></span> </a> 
		
			<ul class="sub-menu">
			<!--	<li > <a href="<?php echo SURL; ?>users/manage_owner"> Manage Owner </a> </li>
							
				<li > <a href="<?php echo SURL; ?>users/add_owner"> Add Owner </a> </li>-->
				
				
			</ul>
            
		</li>
		
		<?php
				}
				?>
                
                 <?php 
					if($this->session->userdata('user_type')==1)
				{	
				?>	
		<li> <a href="<?php echo SURL; ?>users/manage_supplier" > <i class="fa fa-check-circle"></i> <span class="title">Suppliers</span> <span class="selected"></span> <span class="arrow open"></span> </a> 
		
			<ul class="sub-menu">
			<!--	<li > <a href="<?php echo SURL; ?>users/manage_supplier"> Manage Supplier </a> </li>
							
				<li > <a href="<?php echo SURL; ?>users/add_supplier"> Add Supplier </a> </li>-->
				
				
			</ul>
            
		</li>
		
		<?php
				}
				?>
                
                 <?php 
					if($this->session->userdata('user_type')==1)
				{	
				?>	
		<li> <a href="<?php echo SURL; ?>catalog/manage_catalog" > <i class="fa fa-check-circle"></i> <span class="title">Catalog</span> <span class="selected"></span> <span class="arrow open"></span> </a> 
		
			<ul class="sub-menu">
				<!--<li > <a href="<?php echo SURL; ?>catalog/manage_catalog"> Manage Catalog </a> </li>
							
				<li > <a href="<?php echo SURL; ?>catalog/add_catalog">Add Catalog</a> </li>-->
              
				
				
			</ul>
            
		</li>
		
		<?php
				}
				?>
                
                 <?php 
					if($this->session->userdata('user_type')==1)
				{	
				?>	
		<li> <a href="<?php echo SURL; ?>catalog/manage_assign_catalog" > <!--<i class="fa fa-check-circle"></i> <span class="title">-->Assign Catalog<!--</span> <span class="selected"></span> <span class="arrow open"></span>--> </a> 
		
			<!--<ul class="sub-menu">-->
			<!--	<li > <a href="<?php echo SURL; ?>catalog/manage_assign_catalog"> Manage Assign Catalog </a> </li>
							
				<li > <a href="<?php echo SURL; ?>catalog/add_assign">Assign Catalog</a> </li>-->
              
				
			<!--	
			</ul>-->
            
		</li>
		
		<?php
				}
				?>
                
                 <?php 
					if($this->session->userdata('user_type')==1)
				{	
				?>	
		<li> <a href="<?php echo SURL; ?>product/manage_product" > <i class="fa fa-check-circle"></i> <span class="title">Product</span> <span class="selected"></span> <span class="arrow open"></span> </a> 
		
			<ul class="sub-menu">
				<li > <a href="<?php echo SURL; ?>product/manage_product"> Manage Product</a> </li>
							
				<li > <a href="<?php echo SURL; ?>product/add_product">Add Product</a> </li>
              
             <!-- <li > <a href="<?php echo SURL; ?>product/add_size">Add Size</a> </li>-->
              
              <li > <a href="<?php echo SURL; ?>product/manage_size"> Manage Size</a> </li>
				
				
			</ul>
            
		</li>
		
		<?php
				}
				?>
             <?php 
					if($this->session->userdata('user_type')==1)
				{	
				?>	
		<li> <a href="" > <i class="fa fa-check-circle"></i> <span class="title">Sample</span> <span class="selected"></span> <span class="arrow open"></span> </a> 
		
			<ul class="sub-menu">
				<li > <a href="<?php echo SURL; ?>product/manage_sample"> Manage Sample</a> </li>
							
				<li > <a href="<?php echo SURL; ?>product/add_sample">Add Sample</a> </li>
              
				
				
			</ul>
            
		</li>
		
		<?php
				}
				?>    
                
                
                 <?php 
					if($this->session->userdata('user_type')==1)
				{	
				?>	
		<li> <a href="" > <i class="fa fa-check-circle"></i> <span class="title">Project</span> <span class="selected"></span> <span class="arrow open"></span> </a> 
		
			<ul class="sub-menu">
				<li > <a href="<?php echo SURL; ?>project/manage_project"> Manage Project</a> </li>
                <li > <a href="<?php echo SURL; ?>project/assign_project"> Assign Project</a> </li>
							
				<li > <a href="<?php echo SURL; ?>project/add_project">Add Project</a> </li>
              
				
				
			</ul>
            
		</li>
		
		<?php
				}
				?>    
		
		<?php 
					if($this->session->userdata('user_type')==1)
				{	
				?>	
		<li> <a href="" > <i class="fa fa-check-circle"></i> <span class="title">User</span> <span class="selected"></span> <span class="arrow open"></span> </a> 
		
			<ul class="sub-menu">
				<li > <a href="<?php echo SURL; ?>users/manage_users"> Manage User </a> </li>
							
				<li > <a href="<?php echo SURL; ?>users/add_user"> Add User </a> </li>
				
				
			</ul>
            
		</li>
		
		<?php
				}
				?>
                
		<!--<li> <a href="" > <i class="fa fa-check-circle"></i> <span class="title">Assign Roles</span> <span class="selected"></span> <span class="arrow open"></span> </a> 
		
			<ul class="sub-menu">
				<li > <a href="manage-roles.php"> Manage Roles </a> </li>
				<li > <a href="add-role.php"> Add Roles </a> </li>
					
			</ul>
		</li>-->
	
		


      </ul>
      

      <div class="clearfix"></div>

      <!-- END SIDEBAR MENU -->

    </div>

  </div>

  <div class="footer-widget">


    <div class="pull-right">

      <a href="<?php echo SURL ; ?>users/logout_user"><i class="fa fa-power-off"></i></a></div>

  </div>
