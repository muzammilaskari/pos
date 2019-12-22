<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_expense extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_expanse');
		    $this->load->library('pagination');
			
		if($this->session->userdata('user_type') != 1){
			redirect(SURL.'login/logout_user');
		}
		
		if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 }

		

	}

	public function all_expense($variant=0){
		//echo 'in expense';exit;
		//echo 'in manage shop';exit;
		/*$shop=$this->mod_expanse->num_rows('shops');
		
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
		$data['all_shop'] = $this->mod_expanse->get_shop('shops',$config['per_page'],$variant);*/
		$data['all_type'] = $this->mod_expanse->get_type();
	
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		
		
		//echo '<pre>';print_r($data['all_shop']);exit;
		
		$this->load->view('expanse/manag_expanse_type',$data);

	}
	
	public function expense_detail($variant=0){
		//echo 'in expense';exit;
		//echo 'in manage shop';exit;
		/*$shop=$this->mod_expanse->num_rows('shops');
		
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
		$data['all_shop'] = $this->mod_expanse->get_shop('shops',$config['per_page'],$variant);*/
		$data['all_type'] = $this->mod_expanse->get_type();
		
		$data['all_expense_detail'] = $this->mod_expanse->get_detail();
	
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		
		
		//echo '<pre>';print_r($data['all_shop']);exit;
		
		$this->load->view('expanse/manag_expanse_detail',$data);

	}
	
	public function add_expanse_type(){
		//echo 'adding expens type';exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$this->load->view('expanse/add_expanse_type', $data);
	}
	
	public function calculte_income(){
		//echo 'adding expens type';exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$this->load->view('expanse/income_view', $data);
	}
	
	public function add_expanse_detail(){
		//echo 'adding expens detail';exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['all_type'] = $this->mod_expanse->get_type_enabled();
		
		$this->load->view('expanse/add_expanse_detail', $data);
	}
	
	public function calculte_income_process(){
		//echo "<pre>";print_r($this->input->post());exit;
		$complete_sale_report = $this->mod_expanse->get_sale_complete_report($this->input->post());
		$complete_expense_report = $this->mod_expanse->get_expense_complete_report($this->input->post());
		?>
        <tr>
        <?php
		if($complete_sale_report['total_sale'] > 0 && $complete_expense_report['total_expense'] > 0){
			
			if($complete_sale_report['total_sale'] > $complete_expense_report['total_expense']){
				$result = $complete_sale_report['total_sale']-$complete_expense_report['total_expense'];
				?>
                <td><b><?php echo $complete_sale_report['total_sale'];?></b></td>
                <td><b><?php echo $complete_expense_report['total_expense'];?></b></td>
                <td><b><?php echo $result?></b></td>
                <?php
				//echo 'sale';
				//echo 'Sale:'.$complete_sale_report['total_sale'].' Expense:'.$complete_expense_report['total_expense'];
				//echo 'Resut:'.$result;	
			}else{
				$result = $complete_expense_report['total_expense']-$complete_sale_report['total_sale'];
				?>
                <td><b><?php echo $complete_sale_report['total_sale'];?></b></td>
                <td><b><?php echo $complete_expense_report['total_expense'];?></b></td>
                <td><b><?php echo $result?></b></td>
                <?php
				//echo 'expense';
				//echo 'Sale:'.$complete_sale_report['total_sale'].' Expense:'.$complete_expense_report['total_expense'];
				//echo 'Resutl:'.$result;
			}
		}
		elseif($complete_sale_report['total_sale'] > 0){
			?>
			<td><b><?php echo $complete_sale_report['total_sale'];?></b></td>
            <td><b><?php echo $complete_expense_report['total_expense'];?></b></td>
            <td><b><?php echo $complete_sale_report['total_sale'];?></b></td>
            <?php
			//echo 'in esel if';	
			//echo 'Sale:'.$complete_sale_report['total_sale'].' Expense:'.$complete_expense_report['total_expense'];
			//echo 'Resutl:'.$complete_expense_report['total_sale'];
		}elseif($complete_expense_report['total_expense'] > 0){
			?>
            <td><b><?php echo $complete_sale_report['total_sale'];?></b></td>
            <td><b><?php echo $complete_expense_report['total_expense'];?></b></td>
            <td><b><?php echo $complete_expense_report['total_expense'];?></b></td>
            <?php
			//echo 'in esle if sles';
			//echo 'Sale:'.$complete_sale_report['total_sale'].' Expense:'.$complete_expense_report['total_expense'];
			//echo 'Resutl:'.$complete_expense_report['total_expense'];
		}else{
			?>
            <td><b><?php echo 'No Record Found';?></b></td>
            <?php
			echo 'No Record Found';	
		}exit;
		?>
		</tr>
        <?php 
	}
	
	public function search_shop(){
		//echo '<pre>';print_r($this->input->post());exit;
		$serch_res_all_shop = $this->mod_expanse->get_shop_res_ajax($this->input->post());
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
	
	public function edit_expanse_type($id){
		//echo $id;exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['expense_detail'] = $this->mod_expanse->get_expense_detail($id);
		if(count($data['expense_detail'])>0){
			
		}else{
			redirect(base_url().'expanse/all_expense');
		}
		
		$this->load->view('expanse/edit_expanse_type',$data);
	}
	
	public function edit_expanse_detail($id){
		//echo $id;exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['expense_detail'] = $this->mod_expanse->get_expense_specific_detail($id);
		
		//echo '<pre>';print_r($data['expense_detail']);exit;
		
		$data['all_type'] = $this->mod_expanse->get_type_enabled();
		
		if(count($data['expense_detail'])>0){
			
		}else{
			redirect(base_url().'expanse/expense_detail');
		}
		
		$this->load->view('expanse/edit_expanse_detail',$data);
	}
	
	public function delete_expanse($id){
		
		$res_shop = $this->mod_expanse->del_expanse_record($id);
		//echo $id;exit;
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Expense type deleted successfully.');
				redirect(base_url().'manage_expense/all_expense');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Deleted. Something went wrong, please try again.');
					redirect(base_url().'manage_expense/all_expense');
				
		}
	}
	
	public function delete_expanse_detail($id){
		
		$res_shop = $this->mod_expanse->del_expanse_detail_record($id);
		//echo $id;exit;
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Expense detail deleted successfully.');
				redirect(base_url().'manage_expense/expense_detail');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Deleted. Something went wrong, please try again.');
					redirect(base_url().'manage_expense/expense_detail');
				
		}
	}
	
	public function edit_expanse_process(){
		
		//echo '<pre>';print_r($this->input->post());exit;
		$res_shop = $this->mod_expanse->update_expense_record($this->input->post());
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Expense record updated successfully.');
				redirect(base_url().'manage_expense/all_expense');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Updated. Something went wrong, please try again.');
					redirect(base_url().'manage_expense/edit_expanse_type/'.$this->input->post('id'));
				
		}
		
	}
	
	public function edit_expense_detail_process(){
		
		//echo '<pre>';print_r($this->input->post());exit;
		$res_shop = $this->mod_expanse->update_expense_detail_record($this->input->post());
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Expense record updated successfully.');
				redirect(base_url().'manage_expense/expense_detail');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Updated. Something went wrong, please try again.');
					redirect(base_url().'manage_expense/edit_expanse_detail/'.$this->input->post('id'));
				
		}
		
	}
	
	public function add_expanse_type_process(){
		//echo '<pre>';print_r($this->input->post());exit;
		
		
		$res_shop = $this->mod_expanse->add_expanse_type($this->input->post());
		
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Expense added successfully.');
				redirect(base_url().'manage_expense/all_expense');
				
		}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'manage_expense/all_expense');
				
		}//end if($res_shop)
		//echo '<pre>';print_r($this->input->post());exit;
		
	}
	
	public function add_expense_detail_process(){
		//echo '<pre>';print_r($this->input->post());exit;
		
		
		$res_shop = $this->mod_expanse->add_expanse_detail($this->input->post());
		
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Expense added successfully.');
				redirect(base_url().'manage_expense/expense_detail');
				
		}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'manage_expense/expense_detail');
				
		}//end if($res_shop)
		//echo '<pre>';print_r($this->input->post());exit;
		
	}
	

}