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

											 <h3 class="text-center heading_color">Update Owner</h3>
											 <br>
											 
											 
											 <div class="panel-collapse collapse in" id="basicFormExample">
                                        
                                        <div class="ssm_home_dashboard">

<form action="<?php echo SURL?>users/update_owner_process" enctype="multipart/form-data" method="post" id="frm_add" novalidate="novalidate">
	
    <div class="row">
    	<div class="col-md-12">
        <div class="switch_board_main">
            <div class="clear20"></div>
            
            
                <div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Firm Name</label>
                    <input type="text" placeholder="First Name" readonly="readonly" value="<?php echo $user['firm_name'] ?>" required id="firm_name" name="firm_name" class="form-control">
                     <input type="hidden" placeholder="First Name" value="<?php echo $user['id'] ?>" required id="id" name="id" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <label>Email</label>
                        <input type="text" placeholder="Email" value="<?php echo $user['email_address'] ?>" required id="email_address" name="email_address"  class="form-control">
                    </div>
                </div>
				
                <div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Info</label>
                        <input type="text" placeholder="Info" value="<?php echo $user['info'] ?>" required id="info" name="info"  class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                       <label>Street</label>
                        <input type="text" placeholder="Street" name="street" class="form-control" required="required" value="<?php echo $user['street'] ?>">
                    </div>
                </div>

				
            <div class="row form-group">
                   
                   
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Second Street</label>
                        <input type="text" placeholder="second_street" required="required" id="second_street" name="second_street" class="form-control" value="<?php echo $user['second_street'] ?>">
                    </div>
                     <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>City</label>
                        <input type="text" placeholder="City" name="city" class="form-control" required="required" value="<?php echo $user['city'] ?>">
                    </div>
                </div>
				
             <div class="row form-group">
                        <div class="row form-group">
                     <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Country</label>
                        <input type="text" placeholder="Country" name="country" class="form-control" required="required" value="<?php echo $user['country'] ?>">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>State Zip</label>
                        <input type="text" name="state_zip"  value="<?php echo $user['state_zip'] ?>"/>
                          <!-- <select name="state_zip" id="state_zip" class="form-control">

                                <?php  foreach($sub_users as $sub){?>
                                                                    <option value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
                                                                   <?php }?>

                            </select>-->
                    </div>
                </div>       
 
            

             <div class="row form-group">
                           
                
                
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


</div>

<?php echo $footer; ?>