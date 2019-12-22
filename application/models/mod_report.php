<?php
class mod_report extends CI_Model {
	
	function __construct(){
		
        parent::__construct();

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
	
	public function get_all_product(){
		$this->db->dbprefix('product');
		$this->db->select('*');
		$this->db->where('del_status','0');
		$this->db->where('product_type','0');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('product');
		
		
		return $get_all_users->result_array();
	}
	
	public function get_all_assign_product(){
		$this->db->dbprefix('product_assig');
		$this->db->select('SUM(`quantity`),`product_id` ');
		//$this->db->where('del_status','0');
		//$this->db->where('product_type','0');
		$this->db->group_by('product_id');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('product_assig');
		
		
		return $get_all_users->result_array();
	}
	
	public function get_all_product_return(){
		$this->db->dbprefix('log');
		$this->db->select('log.*,product.product_name');
		$this->db->from('log');
		$this->db->join('product', 'product.id = log.product_id');
		$this->db->where('log.created_by_title','product assign return');
		
		$this->db->order_by("log.id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		
		return $get_all_users->result_array();
	}
	
	public function get_all_product_return_between_dates($data){
		extract($data);
		//echo '<pre>';print_r($data);exit;
		$start_date = date("Y-m-d", strtotime($s_date));
		$end_date = date("Y-m-d", strtotime($e_date));//exit;s_date
		
		$this->db->dbprefix('log');
		$this->db->select('log.*,product.product_name');
		$this->db->from('log');
		$this->db->join('product', 'product.id = log.product_id');
		$this->db->where('log.created_by_title','product assign return');
			$where = "DATE(`im_log`.`created_date`) BETWEEN '$start_date' AND '$end_date'";
		$this->db->where($where);
		/*if($start_date == $end_date){
			$where = "DATE(`im_log`.`created_date`) = '$end_date'";
			//$this->db->where('log.created_date', $end_date);
			$this->db->where($where);
		}else{
			$where = "DATE(`im_log`.`created_date`) BETWEEN '$start_date' AND '$end_date'";
			//$this->db->where('log.created_date >=', $start_date);
			//$this->db->where('log.created_date <=', $end_date);
			$this->db->where($where);
		}*/
		
		$this->db->order_by("log.id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		//echo $this->db->last_query();exit;
		
		return $get_all_users->result_array();
	}
	
	public function get_all_stock_in(){
		$this->db->dbprefix('log');
		$this->db->select('log.*,product.product_name');
		$this->db->from('log');
		$this->db->join('product', 'product.id = log.product_id');
		$this->db->where('log.created_by_title','product added');
		
		$this->db->order_by("log.id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		
		return $get_all_users->result_array();
	}
	
	public function get_all_stock_in_report($data){
		extract($data);
		$start_date = date("Y-m-d", strtotime($s_date));
		$end_date = date("Y-m-d", strtotime($e_date));
		
		$this->db->dbprefix('log');
		//$this->db->select('log.*,product.product_name');
		$this->db->select('SUM(im_log.quantity) as quantity,product.product_name');
		$this->db->from('log');
		$this->db->join('product', 'product.id = log.product_id');
		$this->db->where('log.created_by_title','product added');
			$where = "DATE(`im_log`.`created_date`) BETWEEN '$start_date' AND '$end_date'";
		$this->db->where($where);
		$this->db->group_by('im_log.product_id');
		
		$this->db->order_by("log.id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		//echo $this->db->last_query();exit;
		
		
		return $get_all_users->result_array();
	}
	
	public function get_all_notification_report($data){
		extract($data);
		$start_date = date("Y-m-d", strtotime($s_date));
		$end_date = date("Y-m-d", strtotime($e_date));
		
		


		$this->db->dbprefix('notification');
		$this->db->select('notification.*,product.product_name as product_name,shops.shop_title');
		$this->db->from('notification');
		$this->db->join('product', 'product.id = notification.product_id');
		$this->db->join('shops', 'shops.id = notification.shop_id');
		$this->db->where('notification.shop_id',$s_id);
		//$this->db->where('log.created_by_title','product added');
			$where = "DATE(im_notification.created_date) BETWEEN '$start_date' AND '$end_date'";
		$this->db->where($where);
		
		$this->db->order_by("notification.id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		//echo '<pew>';print_r($get_all_users->result_array());exit;
		
		return $get_all_users->result_array();
		
	}
	
	public function get_all_stock_report($data){
		extract($data);
		$start_date = date("Y-m-d", strtotime($s_date));
		$end_date = date("Y-m-d", strtotime($e_date));
		//echo '<pre>';print_r($data);exit;
		
		$this->db->dbprefix('expense_detail');
		$this->db->select('expense_detail.*,expense_type.expense_title as expense_type');
		$this->db->from('expense_detail');
		$this->db->join('expense_type', 'expense_type.id = expense_detail.type_id');
		//$this->db->where('log.created_by_title','product added');
			$where = "DATE(im_expense_detail.expense_date) BETWEEN '$start_date' AND '$end_date'";
		$this->db->where($where);
		
		$this->db->order_by("expense_detail.id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		//echo '<pew>';print_r($get_all_users->result_array());exit;
		
		return $get_all_users->result_array();
	}
	
	public function get_all_record(){
		
		$this->db->dbprefix('product_assig');
		$this->db->select('product_assig.*,product.product_name,product.reorder_level,shops.shop_title');
		$this->db->from('product_assig');
		$this->db->join('product', 'product.id = product_assig.product_id');
		$this->db->join('shops', 'shops.id = product_assig.shop_id');
	  	//$this->db->where('status','1');
		//$this->db->where('del_status','0');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		$get_all_users = $this->db->get();
		//$get_all_users = $this->db->get('product_assig');
		//echo $this->db->last_query();exit;
		
		return $get_all_users->result_array();
		
	}
	
	public function get_all_shop_record_ajax($s_id){
		$this->db->dbprefix('product_assig');
		$this->db->select('product_assig.*,product.product_name,product.reorder_level,shops.shop_title');
		$this->db->from('product_assig');
		$this->db->join('product', 'product.id = product_assig.product_id');
		$this->db->join('shops', 'shops.id = product_assig.shop_id');
	  	$this->db->where('product_assig.shop_id',$s_id);
		//$this->db->where('del_status','0');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		$get_all_users = $this->db->get();
		//$get_all_users = $this->db->get('product_assig');
		//echo $this->db->last_query();exit;
		
		return $get_all_users->result_array();
	}
	
	public function get_all_shop_process_record_ajax($s_id){
		$this->db->dbprefix('log');
		$this->db->select('log.*,product.product_name');
		$this->db->from('log');
		$this->db->join('product', 'product.id = log.product_id');
		$this->db->where('log.shop_id',$s_id);
		$this->db->where('log.created_by_title','product assign return');
		
		$this->db->order_by("log.id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		//echo $this->db->last_query();exit;
		
		return $get_all_users->result_array();
	}
	
	public function get_all_shop_sold_record_ajax($data){
		extract($data);
		$start_date = date("Y-m-d", strtotime($s_date));
		$end_date = date("Y-m-d", strtotime($e_date));
		//echo "<pre>";print_r($data);exit;
		//$select_res =  "SUM(`sale_detail`.quantity) ,`product`.`product_name`";
		$this->db->dbprefix('sale_detail');
		//$this->db->select('sale_detail.*,product.product_name');
		//$this->db->select($select_res);
		$this->db->select('SUM(im_sale_detail.quantity) as quantity,product.`product_name');
		$this->db->from('sale_detail');
		$this->db->join('product', 'product.id = sale_detail.product_id');
		$this->db->where('sale_detail.shop_id',$s_id);
			$where = "DATE(`im_sale_detail`.`created_date`) BETWEEN '$start_date' AND '$end_date'";
		$this->db->where($where);
		$this->db->group_by('im_sale_detail.product_id');
		//$this->db->where('log.created_by_title','product assign return');
		
		$this->db->order_by("sale_detail.id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		//echo $this->db->last_query();exit;
		
		return $get_all_users->result_array();
	}
	
	public function get_all_shop_sold_pdf_record_ajax($data){
		extract($data);
		$start_date = date("Y-m-d", strtotime($s_date));
		$end_date = date("Y-m-d", strtotime($e_date));
		//echo "<pre>";print_r($data);exit;
		//$select_res =  "SUM(`sale_detail`.quantity) ,`product`.`product_name`";
		$this->db->dbprefix('sale_detail');
		//$this->db->select('sale_detail.*,product.product_name');
		//$this->db->select($select_res);
		$this->db->select('SUM(im_sale_detail.quantity) as quantity,product.`product_name');
		$this->db->from('sale_detail');
		$this->db->join('product', 'product.id = sale_detail.product_id');
		$this->db->where('sale_detail.shop_id',$s_id);
			$where = "DATE(`im_sale_detail`.`created_date`) BETWEEN '$start_date' AND '$end_date'";
		$this->db->where($where);
		$this->db->group_by('im_sale_detail.product_id');
		//$this->db->where('log.created_by_title','product assign return');
		
		$this->db->order_by("sale_detail.id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get();
		
		//echo $this->db->last_query();exit;
		
		return $get_all_users->result_array();
	}
	
}
?>