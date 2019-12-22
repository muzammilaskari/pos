<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_shop extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_shop');
		    $this->load->library('pagination');
			
		if($this->session->userdata('user_type') != 1){
			redirect(SURL.'login/logout_user');
		}
		
		if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 }

		

	}

	public function all_shops($variant=0){
		
		//echo 'in manage shop';exit;
		$shop=$this->mod_shop->num_rows('shops');
		
		$config["base_url"] = base_url() . "manage_shop/all_shops/";
		$config['total_rows'] = $shop;
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
		$data['all_shop'] = $this->mod_shop->get_shop('shops',$config['per_page'],$variant);
	
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		
		
		//echo '<pre>';print_r($data['all_shop']);exit;
		
		$this->load->view('shop/manag_shop',$data);

	}
	
	public function add_shop(){
		//echo 'adding shop';exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$this->load->view('shop/add_shop', $data);
	}
	
	public function search_shop(){
		//echo '<pre>';print_r($this->input->post());exit;
		$serch_res_all_shop = $this->mod_shop->get_shop_res_ajax($this->input->post());
		?>
        <?php if(isset($serch_res_all_shop) && (count($serch_res_all_shop) > 0)){$count = 1;
									foreach($serch_res_all_shop as $res){	
		?>
		<tr>
			<td><?php echo $count;?></td>
			<td><?php echo ucfirst($res['shop_title']); ?></td>
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
					<li><a href="<?php echo base_url();?>manage_shop/edit_shop/<?php echo $res['id']; ?>">Edit</a></li>
					<li><a onclick="return del_rec();" href="<?php echo base_url();?>manage_shop/delete_shop/<?php echo $res['id']; ?>">Delete</a></li>
					
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
		//echo '<pre>';print_r($serch_res_all_shop);exit;
		
	}
	
	public function edit_shop($id){
		//echo $id;exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['shop_detail'] = $this->mod_shop->get_shop_detail($id);
		if(count($data['shop_detail'])>0){
			
		}else{
			redirect(base_url().'manage_shop/all_shops');
		}
		
		$this->load->view('shop/edit_shop',$data);
	}
	
	public function delete_shop($id){
		
		$res_shop = $this->mod_shop->del_shop_record($id);
		//echo $id;exit;
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Shop Record Deleted successfully.');
				redirect(base_url().'manage_shop/all_shops');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Deleted. Something went wrong, please try again.');
					redirect(base_url().'manage_shop/all_shops');
				
		}
	}
	
	public function edit_shop_process(){
		
		//echo '<pre>';print_r($this->input->post());exit;
		$res_shop = $this->mod_shop->update_shop_record($this->input->post());
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Shop record updated successfully.');
				redirect(base_url().'manage_shop/all_shops');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Updated. Something went wrong, please try again.');
					redirect(base_url().'manage_shop/edit_shop/'.$this->input->post('id'));
				
		}
		
	}
	
	public function add_shop_process(){
		// echo '<pre>';print_r($this->input->post());exit;
		
		
		$res_shop = $this->mod_shop->add_shop($this->input->post());
		// echo '<pre>';
		// print_r($res_shop);
		// exit;
		
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Shop added successfully.');
				redirect(base_url().'manage_shop/all_shops');
				
		}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'manage_shop/add_shop');
				
		}//end if($res_shop)
		//echo '<pre>';print_r($this->input->post());exit;
		
	}

}