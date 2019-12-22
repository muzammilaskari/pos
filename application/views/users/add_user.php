<?php  echo $header;?>

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

											 <h3 class="text-center heading_color">Add User</h3>
											 <br>
											 
											 
											 <div class="panel-collapse collapse in" id="basicFormExample">
                                        
                                        <div class="ssm_home_dashboard">

<form action="<?php echo SURL?>users/add_user_process" enctype="multipart/form-data" method="post" id="frm_add" novalidate="novalidate">
	
    <div class="row">
    	<div class="col-md-12">
        <div class="switch_board_main">
            <div class="clear20"></div>
            
            
                <div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>First Name</label>
                        <input type="text" placeholder="First Name" required id="first_name" name="first_name" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>last Name</label>
                        <input type="text" placeholder="Last Name" required name="last_name" class="form-control">
                    </div>
                </div>
				
                <div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Email</label>
                        <input type="text" placeholder="Email" required id="email" name="email" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>Address</label>
                        <input type="text" placeholder="Address" name="address" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Password</label>
                        <input type="password" placeholder="Password" required id="password" name="password" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>Confirm Password</label>
                        <input type="password" placeholder="Confirm Password" required id="confirm_password" name="confirm_password" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>Salary Per Hour</label>
                        <input type="password" placeholder="Confirm Password" required id="confirm_password" name="confirm_password" class="form-control">
                    </div>
                </div>                

				<div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Phone No</label>
                        <input type="text" placeholder="Phone No" name="phone_no" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>Mobile No</label>
                        <input type="text" placeholder="Mobile No" name="mobile_no" class="form-control">
                    </div>
                </div>
            
            <div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Profile Image</label>
                        <input type="file" size="chars" class="form-control" name="profile_image" accept="image/*"> 
						
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	
					</div>
                </div>

             <div class="row form-group">
                        <div class="col-md-6">
                            <label>Users</label>
                            <select name="type" id="type" class="form-control">

                                <?php  foreach($sub_users as $sub){?>
                                                                    <option value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
                                                                   <?php }?>

                            </select>
                        </div>
                    </div>   
                
                
            <div class="clear20"></div>
            
            <input type="submit" value="Save" class="btn btn-default pull-left custom-marg" />
            <a href="#" class="btn btn-danger pull-left custom-marg">Cancel</a>
            
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

</div>



<?php echo $footer;?>