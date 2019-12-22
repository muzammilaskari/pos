<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_user extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_user');
		    $this->load->library('pagination');
		if($this->session->userdata('user_type') != 1){
			redirect(SURL.'login/logout_user');
		}
		
		if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 }

		

	}

	public function all_users($variant=0){
		
		//echo 'in manage shop';exit;
			$users=$this->mod_user->num_rows('users');
		
		$config["base_url"] = base_url() . "manage_user/all_users/";
		$config['total_rows'] = $users;
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
	
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['all_user'] = $this->mod_user->get_user('users',$config['per_page'],$variant);
		
		$this->load->view('user/manag_user',$data);

	}
	
	public function search_user(){
		
			$serch_res_all_user = $this->mod_user->get_user_ajax($this->input->post());
		?>
        <?php if(isset($serch_res_all_user) && (count($serch_res_all_user) > 0)){$count = 1;
									foreach($serch_res_all_user as $res){	
							?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo ucfirst($res['first_name']); ?></td>
                                <td><?php echo $res['user_name'] ?></td>
                                <td>
                                	<?php if($res['status']==1){?>
                                    <span class="label label-success">Active</span>
                                    <?php }else{?>
                                    <span class="label label-danger">Inactive</span>
									<?php }?>
                                </td>
                                <td><?php echo date('M d Y',strtotime($res['created_date'])); ?></td>
                                <td>
                                <div class="btn-group">
                                    <button class="btn btn-success">Action</button>
                                    <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu slidedown">
                                        <!--<li><a href="#">View Profile</a></li>-->
                                        <li><a href="<?php echo base_url();?>manage_user/edit_user/<?php echo $res['id']; ?>">Edit</a></li>
                                        <li><a onclick="return del_rec();" href="<?php echo base_url();?>manage_user/delete_user/<?php echo $res['id']; ?>">Delete</a></li>
                                        
                                    </ul>
                                </div>
                                </td>
                            </tr>
                            <?php $count++;}
							}else{?>
                            <tr>
                                <td colspan="4">No record Found</td>
                            </tr>
                            <?php }?>
        <?php
	}
	
	public function add_user(){
		//echo 'adding shop';exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$this->load->view('user/add_user',$data);
	}
	
	public function change_pass(){
		//echo 'adding shop';exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$this->load->view('user/change_user_pass',$data);
	}
	
	public function edit_user($id){
		//echo $id;exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['shop_detail'] = $this->mod_user->get_user_detail($id);
		
		//echo '<pre>';print_r($data['shop_detail']);exit;
		$this->load->view('user/edit_user',$data);
	}
	
	public function delete_user($id){
		
		$res_shop = $this->mod_user->del_user_record($id);
		
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- User Record Deleted successfully.');
				redirect(base_url().'manage_user/all_users');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Deleted. Something went wrong, please try again.');
					redirect(base_url().'manage_user/all_users');
				
		}
		
	}
	
	public function change_pass_process(){
		//echo "<pre>";print_r($this->input->post());exit;
		
		$res_shop = $this->mod_user->update_user_pass($this->input->post());
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Password Updated successfully.');
				redirect(base_url().'manage_user/change_pass');
				
		}else{
				$this->session->set_flashdata('err_message', '- Old Password is incorrect.');
					redirect(base_url().'manage_user/change_pass/');
				
		}
	}
	
	
	public function edit_user_process(){
		
		//echo '<pre>';print_r($this->input->post());exit;
		$res_shop = $this->mod_user->update_user_record($this->input->post());
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- User Record Updated successfully.');
				redirect(base_url().'manage_user/all_users');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Updated. Something went wrong, please try again.');
					redirect(base_url().'manage_user/edit_user/'.$this->input->post('id'));
				
		}
		
	}
	
	public function add_user_process(){
		//echo $this->input->post('user_name');exit;
		$shop_check = $this->mod_user->user_check($this->input->post('user_name'));
		if($shop_check){
				
				$this->session->set_flashdata('err_message', '- User Name Already Exist.');
					redirect(base_url().'manage_user/add_user');
		}
		
		$res_shop = $this->mod_user->add_user($this->input->post());
		
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- User record added successfully.');
				redirect(base_url().'manage_user/all_users');
				
		}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'manage_user/add_user');
				
		}//end if($res_shop)
		//echo '<pre>';print_r($this->input->post());exit;
		
	}

}