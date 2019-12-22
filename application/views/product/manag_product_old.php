<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Product</title>
</head>

<body>
    
    <div style="text-align:center">
        <h2>Manage Product</h2>
        <a href="<?php echo base_url();?>manage_product/add_product">Add Product</a>
        <a href="<?php echo base_url();?>dashboard">Dashboard</a>
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
    
    <div style="text-align:center">
        	<table width="400" border="0">
                
                <tr>
                    <td>#</td>
                    <td>Product Title</td>
                    <td>Quantity</td>
                    <td>Reorder Level</td>
                    <td>Status</td>
                    <td>Date</td>
                    <td>Action</td>
                </tr>
                <?php if(isset($all_product) && (count($all_product) > 0)){$count = 1;
						foreach($all_product as $res){	
				?>
                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $res['product_name'] ?></td>
                    <td><?php echo $res['quantity'] ?></td>
                    <td><?php echo $res['reorder_level'] ?></td>
                    <td><?php if($res['status']==0){echo 'Active';}else{echo 'Panding'; }?></td>
                    <td><?php echo date('M d Y',strtotime($res['created_date'])); ?></td>
                    <td><a href="<?php echo base_url();?>manage_product/edit_product/<?php echo $res['id']; ?>">Edit</a></td>
                </tr>
                <?php 
						$count++;}
				}else{?>
                <tr>
                	<td colspan="5">NO record Found</td>
                </tr>
                <?php }?>
                
            </table>
            
            
        </form>
    </div>
    <script src="<?php echo SURL; ?>assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    
    <script>
	$(function () {
        $("#save").click(function () {
            var password = $("#shop_pass").val();
            var confirmPassword = $("#confirm_password").val();
            if (password != confirmPassword) {
				$("#pass_res").text("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
	</script>
</body>
</html>
