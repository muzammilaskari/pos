<?php echo $header; ?>

<div class="page-container row-fluid">

  <!-- BEGIN SIDEBAR -->
        <?php echo $sidebar; ?>
  <!-- END SIDEBAR -->

  <!-- BEGIN PAGE CONTAINER-->

  <div class="page-content">

    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

    <div id="portlet-config" class="modal hide">

      <div class="modal-header">

        <button data-dismiss="modal" class="close" type="button"></button>

        <h3>Widget Settings</h3>

      </div>

      <div class="modal-body"> Widget settings form goes here </div>

    </div>

    <div class="clearfix"></div>

    <div class="content sm-gutter">

      <div class="page-title">

      </div>

	   <!-- BEGIN DASHBOARD TILES -->

	  

	  <!-- END DASHBOARD TILES -->

      

     

      <div class="row">

                            <div class="col-md-12">

                                <div class="grid simple ">

                                    <div class="grid-body no-border">

											 <h3 class="text-center heading_color">Update User</h3>
											 <br>
											 
											 
											 <div class="panel-collapse collapse in" id="basicFormExample">
                                        
                                        <div class="ssm_home_dashboard">

<form action="<?php echo SURL?>users/update_user_process" enctype="multipart/form-data" method="post" id="frm_add" novalidate="novalidate">
	
    <div class="row">
    	<div class="col-md-12">
        <div class="switch_board_main">
            <div class="clear20"></div>
            
            
                <div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>First Name</label>
                    <input type="text" placeholder="First Name" value="<?php echo $user['first_name'] ?>" required id="first_name" name="first_name" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>last Name</label>
                        <input type="text" placeholder="Last Name" value="<?php echo $user['last_name'] ?>" required name="last_name" class="form-control">
                    </div>
                </div>
				
                <div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Email</label>
                        <input type="text" placeholder="Email" value="<?php echo $user['email'] ?>" required id="email" name="email" readonly="readonly" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>Address</label>
                        <input type="text" placeholder="Address" value="<?php echo $user['address'] ?>" name="address" class="form-control">
                    </div>
                </div>

				<div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Phone No</label>
                        <input type="text" placeholder="Phone No" value="<?php echo $user['phone_no'] ?>" name="phone_no" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>Mobile No</label>
                        <input type="text" placeholder="Mobile No" value="<?php echo $user['mobile_no'] ?>" name="mobile_no" class="form-control">
                    </div>
                </div>
            
            <div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Profile Image</label>
           <input type="file" size="chars" class="form-control" name="profile_image" accept="image/*"> 
           
           <?php if($user['image']=='') {?> <img src="<?php echo SURL; ?>assets/profile_images/default-pic.png"  alt="" width="69" height="69" /> <?php } else{ ?> 
      <img src="<?php echo SURL; ?>assets/profile_images/thumb/<?php echo $user['image'];?>" width="100" height="100" /> <?php }?>
						
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	
					</div>
                </div>

             <div class="row form-group">
                        <div class="col-md-6">
                            <label>User Type</label>
                            <select name="type" id="type" required="required" class="form-control" >

                                <option value="">Select User Type</option>
                                
                              <option value="1" <?php if($user['type']==1) echo "selected='selected'"?>>Administrator</option>
                                
                                <option value="2" <?php if($user['type']==2) echo "selected='selected'"?>>saler</option>
s
                                <option value="3" <?php if($user['type']==3) echo "selected='selected'"?>>accounts</option> 

                            </select>
                            
                       <input type="hidden" name="id" value="<?php echo $user['id']; ?>"     
                            
                        </div>
                    </div>   
                
                
            <div class="clear20"></div>
            
            <input type="submit" value="Update" class="btn btn-default pull-left custom-marg" />
            <a href="" onclick="javascript:history.go(-1)" class="btn btn-danger pull-left custom-marg">Cancel</a>
            
            </div>
        </div>
    </div>
    
</form>
                                        </div>
                                        
                                        
                                    </div>
											 

									</div>

								</div>

							</div>

						</div>

      

	   





	   </div>

		  </div>

<!-- BEGIN CHAT --> 

<!-- <div class="chat-window-wrapper">

	<div id="main-chat-wrapper" class="inner-content">

        <div class="chat-window-wrapper scroller scrollbar-dynamic" id="chat-users" >

            <div class="chat-header">	

            <div class="pull-left">

                <input type="text" placeholder="search">

            </div>		

                <div class="pull-right">

                    <a href="#" class="" ><div class="iconset top-settings-dark "></div> </a>

                </div>			

            </div>	

            <div class="side-widget">

               <div class="side-widget-title">group chats</div>

                <div class="side-widget-content">

                 <div id="groups-list">

                    <ul class="groups" >

                        <li><a href="#"><div class="status-icon green"></div>Office work</a></li>

                        <li><a href="#"><div class="status-icon green"></div>Personal vibes</a></li>

                    </ul>

                </div>

                </div>

            </div>

            <div class="side-widget fadeIn">

               <div class="side-widget-title">favourites</div>

               <div id="favourites-list">

                <div class="side-widget-content" >

                    <div class="user-details-wrapper active" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">

                        <div class="user-profile">

                            <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">

                        </div>

                        <div class="user-details">

                            <div class="user-name">

                            Jane Smith

                            </div>

                            <div class="user-more">

                            Hello you there?

                            </div>

                        </div>

                        <div class="user-details-status-wrapper">

                            <span class="badge badge-important">3</span>

                        </div>

                        <div class="user-details-count-wrapper">

                            <div class="status-icon green"></div>

                        </div>

                        <div class="clearfix"></div>

                    </div>	

                    <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="David Nester">

                        <div class="user-profile">

                            <img src="assets/img/profiles/c.jpg"  alt="" data-src="assets/img/profiles/c.jpg" data-src-retina="assets/img/profiles/c2x.jpg" width="35" height="35">

                        </div>

                        <div class="user-details">

                            <div class="user-name">

                            David Nester

                            </div>

                            <div class="user-more">

                            Busy, Do not disturb

                            </div>

                        </div>

                        <div class="user-details-status-wrapper">

                            <div class="clearfix"></div>

                        </div>

                        <div class="user-details-count-wrapper">

                            <div class="status-icon red"></div>

                        </div>

                        <div class="clearfix"></div>

                    </div>					

                </div>

                </div>

            </div>

            <div class="side-widget">

               <div class="side-widget-title">more friends</div>

                 <div class="side-widget-content" id="friends-list">

                    <div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">

                        <div class="user-profile">

                            <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">

                        </div>

                        <div class="user-details">

                            <div class="user-name">

                            Jane Smith

                            </div>

                            <div class="user-more">

                            Hello you there?

                            </div>

                        </div>

                        <div class="user-details-status-wrapper">



                        </div>

                        <div class="user-details-count-wrapper">

                            <div class="status-icon green"></div>

                        </div>

                        <div class="clearfix"></div>

                    </div>	

                    <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="David Nester">

                        <div class="user-profile">

                            <img src="assets/img/profiles/h.jpg"  alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35">

                        </div>

                        <div class="user-details">

                            <div class="user-name">

                            David Nester

                            </div>

                            <div class="user-more">

                            Busy, Do not disturb

                            </div>

                        </div>

                        <div class="user-details-status-wrapper">

                            <div class="clearfix"></div>

                        </div>

                        <div class="user-details-count-wrapper">

                            <div class="status-icon red"></div>

                        </div>

                        <div class="clearfix"></div>

                    </div>		

                    <div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">

                        <div class="user-profile">

                            <img src="assets/img/profiles/c.jpg"  alt="" data-src="assets/img/profiles/c.jpg" data-src-retina="assets/img/profiles/c2x.jpg" width="35" height="35">

                        </div>

                        <div class="user-details">

                            <div class="user-name">

                            Jane Smith

                            </div>

                            <div class="user-more">

                            Hello you there?

                            </div>

                        </div>

                        <div class="user-details-status-wrapper">



                        </div>

                        <div class="user-details-count-wrapper">

                            <div class="status-icon green"></div>

                        </div>

                        <div class="clearfix"></div>

                    </div>	

                    <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="David Nester">

                        <div class="user-profile">

                            <img src="assets/img/profiles/h.jpg"  alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35">

                        </div>

                        <div class="user-details">

                            <div class="user-name">

                            David Nester

                            </div>

                            <div class="user-more">

                            Busy, Do not disturb

                            </div>

                        </div>

                        <div class="user-details-status-wrapper">

                            <div class="clearfix"></div>

                        </div>

                        <div class="user-details-count-wrapper">

                            <div class="status-icon red"></div>

                        </div>

                        <div class="clearfix"></div>

                    </div>				

                </div>		

            </div>

        </div>



        <div class="chat-window-wrapper" id="messages-wrapper" style="display:none">

        <div class="chat-header">	

            <div class="pull-left">

                <input type="text" placeholder="search">

            </div>		

                <div class="pull-right">

                    <a href="#" class="" ><div class="iconset top-settings-dark "></div> </a>

                </div>					

            </div>

        <div class="clearfix"></div>	

        <div class="chat-messages-header">

        <div class="status online"></div><span class="semi-bold">Jane Smith(Typing..)</span>

        <a href="#" class="chat-back"><i class="icon-custom-cross"></i></a>

        </div>

        <div class="chat-messages scrollbar-dynamic clearfix">

            <div class="inner-scroll-content clearfix">

            <div class="sent_time">Yesterday 11:25pm</div>

            <div class="user-details-wrapper " >

                <div class="user-profile">

                    <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">

                </div>

                <div class="user-details">

                  <div class="bubble">	

                        Hello, You there?

                   </div>

                </div>					

                <div class="clearfix"></div>

               <div class="sent_time off">Yesterday 11:25pm</div>

            </div>		

            <div class="user-details-wrapper ">

                <div class="user-profile">

                    <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">

                </div>

                <div class="user-details">

                  <div class="bubble">	

                        How was the meeting?

                   </div>

                </div>					

                <div class="clearfix"></div>

                <div class="sent_time off">Yesterday 11:25pm</div>

            </div>

            <div class="user-details-wrapper ">

                <div class="user-profile">

                    <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">

                </div>

                <div class="user-details">

                  <div class="bubble">	

                        Let me know when you free

                   </div>


                </div>					

                <div class="clearfix"></div>

                <div class="sent_time off">Yesterday 11:25pm</div>

            </div>

            <div class="sent_time ">Today 11:25pm</div>

            <div class="user-details-wrapper pull-right">

                <div class="user-details">

                  <div class="bubble sender">	

                        Let me know when you free

                   </div>

                </div>					

                <div class="clearfix"></div>

                <div class="sent_time off">Sent On Tue, 2:45pm</div>

            </div>		

        </div>

        </div>

        <div class="chat-input-wrapper" style="display:none">

            <textarea id="chat-message-input" rows="1" placeholder="Type your message"></textarea>

        </div>

        <div class="clearfix"></div>

        </div>

    </div>

</div> -->

<!-- END CHAT -->		  

</div>

<?php echo $footer; ?>