<?php
class mod_check_in_out extends CI_Model {
	
	public function __construct(){
		
		parent::__construct();

	}


	public function check_in(){

		$user_id=$this->session->userdata('user_id');
		$shop_id=$this->session->userdata('shop_id');
		$check_in_time=new DATETIME(date('Y-m-d G:i:s'));
		$check_out_time=new DATETIME(date('Y-m-d G:i:s'));
		$total_hours=0;
		$total_salary=0;
		$created_date = date('Y-m-d G:i:s');
		$created_ip = $_SERVER['REMOTE_ADDR'];
		$modify_date=date('Y-m-d G:i:s');

		$user_start_time=$check_in_time->format('H:i'); 
		$user_start_time_arr=explode(":", $user_start_time);
		$this->db->dbprefix('users');
		$this->db->where('id',$user_id);		
		$get_user = $this->db->get('users');
		$user = $get_user->row_array();
		$salary_per_h=$user['salary_per_h'];

		$this->db->dbprefix('shops');
		$this->db->where('id',$shop_id);		
		$get_shop = $this->db->get('shops');
		$shop = $get_shop->row_array();

		$start_time=$shop['start_time'];
		$close_time=$shop['close_time'];

		$shop_start_time_arr=explode(":", $start_time);


		 $late_time=(($user_start_time_arr[0]-$shop_start_time_arr[0])*60) +($user_start_time_arr[1]-$shop_start_time_arr[1]);


	if($late_time>10){
		$late_time=30;
	}
	else{
		$late_time=0;
	}



				  	$shop_close_time_arr=explode(":", $close_time);

$check_out_time->setTime($shop_close_time_arr[0],($shop_close_time_arr[1]+30));
$hours_in=$check_in_time->format('H')+$check_in_time->format('i')/60;
		$hours_out=$check_out_time->format('H')+$check_out_time->format('i')/60;

		$total_hours= $hours_out-$hours_in;
			$check_in_time_s=$check_in_time;
				$check_out_time_S=$check_out_time;
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

		$ins_data = array(
			'user_id' => $user_id,
			'shop_id' => $shop_id,
			'check_in_time' => $check_in_time->format('Y-m-d H:i:s'),
			'check_out_time' => $check_out_time->format('Y-m-d H:i:s'),	   
			'total_hours' => $total_hours,
			'total_salary' => $total_salary,
			'created_date' => $created_date,
			'salaried_hours'=>$salleried_hours,
			'created_ip' => $created_ip,
			'modify_date' => $modify_date,
			'salary_per_h'=>$salary_per_h,
			'late_time'=>$late_time,
			);

		//Insert the record into the database.
		$this->db->dbprefix('check_in_out');
		$ins_into_db = $this->db->insert('check_in_out', $ins_data);

		$this->db->last_query();

		if($ins_into_db) {
			$id=$this->db->insert_id();

			$this->session->set_userdata('check_in_time',$check_in_time);
			$this->session->set_userdata('check_in_id',$id);

			return true;
		}

	}

	public function check_out(){

		$user_id=$this->session->userdata('user_id');
		$shop_id=$this->session->userdata('shop_id');

		$id=$this->session->userdata('check_in_id');

		$this->db->dbprefix('check_in_out');
		$this->db->where('id',$id);		
		$get_user = $this->db->get('check_in_out');
		$check_in_out = $get_user->row_array();

		$check_in_time=$check_in_out['check_in_time'];//checkin time

		$this->db->dbprefix('users');
		$this->db->where('id',$user_id);		
		$get_user = $this->db->get('users');	

		$salary_per_h=0;



		if(count($get_user->row_array()) > 0)
		{
			$user = $get_user->row_array();

			$salary_per_h=$user['salary_per_h']; //salary per hour
			$check_in_time=new DateTime($check_in_time);
			$check_out_time=new DATETIME(date('Y-m-d G:i:s'));

			$hours=$check_out_time->format('H');
			$mins=$check_out_time->format('i');
		
			$hours_in=$check_in_time->format('H')+$check_in_time->format('i')/60;
			$hours_out=$check_out_time->format('H')+$check_out_time->format('i')/60;

			$total_hours= $hours_out-$hours_in;

			$user_start_time=$check_in_time->format('H:i'); 
			$user_start_time_arr=explode(":", $user_start_time);
			$this->db->dbprefix('shops');
			$this->db->where('id',$shop_id);		
			$get_shop = $this->db->get('shops');
			$shop = $get_shop->row_array();
			$close_time=$shop['close_time'];
			$shop_close_time_arr=explode(":", $close_time);
			 $early_time=(($shop_close_time_arr[0]-$hours)*60) +($shop_close_time_arr[1]-$mins);

					if($early_time>10){
				$early_time=30;
			}
			else{
				$early_time=0;
			}

				$check_in_time_s=$check_in_time;
				$check_out_time_S=$check_out_time;
				$hours_in=$check_in_time_s->format('H');
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


			$created_date = date('Y-m-d G:i:s');
			$created_ip = $_SERVER['REMOTE_ADDR'];
			$modify_date=date('Y-m-d G:i:s');
			
			$update_data = array(
				'check_out_time' => $check_out_time->format('Y-m-d H:i:s'),	   
				'total_hours' => $total_hours,
				'total_salary' => $total_salary,
				'salaried_hours'=>$salleried_hours,
				'check_in_status' => 0,
				'early_time'=>$early_time
				);


			$this->db->dbprefix('check_in_out');
			$this->db->where('id',$id);
			$ins_into_db = $this->db->update('check_in_out', $update_data);

			if($ins_into_db) return true;

		}
		return false;

	}
	function get_checkin_status(){

		$user_id=$this->session->userdata('user_id');
	

		$id=$this->session->userdata('check_in_id');

		$this->db->dbprefix('check_in_out');
		$this->db->where('check_in_status',"1");		
		$get = $this->db->get('check_in_out');
		if($get->num_rows>0){
			$result=$get->result_array();
			$this->session->set_userdata('check_in_time',$result[0]['check_in_time']);
			$this->session->set_userdata('check_in_id',$result[0]['id']);
			$this->session->set_userdata('check_in_status',1);

		}else{
			$this->session->set_userdata('check_in_status',0);
		}

	}


	public function get_check_in_out_history( $start_date,$end_date){

		$start_date = date("Y-m-d", strtotime($start_date));
		$end_date = date("Y-m-d", strtotime($end_date));
		$user_id=$this->session->userdata('user_id');
		$query=$this->db->query("select c.late_time, c.check_in_time,c.check_out_time,c.total_hours,c.salary_per_h,c.created_date,s.shop_title from  im_check_in_out c join im_shops s on c.shop_id=s.id where c.user_id='$user_id' and DATE(c.check_in_time) BETWEEN '$start_date'  and '$end_date' ");
		$res=$query->result_array();
		return $res;
	}
}
?>