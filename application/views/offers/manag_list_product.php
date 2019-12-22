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
	.panel.panel-default .panel-heading{ padding-bottom:62px;}
	</style>
<!-- Overlay Div -->

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
    
    <div class="padding-md">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div id="placeholder"  style="height:1px; visibility:hidden;"></div>
          </div>
          <!-- /panel -->
          
          <div class="panel panel-default">
            <div class="panel-heading"> <strong>
              <h3>Product Management</h3>
              </strong>
              <hr>
              <div class="col-md-3">
              <input type="text" class="form-control" name="serch_product_list" onkeyup="serch_res()" id="serch_product_list" placeholder="Search"/>
              </div>
              <!--<a href="<?php echo base_url();?>manage_product/add_product" class="btn btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-sign-in"></i> Add Product</a>--> 
              <!--<button class="btn btn-success btn-sm bounceIn animation-delay5 " id="submit" type="submit" name="submit" value="submit" ><i class="fa fa-sign-in"></i> Add</button>--> 
              <!--<span class="badge badge-info pull-right">	
                            <a href="#" style="color:#fff;">View All</a>
                        </span>--> 
            </div>
            <div class="col-md-12">
              <?php
                            if($this->session->flashdata('err_message')){
                        ?>
              <div class="alert alert-danger">
                <center>
                <?php echo $this->session->flashdata('err_message'); ?>
                <center>
              </div>
              <?php
                            }//end if($this->session->flashdata('err_message'))
                            
                            if($this->session->flashdata('ok_message')){
                        ?>
              <div class="alert alert-success alert-dismissable">
                <center>
                <?php echo $this->session->flashdata('ok_message'); ?>
                <center>
              </div>
              <?php 
                            }
                        ?>
            </div>
            <div class="costom-table-agline">
              <div class="clearfix"></div>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead class="costom-thead-bg">
                    <tr>
                      <th width="2%">#</th>
                      <th width="13%">Product Title</th>
                      <th width="13%">Quantity</th>
                      <th width="12%">Reorder Level</th>
                      <th width="12%">Status</th>
                      <th width="18%">New Quantity</th>
                      <th width="18%" >Select Option</th>
                      <th class="no-sort" width="12%">Action</th>
                    </tr>
                  </thead>
                  <tbody id="responce_res">
                    <?php if(isset($all_product) && (count($all_product) > 0)){$count = 1;
									foreach($all_product as $res){	
					?>
                    <tr>
                      <td><?php echo $count;?></td>
                      <td><?php echo ucfirst($res['product_name']); ?></td>
                      <td><?php echo $res['quantity']; ?></td>
                      <td><?php echo $res['reorder_level']; ?></td>
                      <td><?php if($res['status']==1){?>
                        <span class="label label-success">Active</span>
                        <?php }else{?>
                        <span class="label label-danger">Inactive</span>
                        <?php }?></td>
                      <!--<td><?php //echo date('M d Y',strtotime($res['created_date'])); ?></td>--?
                      <!--<td>
                                <div class="btn-group">
                                    <button class="btn btn-success">Action</button>
                                    <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu slidedown">
                                        <li><a href="<?php echo base_url();?>manage_product/edit_product/<?php echo $res['id'];?>">Edit</a></li>
                                        <li><a onclick="return del_rec();" href="<?php echo base_url();?>manage_product/delete_product/<?php echo $res['id']; ?>">Delete</a></li>
                                        
                                    </ul>
                                </div>
                                </td>-->

<form action="<?php echo SURL?>manage_product/edit_listing_product_process" enctype="multipart/form-data" method="post" id="frm_add" >
                      <td>
                          
                            <input type="number" placeholder="Product Quantity" required="required" id="new_quantity" value="" name="new_quantity" class="form-control">
                            <input type="hidden" readonly="readonly" placeholder="Product Quantity" required id="quantity" value="<?php echo $res['quantity']?>" name="quantity" class="form-control">
                            </td>
                            <td>
                            	<select name="action_type" class="form-control">
                                	<option value="add">Add Quantity</option>
                                    <option value="adjust">Adjust Quantity</option>
                                </select>
                            </td>
                            <td>
                            
                            
                            <input type="hidden" name="id" value="<?php echo $res['id']; ?>" class="form-control">
                            <input type="submit" id="save" value="Update" class="btn btn-success btn-sm  bounceIn animation-delay5 submit" />
                          
                        </td>
                        </form>
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
          </div>
          <!-- /panel --> 
          
        </div>
        <!-- /.col --> 
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.padding-md --> 
  </div>
  <script>
	function del_rec(){
		if (confirm('Are you sure you want to Delete?')) {
			return true;
		} else {
			return false;
			// Do nothing!
		}
	}
	function serch_res(){
		var serch_data = $('#serch_product_list').val();
		//alert(serch_data);
		$("#pag_dis").hide();
		
		$.ajax({
			type: "post",
			url: "<?php echo SURL;?>manage_product/search_product_res",
			cache: false,	
			data: {serch_data: serch_data},
			
			success: function(response){
			$('#responce_res').html(response);
			}
		});
	}
</script> 
</div>
<!-- /wrapper --> 

<?php echo $footer;?>