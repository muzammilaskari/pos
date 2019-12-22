<?php
class mod_check_in_out_report extends CI_Model {
	
	public function __construct(){
		
		parent::__construct();

	}


	public function check_in(){

		$user_id=$this->session->userdata('user_id');
		$shop_id=$this->session->userdata('shop_id');
		$check_in_time=date('Y-m-d G:i:s');
		$check_out_time=date('Y-m-d G:i:s');
		$total_hours=0;
		$total_salary=0;
		$created_date = date('Y-m-d G:i:s');
		$created_ip = $_SERVER['REMOTE_ADDR'];
		$modify_date=date('Y-m-d G:i:s');;

		$this->db->dbprefix('users');
		$this->db->where('id',$user_id);		
		$get_user = $this->db->get('users');
		$user = $get_user->row_array();
		$salary_per_h=$user['salary_per_h'];

		$ins_data = array(
			'user_id' => $user_id,
			'shop_id' => $shop_id,
			'check_in_time' => $check_in_time,
			'check_out_time' => $check_out_time,	   
			'total_hours' => $total_hours,
			'total_salary' => $total_salary,
			'created_date' => $created_date,
			'created_ip' => $created_ip,
			'modify_date' => $modify_date,
			'salary_per_h'=>$salary_per_h,
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
		$check_in_time=$check_in_out['check_in_time'];



		$this->db->dbprefix('users');
		$this->db->where('id',$user_id);		
		$get_user = $this->db->get('users');	

		$salary_per_h=0;

		if(count($get_user->row_array()) > 0)
		{
			$user = $get_user->row_array();
			$salary_per_h=$user['salary_per_h'];


			$check_out_time=date('Y-m-d G:i:s');

			$check_in_time=new DateTime($check_in_time);
			$check_out_time=new DateTime($check_out_time);


			$total_hours=date_diff($check_in_time,$check_out_time,true);
			$total_hours=$total_hours->format('%h');
// echo $total_hours;exit;
			$total_salary=$total_hours*$salary_per_h;

			$created_date = date('Y-m-d G:i:s');
			$created_ip = $_SERVER['REMOTE_ADDR'];
			$modify_date=date('Y-m-d G:i:s');
			$check_out_time=date('Y-m-d G:i:s');


			$update_data = array(
				'check_out_time' => $check_out_time,	   
				'total_hours' => $total_hours,
				'total_salary' => $total_salary,
				);


			$this->db->dbprefix('check_in_out');
			$this->db->where('id',$id);
			$ins_into_db = $this->db->update('check_in_out', $update_data);

			if($ins_into_db) return true;

		}
		return false;

	}
	public function get_user_name($user_id){

		$this->db->dbprefix('users');
		$this->db->where('id',$user_id);		
		$get_user = $this->db->get('users');	
		$user = $get_user->row_array();
		$name=$user['first_name'].' '.$user['last_name'];
		return $name;

	}


	public function get_check_in_out_history( $start_date,$end_date,$user_id){

		// $start_date=new DateTime($start_date);
		// $end_date=new DateTime($end_date);

		// $start_date=$start_date->format('Y-m-d');
		// $end_date=$end_date->format('Y-m-d');
		if(!$user_id){
			$user_id=0;
		}
		// echo $start_date.' '.$end_date;
		// exit;


		$start_date = date("Y-m-d", strtotime($start_date));
		$end_date = date("Y-m-d", strtotime($end_date));
		

		// echo "select c.check_in_time,c.check_out_time,sum(c.total_hours) as total_hours,c.salary_per_h,sum(c.total_salary) as total_salary,c.created_date,s.shop_title,u.id,u.user_name from im_check_in_out c join im_shops s on c.shop_id=s.id join im_users u on c.user_id=u.id where c.user_id=$user_id and c.check_in_time >= CONVERT('$start_date' , DATETIME ) and c.check_in_time <= CONVERT('$end_date' , DATETIME ) group by  CONVERT(c.created_date, DATE )";
		// exit;


		$query=$this->db->query("select sum(((c.late_time+c.early_time)/60)*c.salary_per_h) as late_fine,c.check_in_time,c.check_out_time,sum(c.total_hours) as total_hours,sum(c.salaried_hours) as total_salaried_hours,c.salary_per_h,sum(c.total_salary) as total_salary,c.created_date,s.shop_title,s.start_time,s.close_time,u.id,u.user_name from im_check_in_out c join im_shops s on c.shop_id=s.id join im_users u on c.user_id=u.id where c.user_id=$user_id and DATE(c.check_in_time) BETWEEN '$start_date' and  '$end_date' group by  CONVERT(c.created_date, DATE )");
		$res=$query->result_array();
		// echo '<pre>';
		// print_r($res);
		// exit;
		return $res;

	}

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
}
?>