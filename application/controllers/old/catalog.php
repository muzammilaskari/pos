<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class catalog extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_catalog','catalog');

	$this->load->model('mod_project','project');
		
	    $this->load->library('pagination');

				if($this->session->userdata('user_id') != TRUE){

		 		redirect(SURL);
		
		 }
	}
	
	
	public function search_catalog(){
$table_name='catalog';
$searching='company_name';
		$data['get_stories']=$this->catalog->search_catalog($this->input->post(),$table_name,$searching);
//print_r($data['get_stories']);exit;
		$div=' <table class="table table-bordered table-striped table-hover">

											 <thead>
        <tr>
            <th>Company</th>
														<th>Catalog Name</th>
														<th>Description</th>
														<th>Action</th>
        </tr>
    </thead>
    <tbody>
											';
                                               if(!empty($data['get_stories'])){

													
                                                    
  foreach($data['get_stories'] as $stories){ 
$div.='<tr>';
                                                      
                                                
                                                        $div.='
                                                        <td >'.$stories['company_name'].'</td>
                                                        <td>'.$stories['catalog_name'].'</td>
														
														<td >'.$stories['description'].'</td>
                                                        <td >';
														if($this->session->userdata('user_type')==1)
{ $div.='
                                                        	<a class="btn btn-default" href="'.SURL.'catalog/get_catalog/'.$stories['id'].'"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a>';}
															if($this->session->userdata('user_type')==1)
{ $div.='
															
                                                        	<a class="btn btn-danger"  onclick="return confirm("Are you sure you want to delete this item?");" href="'.SURL.'catalog/delete_catalog/'.$stories['id'].'"><i class="fa fa-trash" aria-hidden="true" title="delete the data"></i></a>';}
															

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
	
	
	public function search_assign_catalog(){
$table_name='assign_catalog';
$searching='catalog_name';
			$data['get_stories']=$this->catalog->search_catalog($this->input->post(),$table_name,$searching);
//print_r($data['get_stories']);exit;
		$div=' <table class="table table-bordered table-striped table-hover">

											 <thead>
        <tr>
           <th>Category</th>
														<th>Firm Name</th>
														<th>Catalog</th>
                                                        <th>Assigning Date</th>
														<th>Action</th>
        </tr>
    </thead>
    <tbody>
											';
                                               if(!empty($data['get_stories'])){

													
                                                    
  foreach($data['get_stories'] as $stories){ 
$div.='<tr>';
                                                      
                                                
                                                        $div.='
                                                        <td >'.$stories['firm_name'].'</td>
                                                        <td >'.$stories['sub_firm_name'].'</td>
														
														<td >'.$stories['catalog_name'].'</td>
														<td >'.$stories['created_date'].'</td>
                                                        <td >';
														if($this->session->userdata('user_type')==1)
{ $div.='
														
                                                        	<a class="btn btn-default" href="'.SURL.'catalog/get_assign_catalog/'.$stories['id'].'"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a>';}
															if($this->session->userdata('user_type')==1)
{ $div.='
															
                                                        	<a class="btn btn-danger"  onclick="return confirm("Are you sure you want to delete this item?");" href="'.SURL.'catalog/delete_assign_catalog/'.$stories['id'].'"><i class="fa fa-trash" aria-hidden="true" title="delete the data"></i></a>';}
															
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
	
	
	public function add_catalog(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('catalog/add_catalog', $data);


	}
	
	
	
	public function get_firms(){
 $firm_name=$_GET['id'];
//exit;
		
		$data['get'] = $this->catalog->get_firms($firm_name);
		$div='
		<label>Sub Firms</label>
		 <section id="intro">
														<select name="sub_firm_name" id="sub_firm_name">
                                                        
                                                       
                                                       
		<option value="None">Select Sub Firms</option>';
		foreach($data['get'] as $get){
        $div.=' <option value='.$get['id'].','.str_replace(' ','-',$get['firm_name']).'>'.$get['firm_name'].'</option>';
		}
		$div.='</select>
		</section>
		';
		echo $div;
		//$this->load->view('catalog/add_catalog', $data);


	}
	
	
	public function get_firm(){
 $firm_name=$_GET['id'];
//exit;
		
		$data['get'] = $this->catalog->get_firms($firm_name);
		$div='
		<label>Sub Firms</label>
		 <section id="intro">
														<select name="sub_firm_name" id="sub_firm_name">
                                                        
                                                       
                                                       
		<option value="0">Select Sub Firms</option>';
		foreach($data['get'] as $get){
        $div.=' <option value='.$get['id'].'>'.$get['firm_name'].'</option>';
		}
		$div.='</select>
		</section>
		';
		echo $div;
		//$this->load->view('catalog/add_catalog', $data);


	}
	
	public function add_assign(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
$firm_name='project';
         $data['all_project'] = $this->project->get_table_data($firm_name);
		
		$data['get_catalogs'] = $this->catalog->get_catalogs();
        
		$this->load->view('assign_catalog/add_assign', $data);


	}
	
	
	public function manage_catalog($variant=0){
		$table_name='catalog';
		$catalog = $this->catalog->num_catalog($table_name);
	//print_r($catalog);exit;
		$config["base_url"] = base_url() . "catalog/manage_catalog/";
		$config['total_rows'] = $catalog;
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
	
		$data['catalog'] = $this->catalog->get_all_catalog($table_name,$config['per_page'], $variant);
		

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		


		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('catalog/manage_catalog', $data);


	}
	
	public function manage_view_catalog($catalog_id,$variant=0){
		
		$table_name='assign_catalog';
		$catalog = $this->catalog->num_catalog($table_name);
	/*print_r($variant);exit;*/
		$config["base_url"] = base_url() . "catalog/manage_view_catalog/".$catalog_id."";
		$config['total_rows'] = $catalog;
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
	
		$data['catalog'] = $this->catalog->manage_view_catalog($table_name,$config['per_page'],$variant,$catalog_id);
		

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		


		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('catalog/view_catalog', $data);


	}
	
	public function manage_assign_catalog($variant=0){
		$table_name='assign_catalog';
		$catalog = $this->catalog->num_catalog($table_name);
	//print_r($catalog);exit;
		$config["base_url"] = base_url() . "catalog/manage_assign_catalog/";
		$config['total_rows'] = $catalog;
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
	
		$data['catalog'] = $this->catalog->get_all_catalog($table_name,$config['per_page'], $variant);
		

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		


		
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('assign_catalog/manage_assign_catalog', $data);


	}
	
	
	public function add_catalog_process(){
		/* print_r( $this->input->post());
		 exit;*/
		 $upd_data=$this->catalog->add_catalog($this->input->post());

		
        
		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  added successfully.');
				redirect(base_url().'catalog/manage_catalog');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'catalog/manage_catalog');
				
				}//end if($add_cms_page)


	}
	
	public function add_assign_process(){
		/*print_r( $this->input->post());
		 exit;*/
		 $get_data=$this->project->get_data_attribute($this->input->post('sub_firm_name'),'sub_firm_name','assign_catalog');
		 if(empty($get_data)){
		 $upd_data=$this->catalog->add_assign_process($this->input->post());

		 
        
		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  added successfully.');
				redirect(base_url().'catalog/manage_assign_catalog');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'catalog/manage_assign_catalog');
				
				}//end if($add_cms_page)
}else{
		$this->session->set_flashdata('err_message', '- data not added. This Catalog Is already Assign To This Firm.');
					redirect(base_url().'catalog/add_assign');
		 }

	}
	
	public function get_catalog($id){
		/* print_r( $this->input->post());
		 exit;*/
		 $table_name='catalog';
		  $data['get_catalog']=$this->catalog->get_catalog($id,$table_name);

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
//echo "<pre>";print_r( $data['get_catalog']);
//
		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('catalog/edit_catalog', $data);


	}
	
	public function get_assign_catalog($id){
		/* print_r( $this->input->post());
		 exit;*/
		 $table_name='assign_catalog';
		  $data['get_catalog']=$this->catalog->get_catalog($id,$table_name);

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
		$data['get_catalogs'] = $this->catalog->get_catalogs();
//echo "<pre>";print_r( $data['get_catalog']);
//
		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('assign_catalog/edit_assign_catalog', $data);


	}
	
	public function edit_catalog(){
/*		 print_r( $this->input->post());
		 exit;*/
		 $table_name='catalog';
		 $id=$this->input->post('id');
		 $update_data = array(
		   'company_name' => $this->db->escape_str(trim($this->input->post('company_name'))),
		   'catalog_name' => $this->db->escape_str(trim($this->input->post('catalog_name'))),
		   'description' => $this->db->escape_str(trim($this->input->post('description'))),
		 
		);
		  $upd_data=$this->catalog->edit_catalog($update_data,$table_name,$id);

		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  Updated successfully.');
				redirect(base_url().'catalog/manage_catalog');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not Updated. Something went wrong, please try again.');
					redirect(base_url().'catalog/manage_catalog');
				
				}//end if($add_cms_page)

//echo "<pre>";print_r( $data['get_catalog']);
//

		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('catalog/edit_catalog', $data);


	}
	
	public function edit_assign_catalog(){
/*		 print_r( $this->input->post());
		 exit;*/
		 $table_name='assign_catalog';
		 $id=$this->input->post('id');
		 $variable=$this->input->post('catalog_name');
$variable=explode(',',$variable);
 $catalog_company=$variable[1];
 $catalog_name=$variable[0];
		 $update_data = array(
		   'firm_name' => $this->db->escape_str(trim($this->input->post('firm_name'))),
		   'sub_firm_name' => $this->db->escape_str(trim($this->input->post('sub_firm_name'))),
		   'catalog_name' => $this->db->escape_str(trim($catalog_name)),
		    'catalog_company' => $this->db->escape_str(trim($catalog_company)),
		   
		   
		    
		);
		  $upd_data=$this->catalog->edit_catalog($update_data,$table_name,$id);

		if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  Updated successfully.');
				redirect(base_url().'catalog/manage_assign_catalog');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not Updated. Something went wrong, please try again.');
					redirect(base_url().'catalog/manage_assign_catalog');
				
				}//end if($add_cms_page)

//echo "<pre>";print_r( $data['get_catalog']);
//

		//exit;
		//$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('catalog/edit_catalog', $data);


	}
	
	
		public function delete_catalog($id)
	{
		$table_name='catalog';

		$upd_data=$this->catalog->delete_catalog($id,$table_name);
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  deleted successfully.');
				redirect(base_url().'catalog/manage_catalog');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not deleted. Something went wrong, please try again.');
					redirect(base_url().'catalog/manage_catalog');
				
				}//end if($add_cms_page)
	

	}
	
	public function delete_assign_catalog($id)
	{
		$table_name='assign_catalog';

		$upd_data=$this->catalog->delete_catalog($id,$table_name);
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- data  deleted successfully.');
				redirect(base_url().'catalog/manage_assign_catalog');
				
				}else{
				$this->session->set_flashdata('err_message', '- data not deleted. Something went wrong, please try again.');
					redirect(base_url().'catalog/manage_assign_catalog');
				
				}//end if($add_cms_page)
	

	}
}