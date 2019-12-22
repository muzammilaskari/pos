<?php
class mod_project extends CI_Model {
	
	function __construct(){
		
        parent::__construct();

    }


	public function num_rows($table_name){
		$this->db->dbprefix($table_name);
		$this->db->select('id');
		
		
		$query = $this->db->get($table_name);
		
		return $query->num_rows();
		
	}
	
	
	public function num_sample(){
		$variable=array();
		$get=array();
		$query="select distinct size_id from crm_assign_sample";
		$query=$this->db->query($query);
		$result=$query->result_array();
		
		if(!empty($result)){
		foreach($result as $k=>$res){
$size_id=$res['size_id'];	
 $qry="select distinct product_id from crm_product_sizes where id='".$size_id."'";
	    $qry=$this->db->query($qry);
		$variable=$qry->result_array();
		}
		//echo "<pre>";print_r($variable);exit;
		
		if(!empty($variable)){
		foreach($variable as $k=>$value){
$product_id=$value['product_id'];	
$qry="select count(id) from crm_product where id='".$product_id."'";
	    $qry=$this->db->query($qry);
		$get=$qry->result_array();
		}
		}
		else{
			$get='';
		}
		}
		else{
		$get='';
		}
		//echo "<pre>";print_r($get);exit;
		
		return $get;
		
	}
	
	
	public function get_firm($firm_name){
	
		/*echo $id;
		exit;*/
		//update the record into the database.
		$this->db->dbprefix('companies');
		$this->db->select('*');
		$this->db->where('type',$firm_name);
		$get_data = $this->db->get('companies')->result_array();
		//echo $this->db->last_query(); exit;
         return $get_data;
	}
	
	
	
	
	public function subtractquantity($size_id,$quantity){
		$this->db->dbprefix('product_sizes');
		$this->db->select('sample_stock_status');
		$this->db->where('id',$size_id);

		$get_data = $this->db->get('product_sizes')->result_array();
		
		$size_quantity=$get_data[0]['sample_stock_status'];
		$total=$size_quantity-$quantity;
		$query="update crm_product_sizes set sample_stock_status='".$total."' where id='".$size_id."'";
	$query=$this->db->query($query);
	$query="update crm_sample_quantity set quantity='".$total."' where size_id='".$size_id."'";
	$query=$this->db->query($query);
	return true;
	}
	
	
	
	public function get_all_data($table_name,$limit,$id){
		
	
		
		
		$this->db->dbprefix($table_name);
		$this->db->select('*');
	  // $this->db->where('type','interior designe');
		$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get($table_name);
		
		return $get_all_users->result_array();
		
	}
	
	public function get_all_sample($limit,$id){
		
	/* $query="SELECT s.id as sample_id,s.size_id,s.firm_name,s.sub_firm_name,s.created_date as sample_created_date, ps.*, p. * 
FROM crm_assign_sample AS s
JOIN crm_product_sizes AS ps ON s.size_id = ps.id
JOIN crm_product AS p ON ps.product_id = p.id
LIMIT ".$id.", ".$limit."";*/
		$variable=array();
		$get=array();
		$query="select distinct size_id from crm_assign_sample";
		$query=$this->db->query($query);
		$result=$query->result_array();
		//echo "<pre>";print_r($result);exit;
		if(!empty($result)){
		foreach($result as $k=>$res){
 $size_id=$res['size_id'];	
  $qry="select distinct product_id from crm_product_sizes where id='".$size_id."'";
	    $qry=$this->db->query($qry);
		$variable[$k]=$qry->result_array();
		}
		//echo "<pre>";print_r($variable);exit;
		
		if(!empty($variable)){
			$count=count($variable);
			for($i=0;$i<$count;$i++){
		foreach($variable[$i] as $key=>$value){
$product_id=$value['product_id'];	
$qry="select * from crm_product where id='".$product_id."' limit ".$id.",".$limit."";
	    $qry=$this->db->query($qry);
		$get[$i]=$qry->result_array();
		}
		}
		}
		else{
			$get='';
		}
		}
		
		else{
		$get='';
		}
	//echo "<pre>";print_r($get);exit;
		return $get;
		
	}
	
	public function get_all_sample_detail($id){
		
	 $query="SELECT s.id as sample_id,s.size_id,s.firm_name,s.sub_firm_name,s.created_date as sample_created_date, ps.*, p. * 
FROM crm_assign_sample AS s
JOIN crm_product_sizes AS ps ON s.size_id = ps.id
JOIN crm_product AS p ON ps.product_id = p.id
where p.id='".$id."' and s.status='0'
";
		
		$query=$this->db->query($query);
		$result=$query->result_array();
		
		
		//echo "<pre>";print_r($result);exit;
		return $result;
		
	}
	
	
	
	public function get_model_data($model_name,$table_name){
		
	
		
		
		$this->db->dbprefix($table_name);
		$this->db->select('*');
	   $this->db->where('model_name',$model_name);
		
		
		$get_all_users = $this->db->get($table_name);
		
		return $get_all_users->result_array();
		
	}
	
	public function add_data($data,$table_name){
		
	/*echo $table_name;
		
	 echo "<pre>";print_r($data);
	 exit;*/

		// print_r($_POST);

		// echo $_FILES['profile_image']['name'];

		// exit;
		
		
	
		

		
		//Insert the record into the database.
		$this->db->dbprefix($table_name);
	$this->db->insert($table_name, $data);
	
		//echo $this->db->last_query();exit;
		 return true;

	}//end add_new_user()
	

	
	
	public function edit_data($data,$tablename,$id){
	
	//	echo $tablename
	// print_r($data);exit;

		
 		
			
			
		
		
		
		//update the record into the database.
		$this->db->dbprefix($tablename);
		$this->db->where('id',$id);
		$upd_into_db = $this->db->update($tablename,$data);
		//echo $this->db->last_query(); exit;
         if($upd_into_db) return true;
	}
	
	public function get_data($id,$table_name){
	
		/*echo $id;
		exit;*/
		//update the record into the database.
		$this->db->dbprefix($table_name);
		$this->db->select('*');
		$this->db->where('id',$id);
		$get_data = $this->db->get($table_name)->result_array();
		//echo $this->db->last_query(); exit;
         return $get_data;
	}
	
	public function get_data_of_sample($id,$table_name){
	
		/*echo $id;
		exit;*/
		//update the record into the database.
	 	/*$query="select size_id from ".$table_name." where project_id='".$id."' ";*/
		
		$this->db->dbprefix($table_name);
		$this->db->select('*');
		$this->db->where('project_id',$id);
		//$this->db->order_by('id','DESC');
		
		$result = $this->db->get($table_name)->result_array();
		//echo "<pre>";print_r($result);exit;

		/*$query=$this->db->query($query);
		$result=$query->result_array();*/
		//echo $this->db->last_query(); exit;
         return $result;
	}
	
	public function get_data_of_sizes($id){
	
		/*echo $id;
		exit;*/
		//update the record into the database.
	 	 $query="select ps.*,p.* from crm_product_sizes as ps join crm_product as p on ps.product_id=p.id where ps.id='".$id."' ";
		
		$query=$this->db->query($query);
		$result=$query->result_array();
		//echo "<pre>";print_r($result);exit;
		//echo $this->db->last_query(); exit;
         return $result;
	}
	
	
	
	public function get_data_attribute($id,$attribute,$table_name){
	
		/*echo $id;
		exit;*/
		//update the record into the database.
		$this->db->dbprefix($table_name);
		$this->db->select('*');
		$this->db->where($attribute,$id);
		$get_data = $this->db->get($table_name)->result_array();
		//echo $this->db->last_query(); exit;
         return $get_data;
	}
	
		public function get_data_attributes($id,$attribute,$sub_firm_name,$attributes,$table_name){
	
		/*echo $id;
		exit;*/
		//update the record into the database.
		$this->db->dbprefix($table_name);
		$this->db->select('*');
		$this->db->where($attribute,$id);
		$this->db->where($attributes,$sub_firm_name);
		$get_data = $this->db->get($table_name)->result_array();
		//echo $this->db->last_query(); exit;
         return $get_data;
	}
	
	
	
	public function get_firms($id){
	
		/*echo $id;
		exit;*/
		//update the record into the database.
		$this->db->dbprefix('assign_sample');
		$this->db->select('sub_firm_name');
		$this->db->where('id',$id);
		$get_data = $this->db->get('assign_sample')->result_array();
		//echo $this->db->last_query(); exit;
         return $get_data;
	}
	
	public function get_table_data($table_name){
	
		/*echo $id;
		exit;*/
		//update the record into the database.
		$this->db->dbprefix($table_name);
		$this->db->select('*');
		//$this->db->where('model_name',$model_name);
		$get_data = $this->db->get($table_name)->result_array();
		//echo $this->db->last_query(); exit;
         return $get_data;
	}
	
	public function get_models_data($table_name){
	
		/*echo $id;
		exit;*/
		//update the record into the database.
		$this->db->dbprefix($table_name);
		$this->db->select('brand_name');
		$this->db->group_by('brand_name');
		$get_data = $this->db->get($table_name)->result_array();
		//echo $this->db->last_query(); exit;
         return $get_data;
	}
	
	
	
	
	
	
	public function delete_data($id,$table_name){

		$this->db->dbprefix($table_name);
		$this->db->where('id',$id);
		$del_into_db = $this->db->delete($table_name);
		//$this->db->last_query();
		
	}
	
	public function delete_sample($id,$size_id){
		//exit;
         $query="select quantity from crm_assign_sample where id='".$id."'";
		$query=$this->db->query($query);
		$result=$query->result_array();
		//print_r($result);
		$query2="select sample_stock_status from crm_product_sizes where id='".$size_id."'";
		$query2=$this->db->query($query2);
		$result2=$query2->result_array();
		//print_r($result2);
	    $total=$result2[0]['sample_stock_status']+$result[0]['quantity'];
		
		$query3="update crm_assign_sample set status='1' where id='".$id."'";
	
		$this->db->query($query3);
		
		
		$query4="update crm_product_sizes set sample_stock_status='".$total."' where id='".$size_id."'";
		$this->db->query($query4);
		
	
		
	}
	
	public function added($total,$size_id){

		$query="select sample_stock_status from crm_product_sizes where id='".$size_id."'";
		$query=$this->db->query($query);
		$result=$query->result_array();
		 $sample_stock_status=$result[0]['sample_stock_status'];
		 $totals=$sample_stock_status-$total;
		 $query="update crm_product_sizes set sample_stock_status='".$totals."' where id='".$size_id."'";
		 $query=$this->db->query($query);
		
	}
	
	public function subtract($total,$size_id){

		$query="select sample_stock_status from crm_product_sizes where id='".$size_id."'";
		$query=$this->db->query($query);
		$result=$query->result_array();
		 $sample_stock_status=$result[0]['sample_stock_status'];
		 $totals=$sample_stock_status+$total;
		 $query="update crm_product_sizes set sample_stock_status='".$totals."' where id='".$size_id."'";
		 $query=$this->db->query($query);
		
	}
	
	public function delete_data_product($id,$table_name,$table_name1){

		$this->db->dbprefix($table_name);
		$this->db->where('id',$id);
		$del_into_db = $this->db->delete($table_name);
		//$this->db->last_query();
		$this->db->dbprefix($table_name1);
		$this->db->where('product_id',$id);
		$del_into_db = $this->db->delete($table_name1);
		if($del_into_db) return true;

	}
	
	
	public function search_data($data,$table_name,$searching){
		
extract($data);
			
			//print_r($search);
			
			
			$this->db->select('*');
			$this->db->dbprefix($table_name);
			//$this->db->where('type','interior designe');
			$this->db->like($searching,$search);
			// $this->db->limit($limit, $id);
			$this->db->order_by('id DESC');
			$get_all_stories = $this->db->get($table_name);
			
			return $get_all_stories->result_array();
		

	}
	
}
?>