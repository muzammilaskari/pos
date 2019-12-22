<?php
class mod_user_shop extends CI_Model {
	
	function __construct(){
		
        parent::__construct();

    }
	
	public function get_stock_count(){
		
		$shopid = $this->session->userdata('shop_id');//exit;
				
		$this->db->dbprefix('product_assig');
		$this->db->select('product_assig.*,product.product_name,product.reorder_level');
		$this->db->from('product_assig');
		$this->db->join('product', 'product.id = product_assig.product_id');
	  	$this->db->where('product_assig.shop_id',$shopid);
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		//echo $this->db->last_query();exit;
		return $get_all_users->num_rows();
		
	}
	
	public function get_all_shop(){
		
				
		$this->db->dbprefix('shops');
		$this->db->select('*');
	  	$this->db->where('status','1');
		$this->db->where('del_status','0');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('shops');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function update_product_quantity($data){
		extract($data);
		//echo $product_id.'<pre>In Shop controller';print_r($data);
		/*========================== Getting Data of Product ===============*/
			$this->db->dbprefix('product');
			$this->db->select('*');
			$this->db->where('id',$product_id);
			$get_product_detail = $this->db->get('product')->row_array();
		/*========================== End Getting Data of Product ===============*/
		$old_quantity = $get_product_detail['quantity'];
		$new_quantity = $old_quantity + $quantity;
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		$shop_id = $this->session->userdata('shop_id');
		$title_detail = 'product added';
		
		$ins_data = array(
		   'product_id' => $this->db->escape_str(trim($product_id)),
		   'quantity' => $this->db->escape_str(trim($quantity)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'created_by' => $this->db->escape_str(trim($created_by)),	   
		   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'created_by_title' => $this->db->escape_str(trim($title_detail)),
			);
		
		$this->db->dbprefix('log');
		$ins_into_db = $this->db->insert('log', $ins_data);
		
		$update_data = array(
			   'quantity' => $this->db->escape_str(trim($new_quantity)),
			   'modify_date' => $this->db->escape_str(trim($created_date)),
			   'modify_by' => $this->db->escape_str(trim($created_by)),
			   'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
			);
		//print_r($update_data);exit;
		$this->db->dbprefix('product');
		$this->db->where('id',$product_id);
		$ins_into_db = $this->db->update('product', $update_data);
		
		/*========================== Getting Quantity from Assign shop Quantity =============*/
			$this->db->dbprefix('product_assig');
			$this->db->select('*');
			$this->db->where('product_id',$product_id);
			$this->db->where('shop_id',$shop_id);
			$get_assign_product_detail = $this->db->get('product_assig')->row_array();
			//echo $this->db->last_query().'<pre>';print_r($get_assign_product_detail);exit;
		/*======================== End Getting Quantity from Assign shop Quantity ===========*/
		//echo $old_quantity;
		$assign_quantity = $get_assign_product_detail['quantity'] + $quantity;
		$update_product_quantity = array(
		   'quantity' => $this->db->escape_str(trim($assign_quantity)),
		   'modify_date' => $this->db->escape_str(trim($created_date)),
		   'modify_by' => $this->db->escape_str(trim($created_by)),
		   'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
		);
		
		$this->db->dbprefix('product_assig');
		$this->db->where('product_id',$product_id);
		$this->db->where('shop_id',$shop_id);
		$ins_into_db = $this->db->update('product_assig', $update_product_quantity);
		
		$update_data = array(
			   'quantity' => $this->db->escape_str(trim($old_quantity)),
			   'modify_date' => $this->db->escape_str(trim($created_date)),
			   'modify_by' => $this->db->escape_str(trim($created_by)),
			   'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
			);
		//print_r($update_data);exit;
		$this->db->dbprefix('product');
		$this->db->where('id',$product_id);
		$ins_into_db = $this->db->update('product', $update_data);
		
		$prd_title = 'product assign add';
		$ins_log_data = array(
		   'product_id' => $this->db->escape_str(trim($product_id)),
		   'shop_id' => $this->db->escape_str(trim($shop_id)),
		   'quantity' => $this->db->escape_str(trim($quantity)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'created_by' => $this->db->escape_str(trim($created_by)),	   
		   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
		   'created_by_title' => $this->db->escape_str(trim($prd_title)),
		);
		
		$this->db->dbprefix('log');
		$ins_into_db = $this->db->insert('log', $ins_log_data);
		
		if($ins_into_db){
			return true;
		}else{
			return false;	
		}
	}
	
	public function get_all_product(){
		
				
		$this->db->dbprefix('product');
		$this->db->select('*');
	  	$this->db->where('status','1');
		$this->db->where('del_status','0');
		$this->db->where('product_type','0');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('product');
		
		
		return $get_all_users->result_array();
		
	}
	
	public function get_shop_detail($shop_id){
		$this->db->dbprefix('shops');
		$this->db->select('*');
		$this->db->where('id',$shop_id);
		
		$get_all_users = $this->db->get('shops');
		
		
		return $get_all_users->row_array();
	}
	
	public function get_stock($limit,$id){
		
		$shopid = $this->session->userdata('shop_id');//exit;
				
		$this->db->dbprefix('product_assig');
		$this->db->select('product_assig.*,product.product_name,product.reorder_level');
		$this->db->from('product_assig');
		$this->db->join('product', 'product.id = product_assig.product_id');
	  	$this->db->where('product_assig.shop_id',$shopid);
		$this->db->order_by("id", "DESC");
		$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		//echo $this->db->last_query();exit;
		return $get_all_users->result_array();
		
	}
	
	public function get_assign_stock(){
		
		$shopid = $this->session->userdata('shop_id');//exit;
		$created_date = date('Y-m-d');
				
		$this->db->dbprefix('log');
		$this->db->select('log.*,product.product_name');
		$this->db->from('log');
		$this->db->join('product', 'product.id = log.product_id');
	  	$this->db->where('log.shop_id',$shopid);
			$where = "DATE(`im_log`.`created_date`) = '".$created_date."'";
		$this->db->where($where);
		$this->db->order_by("log.id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_assign_product = $this->db->get();
		
		//echo $this->db->last_query();exit;
		
		return $get_all_assign_product->result_array();
		
	}
	
	public function get_assign_stock_ajax($date){
		
		$shopid = $this->session->userdata('shop_id');//exit;
		$created_date = date('Y-m-d',strtotime($date));
				
		$this->db->dbprefix('log');
		$this->db->select('log.*,product.product_name');
		$this->db->from('log');
		$this->db->join('product', 'product.id = log.product_id');
	  	$this->db->where('log.shop_id',$shopid);
			$where = "DATE(`im_log`.`created_date`) = '".$created_date."'";
		$this->db->where($where);
		$this->db->order_by("log.id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_assign_product = $this->db->get();
		
		//echo $this->db->last_query();exit;
		
		return $get_all_assign_product->result_array();
		
	}
	
	public function insert_sale($data){
		
		extract($data);
		if($discount > 100){
			return false;
		}
		
		$remaning_ammount = 100-$discount;
		$remaning_ammount = $remaning_ammount/100;
		
		$created_date = date('Y-m-d G:i:s');
		$ip_address = $this->input->ip_address();
		$created_by = $this->session->userdata('user_id');
		$shop_id = $this->session->userdata('shop_id');
		
		$total = 0;
		
		$post_data_sale_list = $this->session->userdata('sale_session');
		$post_data_offer_list = $this->session->userdata('sale_session_offer');
		$post_data_sale1 = array();
		$new_count = 0;
		
		//echo '<pre>';print_r($post_data_offer_list);
		//echo '<pre>';print_r($post_data_sale_list);exit;
		foreach($post_data_sale_list as $prd_res){
			$total = $total + $prd_res['tprice'];
			
			$prd_res_id = explode(',',$prd_res['product_id']);
			
			/*$this->db->dbprefix('product');
			$this->db->select('product_type');
			$this->db->where('id',$prd_res_id[0]);
			
			$get_prd_status = $this->db->get('product');
			$res_prd_status = $get_prd_status->row_array();
			if($res_prd_status['product_type'] == 1){*/
			if($prd_res_id[2] == 1){
				foreach($post_data_offer_list as $keys=>$ofr_values){
					if($prd_res_id[0] == key($ofr_values)){
						foreach($ofr_values as $ofr_new_val){
							foreach($ofr_new_val as $ofr_val_res){
								$oft_prod_id = explode(',',$ofr_val_res);
								/*========================= Get Offer Product Quantity From Post data ==================*/
								$post_data_sale1[$new_count]['product_id'] = $oft_prod_id[0].','.$prd_res_id[1];
								$post_data_sale1[$new_count]['quantity'] = $oft_prod_id[2]*$prd_res['quantity'];
								$post_data_sale1[$new_count]['price'] = $prd_res['price'];
								$post_data_sale1[$new_count]['tprice'] = $prd_res['tprice'];
								$new_count++;
								
								/*========================= End Get Offer Product Quantity From Post data ==============*/
							
							/*========================= Get Offer Product Quantity From DB ==================*/
							/*foreach($ofr_new_val as $ofr_val_res){
								$oft_prod_id = explode(',',$ofr_val_res);
							
							$this->db->dbprefix('offer_detail');
							$this->db->select('*');
							$this->db->where('offer_id',$prd_res_id[0]);
							$this->db->where('product_id',$oft_prod_id[0]);
							$get_offer_status = $this->db->get('offer_detail');
							$res_offer_array = $get_offer_status->row_array();
							
							$post_data_sale1[$new_count]['product_id'] = $res_offer_array['product_id'].','.$prd_res_id[1];
							$post_data_sale1[$new_count]['quantity'] = $res_offer_array['product_quantity']*$prd_res['quantity'];
							$post_data_sale1[$new_count]['price'] = $prd_res['price'];
							$post_data_sale1[$new_count]['tprice'] = $prd_res['tprice'];
							$new_count++;
							}*/
							/*========================= End Get Offer Product Quantity From DB ==================*/
							}
						}
					}
				}
				/*$this->db->dbprefix('offer_detail');
				$this->db->select('*');
				$this->db->where('offer_id',$prd_res_id[0]);
				
				$get_offer_status = $this->db->get('offer_detail');
				$res_offer_array = $get_offer_status->result_array();*/
				/*foreach($res_offer_array as $key=>$new_prd_array){
					$post_data_sale1[$new_count]['product_id'] = $new_prd_array['product_id'].','.$prd_res_id[1];
					$post_data_sale1[$new_count]['quantity'] = $new_prd_array['product_quantity']*$prd_res['quantity'];
					$post_data_sale1[$new_count]['price'] = $prd_res['price'];
					$post_data_sale1[$new_count]['tprice'] = $prd_res['tprice'];
					$new_count++;
				}*/
			}else{
				$post_data_sale1[$new_count] = $prd_res;
				$new_count++;
			}
			
		}
		$post_data_sale = $post_data_sale1;
		$total = $total * $remaning_ammount;
		
		//echo '<pre>';print_r($post_data_sale);exit;
		//echo '<pre>';print_r($post_data_offer_list);
		//echo '<pre>';print_r($post_data_sale_list);
		//echo '<pre>';print_r($data);exit;
		//echo $total.'<pre>';print_r($post_data_sale);exit;
		foreach($post_data_sale as $session_data){
			$post_product_id = explode(',',$session_data['product_id']);
			
			
			
			$this->db->dbprefix('product_assig');
			$this->db->select('quantity');
			$this->db->where('product_id',$post_product_id[0]);
			$this->db->where('shop_id',$shop_id);
			//$this->db->limit($limit,$id);
			
			$get_selected_product = $this->db->get('product_assig');
			//$total = $total + $session_data['tprice'];
			
			$res_selected_product = $get_selected_product->row_array();
			if($session_data['quantity'] > $res_selected_product['quantity']){
				return false;
			}
			
		}
		//echo $total;exit;
		
		/*================================ Add Sale Quantity ======================*/

		$ins_data = array(
		   'shop_id' => $this->db->escape_str(trim($shop_id)),
		   'created_by' => $this->db->escape_str(trim($created_by)),
		   'total' => $this->db->escape_str(trim($total)),
		   'sale_note' => $this->db->escape_str(trim($sale_comment)),
		   'discount' => $this->db->escape_str(trim($discount)),
		   'payment_method' => $this->db->escape_str(trim($p_type)),
		   'created_date' => $this->db->escape_str(trim($created_date)),
		   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
		);
		
		$this->db->dbprefix('sale');
		$ins_into_db = $this->db->insert('sale', $ins_data);
		/*================================ End Sale Quantity ======================*/
		$sale_id = $this->db->insert_id();
		
		$sal_ref =  date('Ymd').'-'.$sale_id;
		
		foreach($post_data_sale as $session_data){
			$post_product_id = explode(',',$session_data['product_id']);
			
			$this->db->dbprefix('product_assig');
			$this->db->select('quantity');
			$this->db->where('product_id',$post_product_id[0]);
			$this->db->where('shop_id',$shop_id);
			//$this->db->limit($limit,$id);
			
			$get_selected_product = $this->db->get('product_assig');
			
			$res_selected_product = $get_selected_product->row_array();
			$new_quantity = $res_selected_product['quantity'] - $session_data['quantity'];
			/*================================ Update Quantity ======================*/
				$update_assign_data = array(
					'quantity' => $this->db->escape_str(trim($new_quantity)),
					'modify_date' => $this->db->escape_str(trim($created_date)),
					'modify_by' => $this->db->escape_str(trim($created_by)),
					'modify_by_ip' => $this->db->escape_str(trim($ip_address)),
				);
				$this->db->dbprefix('product_assig');
				$this->db->where('product_id',$post_product_id[0]);
				$this->db->where('shop_id',$shop_id);
				$ins_into_db = $this->db->update('product_assig', $update_assign_data);
			/*============================== End Update Quantity ======================*/
			
			/*============================== Insert Data in Notification ======================*/
			$this->db->dbprefix('shops');
			$this->db->select('shop_title');
			$this->db->where('id',$shop_id);
			//$this->db->limit($limit,$id);
			
			$get_selected_shop_1 = $this->db->get('shops');
			
			$res_selected_shops_1 = $get_selected_shop_1->row_array();
			
			$this->db->dbprefix('product');
			$this->db->select('reorder_level,product_name');
			$this->db->where('id',$post_product_id[0]);
			//$this->db->limit($limit,$id);
			
			$get_selected_product_1 = $this->db->get('product');
			
			$res_selected_product_1 = $get_selected_product_1->row_array();
			
			//echo $new_quantity.'<pre>';print_r($res_selected_product_1);exit;
			
			if($res_selected_product_1['reorder_level'] > $new_quantity){
				
				$ins_notification_data = array(
				   'product_id' => $this->db->escape_str(trim($post_product_id[0])),
				   'shop_id' => $this->db->escape_str(trim($shop_id)),
				   'created_date' => $this->db->escape_str(trim($created_date)),
				   'created_by' => $this->db->escape_str(trim($created_by)),
				   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
				   'alert_title' => 'reorder',
				);
				
				$this->db->dbprefix('notification');
				$ins_into_db = $this->db->insert('notification', $ins_notification_data);
				
				$from = 'noreply@vape360.co.uk';
				$email_address = 'amzjjj@gmail.com';
				$email_subject = 'Product Reorder';
				$email_body = 'Dear Admin, <br>Product mentioned below is less then reorder level<br>Product Name: <b>'.$res_selected_product_1['product_name'].'</b><br> Shop Name:<b>'.$res_selected_shops_1['shop_title'].'</b><br>Reorder Level:'.$res_selected_product_1['reorder_level'].' </b><br><br> This is system Generated email';
				
				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
				$headers .= 'From: '.$from.' <'.$from.'>' . "\r\n";
			
				$headers .= "X-Priority: 3\r\n";
				$headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
			
				//$sendemail = mail($email_address, $email_subject, $email_body, $headers, "-f'$from'");
				
			}
			/*============================== Email if quantity is Zero ========================*/
			if($new_quantity < 1){
				
				$from = 'noreply@vape360.co.uk';
				$email_address = 'amzjjj@gmail.com';
				$email_subject = 'Product Quantity Zero';
				$email_body = 'Dear Admin, <br>Quantity of Product mentioned below is Zero <br>Product Name: <b>'.$res_selected_product_1['product_name'].'</b><br><br> This is system Generated email';
				
				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
				$headers .= 'From: '.$from.' <'.$from.'>' . "\r\n";
			
				$headers .= "X-Priority: 3\r\n";
				$headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
			
				//$sendemail = mail($email_address, $email_subject, $email_body, $headers, "-f'$from'");
			}
			/*============================== End Email if quantity is Zero ====================*/
			
			/*============================== End Insert Data in Notification ==================*/
			
			
			
		}
		foreach($post_data_sale_list as $sal_dtl){
			$post_product_id = explode(',',$sal_dtl['product_id']);
			/*================================ Add Sale Detail ======================*/
				$ins_sale_data = array(
				   'product_id' => $this->db->escape_str(trim($post_product_id[0])),
				   'sale_id' => $this->db->escape_str(trim($sale_id)),
				   'shop_id' => $this->db->escape_str(trim($shop_id)),
				   'quantity' => $this->db->escape_str(trim($sal_dtl['quantity'])),
				   'sale_ref' => $this->db->escape_str(trim($sal_ref)),
				   'created_date' => $this->db->escape_str(trim($created_date)),
				   'created_by' => $this->db->escape_str(trim($created_by)),
				   'created_by_ip' => $this->db->escape_str(trim($ip_address)),
				);
				$this->db->dbprefix('sale_detail');
				$ins_into_db = $this->db->insert('sale_detail', $ins_sale_data);
			/*=============================== End Add Sale Detail ======================*/
		}
		if($ins_into_db){
			return true;
		}
		//echo '<pre>';print_r($post_data_sale);exit;
		//echo '<pre>';print_r($data);exit;
	}
	
	public function get_sale_stock(){
		
		$shopid = $this->session->userdata('shop_id');
		$created_date = date('Y-m-d');
		
		$this->db->dbprefix('sale');
		$this->db->select('*');
		//$this->db->select('sale.*,sale_detail.sale_ref,product.product_name');
		//$this->db->from('sale');
		//$this->db->join('sale_detail', 'sale_detail.sale_id = sale.id', 'right');
		//$this->db->join('product', 'product.id = sale_detail.product_id', 'right');
	  	$this->db->where('shop_id',$shopid);
		$this->db->where('DATE(created_date)',$created_date);
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('sale');
		
		//echo $this->db->last_query();echo '<pre>';print_r($get_all_users->result_array());exit;
		return $get_all_users->result_array();
	}
	public function get_sale_product_detail(){
		
		$shopid = $this->session->userdata('shop_id');
		
		$this->db->dbprefix('sale_detail');
		//$this->db->select('*');
		$this->db->select('sale_detail.*,product.product_name');
		$this->db->from('sale_detail');
		//$this->db->join('sale_detail', 'sale_detail.sale_id = sale.id', 'right');
		$this->db->join('product', 'product.id = sale_detail.product_id');
	  	$this->db->where('shop_id',$shopid);
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		//echo $this->db->last_query();echo '<pre>';print_r($get_all_users->result_array());exit;
		return $get_all_users->result_array();
	}
	
	public function get_stock_listing(){
		
		$shopid = $this->session->userdata('shop_id');//exit;
				
		$this->db->dbprefix('product_assig');
		$this->db->select('product_assig.*,product.product_name,product.reorder_level,product.price,product.product_type');
		$this->db->from('product_assig');
		$this->db->join('product', 'product.id = product_assig.product_id');
	  	$this->db->where('product_assig.shop_id',$shopid);
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		//echo $this->db->last_query();exit;
		return $get_all_users->result_array();
		
	}
	
	public function get_last_sale_id($sale_id = ''){
		$shopid = $this->session->userdata('shop_id');
		$this->db->dbprefix('sale');
		$this->db->select('*');
		if($sale_id != ''){
			$this->db->where('id',$sale_id);
		}else{
			$this->db->where('shop_id',$shopid);
		}
		$this->db->order_by("id", "DESC");
		$this->db->limit(1);
		
		$get_sale_data = $this->db->get('sale')->row_array();
		return $get_sale_data;
	}
	
	public function get_all_sale_product($sale_id){
		$shopid = $this->session->userdata('shop_id');
		
		$this->db->dbprefix('sale_detail');
		$this->db->select('sale_detail.*,product.product_name as name,product.price as price,product.product_code as code');
		$this->db->from('sale_detail');
		$this->db->join('im_product as product', 'product.id = sale_detail.product_id');
		$this->db->where('sale_detail.sale_id',$sale_id);
		//$this->db->order_by("sale_detail.id", "DESC");
		//$this->db->limit(1);
		
		$get_sale_data = $this->db->get()->result_array();
		return $get_sale_data;
	}
	
	public function get_product_code_check($bar_code){
		
		$shopid = $this->session->userdata('shop_id');//exit;
				
		$this->db->dbprefix('product_assig');
		$this->db->select('product_assig.*,product.product_name,product.reorder_level,product.price,product.product_type');
		$this->db->from('product_assig');
		$this->db->join('product', 'product.id = product_assig.product_id');
	  	$this->db->where('product_assig.shop_id',$shopid);
		$this->db->where('product.barcode',$bar_code);
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		//echo $this->db->last_query();exit;
		return $get_all_users->result_array();
		
	}
	
	public function get_offer_listing(){
		
		$shopid = $this->session->userdata('shop_id');//exit;
				
		$this->db->dbprefix('product');
		$this->db->select('*');
	  	$this->db->where('product_type',1);
		$this->db->where('del_status',0);
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('product');
		
		//echo $this->db->last_query();exit;
		return $get_all_users->result_array();
		
	}
	
	public function get_offer_product($p_id){
		
		$this->db->dbprefix('offer_detail');
		$this->db->select('offer_detail.*,product.product_name');
		$this->db->from('offer_detail');
		$this->db->join('product', 'product.id = offer_detail.product_id');
	  	$this->db->where('offer_detail.offer_id',$p_id);
		$this->db->order_by("offer_detail.id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		//echo $this->db->last_query();exit;
		return $get_all_users->result_array();
		
	}
	
	
	
}
?>