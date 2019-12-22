<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_shop extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_user_shop');
		$this->load->library('pagination');
		$this->load->model('mod_check_in_out');
		
		if($this->session->userdata('user_id') != TRUE){

	 	redirect(SURL);
		
		 }

		

	}

	public function index(){
		 //echo $this->session->userdata('shop_id');
		 //echo 'testing';exit;
		$data['header_script'] = $this->load->view('common/user_shop/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/user_shop/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/user_shop/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/user_shop/footer', '', TRUE);
		$data['check_in']=$this->session->userdata('check_in_status');
$this->mod_check_in_out->get_checkin_status();
			
		// echo $date['check_in']; exit;
		$this->load->view('user_shop/dashboad', $data);

	}

	public function shop_detail($shop_id){
		
		$shop_name = $this->mod_user_shop->get_shop_detail($shop_id);
		$this->session->set_userdata('shop_id',$shop_id);
		$this->session->set_userdata('shop_name',$shop_name['shop_title']);
		redirect(base_url().'user_shop');
		
	}
	
	public function assign_stock(){
		//echo 'in shop assign stock';
		$data['header_script'] = $this->load->view('common/user_shop/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/user_shop/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/user_shop/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/user_shop/footer', '', TRUE);
		
		$data['shop_assign_stock'] = $this->mod_user_shop->get_assign_stock();
		
		//echo '<pre>';print_r($data['shop_assign_stock']);exit;
		
		$this->load->view('user_shop/stock_assign_report', $data);
	}
	
	public function assign_stock_process(){
		//echo $this->input->post('s_date');
		
		//echo 'stock in date process';
		$shop_assign_stock = $this->mod_user_shop->get_assign_stock_ajax($this->input->post('s_date'));
		?>
        <?php if(isset($shop_assign_stock) && (count($shop_assign_stock)>0)){$count = 1;?>
				<?php foreach($shop_assign_stock as $product_assign){?>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $product_assign['product_name'];?></td>
                        <td><?php echo $product_assign['quantity'];?></td>
                        <!--<td><?php echo date('Y-m-d',strtotime($product_added['created_date']));?></td>-->
                    </tr>
                <?php $count++;}?>
                <?php }else{?>
                    <tr>
                        <td colspan="4">No Record Found</td>
                    </tr>
                <?php }?>
		<?php
	}
	
	public function manage_stock($variant=0){
		
		$product=$this->mod_user_shop->get_stock_count();
		
		$config["base_url"] = base_url() . "user_shop/manage_stock/";
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
		
		$data['header_script'] = $this->load->view('common/user_shop/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/user_shop/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/user_shop/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/user_shop/footer', '', TRUE);
		
		$data['shop_stock'] = $this->mod_user_shop->get_stock($config['per_page'],$variant);
		
		//echo '<pre>';print_r($data['shop_stock']);exit;
		
		$this->load->view('user_shop/stock_list', $data);
	}
	
	public function sales_listing_sheet(){
		
		$data['header_script'] = $this->load->view('common/user_shop/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/user_shop/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/user_shop/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/user_shop/footer', '', TRUE);
		
		$data['shop_sale_stock'] = $this->mod_user_shop->get_sale_stock();
		
		$data['product_sale_stock'] = $this->mod_user_shop->get_sale_product_detail();
		
		//echo '<pre>';print_r($data['product_sale_stock']);exit;
		
		$this->load->view('user_shop/stock_sale_list', $data);
		
	}
	
	public function assign_quantity(){
		
		//echo '<pre>';print_r($this->session->userdata);exit;
		//echo 'adding shop';exit;
		$data['header_script'] = $this->load->view('common/user_shop/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/user_shop/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/user_shop/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/user_shop/footer', '', TRUE);
		
		$data['all_shop'] = $this->mod_user_shop->get_all_shop();
		$data['all_product'] = $this->mod_user_shop->get_all_product();
		//echo "<pre>";print_r($data['all_product']);exit;
		$this->load->view('user_shop/assign_quantity_1',$data);
	}
	
	public function assign_quantity_process(){
		$res_shop = $this->mod_user_shop->update_product_quantity($this->input->post());
		if($res_shop){
			$this->session->set_flashdata('ok_message', '- Quantity Added Successfully.');
					redirect(base_url().'user_shop/assign_quantity');
		}else{
			$this->session->set_flashdata('err_message', '- Something went wrong, Please Tray Again.');
					redirect(base_url().'user_shop/assign_quantity');
		}
		//echo $this->session->userdata('shop_id').'<pre>';print_r($this->input->post());exit;
		
	}
	
	public function sales_sheet(){
		
		$this->session->set_userdata('sale_session',array());
		
		$this->session->set_userdata('sale_session_offer',array());
		
		$data['header_script'] = $this->load->view('common/user_shop/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/user_shop/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/user_shop/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/user_shop/footer', '', TRUE);
		
		$data['product_listing'] = $this->mod_user_shop->get_stock_listing();
		
		$data['offer_listing'] = $this->mod_user_shop->get_offer_listing();
		
		//echo '<pre>';print_r($data['offer_listing']);exit;
		
		$this->load->view('user_shop/shop_quantity_sale', $data);
		
		//echo 'in sales sheet';
	}
	public function offer_product($off_id){
		
		$offer_product = $this->mod_user_shop->get_offer_product($off_id);
		//echo $off_id;
		?>
        
        <div class="modal fade" id="<?php echo $off_id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header-costom-color">
         <h4>Select Product</h4>
        </div>
        <form action="<?php echo SURL?>user_shop/set_product" enctype="multipart/form-data" method="post" id="offer_product" >
        <div class="modal-body">
        
        <?php foreach($offer_product as $value){ 
		?>
        <div class="row">
        <div class="col-md-1">
        <input type="checkbox" name="product[]" value="<?php echo $value['product_id'].','.$value['offer_id'];?>">
       </div><!--end of col--> 
        <div class="col-md-4">
		<?php echo $value['product_name'];?>
        </div><!--end of col-->
        <div class="col-md-2">
        <input type="text" name="prdqun_<?php echo $value['product_id'];?>" value="<?php echo $value['product_quantity'];?>"  />
        </div><!--end of col-->
        </div><!--end of row-->
        <br>
        <?php	
		  }?>
       
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <input type="button" class="costom-save" name="btn-save" id="save_product" data-dismiss="modal" value="Save"/>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <script>
  $("#save_product").click(function(){
			//alert('testing');
            $.ajax({

                type: "POST",

                url: "<?php echo SURL; ?>user_shop/set_product/",

                data: $("#offer_product").serialize(),

                success: function(result){
					 
						$("#res_responce_123").html(result);

                }

            });  

    });
  </script>
        
        <?php
	}
	
	public function set_product(){
		extract($this->input->post());
		if(count($product)>0){
			
			$off_id = explode(',',$product[0]);
			foreach($product as $prd_val){
				$temp_prd_val = explode(',',$prd_val);
				$quantity = $this->input->post('prdqun_'.$temp_prd_val[0]);
				
				$res_prd_qunty[] = $temp_prd_val[0].','.$temp_prd_val[1].','.$quantity;
			}
			
			//$ins_product[$off_id[1]] = $product;
			$ins_product[$off_id[1]] = $res_prd_qunty;
		$old_que_ans_session =  $this->session->userdata('sale_session_offer');
		//$abc = array('a','b','c');exit;
		array_push($old_que_ans_session, $ins_product);
		
		$this->session->set_userdata('sale_session_offer', $old_que_ans_session);
		}
		
	}
	
	public function sales_process_complt(){
		//echo '<pre>';print_r($this->input->post());exit;
		if(!(count($this->session->userdata('sale_session'))>0)){
			$this->session->set_flashdata('err_message', '- Select Product then click Save.');
					redirect(base_url().'user_shop/sales_sheet');
		}
		
		$product_listing = $this->mod_user_shop->insert_sale($this->input->post());
		if($product_listing){
			$this->session->set_flashdata('ok_message', '- Sale Record Added Successfully.');
			redirect(base_url().'user_shop/sale_detail_result');
			//redirect(base_url().'user_shop/sales_listing_sheet');
		}else{
			$this->session->set_flashdata('err_message', '- Quantity is  not Correct.');
			redirect(base_url().'user_shop/sales_sheet');
		}
		
	}
	
	public function sale_detail_result($sale_id = ''){
		
		$data['header_script'] = $this->load->view('common/user_shop/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/user_shop/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/user_shop/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/user_shop/footer', '', TRUE);
		
		$data['sales_detail'] = $this->mod_user_shop->get_last_sale_id($sale_id);
		
		$data['sales_product_detail'] = $this->mod_user_shop->get_all_sale_product($data['sales_detail']['id']);
		//echo '<pre>';print_r($data['sales_product_detail']);exit;
		
		$this->load->view('user_shop/shop_quantity_sale_detail', $data);
	}
	
	public function sales_detial_report($sale_id = ''){
		$this->load->library('m_pdf');
		
		$data['sales_detail'] = $this->mod_user_shop->get_last_sale_id($sale_id);
		$data['sales_product_detail'] = $this->mod_user_shop->get_all_sale_product($data['sales_detail']['id']);
		
		//echo '<pre>';print_r($data['sales_detail']);exit;
		
		$html = $this->load->view('user_shop/sales_report_pdf', $data, true);
		$pdfFilePath = "transaction_".date('Y-m-d').".pdf";

       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
		
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}
	
	public function check_product_value($code){
		$product_value = $this->mod_user_shop->get_product_code_check($code);
		if(count($product_value)>0){
		?>
        <select name="product_id" id="product_id" class="form-control" onchange="get_price()">
        	<option value="<?php echo $product_value[0]['product_id'].','.$product_value[0]['price'].','.$product_value[0]['product_type'];?>"><?php echo $product_value[0]['product_name'].'('.$product_value[0]['quantity'].')';?></option>
        </select>
        <?php
		}else{
			echo '1';	
		}
		//echo 'testing<pre>';print_r($data['product_listing']);exit;
	}
	
	public function unset_session_process($index){
		
		$product_listing = $this->mod_user_shop->get_stock_listing();
		$offer_listing = $this->mod_user_shop->get_offer_listing();
		$old_que_ans_session =  $this->session->userdata('sale_session');
		
		$index_key = $old_que_ans_session[$index];
		$oft_id = explode(',',$index_key['product_id']);
		$prd_session =  $this->session->userdata('sale_session_offer');
		foreach($prd_session as $key=>$prd_value){
			if($oft_id[0] == key($prd_value)){
				unset($prd_session[$key]);
				break;
			}
		}
		$this->session->set_userdata('sale_session_offer', $prd_session);
		
		unset($old_que_ans_session[$index]);
		
		$count = 1;
		$total_price = 0;
		$this->session->set_userdata('sale_session', $old_que_ans_session);
		
		if(count($this->session->userdata('sale_session'))>0){
			foreach($this->session->userdata('sale_session') as $key=>$sale_value){//print_r($sale_value);exit;
			$res_array_post = explode(',',$sale_value['product_id']);
			?>
			<tr>
				<td><?php echo $count;?></td>
				<td><?php foreach($product_listing as $product_name){if($product_name['product_id'] == $res_array_post[0]){echo $product_name['product_name'];}} ?>
                	 <?php foreach($offer_listing as $offer_value){if($offer_value['id'] == $res_array_post[0]){?>
					<?php echo $offer_value['product_name'];?>(Offer)
                    <?php }}?>
                </td>
				<td><?php echo $sale_value['quantity']; ?></td>
				<td><?php echo $sale_value['price']; ?></td>
                <td><?php echo $sale_value['tprice']; ?></td>
                <td> <span onclick="del_rec(<?php echo $key; ?>)">
               <a href="#" data-toggle="tooltip" title="Delete"><i class="fa costom-fa-icon fa-times red" aria-hidden="true"></i></a></span>
                </td>
                
                
                
			</tr>
		<?php $count++; $total_price = $total_price + $sale_value['tprice'];}?>
        	<tr>
            	<td><b> Total Price</b></td>
                <td id="total_price"> <?php echo $total_price;?></td>
            </tr>
		<script>
			$("#remaning_ammount").text(<?php echo $total_price;?>);
			cal_res();
		</script>
        <?php
		}else{
			?>
            <tr>
            	<td colspan="4"> <b>No Recourd Found</b></td>
            </tr>
            <?php
		}
		
		//echo "<pre>".$index;print_r($this->session->userdata('sale_session'));
	}
	
	public function sales_process(){
		
		//$res_data = $this->session->set_userdata('sale_session', $this->input->post());
		//echo '<pre>';print_r($this->session->userdata('sale_session'));exit;
		//echo '<pre>';print_r($this->session->userdata('sale_session_offer'));exit;
		$product_listing = $this->mod_user_shop->get_stock_listing();
		
		$offer_listing = $this->mod_user_shop->get_offer_listing();
		
		//echo '<pre>';print_r($this->input->post());exit;
		$old_que_ans_session =  $this->session->userdata('sale_session');
		array_push($old_que_ans_session, $this->input->post());
		$this->session->set_userdata('sale_session', $old_que_ans_session);
		$count = 1;
		$total_price = 0;
		foreach($this->session->userdata('sale_session') as $key=>$sale_value){//print_r($sale_value);exit;
			$res_array_post = explode(',',$sale_value['product_id']);
			?>
			<tr>
				<td><?php echo $count;?></td>
				<td><?php foreach($product_listing as $product_name){if($product_name['product_id'] == $res_array_post[0]){echo $product_name['product_name'];}} ?>
                <?php foreach($offer_listing as $offer_value){if($offer_value['id'] == $res_array_post[0]){?>
                <?php echo $offer_value['product_name'];?>(Offer)
				<?php }}?>
                </td>
				<td><?php echo $sale_value['quantity']; ?></td>
				<td><?php echo $sale_value['price']; ?></td>
                <td><?php echo $sale_value['tprice']; ?></td>
                <td> <span onclick="del_rec(<?php echo $key; ?>)">
                <a href="#" data-toggle="tooltip" title="Delete"><i class="fa costom-fa-icon fa-times red" aria-hidden="true"></i></a></span>
                </td>
                
                
               
                
                
			</tr>
		<?php $count++; $total_price = $total_price + $sale_value['tprice'];}?>
        	<tr>
            	<td><b> Total Price </b></td>
                <td id="total_price"><?php echo $total_price;?></td>
            </tr>
		<script>
		$("#remaning_ammount").text(<?php echo $total_price;?>);
		cal_res();
		</script>
        <?php 
		//echo '<pre>';print_r($this->session->userdata('sale_session'));
	}
	
}