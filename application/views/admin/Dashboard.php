<?php 
		include "top.php"
?>
			  <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<?php
													$sql= "SELECT * From student";
													$query = $this->db->query($sql);
													$nums = $query->num_rows();
																									
													?>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $nums;?></span></span>
													<span class="weight-500 uppercase-font txt-light block font-13">จำนวนนักศึกษา</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-male-female txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-yellow">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<?php
													$sql1= "SELECT * From student Where pre_name='นาย'";
													$query1 = $this->db->query($sql1);
													$nums1 = $query1->num_rows();
																									
													?>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $nums1;?></span></span>
													<span class="weight-500 uppercase-font txt-light block">นักศึกษาชาย</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-male-alt txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<style type="text/css">
						.card-view {
    margin-left: 4px;
}
					</style>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-green">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<?php
													$sql2= "SELECT * From student Where pre_name='นาง' OR pre_name='นางสาว'";
													$query2 = $this->db->query($sql2);
													$nums2 = $query2->num_rows();
																									
													?>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $nums2;?></span></span>
													<span class="weight-500 uppercase-font txt-light block">นักศึกษาหญิง</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-female txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					 
				<!-- /Row -->
				
				<!-- Row -->
				<div class="row">
						<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <!-- <div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">กราฟ</h6>
								</div>
								<div class="pull-right">
									<span class="no-margin-switcher">
										<input type="checkbox" id="morris_switch"  class="js-switch" data-color="#ff2a00" data-secondary-color="#2879ff" data-size="small"/>	
									</span>	
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
                                <div class="panel-body">
									<div id="morris_extra_line_chart" class="morris-chart" style="height:293px;"></div>
									<ul class="flex-stat mt-40">
										<li>
											<span class="block">Weekly Users</span>
											<span class="block txt-dark weight-500 font-18"><span class="counter-anim">3,24,222</span></span>
										</li>
										<li>
											<span class="block">Monthly Users</span>
											<span class="block txt-dark weight-500 font-18"><span class="counter-anim">1,23,432</span></span>
										</li>
										<li>
											<span class="block">Trend</span>
											<span class="block">
												<i class="zmdi zmdi-trending-up txt-success font-24"></i>
											</span>
										</li>
									</ul>
								</div>
							</div>
                        </div> -->
                        <?php 

                        if(0): ?>
                        <div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
                                <div class="panel-body sm-data-box-1">
									<span class="uppercase-font weight-500 font-14 block text-center txt-dark"><span>	
									<div class="cus-sat-stat weight-500 txt-success text-center mt-5">
										<span class="counter-anim">60.13</span><span>%</span>
									</div>
									<div class="progress-anim mt-20">
										<div class="progress">
											<div class="progress-bar progress-bar-success wow animated progress-animated" role="progressbar" aria-valuenow="60.12" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<ul class="flex-stat mt-5">
										<li>
											<span class="block">Previous</span>
											<span class="block txt-dark weight-500 font-15">79.82</span>
										</li>
										<li>
											<span class="block">% Change</span>
											<span class="block txt-dark weight-500 font-15">+14.29</span>
										</li>
										<li>
											<span class="block">Trend</span>
											<span class="block">
												<i class="zmdi zmdi-trending-up txt-success font-20"></i>
											</span>
										</li>
									</ul>
								</div>
                            </div>
                        </div>
                    <?php endif ?>
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">ประเภทผู้เรียน</h6>
								</div>
								
								<div class="clearfix"></div>
							</div>
							<?php
													$sql3= "SELECT * From student Where std_edu='ปกติ'";
													$query3 = $this->db->query($sql3);
													$nums3 = $query3->num_rows();
													
													$sql4= "SELECT * From student Where std_edu='ทวิภาคี'";
													$query4 = $this->db->query($sql4);
													$nums4 = $query4->num_rows();
																			

													$sql5= "SELECT * From student Where std_edu='ม.6'";
													$query5 = $this->db->query($sql5);
													$nums5 = $query5->num_rows();	


													$sql6= "SELECT * From student Where std_edu='ทวิศึกษา'";
													$query6 = $this->db->query($sql6);
													$nums6 = $query6->num_rows();	

													$sql7= "SELECT * From student Where std_edu='ผู้เข้าเรียน'";
													$query7 = $this->db->query($sql7);
													$nums7 = $query7->num_rows();				
													?>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div>
										<span class="pull-left inline-block capitalize-font txt-dark">
											จำนวนนักศึกษาในภาคปกติ
										</span>
										<span class="label label-warning pull-right"><?php echo $nums3;?></span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											จำนวนนักศึกษาในภาคทวิภาคี
										</span>
										<span class="label label-danger pull-right"><?php echo $nums4;?></span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											จำนวนนักศึกษาในภาคม.6
										</span>
										<span class="label label-success pull-right"><?php echo $nums5;?></span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											จำนวนนักศึกษาในภาคทวิศึกษา
										</span>
										<span class="label label-primary pull-right"><?php echo $nums6;?></span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											ผู้เข้าเรียน
										</span>
										<span class="label label-primary pull-right"><?php echo $nums7;?></span>
										<div class="clearfix"></div>
									</div>
								</div>	
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">สถานะปัจจุบัน</h6>
								</div>
						
								<?php
													$sql8= "SELECT * From student Where edu_status='พ้นสภาพ'";
													$query8 = $this->db->query($sql8);
													$nums8 = $query8->num_rows();
													
													$sql9= "SELECT * From student Where edu_status='จบการศึกษา'";
													$query9 = $this->db->query($sql9);
													$nums9 = $query9->num_rows();
																			

													$sql10= "SELECT * From student Where edu_status='พักการเรียน'";
													$query10 = $this->db->query($sql10);
													$nums10 = $query10->num_rows();	


													$sql11= "SELECT * From student Where edu_status='ลาออก'";
													$query11 = $this->db->query($sql11);
													$nums11 = $query11->num_rows();	

													$sql12= "SELECT * From student Where edu_status='กำลังศึกษาอยู่'";
													$query12 = $this->db->query($sql12);
													$nums12 = $query12->num_rows();				
													?>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div>
										<canvas id="chart_6" height="191"></canvas>
									</div>	
									<hr class="light-grey-hr row mt-10 mb-15"/>
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-yellow mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5"><?php echo $nums8;?> พ้นสภาพ</span></span>
											<div class="clearfix"></div>
										</div>
									</div>

									<hr class="light-grey-hr row mt-10 mb-15"/>
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-green mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5"><?php echo $nums9;?> จบการศึกษา</span></span>
											<div class="clearfix"></div>
										</div>
									</div>

									<hr class="light-grey-hr row mt-10 mb-15"/>
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-blue mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5"><?php echo $nums10;?> พักการเรียน</span></span>
											<div class="clearfix"></div>
										</div>
									</div>

									<hr class="light-grey-hr row mt-10 mb-15"/>
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-red mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5"><?php echo $nums11;?> ลาออก</span></span>
											<div class="clearfix"></div>
										</div>
									</div>

									<hr class="light-grey-hr row mt-10 mb-15"/>
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-green mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5"><?php echo $nums12;?> กำลังศึกษาอยู่</span></span>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
				
				
			</div>
			
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p><?php 
		$tdep=$this->session->userdata('t_dep');
		echo $tdep; ?></p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
<?php 
		include "bottom_menu.php"
?>