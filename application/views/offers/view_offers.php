<?php echo $header_script;?>
	<!-- Overlay Div -->
	<div id="overlay" class="transparent"></div>
    <style>span{ color:#fff;}</style>
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
            <h3 class="no-margin">View Offers Detail</h3>
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
        <form action="#" enctype="multipart/form-data" method="post" id="frm_add" >
        <!-- /.row -->
        <div class="costom-forem">
        <div class="row">
       <div class="col-md-4 col-sm-4 col-xs-4">
        <label class="">Offer Name :</label>
       </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
        <span><?php echo $offer_detail[0]['product_name'];?></span>
        </div>
       <div class="col-md-3 col-sm-3 col-xs-3">
        <label class="">Price</label>
       </div>
       <div class="col-md-2 col-sm-2 col-xs-2">
        <span><?php echo $offer_detail[0]['price'];?></span>
        </div>
    </div>
    <hr />
    <div class="costom-table-bg ">
    <div class="row">
       
       <div class="col-md-6 col-sm-6 col-xs-6">
       <label class="">Product Name</label>
       </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
      <label class="">Quantity</label>
      </div>
      </div>
       </div>
       
        <?php if(count($offer_related)>0){?>
        <?php foreach($offer_related as $related){?>
        
        
        <?php foreach($all_product as $productname){?>
        <?php if($related['product_id'] == $productname['id']){?>
        
        	<div class="col-md-6 col-sm-6 col-xs-6">
            <!--<label class="">Product Name</label><br />--><br />
            
            	<span><?php echo $productname['product_name'].''; break;?></span>
           
            </div>
            
           <div class="col-md-6 col-sm-6 col-xs-6">
          
            
        <?php }?>
        <?php }?>
       </div>
           
          <div class="col-md-6 col-sm-6 col-xs-6">
           <!--<label class="">Quantity</label><br />--> <br />
           
            <span><?php echo $related['product_quantity']?></span>
            </div>
            
			
            
		<?php }?>
        
        <?php }?>
      
        
        <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
        <br>
        <a href="<?php echo base_url();?>manage_offers/all_offers" class="btn btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-sign-in"></i>Cancel</a>
        
        <!--<button class="btn btn-success btn-sm bounceIn animation-delay5 login-link pull-right submit" id="save" type="submit" name="submit" value="submit" ><i class="fa fa-sign-in"></i> Update</button>-->
        </div>
        </div>
        </div>
        </form>
	</div>
    </div><!-- /.padding-md -->
  
</div>

	</div><!-- /wrapper -->

<?php echo $footer;?>