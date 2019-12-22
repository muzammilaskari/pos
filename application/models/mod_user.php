<?php
class mod_user extends CI_Model {
	
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
	
	public function get_user($table_name,$limit,$id){
		
				
			$this->db->dbprefix($table_name);
		$this->db->select('*');
	  	$this->db->where('del_status','0');
		$this->db->order_by("id", "DESC");
		$this->db->limit($limit,$id);
		
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get($table_name);
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_user_ajax($data){
		extract($data);
				
		$this->db->dbprefix('users');
		$this->db->select('*');
	  	$this->db->where('del_status','0');
		$this->db->like('first_name', $serch_data);
		$this->db->or_like('user_name', $serch_data);
		$this->db->order_by("id", "DESC");
		
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('users');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_user_detail($id){
		
				
		$this->db->dbprefix('users');
		$this->db->select('*');
	  	$this->db->where('id',$id);
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('users');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function user_check($txtusername){
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

	public function add_user($data){
		
		extract($data);
		//echo 'adada<pre>';print_r($data);exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		$rand = uniqid();

		$password = md5($password);

		$ins_data = array(
		   'first_name' => $this->db->escape_str(trim($first_name)),
		   'last_name' => $this->db->escape_str(trim($last_name)),
		   'user_name' => $this->db->escape_str(trim(nl2br($user_name))),
		   'password' => $this->db->escape_str(trim($password)),	   
		   'created_by' => $this->db->escape_str(trim($created_by)),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'type' => 2,
		   'status' => 1,
		   'modify_date' => $this->db->escape_str(trim($created_date)),
		   'rec_key' => $rand,
		   'salary_per_h' => $this->db->escape_str(trim($salary_per_hour)),
		);
		//echo '<pre>';print_r($ins_data);exit;
      
		//Insert the record into the database.
		$this->db->dbprefix('users');
		$ins_into_db = $this->db->insert('users', $ins_data);
	
		$this->db->last_query();

		if($ins_into_db) return true;

	}//end add_shop()
	
	public function del_user_record($id){
		//echo 'in model'.$id;exit;
		$update_data = array(
			'del_status' => 1,
		);
		$this->db->dbprefix('users');
		$this->db->where('id',$id);
		$ins_into_db = $this->db->update('users', $update_data);
		
		if($ins_into_db){
			return true;
		}else{
			return false;
		}
	}
	
	public function update_user_pass($data){
		//echo "asdS";exit;
		$id = $this->session->userdata('user_id');
		//print_r($data);exit;
		extract($data);
		$old_password = md5($old_password);
		
		$new_password = md5($new_password);

		$this->db->dbprefix('users');
		$this->db->where('password',$old_password);
		$this->db->where('id',$id);		
		$get_user = $this->db->get('users');
	
	// $this->db->last_query();
	//	exit;
		if(count($get_user->row_array()) > 0){
			$update_data = array(
			   'password' => $this->db->escape_str(trim($new_password)),
			);
			$this->db->dbprefix('users');
			$this->db->where('id',$id);
			$ins_into_db = $this->db->update('users', $update_data);
			if($ins_into_db){
				return true;
			}else{
				return false;
			}
		}	
		else{
			
			return false;
		}	
		
	}//user login function ends here 
	
	
	public function update_user_record($data){
		
		extract($data);
		//echo 'adada<pre>';print_r($data);exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		if($password!=''){
			//$password = md5($shop_pass);
			$password = md5($password);
	
			$update_data = array(
			   'first_name' => $this->db->escape_str(trim($first_name)),
			   'last_name' => $this->db->escape_str(trim($last_name)),
			   'password' => $this->db->escape_str(trim($password)),
			   'status' => $this->db->escape_str(trim($status)),
			   'salary_per_h' => $this->db->escape_str(trim($salary_per_h)),
			   'modify_date' => $this->db->escape_str(trim($created_date)),
			);
		}else{
			$update_data = array(
		   'first_name' => $this->db->escape_str(trim($first_name)),
		   'last_name' => $this->db->escape_str(trim($last_name)),
		   'status' => $this->db->escape_str(trim($status)),
		   'salary_per_h' => $this->db->escape_str(trim($salary_per_h)),
		   'modify_date' => $this->db->escape_str(trim($created_date)),
		   );
			
		}
		//echo '<pre>';print_r($ins_data);exit;
      
		//Insert the record into the database.
		$this->db->dbprefix('users');
		$this->db->where('id',$id);
		$ins_into_db = $this->db->update('users', $update_data);
	
		$this->db->last_query();

		if($ins_into_db) return true;

	}//end add_shop()
	
}
?>