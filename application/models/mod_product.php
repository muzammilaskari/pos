<?php
class mod_product extends CI_Model {
	
	function __construct(){
		
        parent::__construct();

    }
	
	public function num_rows($table_name){
		$this->db->dbprefix($table_name);
		$this->db->select('id');
			$this->db->where('del_status','0');
		$this->db->where('product_type','0');
		
		
		$query = $this->db->get($table_name);
		
		return $query->num_rows();
		
	}
	
	public function get_product($table_name,$limit,$id){
		
				
			$this->db->dbprefix($table_name);
		$this->db->select('*');
	  	$this->db->where('del_status','0');
		$this->db->where('product_type','0');
		$this->db->order_by("id", "DESC");
		$this->db->limit($limit,$id);
		
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get($table_name);
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_product_ajax($data){
		extract($data);
				
		$this->db->dbprefix('product');
		$this->db->select('*');
	  	$this->db->where('del_status','0');
		$this->db->like('product_name', $serch_data);
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('product');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_all_res_product(){
		
				
			$this->db->dbprefix('product');
		$this->db->select('*');
	  	$this->db->where('del_status','0');
		$this->db->where('product_type','0');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('product');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_all_res_product_res_serch($data){
		extract($data);
				
		$this->db->dbprefix('product');
		$this->db->select('*');
	  	$this->db->where('del_status','0');
		$this->db->like('product_name', $serch_data);
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('product');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function del_product_record($id){
		//echo 'in model'.$id;exit;
		$update_data = array(
			'del_status' => 1,
		);
		$this->db->dbprefix('product');
		$this->db->where('id',$id);
		$ins_into_db = $this->db->update('product', $update_data);
		
		if($ins_into_db){
			return true;
		}else{
			return false;
		}
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

	public function add_product($data){
		
		extract($data);
		//echo 'adada<pre>';print_r($data);exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		$rand = "PR".rand(5000,10000);


		$ins_data = array(
		   'product_name' => $this->db->escape_str(trim($product_name)),
		   'product_code' => $this->db->escape_str(trim($rand)),
		   'quantity' => $this->db->escape_str(trim($quantity)),
		   'price' => $this->db->escape_str(trim($price)),
		   'barcode' => $this->db->escape_str(trim($barcode)),	   
		   'reorder_level' => $this->db->escape_str(trim($reorder_level)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'created_by' => $this->db->escape_str(trim($created_by)),
		   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'modify_date' => $this->db->escape_str(trim($created_date)),
		   'status' => 1,
		   'modify_by' => $this->db->escape_str(trim($created_by)),
		   'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
		);
		//echo '<pre>';print_r($ins_data);exit;
      
		//Insert the record into the database.
		$this->db->dbprefix('product');
		$ins_into_db = $this->db->insert('product', $ins_data);
	
		$this->db->last_query();
		//-------------- Log Table Data Inserted---------------
		$product_id = $this->db->insert_id();
		
		$ins_data = array(
		   'product_id' => $this->db->escape_str(trim($product_id)),
		   'quantity' => $this->db->escape_str(trim($quantity)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'created_by' => $this->db->escape_str(trim($created_by)),	   
		   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'created_by_title' => 'product added',
		);
		
		$this->db->dbprefix('log');
		$ins_into_db = $this->db->insert('log', $ins_data);
		//-------------- End Log Table Data Inserted--------------
		/*=================================Getting All Shop=====================*/
			$this->db->dbprefix('shops');
			$this->db->select('id');
			$this->db->where('status',1);
			$this->db->where('del_status',0);
			//$this->db->limit($limit,$id);
			
			$get_all_shop = $this->db->get('shops');
			$res_all_shop = $get_all_shop->result_array();
			
			foreach($res_all_shop as $s_res_id){
				
			$ins_data_array = array(
			   'product_id' => $this->db->escape_str(trim($product_id)),
			   'shop_id' => $this->db->escape_str(trim($s_res_id['id'])),
			   'quantity' => 0,
			   'created_date' => $this->db->escape_str(trim($created_date)),
			   'created_by' => $this->db->escape_str(trim($created_by)),
			   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
			   'modify_date' => $this->db->escape_str(trim($created_date)),
			   'modify_by' => $this->db->escape_str(trim($created_by)),
			   'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
			);
			$this->db->dbprefix('product_assig');
			$ins_into_db = $this->db->insert('product_assig', $ins_data_array);
			//echo '<pre>';print_r($ins_data_array);
			}
			//echo '<pre>';print_r($res_all_product);exit;
		
		/*=================================End Getting All Product ================*/
		
		if($ins_into_db) return true;

	}//end add_shop()
	
	public function update_product_record($data){
		
		extract($data);
		//echo 'adada<pre>';print_r($data);exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		if($new_quantity>0){
			$new_quentity = $quantity + $new_quantity;
			$update_data = array(
			   'product_name' => $this->db->escape_str(trim($product_name)),
			   'quantity' => $this->db->escape_str(trim($new_quentity)),
			   'price' => $this->db->escape_str(trim($price)),
			   'reorder_level' => $this->db->escape_str(trim($reorder_level)),
			   'status' => $this->db->escape_str(trim($status)),
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
			   'status' => $this->db->escape_str(trim($status)),
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
	
	public function update_listing_product_record($data){
		
		extract($data);
		//echo 'adada<pre>';print_r($data);exit;
		if($action_type == 'adjust'){
			if($quantity < $new_quantity){
				return false;
			}
			$res_quantity = $quantity - $new_quantity;
			//echo 'adjust';
			$title_detail = 'product adjust';
		}else{
			$res_quantity = $quantity + $new_quantity;
			//echo 'add';
			$title_detail = 'product added';
		}
		//exit;
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		if($new_quantity>0){
			//$new_quentity = $quantity + $new_quantity;
			$update_data = array(
			   'quantity' => $this->db->escape_str(trim($res_quantity)),
			   'modify_date' => $this->db->escape_str(trim($created_date)),
			   'modify_by' => $this->db->escape_str(trim($created_by)),
			   'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
			);
			
			$ins_data = array(
		   'product_id' => $this->db->escape_str(trim($id)),
		   'quantity' => $this->db->escape_str(trim($new_quantity)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'created_by' => $this->db->escape_str(trim($created_by)),	   
		   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'created_by_title' => $this->db->escape_str(trim($title_detail)),
			);
		
			$this->db->dbprefix('log');
			$ins_into_db = $this->db->insert('log', $ins_data);
			
		}else{
			$new_quentity = $quantity + $new_quantity;
			$update_data = array(
			   'quantity' => $this->db->escape_str(trim($res_quantity)),
			   'modify_date' => $this->db->escape_str(trim($created_date)),
			   'modify_by' => $this->db->escape_str(trim($created_by)),
			   'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
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