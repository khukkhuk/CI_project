<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Teacher</title>
	<meta name="description" content="Hound is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Hound Admin, Houndadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="<?php echo base_url();?>assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<link href="<?php echo base_url();?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		
	<!-- Custom CSS -->
	<link href="<?php echo base_url();?>assets/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-1-active pimary-color-red">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="index.html">
							<img class="brand-img" src="<?php echo base_url();?>assets/dist/img/logo.png" alt="brand"/>
							<span class="brand-text">ระบบเช็คกิจกรรม</span>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>

				
			</div>
				
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
					<li>
				<style>
					.txt_name{
						margin-top: 20px;
						border-radius: 2px;
						padding-top: 5px;
						padding-bottom: 5px;
						padding-left: 30px;
						padding-right: 5px;
						color :black;
						border-width: 0px;
					}
				</style>
						<input type="text" name="example-input1-group2" class="txt_name" value="<?php echo 
		$name=$this->session->userdata('name');?>">
						</li>
				<li><hr class="light-grey-hr mb-10"/></li>

				<li class="navigation-header">
					<span>สถิติ</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a class="active" href="<?php echo base_url();?>teacher/index" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
					
				</li>
				
				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>กิจกรรม</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">กิจกรรมเข้าแถว</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a href="<?php echo base_url();?>teacher/show_lineup">เช็คกิจกรรม</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>teacher/show_lineup">ดูผลสรุป</a>
						</li>
					</ul>
				</li>
				<li>
					<a href='javascript:void(0);'' data-toggle='collapse' data-target='#form_dr'><div class='pull-left'><i class='zmdi zmdi-edit mr-20'></i><span class='right-nav-text'>กิจกรรมโฮมรูม</span></div><div class='pull-right'><i class='zmdi zmdi-caret-down'></i></div><div class='clearfix'></div></a>
					<ul id='form_dr' class='collapse collapse-level-1 two-col-list'>
						<li>
							<a href='<?php echo base_url();?>teacher/show_homeroom'>เช็คชื่อกิจกรรม</a>
						</li>
						<li>
							<a href='<?php echo base_url();?>teacher/report06'>อค06</a>
						</li>
					</ul>
				</li>
				<li>
					<a href='<?php echo base_url();?>teacher/show_depart' data-toggle='collapse' data-target='#chart_dr'><div class='pull-left'><i class='zmdi zmdi-chart-donut mr-20'></i><span class='right-nav-text'>กิจกรรมแผนก </span></div><div class='pull-right'></div><div class='clearfix'></div></a>
					
				</li>
				<li>		
					<a href= '<?php echo base_url();?>teacher/show_scout' data-toggle='collapse' data-target='#table_dr'><div class='pull-left'><i class='zmdi zmdi-format-size mr-20'></i><span class='right-nav-text'>กิจกรรมลูกเสือ</span></div><div class='pull-right'></div><div class='clearfix'></div></a>
					
				</li>
				<li>
					<a href="<?php echo base_url();?>teacher/show_special" data-toggle="collapse" data-target="#icon_dr"><div class="pull-left"><i class="zmdi zmdi-iridescent mr-20"></i><span class="right-nav-text">กิจกรมมพิเศษ</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
					
				</li>

				<li>
					<a href="<?php echo base_url();?>teacher/follow" data-toggle="collapse" data-target="#maps_dr"><div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span class="right-nav-text">ติดตามผลกิจกรรม</span></div><div class="clearfix"></div></a>
				</li>



				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>การใช้งาน</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<!-- <li>
					<a href="<?php echo base_url();?>teacher/profile" data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span class="right-nav-text">ข้อมูลส่วนตัว</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
					
				</li> -->
				<li>
					<a href="<?php echo base_url();?>teacher/logOut"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">ออกจากระบบ</span></div><div class="clearfix"></div></a>
				</li>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
 
       

