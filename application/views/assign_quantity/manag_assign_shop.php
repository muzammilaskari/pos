<?php echo $header_script;?>

<style type="text/css">
	
	table {
		font-size: 1em;
		border-collapse: collapse;
		margin: 0 auto
	}
	table, th, td {
		/*border: 1px solid #999;*/
		padding: 8px 16px;
		text-align: left;
	}
	table.ex-2 {
		min-width: 100px;
	}
	th {
		/*background: #f4f4f4;*/
		cursor: pointer;
	}

	th:hover,
	th.sorted {
		/*background: #d4d4d4;*/
	}

	th.no-sort,
	th.no-sort:hover {
		/*background: #f4f4f4;*/
		cursor: not-allowed;
	}

	th.sorted.ascending:after {
		content: "  \2191";
	}

	th.sorted.descending:after {
		content: " \2193";
	}

	.disabled {
		opacity: 0.5;
	}
</style>
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


  <div class="padding-md">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div id="placeholder"  style="height:1px; visibility:hidden;"></div>
                
                
            </div><!-- /panel -->


            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Quantity Assign To Shops</strong>
                    <hr><?php if($this->session->userdata('shop_id_1')){$shop = $this->session->userdata('shop_id_1');}else{$shop = 0;}?>
                    <div class="row">
                         <!--<div class="col-md-3 col-md-offset-5">                       
                        <span class="costom-span-text">Select Shop</span>
                    </div>-->
                    <div class="col-md-3 col-md-offset-8">
					<input type="text" class="form-control" name="serch_assign_shop" onkeyup="serch_res()" id="serch_assign_shop" placeholder="Search"/>
                    </div>
                    <div class="col-md-3 col-md-offset-8">
                        <label>Select Shop</label>
                        <div class="costom-control">
                            <?php if(count($all_shop_res)>0){?>
                                <select id="shop_list" class="form-control" onchange="product_roc()" >
                                    <?php foreach($all_shop_res as $shop_detail){?>
                                     <option <?php if($shop_detail['id'] == $shop){?> selected="selected"<?php }?>  value="<?php echo $shop_detail['id'];?>"> <?php echo $shop_detail['shop_title'];?></option>
                                     <?php }?>
                                 </select>
                                 <?php }?>

                             </div>
                         </div>
                     </div>
                     <!--<a href="<?php echo base_url();?>manage_assign_shop/assign_quantity" class="btn btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-sign-in"></i> Quantity Assign</a>-->
                     <!--<button class="btn btn-success btn-sm bounceIn animation-delay5 " id="submit" type="submit" name="submit" value="submit" ><i class="fa fa-sign-in"></i> Add</button>-->
                        <!--<span class="badge badge-info pull-right">	
                            <a href="#" style="color:#fff;">View All</a>
                        </span>-->
                    </div>
                </div>
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

                        <div class="costom-table-agline">
                            <div class="clearfix"></div>
                            <div class="table-responsive">
                                <table id="table_data" class="table table-striped">
                                    <thead class="costom-thead-bg">
                                        <tr>
                                            <th width="2%">#</th>
                                            <th width="36%">Product Name</th>
                                            <th width="2%">Quantity</th>
                                            <th width="2%">Reorder</th>
                                            <th width="10%"><span style="margin-left: 16px;">New Quantity</span></th>
                                            <th width="14%"><span style="margin-left: 54px;">Select Option</span></th>
                                            <th width="9%"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="res_responce">
                                        <?php if(isset($all_assign_record) && (count($all_assign_record) > 0)){$count = 1;
                                           foreach($all_assign_record as $res){	
                                             ?>
                                             <tr>
                                                <td><?php echo $count;?></td>
                                                <td><?php echo ucfirst($res['product_name']); ?></td>
                                                <!--<td><?php //echo ucfirst($res['shop_title']); ?></td>-->
                                                <td><?php echo $res['quantity']; ?></td>
                                                <td><?php echo $res['reorder_level']; ?></td>
                                                <!--<td><?php echo date('M d Y',strtotime($res['modify_date'])); ?></td>-->
                                <!--<td>
                                <div class="btn-group">
                                    <button class="btn btn-success">Action</button>
                                    <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu slidedown">
                                      <li><a href="<?php echo base_url();?>manage_assign_shop/edit_assign_quantity/<?php echo $res['id']; ?>">Edit</a></li>

                                  </ul>
                              </div>
                          </td>-->

                          <td><form action="#" enctype="multipart/form-data" method="post" id="frm_add" >

                            <input type="number" placeholder="Product Quantity" required="required" id="new_quantity" value="" name="new_quantity" class="form-control">
                            <input type="hidden" readonly="readonly" placeholder="Product Quantity" required id="quantity" value="<?php echo $res['quantity']?>" name="quantity" class="form-control">
                            
                        </td>
                        <td>
                           <select name="action_type" class="form-control">
                               <option value="add">Add Quantity</option>
                               <option value="adjust">Adjust Quantity</option>
                               <option value="return">Return Quantity</option>
                           </select>
                       </td>
                       <td>
                        <input type="hidden" name="id" value="<?php echo $res['id']; ?>" class="form-control">
                        <input type="submit" id="save" value="Update" class="btn btn-success btn-sm  bounceIn animation-delay5 pull-right submit" />
                    </form>
                </td>
            </tr>
            <?php $count++;}
        }else{?>
            <tr>
                <td colspan="4">No record Found</td>
            </tr>
            <?php }?>

        </tbody>
    </table>
</div>
</div>
<div >
</div>
</div><!-- /panel -->

</div><!-- /.col -->
<!-- /.col -->
</div><!-- /.row -->
</div><!-- /.padding-md -->
</div>

<script>
    $(document).ready(function(){
  // we call the function
  product_roc();
});
    function del_rec(){
      if (confirm('Are you sure you want to Delete?')) {
         return true;
     } else {
         return false;
			// Do nothing!
		}
	}
	
	function product_roc(){
		var p_id = $('#shop_list').val();
		// alert(p_id);
		$.ajax({
            type: "POST",

            url: "<?php echo SURL; ?>manage_assign_shop/assign_shop_process/",

            data: {p_id: p_id},

            success: function(result){

              $("#res_responce").html(result);

          }

      });
		
	}
	
	function load_new(varient){
		var p_id = $('#shop_list').val();
		var varient = Number(varient)+10;
		//alert(p_id);
		$.ajax({

            type: "POST",

            url: "<?php echo SURL; ?>manage_assign_shop/assign_shop_process_2/",

            data: {p_id: p_id,varient:varient},

            success: function(result){

              $("#res_responce").html(result);

          }

      });
		
	}
	
	function serch_res(){
		//alert('test');
		var serch_data = $('#serch_assign_shop').val();
		var p_id = $('#shop_list').val();
		//alert(serch_data);
		//$("#pag_dis").hide();
		
		$.ajax({
			type: "post",
			url: "<?php echo SURL;?>manage_assign_shop/search_assign_shop",
			cache: false,	
			data: {p_id: p_id,serch_data: serch_data},
			
			success: function(response){
             $('#res_responce').html(response);
         }
     });
	}
</script>
</div><!-- /wrapper -->

<?php echo $footer;?>