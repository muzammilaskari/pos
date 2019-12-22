<div id="top-nav" class="fixed skin-6">
                <a href="#" class="brand">
                    <span>Inventory Management</span>
                </a><!-- /brand -->					
                <button type="button" class="navbar-toggle pull-left" id="sidebarToggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <button type="button" class="navbar-toggle pull-left hide-menu" id="menuToggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--Start Notification Bar-->
                
				<div class="col-lg-1 pull-right mrgn-right">
               	<ul class="nav-notification clearfix ">
                <li class="profile dropdown">
            <a class="" data-toggle="dropdown" href="#">
                <strong>User</strong>
                <span><i class="fa fa-chevron-down"></i></span>
            </a>
			
            <ul class="dropdown-menu">
                <li>
                    <a class="clearfix" href="#">
                     <img src="<?php echo SURL; ?>assets/inner/images/t1-user_profile_1.jpg" alt="user avatar" width="28" height="28" /> 
                        <div class="detail">
                            <strong><?php echo $this->session->userdata('user_name');?></strong>

                            <!--<p class="grey">milyas2323@gmail.com</p> -->
                        </div>
                    </a>
                </li>
                <!--<li><a tabindex="-1" href="#" class="main-link"><i class="fa fa-edit fa-lg"></i> Edit profile</a></li>-->
             <!--<li><a tabindex="-1" href="#" class="main-link"><i class="fa fa-edit fa-lg"></i> Change password</a></li>-->
                

                <li class="divider"></li>
                <li><a tabindex="-1" class="main-link logoutConfirm_open" href="<?php echo SURL;?>login/logout_user"><i class="fa fa-lock fa-lg"></i> Log out</a></li>
                
                
               
                
                
            </ul>
        </li>
    </ul>
	</div>
     	<div class="pull-right mrgn-right">
	    <div class="col-lg-12 pull-right header-btns">       
        
        <!--<div class="messages-menu" title="New inbox messages">
				<button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-comment" style=""></i> 
				<span style="color:#3FA9F5;"><b></b></span></button>
      <ul class="dropdown-menu " role="menu">
        <li class="menu-arrow">
          <div class="menu-arrow-up"></div>
        </li>
        <li class="dropdown-header">Recent Messages <span class="pull-right glyphicons glyphicons-comment"></span></li>
        <li>
          <ul class="dropdown-items ddla">
          &nbsp; No new message.  
          </ul>
        </li>
        <li class="dropdown-footer"><a href="#">View All Messages <i class="fa fa-caret-right"></i> </a></li>
      </ul>
    </div>-->
    
<!--<div class="message-menu" title="New inbox notifications">
      <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown"> 
	  <i class="fa fa-bell"></i><b><span style="color:#3FA9F5;">1</span></b> </button>
      <ul class="dropdown-menu checkbox-persist animated-short" role="menu">
        <li class="menu-arrow1">
          <div class="menu-arrow-up"></div>
        </li>
        <li class="dropdown-header">Recent Notifications <span class="pull-right glyphicons glyphicons-bell"></span></li>
        <li>
          <ul class="dropdown-items ddla">
          						
                    <li>
					  <a class="" href="#">
							<div class="item-message">
								<small class="text-muted"></small><br>
								New Client has been registered							</div>
					  </a>
					</li>
			          </ul>
        </li>
        <li class="dropdown-footer"><a href="#">View All Notifications <i class="fa fa-caret-right"></i> </a></li>
      </ul>
    </div>-->

</div>
                          </div>  
                <!--End Notification Bar-->
            </div>