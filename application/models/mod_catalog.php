<?php
class mod_catalog extends CI_Model {
	
	function __construct(){
		
        parent::__construct();

    }


	public function num_catalog($table_name){
		$this->db->dbprefix($table_name);
		$this->db->select('id');
		
		
		$query = $this->db->get($table_name);
		
		return $query->num_rows();
		
	}
	
	public function get_all_catalog($table_name,$limit,$id){
		
	
		
		
		$this->db->dbprefix($table_name);
		$this->db->select('*');
	  // $this->db->where('type','interior designe');
		$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get($table_name);
		
		return $get_all_users->result_array();
		
	}
	
	public function manage_view_catalog($table_name,$limit,$id,$catalog_id){
		
	
		
		
		$this->db->dbprefix($table_name);
		$this->db->select('*');
	   $this->db->where('catalog_id',$catalog_id);
		$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get($table_name);
		//echo $this->db->last_query();
		//print_r($get_all_users->result_array());
		return $get_all_users->result_array();
		
	}
	
	public function add_catalog($data){
		
		extract($data);
		
	/* echo "<pre>";print_r($data);
	 exit;*/

		// print_r($_POST);

		// echo $_FILES['profile_image']['name'];

		// exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
	
		

		$ins_data = array(
		   'company_name' => $this->db->escape_str(trim($company_name)),
		   'catalog_name' => $this->db->escape_str(trim($catalog_name)),
		   'description' => $this->db->escape_str(trim($description)),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   
		    
		);
      
		//Insert the record into the database.
		$this->db->dbprefix('catalog');
		$ins_into_db = $this->db->insert('catalog', $ins_data);
	
		// $this->db->last_query();
		 return true;

	}//end add_new_user()
	
	public function add_assign_process($data){
		
		extract($data);
		
	/*echo "<pre>";print_r($data);
	 exit;*/
	 $firms=$data['sub_firm_name'];
	
	 $firms=explode(',',$firms);
	 $subfirm_id=$firms[0];
	 $subfirm_name=$firms[1];
	  $subfirm_name=str_replace('-',' ',$subfirm_name);
$variable=$data['catalog_name'];
$variable=explode(',',$variable);
 $catalog_company=$variable[1];
 $catalog_name=$variable[0];

		//print_r($_POST);

		

		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
	
		

		$ins_data = array(
		   'firm_name' => $this->db->escape_str(trim($firm_name)),
		   'sub_firm_name' => $subfirm_name,
		   'sub_firm_id' => $subfirm_id,
		   'catalog_id' => $this->db->escape_str(trim($catalog_name)),
		    'catalog_name' => $this->db->escape_str(trim($catalog_company)),
			'project_id' => $this->db->escape_str(trim($project_name)),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   
		    
		);
      
		//Insert the record into the database.
		$this->db->dbprefix('assign_catalog');
		$ins_into_db = $this->db->insert('assign_catalog', $ins_data);
	
		// $this->db->last_query();
		 return true;

	}//end add_new_user()
	
	
	public function edit_catalog($data,$tablename,$id){
	
	//	echo $tablename
	// print_r($data);exit;

		
 		
			
			
		
		
		
		//update the record into the database.
		$this->db->dbprefix($tablename);
		$this->db->where('id',$id);
		$upd_into_db = $this->db->update($tablename,$data);
		//echo $this->db->last_query(); exit;
         if($upd_into_db) return true;
	}
	
	public function get_catalog($id,$table_name){
	
		/*echo $id;
		exit;*/
		//update the record into the database.
		$this->db->dbprefix($table_name);
		$this->db->select('*');
		$this->db->where('id',$id);
		$get_data = $this->db->get($table_name)->result_array();
		//echo $this->db->last_query(); exit;
         return $get_data;
	}
	
	public function get_firms($firm_name){
	
		/*echo $id;
		exit;*/
		//update the record into the database.
		$this->db->dbprefix('companies');
		$this->db->select('*');
		$this->db->where('type',$firm_name);
		$get_data = $this->db->get('companies')->result_array();
		//echo $this->db->last_query(); exit;
         return $get_data;
	}
	
	public function get_catalogs(){
	
		/*echo $id;
		exit;*/
		//update the record into the database.
		$this->db->dbprefix('catalog');
		$this->db->select('*');
		//$this->db->where('type',$firm_name);
		$get_data = $this->db->get('catalog')->result_array();
		//echo $this->db->last_query(); exit;
         return $get_data;
	}
	
	
	public function delete_catalog($id,$table_name){

		$this->db->dbprefix($table_name);
		$this->db->where('id',$id);
		$del_into_db = $this->db->delete($table_name);
		//$this->db->last_query();
		
		if($del_into_db) return true;

	}
	
	public function search_catalog($data,$table_name,$searching){
		//echo $table_name;
extract($data);
			
		//print_r($search);
			
			
			$this->db->select('*');
			$this->db->dbprefix($table_name);
			//$this->db->where('type','interior designe');
			$this->db->like($searching,$search);
			// $this->db->limit($limit, $id);
			$this->db->order_by('id ASC');
			//echo $this->db->last_query();
			$get_all_stories = $this->db->get($table_name);
			//echo $this->db->last_query();exit;
			//print_r($get_all_stories->result_array());exit;
			return $get_all_stories->result_array();
		

	}
	
}
?>