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

<form action="<?php echo SURL?>users/update_password"  method="post" id="frm_add" >
	
    <div class="row">
    	<div class="col-md-12">
        <div class="switch_board_main">
         <div class="col-md-12">
             <?php
                    if($this->session->flashdata('err_message')){
                ?>
                        <div class="alert alert-danger"><center><?php echo $this->session->flashdata('err_message'); ?><center></div>
                <?php
                    }//end if($this->session->flashdata('err_message'))
                    
                    if($this->session->flashdata('ok_message')){
                ?>
                        <div class="alert alert-success alert-dismissable"><center><?php echo $this->session->flashdata('ok_message'); ?><center></div>
                <?php 
                    }
                ?>
            </div>
            <div class="clear20"></div>
            
            
                
				
                

               <div class="row form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                        <label>Old Password</label>
                        <input type="password" placeholder="Old Password" required id="old_password" name="old_password" class="form-control" required="required">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>New Password</label>
                        <input required="required" type="password" placeholder="New Password" required name="new_password" class="form-control">
                    </div>
                </div>             

				
            
            

                
                
                
            <div class="clear20"></div>
            
            <input type="submit" value="Save" class="btn btn-default pull-left custom-marg" />
           
            
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