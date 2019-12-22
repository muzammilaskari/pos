<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class project extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_project','project');

	
	    $this->load->library('pagination');

				if($this->session->userdata('user_id') != TRUE){

		 		redirect(SURL);
		
		 }
	}
	
	
	
	
	

	
	
	public function add_project($variant=0){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
		$table_name='project';
		$product = $this->project->num_rows($table_name);
	//print_r($catalog);exit;
		$config["base_url"] = base_url() . "project/add_project/";
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
	
		$data['project'] = $this->project->get_all_data($table_name,$config['per_page'], $variant);
		
         
		  $firm_name='owner';
         $data['get'] = $this->project->get_firm($firm_name);
		  $data['gets'] = $this->project->get_firm($firm_name);
		// echo "<pre>"; print_r($data['gets']);exit;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		


		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		//$this->load->view('product/manage_size', $data);
		$this->load->view('project/add_project', $data);


	}
	
	public function manage_project($variant=0){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
		$table_name='project';
		$product = $this->project->num_rows($table_name);
	//print_r($catalog);exit;
		$config["base_url"] = base_url() . "project/manage_project/";
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
	
		$data['project'] = $this->project->get_all_data($table_name,$config['per_page'], $variant);
		
         
		/*  $firm_name='owner';
         $data['get'] = $this->project->get_firm($firm_name);
		  $data['gets'] = $this->project->get_firm($firm_name);*/
		 // print_r($data['get']);exit;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		


		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		//$this->load->view('product/manage_size', $data);
		$this->load->view('project/manage_project', $data);



	}
	
	
	public function assign_project(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

 $firm_name='project';
         $data['all_project'] = $this->project->get_table_data($firm_name);
		 
		 $table_name='catalog';
         $data['all_catalog'] = $this->project->get_table_data($table_name);
		 
		 $table_name1='product';
         $data['all_product'] = $this->project->get_table_data($table_name1);
		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('project/assign_project', $data);


	}
	
	
	public function detail_project(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

/* $firm_name='project';
         $data['all_project'] = $this->project->get_table_data($firm_name);
		 
		 $table_name='catalog';
         $data['all_catalog'] = $this->project->get_table_data($table_name);
		 
		 $table_name1='product';
         $data['all_product'] = $this->project->get_table_data($table_name1);
		*/
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('project/detail_project', $data);


	}
	
	
	public function assign_project_firm(){
//print_r($this->input->post());exit;


if($project_id=$this->input->post('project_id')=='1'){
echo '<div class="alert alert-danger"><center>Please Select Project First<center></div>';

 

}
else{
	
  $project_id=$this->input->post('project_id');
 $sub_firm_name=$this->input->post('sub_firm_name');
 $firm_name=$this->input->post('firm_name');
 $get_data=$this->project->get_data_attributes($project_id,'project_id',$sub_firm_name,'sub_firm_name','assign_project');
if(empty($get_data)){
        $created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();

		$table_name='assign_project';
	
	$datas=array(
	   'project_id' => $this->db->escape_str(trim($this->input->post('project_id'))),
		'main_firm_name' => $this->db->escape_str(trim($this->input->post('firm_name'))),
		'sub_firm_name' => $this->db->escape_str(trim($this->input->post('sub_firm_name'))),
		'created_date'=>$this->db->escape_str(trim($created_date)),
	    'ip_address'=>$this->db->escape_str(trim($ip_address)),
	);
		
		
	/*print_r($datas);
	exit;
        */
		
	$upd_data=$this->project->add_data($datas,$table_name);
		
//echo "asdSA";exit;
		
        
		if($upd_data){
				
			echo '<div class="alert alert-success alert-dismissable"><center>Firm Added Successfully<center></div>';
				
				}else{
			echo '<div class="alert alert-danger"><center>Firm Not Added Successfully<center></div>';
				
				}//end if($add_cms_page)


}else{
	echo '<div class="alert alert-danger"><center>Data Already Add In The Data Base<center></div>';
	
}
}
	}
	

	public function assign_project_catalog(){
//print_r($this->input->post());exit;


if($project_id=$this->input->post('project_id')=='1'){
echo '<div class="alert alert-danger"><center>Please Select Project First<center></div>';

 

}
else{
	
   $project_id=$this->input->post('project_id');
/* $sub_firm_name=$this->input->post('sub_firm_name');
 $firm_name=$this->input->post('firm_name');*/
  $catalog_name=$this->input->post('catalog_name');
/* $product_name=$this->input->post('product_name');
 $sizes=$this->input->post('sizes');
 $quantity=$this->input->post('quantity');*/
/*if($product_name==''){
$this->project->added($quantity,$sizes);
}*/
$catalog=explode(',',$catalog_name);
 $catalog_id=$catalog[0];
 $catalog_name=$catalog[1];
 $get_data=$this->project->get_data_attributes($project_id,'project_id',$catalog_id,'catalog_id','assign_catalog');
if(empty($get_data)){

$owner=$this->project->get_data($project_id,'project');
 $owner_id=$owner[0]['owner_name'];
 
        $created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();

		

	$datas=array(
	   'firm_name' => 'owner',
		/*'main_firm_name' => $this->db->escape_str(trim($this->input->post('firm_name'))),
		'sub_firm_name' => $this->db->escape_str(trim($this->input->post('sub_firm_name'))),*/
		'sub_firm_name' => $this->db->escape_str(trim($owner_id)),
		'catalog_id' => $this->db->escape_str(trim($catalog_id)),
		'catalog_name' => $this->db->escape_str(trim($catalog_name)),
		'project_id' => $this->db->escape_str(trim($this->input->post('project_id'))),
		'created_date'=>$this->db->escape_str(trim($created_date)),
	    'ip_address'=>$this->db->escape_str(trim($ip_address)),
	);
		
	
		
	/*print_r($datas);
	exit;
        */
		
	$upd_data=$this->project->add_data($datas,'assign_catalog');
		
//echo "asdSA";exit;
		
        
		if($upd_data){
			
			echo '<div class="alert alert-success alert-dismissable"><center>Catalog Added Successfully<center></div>';
				
				}else{
			echo '<div class="alert alert-danger"><center>Catalog Not Added Successfully<center></div>';
				
				}//end if($add_cms_page)
}else{
	echo '<div class="alert alert-danger"><center>Data Already Add In The Data Base<center></div>';
}

}

	}
	
		public function get_catalog(){
			//echo "asd";exit;
			
	 	$project_id=$this->input->post('project_name');
		$catalog=$this->project->get_data_attribute($project_id,'project_id','assign_catalog');
	//	print_r($catalog);
		$count=1;
		foreach($catalog as $get){
			
		echo '<p>'.$count.':-   <strong>'.$get['catalog_name'].'</strong></p>';
		$count++;
		}
		
		}
		
		
		public function get_sample_name(){
		//echo $var++;
	    $variable=array();
	 	 $project_id=$this->input->post('project_name');
		$sample=$this->project->get_data_of_sample($project_id,'assign_sample');
		//echo "<pre>";print_r($sample);exit;
		$count=1;
		foreach($sample as $k=>$get){
			 $id=$get['size_id'];
			$samples=$this->project->get_data_of_sizes($id);
			//echo "<pre>";print_r($samples);
	            $variable[$k]['product_name']=$samples[0]['product_name'];
				$variable[$k]['size']=$samples[0]['size'];
			}
			//echo "<pre>";print_r($variable);
		//exit;
			$counts=count($variable);
			
		//	for($i=0;$i<$counts;$i++){
		foreach($variable as $k=>$get2){
			//echo "<pre>";print_r($get2);exit;
		echo '<p>'.$count.':-   <strong>'.$get2['product_name'].'('.$get2['size'].')</strong></p>';
		$count++;
		}
		//	}
		
		}
		
		public function get_firm_name(){
		
			$variable=array();
	  	$project_id=$this->input->post('project_name');
		$firm=$this->project->get_data_attribute($project_id,'project_id','assign_project');
		//print_r($firm);
		$extra=0;
		foreach($firm as $k=>$get){
			 $firm_id=$get['sub_firm_name'];
			if($firm_id!='None'){
				 $firm_id;
	$variable[$extra]=$this->project->get_data_attribute($firm_id,'id','companies');
	$extra++;
			}
		}
	//echo "<pre>";print_r($variable);exit;
		$count=1;
		$counts=count($variable);
		for($i=0;$i<$counts;$i++){
		foreach($variable[$i] as $get2){
			
		echo '<p>'.$count.':-   <strong>'.$get2['type'].'('.$get2['firm_name'].')</strong></p>';
		$count++;
		}
		}
		}
	
	public function assign_project_product(){
//print_r($this->input->post());exit;


if($project_id=$this->input->post('project_id')=='1'){
echo '<div class="alert alert-danger"><center>Please Select Project First<center></div>';

 

}
else{
	
  $project_id=$this->input->post('project_id');
/* $sub_firm_name=$this->input->post('sub_firm_name');
 $firm_name=$this->input->post('firm_name');*/
 // $catalog_name=$this->input->post('catalog_name');
 $product_name=$this->input->post('product_name');
 $sizes=$this->input->post('sizes');
 $quantity=$this->input->post('quantity');
 $get_data=$this->project->get_data_attributes($project_id,'project_id',$sizes,'size_id','assign_sample');
if(empty($get_data)){
	     
	$owner=$this->project->get_data($project_id,'project');
 $owner_id=$owner[0]['owner_name'];
       
	$all_data=$this->project->get_data_attribute($sizes,'id','product_sizes');
		 $sample_stock=$all_data[0]['sample_stock_status'];
		
		 $variable=$sample_stock-$quantity;
	//	echo $variable=explode('-',$variable);
		//echo $variable=$variable[0];exit;
		if(preg_match('/-/',$variable)){
		echo '<div class="alert alert-danger"><center>Stock Quantity is less than the value you enter please enter the value less then '.$sample_stock.'<center></div>';
		}else{
if($product_name!=''){
	
$this->project->added($quantity,$sizes);
}


        $created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();

	

	$datas=array(
	   'size_id' => $this->db->escape_str(trim($this->input->post('sizes'))),
		/*'main_firm_name' => $this->db->escape_str(trim($this->input->post('firm_name'))),
		'sub_firm_name' => $this->db->escape_str(trim($this->input->post('sub_firm_name'))),*/
		//'catalog_id' => $this->db->escape_str(trim($this->input->post('catalog_name'))),
		'firm_name' => 'owner',
		'sub_firm_name' => $this->db->escape_str($owner_id),
		'quantity' => $this->db->escape_str(trim($this->input->post('quantity'))),
		'project_id' => $this->db->escape_str(trim($this->input->post('project_id'))),
		'created_date'=>$this->db->escape_str(trim($created_date)),
	    'ip_address'=>$this->db->escape_str(trim($ip_address)),
	);
		
	
		
	/*print_r($datas);
	exit;
        */
		
	$upd_data=$this->project->add_data($datas,'assign_sample');
		
//echo "asdSA";exit;
		
        
		if($upd_data){
				
			echo '<div class="alert alert-success alert-dismissable"><center>Sample Added Successfully<center></div>';
				
				}else{
			echo '<div class="alert alert-danger"><center>Sample Not Added Successfully<center></div>';
				
				}//end if($add_cms_page)
		
		
		}

		}else{
			echo '<div class="alert alert-danger"><center>Data Already Add In The Data Base<center></div>';
		}
}

	}
	
	
	public function edit_project(){
//print_r($this->input->post());exit;

$id=$this->input->post('id');
		$table_name='project';
	$datas=array(
	   'project_name' => $this->db->escape_str(trim($this->input->post('project_name'))),
		'owner_name' => $this->db->escape_str(trim($this->input->post('sub_firm_name'))),
	);
        
	$upd_data=$this->project->edit_data($datas,$table_name,$id);
		

		
        
		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  Updated successfully.');
				redirect(base_url().'project/add_project');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not Updated. Something went wrong, please try again.');
					redirect(base_url().'project/add_project');
				
				}//end if($add_cms_page)



	}
	
	
	
	
	public function check_quantity(){
//print_r($this->input->post());exit;

$quantity=$this->input->post('quantity');
$sizes=$this->input->post('sizes');
		$table_name='product_sizes';
	
        
	$all_data=$this->project->get_data_attribute($sizes,'id',$table_name);
		 $sample_stock=$all_data[0]['sample_stock_status'];
		
		 $variable=$sample_stock-$quantity;
	//	echo $variable=explode('-',$variable);
		//echo $variable=$variable[0];exit;
		if(preg_match('/-/',$variable)){
		echo '<div class="alert alert-danger"><center>Stock Quantity is less than the value you enter please enter the value less then '.$sample_stock.'<center></div>';
		}

		
        
		



	}
	
	

	

	
	
	
	
	
	
	
	public function add_project_process(){
		 /*print_r( $this->input->post());
		 
		 exit;*/
	
	
		 $table_name='project';
		 $created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		
		 $ins_data = array(
		   'project_name' => $this->db->escape_str(trim($this->input->post('project_name'))),
		   'owner_name' => $this->db->escape_str(trim($this->input->post('sub_firm_name'))),
		   'ip_address' => $this->db->escape_str(trim($ip_address)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   
		    
		);
		
		
		 $upd_data=$this->project->add_data($ins_data,$table_name);
		

		
        
		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  added successfully.');
				redirect(base_url().'project/add_project');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'project/add_project');
				
				}//end if($add_cms_page)


	}
	
	public function get_firm(){
		
 $firm_name=$_GET['id'];

		
		$data['get'] = $this->project->get_firm($firm_name);
		$div='
		<label>Owner Firms</label>
		  <section id="intro">
														<select name="sub_firm_name" id="sub_firm_name">
                                                        
                                                       
                                                       
		<option>Select Firms</option>';
		foreach($data['get'] as $get){
        $div.=' <option value='.$get['firm_name'].'>'.$get['firm_name'].'</option>';
		}
		$div.='</select>
		</section>
		';
		echo $div;
		//$this->load->view('catalog/add_catalog', $data);


	}
	
	

	
	public function delete_project($id){
		 /*print_r( $this->input->post());
		 
		 exit;*/
	
	
		
		$table_name='project';
		 $upd_data=$this->project->delete_data($id,$table_name);
		

		
        
		if($upd_data){
				
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'project/add_project');
				
				}else{
				
					
						$this->session->set_flashdata('ok_message', '- data  added successfully.');
				redirect(base_url().'project/add_project');
				
				}//end if($add_cms_page)


	}
	
	
	
	
}