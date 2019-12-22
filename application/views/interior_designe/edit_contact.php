<?php  echo $header;?>


<div class="page-container row-fluid">

  <!-- BEGIN SIDEBAR -->
 <?php echo $sidebar; ?>

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

                                    <div class="grid-body no-border pfc-grid-color-1">

											 <h3 class="text-center heading_color">Add Contact </h3>
											 <br>
											 
											 
											 <div class="panel-collapse collapse in" id="basicFormExample">
                                        
                                        <div class="ssm_home_dashboard">
                                        	<form action="<?php echo SURL?>users/add_interior_contact_process" enctype="multipart/form-data" method="post" id="frm_add" novalidate="novalidate">
                                            	
                                                <div class="row">
                                                	<div class="col-md-12">
                                                    <div class="switch_board_main">
                                                        <div class="clear20"></div>
                                                        
                                                        
                                                        
														
															<div class="row form-group">
																
																<div class="col-md-6 col-sm-12 col-xs-12">
																	<label>Firm Name</label>
                                                                    
                                                                    <input type="text" readonly="readonly" name="firm_name" id="firm_name" placeholder="Firm" class="form-control" value="<?php  if($contact!=''){echo $contact[0]['firm_name'];}?>">
                                                                    
                                                                     <input type="hidden" id="firm_id" name="firm_id" placeholder="Customer" class="form-control" value="<?php echo $id;?>">
                                                                </div>
															
																<div class="col-md-6 col-sm-12 col-xs-12">
                                                                <label>Employee Name</label>
                                                                    <input type="text" required="required" id="employee_name" name="employee_name[]" placeholder="Customer" class="form-control">
                                                                	
																</div>
																
                                                                
                                                               
                                                            </div>
															
															
															
															
															<div class="row form-group">
                                                                <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                     <label>Email Address</label>
                        <input type="email" placeholder="Email" required id="email_address" name="email_address[]" class="form-control">
                                                                </div>
                                                                <!--<div class="col-md-6 col-sm-12 col-xs-12">
                                                                 <label>Street</label>
                        <input type="text" placeholder="Street" required id="street" name="street[]" class="form-control">
                                                                     
                                                                </div>-->
                                                                 
                                                            </div>
                                                          <!--   <div class="row form-group">
                                                                <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                   <label>Second Street</label>
                        <input type="text" required="required" placeholder="Second Street" name="second_street[]" id="second_street" class="form-control">
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <label>Country</label>
                        <input type="text" required="required" placeholder="Country" name="country[]" id="country" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <label>City</label>
                        <input type="text" required="required" placeholder="City" name="city" id="city[]" class="form-control">
                                                                </div>
                                                            </div>-->
                                                        
															
															
															<!--<div class="row form-group">
                                                                <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
																	<div class="checkbox check-danger 	">

																	  <input type="checkbox" checked="checked" value="1" id="checkbox2">

																	  <label for="checkbox2">Mark as private listing</label>

																	</div>
                                                                </div>
                                                                <div class="row-fluid">

																	

																  </div>
                                                            </div>-->
																 <div id="add_stage_div">
                                         
                                        
															
                                                  
                                                            </div> 
                                                            
                                                            
                                                            
                                                        <div class="clear20"></div>
                                                         <a class="btn btn-default pull-left custom-marg" id="add_contact">Add</a>
                                                          <input type="submit" value="Save" class="btn btn-default pull-left custom-marg" />
                                                        <a href="" onclick="javascript:history.go(-1)" class="btn btn-danger pull-left custom-marg">Cancel</a>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                         <div class="ssm_home_dashboard">
                                        <form>
                                            	
                                                <div class="row">
                                                	<div class="col-md-12">
                                                    <div class="switch_board_main">
                                                        
                                                        <div class="setalerts_table">
                                                            <div class="table-responsive">
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
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Firm Name</th>
            <th>Employee Name</th>
           <!-- <th>Address</th>-->
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
        foreach($contact as $int)
        {
        ?>       

        <tr>
			
			<td><a href="<?php echo SURL; ?>users/view_contact_detail/<?php echo $int['id']; ?>"><?php echo $int['firm_name']; ?></a></td>
            <td><?php echo $int['employee_name']; ?></td>
           <!-- <td><?php echo $int['street'].'.'.$int['second_street'].','.$int['city'].','.$int['country']; ?></td>-->
		<!--  <td><?php echo $int['created_date']; ?></td>
             <td><?php echo $int['type']; ?></td>-->
			<td>
<?php
if($this->session->userdata('user_type')==1)
{   
?>            
                <a class="btn btn-default" href="<?php echo SURL; ?>users/edit_contacts/<?php echo $int['id']; ?>/<?php echo 0; ?>"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a>
<?php
}   
?>
<?php
if($this->session->userdata('user_type')==1)
{   
?>  
                <a class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this Contact?');" href="<?php echo SURL; ?>users/delete_interior_contact/<?php echo $int['id']; ?>/<?php echo $int['firm_id']; ?>"><i class="fa fa-trash" aria-hidden="true" title="delete the data"></i></a>
             
<?php
}  
?>



            </td>
        </tr>

        <?php
        }
        ?>
              
    </tbody>
</table>
                                              					</div>
                                                            </div>
                                                        
                                                        
                                                        <div class="clear20"></div>
                                                        
        <div aria-label="First group" role="group" class="btn-group pull-right">
        
        <?php  echo $this->pagination->create_links();?> 
        <!--<button class="btn btn-default" type="button"><i class="fa fa-angle-left"></i></button>
        <button class="btn btn-default" type="button">1</button>
        <button class="btn btn-default" type="button">2</button>
        <button class="btn btn-default" type="button">3</button>
        <button class="btn btn-default" type="button">4</button>
        <button class="btn btn-default" type="button"><i class="fa fa-angle-right"></i></button>-->
        </div>
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

<div class="chat-window-wrapper">

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

</div>

<!-- END CHAT -->		  

</div>





<?php echo $footer;?>