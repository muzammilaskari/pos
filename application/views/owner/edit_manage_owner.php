<?php echo $header; ?>

<div class="page-container row-fluid"> 
  
  <!-- BEGIN SIDEBAR --> 
  <?php echo $sidebar; ?> 
  <!-- END SIDEBAR --> 
  
  <!-- BEGIN PAGE CONTAINER-->
  
  <div class="page-content"> 
    
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content sm-gutter">
      <div class="page-title"> </div>
      
      <!-- BEGIN DASHBOARD TILES --> 
      
      <!-- END DASHBOARD TILES -->
      
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple ">
            <div class="grid-body no-border">
              <h3 class="text-center heading_color">Detail Information</h3>
              <br>
              <div class="row">
                <div class="col-md-5 pull-left">
                  <?php
if($this->session->userdata('user_type')==1)
{   
?>
                  <!--<a class="btn btn-default" href="<?php echo SURL?>users/add_interior">Add Interior Design</a>-->
                  <?php
}  
?>
                </div>
                
                <!--form search starts here -->
                
                <div class="col-md-1 pull-right">
                <form id="frm_add" action="<?php echo SURL;?>users/manage_interior" method="post">
                  </div>
                  <div class="col-md-12">
                    <?php
                    if($this->session->flashdata('err_message')){
                ?>
                    <div class="alert alert-danger">
                      <center>
                      <?php echo $this->session->flashdata('err_message'); ?>
                      <center>
                    </div>
                    <?php
                    }//end if($this->session->flashdata('err_message'))
                    
                    if($this->session->flashdata('ok_message')){
                ?>
                    <div class="alert alert-success alert-dismissable">
                      <center>
                      <?php echo $this->session->flashdata('ok_message'); ?>
                      <center>
                    </div>
                    <?php 
                    }
                ?>
                  </div>
                </form>
                <!--form seardh ends here --> 
                
              </div>
              <br>
              <div class="panel-collapse collapse in" id="basicFormExample">
                <div class="ssm_home_dashboard">
                  <form>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="switch_board_main">
                          <div class="setalerts_table">
                            <div class="table-responsive">
                              <div id="newsResult">
                                <table class="table table-bordered table-striped table-hover">
                                  <tr>
                                    <td><h2>Firm Information</h2></td>
                                  <tr>
                                    <tbody>
                                  
                                  <?php
        foreach($interior as $int)
        {
        ?>
                                  <tr>
                                    <td>Firm Name</td>
                                    <td><?php echo $int['firm_name']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Email Address</td>
                                    <td><?php echo $int['email_address']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Street</td>
                                    <td><?php echo $int['street']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Second Street</td>
                                    <td><?php echo $int['second_street']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Country</td>
                                    <td><?php echo $int['country']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>City</td>
                                    <td><?php echo $int['city']; ?></td>
                                  </tr>
                                  <tr>
                                    <td><a class="btn btn-default" href="<?php echo SURL; ?>users/edit_owner/<?php echo $int['id']; ?>"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a></td>
                                    <a href="" onclick="javascript:history.go(-1)" class="btn btn-danger pull-left custom-marg">Cancel</a> </tr>
                                  <?php
if(!empty($interior[0]['sub'])){
?>
                                  <tr>
                                    <td><h2>Contact Information</h2></td>
                                  </tr>
                                    <tr>
                                  
                                  <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                      <tr>
                                        <th>Firm Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Firm Type</th>
                                        <!--<th>Date</th>
            <th>Type</th>-->
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
        foreach($interior[0]['sub'] as $k=>$ints)
        {
        ?>
                                      <tr>
                                        <td><?php echo $ints['firm_name']; ?></td>
                                        <td><?php echo $ints['employee_name']; ?></td>
                                        <td><?php echo $ints['email_address']; ?></td>
                                        <td><?php echo $ints['street'].'.'.$ints['second_street'].','.$ints['city'].','.$ints['country']; ?></td>
                                        <td><a class="btn btn-default" href="<?php echo SURL; ?>users/edit_contacts/<?php echo $ints['id']; ?>/<?php echo 1; ?>"><i class="fa fa-pencil" aria-hidden="true" title="edit the data"></i></a></td>
                                      </tr>
                                      </tr>
                                    
                                    <tr> </tr>
                                    <?php
        }
        ?>
                                      </tbody>
                                    
                                  </table>
                                    </tr>
                                  
                                  <?php
        }
        ?>
                                  <?php 
}

?>
                                    </tbody>
                                  
                                </table>
                              </div>
                            </div>
                          </div>
                          <div class="clear20"></div>
                          <div aria-label="First group" role="group" class="btn-group pull-right"> 
                            
                            <!--<button class="btn btn-default" type="button"><i class="fa fa-angle-left"></i></button>
        <button class="btn btn-default" type="button">1</button>
        <button class="btn btn-default" type="button">2</button>
        <button class="btn btn-default" type="button">3</button>
        <button class="btn btn-default" type="button">4</button>
        <button class="btn btn-default" type="button"><i class="fa fa-angle-right"></i></button>--> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- BEGIN CHAT -->
  
  <div class="chat-window-wrapper">
    <div id="main-chat-wrapper" class="inner-content">
      <div class="chat-window-wrapper scroller scrollbar-dynamic" id="chat-users" >
        <div class="chat-header">
          <div class="pull-left">
            <input type="text" placeholder="search">
          </div>
          <div class="pull-right"> <a href="#" class="" >
            <div class="iconset top-settings-dark "></div>
            </a> </div>
        </div>
        <div class="side-widget">
          <div class="side-widget-title">group chats</div>
          <div class="side-widget-content">
            <div id="groups-list">
              <ul class="groups" >
                <li><a href="#">
                  <div class="status-icon green"></div>
                  Office work</a></li>
                <li><a href="#">
                  <div class="status-icon green"></div>
                  Personal vibes</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="side-widget fadeIn">
          <div class="side-widget-title">favourites</div>
          <div id="favourites-list">
            <div class="side-widget-content" >
              <div class="user-details-wrapper active" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
                <div class="user-profile"> <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35"> </div>
                <div class="user-details">
                  <div class="user-name"> Jane Smith </div>
                  <div class="user-more"> Hello you there? </div>
                </div>
                <div class="user-details-status-wrapper"> <span class="badge badge-important">3</span> </div>
                <div class="user-details-count-wrapper">
                  <div class="status-icon green"></div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="David Nester">
                <div class="user-profile"> <img src="assets/img/profiles/c.jpg"  alt="" data-src="assets/img/profiles/c.jpg" data-src-retina="assets/img/profiles/c2x.jpg" width="35" height="35"> </div>
                <div class="user-details">
                  <div class="user-name"> David Nester </div>
                  <div class="user-more"> Busy, Do not disturb </div>
                </div>
                <div class="user-details-status-wrapper">
                  <div class="clearfix"></div>
                </div>
                <div class="user-details-count-wrapper">
                  <div class="status-icon red"></div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="side-widget">
          <div class="side-widget-title">more friends</div>
          <div class="side-widget-content" id="friends-list">
            <div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
              <div class="user-profile"> <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35"> </div>
              <div class="user-details">
                <div class="user-name"> Jane Smith </div>
                <div class="user-more"> Hello you there? </div>
              </div>
              <div class="user-details-status-wrapper"> </div>
              <div class="user-details-count-wrapper">
                <div class="status-icon green"></div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="David Nester">
              <div class="user-profile"> <img src="assets/img/profiles/h.jpg"  alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35"> </div>
              <div class="user-details">
                <div class="user-name"> David Nester </div>
                <div class="user-more"> Busy, Do not disturb </div>
              </div>
              <div class="user-details-status-wrapper">
                <div class="clearfix"></div>
              </div>
              <div class="user-details-count-wrapper">
                <div class="status-icon red"></div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
              <div class="user-profile"> <img src="assets/img/profiles/c.jpg"  alt="" data-src="assets/img/profiles/c.jpg" data-src-retina="assets/img/profiles/c2x.jpg" width="35" height="35"> </div>
              <div class="user-details">
                <div class="user-name"> Jane Smith </div>
                <div class="user-more"> Hello you there? </div>
              </div>
              <div class="user-details-status-wrapper"> </div>
              <div class="user-details-count-wrapper">
                <div class="status-icon green"></div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="David Nester">
              <div class="user-profile"> <img src="assets/img/profiles/h.jpg"  alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35"> </div>
              <div class="user-details">
                <div class="user-name"> David Nester </div>
                <div class="user-more"> Busy, Do not disturb </div>
              </div>
              <div class="user-details-status-wrapper">
                <div class="clearfix"></div>
              </div>
              <div class="user-details-count-wrapper">
                <div class="status-icon red"></div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="chat-window-wrapper" id="messages-wrapper" style="display:none">
        <div class="chat-header">
          <div class="pull-left">
            <input type="text" placeholder="search">
          </div>
          <div class="pull-right"> <a href="#" class="" >
            <div class="iconset top-settings-dark "></div>
            </a> </div>
        </div>
        <div class="clearfix"></div>
        <div class="chat-messages-header">
          <div class="status online"></div>
          <span class="semi-bold">Jane Smith(Typing..)</span> <a href="#" class="chat-back"><i class="icon-custom-cross"></i></a> </div>
        <div class="chat-messages scrollbar-dynamic clearfix">
          <div class="inner-scroll-content clearfix">
            <div class="sent_time">Yesterday 11:25pm</div>
            <div class="user-details-wrapper " >
              <div class="user-profile"> <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35"> </div>
              <div class="user-details">
                <div class="bubble"> Hello, You there? </div>
              </div>
              <div class="clearfix"></div>
              <div class="sent_time off">Yesterday 11:25pm</div>
            </div>
            <div class="user-details-wrapper ">
              <div class="user-profile"> <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35"> </div>
              <div class="user-details">
                <div class="bubble"> How was the meeting? </div>
              </div>
              <div class="clearfix"></div>
              <div class="sent_time off">Yesterday 11:25pm</div>
            </div>
            <div class="user-details-wrapper ">
              <div class="user-profile"> <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35"> </div>
              <div class="user-details">
                <div class="bubble"> Let me know when you free </div>
              </div>
              <div class="clearfix"></div>
              <div class="sent_time off">Yesterday 11:25pm</div>
            </div>
            <div class="sent_time ">Today 11:25pm</div>
            <div class="user-details-wrapper pull-right">
              <div class="user-details">
                <div class="bubble sender"> Let me know when you free </div>
              </div>
              <div class="clearfix"></div>
              <div class="sent_time off">Sent On Tue, 2:45pm</div>
            </div>
          </div>
        </div>
        <div class="chat-input-wrapper" style="display:none">
          <textarea id="chat-message-input" rows="1" placeholder="Type your message"></textarea>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  
  <!-- END CHAT --> 
  
</div>
<?php echo $footer; ?>