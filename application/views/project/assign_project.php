<?php  echo $header;?>

<div class="page-container row-fluid">

  <!-- BEGIN SIDEBAR -->
<?php echo $sidebar; ?>
  <!-- END SIDEBAR -->

  <!-- BEGIN PAGE CONTAINER-->
  <script>
  
function assign_project_firm(){
	  
	 ////  $('#loader').html('<img src="<?php //echo IMAGES; ?>ajax-loading-orange.gif" style="padding-left:50%;">') //show loading image
	   
	   $("#no_mor").hide();
	   
	   
	   $(".load_more").removeAttr("disabled");
	   
	   var project_id 	= $('#project_name').val();
	   var project_name   = $('#project_name').val();
	var sub_firm_name 	= $('#sub_firm_name').val();
	var firm_name   = $('#firm_name').val();
	
	if(firm_name!='0'){
	
	   var extra='0';
	   $('#loader').html('');
	   
	    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
		  
	   $('#firm').load("<?php echo base_url().'project/assign_project_firm'?>", {'page':track_click,'project_id':project_id,'sub_firm_name':sub_firm_name,'firm_name':firm_name}, function() {}); //initial data to load
	  $('#results3').load("<?php echo base_url().'project/get_firm_name'?>", {'page':track_click,'project_name':project_name}, function() {});
}else{
	$('#firm').html('<div class="alert alert-danger"><center>NO Value Is Seleted<center></div>');
}
$("#firm").show().delay(2000).fadeOut();
//$("#firm").hide();
	//$("#fresh").remove();
	}
	
	function assign_project_catalog(){
	 
	 ////  $('#loader').html('<img src="<?php //echo IMAGES; ?>ajax-loading-orange.gif" style="padding-left:50%;">') //show loading image
	   
	   $("#no_mor").hide();
	   
	   
	   $(".load_more").removeAttr("disabled");
	   var project_id 	= $('#project_name').val();
	   var project_name 	= $('#project_name').val();
	
	var catalog_name   = $('#catalog_name').val();
	
	if(catalog_name!=0){
	
	   var extra='0';
	   $('#loader').html('');
	   
	    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
		  
	   $('#catalog').load("<?php echo base_url().'project/assign_project_catalog'?>", {'page':track_click,'project_id':project_id,'catalog_name':catalog_name}, function() {}); //initial data to load
	    $('#results2').load("<?php echo base_url().'project/get_catalog'?>", {'page':track_click,'project_name':project_name}, function() {});
	}else{
	$('#catalog').html('<div class="alert alert-danger"><center>NO Value Is Seleted<center></div>');
}
$("#catalog").show().delay(2000).fadeOut();

	//$("#fresh").remove();
	}
	
	function assign_project_product(){
	 
	 ////  $('#loader').html('<img src="<?php //echo IMAGES; ?>ajax-loading-orange.gif" style="padding-left:50%;">') //show loading image
	   
	   $("#no_mor").hide();
	   
	   
	   $(".load_more").removeAttr("disabled");
	   var project_id 	= $('#project_name').val();
	   var project_name   = $('#project_name').val();
	   var product_name   = $('#product_name').val();
	   var sizes   = $('#sizes').val();
	   var quantity   = $('#quantity').val();
		if(product_name!='0'){
	
	
	
	   
	   $('#loader').html('');
	   
	    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
		  
	   $('#sample').load("<?php echo base_url().'project/assign_project_product'?>", {'page':track_click,'project_id':project_id,'product_name':product_name,'sizes':sizes,'quantity':quantity}, function() {}); //initial data to load
	    $('#results4').load("<?php echo base_url().'project/get_sample_name'?>", {'page':track_click,'project_name':project_name}, function() {});
	}else{
	$('#sample').html('<div class="alert alert-danger"><center>NO Value Is Seleted<center></div>');
	 
}
$("#sample").show().delay(2000).fadeOut();
	//$("#fresh").remove();
	}
	function check_quantity(){
	 
	 ////  $('#loader').html('<img src="<?php //echo IMAGES; ?>ajax-loading-orange.gif" style="padding-left:50%;">') //show loading image
	 
	   $("#no_mor").hide();
	   
	   
	   $(".load_more").removeAttr("disabled");
	
	var sizes   = $('#sizes').val();
	var quantity   = $('#quantity').val();
	
	
	
	   
	   $('#loader').html('');
	   
	    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
		  
	    $('#results1').load("<?php echo base_url().'project/check_quantity'?>", {'page':track_click,'sizes':sizes,'quantity':quantity}, function() {});
	//$('#product_button').hide()
	//$("#fresh").remove();
	}
	
	
	function get_catalog(){
	
	 ////  $('#loader').html('<img src="<?php //echo IMAGES; ?>ajax-loading-orange.gif" style="padding-left:50%;">') //show loading image
	 
	   $("#no_mor").hide();
	   
	   
	   $(".load_more").removeAttr("disabled");
	
	var project_name   = $('#project_name').val();
	

	
	   
	   $('#loader').html('');
	   
	    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
		  
	    $('#results2').load("<?php echo base_url().'project/get_catalog'?>", {'page':track_click,'project_name':project_name}, function() {});
	//$('#product_button').hide()
	//$("#fresh").remove();
	}
	
	function get_firm_name(){
	
	 ////  $('#loader').html('<img src="<?php //echo IMAGES; ?>ajax-loading-orange.gif" style="padding-left:50%;">') //show loading image
		   $("#no_mor").hide();
	   
	   
	   $(".load_more").removeAttr("disabled");
	
	var project_name   = $('#project_name').val();
	

	
	   
	   $('#loader').html('');
	   
	    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
		  
	    $('#results3').load("<?php echo base_url().'project/get_firm_name'?>", {'page':track_click,'project_name':project_name}, function() {});
	//$('#product_button').hide()
	//$("#fresh").remove();
	}
	
	
	function get_sample_name(){
	
	 ////  $('#loader').html('<img src="<?php //echo IMAGES; ?>ajax-loading-orange.gif" style="padding-left:50%;">') //show loading image
		   $("#no_mor").hide();
	   
	   
	   $(".load_more").removeAttr("disabled");
	
	var project_name   = $('#project_name').val();
	

	
	   
	   $('#loader').html('');
	   
	    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
		  
	    $('#results4').load("<?php echo base_url().'project/get_sample_name'?>", {'page':track_click,'project_name':project_name}, function() {});
	//$('#product_button').hide()
	//$("#fresh").remove();
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

                                <div class="grid simple pfc-grid-color-1">

                                    <div class="grid-body no-border">

											 <h3 class="text-center heading_color">Assign Project</h3>
											 <br>
											 
											 
											 <div class="panel-collapse" id="">	
												<div class="ssm_home_dashboard">
												
                                                  

														<div class="row">
															<div class="col-md-12">
															<div class="switch_board_main">
																
                                                                
                                                                <div class="row form-group">
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
																			<label>Project Name</label>
                                                                             <section id="intro">
																		<select name="project_name" id="project_name">
                                                        
                                                       
                                                       
		<option value="1">Select Project</option>';
		<?php foreach($all_project as $get){?>
        <option value="<?php echo $get['id'];?>"><?php echo $get['project_name'];?></option>';
		<?php }?>
		</select>
        </section>
																		</div>
                                                                        
																		
																	</div>
                                                                
                                                                
                                                                <div class="fresh">
                                                                <div class="col-md-12">
                                                                
                                                                <div class="panel-group" id="accordion">
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                      <h4 class="panel-title">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" onclick="get_firm_name();">
                                                                          Firms
                                                                        </a>
                                                                      </h4>
                                                                    </div>
                                                                    <div id="collapseOne" class="panel-collapse collapse">
                                                                      <div class="panel-body">
                                                                        <div class="clear10"></div>
                                                                    <div class="col-md-12">
                                                                    <div class="row form-group">
                                                                    <div id="firm">
                                                                    
                                                                    </div>
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                        <script>
																		window.onload = function() {
  get_firm_name();
};
																		</script>
																			<label>Main Firms</label>
														<select name="firm_name" id="firm_name" onchange="view_firm()" >
                                                         <option value="0">Select Firm</option>
                                                        <option value="interior designe">Interior Design</option>
                                                        <option value="main contractor">Main Contractor</option>
                                                        <option value="owner">Owner</option>
                                                        <option value="supplier">Supplier</option>
                                                        </select>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
                                                                        	 <span id="pack">
														
													</span>
																			
                                                                           
                                                                                
																		
																			
																		</div>
																	</div>
                                                                    <div class="row form-group">
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                     <div id="results3">
                                                                     
                                                                    </div>
                                                                    </div>
                                                                    </div>
																<!--	<div class="row form-group">
																		<div id="pack" class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                        <label >Sizes</label>
                                                                        <section id="intro">
                                                                                <select   name="size[]" style="width:425px;height:35px" id="model_size" >
                                                                                <option>Select Size</option>
                                                                                <?php foreach($get_size as $get){?>
                                                        <option value="<?php echo $get['size']; ?>"><?php echo $get['size']; ?></option>
                                                        <?php }?>
																				</select>
																			</section>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<label>Quantity</label>
																			<input type="text" required="required"  placeholder="Quantity" class="form-control" name="quantity[]">
																		</div>
																	</div>
                                                                    
                                                                    <div class="row form-group">
													
													<div class="col-md-6 col-sm-12 col-xs-12">
														<label>Sample Stock Status</label>
														<input type="text" placeholder="Sample Stock Status" name="sample_stock_status[]" class="form-control">
													</div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
														<label>Stock Status</label>
														<input type="text" placeholder="Stock" name="stock_status[]" class="form-control">
													</div>
												</div>
																	
                                                                    <div class="row form-group">
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
																			<label>Price</label>
																			<input type="text" required="required"  placeholder="Price" class="form-control" name="price[]">
																		</div>
                                                                        
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<label>Image</label>
																			<input type="file" required="required"  class="form-control" name="project_files[]">
																		</div>
																	</div>
                                                                    -->
                                                                     
                                                                    <div class="clear20"></div>
                                                                    
                                                                    <div id="add_stage_div"></div> 
                                                                    
																	<input type="submit" class="btn btn-default pull-left custom-marg" value="Save" onclick="assign_project_firm()">
                                                                    
                                                                   
                                                                    
                                                                    </div>
                                                                    
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                      <h4 class="panel-title">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" onclick="get_catalog();">
                                                                          
                                                                         Catalog
                                                                        </a>
                                                                      </h4>
                                                                    </div>
                                                                    <div id="collapseTwo" class="panel-collapse collapse">
                                                                      <div class="panel-body">
                                                                        <div class="clear10"></div>
                                                                        <div class="col-md-12">
                                                                    <div class="row form-group">
                                                                    <div id="catalog">
                                                                    
                                                                    </div>
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                        
																			<label>Catalog</label>
																			  <section id="intro">
														<select name="catalog_name" id="catalog_name">
                                                        
                                                       
                                                       
		<option value="0">Select Catalog</option>';
		<?php foreach($all_catalog as $catalog){?>
        <option value="<?php echo $catalog['id'].','.$catalog['catalog_name'];?>"><?php echo $catalog['catalog_name'];?></option>';
		<?php }?>
		</select>
        </section>
																		</div>
																		<!--<div class="col-md-6 col-sm-12 col-xs-12">
                                                                        	<label >Model</label>
																			 
    
    <select class="easyui-combobox"  name="brand_name" style="width:425px;height:30px">
      <option>Select Model</option>
                                                                                <?php foreach($get_model as $get){?>
                                                        <option value="<?php echo $get['brand_name']; ?>"><?php echo $get['brand_name']; ?></option>
                                                        <?php }?>
    </select>
 
																			
                                                                           
                                                                                
																		
																			
																		</div>-->
																	</div>
                                                                    <div class="row form-group">
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                         <div id="results2">
                                                                     
                                                                    </div>
                                                                        </div>
                                                                        </div>
                                                                    
																	<!--<div class="row form-group">
																		<div id="pack" class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                        <label >Sizes</label>
                                                                        <section id="intro">
                                                                                <select   name="size[]" style="width:425px;height:35px" id="model_size" >
                                                                                <option>Select Size</option>
                                                                                <?php foreach($get_size as $get){?>
                                                        <option value="<?php echo $get['size']; ?>"><?php echo $get['size']; ?></option>
                                                        <?php }?>
																				</select>
																			</section>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<label>Quantity</label>
																			<input type="text" required="required"  placeholder="Quantity" class="form-control" name="quantity[]">
																		</div>
																	</div>
                                                                    
                                                                    <div class="row form-group">
													
													<div class="col-md-6 col-sm-12 col-xs-12">
														<label>Sample Stock Status</label>
														<input type="text" placeholder="Sample Stock Status" name="sample_stock_status[]" class="form-control">
													</div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
														<label>Stock Status</label>
														<input type="text" placeholder="Stock" name="stock_status[]" class="form-control">
													</div>
												</div>
																	
                                                                    <div class="row form-group">
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
																			<label>Price</label>
																			<input type="text" required="required"  placeholder="Price" class="form-control" name="price[]">
																		</div>
                                                                        
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<label>Image</label>
																			<input type="file" required="required"  class="form-control" name="project_files[]">
																		</div>
																	</div>-->
                                                                    
                                                                     
                                                                    <div class="clear20"></div>
                                                                    
                                                                    <div id="add_stage_div"></div> 
                                                                    
																	<input type="submit" class="btn btn-default pull-left custom-marg" value="Save" onclick="assign_project_catalog()">
                                                                 
                                                                    
                                                                    </div>
                                                                        
                                                                        
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                      <h4 class="panel-title">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" onclick="get_sample_name();">
                                                                          
                                                                         Sample
                                                                        </a>
                                                                      </h4>
                                                                    </div>
                                                                    <div id="collapseThree" class="panel-collapse collapse">
                                                                      <div class="panel-body">
                                                                        <div class="clear10"></div>
                                                                        <div class="col-md-12">
                                                                    <div class="row form-group">
                                                                    <div id="sample">
                                                                    
                                                                    </div>
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
																			<label>Product Name</label>
																			<section id="intro">
														<select name="product_name" id="product_name" onchange="view_data()">
                                                        
                                                       
                                                       
		<option value="0">Select Product</option>';
		<?php foreach($all_product as $product){?>
        <option value="<?php echo $product['id'];?>"><?php echo $product['product_name'];?></option>';
		<?php }?>
		</select>
        </section>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
                                                                        	 <span id="pack1">
														
													</span>
 
																			
                                                                           
                                                                                
																		
																			
																		</div>
																	</div>
                                                                     <div id="results1">
                                                                     <div class="col-md-12">
            
                        
               
            </div>
                                                                    </div>
                                                                    <div class="row form-group">
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                        <label>Sample Quantity</label>
 <input type="text" required="required" onkeyup="check_quantity()"  placeholder="Quantity" class="form-control" name="quantity" id="quantity">
																		</div>
																		
																	</div>
                                                                    
                                                                     <div class="row form-group">
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                         <div id="results4">
                                                                     
                                                                    </div>
                                                                        </div>
                                                                        </div>
                                                                    
																	<!--<div class="row form-group">
																		<div id="pack" class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                        
																		</div>
																		
																	</div>
                                                                    
                                                                    <div class="row form-group">
													
													<div class="col-md-6 col-sm-12 col-xs-12">
														<label>Sample Stock Status</label>
														<input type="text" placeholder="Sample Stock Status" name="sample_stock_status[]" class="form-control">
													</div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
														<label>Stock Status</label>
														<input type="text" placeholder="Stock" name="stock_status[]" class="form-control">
													</div>
												</div>
																	
                                                                    <div class="row form-group">
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
																			<label>Price</label>
																			<input type="text" required="required"  placeholder="Price" class="form-control" name="price[]">
																		</div>
                                                                        
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<label>Image</label>
																			<input type="file" required="required"  class="form-control" name="project_files[]">
																		</div>
																	</div>-->
                                                                    
                                                                     
                                                                    <div class="clear20"></div>
                                                                    
                                                                    <div id="add_stage_div"></div> 
                                                                    
																	<input id="product_button" type="submit" class="btn btn-default pull-left custom-marg" value="Save" onclick="assign_project_product()">
                                                                    
                                                                   
                                                                    
                                                                    </div>
                                                                        
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
																</div>
</div>
                                                                
                                                                
                                                                
                                                                <div class="clear20"></div>
																	
												
                                               
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


<script>
	$('.collapse').on('shown.bs.collapse', function(){
	$(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
	}).on('hidden.bs.collapse', function(){
	$(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
	});
</script>

<?php echo $footer;?>