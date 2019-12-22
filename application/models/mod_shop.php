<?php
class mod_shop extends CI_Model {
	
	function __construct(){
		
        parent::__construct();

    }
	
	public function num_rows($table_name){
		$this->db->dbprefix($table_name);
		$this->db->select('id');
		$this->db->where('del_status','0');
		
		
		$query = $this->db->get($table_name);
		
		return $query->num_rows();
		
	}
	
	public function get_shop($table_name,$limit,$id){
		
		
		
		$this->db->dbprefix($table_name);
		$this->db->select('*');
	  	$this->db->where('del_status','0');
		$this->db->order_by("id", "DESC");
		$this->db->limit($limit,$id);
		
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get($table_name);
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_shop_res_ajax($data){
		//echo '<pre>';print_r($data);exit;
		extract($data);
		
		$this->db->dbprefix('shops');
		$this->db->select('*');
	  	$this->db->where('del_status','0');
		$this->db->like('shop_title', $serch_data);
		$this->db->order_by("id", "DESC");
		
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('shops');
		
		//echo '<pre>';print_r($get_all_users->result_array());exit;
		
		return $get_all_users->result_array();
		
	}
	
	public function del_shop_record($id){
		//echo 'in model'.$id;exit;
		$update_data = array(
			'del_status' => 1,
		);
		$this->db->dbprefix('shops');
		$this->db->where('id',$id);
		$ins_into_db = $this->db->update('shops', $update_data);
		
		if($ins_into_db){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_shop_detail($id){
		
				
		$this->db->dbprefix('shops');
		$this->db->select('*');
	  	$this->db->where('id',$id);
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('shops');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function shop_check($txtusername){
		$this->db->dbprefix('shops');
		$this->db->where('user_name',$txtusername);	
		$get_user = $this->db->get('shops');
		if(count($get_user->row_array()) > 0)
		{
			$res_return = true;
		}else{
			$res_return = false;
		}
		return $res_return;
	}

	public function add_shop($data){
		
		extract($data);
		//echo 'adada<pre>';print_r($data);exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');



		$ins_data = array(
		   'shop_title' => $this->db->escape_str(trim($shop_title)),
		   'shop_detail' => $this->db->escape_str(trim($shop_detail)),
		   'created_by' => $this->db->escape_str(trim($created_by)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'modified_by' => $this->db->escape_str(trim($created_by)),
		   'modified_date' => $this->db->escape_str(trim($created_date)),
		   'modified_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'start_time' => $this->db->escape_str(trim($start_time)),
		   'close_time' => $this->db->escape_str(trim($close_time)),
		   'status' => 1,

		);
		//echo '<pre>';print_r($ins_data);exit;
      
		//Insert the record into the database.
		$this->db->dbprefix('shops');
		$ins_into_db = $this->db->insert('shops', $ins_data);
	
		$this->db->last_query();
		
		$shop_id = $this->db->insert_id();
		
		/*=================================Getting All Product=====================*/
			$this->db->dbprefix('product');
			$this->db->select('id');
			$this->db->where('status',1);
			$this->db->where('del_status',0);
			//$this->db->limit($limit,$id);
			
			$get_all_product = $this->db->get('product');
			$res_all_product = $get_all_product->result_array();
			
			foreach($res_all_product as $p_res_id){
				
			$ins_data_array = array(
			   'product_id' => $this->db->escape_str(trim($p_res_id['id'])),
			   'shop_id' => $this->db->escape_str(trim($shop_id)),
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
	
	public function update_shop_record($data){
		
		extract($data);
		//echo 'adada<pre>';print_r($data);exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		
			$update_data = array(
			   'shop_title' => $this->db->escape_str(trim($shop_title)),
			   'shop_detail' => $this->db->escape_str(trim($shop_detail)),
			   'status' => $this->db->escape_str(trim($status)),
			   'modified_by' => $this->db->escape_str(trim($created_by)),
			   'modified_by_ip' => $this->db->escape_str(trim($ip_address)),
			   'modified_date' => $this->db->escape_str(trim($created_date)),
			   'start_time' => $this->db->escape_str(trim($start_time)),
		  	 'close_time' => $this->db->escape_str(trim($close_time)),
			);
		//echo '<pre>';print_r($ins_data);exit;
      
		//Insert the record into the database.
		$this->db->dbprefix('shops');
		$this->db->where('id',$id);
		$ins_into_db = $this->db->update('shops', $update_data);
	
		$this->db->last_query();

		if($ins_into_db) return true;

	}//end add_shop()
	
}
?>