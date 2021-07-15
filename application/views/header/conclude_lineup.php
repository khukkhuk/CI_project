<?php 
		include "top_menu.php"
?>

			<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">

<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">กิจกรรมเข้าแถว</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
									</a>
									<a href="#" class="pull-left inline-block full-screen mr-15">
										<i class="zmdi zmdi-fullscreen"></i>
									</a>
								
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview border-none" id="support_table">
												<thead>
													<tr>
														<th>ระดับชั้น</th>
														<th>ห้อง</th>
														<th>จำนวนนักศึกษา</th>
														<th>จำนวนที่เข้ากิจกรรม</th>
														<th>การเปลี่ยนแปลง</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													 <?php foreach ($rs as $r){ ?>
													<tr>
														<td class="txt-dark weight-500"><?php echo $r['std_level']; ?></td>
														<td><?php echo $r['gro']; ?></td>
														<td><?php echo $r['']; ?></td>
														
														<td>
															<span class="txt-dark weight-500"></span>
														</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>2.43%</span></span></td>
														<td>
															<span class="label label-primary">Active</span>
														</td>
													</tr>
													<?php   }  ?>
													<tr>
														<td><span class="txt-dark weight-500">ปวช.2</span></td>
														<td>Felix</td>
														<td>
															<span class="txt-dark weight-500">$951</span>
														</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>1.43%</span></span></td>
														
														<td>
															<span class="label label-danger">Closed</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">ปวช.3</span></td>
														<td>Cannibus</td>
														<td>
															<span class="txt-dark weight-500">$632</span>
														</td>
														<td><span class="txt-danger"><i class="zmdi zmdi-caret-down mr-10 font-20"></i><span>-8.43%</span></span></td>
														
														<td>
															<span class="label label-default">Hold</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">ปวส.1</span></td>
														<td>Neosoft</td>
														<td>
															<span class="txt-dark weight-500">$325</span>
														</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>7.43%</span></span></td>
														
														<td>
															<span class="label label-default">Hold</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">ปวส.2</span></td>
														<td>Hencework</td>
														<td>
															<span class="txt-dark weight-500">$258</span>
														</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>9.43%</span></span></td>
														
														<td>
															<span class="label label-primary">Active</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>	
								</div>	
							</div>
						</div>
					</div>
			
				</div>	
				<!-- Row -->
			</div>
		</div>
		<!-- /Main Content -->
<?php 
		include "bottom_menu.php"
?>
