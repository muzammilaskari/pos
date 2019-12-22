<?php echo $header_script;?>
<style>
    h2, h3, h4 { color: #464646; }
    section { margin-bottom: 40px; }
    section:after { content: "."; display: block; height: 0; clear: both; visibility: hidden; }

    #intro .zelect {
      display: inline-block;
      background-color: white;
      min-width: 495px;
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
<!-- Overlay Div -->

<script src="<?php echo SURL; ?>assets/js/zelect.js"></script>

<div id="overlay" class="transparent"></div>
<div id="wrapper" class="preload"> <?php echo $header;?><!-- /top-nav--> 
  <!-- /top-nav--> 
  <!--Start Left Panel--> 
  <?php echo $sidebar;?> 
  <!--End Left Panel-->
  
  <div id="main-container">
    <div id="breadcrumb">
      <div id="topbar">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </div>
    <!-- /breadcrumb-->
    <div class="main-header clearfix">
      <div class="page-title">
        <h3 class="no-margin">Assign Quantity</h3>
        <hr>
        <a href="<?php echo base_url();?>user_shop/sales_listing_sheet" class="btn btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-sign-in"></i>View Sale Detail</a> 
        <!--<span>Welcome back Mr.Admin</span>--> 
      </div>
      <!-- /page-title -->
      
      <ul class="page-stats">
        
        <!--<li>
                <div class="value">
                    <span>My Income</span>
                    <h4>$<strong id="currentBalance">150</strong></h4>
                </div>
                
            </li>-->
      </ul>
      <!-- /page-stats --> 
    </div>
    <!-- /main-header -->
    <div class="col-md-12">
      <?php
                    if($this->session->flashdata('err_message')){
                ?>
      <div class="alert alert-danger">
        <center>
          <?php echo $this->session->flashdata('err_message'); ?>
        </center>
      </div>
      <?php
                    }//end if($this->session->flashdata('err_message'))
                ?>
    </div>
    <div> &nbsp;</div>
    <div class="padding-md">
      <div class="costom-border-line">
        <?php if(isset($product_listing) && (count($product_listing)>0)){?>
        <form action="#" enctype="multipart/form-data" method="post" id="frm_add" >
          <!-- /.row -->
          <div class="costom-forem">
            <div class="row">
            	<div class="col-md-6">
                &nbsp;
                </div>
                <div class="col-md-6">
                	<label class="">Product code</label>
                    <input type="text" name="bar_code" id="bar_code" value="" class="form-control" />
                </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label class="">Product Name</label>
                <section id="intro">
                <select name="product_id" id="product_id" class="form-control" onchange="get_price()">
                  <?php foreach($product_listing as $product_value){?>
                  <option value="<?php echo $product_value['product_id'].','.$product_value['price'].','.$product_value['product_type'];?>"><?php echo $product_value['product_name'].'('.$product_value['quantity'].')';?></option>
                  <?php }?>
                  <?php foreach($offer_listing as $offer_value){?>
                  <option value="<?php echo $offer_value['id'].','.$offer_value['price'].','.$offer_value['product_type'];?>"><?php echo $offer_value['product_name'];?> (Offer)</option>
                  <?php }?>
                </select>
                </section>
              </div>
              <!--end of col-->
              <div class="col-md-6">
                <label class="">Quantity</label>
                <input type="number" onkeyup="set_price()" name="quantity" id="quantity" value="1" required="required" class="form-control" />
              </div>
              <!--end of col--> 
            </div>
            <!--end of row--> 
            <br>
            <div class="row">
              <div class="col-md-6">
                <label class="">Price</label>
                <input type="number" readonly="readonly" name="price" id="price" class="form-control" />
              </div>
              <!--end of col-->
              <div class="col-md-6">
                <label class="">Total Price</label>
                <input type="number" readonly="readonly" name="tprice" id="tprice" class="form-control" />
              </div>
              <!--end of col--> 
              <!--end of col--> 
            </div>
            <!--end of row--> 
            <br>
            <!--end of row-->
            <div class="row">
              <div class="col-md-12"> <br>
                <input type="button" id="save" value="Add another" class="btn btn-success btn-sm bounceIn animation-delay5 pull-right submit" />
                <br />
                <br />
                <br />
                <div class="costom-table-agline">
                  <div class="clearfix"></div>
                  <div class="table-responsive">
                    <table class="table table-striped2">
                      <thead class="costom-thead-bg2">
                        <tr>
                          <td>#</td>
                          <td>Product Title</td>
                          <td>Quantity</td>
                          <td>Price</td>
                          <td>Total Price</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                      <tbody id="res_responce">
                      </tbody>
                    </table>
                  </div>
                </div>
                
                <!--<button class="btn btn-success btn-sm bounceIn animation-delay5 login-link pull-right submit" id="save" type="submit" name="submit" value="submit" ><i class="fa fa-sign-in"></i> Update</button>--> 
              </div>
            </div>
          </div>
        </form>
        <?php }else{?>
        <span class="costom-color-text">No Product Assign to Shop</span>
        <?php }?>
        <form action="<?php echo base_url();?>user_shop/sales_process_complt" enctype="multipart/form-data" method="post" id="frm_add" >
          <hr />
          <div class="costom-forem">
            <div class="row">
            	
              <div class="col-md-3">
              <label class="">Discount (%)</label>
              	<input type="number" name="discount" value="0" onblur="cal_res()" id="discount" class="form-control" />
              </div>
              
                		
					
              <div class="col-md-2" >
              <label class="">Amount after discount</label>
              	<div id="remaning_ammount" style=" border:1px solid#FFF; font-size:15px; font-weight:bold; color:#0F0; padding:5px" >0</div>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-md-1">
                <label>Payment</label>
              </div>
              <!--end of col-->
              <div class="costom-radio-btn">
                <div class="col-md-1">
                  <input checked="checked" type="radio" name="p_type" value="0" required="required">
                  <p>Cash</p>
                </div>
                <div class="col-md-1">
                  <input type="radio" name="p_type" value="1">
                  <p>Card</p>
                </div>
                <div class="col-md-2">
                  <input type="radio" name="p_type" value="2">
                  <p>Online</p>
                </div>
              </div>
              <!--costom-radio-btn--> 
            </div>
            
            <!--end of col-->
            <div class="row">
              <div class="col-md-12">
                <label class="">Comment</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-7">
                <div class="message-box">
                  <textarea name="sale_comment" class="form-control" required="required"> Thank You for visiting.</textarea>
                </div>
              </div>
            </div>
            
            
            
            <style>
.message-box .form-control{
		    padding: 0px 0px 143px 0px;
		}
</style>
            <div class="row">
              <div class="col-md-12">
                <input type="submit" id="save" value="Save" class="btn btn-success btn-sm bounceIn animation-delay5 pull-right submit" />
              </div>
            </div>
          </div>
        </form>
      </div>
      <button type="hidden" style="display:none;" id="abc" data-toggle="modal" data-target="#myModal">Open Modal</button>
      <div id="temp_responce" ></div>
      <div id="res_responce_123"></div>
      <!-- <div class="costom-table-agline">
        <div class="clearfix"></div>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="costom-thead-bg">
                <tr>
                    <td>#</td>
                    <td>Product Title</td>
                    <td>Quantity</td>
                    <td>Payment Type</td>
                    <td>Total Price</td>
                </tr>
            </thead>
            <tbody >
                
            </tbody>
        </table>
        </div>
	</div>--> 
    </div>
    <!-- /.padding-md --> 
  </div>
</div>
<!-- /wrapper --> 

<script>

	$(document).ready(function () {
        //get_price();
		//set_price();
    });
	function wait(ms){
		var start = new Date().getTime();
		var end = start;
		while(end < start + ms) {
			end = new Date().getTime();
		}
	}
	
	$("#bar_code").keypress(function(e) {
		if(e.which == 13) {
			var cod_val = $("#bar_code").val();
			$.ajax({

                type: "POST",

                url: "<?php echo SURL; ?>user_shop/check_product_value/"+cod_val,
				async:false,
                //data: $("#frm_add").serialize(),

                success: function(result){
					 if(result == '1'){
						alert('Invalid code');
					 }else{
						 $("#intro").html(result);
						 get_price();
						 $('#save').trigger('click');
					 }

                }

            });
			//alert($("#product_id").val());
			//wait(1000);
			//get_price();
			//alert('You pressed enter!'+cod_val);
			//$('#save').trigger('click');
		}
	});
	
	$(setup);

    function setup() {
      $('#intro select').zelect({ placeholder:'Please select ' })
    }
	
	function cal_res(){
		
		var total_ammount = $("#total_price").text();
		var dis_per = $("#discount").val();
		if(dis_per>100){
			alert('Enter correct Discount Percentagee');
		}else{
			var res_pre = 100 - dis_per;
			var remaning_pre = res_pre/100;
			var remaning_ammount = total_ammount * remaning_pre;
			//alert(remaning_ammount);
			$("#remaning_ammount").text(remaning_ammount);
		}
		
	}
	
	function del_rec(del_id){
		//alert(del_id);
		$.ajax({

                type: "POST",

                url: "<?php echo SURL; ?>user_shop/unset_session_process/"+del_id,

                data: $("#frm_add").serialize(),

                success: function(result){
					 
						$("#res_responce").html(result);

                }

            }); 
		//document.getElementById("save").click();	
	}
	
	function get_price(){
		
		
		
		var price = document.getElementById("product_id").value;
		//var res_price = price.substr(price.indexOf(",") + 1);
		//alert(price);
		var res_price_sep = price.split(",");
		//alert(res_price_sep[1]);
		var res_price = res_price_sep[1];
		document.getElementById("price").value = res_price;
		set_price();
		$('#abc').attr('data-target','#'+res_price_sep[0]);
		//=========================Ajax for offer Product================
		if(res_price_sep[2] == 1){
		$.ajax({

                type: "POST",

                url: "<?php echo SURL; ?>user_shop/offer_product/"+res_price_sep[0],

                data: $("#frm_add").serialize(),

                success: function(result){
					 
						$("#temp_responce").html(result);
						//$("#temp_responce").dialog("open");
						document.getElementById('abc').click();

                }

            }); 
		}
		//========================= End Ajax for offer Product===========
		//alert(res_price);
	}
	
	function set_price(){
		var quantity = document.getElementById("quantity").value;
		var price = document.getElementById("price").value;
		var total = quantity * price;
		document.getElementById("tprice").value = total;
		//alert(res_price);
	}
	
	
	
	
	$("#save").click(function(){
			
            $.ajax({

                type: "POST",

                url: "<?php echo SURL; ?>user_shop/sales_process/",

                data: $("#frm_add").serialize(),

                success: function(result){
					 
						$("#res_responce").html(result);

                }

            });  

    });
</script> 

<?php echo $footer;?>