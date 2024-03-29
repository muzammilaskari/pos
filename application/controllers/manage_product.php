<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_product extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_product');
		   $this->load->library('pagination');
		  
		if($this->session->userdata('user_type') != 1){
			redirect(SURL.'login/logout_user');
		}
		
		if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 }

		

	}

	public function all_products($variant=0){
			$product=$this->mod_product->num_rows('product');
		
		$config["base_url"] = base_url() . "manage_product/all_products/";
		$config['total_rows'] = $product;
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
	
		//echo 'in manage shop';exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['all_product'] = $this->mod_product->get_product('product',$config['per_page'],$variant);
		
		//echo '<pre>';print_r($data['all_shop']);exit;
		
		$this->load->view('product/manag_product',$data);

	}
	
	public function search_product(){
		$res_serch_all_product = $this->mod_product->get_product_ajax($this->input->post());
		
		?>
        <?php if(isset($res_serch_all_product) && (count($res_serch_all_product) > 0)){$count = 1;
									foreach($res_serch_all_product as $res){	
							?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo ucfirst($res['product_name']); ?></td>
                                <td><?php echo $res['quantity']; ?></td>
                                <td><?php echo $res['reorder_level']; ?></td>
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
                                        <li><a href="<?php echo base_url();?>manage_product/edit_product/<?php echo $res['id'];?>">Edit</a></li>
                                        <li><a onclick="return del_rec();" href="<?php echo base_url();?>manage_product/delete_product/<?php echo $res['id']; ?>">Delete</a></li>
                                        
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
	
	public function list_product($variant=0){
		
		$product=$this->mod_product->num_rows('product');
		
		$config["base_url"] = base_url() . "manage_product/list_product/";
		$config['total_rows'] = $product;
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
		
		//echo 'in manage shop';exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['all_product'] = $this->mod_product->get_product('product',$config['per_page'],$variant);
		//$data['all_product'] = $this->mod_product->get_all_res_product();
		
		//echo '<pre>';print_r($data['all_shop']);exit;
		
		$this->load->view('product/manag_list_product',$data);

	}
	
	public function search_product_res(){
		$res_serch_prd_all_product = $this->mod_product->get_all_res_product_res_serch($this->input->post());
		$data['res_serch_prd_all_product'] = $res_serch_prd_all_product;
		$this->load->view('product/serch_form',$data);
		?>
        
        <?php 		
	}
	
	public function add_product(){
		//echo 'adding shop';exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$this->load->view('product/add_product',$data);
	}
	
	public function edit_product($id){
		//echo $id;exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['product_detail'] = $this->mod_product->get_product_detail($id);
		
		//echo '<pre>';print_r($data['shop_detail']);exit;
		$this->load->view('product/edit_product',$data);
	}
	
	public function delete_product($id){
		//echo $id;exit;
		$res_shop = $this->mod_product->del_product_record($id);
		
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Product Record Deleted successfully.');
				redirect(base_url().'manage_product/all_products');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Deleted. Something went wrong, please try again.');
					redirect(base_url().'manage_product/all_products');
				
		}
	}
	
	public function edit_listing_product_process(){
		
		//echo '<pre>';print_r($this->input->post());exit;
		$res_shop = $this->mod_product->update_listing_product_record($this->input->post());
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Quantity updated successfully.');
				redirect(base_url().'manage_product/list_product');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Updated. Something went wrong, please try again.');
					redirect(base_url().'manage_product/list_product');
				
		}
		
	}
	
	public function edit_listing_product_process_serch(){
		
		//echo '<pre>';print_r($this->input->post());exit;
		$res_shop = $this->mod_product->update_listing_product_record($this->input->post());
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Quantity updated successfully.');
				//redirect(base_url().'manage_product/list_product');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Updated. Something went wrong, please try again.');
				//	redirect(base_url().'manage_product/list_product');
				
		}
		
	}
	
	public function edit_product_process(){
		
		//echo '<pre>';print_r($this->input->post());exit;
		$res_shop = $this->mod_product->update_product_record($this->input->post());
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- Product record updated successfully.');
				redirect(base_url().'manage_product/all_products');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Updated. Something went wrong, please try again.');
					redirect(base_url().'manage_product/edit_product/'.$this->input->post('id'));
				
		}
		
	}
	
	public function add_product_process(){
		//echo '<pre>';print_r($this->input->post());exit;
		
		
		$res_product = $this->mod_product->add_product($this->input->post());
		
		if($res_product){
				
				$this->session->set_flashdata('ok_message', '- Product added successfully.');
				redirect(base_url().'manage_product/all_products');
				
		}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'manage_product/add_product');
				
		}//end if($res_shop)
		//echo '<pre>';print_r($this->input->post());exit;
		
	}

}