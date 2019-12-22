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

											 <h3 class="text-center heading_color">Add Owner</h3>
											 <br>
											 
											 
											 <div class="panel-collapse collapse in" id="basicFormExample">
                                        
                                        <div class="ssm_home_dashboard">

<form action="<?php echo SURL?>users/add_owner_process" enctype="multipart/form-data" method="post" id="frm_add" >
	
    <div class="row">
    	<div class="col-md-12">
        <div class="switch_board_main">
            <div class="clear20"></div>
            
            
                <div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Firm Name</label>
                        <input type="text" placeholder="Firm Name" required id="firm_name" name="firm_name" class="form-control">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Email Address</label>
                        <input type="email" placeholder="Email" required id="email_address" name="email_address" class="form-control">
                    </div>
                </div>
				
                <div class="row form-group">
                   
                   
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Info</label>
                        <input type="text" placeholder="Info" required id="info" name="info" class="form-control">
                    </div>
                     <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Street</label>
                        <input type="text" placeholder="Street" name="street" class="form-control" required="required">
                    </div>
                </div>

                <div class="row form-group">
                   
                   
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Second Street</label>
                        <input type="text" placeholder="second_street" required="required" id="second_street" name="second_street" class="form-control">
                    </div>
                     <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>City</label>
                        <input type="text" placeholder="City" name="city" class="form-control" required="required">
                    </div>
                </div>
                

                 <div class="row form-group">
                     <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Country</label>
                        <input type="text" placeholder="Country" name="country" class="form-control" required="required">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>State Zip</label>
                        <input type="text" name="state_zip" />
                          <!-- <select name="state_zip" id="state_zip" class="form-control">

                                <?php  foreach($sub_users as $sub){?>
                                                                    <option value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
                                                                   <?php }?>

                            </select>-->
                    </div>
                </div>         
				
  <label>Select Firm Type</label>
                 <div class="row form-group">
                     <div class="col-md-1">
                       
      <input type="radio" id="firm" placeholder="Country" name="firm_type" class="form-control" value="Firm"  checked="checked">Firm
             
                    </div>
                    <div class="col-md-1">
                       
                         <input type="radio" id="individual" placeholder="Country" name="firm_type" class="form-control" value="Individual" >Individual
                    </div>
                </div>     

				
            
            

                
                
                
            <div class="clear20"></div>
            
            <input type="submit" id="button" value="Add Contact" class="btn btn-default pull-left custom-marg" />
            <input type="submit" id="button1" value="Save" class="btn btn-default pull-left custom-marg" />
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



<?php echo $footer;?>