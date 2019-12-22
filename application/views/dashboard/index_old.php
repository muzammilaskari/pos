<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory Management</title>
</head>

<body>
	<div>
    	<span>Dashboard<?php echo $this->session->userdata('user_name');?></span>
        <a href="<?php echo SURL;?>login/logout_user"><span>Logout</span></a>
        <a href="<?php echo SURL;?>manage_user/add_user"><span>Add user</span></a>
        <a href="<?php echo SURL;?>manage_shop/add_shop"><span>Add shop</span></a>
        <a href="<?php echo SURL;?>manage_product/add_product"><span>Add Product</span></a>
        <a href="<?php echo SURL;?>manage_assign_shop/assign_quantity"><span>Assign Quentity</span></a>
    </div>
</body>
</html>