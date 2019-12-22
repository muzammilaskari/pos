<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class edit_check_in_out extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_edit_check_in_out');
		$this->load->library('pagination');
		if($this->session->userdata('user_type') != 1){
			redirect(SURL.'login/logout_user');
		}
		
		if($this->session->userdata('user_id') != TRUE){

			redirect(SURL);

		}


		

	}

	public function all_users($variant=0){
		


		$this->session->set_userdata('id',$variant);
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		$data['date']=date('d-m-Y');

		$this->load->view('owner/edit_check_in_out',$data);

	}

	public function get_rec(){
		load_data();
		$data=$this->input->post();
		$data['date']=$data['date'];
		$user_id=$this->session->userdata('id');
		$data['user_data']= $this->mod_edit_check_in_out->get_data($data['date'],$user_id);
		// echo '<pre>';print_r($data);exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$this->load->view('owner/edit_check_in_out',$data);

	}
	public function edit_check($id=0){


		// $user_id=$this->session->userdata('id');
		$data['user_data']= $this->mod_edit_check_in_out->get_datails($id);
// echo '<pre>';print_r($data);exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);

		
		$this->load->view('user/edit_user_check',$data);

	}
	public function edit_check_process($date){

	
		if(empty($date)){
			$date=date('d-m-Y');
		 }

		$data=$this->input->post();

		// echo '<pre>';
		// print_r($data);
		// exit;

		$check_in_time=$data['check_in_time'];
		$check_out_time=$data['check_out_time'];
		$id=$data['id'];

		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		$data['date']=$date;
		if(empty($check_in_time) ||empty($check_out_time)){
			$this->load->view('owner/edit_check_in_out',$data);
			return;
		}

		$check_in_time_validate=$this->mod_edit_check_in_out->validateDate($check_in_time);
		$check_out_time_validate=$this->mod_edit_check_in_out->validateDate($check_out_time);
		if(empty($check_in_time_validate) || empty($check_out_time_validate)){
			// echo 'check_in_time or check_out_time is not valide';
			$data['error_msg']='Check In Time or Check Out Time is not valide';
			$this->load->view('owner/edit_check_in_out',$data);
			return;
		}
		if(strtotime($check_out_time)<strtotime($check_in_time))
			{
			 // echo 'checkout is less than check in';
			$data['error_msg']='Check Out Time is less than Check In Time';
			// $this->session->set_flashdata('err_message','checkout is less than check in');
			$this->load->view('owner/edit_check_in_out',$data);
			return;
		}
		
		$data['user_data']= $this->mod_edit_check_in_out->update_check($check_in_time,$check_out_time,$id);
		
		$this->load->view('owner/edit_check_in_out',$data);

	}
	public function load_data(){
	
		//$this->load->library('Ajax_pagination');
		//$all_record_res = $this->mod_assign_shop->get_all_record_ajax($this->input->post('p_id'));
		$date=$this->input->post('date');
		if(empty($date)){
			$date=date('d-m-Y');
		}

		$user_id=$this->session->userdata('id');

		$user_data= $this->mod_edit_check_in_out->get_data($date,$user_id);
		// echo '<pre>';print_r($data);exit;

		if( count($user_data) > 0){$count = 1;
			foreach($user_data as $res){ 



				$salleried_hours= $res['salaried_hours'];

				  $sallery=$res['total_salary'];


				?>
				
				<div class="form_olta_set_outer">
					<div class="form_parent form_set_class_1"><?php echo $count;?></div>
                    <div class="form_parent form_set_class_2"><?php echo ucfirst($res['user_name']); ?></div>
					<div class="form_parent form_set_class_3"><?php echo $res['shop_title'] ?></div>
					
                    
                    <div class="form_outerer">
						<form method="post" action="<?php echo base_url();?>edit_check_in_out/edit_check_process/<?php echo $date; ?>"  >
						<div class="form_parent form_set_class_4">
                        	<input type="text" placeholder="Check In Time" required="required" id="check_in_time"  value="<?php echo $res['check_in_time']; ?>" name="check_in_time" class="form-control checkin_set" />
                        </div>
                        
                        <div class="form_parent form_set_class_5">
							<input type="text" placeholder="Check Out Time" required="required" id="check_out_time" value="<?php echo $res['check_out_time']; ?>" name="check_out_time" class="form-control checkin_set"/>
						</div>
						
                        	<div class="form_parent form_set_class_6">
								<?php if($res['late_time']>0)
								echo 'Yes'; 

								else
									echo 'No';
								?>
							</div>

							<div class="form_parent form_set_class_7">
								<?php echo floor($res['total_hours']).'h '.round((($res['total_hours']*60)-(floor($res['total_hours'])*60))).'min'; ?>
							</div>
							<div class="form_parent form_set_class_7">
								<?php echo floor($salleried_hours).'h '.round((($salleried_hours*60)-(floor($salleried_hours)*60))).'min'; ?>
							</div>
							<div class="form_parent form_set_class_8">
								<?php echo round($sallery,2); ?>
							</div>			


							<div class="form_parent form_set_class_9">
                            <input type="hidden" name="id" value="<?php echo $res['id']; ?>">
							<input type="submit" id="save" value="Update" class="btn btn-success btn-sm  bounceIn animation-delay5 pull-right submit" />
                            </div>

						</form>
					</div>
                    
				</div>
                
                <div class="clearfix"></div>
                
				<?php $count++; }
				}else{ ?>
				<div class="col-md-12">
					No record Found
				</div>
				<?php
			}
		}
	}