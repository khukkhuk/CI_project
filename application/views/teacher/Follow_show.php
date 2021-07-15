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
									<h6 class="panel-title txt-dark">ติดตามผล</h6>
								</div>
								<div class="pull-right">
									<a href="<?php echo base_url();?>teacher/follow" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
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
														
														<th>กิจกรรม</th>
														<th>มา</th>
														<th>ไม่มา</th>
													</tr>
												</thead>
												<tbody>
													
												<tr>
													<td>กิจกรรมเข้าแถว</td>
											        <td><?php echo $act1_1; ?></td>
											        <td><?php echo $act1_0; ?></td> 
											    </tr>
											    

											    <tr>
											        <td>กิจกรรมโฮมรูม</td>
											        <td><?php echo $act2_1; ?></td>
											        <td><?php echo $act2_0; ?></td>
											    </tr>

 												<tr>
											        <?php 
											        	if($std_level==	'ปวช.1'){
											        echo "<td>กิจกรรมลูกเสือ</td>";
											        echo "<td><?php echo $act3_1; ?></td>";
											        echo "<td><?php echo $act3_0; ?></td>";
											        }
											        ?> 
											    </tr>

											    <tr>
											        <td>กิจกรรมแผนก</td>
											        <td><?php echo $act4_1; ?></td>
											        <td><?php echo $act4_0; ?></td> 
											    </tr>

											    <tr>
											    	<td>กิจกรรมพิเศษ</td>
											    	<?php if($act5_1==2){ 
											    	echo "<td colspan='2'>กิจกรรมครบแล้ว</td>";
											    	}
											    	else {
											    		echo "<td>".$act5_1."</td>";
											        	echo "<td>".$act5_0."</td>";
											    	}
											        ?> 
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