<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Check_in_out_report extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		$this->load->model('mod_check_in_out_report');


	}

	public function index(){
		

	}

	public function check_in(){

		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		


		$data['check_in']=$this->session->userdata('check_in_status');
		$this->load->view('dashboard/index', $data);

	}
	
	public function check_out(){
		
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		$res = $this->mod_check_in_out_report->check_out();
		$data['check_in']=$this->session->userdata('check_in_status');
		$this->load->view('dashboard/index', $data);
	}	
	public function show_history(){


		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		$data['start_date']=date('d-m-Y');
		$data['end_date']=date('d-m-Y');
		$data['all_users_res'] = $this->mod_check_in_out_report->get_all_users();
		$this->load->view('report/check_in_out_report',$data);
	}
	public function check_in_out_history(){
		$date_lim=$this->input->post();

		if(empty($date_lim)){
			$date_lim['start_date']=date('d-m-Y');
			$date_lim['end_date']=date('d-m-Y');
			$date_lim['user_list'] = $this->mod_check_in_out_report->get_all_users();
			$data['user_data']= $this->mod_check_in_out_report->get_check_in_out_history($date_lim['start_date'],$date_lim['end_date'],$date_lim['user_list'][0]['id']);
		}else{
			$data['user_data']= $this->mod_check_in_out_report->get_check_in_out_history($date_lim['start_date'],$date_lim['end_date'],$date_lim['user_list']);
		}
// echo '<pre>';print_r($date_lim['user_list'][0]['id']);
				$data['list_value']= $date_lim['user_list'][0];
	// echo $data['list_value'];
	// 	exit;
		

		if($data['user_data']){
			$data['list_value']=$data['user_data'][0]['id'];
		}
// echo $data['list_value'];
// 		exit;
		// echo '<pre>';print_r($data);exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		$data['start_date']=$date_lim['start_date'];
		$data['end_date']=$date_lim['end_date'];
		$data['all_users_res'] = $this->mod_check_in_out_report->get_all_users();
		// echo '<pre>';print_r($data['user_data']);exit;

		$this->load->view('report/check_in_out_report',$data);
	}

}