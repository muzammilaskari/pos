<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Check_in_out extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		$this->load->model('mod_check_in_out');

	}

	public function index(){
		

	}

	public function check_in(){

		$data['header_script'] = $this->load->view('common/user_shop/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/user_shop/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/user_shop/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/user_shop/footer', '', TRUE);
		

		$res = $this->mod_check_in_out->check_in();
		if($res){
			$this->session->set_userdata('check_in_status',1);
			$this->session->set_userdata('message',1);
		}else{
			$this->session->set_userdata('check_in_status',0);
		}
        
        $data['check_in']=$this->session->userdata('check_in_status');
		$this->load->view('user_shop/dashboad', $data);

	}
	
	public function check_out(){
		
		$data['header_script'] = $this->load->view('common/user_shop/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/user_shop/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/user_shop/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/user_shop/footer', '', TRUE);
		$res = $this->mod_check_in_out->check_out();

		if($res){
			$this->session->set_userdata('check_in_status',0);
			$data['check_in']=2;
			$this->session->set_userdata('message',2);

		}else{
			$this->session->set_userdata('check_in_status',1);
		}
		$this->session->set_userdata('message',2);
		 $data['check_in']=$this->session->userdata('check_in_status');
		$this->load->view('user_shop/dashboad', $data);
	}	
	public function show_history(){


		$data['header_script'] = $this->load->view('common/user_shop/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/user_shop/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/user_shop/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/user_shop/footer', '', TRUE);
		$data['start_date']=date('d-m-Y');
		$data['end_date']=date('d-m-Y');
		$this->load->view('user/check_in_out_history',$data);
	}
	public function check_in_out_history(){
		$date_lim=$this->input->post();
		if(empty($date_lim)){
			$date_lim['start_date']=date('d-m-Y');
			$date_lim['end_date']=date('d-m-Y');
		}

		$data['user_data']= $this->mod_check_in_out->get_check_in_out_history($date_lim['start_date'],$date_lim['end_date']);

// echo '<pre>';print_r($data);exit;
	$data['header_script'] = $this->load->view('common/user_shop/header_script', '', TRUE);
	$data['header'] = $this->load->view('common/user_shop/header', '', TRUE);
	$data['sidebar'] = $this->load->view('common/user_shop/side_bar', '', TRUE);
	$data['footer'] = $this->load->view('common/user_shop/footer', '', TRUE);
	$data['start_date']=$date_lim['start_date'];
	$data['end_date']=$date_lim['end_date'];

	$this->load->view('user/check_in_out_history',$data);
}

}