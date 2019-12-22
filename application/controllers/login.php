<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_users');
		

		

	}

	public function index(){
		
		$data['all_shop'] = $this->mod_users->get__active_shop();
		//echo '<pre>';print_r($data['all_shop']);exit;
		
		$this->load->view('login/login', $data);


	}



	public function login_process(){


		$this->mod_users->userCheck();
		



	}
	
	public function logout_user(){
		
		$this->session->sess_destroy();

		redirect(SURL);
	}	

}