<?php echo $header_script;?>
<style type="text/css">

    table {
        font-size: 1em;
        border-collapse: collapse;
        margin: 0 auto
    }
    table, th, td {
        /*border: 1px solid #999;*/
        padding: 8px 16px;
        text-align: left;
    }
    table.ex-2 {
        min-width: 100px;
    }
    th {
        /*background: #f4f4f4;*/
        cursor: pointer;
    }

    th:hover,
    th.sorted {
        /*background: #d4d4d4;*/
    }

    th.no-sort,
    th.no-sort:hover {
        /*background: #f4f4f4;*/
        cursor: not-allowed;
    }

    th.sorted.ascending:after {
        content: "  \2191";
    }

    th.sorted.descending:after {
        content: " \2193";
    }

    .disabled {
        opacity: 0.5;
    }
    .panel.panel-default .panel-heading{ padding-bottom:62px;}
    .table-responsive {
        overflow-x: auto;
        /* min-height: 0.01%; */
        height: 300px;
    }
</style>

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
                        <strong>User Check In/Out Management</strong>
                        <hr>
                        <div>
                            <div class="col-md-3">
                                <label>Select date</label>
                                <input type="text" class=" form-control " name="date"  value="<?php echo $date?>"  id="datepicker"/>
                            </div>
							<div class="col-md-1">
                                  <button class="btn btn-success btn-sm bounceIn animation-delay5 " id="submit" type="button" onclick="product_roc()" name="submit" value="submit" style="margin-top: 25px; margin-bottom: 10px;" ><i class="fa fa-sign-in"></i>&nbsp;&nbsp;View</button>
								  
                        <!--<span class="badge badge-info pull-right">  
                            <a href="#" style="color:#fff;">View All</a>
                        </span>-->
                    </div>
                    <div class="col-md-12">
                     <?php
                     if(isset($error_msg)){
                        ?>
                        <div class="alert alert-danger"><center><?php echo $error_msg; ?><center></div>
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
                            <div id="testDiv">
                            <div class="table-responsive auto_height">
                                <div class="table">
                                        <div class="col-md-12">
                                        <div class="tr_style_design">
                                        <div class="form_parent form_set_class_1">#</div>
                                        <div class="form_parent form_set_class_2">User Name</div>
                                        <div class="form_parent form_set_class_3">Shop Title</div>
                                        <div class="form_parent form_set_class_4">Check In Time</div>
                                        <div class="form_parent form_set_class_5">Check Out Time</div>
                                        <div class="form_parent form_set_class_6">Late Comming</div>
                                        <div class="form_parent form_set_class_7">Total Hours</div>
                                         <div class="form_parent form_set_class_7">Salleried Hours</div>
                                        <div class="form_parent form_set_class_8">Total Salary</div>
                                        <div class="form_parent form_set_class_9">Action</div>
                                        </div>
                                        </div>
                                        <!-- <th class="no-sort" width="2%">&nbsp;</th> -->
                                    	<div class="col-md-12">
                                    <div id="res_responce" class="for_some_design">
                                </div>
                                <div id="pag_dis"><?php  echo $this->pagination->create_links();?> </div>
                            </div>
                        </div>
                    </div><!-- /panel -->
                    
                    </div>
                    

                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.padding-md -->
    </div>
    <script>
        $(document).ready(function(){
  // we call the function
  product_roc();
});
        $(document).ready(function(){

            $(function() {
                $("#datepicker").datepicker();

            });

        });


        function product_roc(){
  
            var date = $('#datepicker').val();
       // alert(date);
        //alert(p_id);
        $.ajax({

            type: "POST",

            url: "<?php echo SURL; ?>edit_check_in_out/load_data/",

            data: {'date': date},

            success: function(data){

              $("#res_responce").html(data);

          }

      });
        
    }

    function del_rec(){
        if (confirm('Are you sure you want to Delete?')) {
            return true;
        } else {
            return false;
            // Do nothing!
        }
    }
    function serch_res(){
        var serch_data = $('#serch_user').val();
        //alert(serch_data);
        $("#pag_dis").hide();
        
        $.ajax({
            type: "post",
            url: "<?php echo SURL;?>manage_user/search_user",
            cache: false,   
            data: {serch_data: serch_data},
            
            success: function(response){
                $('#responce_res').html(response);
            }
        });
    }
</script>   
</div><!-- /wrapper -->

<?php echo $footer;?>