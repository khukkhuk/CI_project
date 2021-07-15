<!DOCTYPE html>
<html lang="en">
<title>ADMIN</title>
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
						
							<img class="brand-img" src="<?php echo base_url();?>assets/dist/img/logo.png" alt="brand" height="20" width="20" />
							<span class="brand-text">ระบบเช็คกิจกรรม</span>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				
				
			</div>
				
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<style>
					.txt_name{
						margin-left: 8px;
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
				

				<div class="txt_name">
					<form action="" method="POST">
						<select name="ch_year">
							<option ><?php echo $this->session->userdata('years');?></option>
				<?php
				$sect = "SELECT * FROM terms ORDER BY term_name DESC";
				$rs_sl = $this->db->query($sect);
				foreach($rs_sl->result() As $row){

				?>			
				<option value="<?php echo $row->term_name;?>">
					<?php echo $row->term_name;?>
				</option>
				<?php } ?>
						</select>
						<style type="text/css">
							.btn_y{

							}
						</style>
						<input class="btn_y" type="submit" name="btn-years">
						</form></div>
					</li>

						<li>
						<input  type="text" disabled name="example-input1-group2" class="txt_name" value="<?php echo 
		$name=$this->session->userdata('name')." ".$this->session->userdata('lname') ;?>">
						</li>
						<li>
							<?php //echo $this->session->userdata('years');?>
						</li>
				<li><hr class="light-grey-hr mb-10"/></li>

				<li class="navigation-header">
					<span>สถิติ</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li >
					<a href="<?php echo base_url();?>admin/dashboard"  data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
				</li>
				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>การจัดการ</span> 
					<i class="zmdi zmdi-more"></i>
				
				<li>
					<a href="<?php echo base_url();?>admin/report_act" data-toggle="collapse" data-target="#table_dr"><div class="pull-left"><i class="zmdi zmdi-format-size mr-20"></i><span class="right-nav-text">ดูรายงานกิจกรรม</span></div><div class="clearfix"></div></a>
					 
				</li>
				</li> 

				<li>
					<a href="<?php echo base_url();?>admin/manage_day" data-toggle="collapse" data-target="#table_dr"><div class="pull-left"><i class="zmdi zmdi-format-size mr-20"></i><span class="right-nav-text">จัดการวันหยุด</span></div><div class="clearfix"></div></a>
					 
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/manage_act" data-toggle="collapse" data-target="#icon_dr"><div class="pull-left"><i class="zmdi zmdi-iridescent mr-20"></i><span class="right-nav-text">จัดการกิจกรรมพิเศษ</span></div><div class="clearfix"></div></a>
					
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/manage_term" data-toggle="collapse" data-target="#icon_dr"><div class="pull-left"><i class="zmdi zmdi-iridescent mr-20"></i><span class="right-nav-text">จัดการปีการศึกษา</span></div><div class="clearfix"></div></a>
					
				</li>
				<?php  

					if($this->session->userdata('username')=='admin'){
					?>
				<li>
					<a href="<?php echo base_url();?>admin/manage_admin" data-toggle="collapse" data-target="#icon_dr"><div class="pull-left"><i class="zmdi zmdi-iridescent mr-20"></i><span class="right-nav-text">จัดการผู้จัดการระบบ</span></div><div class="clearfix"></div></a>
					
				</li>
				<?php } ?>

				<li>
					
				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>ข้อมูล</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/Mydata"  data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span class="right-nav-text">ข้อมูลส่วนตัว</span></div><div class="clearfix"></div></a>
					
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/LogOut"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">ออกจากระบบ</span></div><div class="clearfix"></div></a>
				</li>
				<li>

		</div> 