<?php echo $header_script;?>
	<!-- Overlay Div -->

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
            <h3 class="no-margin">Add Stock</h3>
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
    <div class="col-md-12">
             <?php
                    if($this->session->flashdata('err_message')){
                ?>
                        <div class="alert alert-danger">
                        <center><?php echo $this->session->flashdata('err_message'); ?></center>
                        </div>
                <?php
                    }//end if($this->session->flashdata('err_message'))
                ?>
                <?php
                    if($this->session->flashdata('ok_message')){
                ?>
                        <div class="alert alert-success">
                        <center><?php echo $this->session->flashdata('ok_message'); ?></center>
                        </div>
                <?php
                    }//end if($this->session->flashdata('err_message'))
                ?>
	</div>
    
    <div class="padding-md">
    <div class="costom-border-line">
        <form action="<?php echo SURL?>user_shop/assign_quantity_process" enctype="multipart/form-data" method="post" id="frm_add" >
        <!-- /.row -->
        <div class="costom-forem">
        <div class="row">
        <!--<div class="col-md-6"><?php //echo '<pre>';print_r($this->session->userdata('shop_id'));exit;?>
        <label class="">Shop Name</label>
			<select name="shop_id" class="form-control">
				<?php foreach($all_shop as $shop_value){?>
                <option value="<?php echo $shop_value['id'];?>"><?php echo $shop_value['shop_title'];?></option>
                <?php }?>
            </select>
        </div>-->
        <div class="col-md-6">
        <label class="">Product Name</label>
        <section id="intro">
        <select name="product_id" class="form-control">
			<?php foreach($all_product as $shop_value){?>
            <option value="<?php echo $shop_value['id'];?>"><?php echo $shop_value['product_name'];?></option>
            <?php }?>
        </select>
        </section>
        </div><!--end of col-->
     	<div class="col-md-6">
        <label class="">Assign Quantity</label>
		<input type="number" name="quantity" id="quantity" required="required" class="form-control" />
        </div>
        </div><!--end of row-->
        <br>
        <div class="row">
        <!--end of col-->
        <!--end of col-->
     
        </div><!--end of row-->
        <br>
        <!--end of row-->
        <div class="row">
        <div class="col-md-12">
        <br>
        <input type="submit" id="save" value="Add Quantity" class="btn btn-success btn-sm bounceIn animation-delay5 pull-right submit" />
        
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

</script>

<?php echo $footer;?>