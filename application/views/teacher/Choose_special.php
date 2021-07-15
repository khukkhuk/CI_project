<?php 
		include "top_menu.php"
?> 
			<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">



 <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">เช็คชื่อกิจกรรมพิเศษ</h5>
          </div>

        </div>
        <!-- /Title --> 
        <!-- Row --> 
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view"><div class="pull-right">
                  
                
                </div>

              <div class="panel-wrapper collapse in">
                <div class="panel-body row">
                  <div class="table-wrap">
                    <div class="table-responsive">
											<table class="table display product-overview border-none" id="support_table">
												<thead>
													<tr>
														<th>รายชื่อกิจกรรม</th> 
														<th></th>
														
													</tr>
												</thead>
												<tbody>
													 <?php
                            foreach ($rs as $r) { 
                          ?>
                          <form method="post" action="">
                           <tr>
                            <input type="hidden" name="act_id" value="<?php echo $r['act_id'];?>">
                              <td style="color: black"><?php echo $r['act_name'];?></td>
                              <td><input type="submit" name="btn_act" class='btn btn-primary btn-anim' value="เลือก"></td>
                            </tr>
                          </form>
                          <?php   } ?>
												
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
