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
	.table-responsive {
    overflow-x: auto;
    /* min-height: 0.01%; */
    height: 251px;
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
                        <strong>Expense Type Management</strong>
						<hr>
                        <div class="col-md-1">
           <a href="<?php echo base_url();?>manage_expense/add_expanse_type" class="btn btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-sign-in"></i> Add Expense Type</a>
           </div>
           <div class="col-md-3">
                        <!--<input type="text" class="form-control" name="serch_shop" onkeyup="serch_res()" id="serch_shop" placeholder="Search"/>-->
                        </div>
        <!--<button class="btn btn-success btn-sm bounceIn animation-delay5 " id="submit" type="submit" name="submit" value="submit" ><i class="fa fa-sign-in"></i> Add</button>-->
                        <!--<span class="badge badge-info pull-right">	
                            <a href="#" style="color:#fff;">View All</a>
                        </span>-->
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
                    
                    
                    
                    <table class="table table-striped">
                        <thead class="costom-thead-bg">
                            <tr>
                                <th>#</th>
                                <th>Expense Type</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody id="responce_res">
                            <?php if(isset($all_type) && (count($all_type) > 0)){$count = 1;
									foreach($all_type as $res){	
							?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo ucfirst($res['expense_title']); ?></td>
                                <td>
                                	<?php if($res['status']==1){?>
                                    <span class="label label-success">Active</span>
                                    <?php }else{?>
                                    <span class="label label-danger">Inactive</span>
									<?php }?>
                                </td>
                                <td><?php echo date('M d Y',strtotime($res['created_date'])); ?></td>
                                <td>
                                <div class="btn-group">
                                    <button class="btn btn-success">Action</button>
                                    <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu slidedown">
                                        <li><a href="<?php echo base_url();?>manage_expense/edit_expanse_type/<?php echo $res['id']; ?>">Edit</a></li>
                                        <li><a onclick="return del_rec();" href="<?php echo base_url();?>manage_expense/delete_expanse/<?php echo $res['id']; ?>">Delete</a></li>
                                        
                                    </ul>
                                </div>
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
                    <!--<div id="pag_dis"><?php  //echo $this->pagination->create_links();?></div> -->
                    </div>
                    </div>
                </div><!-- /panel -->
                 
            </div><!-- /.col -->
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.padding-md -->
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
		var serch_data = $('#serch_shop').val();
		//alert(serch_data);
		$("#pag_dis").hide();
		
		$.ajax({
			type: "post",
			url: "<?php echo SURL;?>manage_shop/search_shop",
			cache: false,	
			data: {serch_data: serch_data},
			
			success: function(response){
			$('#responce_res').html(response);
			}
		});
	}
</script>
	
	</div><!-- /wrapper -->

<?php echo $footer;?>