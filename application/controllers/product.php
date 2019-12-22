<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_prodect','product');

	$this->load->model('mod_project','project');
		
	    $this->load->library('pagination');

				if($this->session->userdata('user_id') != TRUE){

		 		redirect(SURL);
		
		 }
	}
	
	
	public function search_product(){
$table_name='product';
$searching='product_name';
		$data['get_stories']=$this->product->search_data($this->input->post(),$table_name,$searching);
//print_r($data['get_stories']);exit;
		$div=' <table class="table table-bordered table-striped table-hover">

											 <thead>
        <tr>
          <th>Product Name</th>
            <th>Brand Name</th>
           
														<th>Action</th>
        </tr>
    </thead>
    <tbody>
											';
                                               if(!empty($data['get_stories'])){

													
                                                    
  foreach($data['get_stories'] as $stories){ 
$div.='<tr>';
                                                      
                                                
                                                        $div.='
                                                        <td >'.$stories['product_name'].'</td>
                                                        <td >'.$stories['brand_name'].'</td>
														
                                                        <td >';
														if($this->session->userdata('user_type')==1)
{ $div.='
                                                        	<a class="btn btn-default" href="'.SURL.'product/get_product/'.$stories['id'].'"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a>';}
															if($this->session->userdata('user_type')==1)
{ $div.='
															
                                                        	<a class="btn btn-danger"  onclick="return confirm("Are you sure you want to delete this item?");" href="'.SURL.'product/delete_data/'.$stories['id'].'"><i class="fa fa-trash" aria-hidden="true" title="delete the data"></i></a>';}
															

 $div.='
  
  </td>                                                      
                                                      </tr> ';
          }
											   }
                                                        else{
															$div.='<tr><td colspan="5" class="text-center"><b>NO Record to Display</b></td></tr>';
															                                                          } 

												$div.='</tbody>

											 </table>
                                            ';
		
		echo $div;


	}
	
	
	public function search_size(){
$table_name='size';
$searching='size';
		$data['get_stories']=$this->product->search_data($this->input->post(),$table_name,$searching);
//print_r($data['get_stories']);exit;
		$div=' <table class="table table-bordered table-striped table-hover">

											 <thead>
        <tr>
         <th>Sizes</th>
          
														<th>Action</th>
        </tr>
    </thead>
    <tbody>
											';
                                               if(!empty($data['get_stories'])){

													
                                                    
  foreach($data['get_stories'] as $stories){ 
$div.='<tr>';
                                                      
                                                
                                                        $div.='
                                                        <td class="text-center">'.$stories['size'].'</td>
                                                       
                                                        <td class="text-center">
                                                        	<a class="btn btn-default" href="'.SURL.'product/get_size/'.$stories['id'].'"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a>
															
                                                        	<a class="btn btn-danger"  onclick="return confirm("Are you sure you want to delete this item?");" href="'.SURL.'product/delete_size/'.$stories['id'].'"><i class="fa fa-trash" aria-hidden="true" title="delete the data"></i></a>
															

 
  
  </td>                                                      
                                                      </tr> ';
          }
											   }
                                                        else{
															$div.='<tr><td colspan="5" class="text-center"><b>NO Record to Display</b></td></tr>';
															                                                          } 

												$div.='</tbody>

											 </table>
                                            ';
		
		echo $div;


	}
	
	
	
		public function view_data(){
	//echo"asDA";exit;
  $product_id=$_GET['id'];

//		exit;
		$data['get'] = $this->product->get_all_object($product_id,'product_sizes','product_id');
		$div='
		<label>Product Sizes</label>
		  <section id="intro">
														<select name="sizes" id="sizes" >
                                                        
                                                       
                                                       
		<option value="0">Select Sizes</option>';
		foreach($data['get'] as $get){
        $div.=' <option value='.$get['id'].'>'.$get['size'].'</option>';
		}
		$div.='</select>
		</section>
		';
		echo $div;
		//$this->load->view('catalog/add_catalog', $data);


	}
	
	
/*	public function next_data(){
	//echo"asDA";exit;
  $size_id=$_GET['id'];

//		exit;
		$data['get'] = $this->product->get_all_object($size_id,'assign_sample','size_id');
		$div='
		<label>Product Sizes</label>
		  <section id="intro">
														<select name="sample" id="sample">
                                                        
                                                       
                                                       
		<option>Select Sizes</option>';
		foreach($data['get'] as $get){
        $div.=' <option value='.$get['id'].'>'.$get['firm_name'].'('.$get['sub_firm_name'].')</option>';
		}
		$div.='</select>
		</section>
		';
		echo $div;
		//$this->load->view('catalog/add_catalog', $data);


	}*/
	
	public function add_product(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
     $table_name='size';
	  $table_names='product';
	 $data['get_model']=$this->product->get_models_data($table_names);
     $data['get_size']=$this->product->get_table_data($table_name);
	 
		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('product/add_product', $data);


	}
	
	public function add_quantity(){
//print_r($this->input->post());
//exit;
$table_name='sample_quantity';
        $created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		
	$data=array(
	'size_id'=>$this->db->escape_str(trim($this->input->post('id'))),
	'quantity'=>$this->db->escape_str(trim($this->input->post('quantity'))),
	'created_date'=>$this->db->escape_str(trim($created_date)),
	'ip_address'=>$this->db->escape_str(trim($ip_address)),
	
	);
	
		$add_data=$this->product->add_data($data,$table_name);
		$datas=array(

	'sample_stock_status'=>$this->db->escape_str(trim($this->input->post('quantity'))),
	
	
	);
	$table_names='product_sizes';
  	$this->product->edit_data($datas,$table_names,$this->input->post('id'));
	    if($add_data){
				
				$this->session->set_flashdata('ok_message', '- data  added successfully.');
				redirect(base_url().'product/add_sample');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'product/add_sample');
				
				}//end if($add_cms_page)


	}
	
	
	public function add_size(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('product/add_size', $data);


	}
	
	
	public function assign_samples($id){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$data['id']=$id;
$firm_name='project';
         $data['all_project'] = $this->project->get_table_data($firm_name);
		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('sample/assign_sample', $data);


	}
	
	public function edit_sample($id,$product_id){
        $table_name='assign_sample';
		
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        
		$data['get_sample']=$this->product->get_data($id,$table_name);
        $data['product_id']=$product_id;
		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('sample/edit_sample', $data);


	}
	
	
	
	
	public function add_sample(){
		
        $variable=array();
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

        $table_name='product';
		 $table_names='product_sizes';
	
        $data['get_product']=$this->product->get_table_data($table_name);
		foreach($data['get_product'] as $k=>$get){
	    $id=$get['id'];
		$attribute='product_id';
        $variable[$k]=$this->product->get_data_attribute($id,$attribute,$table_names);
		
		}
		//echo "<pre>";print_r($variable);exit;
		$product_array=array();
		if(!empty($variable)){
		 foreach($variable as $k=>$value){
		// echo "<pre>";print_r($value);
			
			 if(!empty($value)){
			 $product_array[$value[0]['product_id']]=$value;
			 }
			
		 }
		}
		//echo "<pre>";print_r($product_array);exit;
		 $data['get_product_size']=$product_array;
		
		 //echo "<pre>";print_r($data['get_product_size']);exit;
		/*foreach($data['get_product_size'] as $get){
		$image= $data['get_product_size']['image'];
		
		$data['image']=$image;
		}*/
		//$data['sub_users'] = $this->mod_users->sub_users();
        //echo "<pre>";print_r($data['get_product_size']);exit;
		
		$this->load->view('sample/add_sample', $data);


	}
	

	public function get_firms(){
 $id=$_GET['id'];
//exit;
		
		$data['get'] = $this->product->get_firms($id);
		$div='
		<label>Sub Firms</label>
		 
													';
		foreach($data['get'] as $get){
        $div.='<input type="text" name="sub_firm_name" id="sub_firm_name" value="'.$get['sub_firm_name'].'">';
		}
		
		
		
		echo $div;
		//$this->load->view('catalog/add_catalog', $data);


	}
	
	
	
	public function manage_product($variant=0){
		$table_name='product';
		$product = $this->product->num_rows($table_name);
	//print_r($catalog);exit;
		$config["base_url"] = base_url() . "product/manage_product/";
		$config['total_rows'] = $product;
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
			
		
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		
		
		$this->pagination->initialize($config);
	
		$data['product'] = $this->product->get_all_data($table_name,$config['per_page'], $variant);
		

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		


		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('product/manage_product', $data);


	}
	
	public function manage_sample($variant=0){
		//exit;
	//	$table_name='assign_sample';
		$product = $this->product->num_sample();
		if(!empty($product)){
		$product=$product[0]['count(id)'];
		}
		//$product=$product[0];
		//print_r($product);exit;
	//print_r($catalog);exit;
		$config["base_url"] = base_url() . "product/manage_sample/";
		$config['total_rows'] = $product;
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
			
		
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		
		
		$this->pagination->initialize($config);
	
		$data['sample'] = $this->product->get_all_sample($config['per_page'], $variant);
		//echo "<pre>";print_r($data['sample']);

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		


		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('sample/manage_sample', $data);


	}
	
	public function manage_size($variant=0){
		$table_name='size';
		$product = $this->product->num_rows($table_name);
	//print_r($catalog);exit;
		$config["base_url"] = base_url() . "product/manage_size/";
		$config['total_rows'] = $product;
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
			
		
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		
		
		$this->pagination->initialize($config);
	
		$data['product'] = $this->product->get_all_data($table_name,$config['per_page'], $variant);
		
         
		  
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		


		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('product/manage_size', $data);


	}
	
	
	
	
	public function add_product_process(){
		 /*print_r( $this->input->post());
		 
		 exit;*/
		 $variable;
		 if(($_FILES['project_files']['name'])!=''){
			$folder_path = './assets/product_image/';
	
		
          	$file_name = 	'icon-'.date('YmdGis').'.jpg';

	
			//$file_ext           = ltrim(strtolower(strrchr($_FILES['project_files']['name'],'.')),'.'); 			
			
			$config['upload_path'] = $folder_path;
			
			$config['max_size']	= '10000';
			$config['overwrite'] = false;
			$config['file_name'] = $file_name;
		    $config['allowed_types'] = '*';
			$this->load->library('upload', $config);
			
            $this->upload->initialize($config);		
			$this->load->library('Multipleupload',$config);
              
			$upload_epaper =  $this->multipleupload->do_multi_upload_project_attachment('project_files', TRUE, 'yoyo');
			if(!$upload_epaper){
				
				$error_file_arr = array('error' => $this->upload->display_errors());
				return $error_file_arr;
				
			}else{
				$name_array = array();
        $count = count($_FILES['project_files']['size']);
		$counts=0;
        foreach($_FILES as $key=>$value)
        for($s=0; $s<=$count-1; $s++) {
			
       $file_name=$_FILES['project_files']['name']=$value['name'][$s];
		if($counts==0){
		$file_name = 'icon-'.date('YmdGis').'.jpg';
		$variable[$s]= $file_name;
		$counts++;
		}else{
			$file_name = 'icon-'.date('YmdGis').$counts.'.jpg';
			$variable[$s]= $file_name;
		$counts++;
		}
		$_FILES['project_files']['name']=$value['name'][$s];
        $_FILES['project_files']['type']    = $value['type'][$s];
        $_FILES['project_files']['tmp_name'] = $value['tmp_name'][$s];
        $_FILES['project_files']['error']       = $value['error'][$s];
        $_FILES['project_files']['size']    = $value['size'][$s];  
		
            $folder_path = './assets/product_image/';
            
                $config_profile['image_library'] = 'gd2';
				$config_profile['source_image'] = $folder_path.'/'.$file_name;
				$config_profile['new_image'] = $folder_path.'/thumb/'.$file_name;
				$config_profile['create_thumb'] = TRUE;
				$config_profile['thumb_marker'] = '';
				$config_profile['overwrite'] = false;
				$config_profile['maintain_ratio'] = TRUE;
				$config_profile['width'] = 230;
				$config_profile['height'] = 150;
				
				$this->load->library('image_lib');
				$this->image_lib->initialize($config_profile);
				$this->image_lib->resize();
				$this->image_lib->clear();
        
		}
			}
			// $images=$this->session->set_userdata('images',$variable);
		}
		
	
		 $table_name='product';
		 $created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		
		 $ins_data = array(
		   'product_name' => $this->db->escape_str(trim($this->input->post('product_name'))),
		   'brand_name' => $this->db->escape_str(trim($this->input->post('brand_name'))),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   
		    
		);
		 $this->product->add_data($ins_data,$table_name);
		
		 $product_id=$this->db->insert_id();
		 $table_names='product_sizes';
		 $sizes=$this->input->post('size');
		$quantity=$this->input->post('quantity');
		$price=$this->input->post('price');
		$sample_stock_status=$this->input->post('sample_stock_status');
		$stock_status=$this->input->post('stock_status');
	$counts=count($variable);

		for($i=0;$i<$counts;$i++){
		 $ins_datas = array(
		   'product_id' => $this->db->escape_str(trim($product_id)),
		
		   'size' => $this->db->escape_str(trim($sizes[$i])),
		   'quantity' => $this->db->escape_str(trim($quantity[$i])),
		   'price' => $this->db->escape_str(trim($price[$i])),
		   'sample_stock_status' => $this->db->escape_str(trim($sample_stock_status[$i])),
		   'stock_status' => $this->db->escape_str(trim($stock_status[$i])),
		   'image' => $this->db->escape_str(trim($variable[$i])),		  
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   
		    
		);
		 $upd_data=$this->product->add_data($ins_datas,$table_names);
		}
		

		
        
		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  added successfully.');
				redirect(base_url().'product/manage_product');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'product/manage_product');
				
				}//end if($add_cms_page)


	}
	
	
	public function add_edit_size_process(){
		/* print_r( $this->input->post());
		 
		 exit;*/
		 $variable;
		 if(($_FILES['project_files']['name'])!=''){
			 
			$folder_path = './assets/product_image/';
	
		
          	$file_name = 	'icon-'.date('YmdGis').'.jpg';

	
			//$file_ext           = ltrim(strtolower(strrchr($_FILES['project_files']['name'],'.')),'.'); 			
			
			$config['upload_path'] = $folder_path;
			
			$config['max_size']	= '10000';
			$config['overwrite'] = false;
			$config['file_name'] = $file_name;
		    $config['allowed_types'] = '*';
			$this->load->library('upload', $config);
			
            $this->upload->initialize($config);		
			$this->load->library('Multipleupload',$config);
              
			$upload_epaper =  $this->multipleupload->do_multi_upload_project_attachment('project_files', TRUE, 'yoyo');
			if(!$upload_epaper){
				
				$error_file_arr = array('error' => $this->upload->display_errors());
				return $error_file_arr;
				
			}else{
				$name_array = array();
        $count = count($_FILES['project_files']['size']);
		$counts=0;
        foreach($_FILES as $key=>$value)
        for($s=0; $s<=$count-1; $s++) {
			
       $file_name=$_FILES['project_files']['name']=$value['name'][$s];
		if($counts==0){
		$file_name = 'icon-'.date('YmdGis').'.jpg';
		$variable[$s]= $file_name;
		$counts++;
		}else{
			$file_name = 'icon-'.date('YmdGis').$counts.'.jpg';
			$variable[$s]= $file_name;
		$counts++;
		}
		$_FILES['project_files']['name']=$value['name'][$s];
        $_FILES['project_files']['type']    = $value['type'][$s];
        $_FILES['project_files']['tmp_name'] = $value['tmp_name'][$s];
        $_FILES['project_files']['error']       = $value['error'][$s];
        $_FILES['project_files']['size']    = $value['size'][$s];  
		
            $folder_path = './assets/product_image/';
            
                $config_profile['image_library'] = 'gd2';
				$config_profile['source_image'] = $folder_path.'/'.$file_name;
				$config_profile['new_image'] = $folder_path.'/thumb/'.$file_name;
				$config_profile['create_thumb'] = TRUE;
				$config_profile['thumb_marker'] = '';
				$config_profile['overwrite'] = false;
				$config_profile['maintain_ratio'] = TRUE;
				$config_profile['width'] = 230;
				$config_profile['height'] = 150;
				
				$this->load->library('image_lib');
				$this->image_lib->initialize($config_profile);
				$this->image_lib->resize();
				$this->image_lib->clear();
        
		}
			}
			// $images=$this->session->set_userdata('images',$variable);
		}
		
	
		
		 $created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		
		 $table_names='product_sizes';
		 $sizes=$this->input->post('size');
		$quantity=$this->input->post('quantity');
		$price=$this->input->post('price');
		$sample_stock_status=$this->input->post('sample_stock_status');
		$stock_status=$this->input->post('stock_status');
		$ids=$this->input->post('id');
	 $counts=count($sizes);

		for($i=0;$i<$counts;$i++){
		 $ins_datas = array(
		   'product_id' => $this->db->escape_str(trim($ids)),
		
		   'size' => $this->db->escape_str(trim($sizes[$i])),
		   'quantity' => $this->db->escape_str(trim($quantity[$i])),
		   'price' => $this->db->escape_str(trim($price[$i])),
		   'sample_stock_status' => $this->db->escape_str(trim($sample_stock_status[$i])),
		   'stock_status' => $this->db->escape_str(trim($stock_status[$i])),
		   'image' => $this->db->escape_str(trim($variable[$i])),		  
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   
		    
		);
		 $upd_data=$this->product->add_data($ins_datas,$table_names);
		
		}
		

		
        
		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  added successfully.');
				redirect(base_url().'product/manage_product');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'product/manage_product');
				
				}//end if($add_cms_page)


	}
	
	
	public function add_size_process(){
		 /*print_r( $this->input->post());
		 
		 exit;*/
		

		 $table_name='size';
		 $created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		 $ins_data = array(
		  
		   'size' => $this->db->escape_str(trim($this->input->post('size'))),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   
		    
		);
      
		 $upd_data=$this->product->add_data($ins_data,$table_name);

		
        
		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  added successfully.');
				redirect(base_url().'product/manage_size');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'product/manage_size');
				
				}//end if($add_cms_page)


	}
	
		public function add_assign_sample(){
		 /*print_r( $this->input->post());
		 
		 exit;*/
		
 $firms=$this->input->post('sub_firm_name');
	 $firms=explode(',',$firms);
	 $subfirm_id=$firms[0];
	 $subfirm_name=$firms[1];
	 $variable=explode(',',$variable);
		 $table_name='assign_sample';
		 $created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		 $ins_data = array(
		 'size_id' => $this->db->escape_str(trim($this->input->post('size_id'))),
		   'firm_name' => $this->db->escape_str(trim($this->input->post('firm_name'))),
		    'sub_firm_name' => $this->db->escape_str(trim($subfirm_name)),
			  'sub_firm_id' => $this->db->escape_str(trim($subfirm_id)),
		   'quantity' => $this->db->escape_str(trim($this->input->post('quantity'))),
		    'project_id' => $this->db->escape_str(trim($this->input->post('project_name'))),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   
		   
		    
		);
      
		 $upd_data=$this->product->add_data($ins_data,$table_name);
		 $this->product->subtractquantity($this->input->post('size_id'),$this->input->post('quantity'));

		//exit;
        
		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  added successfully.');
				redirect(base_url().'product/manage_sample');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'product/manage_sample');
				
				}//end if($add_cms_page)


	}

	public function get_product($id){
		/* print_r( $this->input->post());
		 exit;*///echo $id;exit;
		 $table_name='product';
		 
		  $data['get_product']=$this->product->get_data($id,$table_name);
		  $data['get_model']=$this->product->get_models_data($table_name);
         $table_names='product_sizes';
	$attribute='product_id';
        $data['get_product_size']=$this->product->get_data_attribute($id,$attribute,$table_names);
		 $data['id']=$id;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
//echo "<pre>";print_r( $data['get_catalog']);
//
		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('product/edit_product', $data);


	}
	
	public function get_product_sizes($id){
		/* print_r( $this->input->post());
		 exit;*///echo $id;exit;
		 $table_name='size';

		  $data['get_size']=$this->product->get_table_data($table_name);
         $table_names='product_sizes';
      	$attribute='product_id';
        $data['get_product_size']=$this->product->get_data_attribute($id,$attribute,$table_names);
		  $data['id']=$id;
		  
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
//echo "<pre>";print_r( $data['get_product_size']);
//
		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('product/edit_product_sizes', $data);


	}
	
	public function get_all_product_sizes($id){
		/* print_r( $this->input->post());
		 exit;*///echo $id;exit;
		 $table_name='product';

		  $data['get_product']=$this->product->get_data($id,$table_name);
         $table_names='product_sizes';
      	$attribute='product_id';
        $data['get_product_size']=$this->product->get_data_attribute($id,$attribute,$table_names);
		  $data['id']=$id;
		  
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
//echo "<pre>";print_r( $data['get_catalog']);
//
		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('product/view_product', $data);


	}
	
	public function get_all_sample_detail($id){
		/* print_r( $this->input->post());
		 exit;*///echo $id;exit;
	

		
        $data['get_all_sample_detail']=$this->product->get_all_sample_detail($id);
		 
		  //echo "<pre>";print_r( $data['get_all_sample_detail']);exit;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
//echo "<pre>";print_r( $data['get_catalog']);
//
		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('sample/view_sample', $data);


	}
	
	public function get_product_size($id,$product_id){
		/* print_r( $this->input->post());
		 exit;*///echo $id;exit;
		 $table_name='size';

		  $data['get_size']=$this->product->get_table_data($table_name);
		  $data['update_size']=$this->product->get_data($id,'product_sizes');
         $table_names='product_sizes';
      	$attribute='id';
        $data['get_product_size']=$this->product->get_data_attribute($id,$attribute,$table_names);
		  $data['id']=$id;
		   $data['firm_id']=$product_id;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
//echo "<pre>";print_r( $data['get_catalog']);
//
		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('product/edit_product_size', $data);


	}
	
	
	
	public function get_size($id){
		/* print_r( $this->input->post());
		 exit;*///echo $id;exit;
		 $table_name='size';
		  $data['get_model']=$this->product->get_data($id,$table_name);

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
//echo "<pre>";print_r( $data['get_catalog']);
//
		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('product/edit_size', $data);


	}
	
	
	
	public function edit_product(){
		 /*print_r( $this->input->post());
		 exit;*/
		  $table_name='product';
		 $id=$this->input->post('id');
			
		
		
			$update_data = array(
		   'product_name' => $this->db->escape_str(trim($this->input->post('product_name'))),
		   'brand_name' => $this->db->escape_str(trim($this->input->post('brand_name'))),
		  
			 
		 
		);
		
		  $upd_data=$this->product->edit_data($update_data,$table_name,$id);

		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  Updated successfully.');
				redirect(base_url().'product/manage_product');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not Updated. Something went wrong, please try again.');
					redirect(base_url().'product/manage_product');
				
				}//end if($add_cms_page)

//echo "<pre>";print_r( $data['get_catalog']);
//

		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		//$this->load->view('catalog/edit_catalog', $data);


	}
	
	public function edit_sample_process(){
		/* print_r( $this->input->post());
		 exit;*/
		  $table_name1='assign_sample';
		   $id=$this->input->post('id');
		 $getdata=$this->product->get_data($id,$table_name1);
		     $quantity=$getdata[0]['quantity'];
	         $size_id=$getdata[0]['size_id'];
		if($this->input->post('quantity')>$quantity){
		 $total=$this->input->post('quantity')-$quantity;
		 $this->product->added($total,$size_id);
		
		}
		
		if($this->input->post('quantity')<$quantity){
		
		 $total=$quantity-$this->input->post('quantity');
		
		 $this->product->subtract($total,$size_id);
		
		}
/*echo "<pre>";print_r($getdata);

exit;*/
		 
		  $table_name='assign_sample';
		 
		 $product_id=$this->input->post('product_id');
			
		
		
			$update_data = array(
		   'size_id' => $this->db->escape_str(trim($this->input->post('size_id'))),
		   'firm_name' => $this->db->escape_str(trim($this->input->post('firm_name'))),
		    'sub_firm_name' => $this->db->escape_str(trim($this->input->post('sub_firm_name'))),
		   'quantity' => $this->db->escape_str(trim($this->input->post('quantity'))),
		  
			 
		 
		);
		
		  $upd_data=$this->product->edit_data($update_data,$table_name,$id);

		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  Updated successfully.');
				redirect(base_url().'product/get_all_sample_detail/'.$product_id.'');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not Updated. Something went wrong, please try again.');
					redirect(base_url().'product/get_all_sample_detail/'.$product_id.'');
				
				}//end if($add_cms_page)

//echo "<pre>";print_r( $data['get_catalog']);
//

		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('catalog/edit_catalog', $data);


	}
	
	public function edit_product_size(){
		 /*print_r( $this->input->post());
		 exit;*/
		  $table_name='product_sizes';
	
		$file_name='';
		 $firm_id=$this->input->post('firm_id');
		  $id=$this->input->post('id');
		 if($_FILES['profile_image']['name'] != ''){

			//Create User Directory if not exist
			$folder_path = './assets/product_image/';
	
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
 		
		echo  $user_old_image=$this->input->post('old_image');;
		
		// echo "<pre>";print_r($user_old_image); exit;
		 
		$user_folder_path='./assets/product_image/thumb/';
		
	
	
			//Delete Existing Image
			if(file_exists($user_folder_path.$user_old_image)){
	           
			  // 	echo $user_folder_path.'/'.$user_old_image['image']; exit;
			   			
				unlink($folder_path.$user_old_image);
				unlink($user_folder_path.$user_old_image);
			}	
			
		
		
		 $update_data = array(
		   'product_id' => $this->db->escape_str(trim($id)),
		   'size' => $this->db->escape_str(trim($this->input->post('size'))),
		    'quantity' => $this->db->escape_str(trim($this->input->post('quantity'))),
			 'price' => $this->db->escape_str(trim($this->input->post('price'))),
			'sample_stock_status' => $this->db->escape_str(trim($this->input->post('sample_stock_status'))),
			'stock_status' => $this->db->escape_str(trim($this->input->post('stock_status'))),
			 'image' => $this->db->escape_str(trim($file_name)),	
			 
		 
		);
		
		}
		else{
			
			$update_data = array(
		  'product_id' => $this->db->escape_str(trim($id)),
		   'size' => $this->db->escape_str(trim($this->input->post('size'))),
		    'quantity' => $this->db->escape_str(trim($this->input->post('quantity'))),
			 'price' => $this->db->escape_str(trim($this->input->post('price'))),
			'sample_stock_status' => $this->db->escape_str(trim($this->input->post('sample_stock_status'))),
			'stock_status' => $this->db->escape_str(trim($this->input->post('stock_status'))),
			 
			 
		 
		);
		}
		/*print_r($update_data);
		exit;*/
		  $upd_data=$this->product->edit_data($update_data,$table_name,$firm_id);

		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  Updated successfully.');
				redirect(base_url().'product/get_product_sizes/'.$id.'');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not Updated. Something went wrong, please try again.');
					redirect(base_url().'product/get_product_sizes/'.$id.'');
				
				}//end if($add_cms_page)

//echo "<pre>";print_r( $data['get_catalog']);
//

		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('catalog/edit_catalog', $data);


	}
	
	
	public function edit_size(){
		/* print_r( $this->input->post());
		 exit;*/
		  $table_name='size';
		 $id=$this->input->post('id');
		

		


			$update_data = array(
		  
		   'size' => $this->db->escape_str(trim($this->input->post('size'))),
		   
		  
			 
			 
		 
		);
		
		  $upd_data=$this->product->edit_data($update_data,$table_name,$id);

		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  Updated successfully.');
				redirect(base_url().'product/manage_size');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not Updated. Something went wrong, please try again.');
					redirect(base_url().'product/manage_size');
				
				}//end if($add_cms_page)

//echo "<pre>";print_r( $data['get_catalog']);
//

		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		//$this->load->view('catalog/edit_catalog', $data);


	}

	
	
	
	
		public function delete_data($id)
	{
		$table_name='product';
        $table_name1='product_sizes';
		$upd_data=$this->product->delete_data_product($id,$table_name,$table_name1);
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  deleted successfully.');
				redirect(base_url().'product/manage_product');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not deleted. Something went wrong, please try again.');
					redirect(base_url().'product/manage_product');
				
				}//end if($add_cms_page)
	

	}
	
	public function delete_size($id)
	{
		$table_name='size';

		$upd_data=$this->product->delete_data($id,$table_name);
if($upd_data){
				
				$this->session->set_flashdata('err_message', '- data not deleted. Something went wrong, please try again.');
				redirect(base_url().'product/manage_size');
				
				}else{
					$this->session->set_flashdata('ok_message', '- data  deleted successfully.');
				
					redirect(base_url().'product/manage_size');
				
				}//end if($add_cms_page)
	

	}
	
	
	public function delete_product_sizes($id,$firm_id)
	{
		$table_name='product_sizes';

		$upd_data=$this->product->delete_data($id,$table_name);
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  deleted successfully.');
				redirect(base_url().'product/get_product_sizes/'.$firm_id.'');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not deleted. Something went wrong, please try again.');
					redirect(base_url().'product/get_product_sizes/'.$firm_id.'');
				
				}//end if($add_cms_page)
	

	}
	
	
	public function delete_sample($id,$size_id,$product_id)
	{
	

		$upd_data=$this->product->delete_sample($id,$size_id);
if($upd_data){
				$this->session->set_flashdata('err_message', '- data not deleted. Something went wrong, please try again.');
					redirect(base_url().'product/get_all_sample_detail/'.$product_id.'');
				
				}else{
					
						$this->session->set_flashdata('ok_message', '- data  deleted successfully.');
				redirect(base_url().'product/get_all_sample_detail/'.$product_id.'');
				
				
				}//end if($add_cms_page)
	

	}
	
	public function delete_product_size($id,$firm_id)
	{
		$table_name='product_sizes';

		$upd_data=$this->product->delete_data($id,$table_name);
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  deleted successfully.');
				redirect(base_url().'product/add_sample');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not deleted. Something went wrong, please try again.');
					redirect(base_url().'product/add_sample');
				
				}//end if($add_cms_page)
	

	}
	
	
	public function add_product_dynamic($count){
  $table_name='size';
	
     $data['get_size']=$this->product->get_table_data($table_name);
		//$this->mod_users->add_contractor($this->input->post());
		
		echo $div='
		
		<div class="row form-group stage_div">
		<h2>Add More</h2>
                                              <div class="row form-group">
																		<div id="pack" class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                        <label >Sizes</label>
                                                                        <section id="intro">
                                                                                <select   name="size[]" style="width:425px;height:35px" id="model_sizes'.$count.'" >
                                                                                <option>Select Size</option>';
                                                                                foreach($data['get_size'] as $get){
                                                       echo' <option value="'.$get['size'].'">'.$get['size'].'</option>';
                                                        }
																		echo '		</select>
																			</section>
																		</div>
																		<div class="col-md-6 col-sm-12 col-xs-12">
																			<label>Quantity</label>
																			<input type="text" required="required"  placeholder="Quantity" class="form-control" name="quantity[]">
																		</div>
																	</div>
                                                                    <div class="row form-group">
													
													<div class="col-md-6 col-sm-12 col-xs-12">
														<label>Sample Stock Status</label>
														<input type="text" placeholder="Sample Stock Status" name="sample_stock_status[]" class="form-control">
													</div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
														<label>Stock Status</label>
														<input type="text" placeholder="Stock" name="stock_status[]" class="form-control">
													</div>
												</div>
																	<div class="row form-group">
																		<div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
																			<label>Price</label>
																			<input type="text" required="required"  placeholder="Price" class="form-control" name="price[]">
																		</div>
                                                                        <div class="col-md-6 col-sm-12 col-xs-12">
																			<label>Image</label>
																			<input type="file" required="required"  class="form-control" name="project_files[]">
																		</div>
																		
																	</div>
                                   
                                                                
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <label>Action</label>
                                                <a class="btn btn-danger pull-left stage_cancel">Delete</a>
                                                                </div>
                                                            </div>
															</div>
                                                        
		';

		

	}
	
	
}