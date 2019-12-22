<?php
class mod_users extends CI_Model {
	
	function __construct(){
		
        parent::__construct();

    }

	public function get_users($limit,$id){
		
				
		$this->db->dbprefix('users');
		$this->db->select('*');
	  
		$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('users');
		
		
		return $get_all_users->result_array();
		
	}


public function get_all_interior($limit,$id){
		
	
		
		
		$this->db->dbprefix('companies');
		$this->db->select('*');
	   $this->db->where('type','interior designe');
		$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('companies');
		
		return $get_all_users->result_array();
		
	}
	
	public function get_all_contractor($limit,$id){
		
	
		
		
		$this->db->dbprefix('companies');
		$this->db->select('*');
	   $this->db->where('type','Main contractor');
		$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('companies');
		
		return $get_all_users->result_array();
		
	}
	
	public function get_all_owner($limit,$id,$type){
		
	
		
		
		$this->db->dbprefix('companies');
		$this->db->select('*');
	   $this->db->where('type',$type);
		$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('companies');
		
		return $get_all_users->result_array();
		
	}
	
	public function get_all_subcontractor($limit,$id){
		
	
		
		
		$this->db->dbprefix('companies');
		$this->db->select('*');
	   $this->db->where('type','sub contractor');
		$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('companies');
		
		return $get_all_users->result_array();
		
	}
	
	public function get_all_contacts($id){
		
	
		
	
		$query="select * from crm_contact where firm_id='".$id."'";
		$get_all_users=$this->db->query($query);
		
		
	//exit;
	  $get_all_users=$get_all_users->result_array();
	 //echo "<pre>";print_r($get_all_users);
		return $get_all_users;
		
	}
	
	public function update_password(){
		
	$id=$this->session->userdata('user_id');
		extract($this->input->post());
		
		  $oldpassword=md5($old_password);
		 $newpassword=md5($new_password);
 	   

		$query="select * from crm_users where password='".$oldpassword."'";
		$get_all_users=$this->db->query($query);
		
		 
	  $get_all_users=$get_all_users->result_array();
	/*  echo "<pre>";print_r($get_all_users);
	exit;*/
	  if(!empty($get_all_users)){
	 //echo "<pre>";print_r($get_all_users);
	  $query="update crm_users set password='".$newpassword."' where id='".$id."'";
	  $get_all_users=$this->db->query($query);
	  return true;
	  }
	  else{
	   return false;
	  }
		
		
	}
	
	public function get_comp($id){
		
	
		
	
		$query="select * from crm_companies where id='".$id."'";
		$get_all_users=$this->db->query($query);
		
		
	//exit;
	  $get_all_users=$get_all_users->result_array();
	 //echo "<pre>";print_r($get_all_users);
		return $get_all_users;
		
	}
	
	public function get_all_contacts_id($id){
		
	
		
		
	
		$query="select * from crm_contact where id='".$id."'";
		$get_all_users=$this->db->query($query);
		
		//echo "<pre>";print_r();
	//exit;
	  $get_all_users=$get_all_users->result_array();
		return $get_all_users;
		
	}
	
	
	public function get_all_users(){
		
		
		$this->db->dbprefix('users');
		
		$this->db->select('users.*, user_roles.name as user_type');

		$this->db->order_by('user_roles.id');		

		$this->db->join('user_roles', 'users.type = user_roles.id');

		$get_all_users = $this->db->get('users');

		// echo "<pre>";

		// print_r($get_all_users->result_array());

		// exit;
		
		return $get_all_users->result_array();
		
	}	
	
	public function num_interior(){
		$this->db->dbprefix('companies');
		$this->db->select('id');
		$this->db->where('type','interior designe');
		
		$query = $this->db->get('companies');
		
		return $query->num_rows();
		
	}
	
	public function num_users(){
		$this->db->dbprefix('users');
		$this->db->select('id');
		
		
		$query = $this->db->get('users');
		
		return $query->num_rows();
		
	}
	
	public function num_contractor(){
		$this->db->dbprefix('companies');
		$this->db->select('id');
		$this->db->where('type','main contractor');
		
		$query = $this->db->get('companies');
		
		return $query->num_rows();
		
	}
	
	public function num_owner($type){
		$this->db->dbprefix('companies');
		$this->db->select('id');
		$this->db->where('type','Owner');
		
		$query = $this->db->get('companies');
		
		return $query->num_rows();
		
	}
	
	
	public function num_subcontractor(){
		$this->db->dbprefix('companies');
		$this->db->select('id');
		$this->db->where('type','sub contractor');
		
		$query = $this->db->get('companies');
		
		return $query->num_rows();
		
	}
	
	
		public function sub_users(){
		$this->db->dbprefix('user_roles');
		$this->db->select('*');
		
		
		$query = $this->db->get('user_roles');
		
		return $query->result_array();
		
	}
	
	
	public function edit_manage_interior($id){
		$query="select * from crm_companies where id='".$id."'";
			$q=$this->db->query($query);
			$result=$q->result_array();
		
			
			foreach($result as $k=>$res){
			$parent_id=$res['id'];
			$qry="select * from crm_contact where firm_id='".$id."'";
			$qry=$this->db->query($qry);
			$variable=$qry->result_array();
			$extra[$k]['id']=$res['id'];
			$extra[$k]['firm_name']=$res['firm_name'];
			$extra[$k]['email_address']=$res['email_address'];
			$extra[$k]['street']=$res['street'];
			$extra[$k]['second_street']=$res['second_street'];
			$extra[$k]['country']=$res['country'];
			$extra[$k]['city']=$res['city'];
			$extra[$k]['sub']=$variable;
			}
			
			
			
			
			
			return $extra;
		
	}
	
	public function get_zip(){
	 $query="select * from crm_zips";
		$query=$this->db->query($query);
		return $query->result_array();
		
	}
	
  
	public function get_user($product_id){
		
		$this->db->dbprefix('products');
		$this->db->where('id',$product_id);
		$get_product = $this->db->get('products');
		
		return $get_product->row_array();
		
	}
	//user login function
	public function userCheck(){
		//echo "asdS";exit;
		//print_r($this->input->post());exit;
		extract($this->input->post());
		$password = md5($txtpassword);

		$this->db->dbprefix('users');
		$this->db->where('user_name',$txtusername);
		$this->db->where('password',$password);		
		$get_user = $this->db->get('users');
	
	// $this->db->last_query();
	//	exit;
		if(count($get_user->row_array()) > 0)
		{

			$user = $get_user->row_array();

			$newdata = array(
                   'user_id'  	=> $user['id'],
                   'user_name'  => $user['first_name']." ".$user['last_name'],
                   'user_type'	=> $user['type'],
                   'user_image'	=> $user['image'],                   
               );

			$this->session->set_userdata($newdata);
			if($user['type'] ==1){
				echo '1';	
			}else{
				echo '2';
			}
			
			//echo true;

		}	
		else
		{
			//$extra='';
			//return $extra;
			echo false;

		}	
		
	}//user login function ends here 
	
	public function get__active_shop(){
		
				
		$this->db->dbprefix('shops');
		$this->db->select('*');
	  	$this->db->where('status','1');
		$this->db->where('del_status','0');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('shops');
		
		
		return $get_all_users->result_array();
		
	}
	
	
	//add user function starts here
	public function add_user($data){
		
		extract($data);
		
		// echo "<pre>";

		// print_r($_POST);

		// echo $_FILES['profile_image']['name'];

		// exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = 0;//$this->session->userdata('admin_id');

		if($_FILES['profile_image']['name'] != ''){

			//Create User Directory if not exist
			$folder_path = './assets/profile_images/';
	
			$file_ext = ltrim(strtolower(strrchr($_FILES['profile_image']['name'],'.')),'.'); 			
			$file_name = 'profileImage-'.date('YmdGis').'.jpg';

			$config['upload_path'] = $folder_path;
			$config['allowed_types'] = 'jpg|jpeg|gif|tiff|png';
			$config['max_size']	= '6000';
			$config['overwrite'] = true;
			$config['file_name'] = $file_name;
			$config['quality'] = '100%';
		
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('profile_image')){

				$error_file_arr = array('error' => $this->upload->display_errors());
				
			}else{

				$data_image_upload = array('upload_image_data' => $this->upload->data());
				
				//Resize the Uploaded Image 800 * 600
				$config_profile['image_library'] = 'gd2';
				$config_profile['source_image'] = $folder_path.'/'.$file_name;
				$config_profile['create_thumb'] = TRUE;
				$config_profile['thumb_marker'] = '';
				
				$config_profile['maintain_ratio'] = TRUE;
				$config_profile['width'] = 1000;
				$config_profile['height'] = 1000;
				$config_profile['quality'] = '100%';
				
				$this->load->library('image_lib');
				$this->image_lib->initialize($config_profile);
				$this->image_lib->resize();
				$this->image_lib->clear();

				//Creating Thumbmail 28 * 28
				//Uploading is successful now resizing the uploaded image 
				$config_profile['image_library'] = 'gd2';
				$config_profile['source_image'] = $folder_path.'/'.$file_name;
				$config_profile['new_image'] = $folder_path.'/thumb/'.$file_name;
				$config_profile['create_thumb'] = TRUE;
				$config_profile['thumb_marker'] = '';
				
				$config_profile['maintain_ratio'] = TRUE;
				$config_profile['width'] = 69;
				$config_profile['height'] = 69;
				
				$this->load->library('image_lib');
				$this->image_lib->initialize($config_profile);
				$this->image_lib->resize();
				$this->image_lib->clear();
				
			}//end if(!$this->upload->do_upload('prof_image'))


		}//end if($_FILES['image']['name'] != '')

		$password = md5($password);

		$ins_data = array(
		   'first_name' => $this->db->escape_str(trim($first_name)),
		   'last_name' => $this->db->escape_str(trim($last_name)),
		   'email' => $this->db->escape_str(trim(nl2br($email))),
		   'password' => $this->db->escape_str(trim($password)),
		   'address' => $this->db->escape_str(trim($address)),
		   'phone_no' => $this->db->escape_str(trim($phone_no)),
		   'mobile_no' => $this->db->escape_str(trim($mobile_no)),
		   'image' => $this->db->escape_str(trim($file_name)),		   
		   'created_by' => $this->db->escape_str(trim($created_by)),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'type' => $this->db->escape_str(trim($type)),
		   'status' => 1,		   		   
		);
      
		//Insert the record into the database.
		$this->db->dbprefix('users');
		$ins_into_db = $this->db->insert('users', $ins_data);
	
		echo $this->db->last_query();

		if($ins_into_db) return true;

	}//end add_new_user()
	
	public function add_interior_con($data){
		
		extract($data);
		
		// echo "<pre>";

		// print_r($_POST);

		// echo $_FILES['profile_image']['name'];

		// exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = 0;//$this->session->userdata('admin_id');

		

		$ins_data = array(
		   'firm_name' => $this->db->escape_str(trim($firm_name)),
		   'email_address' => $this->db->escape_str(trim($email_address)),
		   'info' => $this->db->escape_str(trim($info)),
		   'street' => $this->db->escape_str(trim($street)),
		    'second_street' => $this->db->escape_str(trim($second_street)),
			 'country' => $this->db->escape_str(trim($country)),
			  'city' => $this->db->escape_str(trim($city)),
		   'state_zip' => $this->db->escape_str(trim($state_zip)),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'type' => 'Interior Designe',
		    'firm_type' => 'firm',
		    
		);
      
		//Insert the record into the database.
		$this->db->dbprefix('companies');
		$ins_into_db = $this->db->insert('companies', $ins_data);
	
		// $this->db->last_query();
$last_row=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('companies')->result_array();

		 return $last_row;

	}//end add_new_user()
	
	public function add_interior($data,$type){
		
		extract($data);
		
		// echo "<pre>";

		// print_r($_POST);

		// echo $_FILES['profile_image']['name'];

		// exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = 0;//$this->session->userdata('admin_id');

		

		$ins_data = array(
		   'firm_name' => $this->db->escape_str(trim($firm_name)),
		   'email_address' => $this->db->escape_str(trim($email_address)),
		   'info' => $this->db->escape_str(trim($info)),
		   'street' => $this->db->escape_str(trim($street)),
		    'second_street' => $this->db->escape_str(trim($second_street)),
			 'country' => $this->db->escape_str(trim($country)),
			  'city' => $this->db->escape_str(trim($city)),
		   'state_zip' => $this->db->escape_str(trim($state_zip)),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'type' => $type,
		    'firm_type' => 'individual',
		    
		);
      
		//Insert the record into the database.
		$this->db->dbprefix('companies');
		$ins_into_db = $this->db->insert('companies', $ins_data);
	
		// $this->db->last_query();

		 return true;

	}//end add_new_user()
	
	
	
		
	
	public function add_contractor($data){
		
		extract($data);
		
		// echo "<pre>";

		// print_r($_POST);

		// echo $_FILES['profile_image']['name'];

		// exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = 0;//$this->session->userdata('admin_id');

		

		$ins_data = array(
		'firm_name' => $this->db->escape_str(trim($firm_name)),
		   'email_address' => $this->db->escape_str(trim($email_address)),
		   'info' => $this->db->escape_str(trim($info)),
		   'street' => $this->db->escape_str(trim($street)),
		    'second_street' => $this->db->escape_str(trim($second_street)),
			 'country' => $this->db->escape_str(trim($country)),
			  'city' => $this->db->escape_str(trim($city)),
		   'state_zip' => $this->db->escape_str(trim($state_zip)),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'type' => 'Main Contractor',
		   'firm_type' => 'firm',
		
		  
		    
		);
      
		//Insert the record into the database.
		$this->db->dbprefix('companies');
		$ins_into_db = $this->db->insert('companies', $ins_data);
	
	// $this->db->last_query();
$last_row=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('companies')->row();

		 return $last_row;

	}//end add_new_user()
	
	public function add_interior_contact($data){
		
		extract($data);
		//echo count($employee_name);
		//echo "<pre>";print_r($data);exit;

		// print_r($_POST);

		// echo $_FILES['profile_image']['name'];

		// exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = 0;//$this->session->userdata('admin_id');

		for($a=0; $a < count($employee_name); $a++)
		{

		$ins_data = array(
		   'firm_name' => $this->db->escape_str(trim($firm_name)),
		   'employee_name' => $this->db->escape_str(trim($employee_name[$a])),
		   'email_address' => $this->db->escape_str(trim($email_address[$a])),
		  // 'city' => $this->db->escape_str(trim($city[$a])),
		   //'country' => $this->db->escape_str(trim($country[$a])),
		    //'street' => $this->db->escape_str(trim($street[$a])),
			 //'second_street' => $this->db->escape_str(trim($second_street[$a])),
			 'created_date' => $this->db->escape_str(trim($created_date)),
			 'firm_id' => $this->db->escape_str(trim($firm_id)),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   
		  
		    
		);
		$this->db->dbprefix('contact');
		$ins_into_db = $this->db->insert('contact', $ins_data);
		}
		//Insert the record into the database.
		
	
		// $this->db->last_query();

		if($ins_into_db) return true;

	}//end add_new_user()
	
	
	
	public function add_subcontractor_process($data){
		
		extract($data);
		
		// echo "<pre>";

		// print_r($_POST);

		// echo $_FILES['profile_image']['name'];

		// exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = 0;//$this->session->userdata('admin_id');

		

		$ins_data = array(
		
		'firm_name' => $this->db->escape_str(trim($firm_name)),
		   'email_address' => $this->db->escape_str(trim($email_address)),
		   'info' => $this->db->escape_str(trim($info)),
		   'street' => $this->db->escape_str(trim($street)),
		    'second_street' => $this->db->escape_str(trim($second_street)),
			 'country' => $this->db->escape_str(trim($country)),
			  'city' => $this->db->escape_str(trim($city)),
		   'state_zip' => $this->db->escape_str(trim($state_zip)),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'type' => 'sub contractor',
		    'firm_type' => 'firm',
		   
		 
		    
		);
      
		//Insert the record into the database.
		$this->db->dbprefix('companies');
		$ins_into_db = $this->db->insert('companies', $ins_data);
	
	$last_row=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('companies')->row();

		 return $last_row;
	}//end add_new_user()
	
	public function add_owner_process($data,$type){
		
		extract($data);
		
		// echo "<pre>";

		// print_r($_POST);

		// echo $_FILES['profile_image']['name'];

		// exit;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = 0;//$this->session->userdata('admin_id');

		

		$ins_data = array(
		'firm_name' => $this->db->escape_str(trim($firm_name)),
		   'email_address' => $this->db->escape_str(trim($email_address)),
		   'info' => $this->db->escape_str(trim($info)),
		   'street' => $this->db->escape_str(trim($street)),
		    'second_street' => $this->db->escape_str(trim($second_street)),
			 'country' => $this->db->escape_str(trim($country)),
			  'city' => $this->db->escape_str(trim($city)),
		   'state_zip' => $this->db->escape_str(trim($state_zip)),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'type' => $type,
		   'firm_type' => 'firm',
		
		
		  
		    
		);
      
		//Insert the record into the database.
		$this->db->dbprefix('companies');
		$ins_into_db = $this->db->insert('companies', $ins_data);
	
		$last_row=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('companies')->row();

		 return $last_row;
	}//end add_new_user()
	
	
	
	//Get user Record by ID
	public function edit_user($id){
	
		$this->db->dbprefix('bir');
		$this->db->where('id',$id);
		$get_user = $this->db->get('users');
	    //echo $this->db->last_query(); exit;
		return $get_user->row_array();
		
	}//end get_stages
	
	public function edit_interior($id){
	
		$this->db->dbprefix('companies');
		$this->db->where('id',$id);
		$get_user = $this->db->get('companies');
	    //echo $this->db->last_query(); exit;
		return $get_user->row_array();
		
	}//end get_stages
	
	public function edit_contractor($id){
	
		$this->db->dbprefix('companies');
		$this->db->where('id',$id);
		$get_user = $this->db->get('companies');
	    //echo $this->db->last_query(); exit;
		return $get_user->row_array();
		
	}//end get_stages
	
	

//user update fumction is here 
public function update_user($data){
		
		extract($data);
		
	    // echo "<pre>";

		//print_r($_POST); exit;

		// echo $_FILES['profile_image']['name'];

		// exit;

		if($_FILES['profile_image']['name'] != ''){

			//Create User Directory if not exist
			$folder_path = './assets/profile_images/';
	
			$file_ext = ltrim(strtolower(strrchr($_FILES['profile_image']['name'],'.')),'.'); 			
			$file_name = 'profileImage-'.date('YmdGis').'.jpg';

			$config['upload_path'] = $folder_path;
			$config['allowed_types'] = 'jpg|jpeg|gif|tiff|png';
			$config['max_size']	= '6000';
			$config['overwrite'] = true;
			$config['file_name'] = $file_name;
			$config['quality'] = '100%';
		
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('profile_image')){

				$error_file_arr = array('error' => $this->upload->display_errors());
				
			}else{

				$data_image_upload = array('upload_image_data' => $this->upload->data());
				
				//Resize the Uploaded Image 800 * 600
				$config_profile['image_library'] = 'gd2';
				$config_profile['source_image'] = $folder_path.'/'.$file_name;
				$config_profile['create_thumb'] = TRUE;
				$config_profile['thumb_marker'] = '';
				
				$config_profile['maintain_ratio'] = TRUE;
				$config_profile['width'] = 1000;
				$config_profile['height'] = 1000;
				$config_profile['quality'] = '100%';
				
				$this->load->library('image_lib');
				$this->image_lib->initialize($config_profile);
				$this->image_lib->resize();
				$this->image_lib->clear();

				//Creating Thumbmail 28 * 28
				//Uploading is successful now resizing the uploaded image 
				$config_profile['image_library'] = 'gd2';
				$config_profile['source_image'] = $folder_path.'/'.$file_name;
				$config_profile['new_image'] = $folder_path.'/thumb/'.$file_name;
				$config_profile['create_thumb'] = TRUE;
				$config_profile['thumb_marker'] = '';
				
				$config_profile['maintain_ratio'] = TRUE;
				$config_profile['width'] = 230;
				$config_profile['height'] = 150;
				
				$this->load->library('image_lib');
				$this->image_lib->initialize($config_profile);
				$this->image_lib->resize();
				$this->image_lib->clear();
				
			}//end if(!$this->upload->do_upload('prof_image'))


		}//end if($_FILES['image']['name'] != '')

		
 		if(!$file_name==''){
			
		$this->db->select('image');
		$this->db->where('id',$id);
		$get_user = $this->db->get('users');
	    //echo $this->db->last_query(); exit;
		 $user_old_image=$get_user->row_array();
		 
		// echo "<pre>";print_r($get_user); exit;
		 
		$user_folder_path='./assets/profile_images/thumb/';
		
	
	
			//Delete Existing Image
			if(file_exists($user_folder_path.$user_old_image['image'])){
	           
			  // 	echo $user_folder_path.'/'.$user_old_image['image']; exit;
			   			
				unlink($folder_path.$user_old_image['image']);
				unlink($user_folder_path.$user_old_image['image']);
			}	
			
			
			
				
		$update_data = array(
		   'first_name' => $this->db->escape_str(trim($first_name)),
		   'last_name' => $this->db->escape_str(trim($last_name)),
		   'email' => $this->db->escape_str(trim(nl2br($email))),
		   'address' => $this->db->escape_str(trim($address)),
		   'phone_no' => $this->db->escape_str(trim($phone_no)),
		   'mobile_no' => $this->db->escape_str(trim($mobile_no)),
		   'image' => $this->db->escape_str(trim($file_name)),		   
		   'type' => $this->db->escape_str(trim($type)),
		   'status' => 1,		   		   
		);
		}
		else{
			
			$update_data = array(
		   'first_name' => $this->db->escape_str(trim($first_name)),
		   'last_name' => $this->db->escape_str(trim($last_name)),
		   'email' => $this->db->escape_str(trim(nl2br($email))),
		   'address' => $this->db->escape_str(trim($address)),
		   'phone_no' => $this->db->escape_str(trim($phone_no)),
		   'mobile_no' => $this->db->escape_str(trim($mobile_no)),		   
		   'type' => $this->db->escape_str(trim($type)),
		   'status' => 1,		   		   
		);
			
			
			}
		
		
		//update the record into the database.
		$this->db->dbprefix('users');
		$this->db->where('id',$id);
		$upd_into_db = $this->db->update('users', $update_data);
		//echo $this->db->last_query(); exit;
         if($upd_into_db) return true;
		

	}//end update finction
	
	public function add_note($data,$id,$table_name){
	$this->db->dbprefix($table_name);
		$this->db->where('id',$id);
		$upd_into_db = $this->db->update($table_name, $data);
		//echo $this->db->last_query(); exit;
         if($upd_into_db) return true;
	}
	
	public function update_contact($data){
		
		extract($data);
		
	
 		
			
			
				
		$update_data = array(
		   'firm_name' => $this->db->escape_str(trim($firm_name)),
		   'employee_name' => $this->db->escape_str($employee_name),
		  // 'street' => $this->db->escape_str(trim($street)),
		   // 'country' => $this->db->escape_str(trim($country)),
			// 'city' => $this->db->escape_str(trim($city)),
			// 'second_street' => $this->db->escape_str(trim($second_street)),
		   'email_address' => $this->db->escape_str(trim($email_address))
		
		 
		);
		
		//print_r($update_data);
		
		//update the record into the database.
		$this->db->dbprefix('contact');
		$this->db->where('id',$id);
		$upd_into_db = $this->db->update('contact', $update_data);
		//echo $this->db->last_query(); exit;
         if($upd_into_db) return true;
		

	}//end update finction
	
	
	
	
	public function update_interior($data){
		
		extract($data);
		
	  //print_r($data);exit;

		
 		
			
			
				
		$update_data = array(
		   'firm_name' => $this->db->escape_str(trim($firm_name)),
		   'email_address' => $this->db->escape_str(trim($email_address)),
		   'info' => $this->db->escape_str(trim($info)),
		   'street' => $this->db->escape_str(trim($street)),
		    'second_street' => $this->db->escape_str(trim($second_street)),
			 'country' => $this->db->escape_str(trim($country)),
			  'city' => $this->db->escape_str(trim($city)),
		   'state_zip' => $this->db->escape_str(trim($state_zip)),
		 
		);
		
		
		//update the record into the database.
		$this->db->dbprefix('companies');
		$this->db->where('id',$id);
		$upd_into_db = $this->db->update('companies', $update_data);
		//echo $this->db->last_query(); exit;
         if($upd_into_db) return true;
		

	}//end update finction
	
	
	public function search_interior($data){
		
extract($data);
			
			//print_r($search);
			
			
			$this->db->select('*');
			$this->db->dbprefix('companies');
			$this->db->where('type','interior designe');
			$this->db->like('firm_name',$search);
			// $this->db->limit($limit, $id);
			$this->db->order_by('id DESC');
			$get_all_stories = $this->db->get('companies');
			
			return $get_all_stories->result_array();
		

	}
	
	public function search_contractor($data){
		
extract($data);
			
			//print_r($search);
			
			
			$this->db->select('*');
			$this->db->dbprefix('companies');
			$this->db->where('type','main contractor');
			$this->db->like('firm_name',$search);
			// $this->db->limit($limit, $id);
			$this->db->order_by('id DESC');
			$get_all_stories = $this->db->get('companies');
			
			return $get_all_stories->result_array();
		

	}
	
	public function search_subcontractor($data){
		
extract($data);
			
			//print_r($search);
			
			
			$this->db->select('*');
			$this->db->dbprefix('companies');
			$this->db->where('type','sub contractor');
			$this->db->like('firm_name',$search);
			// $this->db->limit($limit, $id);
			$this->db->order_by('id DESC');
			$get_all_stories = $this->db->get('companies');
			
			return $get_all_stories->result_array();
		

	}
	
	public function search_suplier($data){
		
extract($data);
			
			//print_r($search);
			
			
			$this->db->select('*');
			$this->db->dbprefix('companies');
			$this->db->where('type','Supplier');
			$this->db->like('firm_name',$search);
			// $this->db->limit($limit, $id);
			$this->db->order_by('id DESC');
			$get_all_stories = $this->db->get('companies');
			
			return $get_all_stories->result_array();
		

	}
	
	public function search_owner($data){
		
extract($data);
			
			//print_r($search);
			
			
			$this->db->select('*');
			$this->db->dbprefix('companies');
			$this->db->where('type','Owner');
			$this->db->like('firm_name',$search);
			// $this->db->limit($limit, $id);
			$this->db->order_by('id DESC');
			$get_all_stories = $this->db->get('companies');
			
			return $get_all_stories->result_array();
		

	}
	
	
	public function update_contractor($data){
		
		extract($data);
		
	  
/*print_r($data);
exit;
		*/
 		
			
			
				
		$update_data = array(
	 'firm_name' => $this->db->escape_str(trim($firm_name)),
		   'email_address' => $this->db->escape_str(trim($email_address)),
		   'info' => $this->db->escape_str(trim($info)),
		   'street' => $this->db->escape_str(trim($street)),
		    'second_street' => $this->db->escape_str(trim($second_street)),
			 'country' => $this->db->escape_str(trim($country)),
			  'city' => $this->db->escape_str(trim($city)),
		   'state_zip' => $this->db->escape_str(trim($state_zip)),
		 
		);
		
		
		//update the record into the database.
		$this->db->dbprefix('companies');
		$this->db->where('id',$id);
		$upd_into_db = $this->db->update('companies', $update_data);
		//echo $this->db->last_query(); exit;
         if($upd_into_db) return true;
		

	}//end update finction
	
	


	//Delete user
	public function delete_user($id,$image){
$folder_path ='./assets/profile_images';
 $user_folder_path='./assets/profile_images/thumb/';
		
	
	
			//Delete Existing Image
		
	           
			  // 	echo $user_folder_path.'/'.$user_old_image['image']; exit;
			   		echo $user_folder_path.$image;	
				unlink($folder_path.'/'.$image);
				unlink($user_folder_path.$image);
		
		$this->db->dbprefix('users');
		$this->db->where('id',$id);
		$del_into_db = $this->db->delete('users');
		//$this->db->last_query();
	
		if($del_into_db) return true;

	}//public function delete_user
	
	public function delete_interior($id){

		$this->db->dbprefix('companies');
		$this->db->where('id',$id);
		$del_into_db = $this->db->delete('companies');
		
		$this->db->dbprefix('contact');
		$this->db->where('firm_id',$id);
		$del_into_db = $this->db->delete('contact');
		//$this->db->last_query();
	
		if($del_into_db) return true;

	}
	
	public function delete_sub_contact($id){

		
		$this->db->dbprefix('contact');
		$this->db->where('id',$id);
		$del_into_db = $this->db->delete('contact');
		//$this->db->last_query();
	
		if($del_into_db) return true;

	}
	
	
	public function delete_contractor($id){

		$this->db->dbprefix('companies');
		$this->db->where('id',$id);
		$del_into_db = $this->db->delete('companies');
		//$this->db->last_query();
		$this->db->dbprefix('contact');
		$this->db->where('firm_id',$id);
		$del_into_db = $this->db->delete('contact');
		if($del_into_db) return true;

	}
	
}
?>