<?php
class mod_expanse extends CI_Model {
	
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
	public function get_sale_complete_report($data){
		extract($data);
		$start_date = date("Y-m-d", strtotime($s_date));
		$end_date = date("Y-m-d", strtotime($e_date));//exit;s_date
		
		$this->db->dbprefix('sale');
		$this->db->select('sum(total) as total_sale');
			$where = "DATE(created_date) BETWEEN '$start_date' AND '$end_date'";
		$this->db->where($where);
		
		$get_all_sale = $this->db->get('sale');
		
		//echo '<pre>';print_r($get_all_sale->result_array());exit;
		return $get_all_sale->row_array();
		
	}
	
	public function get_expense_complete_report($data){
		extract($data);
		$start_date = date("Y-m-d", strtotime($s_date));
		$end_date = date("Y-m-d", strtotime($e_date));//exit;s_date
		
		$this->db->dbprefix('expense_detail');
		$this->db->select('sum(expense_amount) as total_expense');
			$where = "DATE(expense_date) BETWEEN '$start_date' AND '$end_date'";
		$this->db->where($where);
		
		$get_all_expense = $this->db->get('expense_detail');
		
		//echo '<pre>';print_r($get_all_expense->row_array());exit;
		return $get_all_expense->row_array();
		
	}
	
	public function get_type(){
		
		$this->db->dbprefix('expense_type');
		$this->db->select('*');
	  	$this->db->where('del_status','0');
		//$this->db->where('status','1');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('expense_type');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_type_enabled(){
		
		$this->db->dbprefix('expense_type');
		$this->db->select('*');
	  	$this->db->where('del_status','0');
		$this->db->where('status','1');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('expense_type');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_detail(){
		
		$this->db->dbprefix('expense_detail');
		$this->db->select('*');
	  	$this->db->where('del_status','0');
		//$this->db->where('status','1');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('expense_detail');
		
		
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
	
	public function del_expanse_record($id){
		//echo 'in model'.$id;exit;
		$update_data = array(
			'del_status' => 1,
		);
		$this->db->dbprefix('expense_type');
		$this->db->where('id',$id);
		$ins_into_db = $this->db->update('expense_type', $update_data);
		
		if($ins_into_db){
			return true;
		}else{
			return false;
		}
	}
	
	public function del_expanse_detail_record($id){
		//echo 'in model'.$id;exit;
		$update_data = array(
			'del_status' => 1,
		);
		$this->db->dbprefix('expense_detail');
		$this->db->where('id',$id);
		$ins_into_db = $this->db->update('expense_detail', $update_data);
		
		if($ins_into_db){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_expense_detail($id){
		
				
		$this->db->dbprefix('expense_type');
		$this->db->select('*');
	  	$this->db->where('id',$id);
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('expense_type');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_expense_specific_detail($id){
		
				
		$this->db->dbprefix('expense_detail');
		$this->db->select('*');
	  	$this->db->where('id',$id);
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('expense_detail');
		
		
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

	public function add_expanse_type($data){
		
		extract($data);
		//echo 'adada<pre>';print_r($data);exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');

		$ins_data = array(
		   'expense_title' => $this->db->escape_str(trim($expense_title)),
		   'expense_note' => $this->db->escape_str(trim($expense_note)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'created_by' => $this->db->escape_str(trim($created_by)),
		   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'modified_by' => $this->db->escape_str(trim($created_by)),
		   'modified_date' => $this->db->escape_str(trim($created_date)),
		   'modified_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'status' => 1,
		);
		//echo '<pre>';print_r($ins_data);exit;
      
		//Insert the record into the database.
		$this->db->dbprefix('expense_type');
		$ins_into_db = $this->db->insert('expense_type', $ins_data);
	
		if($ins_into_db) return true;

	}//end add_shop()
	
	public function add_expanse_detail($data){
		
		extract($data);
		//echo 'adada<pre>';print_r($data);exit;
		
		$expense_date = date('Y-m-d',strtotime($expense_date));
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');

		$ins_data = array(
		   'type_id' => $this->db->escape_str(trim($type_id)),
		   'expense_date' => $this->db->escape_str(trim($expense_date)),
		   'expense_amount' => $this->db->escape_str(trim($expense_amount)),
		   'expense_comment' => $this->db->escape_str(trim($expense_comment)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'created_by' => $this->db->escape_str(trim($created_by)),
		   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'modified_date' => $this->db->escape_str(trim($created_date)),
		   'modified_by' => $this->db->escape_str(trim($created_by)),
		   'modified_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'status' => 1,
		);
		//echo '<pre>';print_r($ins_data);exit;
      
		//Insert the record into the database.
		$this->db->dbprefix('expense_detail');
		$ins_into_db = $this->db->insert('expense_detail', $ins_data);
	
		if($ins_into_db) return true;

	}//end add_shop()
	
	public function update_expense_record($data){
		
		extract($data);
		//echo 'adada<pre>';print_r($data);exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		
			$update_data = array(
			   'expense_title' => $this->db->escape_str(trim($expense_title)),
		   	   'expense_note' => $this->db->escape_str(trim($expense_note)),
			   'status' => $this->db->escape_str(trim($status)),
			   'modified_by' => $this->db->escape_str(trim($created_by)),
			   'modified_by_ip' => $this->db->escape_str(trim($ip_address)),
			   'modified_date' => $this->db->escape_str(trim($created_date)),
			);
		//echo '<pre>';print_r($ins_data);exit;
      
		//Insert the record into the database.
		$this->db->dbprefix('expense_type');
		$this->db->where('id',$id);
		$ins_into_db = $this->db->update('expense_type', $update_data);
	
		$this->db->last_query();

		if($ins_into_db) return true;

	}//end add_shop()
	
	public function update_expense_detail_record($data){
		
		extract($data);
		//echo 'adada<pre>';print_r($data);exit;
		$expense_date = date('Y-m-d',strtotime($expense_date));
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		
			$update_data = array(
			   'type_id' => $this->db->escape_str(trim($type_id)),
		   	   'expense_comment' => $this->db->escape_str(trim($expense_comment)),
			   'expense_date' => $this->db->escape_str(trim($expense_date)),
			   'expense_amount' => $this->db->escape_str(trim($expense_amount)),
			   'status' => $this->db->escape_str(trim($status)),
			   'modified_date' => $this->db->escape_str(trim($created_date)),
			   'modified_by' => $this->db->escape_str(trim($created_by)),
			   'modified_by_ip' => $this->db->escape_str(trim($ip_address)),
			);
		//echo '<pre>';print_r($ins_data);exit;
      
		//Insert the record into the database.
		$this->db->dbprefix('expense_detail');
		$this->db->where('id',$id);
		$ins_into_db = $this->db->update('expense_detail', $update_data);
	
		$this->db->last_query();

		if($ins_into_db) return true;

	}//end add_shop()
	
}
?>