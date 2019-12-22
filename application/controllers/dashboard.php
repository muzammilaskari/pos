<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_users');
		
		

	 if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 }
	}

	public function index(){

	//echo 'successfull login';exit;

		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		/*
		$data['header_mo'] = $this->load->view('common/header_mo', '', TRUE);

		$data['footer_mo'] = $this->load->view('common/footer_mo', '', TRUE);*/

	
	
		//$this->load->view('dashboard/index_old', $data);

		$this->load->view('dashboard/index', $data);

	}
	
		
}