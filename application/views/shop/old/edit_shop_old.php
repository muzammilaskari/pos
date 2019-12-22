<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Shop</title>
</head>

<body>
    
    <div style="text-align:center"><h2>Edit Shop</h2><a href="<?php echo base_url();?>manage_shop">Manage Shop</a></div>
    
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
        <form action="<?php echo SURL?>manage_shop/edit_shop_process" enctype="multipart/form-data" method="post" id="frm_add" >
        	<table width="400" border="0">
                <tr>
                    <td><label>Shop Name</label></td>
                    <td><input type="text" placeholder="Shop Name" required value="<?php echo $shop_detail[0]['shop_title']?>" id="shop_title" name="shop_title" class="form-control"></td>
                </tr>
                <tr>
                    <td><label>Detail</label></td>
                    <td><textarea rows="5" cols="23" name="shop_detail"><?php echo $shop_detail[0]['shop_detail']?></textarea></td>
                </tr>
                
                <tr>
                    <td>&nbsp;<input type="hidden" value="<?php echo $shop_detail[0]['id']?>"  name="id" class="form-control"></td>
                    <td><input type="submit" id="save" value="Update" class="btn btn-default pull-left custom-marg" />
                    <a href="#" class="btn btn-danger pull-left custom-marg">Cancel</a></td>
                </tr>
            </table>
            
            
        </form>
    </div>
    
</body>
</html>
