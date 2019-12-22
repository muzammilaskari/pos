<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Product</title>
</head>

<body>
    
    <div style="text-align:center"><h2>Add Product</h2><a href="<?php echo base_url();?>manage_product">Manage product</a></div>
    
    <div class="col-md-12">
             <?php
                    if($this->session->flashdata('err_message')){
                ?>
                        <div class="alert alert-danger"><center><?php echo $this->session->flashdata('err_message'); ?><center></div>
                <?php
                    }//end if($this->session->flashdata('err_message'))
                ?>
            </div>
    
    <div style="text-align:center">
        <form action="<?php echo SURL?>manage_product/add_product_process" enctype="multipart/form-data" method="post" id="frm_add" >
        	<table width="400" border="0">
                <tr>
                    <td><label>Product Name</label></td>
                    <td><input type="text" placeholder="Product Name" required id="product_name" name="product_name" class="form-control"></td>
                </tr>
                <tr>
                    <td><label>Quantity</label></td>
                    <td><input type="text" placeholder="Product Quentity" required id="quantity" name="quantity" class="form-control"></td>
                </tr>
                <tr>
                    <td><label>Price</label></td>
                    <td><input type="text" placeholder="Price" required id="price" name="price" class="form-control"></td>
                </tr>
                <tr>
                    <td><label>Reorder Level</label></td>
                    <td><input type="text" placeholder="Reorder Level" required id="reorder_level" name="reorder_level" class="form-control"></td>
                </tr>
                
                <tr>
                    <td><div id="pass_res"></div>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" id="save" value="Save" class="btn btn-default pull-left custom-marg" />
                    <a href="#" class="btn btn-danger pull-left custom-marg">Cancel</a></td>
                </tr>
            </table>
            
            
        </form>
    </div>
    
</body>
</html>
