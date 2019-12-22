<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_assign_shop extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_assign_shop');
		
		if($this->session->userdata('user_type') != 1){
			redirect(SURL.'login/logout_user');
		}
		if($this->session->userdata('user_id') != TRUE){

			redirect(SURL);
			
		}

		

	}

	public function index(){
		
		
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		
		//$data['all_assign_record'] = $this->mod_assign_shop->get_all_record();
		
		$data['all_shop_res'] = $this->mod_assign_shop->get_all_shop();
		//echo "<pre>";print_r($data['all_assign_record']);
		//echo 'in manage quentity';exit;
		//echo '<pre>';print_r($data['all_shop_res']);exit;
		
		$this->load->view('assign_quantity/manag_assign_shop',$data);

	}
	
	public function assign_shop_process(){
		//$this->load->library('Ajax_pagination');
		//$all_record_res = $this->mod_assign_shop->get_all_record_ajax($this->input->post('p_id'));
		$all_record_res = $this->mod_assign_shop->get_sume_record_ajax_call($this->input->post('p_id'),0);
		if(count($all_record_res)>0){$count = 1;
			foreach($all_record_res as $res_value){
				?>
				
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo ucfirst($res_value['product_name']); ?></td>
					<td><?php echo $res_value['quantity']; ?></td>
					<td><?php echo $res_value['reorder_level']; ?></td>
					
					<td colspan="3" >
						
						
						<form action="<?php echo base_url();?>manage_assign_shop/assign_shop_quantity_process" enctype="multipart/form-data" method="post" id="frm_assign" >
							<div class="col-md-5">
								<input type="number" placeholder="Product Quantity" required="required" id="new_quantity" value="" name="new_quantity" class="form-control">
								<input type="hidden" readonly="readonly" placeholder="Product Quantity" required id="quantity" value="<?php echo $res_value['quantity']?>" name="quantity" class="form-control">
							</div>
							<div class="col-md-5">
								<select name="action_type" class="form-control" style="margin-left: -6px;">
									<option value="add">Add Quantity</option>
									<option value="adjust">Adjust Quantity</option>
									<option value="return">Return Quantity</option>
								</select>
								
							</div> 
							<div class="col-md-2">
								
								<input type="hidden" name="id" value="<?php echo $res_value['id']; ?>" class="form-control">
								<input type="submit" id="save" value="Update" class="btn btn-success btn-sm  bounceIn animation-delay5 pull-right submit" />
							</div>
						</form>
						
					</td>

				</tr>
				<?php $count ++;
			}?>
			<?php if(count($all_record_res) == 10){ ?>
				<tr>
					<style> .costom-agline-butn input{margin-left:477px;border: none;background-color: #495B6C; padding: 11px 21px; color:#fff; font-weight:bold; font-size:15px; border-radius:5px;}
						.costom-agline-butn input:hover{ background-color:#000; border-radius:5px;}
						@media screen and (max-width: 360px){
							.costom-agline-butn input{margin-left:120px; padding: 9px 15px; font-size:12px;}
						}
						
					</style>
					<td colspan="6">
						<div class="costom-agline-butn">
							
							<input type="button" name="load_more" id="load_more" onclick="load_new(0)" value="Load More"/>
						</div>
					</td>
				</tr>
				<?php }?>
				<?php 
			}else{
				echo '<tr><td>No Record Found</td></tr>';	
			}
		}
		
		public function assign_shop_process_2(){
		//$this->load->library('Ajax_pagination');
		//$all_record_res = $this->mod_assign_shop->get_all_record_ajax($this->input->post('p_id'));
			$all_record_res = $this->mod_assign_shop->get_sume_record_ajax_call($this->input->post('p_id'),$this->input->post('varient'));
			if(count($all_record_res)>0){$count = 1;
				foreach($all_record_res as $res_value){
					?>
					
					<tr>
						<td><?php echo $count;?></td>
						<td><?php echo ucfirst($res_value['product_name']); ?></td>
						<td><?php echo $res_value['quantity']; ?></td>
						<td><?php echo $res_value['reorder_level']; ?></td>
						
						<td colspan="3" >
							
							
							<form action="<?php echo base_url();?>manage_assign_shop/assign_shop_quantity_process" enctype="multipart/form-data" method="post" id="frm_assign" >
								<div class="col-md-5">
									<input type="number" placeholder="Product Quantity" required="required" id="new_quantity" value="" name="new_quantity" class="form-control">
									<input type="hidden" readonly="readonly" placeholder="Product Quantity" required id="quantity" value="<?php echo $res_value['quantity']?>" name="quantity" class="form-control">
								</div>
								<div class="col-md-5">
									<select name="action_type" class="form-control">
										<option value="add">Add Quantity</option>
										<option value="adjust">Adjust Quantity</option>
										<option value="return">Return Quantity</option>
									</select>
									
								</div> 
								<div class="col-md-2">
									
									<input type="hidden" name="id" value="<?php echo $res_value['id']; ?>" class="form-control">
									<input type="submit" id="save" value="Update" class="btn btn-success btn-sm  bounceIn animation-delay5 pull-right submit" />
								</div>
							</form>
							
						</td>

					</tr>
					<?php $count ++;
				}?>
				<?php if(count($all_record_res) == 10){ ?>
					<tr>
						<style> .costom-agline-butn input{margin-left:477px;border: none;background-color: #495B6C; padding: 11px 21px; color:#fff; font-weight:bold; font-size:15px; border-radius:5px;}
							.costom-agline-butn input:hover{ background-color:#000; border-radius:5px;}
							@media screen and (max-width: 360px){
								.costom-agline-butn input{margin-left:120px; padding: 9px 15px; font-size:12px;}
							}
							
						</style>
						<td colspan="6">
							<div class="costom-agline-butn">
								<input type="button" name="load_more" id="load_more" onclick="load_new(<?php echo $this->input->post('varient');?>)" value="Load More"/>
							</div>
						</td>
					</tr>
					<?php }?>
					<?php 
				}else{
					echo '<tr><td>No Record Found</td></tr>';	
				}
			}
			
			
	public function search_assign_shop(){
		//echo '<pre>';print_r($this->input->post());exit;
				$all_record_res = $this->mod_assign_shop->get_all_record_ajax_serch($this->input->post());
				if(count($all_record_res)>0){$count = 1;
					foreach($all_record_res as $res_value){
						?>
						
						<tr>
							<td><?php echo $count;?></td>
							<td><?php echo ucfirst($res_value['product_name']); ?></td>
							<td><?php echo $res_value['quantity']; ?></td>
							<td><?php echo $res_value['reorder_level']; ?></td>
							
							<td colspan="3" >
								
								
								<form action="<?php echo base_url();?>manage_assign_shop/assign_shop_quantity_process" enctype="multipart/form-data" method="post" id="frm_assign" >
									<div class="col-md-5">
										<input type="number" placeholder="Product Quantity" required="required" id="new_quantity" value="" name="new_quantity" class="form-control">
										<input type="hidden" readonly="readonly" placeholder="Product Quantity" required id="quantity" value="<?php echo $res_value['quantity']?>" name="quantity" class="form-control">
									</div>
									<div class="col-md-5">
										<select name="action_type" class="form-control">
											<option value="add">Add Quantity</option>
											<option value="adjust">Adjust Quantity</option>
											<option value="return">Return Quantity</option>
										</select>
										
									</div> 
									<div class="col-md-2">
										
										<input type="hidden" name="id" value="<?php echo $res_value['id']; ?>" class="form-control">
										<input type="submit" id="save" value="Update" class="btn btn-success btn-sm  bounceIn animation-delay5 pull-right submit" />
									</div>
								</form>
								
							</td>

						</tr>
						<?php $count ++;
					}
				}else{
					echo '<tr><td>No Record Found</td></tr>';	
				}
			}
			
			public function assign_shop_quantity_process(){
				
				$shop_id = $this->mod_assign_shop->get_shop_id($this->input->post('id'));
				
		//echo '<pre>';print_r($this->input->post());print_r($shop_id);exit;
				$res_shop = $this->mod_assign_shop->update_assign_shop_record($this->input->post());
				
				if($res_shop){
					
					$this->session->set_userdata("shop_id_1", $shop_id['shop_id']);
					$this->session->set_flashdata('ok_message', '- Quantity updated successfully.');
					redirect(base_url().'manage_assign_shop');
					
				}else{
					$this->session->set_flashdata('err_message', '- Not Updated. Quantity is not correct.');
					redirect(base_url().'manage_assign_shop');
					
				}
			}
			
			public function assign_quantity(){
		//echo 'adding shop';exit;
				$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
				$data['header'] = $this->load->view('common/header', '', TRUE);
				$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
				$data['footer'] = $this->load->view('common/footer', '', TRUE);
				
				$data['all_shop'] = $this->mod_assign_shop->get_all_shop();
				$data['all_product'] = $this->mod_assign_shop->get_all_product();
		//echo "<pre>";print_r($data['all_product']);exit;
				$this->load->view('assign_quantity/assign_quantity',$data);
			}
			
			public function edit_assign_quantity($id){
		//echo $id;exit;
				$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
				$data['header'] = $this->load->view('common/header', '', TRUE);
				$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
				$data['footer'] = $this->load->view('common/footer', '', TRUE);
				
				$data['assign_detail'] = $this->mod_assign_shop->get_assign_detail($id);
				
				$data['all_shop'] = $this->mod_assign_shop->get_all_shop();
				$data['all_product'] = $this->mod_assign_shop->get_all_product();
				
		//echo '<pre>';print_r($data['assign_detail']);exit;
				$this->load->view('assign_quantity/edit_assign_quantity',$data);
			}
			
			public function edit_assign_quantity_process(){
				
				echo '<pre>';print_r($this->input->post());exit;
				$res_shop = $this->mod_shop->update_shop_record($this->input->post());
				if($res_shop){
					
					$this->session->set_flashdata('ok_message', '- Shop Record Updated successfully.');
					redirect(base_url().'manage_assign_shop');
					
				}else{
					$this->session->set_flashdata('err_message', '- Not Updated. Something went wrong, please try again.');
					redirect(base_url().'manage_assign_shop/edit_shop/'.$this->input->post('id'));
					
				}
				
			}
			
			public function assign_quantity_process(){
		//echo '<pre>';print_r($this->input->post());exit;
				
				
				$res_shop = $this->mod_assign_shop->assign_quantity($this->input->post());
				
				if($res_shop){
					
					$this->session->set_flashdata('ok_message', '- Product Assign successfully.');
					redirect(base_url().'manage_assign_shop');
					
				}else{
					$this->session->set_flashdata('err_message', '- data not added. Something went wrong, please try again.');
					redirect(base_url().'manage_assign_shop/add_shop');
					
		}//end if($res_shop)
		//echo '<pre>';print_r($this->input->post());exit;
		
	}

}