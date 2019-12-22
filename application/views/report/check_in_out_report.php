<?php echo $header_script;?>
<!-- Overlay Div -->
<div id="overlay" class="transparent"></div>



<div id="wrapper" class="preload">
  <?php echo $header;?><!-- /top-nav-->
  <!-- /top-nav-->
  <!--Start Left Panel-->

  <?php echo $sidebar;?>
  <!--End Left Panel-->

  <div id="main-container">
    <div id="breadcrumb">
        <div id="topbar">
          <ol class="breadcrumb"><li class="active">Dashboard</li></ol>
      </div>
  </div><!-- /breadcrumb-->


  <div class="padding-md">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div id="placeholder"  style="height:1px; visibility:hidden;"></div>
                
                
            </div><!-- /panel -->

          <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><h3>Check In/Out History</h3></strong>
                    <hr>
                    <form method="post" action="<?php echo SURL?>check_in_out_report/check_in_out_history">
                        <div class="col-md-3">
                            <label>Select From date</label>
                            <input type="text" class=" form-control " name="start_date" value="<?php echo $start_date?>"  id="datepicker"/>
                        </div>
                        <div class="col-md-3">
                            <label>Select To date</label>
                            <input type="text" class="form-control" name="end_date" value="<?php echo $end_date ?>" id="datepicker2"/>
                        </div>
                        <div class="col-md-3">
                            <label>Select User</label>
                            <div class="costom-control">
                                <?php if(count($all_users_res)>0){?>
                                    <select id="shop_list" name="user_list" class="form-control" >
                                        <?php foreach($all_users_res as $user_detail){?>
                                            <option <?php if(isset($list_value) and $user_detail['id'] == $list_value){?> selected="selected"<?php }?>  value="<?php echo $user_detail['id'];?>"> <?php echo $user_detail['user_name'];?></option>
                                            <?php }?>
                                        </select>
                                        <?php }?>
                                        <!--<input type="text" class="form-control" name="serch_assign_shop" onkeyup="serch_res()" id="serch_assign_shop" placeholder="Search"/>-->

                                    </div>
                                </div>


                                <div class="col-md-1">
                                    <input type="submit" name="calculate" onclick="product_roc()" id="calculate" value="View" class="btn costom-agline btn-success btn-sm bounceIn animation-delay5 " />
                                </div>
                            </form>
                            <a target="_blank" href="#" id="print_hrf" class="btn costom-agline btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-sign-in"></i> Print </a>

                            <!--<a href="<?php echo base_url();?>manage_product/add_product" class="btn btn-success btn-sm bounceIn animation-delay5 "><i class="fa fa-sign-in"></i> Add Product</a>-->
                            <!--<button class="btn btn-success btn-sm bounceIn animation-delay5 " id="submit" type="submit" name="submit" value="submit" ><i class="fa fa-sign-in"></i> Add</button>-->
                        <!--<span class="badge badge-info pull-right">	
                            <a href="#" style="color:#fff;">View All</a>
                        </span>-->
                    </div>

                    <div class="col-md-12">
                      <?php
                      if($this->session->flashdata('err_message')){
                        ?>
                        <div class="alert alert-danger"><center><?php echo $this->session->flashdata('err_message'); ?><center></div>
                        <?php
                            }//end if($this->session->flashdata('err_message'))
                            
                            if($this->session->flashdata('ok_message')){
                                ?>
                                <div class="alert alert-success alert-dismissable"><center><?php echo $this->session->flashdata('ok_message'); ?><center></div>
                                <?php 
                            }
                            ?>
                        </div>


                        <div class="costom-table-agline">
                            <div class="clearfix"></div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="costom-thead-bg">
                                        <tr>
                                            <td>#</td>
                                            <td>Date</td>
                                            <td>Salary Per Hour</td>
                                            <td>Total Hours</td>
                                            <td>Salaried Hours</td>
                                            <td>Total Salary</td>
                                             <td>Total Fine</td>
      

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($user_data) && (count($user_data) > 0)){$count = 1;
                                            $total_h=0;
                                            $total_s=0;
                                            $total_fine=0;
                                            foreach($user_data as $res){


                                                $salleried_hours=$res['total_salaried_hours'];
                                                $salary=$res['total_salary'];
                                                $fine=$res['late_fine'];
                                       
                                                   ?>
                                               <tr>
                                                <td><?php echo $count;?></td>                                          
                                                <td><?php echo date('M d Y',strtotime($res['created_date'])); ?></td>
                                                <td><?php echo $res['salary_per_h']; ?></td>
                                                  <td><?php echo floor($res['total_hours']).'h '.round((($res['total_hours']*60)-(floor($res['total_hours'])*60))).'min'; ?></td>
                                                  <td><?php echo floor($salleried_hours).'h '.round((($salleried_hours*60)-(floor($salleried_hours)*60))).'min'; ?></td>
                                                <td><?php echo round($salary,2); ?></td>
                                                <td><?php echo round($fine,2); ?></td>                                       
                                            </tr>
                                            <?php
                                            $total_h+=$salleried_hours;
                                            $total_s+=$salary;
                                            $total_fine+=$fine;

                                            $count++;}
                                            ?>
                                            <tr>

                                              <td></td>
                                              <td></td>
                                               <td></td>
                                              <td>Total :</td>
                                              <td><B><?php echo floor($total_h).'h '.round((($total_h*60)-(floor($total_h)*60))).'min';

                                               ?></B></td>

                                              <td><B><?php echo '&#163;'.round($total_s,2) ?></B></td>
                                              <td><B><?php echo '&#163;'.round($total_fine,2) ?></B></td>

                                          </tr>

                                            <tr>

                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td>Grand Total :</td>
                                               <td></td>
                                              <td><B><?php echo '&#163;'.round($total_s-$total_fine,2) ?></B></td>
                                               <td></td>

                                          </tr>


                                          <?php
                                      }else{?>
                                        <tr>
                                            <td colspan="7">No record Found</td>
                                        </tr>
                                        <?php }?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div><!-- /panel -->

                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.padding-md -->
    </div>
    <script>
        $(document).ready(function(){
  // we call the function
  product_roc();
  //product_roc();
// Datepicker Popups calender to Choose date.
$(function() {
    $("#datepicker").datepicker();
    
});
$(function() {
    $("#datepicker2").datepicker();
    
});
$("#print_hrf").on('click',function () {
     product_roc();
});

});


        function product_roc(){
        //alert('testing');
        var s_date = $("#datepicker").val();
        var e_date = $("#datepicker2").val();
        var user = $("#shop_list").val();
var user_name=$.trim($("#shop_list option:selected").text());

$("#print_hrf").attr("href", "<?php echo SURL; ?>manage_report/pdf_check_in_out_report_table/"+s_date+"/"+e_date+"/"+user+"/"+user_name)
// alert($("#print_hrf").attr("href"));
}




</script>   
<script>
	function del_rec(){
		if (confirm('Are you sure you want to Delete?')) {
			return true;
		} else {
			return false;
			// Do nothing!
		}
	}
</script>	
</div><!-- /wrapper -->

<?php echo $footer;?>