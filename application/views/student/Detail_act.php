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
									<h6 class="panel-title txt-dark"><?php 
		$type_act=$this->session->userdata('type_act');
		if($type_act==1){ echo "กิจกรรมเข้าแถว";}
		if($type_act==2){ echo "กิจกรรมโฮมรูม";}
		if($type_act==4){ echo "กิจกรรมแผนก";}
		if($type_act==3){ echo "กิจกรรมลูกเสือ";}
		if($type_act==5){ echo "กิจกรรมพิเศษ";}
		?></h6> 
								</div>
								<div class="pull-right" style="margin-right: 35%"><?php echo "มา ".$act1." ครั้ง ขาด ".$act2." ครั้ง สาย ".$act3." ครั้ง";?>
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
														<th>วันที่</th>
														<th>สถานะ</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($rs as $r){ ?>
												<tr>
													<td><?php echo $r['date']; ?></td>
											        <td><?php
											        	$status=$r['status'];
											        	if($status==1){
											        		echo "มา";
											        	}
											        	if($status==2){
											        		echo "ขาด";
											        	}
											        	if($status==3){
											        		echo "สาย";
											        	}
											        ?></td> 
											        
												</tr>
											<?php }?>
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
