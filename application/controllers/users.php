<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_users');

	
		
	    $this->load->library('pagination');

				if($this->session->userdata('user_id') != TRUE){

		 		redirect(SURL);
		
		 }
	}
       //manage user function starts here 
	public function manage_users($variant=0){
	//echo "asd";exit;
		$users = $this->mod_users->num_users();
		//print_r($users);
		$config["base_url"] = base_url() . "users/manage_users/";
		$config['total_rows'] = $users;
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
	
		$data['users'] = $this->mod_users->get_users($config['per_page'], $variant);
		

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
		


		$this->load->view('users/manage_users', $data);

	}// mange user function ends  here 
	
	
	public function manage_interior($variant=0){
		//echo "asd";exit;
		$interior = $this->mod_users->num_interior();
		
		$config["base_url"] = base_url() . "users/manage_interior/";
		$config['total_rows'] = $interior;
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
	
		$data['interior'] = $this->mod_users->get_all_interior($config['per_page'], $variant);
		
//print_r($data['interior']);
//exit;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
		


		$this->load->view('interior_designe/manage_interior', $data);

	}// mange user function ends  here 

public function manage_contractor($variant=0){
		//echo "asd";exit;
		$interior = $this->mod_users->num_contractor();
		
		$config["base_url"] = base_url() . "users/manage_contractor/";
		$config['total_rows'] = $interior;
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
	
		$data['interior'] = $this->mod_users->get_all_contractor($config['per_page'], $variant);
		
//print_r($data['interior']);
//exit;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
		


		$this->load->view('main_contractor/manage_contractor', $data);

	}// mange user function ends  here 
	
	public function manage_owner($variant=0){
		//echo "asd";exit;
		$type="owner";
		$interior = $this->mod_users->num_owner($type);
		
		$config["base_url"] = base_url() . "owner/manage_owner/";
		$config['total_rows'] = $interior;
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
	
		$data['interior'] = $this->mod_users->get_all_owner($config['per_page'], $variant,$type);
		
//print_r($data['interior']);
//exit;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
		


		$this->load->view('owner/manage_owner', $data);

	}// mange user function ends  here 
	
	
	public function manage_supplier($variant=0){
		//echo "asd";exit;
		$type="supplier";
		$interior = $this->mod_users->num_owner($type);
		
		$config["base_url"] = base_url() . "supplier/manage_owner/";
		$config['total_rows'] = $interior;
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
	
		$data['interior'] = $this->mod_users->get_all_owner($config['per_page'], $variant,$type);
		
//print_r($data['interior']);
//exit;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
		


		$this->load->view('supplier/manage_supplier', $data);

	}// mange user function ends  here 
	
	
	public function manage_subcontractor($variant=0){
		//echo "asd";exit;
		$interior = $this->mod_users->num_subcontractor();
		
		$config["base_url"] = base_url() . "users/manage_subcontractor/";
		$config['total_rows'] = $interior;
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
	
		$data['interior'] = $this->mod_users->get_all_subcontractor($config['per_page'], $variant);
		
//print_r($data['interior']);
//exit;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
		


		$this->load->view('sub_contractor/manage_contractor', $data);

	}// mange user function ends  here 


	public function add_user(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('users/add_user', $data);


	}
	
	
	public function add_subcontractor(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('sub_contractor/add_contractor', $data);


	}
	
	public function add_contractor(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('main_contractor/add_contractor', $data);


	}
	
	public function change_password(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		$this->load->view('users/change_password', $data);


	}
	
	public function update_password(){
/*print_r($this->input->post());
exit;*/
		$upd_data=$this->mod_users->update_password();
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Password  Updated successfully.');
				redirect(base_url().'users/change_password');
				
				}else{
				$this->session->set_flashdata('err_message', '- Password not Updated. Something went wrong, please try again.');
					redirect(base_url().'users/change_password');
				
				}//end if($add_cms_page)




	}
	
	public function add_owner(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		$data['sub_users'] = $this->mod_users->sub_users();
        
		$this->load->view('owner/add_owner', $data);


	}
	
	
	
	
	public function add_interior(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		$data['sub_users'] = $this->mod_users->sub_users();

		$this->load->view('interior_designe/add_interior', $data);

	}
	
	public function add_supplier(){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		$data['sub_users'] = $this->mod_users->sub_users();

		$this->load->view('supplier/add_supplier', $data);

	}
	
	public function edit_manage_interior($id){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		$data['interior'] = $this->mod_users->edit_manage_interior($id);
//echo "<pre>";print_r($data['interior']);exit;
		$this->load->view('interior_designe/edit_manage_interior', $data);

	}
	
	public function edit_manage_contractor($id){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		$data['interior'] = $this->mod_users->edit_manage_interior($id);
//echo "<pre>";print_r($data['interior']);exit;
		$this->load->view('main_contractor/edit_manage_contractor', $data);

	}
	
		public function edit_manage_owner($id){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		$data['interior'] = $this->mod_users->edit_manage_interior($id);
//echo "<pre>";print_r($data['interior']);exit;
		$this->load->view('owner/edit_manage_owner', $data);

	}
	
	public function edit_manage_supplier($id){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		$data['interior'] = $this->mod_users->edit_manage_interior($id);
//echo "<pre>";print_r($data['interior']);exit;
		$this->load->view('supplier/edit_manage_supplier', $data);

	}
	
	public function edit_manage_subcontractor($id){

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);


		
		$data['interior'] = $this->mod_users->edit_manage_interior($id);
//echo "<pre>";print_r($data['interior']);exit;
		$this->load->view('sub_contractor/edit_manage_subcontractor', $data);

	}
	
	

	
	//add user process
	public function add_user_process(){

		$this->mod_users->add_user($this->input->post());

		redirect(SURL.'users/manage_users');

	}//add user process function ends here
	
	public function add_interior_design_process(){

//print_r($this->input->post('firm_name'));
		
if($this->input->post('firm_type')=='Firm'){
	$data['contact']=$this->mod_users->add_interior_con($this->input->post());
     
		
	
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
$this->load->view('interior_designe/add_contact', $data);
}
elseif($this->input->post('firm_type')=='Individual'){
	$type='interior designe';
	$upd_data=$this->mod_users->add_interior($this->input->post(),$type);
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Data Added successfully.');
				redirect(base_url().'users/manage_interior');
				
				}else{
				$this->session->set_flashdata('err_message', '- Data not Added. Something went wrong, please try again.');
					redirect(base_url().'users/manage_interior');
				
				}//end if($add_cms_page)

}
	}
	
	public function add_contacts($id){

		$data['contact']=$this->mod_users->get_all_contacts($id);
		//echo "<pre>";print_r($data['contact']);exit;
		if(!empty($data['contact'])){
			//echo "<pre>";print_r($data['contact']);exit;
		
		$data['id']=$id;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('interior_designe/edit_contact', $data);
		}
		else{
			//echo $id;
			$data['contact']=$this->mod_users->get_comp($id);
			//echo "<pre>";print_r($data['contact']);exit;
			$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('interior_designe/add_contact', $data);
		}
		
	}
	
	public function add_contact_main($id){

		$data['contact']=$this->mod_users->get_all_contacts($id);
		//echo "<pre>";print_r($data['contact']);exit;
		$data['id']=$id;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('main_contractor/edit_contact', $data);
	
	}
	
	public function add_supplier_contacts($id){

		$data['contact']=$this->mod_users->get_all_contacts($id);
		//echo "<pre>";print_r($data['contact']);exit;
		$data['id']=$id;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('supplier/edit_contact', $data);
	
	}
	
	public function add_subcontact($id){

		$data['contact']=$this->mod_users->get_all_contacts($id);
		//echo "<pre>";print_r($data['contact']);exit;
		$data['id']=$id;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('sub_contractor/edit_contact', $data);
	
	}
	
	public function add_owners($id){

		$data['contact']=$this->mod_users->get_all_contacts($id);
		//echo "<pre>";print_r($data['contact']);exit;
		$data['id']=$id;
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('owner/edit_contact', $data);
	
	}
	
	
	
	public function edit_owner_contacts($id){


		$data['contact']=$this->mod_users->get_all_contacts_id($id);
		//echo "<pre>";print_r($data['contact']);exit;
		
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('owner/manage_contact', $data);
	
	}
	
	public function edit_contacts($id){


		$data['contact']=$this->mod_users->get_all_contacts_id($id);
		//echo "<pre>";print_r($data['contact']);exit;
		
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('interior_designe/manage_contact', $data);
	
	}
	
		public function edit_contacts_main($id){


		$data['contact']=$this->mod_users->get_all_contacts_id($id);
		//echo "<pre>";print_r($data['contact']);exit;
		
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('main_contractor/manage_contact', $data);
	
	}
	
	public function edit_contacts_supplier($id){


		$data['contact']=$this->mod_users->get_all_contacts_id($id);
		//echo "<pre>";print_r($data['contact']);exit;
		
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('supplier/manage_contact', $data);
	
	}
	
	public function edit_contacts_owner($id){


		$data['contact']=$this->mod_users->get_all_contacts_id($id);
		//echo "<pre>";print_r($data['contact']);exit;
		
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('owner/manage_contact', $data);
	
	}
	
	
	
	public function edit_contacts_sub($id){


		$data['contact']=$this->mod_users->get_all_contacts_id($id);
		//echo "<pre>";print_r($data['contact']);exit;
		
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('sub_contractor/manage_contact', $data);
	
	}
	
	public function view_contact_detail($id){


		$data['contact']=$this->mod_users->get_all_contacts_id($id);
		//echo "<pre>";print_r($data['contact']);exit;
		
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

$this->load->view('interior_designe/view_contact_detail', $data);
	
	}
	
	
	
	public function add_contractor_process(){
		
if($this->input->post('firm_type')=='Firm'){
	//print_r($this->input->post('firm_type'));exit;
		$data['contact']=$this->mod_users->add_contractor($this->input->post());
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		$this->load->view('main_contractor/add_contact', $data);
}
elseif($this->input->post('firm_type')=='Individual'){
	$type='main contractor';
	$upd_data=$this->mod_users->add_interior($this->input->post(),$type);
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Data updated successfully.');
				redirect(base_url().'users/manage_contractor');
				
				}else{
				$this->session->set_flashdata('err_message', '- Data not updated. Something went wrong, please try again.');
					redirect(base_url().'users/manage_contractor');
				
				}//end if($add_cms_page)

}

	}//add user process function ends here
	
	
	public function add_note(){
	$data=array(
	   'note' => $this->db->escape_str(trim($this->input->post('note'))),
	);	

$id=$this->input->post('id');
$table_name=$this->input->post('table_name');
	$upd_data=$this->mod_users->add_note($data,$id,$table_name);
	if($upd_data){
				
			echo ' <div class="alert alert-success alert-dismissable"><center>Data Added Successfully</center></div>';
				
				}else{
				echo '  <div class="alert alert-danger"><center>Data Not Added Successfully</center></div>';
				
				}//end if($add_cms_page)



	}
	
	
	public function add_contacts_dynamic(){
		//$this->mod_users->add_contractor($this->input->post());
		
		echo $div='
		 
		<div class="row form-group stage_div">
		
		<h2>Add More Contacts</h2>
                                                                <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
																   <label>Employee Name</label>
                                                                    <input type="text" id="employee_name" name="employee_name[]" placeholder="Customer" class="form-control">
                                                                     <label>Email Address</label>
                        <input type="email" placeholder="Email" required id="email_address" name="email_address[]" class="form-control">
						
                                                                    <label>Action</label>
                                                <a class="btn btn-danger pull-left stage_cancel">Delete</a>
                                                                
                                                                </div>
																
                                                              <!--  <div class="col-md-6 col-sm-12 col-xs-12">
                                                                 <label>Street</label>
                        <input type="text" placeholder="Street" required id="street" name="street[]" class="form-control">
                                                                     
                                                                </div>-->
																
                                                                  
                                                             
                                                               <!-- <div class="col-md-6 col-sm-12 col-xs-12 contact_field_margin">
                                                                   <label>Second Street</label>
                        <input type="text" placeholder="Second Street" name="second_street[]" id="second_street" class="form-control">
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <label>Country</label>
                        <input type="text" placeholder="Country" name="country[]" id="country" class="form-control">
                                                                </div>
                                                            
                                                                
                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <label>City</label>
                        <input type="text" placeholder="City" name="city[]" id="city" class="form-control">
                                                                </div>-->
                                                            
                                                                
                                                               <!-- <div class="col-md-6 col-sm-12 col-xs-12">
                                                                    <label>Action</label>
                                                <a class="btn btn-danger pull-left stage_cancel">Delete</a>
                                                                </div>-->
                                                            </div>
															</div>
															
                                                        
		';

		

	}
	
	public function add_interior_contact_process(){

		$upd_data=$this->mod_users->add_interior_contact($this->input->post());
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Contact added successfully.');
				redirect(base_url().'users/manage_interior');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not Added. Something went wrong, please try again.');
					redirect(base_url().'users/manage_interior');
				
				}//end if($add_cms_page)

		

	}
	
	
	
	public function add_contractor_contact_process(){

		$upd_data=$this->mod_users->add_interior_contact($this->input->post());
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '-  Contact added successfully.');
				redirect(base_url().'users/manage_contractor');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not added. Something went wrong, please try again.');
					redirect(base_url().'users/manage_contractor');
				
				}//end if($add_cms_page)

		

	}
	
	public function add_subcontractor_contact_process(){

		$upd_data=$this->mod_users->add_interior_contact($this->input->post());
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '-  contact added successfully.');
				redirect(base_url().'users/manage_subcontractor');
				
				}else{
				$this->session->set_flashdata('err_message', '- contact not added. Something went wrong, please try again.');
					redirect(base_url().'users/manage_subcontractor');
				
				}//end if($add_cms_page)

		

	}
	
	public function add_owner_contact_process(){

		$upd_data=$this->mod_users->add_interior_contact($this->input->post());
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '-  Contact added successfully.');
				redirect(base_url().'users/manage_owner');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not added. Something went wrong, please try again.');
					redirect(base_url().'users/manage_owner');
				
				}//end if($add_cms_page)


	}
	
	
	
	public function add_supplier_contact_process(){

		$upd_data=$this->mod_users->add_interior_contact($this->input->post());
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '-  Contact added successfully.');
				redirect(base_url().'users/manage_supplier');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not added. Something went wrong, please try again.');
					redirect(base_url().'users/manage_supplier');
				
				}//end if($add_cms_page)
	

	}
	
	
	public function add_subcontractor_process(){
if($this->input->post('firm_type')=='Firm'){
	//print_r($this->input->post('firm_type'));exit;
		$data['contact']=$this->mod_users->add_subcontractor_process($this->input->post());
		
		
		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		$this->load->view('sub_contractor/add_contact', $data);
}
elseif($this->input->post('firm_type')=='Individual'){
	$type='sub contractor';
	$upd_data=$this->mod_users->add_interior($this->input->post(),$type);
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Data updated successfully.');
				redirect(base_url().'users/manage_subcontractor');
				
				}else{
				$this->session->set_flashdata('err_message', '- Data not updated. Something went wrong, please try again.');
					redirect(base_url().'users/manage_subcontractor');
				
				}//end if($add_cms_page)
}
	
	}//add user process function ends here
	
	public function add_owner_process(){
$type="Owner";
if($this->input->post('firm_type')=='Firm'){
	//print_r($this->input->post('firm_type'));exit;

		$data['contact']=$this->mod_users->add_owner_process($this->input->post(),$type);
$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		$this->load->view('owner/add_contact', $data);
		}
elseif($this->input->post('firm_type')=='Individual'){
	
	$upd_data=$this->mod_users->add_interior($this->input->post(),$type);
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Data Added successfully.');
				redirect(base_url().'users/manage_owner');
				
				}else{
				$this->session->set_flashdata('err_message', '- Data not Added. Something went wrong, please try again.');
					redirect(base_url().'users/manage_owner');
				
				}//end if($add_cms_page)
}

	}//add user process function ends here
	public function add_supplier_process(){
$type="Supplier";
if($this->input->post('firm_type')=='Firm'){
	//print_r($this->input->post('firm_type'));exit;
		$data['contact']=$this->mod_users->add_owner_process($this->input->post(),$type);

		$data['header'] = $this->load->view('common/header', '', TRUE);

		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);

		$this->load->view('supplier/add_contact', $data);
		}
elseif($this->input->post('firm_type')=='Individual'){
	
	$upd_data=$this->mod_users->add_interior($this->input->post(),$type);
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Data Added successfully.');
				redirect(base_url().'users/manage_supplier');
				
				}else{
				$this->session->set_flashdata('err_message', '- Data not Added. Something went wrong, please try again.');
					redirect(base_url().'users/manage_supplier');
				
				}//end if($add_cms_page)
}

	}//add user process function ends here
	
	
		// edit user function
			public function edit_user($id){


			$data['user'] = $this->mod_users->edit_user($id);
	//print_r($data['user']);
			$data['header'] = $this->load->view('common/header', '', TRUE);
	
			$data['footer'] = $this->load->view('common/footer', '', TRUE);
	
			$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
	
			$this->load->view('users/editUser', $data);

	}//edit user function ends here..
	
	public function edit_interior($id){


			$data['user'] = $this->mod_users->edit_interior($id);
	//print_r($data['user']);
			$data['header'] = $this->load->view('common/header', '', TRUE);
	
			$data['footer'] = $this->load->view('common/footer', '', TRUE);
	
			$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
	        $data['state_zip'] = $this->mod_users->sub_users();
			$this->load->view('interior_designe/edit_interior', $data);

	}//edit user function ends here..

	
	public function edit_contractor($id){


			$data['user'] = $this->mod_users->edit_contractor($id);
	//print_r($data['user']);
			$data['header'] = $this->load->view('common/header', '', TRUE);
	
			$data['footer'] = $this->load->view('common/footer', '', TRUE);
	
			$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
	        $data['state_zip'] = $this->mod_users->sub_users();
			$this->load->view('main_contractor/edit_contractor', $data);

	}//edit user function ends here..
	
	
	public function edit_subcontractor($id){


			$data['user'] = $this->mod_users->edit_contractor($id);
	//print_r($data['user']);
			$data['header'] = $this->load->view('common/header', '', TRUE);
	
			$data['footer'] = $this->load->view('common/footer', '', TRUE);
	
			$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
	        $data['state_zip'] = $this->mod_users->sub_users();
			$this->load->view('sub_contractor/edit_contractor', $data);

	}//edit user function ends here..
	
	public function edit_owner($id){


			$data['user'] = $this->mod_users->edit_contractor($id);
	//print_r($data['user']);
			$data['header'] = $this->load->view('common/header', '', TRUE);
	
			$data['footer'] = $this->load->view('common/footer', '', TRUE);
	
			$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
	        $data['state_zip'] = $this->mod_users->sub_users();
			$this->load->view('owner/edit_owner', $data);

	}//edit user function ends here..
	
	public function edit_supplier($id){


			$data['user'] = $this->mod_users->edit_contractor($id);
	//print_r($data['user']);
			$data['header'] = $this->load->view('common/header', '', TRUE);
	
			$data['footer'] = $this->load->view('common/footer', '', TRUE);
	
			$data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
	        $data['state_zip'] = $this->mod_users->sub_users();
			$this->load->view('supplier/edit_supplier', $data);

	}//edit user function ends here..
	
	
	
		//update user
		public function update_user_process(){
	

		$this->mod_users->update_user($this->input->post());

		redirect(SURL.'users/manage_users');

	}//user update ends here
	
		public function update_interior_process(){
	

		$upd_data=$this->mod_users->update_interior($this->input->post());
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Firm updated successfully.');
				redirect(base_url().'users/manage_interior');
				
				}else{
				$this->session->set_flashdata('err_message', '- Firm not updated. Something went wrong, please try again.');
					redirect(base_url().'users/manage_interior');
				
				}//end if($add_cms_page)

		

		

	}
	
		public function search_interior(){

		$data['get_stories']=$this->mod_users->search_interior($this->input->post());
//print_r($data['get_stories']);exit;
		$div='<table class="table table-bordered table-striped table-hover">

											 <thead>
        <tr>
            <th>Firm Name</th>
            <th>Email</th>
            <th>Address</th>
			 <th>Firm Type</th>
			<!--<th>Date</th>
            <th>Type</th>-->
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
                                                        <td >'.$stories['email_address'].'</td>
														 <td>'.$stories['street'].','.$stories['second_street'].','.$stories['city'].','.$stories['country'].'</td>
														<td >'.$stories['firm_type'].'</td>
                                                        <td>';
														if($this->session->userdata('user_type')==1)
{ $div.='
                                                        	<a class="btn btn-default" href="'.SURL.'users/edit_interior/'.$stories['id'].'"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a>';}
															if($this->session->userdata('user_type')==1)
{ $div.='
                                                        	<a class="btn btn-danger"  onclick="return confirm("Are you sure you want to delete this item?");" href="'.SURL.'users/delete_interior/'.$stories['id'].'"><i class="fa fa-trash" aria-hidden="true" title="delete the data"></i></a>';}if($this->session->userdata('user_type')==1)
{ if($stories['firm_type']=='firm'){ $div.=  '
  <a class="btn btn-default" href="'.SURL.'users/add_contacts/'.$stories['id'].'"><i class="fa fa-plus-square" aria-hidden="true" title="Add Contact"></i></a>';}}echo '
  
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
	
	public function search_contractor(){

		$data['get_stories']=$this->mod_users->search_contractor($this->input->post());
//print_r($data['get_stories']);exit;
		$div=' <table class="table table-bordered table-striped table-hover">

											 <thead>
        <tr>
            <th>Firm Name</th>
            <th>Email</th>
            <th>Address</th>
			 <th>Firm Type</th>
			<!--<th>Date</th>
            <th>Type</th>-->
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
                                                        <td >'.$stories['email_address'].'</td>
														 <td>'.$stories['street'].','.$stories['second_street'].','.$stories['city'].','
														 .$stories['country'].'</td>
														<td >'.$stories['firm_type'].'</td>
                                                        <td >';
														if($this->session->userdata('user_type')==1)
{ $div.='
                                                        	<a class="btn btn-default" href="'.SURL.'users/edit_contractor/'.$stories['id'].'"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a>';}
															if($this->session->userdata('user_type')==1)
{ $div.='
                                                        	<a class="btn btn-danger"  onclick="return confirm("Are you sure you want to delete this item?");" href="'.SURL.'users/delete_contractor/'.$stories['id'].'"><i class="fa fa-trash" aria-hidden="true" title="delete the data"></i></a>';}if($this->session->userdata('user_type')==1)
{ if($stories['firm_type']=='firm'){  $div.='
  <a class="btn btn-default" href="'.SURL.'users/add_contact_main/'.$stories['id'].'"><i class="fa fa-plus-square" aria-hidden="true" title="Add Contact"></i></a>';}}echo '
  
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
	
	public function search_subcontractor(){

		$data['get_stories']=$this->mod_users->search_subcontractor($this->input->post());
//print_r($data['get_stories']);exit;
		$div=' <table class="table table-bordered table-striped table-hover">

											 <thead>
        <tr>
            <th>Firm Name</th>
            <th>Email</th>
            <th>Address</th>
			 <th>Firm Type</th>
			<!--<th>Date</th>
            <th>Type</th>-->
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
                                                        <td >'.$stories['email_address'].'</td>
														 <td>'.$stories['street'].','.$stories['second_street'].','.$stories['city'].','
														 .$stories['country'].'</td>
														 
														<td >'.$stories['firm_type'].'</td>
                                                        <td >';if($this->session->userdata('user_type')==1)
{ $div.='
                                                        	<a class="btn btn-default" href="'.SURL.'users/edit_subcontractor/'.$stories['id'].'"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a>
';}if($this->session->userdata('user_type')==1)
{ $div.='
                                                        	<a class="btn btn-danger"  onclick="return confirm("Are you sure you want to delete this item?");" href="'.SURL.'users/delete_subcontractor/'.$stories['id'].'"><i class="fa fa-trash" aria-hidden="true" title="delete the data"></i></a>';}if($this->session->userdata('user_type')==1)
{ if($stories['firm_type']=='firm'){  $div.='
  <a class="btn btn-default" href="'.SURL.'users/add_subcontact/'.$stories['id'].'"><i class="fa fa-plus-square" aria-hidden="true" title="Add Contact"></i></a>';}}echo '
  
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
	
	
	public function search_supplier(){

		$data['get_stories']=$this->mod_users->search_suplier($this->input->post());
//print_r($data['get_stories']);exit;
		$div=' <table class="table table-bordered table-striped table-hover">

											 <thead>
        <tr>
            <th>Firm Name</th>
            <th>Email</th>
            <th>Address</th>
			 <th>Firm Type</th>
			<!--<th>Date</th>
            <th>Type</th>-->
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
											';
                                               if(!empty($data['get_stories'])){

													
                                                    
  foreach($data['get_stories'] as $stories){ 
$div.='<tr>';
                                                      
                                                
                                                        $div.='
                                                        <td>'.$stories['firm_name'].'</td>
                                                        <td>'.$stories['email_address'].'</td>
														 <td>'.$stories['street'].','.$stories['second_street'].','.$stories['city'].','
														 .$stories['country'].'</td>
														<td>'.$stories['firm_type'].'</td>
                                                        <td>';
														if($this->session->userdata('user_type')==1)
{ $div.='
                                                        	<a class="btn btn-default" href="'.SURL.'users/edit_supplier/'.$stories['id'].'"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a>';}
															if($this->session->userdata('user_type')==1)
{ $div.='
															
                                                        	<a class="btn btn-danger"  onclick="return confirm("Are you sure you want to delete this item?");" href="'.SURL.'users/delete_supplier/'.$stories['id'].'"><i class="fa fa-trash" aria-hidden="true" title="delete the data"></i></a>';}if($this->session->userdata('user_type')==1)
{ if($stories['firm_type']=='firm'){  
  $div.='<a class="btn btn-default" href="'.SURL.'users/add_supplier_contacts/'.$stories['id'].'"><i class="fa fa-plus-square" aria-hidden="true" title="Add Contact"></i></a>';}}echo '
  
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
	
	public function search_owner(){

		$data['get_stories']=$this->mod_users->search_owner($this->input->post());
//print_r($data['get_stories']);exit;
		$div=' <table class="table table-bordered table-striped table-hover">

											 <thead>
        <tr>
            <th>Firm Name</th>
            <th>Email</th>
            <th>Address</th>
			 <th>Firm Type</th>
		
			<!--<th>Date</th>
            <th>Type</th>-->
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
                                                        <td >'.$stories['email_address'].'</td>
														 <td>'.$stories['street'].','.$stories['second_street'].','.$stories['city'].','
														 .$stories['country'].'</td>
														 
														<td >'.$stories['firm_type'].'</td>
                                                        <td >';if($this->session->userdata('user_type')==1)
{ $div.='
                                                        	<a class="btn btn-default" href="'.SURL.'users/edit_owner/'.$stories['id'].'"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a>';}
															if($this->session->userdata('user_type')==1)
{ $div.='
															
                                                        	<a class="btn btn-danger"  onclick="return confirm("Are you sure you want to delete this item?");" href="'.SURL.'users/delete_owner/'.$stories['id'].'"><i class="fa fa-trash" aria-hidden="true" title="delete the data"></i></a>';}if($this->session->userdata('user_type')==1)
{
															if($stories['firm_type']=='firm'){  
  $div.= ' <a class="btn btn-default" href="'.SURL.'users/add_owners/'.$stories['id'].'"><i class="fa fa-plus-square" aria-hidden="true" title="Add Contact"></i></a>';}}
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
	
	
	public function update_contacts_main(){
	//print_r($this->input->post('post'));exit;

		$upd_data=$this->mod_users->update_contact($this->input->post());
$id=$this->input->post('firm_id');
if($this->input->post('post')=='1'){
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Contact updated successfully.');
				redirect(base_url().'users/manage_contractor');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not updated. Something went wrong, please try again.');
					redirect(base_url().'users/manage_contractor');
				
				}//end if($add_cms_page)

		
}elseif($this->input->post('post')=='0'){
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Contact updated successfully.');
				redirect(base_url().'users/add_contact_main/'.$id.'');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not updated. Something went wrong, please try again.');
					redirect(base_url().'users/add_contact_main/'.$id.'');
				
				}//end if($add_cms_page)

}



	}
	
		public function update_contacts_owner(){
	//print_r($this->input->post('post'));exit;

		$upd_data=$this->mod_users->update_contact($this->input->post());
$id=$this->input->post('firm_id');
if($this->input->post('post')=='1'){
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Contact updated successfully.');
				redirect(base_url().'users/manage_owner');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not updated. Something went wrong, please try again.');
					redirect(base_url().'users/manage_owner');
				
				}//end if($add_cms_page)

		
}elseif($this->input->post('post')=='0'){
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Contact updated successfully.');
				redirect(base_url().'users/add_owners/'.$id.'');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not updated. Something went wrong, please try again.');
					redirect(base_url().'users/add_owners/'.$id.'');
				
				}//end if($add_cms_page)

}



	}
	
	public function update_contacts_sub(){
	//print_r($this->input->post('post'));exit;

		$upd_data=$this->mod_users->update_contact($this->input->post());
$id=$this->input->post('firm_id');
if($this->input->post('post')=='1'){
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Contact updated successfully.');
				redirect(base_url().'users/manage_subcontractor');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not updated. Something went wrong, please try again.');
					redirect(base_url().'users/manage_subcontractor');
				
				}//end if($add_cms_page)

		
}elseif($this->input->post('post')=='0'){
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Contact updated successfully.');
				redirect(base_url().'users/add_subcontact/'.$id.'');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not updated. Something went wrong, please try again.');
					redirect(base_url().'users/add_subcontact/'.$id.'');
				
				}//end if($add_cms_page)

}
	}
	
		public function update_contact(){
	//print_r($this->input->post('post'));exit;

		$upd_data=$this->mod_users->update_contact($this->input->post());
$id=$this->input->post('firm_id');
if($this->input->post('post')=='1'){
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Contact updated successfully.');
				redirect(base_url().'users/manage_interior');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not updated. Something went wrong, please try again.');
					redirect(base_url().'users/manage_interior');
				
				}//end if($add_cms_page)
		
}elseif($this->input->post('post')=='0'){
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Contact updated successfully.');
				redirect(base_url().'users/add_contacts/'.$id.'');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not updated. Something went wrong, please try again.');
					redirect(base_url().'users/add_contacts/'.$id.'');
				
				}//end if($add_cms_page)



}

	}
	
	public function update_contact_supplier(){
	//print_r($this->input->post('post'));exit;

		$upd_data=$this->mod_users->update_contact($this->input->post());
$id=$this->input->post('firm_id');
if($this->input->post('post')=='1'){
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Contact updated successfully.');
				redirect(base_url().'users/manage_supplier');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not updated. Something went wrong, please try again.');
					redirect(base_url().'users/manage_supplier');
				
				}//end if($add_cms_page)
		
}elseif($this->input->post('post')=='0'){
	if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Contact updated successfully.');
				redirect(base_url().'users/add_supplier_contacts/'.$id.'');
				
				}else{
				$this->session->set_flashdata('err_message', '- Contact not updated. Something went wrong, please try again.');
					redirect(base_url().'users/add_supplier_contacts/'.$id.'');
				
				}//end if($add_cms_page)



}

	}
	
	public function update_subcontractor_process(){
	

		$upd_data=$this->mod_users->update_contractor($this->input->post());
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Firm updated successfully.');
				redirect(base_url().'users/manage_subcontractor');
				
				}else{
				$this->session->set_flashdata('err_message', '- Firm not updated. Something went wrong, please try again.');
					redirect(base_url().'users/manage_subcontractor');
				
				}//end if($add_cms_page)
		

	}//user update ends here
	
	public function update_owner_process(){
	

		$upd_data=$this->mod_users->update_contractor($this->input->post());
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Firm updated successfully.');
				redirect(base_url().'users/manage_owner');
				
				}else{
				$this->session->set_flashdata('err_message', '- Firm not updated. Something went wrong, please try again.');
					redirect(base_url().'users/manage_owner');
				
				}//end if($add_cms_page)
		

	}//user update ends here
	
	public function update_supplier_process(){
	

		$upd_data=$this->mod_users->update_contractor($this->input->post());
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Firm updated successfully.');
				redirect(base_url().'users/manage_supplier');
				
				}else{
				$this->session->set_flashdata('err_message', '- Firm not updated. Something went wrong, please try again.');
					redirect(base_url().'users/manage_supplier');
				
				}//end if($add_cms_page)
		
	}//user update ends here
	
	public function update_contractor_process(){
	

		$upd_data=$this->mod_users->update_contractor($this->input->post());
if($upd_data){
				
				$this->session->set_flashdata('ok_message', '- Firm updated successfully.');
				redirect(base_url().'users/manage_contractor');
				
				}else{
				$this->session->set_flashdata('err_message', '- Firm not updated. Something went wrong, please try again.');
					redirect(base_url().'users/manage_contractor');
				
				}//end if($add_cms_page)
		
	}//user update ends here
	
	
	
	//function is for dellete user 
	public function delete_user($id,$image)
	{

		$this->mod_users->delete_user($id,$image);

		redirect(SURL.'users/manage_users');

	}
	
	public function delete_interior($id)
	{

		$this->mod_users->delete_interior($id);

		redirect(SURL.'users/manage_interior');

	}
	
	public function delete_interior_contact($id,$firm_id)
	{

		$this->mod_users->delete_sub_contact($id);

		redirect(SURL.'users/add_contacts/'.$firm_id.'');

	}
	
	public function delete_main_contact($id,$firm_id)
	{

		$this->mod_users->delete_sub_contact($id);

		redirect(SURL.'users/add_contact_main/'.$firm_id.'');

	}
	
	public function delete_owner_contact($id,$firm_id)
	{

		$this->mod_users->delete_sub_contact($id);

		redirect(SURL.'users/add_owners/'.$firm_id.'');

	}
	
	public function delete_supplier_contact($id,$firm_id)
	{

		$this->mod_users->delete_sub_contact($id);

		redirect(SURL.'users/add_supplier_contacts/'.$firm_id.'');

	}
	
	public function delete_contractor($id)
	{

		$this->mod_users->delete_contractor($id);

		redirect(SURL.'users/manage_contractor');

	}
	
	public function delete_owner($id)
	{

		$this->mod_users->delete_contractor($id);

		redirect(SURL.'users/manage_owner');

	}
	
	public function delete_supplier($id)
	{

		$this->mod_users->delete_contractor($id);

		redirect(SURL.'users/manage_supplier');

	}
	
	public function delete_subcontractor($id)
	{

		$this->mod_users->delete_contractor($id);

		redirect(SURL.'users/manage_subcontractor');

	}

	public function logout_user(){

		$this->session->sess_destroy();

		redirect(SURL);
	}	

}