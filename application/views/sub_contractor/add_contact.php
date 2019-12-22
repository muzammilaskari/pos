<?php  echo $header;?>


<div class="page-container row-fluid">

  <!-- BEGIN SIDEBAR -->
 <?php echo $sidebar; ?>

  <!-- BEGIN PAGE CONTAINER-->
 
<script>
/*function add_contact(){


		if(window.XMLHttpRequest){
			
		 for chrome firefox safari opera IE7
 		xmlhttp= new XMLHttpRequest();
			
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange= function(){
			
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
		document.getElementById('pack').innerHTML= xmlhttp.responseText;
			}
		}
		
	xmlhttp.open("GET","<?php echo base_url();?>users/add_contacts_dynamic",true);
		xmlhttp.send();
		

}*/


</script>



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
                                        	<form action="<?php echo SURL?>users/add_subcontractor_contact_process" enctype="multipart/form-data" method="post" id="frm_add" >
                                            	
                                                <div class="row">
                                                	<div class="col-md-12">
                                                    <div class="switch_board_main">
                                                        <div class="clear20"></div>
                                                        
                                                        
                                                        
														
															<div class="row form-group">
																
																<div class="col-md-6 col-sm-12 col-xs-12">
																	<label>Firm Name</label>
                                                                    
                                                                    <input type="text" name="firm_name" id="firm_name" placeholder="Firm" class="form-control" value="<?php echo $contact->firm_name;?>">
                                                                    
                                                                     <input type="hidden" id="firm_id" name="firm_id" placeholder="Customer" class="form-control" value="<?php echo $contact->id;?>">
                                                                </div>
															
																<div class="col-md-6 col-sm-12 col-xs-12">
                                                                <label>Employee Name</label>
                                                                    <input type="text" id="employee_name" name="employee_name[]" placeholder="Customer" class="form-control">
                                                                	
																</div>
																
                                                                
                                                               
                                                            </div>
															
															
															
															
															<div class="row form-group">
                                                                <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                     <label>Email Address</label>
                        <input type="email" placeholder="Email" required id="email_address" name="email_address[]" class="form-control">
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                 <label>Street</label>
                        <input type="text" placeholder="Street" required id="street" name="street[]" class="form-control">
                                                                     
                                                                </div>
                                                                 
                                                            </div>
                                                             <div class="row form-group">
                                                                <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                   <label>Second Street</label>
                        <input type="text" placeholder="Second Street" name="second_street[]" id="second_street" class="form-control">
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <label>Country</label>
                        <input type="text" placeholder="Country" name="country[]" id="country" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <label>City</label>
                        <input type="text" placeholder="City" name="city[]" id="city" class="form-control">
                                                                </div>
                                                            </div>
                                                        
															
															
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
                                             
                                                <!--<div class="row">
                                                	<div class="col-md-12">
                                                    <div class="switch_board_main">
                                                        <div class="clear20"></div>
                                       
                                                        <div class="clear20"></div>
                                                        
                                                      
                                                        
                                                        </div>
                                                    </div>
                                                </div>-->
                                                
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