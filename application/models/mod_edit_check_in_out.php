<?php
class mod_edit_check_in_out extends CI_Model {
	
	function __construct(){
		
		parent::__construct();

	}
	public function num_rows($table_name){
		$this->db->dbprefix($table_name);
		$this->db->select('id');
		$this->db->where('del_status','0');
		
		
		$query = $this->db->get($table_name);
		
		return $query->num_rows();
		
	}
	
	// public function get_user($table_name,$limit,$id){

	// 	$this->db->dbprefix($table_name);
	// 	$this->db->select('*');
	//   	$this->db->where('del_status','0');
	// 	// $this->db->order_by("id", "DESC");
	// 	$this->db->limit($limit,$id);

	// 	echo $this->db->last_query();
	// 	exit;
	// 	//$this->db->limit($limit,$id);

	// 	$get_all_users = $this->db->get($table_name);


	// 	return $get_all_users->result_array();

	// }
	public function get_all_users(){
		

		$this->db->dbprefix('users');
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->where('del_status','0');
		$this->db->where('type','2');
		$this->db->order_by("id", "DESC");
		//$this->db->limit($limit,$id);
		
		$get_all_users = $this->db->get('users');
		
		
		return $get_all_users->result_array();
		
	}

	public function get_data( $start_date,$user_id){
		

		// $start_date=new DateTime($start_date);
		$start_date = date("Y-m-d", strtotime($start_date));


		// $start_date=$start_date->format('Y-m-d');


		$query=$this->db->query("select c.id,c.late_time,c.salaried_hours,c.check_in_time,c.total_salary,c.check_out_time,c.total_hours,c.salary_per_h,s.start_time,s.close_time,c.created_date,s.shop_title,u.user_name from  im_check_in_out c join im_shops s on c.shop_id=s.id join im_users u on u.id=c.user_id where c.user_id='$user_id' and DATE(c.created_date)= '$start_date'");
		$res=$query->result_array();
		// echo '<pre>';print_r($res);
		// exit;		
		return $res;

	}
	public function get_datails($id){
		

		$query=$this->db->query("select c.id,c.check_in_time,c.total_salary,c.check_out_time,c.total_hours,c.salary_per_h,c.created_date,s.shop_title,u.user_name from  im_check_in_out c join im_shops s on c.shop_id=s.id join im_users u on u.id=c.user_id where c.id='$id'");
		$res=$query->result_array();
		// echo '<pre>';print_r($res);
		// exit;		
		return $res;

	}
	
	
	public function get_user_detail($id){

		$this->db->dbprefix('users');
		$this->db->select('*');
		$this->db->where('id',$id);
		//$this->db->limit($limit,$id);
		$get_all_users = $this->db->get('users');
		return $get_all_users->result_array();
		
	}
	public function validateDate($date)
	{	
	    // return  DateTime::createFromFormat('Y-m-d G:i:s', $date);
		if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$/', $date)){ 
   				
   				return true;
   			}
   		
				return false;

	}


	public function update_check($check_in_time,$check_out_time,$id){

		// $check_in_time2=$check_in_time;
		// $check_out_time2=$check_out_time;
		// echo 'update';
		// exit;
		// echo strtotime($check_out_time);
		// exit;
		// validateDate($check_in_time);
		


		$shop_id=$this->session->userdata('shop_id');



		$this->db->dbprefix('check_in_out');
		$this->db->where('id',$id);		
		$get_user = $this->db->get('check_in_out');
		$check_in_out = $get_user->row_array();
		// echo $this->db->last_query();
		// exit;
// echo '<pre>';print_r($check_in_out);exit;
		$salary_per_h=$check_in_out['salary_per_h'];
		$shop_id=$check_in_out['shop_id'];

		$check_in_time2=new DateTime($check_in_time);
		$check_out_time2=new DateTime($check_out_time);



		$check_in_time_s=$check_in_time2;
				$check_out_time_S=$check_out_time2;
				$hours_in=$check_in_time_s->format('H');
					
				// echo $hours_in;
				// 			exit;
				$mins_in=$check_in_time_s->format('i');
				if($mins_in<=10){
					$mins_in=0;
				}
				else
				if($mins_in<=40){
					$mins_in=30;
				}
				else{
					$mins_in=0;
					$hours_in+=1;
				}
				
				$hours_out=$check_out_time_S->format('H');
				$mins_out=$check_out_time_S->format('i');

				if($mins_out<=19){
					$mins_out=0;
				}
				else
				if($mins_out<50){
					$mins_out=30;
				}
				else{
					$mins_out=0;
					$hours_out+=1;
				}

				$time_in=$hours_in+($mins_in/60);
				$time_out=$hours_out+($mins_out/60);

				$salleried_hours= $time_out-$time_in;


				  if($salleried_hours<0)
				  	$salleried_hours=0;

				  $total_salary=$salary_per_h*$salleried_hours;




		$total_hours = round((strtotime($check_out_time) - strtotime($check_in_time))/3600,2);

		$created_date = date('Y-m-d G:i:s');
		$created_ip = $_SERVER['REMOTE_ADDR'];
		$modify_date=date('Y-m-d G:i:s');
		

		$user_start_time=$check_in_time2->format('H:i');
		$user_start_time_arr=explode(":", $user_start_time);

		$user_close_time=$check_out_time2->format('H:i');
		$user_close_time_arr=explode(":", $user_close_time);

		$this->db->dbprefix('shops');
		$this->db->where('id',$shop_id);		
		$get_shop = $this->db->get('shops');
		$shop = $get_shop->row_array();
		// echo $shop_id;

		// echo '<pre>';
		// print_r($shop);
		// exit;
		$start_time=$shop['start_time'];
		$close_time=$shop['close_time'];
		$shop_start_time_arr=explode(":", $start_time);
		$shop_close_time_arr=explode(":", $close_time);
		// print_r($shop_start_time_arr);

		 $shop_time_min=($shop_start_time_arr[0]*60)+$shop_start_time_arr[1];
		 $shop_close_time_min=($shop_close_time_arr[0]*60)+$shop_close_time_arr[1];

		 $user_time_min=($user_start_time_arr[0]*60)+$user_start_time_arr[1];
		 $user_close_time_min=($user_close_time_arr[0]*60)+$user_close_time_arr[1];

		 $late_time=$user_time_min-$shop_time_min;

		$early_time=$shop_close_time_min-$user_close_time_min;
	
			if($late_time>10){
				$late_time=30;
			}
			else{
				$late_time=0;
			}
			if($early_time>10){
				$early_time=30;
			}
			else{
				$early_time=0;
			}
			// echo $early_time;
			// exit;
			// echo $salleried_hours;
			// exit;
		$update_data = array(
			'check_in_time' => $check_in_time,
			'check_out_time' => $check_out_time,	   
			'total_hours' => $total_hours,
			'total_salary' => $total_salary,
			'modify_date' => $modify_date,
			'late_time'=>$late_time,
			'early_time'=>$early_time,
			'salaried_hours'=>$salleried_hours,
			);


		$this->db->dbprefix('check_in_out');
		$this->db->where('id',$id);
		$ins_into_db = $this->db->update('check_in_out', $update_data);
		// echo $this->db->last_query();
		// exit;
// echo $ins_into_db;
// exit;
		if($ins_into_db) return true;

		
		return false;

	}

}
?>