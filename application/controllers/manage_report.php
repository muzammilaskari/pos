<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_report extends CI_Controller {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->load->library('session');
		
		$this->load->model('mod_report');
		$this->load->helper('url');
		
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
		
		
		$data['all_product'] = $this->mod_report->get_all_product();
		//echo '<pre>';print_r($data['all_product']);exit;
		
		$this->load->view('report/manag_overall_stock_status',$data);

	}
	
	public function overall_stock_status(){
		//echo 'testing overall_stock_status';
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		
		$data['all_product'] = $this->mod_report->get_all_product();
		
		$data['all_assign_product'] = $this->mod_report->get_all_assign_product();
		//echo '<pre>';print_r($data['all_assign_product']);//exit;
		//echo '<pre>';print_r($data['all_product']);exit;
		
		$this->load->view('report/overall_stock_status_list',$data);

	}
	
	public function voerall_stock_return(){
		
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		
		$data['all_product_return'] = $this->mod_report->get_all_product_return();
		//echo '<pre>';print_r($data['all_product_return']);exit;
		
		$this->load->view('report/manag_overall_stock_return',$data);
	}
	
	public function stock_in_report(){
		
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		
		$data['all_product_added'] = $this->mod_report->get_all_stock_in();
		//echo '<pre>';print_r($data['all_product_added']);exit;
		
		$this->load->view('report/manag_stock_in_report',$data);
	}
	
	public function expense_report(){
		
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		
		//$data['all_product_added'] = $this->mod_report->get_all_stock_in();
		//echo '<pre>';print_r($data['all_product_added']);exit;
		
		$this->load->view('report/manag_expense_report',$data);
	}
	
	public function shop_reorder_report(){
		//echo 'in reorder shop';exit;
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['all_shop_res'] = $this->mod_report->get_all_shop();
		
		
		$this->load->view('report/manag_shop_reorder_report',$data);
	}
	
	public function shop_stock(){
		
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		
		$data['all_assign_record'] = $this->mod_report->get_all_record();
		
		$data['all_shop_res'] = $this->mod_report->get_all_shop();
		//echo "<pre>";print_r($data['all_assign_record']);
		//echo 'in manage quentity';exit;
		//echo '<pre>';print_r($data['all_shop_res']);exit;
		
		$this->load->view('report/manag_shop_stock_status',$data);

	}
	
	public function shop_return_stock(){
		
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['all_shop_res'] = $this->mod_report->get_all_shop();
		//echo "<pre>";print_r($data['all_assign_record']);
		//echo 'in manage quentity';exit;
		//echo '<pre>';print_r($data['all_shop_res']);exit;
		
		$this->load->view('report/manag_shop_return_stock_status',$data);

	}
	
	public function stock_in_report_process(){
		$all_product_added = $this->mod_report->get_all_stock_in_report($this->input->post());
		?>
		<?php if(isset($all_product_added) && (count($all_product_added)>0)){$count = 1;?>
			<?php foreach($all_product_added as $product_added){?>
                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $product_added['product_name'];?></td>
                    <td><?php echo $product_added['quantity'];?></td>
                    <!--<td><?php //echo date('Y-m-d',strtotime($product_added['created_date']));?></td>-->
                </tr>
            <?php $count++;}?>
            <?php }else{?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
            <?php }?>
        <?php 
	}
	
	
	public function expense_shop_reorder_process(){
		
		$all_notification = $this->mod_report->get_all_notification_report($this->input->post());
		//echo '<pre>';print_r($all_notification);exit;
		?>
		<?php if(isset($all_notification) && (count($all_notification)>0)){$count = 1;?>
			<?php foreach($all_notification as $notification_added){?>
                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $notification_added['product_name'];?></td>
                    <td><?php echo $notification_added['shop_title'];?></td>
                    <td><?php echo date('Y M d',strtotime($notification_added['created_date']));?></td>
                    <!--<td><?php //echo date('Y-m-d',strtotime($product_added['created_date']));?></td>-->
                </tr>
            <?php $count++;}?>
            <?php }else{?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
            <?php }?>
        <?php 
	}
	
	public function expense_report_process(){
		$all_expense_added = $this->mod_report->get_all_stock_report($this->input->post());
		
		?>
		<?php if(isset($all_expense_added) && (count($all_expense_added)>0)){$count = 1;?>
			<?php foreach($all_expense_added as $expense_added){?>
                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $expense_added['expense_type'];?></td>
                    <td><?php echo $expense_added['expense_amount'];?></td>
                    <td><?php echo date('Y M d',strtotime($expense_added['expense_date']));?></td>
                    <!--<td><?php //echo date('Y-m-d',strtotime($product_added['created_date']));?></td>-->
                </tr>
            <?php $count++;}?>
            <?php }else{?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
            <?php }?>
        <?php 
	}
	
	public function stock_return_report_process(){
		
		$all_product_return = $this->mod_report->get_all_product_return_between_dates($this->input->post());
		?>
        <?php if(isset($all_product_return) && (count($all_product_return)>0)){$count = 1;?>
			<?php foreach($all_product_return as $product_return){?>
                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $product_return['product_name'];?></td>
                    <td><?php echo $product_return['quantity'];?></td>
                    <td><?php echo date('Y-m-d h:i A',strtotime($product_return['created_date']));?></td>
                </tr>
            <?php $count++;}?>
            <?php }else{?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
            <?php }?>
        <?php
		echo '<pre>';print_r($this->input->post());
	}
	
	public function shop_sold_stock(){
		
		$data['header_script'] = $this->load->view('common/header_script', '', TRUE);
		$data['header'] = $this->load->view('common/header', '', TRUE);
		$data['sidebar'] = $this->load->view('common/side_bar', '', TRUE);
		$data['footer'] = $this->load->view('common/footer', '', TRUE);
		
		$data['all_shop_res'] = $this->mod_report->get_all_shop();
		//echo "<pre>";print_r($data['all_assign_record']);
		//echo 'in manage quentity';exit;
		//echo '<pre>';print_r($data['all_shop_res']);exit;
		
		$this->load->view('report/manag_shop_sold_stock_status',$data);

	}
	
	public function shop_stock_return_report(){
		$all_record_res = $this->mod_report->get_all_shop_process_record_ajax($this->input->post('p_id'));
		if(count($all_record_res)>0){$count = 1;
		foreach($all_record_res as $res_value){
			?>
            
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo ucfirst($res_value['product_name']); ?></td>
                <td><?php echo $res_value['quantity']; ?></td>
                <td><?php echo date('Y-m-d h:i A',strtotime($res_value['created_date'])); ?></td>
            </tr>
            <?php $count ++;
		}
		}else{
			echo '<tr><td colspan="3">No Record Found</td></tr>';	
		}
	}
	
	public function shop_stock_sold_report(){
		$all_record_res = $this->mod_report->get_all_shop_sold_record_ajax($this->input->post());
		if(count($all_record_res)>0){$count = 1;
		foreach($all_record_res as $res_value){
			?>
            
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo ucfirst($res_value['product_name']); ?></td>
                <td><?php echo $res_value['quantity']; ?></td>
                <!--<td><?php //echo date('Y-m-d',strtotime($res_value['created_date'])); ?></td>-->
            </tr>
            <?php $count ++;
		}
		}else{
			echo '<tr><td colspan="3">No Record Found</td></tr>';	
		}
	}
	
	public function shop_stock_report(){
		$all_record_res = $this->mod_report->get_all_shop_record_ajax($this->input->post('p_id'));
		if(count($all_record_res)>0){$count = 1;
		foreach($all_record_res as $res_value){
			?>
            
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo ucfirst($res_value['product_name']); ?></td>
                <td><?php echo $res_value['quantity']; ?></td>
                <td><?php echo $res_value['reorder_level']; ?></td>
            </tr>
            <?php $count ++;
		}
		}else{
			echo '<tr><td colspan="3">No Record Found</td></tr>';	
		}
	}
	
	public function pdf_stock_sold_report_table($p_id,$sdate,$edate){
		$this->load->library('cezpdf');
		$datearr = array('s_id'=>$p_id,'s_date'=>$sdate,'e_date'=>$edate);
		$all_product_return = $this->mod_report->get_all_shop_sold_pdf_record_ajax($datearr);
		
		$count = 0;
		foreach($all_product_return as $res_product){$count++;
			$tabl_data[] = array('Sr.no'=>$count,'Product Name'=>$res_product['product_name'],'Quantity'=>$res_product['quantity']);
		}
		
		$col_names = array(
			'Sr.no' => 'Sr.no',
			'Product Name' => 'Product Name',
			'Quantity' => 'Quantity'
		);

		$content = 'Start Date:'.$sdate.'                                                                                                                          End Date:'.$edate;
		$this->cezpdf->ezText($content, 10);
		
       
		$this->cezpdf->ezTable($tabl_data, $col_names, 'Shop Stock Sold', array('width'=>550));
		$this->cezpdf->ezStream();
	}
		public function pdf_check_in_out_report_table($sdate,$edate,$user,$user_name){
		$this->load->model('mod_check_in_out_report');
		$this->load->library('cezpdf');

		$data= $this->mod_check_in_out_report->get_check_in_out_history($sdate,$edate,$user);
		$name= $this->mod_check_in_out_report->get_user_name($user);
		// echo '<pre>';
		// print_r($data);
		// exit;
			
		// $datearr = array('s_id'=>$p_id,'s_date'=>$sdate,'e_date'=>$edate);
		// $all_product_return = $this->mod_report->get_all_shop_sold_pdf_record_ajax($datearr);
		// echo $user_name;
		// exit;
		$total_h=0;
        $total_s=0;
        $total_fine=0;
		$count = 0;

		foreach($data as $record){
			$count++;
			$salleried_hours=$record['total_salaried_hours'];
			$salary=$record['total_salary'];
			$fine=$record['late_fine'];
			$date=new DateTime($record['created_date']);
			$date=$date->format('d M Y');
			$tabl_data[] = array('Sr.no'=>$count,'Date'=>$date,'Salary Per Hour'=>$record['salary_per_h'],'Total Hours'=>(floor($salleried_hours)).'h '.(($salleried_hours*60)-(floor($salleried_hours)*60)).'min' ,'Total Salary'=>round($salary,2),'Total Fine'=>round($fine,2));
			$total_h+=$salleried_hours;
			$total_s+=round($salary,2);
			$total_fine+=$fine;


             
		}
		$total_h=(floor($total_h)).'h '.(($total_h*60)-(floor($total_h)*60)).'min';

		$tabl_data[] = array('Sr.no'=>' ','Date'=>' ','Salary Per Hour'=>'Total :','Total Hours'=>$total_h,'Total Salary'=> round( $total_s,2),'Total Fine'=>round( $total_fine,2));

		$tabl_data[] = array('Sr.no'=>' ','Date'=>' ','Salary Per Hour'=>'Grand Total :','Total Hours'=>'','Total Salary'=> round( $total_s-$total_fine,2),'Total Fine'=>'');

		$col_names = array(
			'Sr.no' => 'Sr.no',
			'Date' => 'Date',
			'Salary Per Hour' => 'Salary Per Hour (Pounds)',
			'Total Hours' => 'Total Salaried Hours',
			'Total Salary' => 'Total Salary (Pounds)',
			'Total Fine' => 'Total Fine (Pounds)',
			
			
		); 

// echo site_url("assets/images/t1-user_profile_1.png");
// exit;
		// $this->cezpdf->ezImage(base_url().'assets/images/t1-user_profile_1.png');

		// $image=$this->cezpdf->ezImage(site_url("assets/images/t1-user_profile_1.png"));
		// $this->cezpdf->ezImage( $image);

		$content = 'Start Date:'.$sdate.'                                                                                                                          End Date:'.$edate;

		$this->cezpdf->ezText($content, 10);
		$content = '';
		$this->cezpdf->ezText($content, 10);
			$content = 'Name : '.$name;
		$this->cezpdf->ezText($content, 11);
		$content = '';
		$this->cezpdf->ezText($content, 10);
		
       
		$this->cezpdf->ezTable($tabl_data, $col_names, '', array('width'=>550));


		$this->cezpdf->ezStream();
	}
	public function pdf_stock_return_report_table($sdate,$edate){
		
		$this->load->library('cezpdf');
		$datearr = array('s_date'=>$sdate,'e_date'=>$edate);
		$all_product_return = $this->mod_report->get_all_product_return_between_dates($datearr);
		
		$count = 0;
		foreach($all_product_return as $res_product){$count++;
			$tabl_data[] = array('Sr.no'=>$count,'Product Name'=>$res_product['product_name'],'Quantity'=>$res_product['quantity'],'Date/Time of Return'=>date('Y-m-d h:i A',strtotime($res_product['created_date'])));
		}
		
		$col_names = array(
			'Sr.no' => 'Sr.no',
			'Product Name' => 'Product Name',
			'Quantity' => 'Quantity',
			'Date/Time of Return' => 'Date/Time of Return'
		);
		
		
		$this->cezpdf->ezTable($tabl_data, $col_names, 'Overall Stock Return', array('width'=>550));
		$this->cezpdf->ezStream();
	}
	
	public function pdf_overall_stock_status_tables(){
		 $this->load->library('cezpdf');
   
		
		$all_product = $this->mod_report->get_all_product();
		$count = 0;
		foreach($all_product as $res_product){$count++;
			$tabl_data[] = array('Sr.no'=>$count,'Product Name'=>$res_product['product_name'],'Quantity'=>$res_product['quantity'],'Price'=>$res_product['price']);
		}
		
		$col_names = array(
			'Sr.no' => 'Sr.no',
			'Product Name' => 'Product Name',
			'Quantity' => 'Quantity',
			'Price' => 'Price'
		);
		 //$image=base_url().'logo.png';
         //$this->cezpdf->ezImage($image);
		 //$CI->cezpdf->addText(50,32,8,'Printed on ' . date('m/d/Y h:i:s a'));
		
		$this->cezpdf->ezTable($tabl_data, $col_names, 'Warehouse Stock Status', array('width'=>550));
		$this->cezpdf->ezStream();
	}
	
	public function pdf_overall_assign_stock_status_tables(){
		 $this->load->library('cezpdf');
   
		
		$all_product = $this->mod_report->get_all_product();
		
		$all_assign_product = $this->mod_report->get_all_assign_product();
		
		$count = 0;
		foreach($all_product as $res_product){$count++;
			$res_quntity = $res_product['quantity'];
			foreach($all_assign_product as $assign_qun ){
				if($assign_qun['product_id'] == $res_product['id']){
					$res_quntity = $assign_qun['product_id'] + $res_product['quantity'];
					break;	
				}
			}
			
			$tabl_data[] = array('Sr.no'=>$count,'Product Name'=>$res_product['product_name'],'Quantity'=>$res_quntity,'Price'=>$res_product['price']);
		}
		
		$col_names = array(
			'Sr.no' => 'Sr.no',
			'Product Name' => 'Product Name',
			'Quantity' => 'Quantity',
			'Price' => 'Price'
		);
		 //$image=base_url().'logo.png';http://192.168.1.201/projects/inventory_managment/
		 //$image='http://192.168.1.201/projects/inventory_managment/logo.png';
         //$this->cezpdf->ezImage($image,0,0,320);
		 //$CI->cezpdf->addText(50,32,8,'Printed on ' . date('m/d/Y h:i:s a'));
		
		$this->cezpdf->ezTable($tabl_data, $col_names, 'Overall Stock Status', array('width'=>550));
		$this->cezpdf->ezStream();
	}
	
	public function pdf_shop_stock_report_table($p_id){
		$this->load->library('cezpdf');
		$all_product = $this->mod_report->get_all_shop_record_ajax($p_id);
		$count = 0;
		foreach($all_product as $res_product){$count++;
			$tabl_data[] = array('Sr.no'=>$count,'Product Name'=>$res_product['product_name'],'Quantity'=>$res_product['quantity'],'Reorder'=>$res_product['reorder_level']);
		}
		
		$col_names = array(
			'Sr.no' => 'Sr.no',
			'Product Name' => 'Product Name',
			'Quantity' => 'Quantity',
			'Reorder' => 'Reorder'
		);
		
		
		$this->cezpdf->ezTable($tabl_data, $col_names, 'Overall Stock Status', array('width'=>550));
		$this->cezpdf->ezStream();
	}
	
	public function pdf_stock_in_report_table($s_date,$e_date){
		$this->load->library('cezpdf');
		$datearr = array('s_date'=>$s_date,'e_date'=>$e_date);
		
		$all_product = $this->mod_report->get_all_stock_in_report($datearr);
		$count = 0;
		foreach($all_product as $res_product){$count++;
			$tabl_data[] = array('Sr.no'=>$count,'Product Name'=>$res_product['product_name'],'Quantity'=>$res_product['quantity']);
		}
		
		$col_names = array(
			'Sr.no' => 'Sr.no',
			'Product Name' => 'Product Name',
			'Quantity' => 'Quantity'
		);
		$content = 'Start Date:'.$s_date.'                                                                                                                          End Date:'.$e_date;
		$this->cezpdf->ezText($content, 10);
		
		$this->cezpdf->ezTable($tabl_data, $col_names, 'Stock in Status', array('width'=>550));
		$this->cezpdf->ezStream();
	}
	
	public function pdf_expense_report_table($s_date,$e_date){
		$this->load->library('cezpdf');
		$datearr = array('s_date'=>$s_date,'e_date'=>$e_date);
		
		$all_expense_added = $this->mod_report->get_all_stock_report($datearr);
		$count = 0;
		foreach($all_expense_added as $res_product){$count++;
			$tabl_data[] = array('Sr.no'=>$count,'Expense Type'=>$res_product['expense_type'],'Expense Amount'=>$res_product['expense_amount'],'Expense Date'=>date('Y M d',strtotime($res_product['expense_date'])));
		}
		
		$col_names = array(
			'Sr.no' => 'Sr.no',
			'Expense Type' => 'Expense Type',
			'Expense Amount' => 'Expense Amount',
			'Expense Date' => 'Expense Date'
		);
		$content = 'Start Date:'.$s_date.'                                                                                                                          End Date:'.$e_date;
		$this->cezpdf->ezText($content, 10);
		
		$this->cezpdf->ezTable($tabl_data, $col_names, 'Expense Report', array('width'=>550));
		$this->cezpdf->ezStream();
	}
	
	public function pdf_expense_shop_reorder_table($s_id,$s_date,$e_date){
		$this->load->library('cezpdf');
		$datearr = array('s_id'=>$s_id,'s_date'=>$s_date,'e_date'=>$e_date);
		
		$all_notification = $this->mod_report->get_all_notification_report($datearr);
		$count = 0;
		foreach($all_notification as $res_product){$count++;
			$tabl_data[] = array('Sr.no'=>$count,'Product Name'=>$res_product['product_name'],'Shop Name'=>$res_product['shop_title'],'Date'=>date('Y M d',strtotime($res_product['created_date'])));
		}
		
		$col_names = array(
			'Sr.no' => 'Sr.no',
			'Product Name' => 'Product Name',
			'Shop Name' => 'Shop Name',
			'Date' => 'Date'
		);
		$content = 'Start Date:'.$s_date.'                                                                                                                          End Date:'.$e_date;
		$this->cezpdf->ezText($content, 10);
		
		$this->cezpdf->ezTable($tabl_data, $col_names, 'Shop Notification Report', array('width'=>550));
		$this->cezpdf->ezStream();
	}
	
	public function pdf_stock_return_report_table1($p_id){
		$this->load->library('cezpdf');
		$all_product = $this->mod_report->get_all_shop_process_record_ajax($p_id);
		$count = 0;
		foreach($all_product as $res_product){$count++;
			$tabl_data[] = array('Sr.no'=>$count,'Product Name'=>$res_product['product_name'],'Quantity'=>$res_product['quantity'],'Date'=>date('Y-m-d h:i A',strtotime($res_product['created_date'])));
		}
		
		$col_names = array(
			'Sr.no' => 'Sr.no',
			'Product Name' => 'Product Name',
			'Quantity' => 'Quantity',
			'Date' => 'Date'
		);
		
		
		$this->cezpdf->ezTable($tabl_data, $col_names, 'Shop Stock Return', array('width'=>550));
		$this->cezpdf->ezStream();
	}
	
	
}