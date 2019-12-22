<?php
class mod_assign_shop extends CI_Model {
	
	function __construct(){
		
        parent::__construct();

    }
	
	public function get_all_shop(){
		
				
		$this->db->dbprefix('shops');
		$this->db->select('*');
	  	$this->db->where('status','1');
		$this->db->where('del_status','0');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('shops');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_all_record(){
		$this->db->dbprefix('product_assig');
		$this->db->select('product_assig.*,product.product_name,product.reorder_level,shops.shop_title');
		$this->db->from('product_assig');
		$this->db->join('product', 'product.id = product_assig.product_id');
		$this->db->join('shops', 'shops.id = product_assig.shop_id');
	  	//$this->db->where('status','1');
		//$this->db->where('del_status','0');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		$get_all_users = $this->db->get();
		//$get_all_users = $this->db->get('product_assig');
		//echo $this->db->last_query();exit;
		
		return $get_all_users->result_array();
	}
	
	public function get_all_record_ajax($p_id){
		$this->db->dbprefix('product_assig');
		$this->db->select('product_assig.*,product.product_name,product.reorder_level,shops.shop_title');
		$this->db->from('product_assig');
		$this->db->join('product', 'product.id = product_assig.product_id');
		$this->db->join('shops', 'shops.id = product_assig.shop_id');
	  	$this->db->where('product_assig.shop_id',$p_id);
		//$this->db->where('del_status','0');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		$get_all_users = $this->db->get();
		//$get_all_users = $this->db->get('product_assig');
		//echo $this->db->last_query();exit;
		
		return $get_all_users->result_array();
	}
	
	public function get_sume_record_ajax_call($p_id,$varient){
		$this->db->dbprefix('product_assig');
		$this->db->select('product_assig.*,product.product_name,product.reorder_level,shops.shop_title');
		$this->db->from('product_assig');
		$this->db->join('product', 'product.id = product_assig.product_id');
		$this->db->join('shops', 'shops.id = product_assig.shop_id');
	  	$this->db->where('product_assig.shop_id',$p_id);
		//$this->db->where('del_status','0');
		$this->db->order_by("id", "DESC");
		$this->db->limit(10,$varient);
		$get_all_users = $this->db->get();
		//$get_all_users = $this->db->get('product_assig');
		//echo $this->db->last_query();exit;
		
		return $get_all_users->result_array();
	}
	
	public function get_all_record_ajax_serch($data){
		extract($data);
		
		$this->db->dbprefix('product_assig');
		$this->db->select('product_assig.*,product.product_name,product.reorder_level,shops.shop_title');
		$this->db->from('product_assig');
		$this->db->join('product', 'product.id = product_assig.product_id');
		$this->db->join('shops', 'shops.id = product_assig.shop_id');
	  	$this->db->where('product_assig.shop_id',$p_id);
		$this->db->like('product.product_name', $serch_data);
		//$this->db->where('del_status','0');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		$get_all_users = $this->db->get();
		//$get_all_users = $this->db->get('product_assig');
		//echo $this->db->last_query();exit;
		
		return $get_all_users->result_array();
	}
	
	public function get_all_product(){
		
				
		$this->db->dbprefix('product');
		$this->db->select('*');
	  	$this->db->where('status','1');
		$this->db->where('del_status','0');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('product');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_assign_detail($id){
		
				
		$this->db->dbprefix('product_assig');
		$this->db->select('*');
	  	$this->db->where('id',$id);
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('product_assig');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_product_detail($id){
		
				
		$this->db->dbprefix('product');
		$this->db->select('*');
	  	$this->db->where('id',$id);
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('product');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function shop_check($txtusername){
		$this->db->dbprefix('users');
		$this->db->where('user_name',$txtusername);	
		$get_user = $this->db->get('users');
		if(count($get_user->row_array()) > 0)
		{
			$res_return = true;
		}else{
			$res_return = false;
		}
		return $res_return;
	}

	public function assign_quantity($data){
		
		extract($data);
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		
		
		$this->db->dbprefix('product_assig');
		$this->db->select('*');
	  	$this->db->where('product_id',$product_id);
		$this->db->where('shop_id',$shop_id);
		$get_product_data = $this->db->get('product_assig');
		$result = $get_product_data->result_array();
		if(count($result)>0){
			$current_quantity = $result[0]['quantity'];
			$assign_record_id = $result[0]['id'];
			$res_new_quantity = $current_quantity + $quantity;
			
			$update_data_quantity = array(
			   'quantity' => $this->db->escape_str(trim($res_new_quantity)),
			   'modify_date' => $this->db->escape_str(trim($created_date)),
			   'modify_by' => $this->db->escape_str(trim($created_by)),
			   'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
			);
			
			$this->db->dbprefix('product_assig');
			$this->db->where('id',$assign_record_id);
			$ins_into_db = $this->db->update('product_assig', $update_data_quantity);
		}else{
		
			$ins_data = array(
			   'product_id' => $this->db->escape_str(trim($product_id)),
			   'shop_id' => $this->db->escape_str(trim($shop_id)),
			   'quantity' => $this->db->escape_str(trim($quantity)),
			   'created_date' => $this->db->escape_str(trim($created_date)),	   
			   'created_by' => $this->db->escape_str(trim($created_by)),
			   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
			   'modify_date' => $this->db->escape_str(trim($created_date)),
			   'modify_by' => $this->db->escape_str(trim($created_by)),
			   'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
			);
			//echo '<pre>';print_r($ins_data);exit;
		  
			//Insert the record into the database.
			$this->db->dbprefix('product_assig');
			$ins_into_db = $this->db->insert('product_assig', $ins_data);
		}
		
		//echo '<pre>';print_r($result);
		//echo 'adada<pre>';print_r($data);exit;
		$this->db->last_query();
		//-------------- Log Table Data Inserted---------------
		
		$ins_data = array(
		   'product_id' => $this->db->escape_str(trim($product_id)),
		   'shop_id' => $this->db->escape_str(trim($shop_id)),
		   'quantity' => $this->db->escape_str(trim($quantity)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'created_by' => $this->db->escape_str(trim($created_by)),	   
		   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'created_by_title' => 'product assign',
		);
		
		$this->db->dbprefix('log');
		$ins_into_db = $this->db->insert('log', $ins_data);
		//---------------- End Log Table Data Inserted-------
		
		//---------------- Update Quantity-------------------
		$this->db->dbprefix('product');
		$this->db->select('quantity');
	  	$this->db->where('id',$product_id);
		$get_all_product = $this->db->get('product');
		$result = $get_all_product->result_array();
		//echo '<pre>';print_r($result);exit;
		
		$new_quantity = $result[0]['quantity'] - $quantity;
		$update_data = array(
			   'quantity' => $this->db->escape_str(trim($new_quantity)),
			   'modify_date' => $this->db->escape_str(trim($created_date)),
			   'modify_by' => $this->db->escape_str(trim($created_by)),
			   'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
			);
		$this->db->dbprefix('product');
		$this->db->where('id',$product_id);
		$ins_into_db = $this->db->update('product', $update_data);
		
		//---------------- End Update Quantity---------------

		if($ins_into_db) return true;

	}//end add_shop()
	
	public function get_shop_id($shop_id){
		
		$this->db->dbprefix('product_assig');
		$this->db->select('*');
	  	$this->db->where('id',$shop_id);
		$get_product_data = $this->db->get('product_assig');
		$result = $get_product_data->row_array();
		return $result;
	}
	
	public function update_assign_shop_record($data){
		
		extract($data);
		//echo 'in model<pre>';print_r($data);exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		
		/*============================== Getting Product Assign Data ================*/
		$this->db->dbprefix('product_assig');
		$this->db->select('*');
	  	$this->db->where('id',$id);
		$get_product_data = $this->db->get('product_assig');
		$result = $get_product_data->result_array();
		//echo '<pre>';print_r($result);exit;
		/*============================== End Getting Product Assign Data ================*/
		
		/*============================== Chech Product Quantity ================*/
		$this->db->dbprefix('product');
		$this->db->select('*');
	  	$this->db->where('id',$result[0]['product_id']);
		$get_product_quantity = $this->db->get('product');
		$result_product_quantity = $get_product_quantity->result_array();
		//echo '<pre>';print_r($result_product_quantity);exit;
		if($action_type == 'add'){
			if($result_product_quantity[0]['quantity'] < $new_quantity){
				return false;
			}
		}
		/*============================== End Chech Product Quantity ================*/
		if($action_type == 'add'){
			$res_quantity = $new_quantity + $quantity;
			$res_quantity1 = $result_product_quantity[0]['quantity'] - $new_quantity;
			$prd_title = 'product assign add';
			//echo 'in add';
		}else if($action_type == 'adjust'){
			if($new_quantity > $quantity){
				return false;
			}
			$res_quantity =  $quantity - $new_quantity;
			$prd_title = 'product assign adjust';
			//echo 'in adjust';
		}else{
			$res_quantity1 = $new_quantity + $result_product_quantity[0]['quantity'];
			$res_quantity = $quantity - $new_quantity;
			$prd_title = 'product assign return';
			//echo 'in else';
		}
		/*========================= Update Product Assign Quantity =================*/
		$update_product_quantity = array(
		   'quantity' => $this->db->escape_str(trim($res_quantity)),
		   'modify_date' => $this->db->escape_str(trim($created_date)),
		   'modify_by' => $this->db->escape_str(trim($created_by)),
		   'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
		);
		
		$this->db->dbprefix('product_assig');
		$this->db->where('id',$id);
		$ins_into_db = $this->db->update('product_assig', $update_product_quantity);
		/*========================= End ===========================================*/
		if($action_type == 'return' || $action_type == 'add'){
			/*========================= Update Product Quantity =================*/
			$update_product_quantity1 = array(
			   'quantity' => $this->db->escape_str(trim($res_quantity1)),
			   'modify_date' => $this->db->escape_str(trim($created_date)),
			   'modify_by' => $this->db->escape_str(trim($created_by)),
			   'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
			);
			
			$this->db->dbprefix('product');
			$this->db->where('id',$result_product_quantity[0]['id']);
			$ins_into_db = $this->db->update('product', $update_product_quantity1);
			/*========================= End Product Quantity ========================*/
		}
		/*========================= Inserting Log Data ============================*/
		$ins_log_data = array(
		   'product_id' => $this->db->escape_str(trim($result[0]['product_id'])),
		   'shop_id' => $this->db->escape_str(trim($result[0]['shop_id'])),
		   'quantity' => $this->db->escape_str(trim($new_quantity)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'created_by' => $this->db->escape_str(trim($created_by)),	   
		   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'created_by_title' => $this->db->escape_str(trim($prd_title)),
		);
		
		$this->db->dbprefix('log');
		$ins_into_db = $this->db->insert('log', $ins_log_data);
		/*========================= End Inserting Log Data =========================*/
		if($ins_into_db){
			return true;
		}
		//echo 'in model<pre>';print_r($data);exit;
	}
	
	public function update_product_record($data){
		
		extract($data);
		//echo 'adada<pre>';print_r($data);exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		if($new_quantity>0){
			echo $new_quentity = $quantity + $new_quantity;
			$update_data = array(
			   'product_name' => $this->db->escape_str(trim($product_name)),
			   'quantity' => $this->db->escape_str(trim($new_quentity)),
			   'price' => $this->db->escape_str(trim($price)),
			   'reorder_level' => $this->db->escape_str(trim($reorder_level)),
			);
			
			$ins_data = array(
		   'product_id' => $this->db->escape_str(trim($id)),
		   'quantity' => $this->db->escape_str(trim($new_quantity)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'created_by' => $this->db->escape_str(trim($created_by)),	   
		   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'created_by_title' => 'product added',
			);
		
			$this->db->dbprefix('log');
			$ins_into_db = $this->db->insert('log', $ins_data);
			
		}else{
			$update_data = array(
			   'product_name' => $this->db->escape_str(trim($product_name)),
			   'quantity' => $this->db->escape_str(trim($quantity)),
			   'price' => $this->db->escape_str(trim($price)),
			   'reorder_level' => $this->db->escape_str(trim($reorder_level)),
			);
		}
		//echo '<pre>';print_r($ins_data);exit;
      
		//Insert the record into the database.
		$this->db->dbprefix('product');
		$this->db->where('id',$id);
		$ins_into_db = $this->db->update('product', $update_data);
	
		$this->db->last_query();

		if($ins_into_db) return true;

	}//end add_shop()
	
}
?>