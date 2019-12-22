<?php  echo $header;?>

<div class="page-container row-fluid">

  <!-- BEGIN SIDEBAR -->
<?php echo $sidebar; ?>
  <!-- END SIDEBAR -->

  <!-- BEGIN PAGE CONTAINER-->
 
  <script> 
 

function add_quantity(){
	   
	 ////  $('#loader').html('<img src="<?php //echo IMAGES; ?>ajax-loading-orange.gif" style="padding-left:50%;">') //show loading image
	  var answer=confirm("Are You Sure YOu Want To Add a Quantity");
	 if (answer !=0){
	 //  alert("asd");
	 
	 
	   $("#no_mor").hide();
	   
	   
	   $(".load_more").removeAttr("disabled");
	   
	var id 	= $('mains#id').val();
	var quantity   = $('mains#quantity').val();

	alert(quantity);
	alert(id);
	 
	   $('#loader').html('');
	   
	    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
		
	  /* $('#results').load("<?php echo SURL.'product/edit_size'?>", {'page':track_click,'size_id':size_id, 'size': size}, function() {});*/ //initial data to load
	  $("#newsResult").load(window.location + " #newsResult");
	 }
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

                                    <div class="grid-body no-border pfc-grid-color-1">

											 <h3 class="text-center heading_color">Add Sample</h3>
											 <br>
											 
											 
											<div class="panel-collapse" id="">	
												<div class="ssm_home_dashboard">
													
														<div class="row">
															<div class="col-md-12">
																<div class="switch_board_main">
																	<div class="clear20"></div>
																		<div class="row form-group">
																			<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
																				<label>Select Product</label>
																				<select class="form-control" id="colorselector">
																					 <option>Select Product</option>
																					 <?php $variable=0; foreach($get_product as $get){ $variable++;?>
                                                        <option value="<?php echo $get['id']; ?>"><?php echo $get['product_name']; ?></option>
                                                        <?php }?>
																				</select>
																			</div>
																			
																			
																			
																		</div>
																		<div class="row form-group">
																			<div class="col-md-12 col-sm-12 col-xs-12 contact_field_margin">
																				<div class="output">
                                                                                <?php if(!empty($get_product_size)){ foreach($get_product as $get){?>
																					<div id="<?php echo $get['id']; ?>" class="colors red1">
																						<div class="grid simple horizontal red">
																							<div class="grid-title ">
																								<h4><?php echo $get['product_name']; ?></h4>
																								
																							</div>
																							<div class="custom-grid-body-1">
																								<div class="col-md-3 col-sm-12 col-xs-12 contact_field_margin">
                                                                                                <?php //$counts=0; 
																							 $count=count($get_product_size);
																							//for($i=0;$i<$count;$i++){
																								//foreach($get_product_size[$i] as $size){	
																								
																								 $image=$get_product_size[$get['id']][0]['image'];
																								
																								?>	
																								<?php if($image=='') {?> <img src="<?php echo SURL; ?>assets/profile_images/default-pic.png"  alt="no image" width="69" height="69" /> <?php } else{ ?> 
      <img src="<?php echo SURL; ?>assets/product_image/thumb/<?php echo $image;?>" width="100" height="100" /> <?php }?>
																								<?php //}
																								//}?>
                                                                                                </div>
																							
																								<div class="col-md-8 col-sm-12 col-xs-12 contact_field_margin">
																									<div class="form-group">
																										<label class="col-md-4 control-label"><b>Product</b></label>
																										<div class="col-md-6">
																											<p><?php echo $get['product_name']; ?></p>	
																										</div>
																									</div>	
																									<div class="form-group">
																										<label class="col-md-4 control-label"><b>Model Name</b></label>
																										<div class="col-md-6">
																											<p>
																												<?php echo $get['brand_name']; ?></p>	
																										</div>
																									</div>	
																									
																				
																								</div>	
																							</div>	
																							
																						</div>
																						
																						<div class="row">
																							<div class="col-md-12 col-sm-12 col-xs-12 contact_field_margin">
																								<div class="switch_board_main">
																									<div class="setalerts_table" style="margin-top:30px;">
																										<div class="table-responsive">
                                                                                                       <div id=" newsResult">
																											<table class="table table-bordered table-striped table-hover">
																												<thead>
																													<tr>
																														<th>Product Name</th>
																														<th>Model</th>
																														<th>Size</th>
																														<th>Sample Stock Status</th>
																																																											<th>Action</th>
																													</tr>
																												</thead>
																												<tbody>
<?php 
$extra=count($get_product_size[$get['id']]);
 $extra;
		for($i=0;$i<$extra;$i++){
			//
	//foreach($get_product_size[$get['id']][$i] as $sizes){	
	
	//echo "<pre>";print_r($size);
	

	?>		
																													<tr>
                                                                                                                    
																											<td><?php echo $get['product_name']; ?></td>
																														<td><?php echo $get['brand_name']; ?></td>
																														<td><?php echo $get_product_size[$get['id']][$i]['size']; ?></td>
																														<td><?php echo $get_product_size[$get['id']][$i]['sample_stock_status']; ?></td>
                                                                                                                        																								<td>
<?php if($get_product_size[$get['id']][$i]['sample_stock_status']>0){ ?>
<a  class="btn btn-default" title="Assign Samples" href="<?php echo SURL; ?>product/assign_samples/<?php echo $get_product_size[$get['id']][$i]['id']; ?>"><i class="fa fa-plus-square" aria-hidden="true" ></i></a>
<!--<a  class="btn btn-default" title="Assign Samples" data-toggle="modal" data-target="#<?php echo $get_product_size[$get['id']][$i]['id']; ?>"><i class="fa fa-plus-square" aria-hidden="true" ></i></a>-->
														<?php }else{?>	
                                                        <a  class="btn btn-default" title="Assign Samples" data-toggle="modal" onclick="alert('No Sample Stock Is Available First you Have To Add The Stock');" data-target="#<?php echo $get_product_size[$get['id']][$i]['id']; ?>"><i class="fa fa-plus-square" aria-hidden="true" ></i></a>
                                                        <?php }?>																<a style="margin-top:5px;" class="btn btn-danger" href="<?php echo SURL; ?>product/delete_product_size/<?php echo$get_product_size[$get['id']][$i]['id']; ?>"  title="Delete Samples"><i class="fa fa-trash" aria-hidden="true" title="delete the data"></i></a>  
																														</td>
                                                                                                                       

        																												</tr>
                                                                                                                        <!-- Modal -->
          <div id="newsResult1">                                                                                                               
		<div class="modal fade" id="<?php echo $get_product_size[$get['id']][$i]['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog bs-example-modal-lg" role="document">
          <form name="compose_message" id="compose_message" action="<?php  echo SURL; ?>product/add_quantity" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Sizes Quantity</h4>
				</div>
				<div class="modal-body">
					<!--<div class="row form-group">
						<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
							<label>Name</label>
							<input type="text" placeholder="Name" class="form-control">
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<label>Model</label>
							<input type="text" placeholder="Model" class="form-control">
						</div>
					</div>-->
					<div class="row form-group">
						<!--<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
							<label>Size</label>
							<input type="text" placeholder="Size" class="form-control">
						</div>-->
						<div class="col-md-6 col-sm-12 col-xs-12" >
                       
							<label>Sample Stock Quantity</label>
							<input type="text" placeholder="Quantity" id="quantity" name="quantity" class="form-control">
                            <input type="hidden" name="id" id="id" value="<?php echo $get_product_size[$get['id']][$i]['id']; ?>" class="form-control">
                           
						</div>
					</div>	
					<!--<div class="row form-group">
						<div class="col-md-12 col-sm-12 col-xs-12 contact_field_margin">
							<label>Description</label>
							<textarea class="form-control" rows="3" placeholder="Description"></textarea>
						</div>
					</div>-->	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                    <input type="submit" value="Add Quantity" class="btn btn-danger"  />
				</div>
			</div>
            </form>
		  </div>
		</div>
	</div>
	<!-- Modal -->
<?php // }
}?>																												</tbody>
																											</table>
                                                                                                            </div>
																										</div>
																									</div>
																								</div>
																							</div>	
																						</div>	
																					</div>
                                                                                    
                                                                                    
                                                                                     <?php }}else{?>
                                                                                     <div class="alert alert-danger"><center>No Sizes Are Added<center></div>
                                                                                     <?php }?>
																				<!--	<div id="yellow1" class="colors yellow1">
																						<div class="grid simple horizontal red">
																							<div class="grid-title ">
																								<h4>Product 2</h4>
																								<a  class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal">Add Sample</a>
																							</div>
																							<div class="custom-grid-body-1">
																								<div class="col-md-3 col-sm-12 col-xs-12 contact_field_margin">
																									<img class="img-responsive img-thumbnail" style="width:250px; margin-bottom:15px;" alt="" src="assets/img/bd2x.jpg">
																								</div>
																							
																								<div class="col-md-8 col-sm-12 col-xs-12 contact_field_margin">
																									<div class="form-group">
																										<label class="col-md-4 control-label"><b>Product</b></label>
																										<div class="col-md-6">
																											<p>Product 1</p>	
																										</div>
																									</div>	
																									<div class="form-group">
																										<label class="col-md-4 control-label"><b>Description</b></label>
																										<div class="col-md-6">
																											<p>
																												Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
																												Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>	
																										</div>
																									</div>	
																									
																				
																								</div>	
																							</div>	
																							
																						</div>
																							
																						<div class="row">
																							<div class="col-md-12 col-sm-12 col-xs-12 contact_field_margin">
																								<div class="switch_board_main">
																									<div class="setalerts_table" style="margin-top:30px;">
																										<div class="table-responsive">
																											<table class="table table-bordered table-striped table-hover">
																												<thead>
																													<tr>
																														<th>Name</th>
																														<th>Model</th>
																														<th>Size</th>
																														<th>Quantity</th>
																														<th>Description</th>
																														<th>Delete</th>
																													</tr>
																												</thead>
																												<tbody>
																													<tr>
																														<td>Product 1</td>
																														<td>XXX</td>
																														<td>345</td>
																														<td>50</td>
																														<td>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</td>
																														<td>
																															<a style="margin-top:5px;" class="btn btn-danger" >Delete</a>  
																														</td>
																													</tr>
																													<tr>
																														<td>Product 2</td>
																														<td>YYY</td>
																														<td>345</td>
																														<td>50</td>
																														<td>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</td>
																														<td>
																															<a style="margin-top:5px;" class="btn btn-danger" >Delete</a>
																														</td>
																													</tr>
																												</tbody>
																											</table>
																										</div>
																									</div>
																								</div>
																							</div>	
																						</div>
																					</div>
																					<div id="blue1" class="colors blue1">
																						<div class="grid simple horizontal red">
																							<div class="grid-title ">
																								<h4>Product 3</h4>
																								<a  class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal">Add Sample</a>
																							</div>


																							<div class="custom-grid-body-1">
																								<div class="col-md-3 col-sm-12 col-xs-12 contact_field_margin">
																									<img class="img-responsive img-thumbnail" style="width:250px; margin-bottom:15px;" alt="" src="assets/img/be2x.jpg">
																								</div>
																							
																								<div class="col-md-8 col-sm-12 col-xs-12 contact_field_margin">
																									<div class="form-group">
																										<label class="col-md-4 control-label"><b>Product</b></label>
																										<div class="col-md-6">
																											<p>Product 1</p>	
																										</div>
																									</div>	
																									<div class="form-group">
																										<label class="col-md-4 control-label"><b>Description</b></label>
																										<div class="col-md-6">
																											<p>
																												Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
																												Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>	
																										</div>
																									</div>	
																									
																				
																								</div>	
																							</div>	
																							
																						</div>
																							
																						<div class="row">
																							<div class="col-md-12 col-sm-12 col-xs-12 contact_field_margin">
																								<div class="switch_board_main">
																									<div class="setalerts_table" style="margin-top:30px;">
																										<div class="table-responsive">
																											<table class="table table-bordered table-striped table-hover">
																												<thead>
																													<tr>
																														<th>Name</th>
																														<th>Model</th>
																														<th>Size</th>
																														<th>Quantity</th>
																														<th>Description</th>
																														<th>Delete</th>
																													</tr>
																												</thead>
																												<tbody>
																													<tr>
																														<td>Product 1</td>
																														<td>XXX</td>
																														<td>345</td>
																														<td>50</td>
																														<td>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</td>
																														<td>
																															<a style="margin-top:5px;" class="btn btn-danger" >Delete</a>  
																														</td>
																													</tr>
																													<tr>
																														<td>Product 2</td>
																														<td>YYY</td>
																														<td>345</td>
																														<td>50</td>
																														<td>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</td>
																														<td>
																															<a style="margin-top:5px;" class="btn btn-danger" >Delete</a>  
																														</td>
																													</tr>
																												</tbody>
																											</table>
																										</div>
																									</div>
																								</div>
																							</div>	
																						</div>
																					</div>-->
																				</div>
																			</div>
																		</div>
																		
																	<!--	
																	<div class="clear20"></div>
																	<a href="#" class="btn btn-default pull-left custom-marg">Add</a>
																	<a href="#" class="btn btn-danger pull-left custom-marg">Cancel</a>
																	-->
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

	
	<!-- Modal -->
	
	
	<!-- Modal -->
    
		
	
	<!-- Modal -->
	



<?php echo $footer;?>