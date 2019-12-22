<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assign Quantity</title>
</head>

<body>
    
    <div style="text-align:center"><h2>Assign Quantity</h2><a href="<?php echo base_url();?>manage_assign_shop">Manage Shop</a></div>
    
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
	</div>
    
    <div style="text-align:center">
        <form action="<?php echo SURL?>manage_assign_shop/assign_quantity_process" enctype="multipart/form-data" method="post" id="frm_add" >
        	<table width="400" border="0">
                <tr>
                    <td><label>Shop Name</label></td>
                    <td><select name="shop_id">
                    		<?php foreach($all_shop as $shop_value){?>
                    		<option value="<?php echo $shop_value['id'];?>"><?php echo $shop_value['shop_title'];?></option>
                            <?php }?>
                    	</select>
                    </td>
                </tr>
                <tr>
                    <td><label>Product Name</label></td>
                    <td><select name="product_id">
                    		<?php foreach($all_product as $shop_value){?>
                    		<option value="<?php echo $shop_value['id'];?>"><?php echo $shop_value['product_name'];?></option>
                            <?php }?>
                    	</select>
                    </td>
                </tr>
                <tr>
                    <td><label>Assign Quantity</label></td>
                    <td><input type="number" name="quantity" id="quantity" required="required" />
                    </td>
                </tr>
                
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" id="save" value="Assign" class="btn btn-default pull-left custom-marg" />
                    <a href="#" class="btn btn-danger pull-left custom-marg">Cancel</a></td>
                </tr>
            </table>
            
            
        </form>
    </div>
    
</body>
</html>
