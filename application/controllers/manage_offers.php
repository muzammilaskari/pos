<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_offers extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_offers');
		   $this->load->library('pagination');
		  
		if($this->session->userdata('user_type') != 1){
			redirect(SURL.'login/logout_user');
		}
		
		if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 }

		

	}
	
	

	public function all_offers($variant=0){
		//echo 'in offer listing';exit;
			//$product=$this->mod_product->num_rows('product');
		
		/*$config["base_url"] = base_url() . "manage_product/all_products/";
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
		
		
		$this->pagination->initialize($config);*/
	
		//echo 'in manage shop';exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		//$data['all_product'] = $this->mod_product->get_product('product',$config['per_page'],$variant);
		
		//echo '<pre>';print_r($data['all_shop']);exit;
		$data['all_offers'] = $this->mod_offers->get_all_offers();
		
		$this->load->view('offers/manag_offers',$data);

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
	
	public function list_product(){
		
		//echo 'in manage shop';exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['all_product'] = $this->mod_product->get_all_res_product();
		
		//echo '<pre>';print_r($data['all_shop']);exit;
		
		$this->load->view('product/manag_list_product',$data);

	}
	
	public function search_product_res(){
		$res_serch_prd_all_product = $this->mod_product->get_all_res_product_res_serch($this->input->post());
		?>
        <?php if(isset($res_serch_prd_all_product) && (count($res_serch_prd_all_product) > 0)){$count = 1;
									foreach($res_serch_prd_all_product as $res){	
					?>
                    <tr>
                      <td><?php echo $count;?></td>
                      <td><?php echo ucfirst($res['product_name']); ?></td>
                      <td><?php echo $res['quantity']; ?></td>
                      <td><?php echo $res['reorder_level']; ?></td>
                      <td><?php if($res['status']==1){?>
                        <span class="label label-success">Active</span>
                        <?php }else{?>
                        <span class="label label-danger">Inactive</span>
                        <?php }?></td>
                      <!--<td><?php //echo date('M d Y',strtotime($res['created_date'])); ?></td>--?
                      <!--<td>
                                <div class="btn-group">
                                    <button class="btn btn-success">Action</button>
                                    <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu slidedown">
                                        <li><a href="<?php echo base_url();?>manage_product/edit_product/<?php echo $res['id'];?>">Edit</a></li>
                                        <li><a onclick="return del_rec();" href="<?php echo base_url();?>manage_product/delete_product/<?php echo $res['id']; ?>">Delete</a></li>
                                        
                                    </ul>
                                </div>
                                </td>-->

<form action="<?php echo SURL?>manage_product/edit_listing_product_process" enctype="multipart/form-data" method="post" id="frm_add" >
                      <td>
                          
                            <input type="number" placeholder="Product Quantity" required="required" id="new_quantity" value="" name="new_quantity" class="form-control">
                            <input type="hidden" readonly="readonly" placeholder="Product Quantity" required id="quantity" value="<?php echo $res['quantity']?>" name="quantity" class="form-control">
                            </td>
                            <td>
                            	<select name="action_type" class="form-control">
                                	<option value="add">Add Quantity</option>
                                    <option value="adjust">Adjust Quantity</option>
                                </select>
                            </td>
                            <td>
                            
                            
                            <input type="hidden" name="id" value="<?php echo $res['id']; ?>" class="form-control">
                            <input type="submit" id="save" value="Update" class="btn btn-success btn-sm  bounceIn animation-delay5 submit" />
                          
                        </td>
                        </form>
                    </tr>
                    <?php $count++;}
							}else{?>
                    <tr>
                      <td colspan="4">No record Found</td>
                    </tr>
                    <?php }?>
        <?php 		
	}
	
	public function add_offers(){
		//echo 'adding offers';exit;
		$data['all_product'] = $this->mod_offers->get_all_product();
		
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		//echo '<pre>';print_r($data['all_product']);exit;
		
		$this->load->view('offers/add_offers',$data);
	}
	public function add_another_product_process(){
		//echo $id;exit;
		//echo $this->input->post('counter');exit;
		$all_product = $this->mod_offers->get_all_product();
		?>
        <?php if(count($all_product)>0){?>
        <div id="res_<?php echo $this->input->post('counter');?>">
        <div class="costom-remove-form">
        <div class="row">
            <div class="col-md-6">
            <label class="">Select Product</label>
            <section id="intro">
                <select name="product_id[]" id="prd_id<?php echo $this->input->post('conut');?>" class="form-control">
                    <?php foreach($all_product as $product){?>
                        <option value="<?php echo $product['id'];?>"><?php echo $product['product_name'];?></option>
                    <?php }?>
                </select>
            </section>
            </div>
        
            <div class="col-md-4">
            <label class="">Quantity</label>
           <input type="number" placeholder="Quantity" required id="quantity" name="quantity[]" class="form-control">
            </div>
            
            <div class="col-md-2">
           	<input type="button" id="del_div" value="Remove" onclick="resdiv('res_<?php echo $this->input->post('counter');?>')" class="form-control btn-danger">
            </div>
        </div>
        </div>
        </div>
        <style>.btn-danger{color: #fff; background-color: #d9534f;border-color: #d43f3a;margin-top: 22px;}</style>
        <?php }else{?>
        NO Product is added
        <?php }?>
        <?php
	}
	
	public function view_offers($id){
		//echo $id;exit;
		
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['offer_detail'] = $this->mod_offers->get_offer_detail($id);
		
		$data['offer_related'] = $this->mod_offers->get_offer_detail_record($id);
		
		$data['all_product'] = $this->mod_offers->get_all_product();
		//echo '<pre>';print_r($data['all_product']);exit;
		
		$this->load->view('offers/view_offers',$data);
	}
	
	public function delete_offer($id){
		//echo $id;exit;
		$res_shop = $this->mod_offers->del_offer_record($id);
		
		if($res_shop){
				
				$this->session->set_flashdata('ok_message', '- offer Record Deleted successfully.');
				redirect(base_url().'manage_offers/all_offers');
				
		}else{
				$this->session->set_flashdata('err_message', '- Not Deleted. Something went wrong, please try again.');
					redirect(base_url().'manage_offers/all_offers');
				
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
	
	public function add_offers_process(){
		//echo '<pre>';print_r($this->input->post());exit;
		
		
		$res_product = $this->mod_offers->add_offir($this->input->post());
		
		if($res_product){
				
				$this->session->set_flashdata('ok_message', '- Offer added successfully.');
				redirect(base_url().'manage_offers/all_offers');
				
		}else{
				$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'manage_offers/add_offers');
				
		}//end if($res_shop)
		//echo '<pre>';print_r($this->input->post());exit;
		
	}

}