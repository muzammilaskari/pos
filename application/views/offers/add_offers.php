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

<script src="<?php echo SURL; ?>assets/js/zelect.js"></script>
	<!-- Overlay Div -->
	<div id="overlay" class="transparent"></div>
 
	<div id="wrapper" class="preload">
		    <?php echo $header;?><!-- /top-nav-->
		<!-- /top-nav-->
        <!--Start Left Panel-->
        <?php echo $sidebar;?>	
		<!--End Left Panel-->
        
<div id="main-container">
    <div id="breadcrumb">
        <div id="topbar">
  <ol class="breadcrumb"><li class="active">Dashboard</li></ol>
</div>
    </div><!-- /breadcrumb-->
    <div class="main-header clearfix">
        <div class="page-title">
            <h3 class="no-margin">Add offers</h3>
            <!--<span>Welcome back Mr.Admin</span>-->
        </div><!-- /page-title -->
        
        <ul class="page-stats">
            
            <!--<li>
                <div class="value">
                    <span>My Income</span>
                    <h4>$<strong id="currentBalance">150</strong></h4>
                </div>
                
            </li>-->
        </ul><!-- /page-stats -->
    </div><!-- /main-header -->
    
    
    <div class="padding-md">
    <div class="costom-border-line">
        <form action="<?php echo SURL?>manage_offers/add_offers_process" enctype="multipart/form-data" method="post" id="frm_add" >
        <!-- /.row -->
        <div class="costom-forem">
        <div class="row">
        <div class="col-md-6">
        <label class="">Offer Name</label>
       <input type="text" placeholder="Offer Name" required id="product_name" name="product_name" class="form-control">
        </div><!--end of col-->
        <div class="col-md-6">
        <label class="">Total Price</label>
       <input type="number" placeholder="Price" required id="price" name="price" class="form-control">
        </div><!--end of col-->
     
        </div><!--end of row-->
        <br>
        <div class="row">
        <?php if(count($all_product)>0){?>
        <div class="col-md-6">
        <label class="">Select Product</label>
        <section id="intro">
        	<select name="product_id[]" class="form-control">
            	<?php foreach($all_product as $product){?>
                	<option value="<?php echo $product['id'];?>"><?php echo $product['product_name'];?></option>
                <?php }?>
            </select>
        </section>
        </div><!--end of col-->
        <div class="col-md-6">
        <label class="">Quantity</label>
       <input type="number" placeholder="Quantity" required id="quantity" name="quantity[]" class="form-control">
        </div><!--end of col-->
     	<?php }else{?>
        NO Product is added
        <?php }?>
        </div><!--end of row-->
        <br>
        <div class="row">
        	<div id="responce">
            </div>
        </div>
        <br>
       <style>.btn.btn-success {
    background: #65cea7;
    border: 1px solid #3ec291;
    margin-left: 10px;
}</style>
        <div class="row">
        <div class="col-md-12">
        <br>
       
        <input type="button" id="add_another" value="Add another" class="btn btn-success btn-sm bounceIn animation-delay5 pull-right submit" />
        
        
        <input type="submit" id="save" value="Save" class="btn btn-success btn-sm bounceIn animation-delay5 pull-right submit" />
        
        <!--<button class="btn btn-success btn-sm bounceIn animation-delay5 login-link pull-right submit" id="save" type="submit" name="submit" value="submit" ><i class="fa fa-sign-in"></i> Update</button>-->
        </div>
        </div>
        </div>
        </form>
	</div>
    </div><!-- /.padding-md -->
</div>

	</div><!-- /wrapper -->
<script>

$(setup);

    function setup() {
      $('#intro select').zelect({ placeholder:'Please select ' })
    }

	var counter = 0;
	var conut = 0;
	$("#add_another").click(function(){
			conut++;
            $.ajax({

                type: "POST",

                url: "<?php echo SURL; ?>manage_offers/add_another_product_process/",

                data: {counter: counter,conut: conut},

                success: function(result){
					 
						$("#responce").append(result);
						$('select#prd_id'+conut).zelect({ placeholder:'Please select ' })

                }

            }); 
			counter++; 

    });
	function resdiv(div_id){
		
		document.getElementById(div_id).textContent = '';
		
	}
</script>

<?php echo $footer;?>