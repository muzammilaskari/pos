<?php echo $header; ?>

<div class="page-container row-fluid">

  <!-- BEGIN SIDEBAR -->
        <?php echo $sidebar; ?>
  <!-- END SIDEBAR -->

  <!-- BEGIN PAGE CONTAINER-->
 <script> 
function update_size(){
	   
	 ////  $('#loader').html('<img src="<?php //echo IMAGES; ?>ajax-loading-orange.gif" style="padding-left:50%;">') //show loading image
	   
	   $("#no_mor").hide();
	   
	   
	   $(".load_more").removeAttr("disabled");
	   
	var size_id 	= $('#size_id').val();
	var size   = $('#size').val();

	alert(size_id);
	alert(size);
	 
	   $('#loader').html('');
	   
	    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
		
	   $('#results').load("<?php echo SURL.'product/edit_size'?>", {'page':track_click,'size_id':size_id, 'size': size}, function() {}); //initial data to load
	  $("#newsResult").load(window.location + " #newsResult");  
	}
	</script>
    
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  
  <link rel="stylesheet" href="<?php  echo SURL;?>assets/css/normalize.css" />
 <style>
    body { font-size: 16px; color: #1e1f19; background-color: #f3f3f3; padding: 10px 20px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; }
    h2, h3, h4 { color: #464646; }
    section { margin-bottom: 40px; }
    section:after { content: "."; display: block; height: 0; clear: both; visibility: hidden; }

    #intro .zelect {
      display: inline-block;
      background-color: white;
      min-width: 300px;
      cursor: pointer;
      line-height: 36px;
      border: 1px solid #dbdece;
      border-radius: 6px;
      position: relative;
    }
    #intro .zelected {
      font-weight: bold;
      padding-left: 10px;
    }
    #intro .zelected.placeholder {
      color: #999f82;
    }
    #intro .zelected:hover {
      border-color: #c0c4ab;
      box-shadow: inset 0px 5px 8px -6px #dbdece;
    }
    #intro .zelect.open {
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
    }
    #intro .dropdown {
      background-color: white;
      border-bottom-left-radius: 5px;
      border-bottom-right-radius: 5px;
      border: 1px solid #dbdece;
      border-top: none;
      position: absolute;
      left:-1px;
      right:-1px;
      top: 36px;
      z-index: 2;
      padding: 3px 5px 3px 3px;
    }
    #intro .dropdown input {
      font-family: sans-serif;
      outline: none;
      font-size: 14px;
      border-radius: 4px;
      border: 1px solid #dbdece;
      box-sizing: border-box;
      width: 100%;
      padding: 7px 0 7px 10px;
    }
    #intro .dropdown ol {
      padding: 0;
      margin: 3px 0 0 0;
      list-style-type: none;
      max-height: 150px;
      overflow-y: scroll;
    }
    #intro .dropdown li {
      padding-left: 10px;
    }
    #intro .dropdown li.current {
      background-color: #e9ebe1;
    }
    #intro .dropdown .no-results {
      margin-left: 10px;
    }
  </style>
  <script>
    $(setup)

    function setup() {
      $('#intro select').zelect({})
    }
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

                                    <div class="grid-body no-border">

											 <h3 class="text-center heading_color">Add Project</h3>
											 <br>
											<div class="row">
											 	<div class="col-md-5 pull-left">
<!--<?php
if($this->session->userdata('user_type')==1)
{   
?>                                                
					<a class="btn btn-default" href="<?php echo SURL?>product/add_size">Add Sizes</a>
<?php
}  
?>-->
												</div>

            
            <!--form search starts here -->
            
            <div class="col-md-1 pull-right">
           
            <form id="frm_add" action="<?php echo SURL;?>users/manage_interior" method="post"> 
            
           
            
            
            </div>  
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
            
            <div class="col-md-4 pull-right">
            
           <!-- <input type="text" required="required" placeholder="Search Model Name" id="model" class="form-control">--> 
            
            </div>
            </form>
            <!--form seardh ends here -->


											 </div>
										<br>	 
											 <div class="panel-collapse collapse in" id="basicFormExample">
                                        
                                        <div class="ssm_home_dashboard">
                                     <form action="<?php echo SURL?>project/add_project_process" enctype="multipart/form-data" method="post" id="frm_add" >
									<div class="row">
										<div class="col-md-12">
										<div class="switch_board_main">
											<div class="clear20"></div>
												<!--<div class="row form-group">
													<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
														<label>Model Name</label>
														<input type="text" placeholder="Name" name="model_name" class="form-control">
													</div>
													<div class="col-md-6 col-sm-12 col-xs-12">
														<label>Price</label>
														<input type="text" placeholder="Price" name="price" class="form-control">
													</div>
												</div>-->
												<div class="row form-group">
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
																			<label>Project Name</label>
																			<input type="text" required="required" placeholder="Project Name" class="form-control" name="project_name">
																		</div>
                                                                        <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                        
																			<label>Owner Firms</label>
		  <section id="intro">
														<select name="sub_firm_name" id="sub_firm_name">
                                                        
                                                       
                                                       
		<option>Select Firms</option>';
		<?php foreach($get as $get){?>
        <option value="<?php echo $get['id'];?>"><?php echo $get['firm_name'];?></option>';
		<?php }?>
		</select>
        </section>
																		</div>
																		
																	</div>
												<!--<div class="row form-group">
													
													<div class="col-md-6 col-sm-12 col-xs-12">
														<label>Sample Stock Status</label>
														<input type="text" placeholder="Sample Stock Status" name="sample_stock_status" class="form-control">
													</div>
												</div>-->
												
											
											<div class="clear20"></div>
											<input type="submit" class="btn btn-default pull-left custom-marg" value="Save">
											</div>
										</div>
									</div>
								</form>
                                <div id="results">
                                                </div>
                                        	
                                            	
                                                <div class="row">
                                                	<div class="col-md-12">
                                                    <div class="switch_board_main">
                                                        
                                                        <div class="setalerts_table">
                                                            <div class="table-responsive">
<div id="newsResult">
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Project Name</th>
         
         
			
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
		$count=1;
		if(!empty($project)){
        foreach($project as $int)
        {
        ?>       

        <tr>
			
		<td><?php echo $count; ?></td>
            <td><?php echo $int['project_name']; ?></td>
                     
           
			<td>
<?php
if($this->session->userdata('user_type')==1)
{   
?>            
<a  title="edit the data" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $int['id']; ?>"><i class="fa fa-pencil" aria-hidden="true" ></i></a>
               <!-- <a class="btn btn-default" href="<?php echo SURL; ?>product/get_size/<?php echo $int['id']; ?>"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a>-->
<?php
}   
?>
<?php
if($this->session->userdata('user_type')==1)
{   
?>  
             <!--   <a class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo SURL; ?>project/delete_project/<?php echo $int['id']; ?>"><i class="fa fa-trash" aria-hidden="true" title="delete the data"></i></a>-->
             


            </td>
            <td>
             <div aria-label="First group" role="group" class="btn-group pull-right">
        
        <?php  echo $this->pagination->create_links();?> 
        <!--<button class="btn btn-default" type="button"><i class="fa fa-angle-left"></i></button>
        <button class="btn btn-default" type="button">1</button>
        <button class="btn btn-default" type="button">2</button>
        <button class="btn btn-default" type="button">3</button>
        <button class="btn btn-default" type="button">4</button>
        <button class="btn btn-default" type="button"><i class="fa fa-angle-right"></i></button>-->
        </div>
            </td>
        </tr>
<div class="modal fade" id="<?php echo $int['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div id="extra" class="modal-dialog bs-example-modal-lg" role="document">
          <form action="<?php echo SURL?>project/edit_project" enctype="multipart/form-data" method="post" id="frm_add" >
			<div class="modal-content">
				<div class="modal-header">
              
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Update Project</h4>
				</div>
				<div class="modal-body">
					<div class="row form-group">
						<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
							<label>Project Name</label>
														<input type="text" placeholder="Project Name" class="form-control" name="project_name" value="<?php echo $int['project_name'];?>" id="size">
                             <input type="hidden"  name="id" class="form-control" value="<?php echo $int['id'];?>" id="size_id">
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
                      
                          <?php
						 // print_r($get);
						  ?>       
							<label>Owner Firms</label>
		  <section id="intro">
														<select name="sub_firm_name" id="sub_firm_name">
                                                        
                                       
                <option  value="0">Select Firm</option>
                          
                       
		
		<?php   foreach($gets as $get){
			
			?>
        <option value="<?php echo $get['id'];?>"><?php echo $get['firm_name'];?></option>';
		<?php }?>
		</select>
		</section>
						
                        </div>
					</div>
				
				</div>
				<div class="modal-footer">
					<input type="submit"   class="btn btn-default pull-left custom-marg" value="Update">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
           </form>
		  </div>
		</div>
        
<?php
$count++;}  }
?>
        <?php
        }
        ?>
              
    </tbody>
</table>
</div>
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