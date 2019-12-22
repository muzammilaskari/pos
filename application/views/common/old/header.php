<!DOCTYPE html>

<html>

<head>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<meta charset="utf-8" />

<title>Inventory Management Dashboard</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<meta content="" name="description" />

<meta content="" name="author" />


<link href="<?php echo SURL; ?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />

<!-- BEGIN CORE CSS FRAMEWORK -->

<link href="<?php echo SURL; ?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/plugins/jquery-metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo SURL; ?>assets/plugins/shape-hover/css/demo.css" />

<link rel="stylesheet" type="text/css" href="<?php echo SURL; ?>assets/plugins/shape-hover/css/component.css" />

<link rel="stylesheet" type="text/css" href="<?php echo SURL; ?>assets/plugins/owl-carousel/owl.carousel.css" />

<link rel="stylesheet" type="text/css" href="<?php echo SURL; ?>assets/plugins/owl-carousel/owl.theme.css" />

<link href="<?php echo SURL; ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>

<link href="<?php echo SURL; ?>assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>

<link rel="stylesheet" href="<?php echo SURL; ?>assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen" >

<link rel="stylesheet" href="<?php echo SURL; ?>assets/plugins/Mapplic/mapplic/mapplic.css" type="text/css" media="screen" >

<link href="<?php echo SURL; ?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/css/animate.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
    
    <link rel="stylesheet" type="text/css" href="<?php echo SURL; ?>/assets/css/extra/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SURL; ?>/assets/css/extra/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SURL; ?>/assets/css/extra//demo.css">
	<script type="text/javascript" src="<?php echo SURL; ?>/assets/css/extra/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo SURL; ?>/assets/css/extra/jquery.easyui.min.js"></script>

<link rel="stylesheet" href="<?php echo SURL; ?>assets/plugins/fullcalendar/fullcalendar.css" type="text/css" media="" >




<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->

<link href="<?php echo SURL; ?>assets/css/style.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SURL; ?>assets/css/magic_space.css" rel="stylesheet" type="text/css"/>

<!-- END CSS TEMPLATE -->



</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="">

<!-- BEGIN HEADER -->

<div class="header navbar navbar-inverse ">

  <!-- BEGIN TOP NAVIGATION BAR -->

  <div class="navbar-inner">

    <div class="header-seperation">

      <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">

        <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" >

          <div class="iconset top-menu-toggle-white"></div>

          </a> </li>

      </ul>

      <!-- BEGIN LOGO -->

      <a class="head_logo" href="index.php"><strong>Inventory Management</strong> Pac</a>

      <!-- END LOGO -->

      <ul class="nav pull-right notifcation-center">

        <li class="dropdown" id="header_task_bar"> <a href="index.php" class="dropdown-toggle active" data-toggle="">

          <div class="iconset top-home"></div>

          </a> </li>

        <li class="dropdown" id="header_inbox_bar" > <a href="inbox.php" class="dropdown-toggle" >

          <div class="iconset top-messages"></div>

          <span class="badge" id="msgs-badge">2</span> </a></li>

        <li class="dropdown" id="portrait-chat-toggler" style="display:none"> <a href="#sidr" class="chat-menu-toggle">

          <div class="iconset top-chat-white "></div>

          </a> </li>

      </ul>

    </div>

    <!-- END RESPONSIVE MENU TOGGLER -->

    <div class="header-quick-nav" >

      <!-- BEGIN TOP NAVIGATION MENU -->

      <div class="pull-left">

        <ul class="nav quick-section">

          <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle" >

            <div class="iconset top-menu-toggle-dark"></div>

            </a> </li>

        </ul>

        <ul class="nav quick-section">

          
          <li class="m-r-10 input-prepend inside search-form no-boarder"> <span class="add-on"> <span class="iconset top-search"></span></span>

            <input name="" type="text"  class="no-boarder " placeholder="Search Dashboard" style="width:250px;">

          </li>

        </ul>

      </div>

      <!-- END TOP NAVIGATION MENU -->

      <!-- BEGIN CHAT TOGGLER -->

      <div class="pull-right">

        <div class="chat-toggler"> <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"  data-content='' data-toggle="dropdown" data-original-title="Notifications">

          <div class="user-details">

            <div class="username"> <span class="badge badge-important">3</span> Abdul <span class="bold">Moeed</span> </div>

          </div>

          <div class="iconset top-down-arrow"></div>

          </a>

          <div id="notification-list" style="display:none">

            <div style="width:300px">

              <div class="notification-messages info">

                <div class="user-profile"> <img src="<?php echo SURL;?>assets/img/profiles/d.jpg"  alt="" data-src="<?php echo SURL; ?>assets/img/profiles/d.jpg" data-src-retina="<?php echo SURL; ?>assets/img/profiles/d2x.jpg" width="35" height="35"> </div>

                <div class="message-wrapper">

                  <div class="heading"> David Nester - Commented on your wall </div>

                  <div class="description"> Meeting postponed to tomorrow </div>

                  <div class="date pull-left"> A min ago </div>

                </div>

                <div class="clearfix"></div>

              </div>

              <div class="notification-messages danger">

                <div class="iconholder"> <i class="icon-warning-sign"></i> </div>

                <div class="message-wrapper">

                  <div class="heading"> Server load limited </div>

                  <div class="description"> Database server has reached its daily capicity </div>

                  <div class="date pull-left"> 2 mins ago </div>

                </div>

                <div class="clearfix"></div>

              </div>

              <div class="notification-messages success">

                <div class="user-profile"> <img src="<?php echo SURL; ?>assets/img/profiles/h.jpg"  alt="" data-src="<?php echo SURL; ?>assets/img/profiles/h.jpg" data-src-retina="<?php echo SURL; ?>assets/img/profiles/h2x.jpg" width="35" height="35"> </div>

                <div class="message-wrapper">

                  <div class="heading"> You haveve got 150 messages </div>

                  <div class="description"> 150 newly unread messages in your inbox </div>

                  <div class="date pull-left"> An hour ago </div>

                </div>

                <div class="clearfix"></div>

              </div>

            </div>

          </div>

          <div class="profile-pic"> <img src="<?php echo SURL; ?>assets/profile_images/thumb/<?php echo $this->session->userdata('user_image'); ?>"  alt="" data-src="<?php echo SURL; ?>assets/profile_images/thumb/<?php echo $this->session->userdata('user_image'); ?>" data-src-retina="<?php echo SURL; ?>assets/img/profiles/avatar_small2x.jpg" width="35" height="35" /> </div>

        </div>

        <ul class="nav quick-section ">

          <li class="quicklinks"> <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">

            <div class="iconset top-settings-dark "></div>

            </a>

            <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">

              <li><a href="#"> My Account</a> </li>

              <li><a href="<?php echo SURL; ?>users/change_password">Change password</a> </li>

              <li><a href="inbox.php"> My Inbox&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a> </li>

              <li class="divider"></li>

              <li><a href="<?php echo SURL; ?>users/logout_user"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>

            </ul>

          </li>

          

        </ul>

      </div>

      <!-- END CHAT TOGGLER -->

    </div>

    <!-- END TOP NAVIGATION MENU -->

  </div>

  <!-- END TOP NAVIGATION BAR -->

</div>

<!-- END HEADER -->

<!-- BEGIN CONTAINER -->




