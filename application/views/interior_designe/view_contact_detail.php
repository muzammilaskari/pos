<?php echo $header; ?>

<div class="page-container row-fluid">

  <!-- BEGIN SIDEBAR -->
        <?php echo $sidebar; ?>
        
         <script> 
function add_notes(){
	   
	 ////  $('#loader').html('<img src="<?php //echo IMAGES; ?>ajax-loading-orange.gif" style="padding-left:50%;">') //show loading image
	   
	   $("#no_mor").hide();
	   
	   
	   $(".load_more").removeAttr("disabled");
	   
	var note 	= $('#note').val();
	var id   = $('#contact_id').val();
	var table_name   = 'contact';

	
	 
	   $('#loader').html('');
	   
	    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
		
	   $('#results').load("<?php echo SURL.'users/add_note'?>", {'page':track_click,'note':note, 'id': id, 'table_name': table_name}, function() {}); //initial data to load
	   
	   //$("#newsResult").load(window.location + " #newsResult");  
	 $("#results").show().delay(2000).fadeOut();
	window.location.reload();
	
 

	  
}
	</script>
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

											 <h3 class="text-center heading_color">Detail Information</h3>
											 <br>
											<div class="row">
											 	<div class="col-md-5 pull-left">
<?php
if($this->session->userdata('user_type')==1)
{   
?>                                                
					<!--<a class="btn btn-default" href="<?php echo SURL?>users/add_interior">Add Interior Design</a>-->
<?php
}  
?>
												</div>

            
            <!--form search starts here -->
            
            <div id="results">
           
        
            </div>
            
        
                <!--form seardh ends here -->


											 </div>
										<br>	 
											 <div class="panel-collapse collapse in" id="basicFormExample">
                                        
                                        <div class="ssm_home_dashboard">
                                        	<form>
                                            	
                                                <div class="row">
                                                	<div class="col-md-12">
                                                    <div class="switch_board_main">
                                                        
                                                        <div class="setalerts_table">
                                                            <div class="table-responsive">
<div id="newsResult">

<table class="table table-bordered table-striped table-hover">
 <tr>
            <td><h2>Contact Information</h2></td>
            <tr>
    <tbody>
       
        <?php
        foreach($contact as $int)
        {
        ?>       

        <tr>
			
			<td>Firm Name</td>
            <td><?php echo $int['firm_name']; ?></td>
            
           </tr>
            <tr>
			
			<td>Employee Name</td>
            <td><?php echo $int['employee_name']; ?></td>
            
           </tr>
            <tr>
			
			<td>Email Address</td>
            <td><?php echo $int['email_address']; ?></td>
            
           </tr>
            <tr>
			
			<td>Created Date</td>
            <td><?php echo $int['created_date']; ?></td>
            
           </tr>
            <tr>
           <?php if($int['note']=='none'){?>
         
           <td>
           <a  class="btn btn-default pull-left" data-toggle="modal" data-target="#myModal">Add Note</a>
          </td>
		  <?php }?>
           <?php if($int['note']!='none'){?>
          
           
          <td>Note</td>
            <td><?php echo $int['note']; ?></td>
            <td> <a  class="btn btn-default pull-left" data-toggle="modal" data-target="#myModal" title="Edit Note"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a></td>
          
		  <?php }?>
           </tr>
          <!--   <tr>
			
			<td>country</td>
            <td><?php echo $int['country']; ?></td>
            
           </tr>
             <tr>
			
			<td>city</td>
            <td><?php echo $int['city']; ?></td>
            
           </tr>
			-->
          <!--<tr>
          
          <td>
                <a class="btn btn-default" href="<?php echo SURL; ?>users/edit_interior/<?php echo $int['id']; ?>"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a>
                
                </td>
           
</tr>-->

       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog bs-example-modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Sample</h4>
				</div>
				<div class="modal-body">
					
						
					<div class="row form-group">
						<div class="col-md-12 col-sm-12 col-xs-12 contact_field_margin">
							<label>Description</label>
							<textarea class="form-control" rows="3" placeholder="Description" id="note"><?php if($int['note']!='none'){echo $int['note']; }?></textarea>
                            	<input type="hidden" placeholder="Name" value="<?php echo $int['id']; ?>" id="contact_id" class="form-control">
						</div>
					</div>	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <?php if($int['note']=='none'){?>
					<button type="button" class="btn btn-danger" onclick="add_notes()" data-dismiss="modal">Add Note</button>
                    <?php }else{?>
                    <button type="button" class="btn btn-danger" onclick="add_notes()" data-dismiss="modal">Update Note</button>
                    <?php }?>
				</div>
			</div>
		  </div>
		</div>
         <?php 
}?>     


    </tbody>
</table>
</div>
                                              					</div>
                                                            </div>
                                                        
                                                        
                                                        <div class="clear20"></div>
                                                        
        <div aria-label="First group" role="group" class="btn-group pull-right">
        
       
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


<?php echo $footer; ?>