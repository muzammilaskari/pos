<?php if(isset($res_serch_prd_all_product) && (count($res_serch_prd_all_product) > 0)){$count = 1;
									foreach($res_serch_prd_all_product as $res){	
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

<form onsubmit="alert('test')" action="<?php echo SURL?>manage_product/edit_listing_product_process" enctype="multipart/form-data" method="post" id="frm_add" >
                      <td>
                          
                            <input type="number" placeholder="Product Quantity" required="required" id="new_quantity_<?php echo $res['id'];?>" value="" name="new_quantity" class="form-control">
                            <input type="hidden" readonly="readonly" placeholder="Product Quantity" required id="quantity_<?php echo $res['id']?>" value="<?php echo $res['quantity']?>" name="quantity" class="form-control">
                            </td>
                            <td>
                            	<select id="action_type_<?php echo $res['id']; ?>" name="action_type" class="form-control">
                                	<option value="add">Add Quantity</option>
                                    <option value="adjust">Adjust Quantity</option>
                                </select>
                            </td>
                            <td>
                            
                            
                            <input type="hidden" name="id" id="id_<?php echo $res['id']; ?>" value="<?php echo $res['id']; ?>" class="form-control">
                            <input type="submit" onclick="subimt_vla(<?php echo $res['id'];?>)" id="save" value="Update" class="btn btn-success btn-sm  bounceIn animation-delay5 submit" />
                        </td>
                        </form>
                    </tr>
                    
                    <?php $count++;}
							}else{?>
                    <tr>
                      <td colspan="8">No record Found</td>
                    </tr>
                    <?php }?>
					<script>
                    function subimt_vla(id){
						
						var new_quantity = $("#new_quantity_"+id).val();
						var quantity = $("#quantity_"+id).val();
						var id = $("#id_"+id).val();
						var action_type = $("#action_type_"+id).val();
						//alert(id);
						$.ajax({
							type: "post",
							url: "<?php echo SURL;?>manage_product/edit_listing_product_process_serch",
							cache: false,	
							data: {new_quantity:new_quantity, quantity: quantity, id: id, action_type: action_type},
							
							success: function(response){
							//$('#test_responce').html(response);
							window.location.href= '<?php echo base_url().'manage_product/list_product'?>';
							}
						});
                    }
					</script>