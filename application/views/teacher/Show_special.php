<?php 
		include "top_menu.php"
?> 
			<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">



 <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <?php 
            $act_id = $this->session->userdata('choose_actid');

    foreach ($this->db->query("SELECT * FROM activity where act_id = '$act_id'")->result() As $rs_name){
  $actname=$rs_name->act_name;
}

            ?>
            <h5 class="txt-dark">เช็คชื่อกิจกรรมพิเศษ <?php echo $actname;?></h5>
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
														<th>ห้อง</th> 
														<th></th>
                            
													</tr>
												</thead>
												<tbody>
													 <?php 

													 foreach ($rs as $r) { 
                            date_default_timezone_set('Asia/Bangkok');
                                $shoosedate = $this->session->userdata('shdate');
                                
                                $datey = substr($shoosedate,2,2);
                                $datem = substr($shoosedate,5,2);
                                $dated = substr($shoosedate,8,2);

                                if($shoosedate!=""){
                                $daynow =$dated."/".$datem."/".$datey;

                                $data = array(
                                'chday'=>$daynow
                                );
                                $this->session->set_userdata($data);
                                }
                                if($shoosedate==0){ 
                                $daynow = date('d/m/y');
                                $data = array(
                                'chday'=>$daynow
                                );
                                $this->session->set_userdata($data);
                                
                                }
									                    $gro1=$r['std_gro1'];
                                      $gro2=$r['std_gro2'];
                                      $gro3=$r['std_gro3'];
                                      $choose_term=$this->session->userdata('years');

                            $chk_btn1 = "SELECT * FROM act_detail WHERE gro = '$gro1' AND act_id = '$act_id' AND terms = '$choose_term'";
                            $qry_btn1 = $this->db->query($chk_btn1);
                            $num_btn1 = $qry_btn1->num_rows();



                            $chk_btn2 = "SELECT * FROM act_detail WHERE gro = '$gro2' AND act_id = '$act_id' AND terms = '$choose_term'";
                            $qry_btn2 = $this->db->query($chk_btn2);
                            $num_btn2 = $qry_btn2->num_rows();


                            $chk_btn3 = "SELECT * FROM act_detail WHERE gro = '$gro3' AND act_id = '$act_id' AND terms = '$choose_term'";
                            $qry_btn3 = $this->db->query($chk_btn3);
                            $num_btn3 = $qry_btn3->num_rows();


													 	if($gro1!='0'){
                          echo "<tr>  
                            <td>".$gro1."</td> 
                          "; 


                            $ss_1_1 = "SELECT * FROM act_detail WHERE type='5' AND gro = '$gro1'  AND act_id = '$act_id' AND status ='1'";
                            $qs_1_1 = $this->db->query($ss_1_1);
                            $ns_1_1 = $qs_1_1->num_rows();

                            $ss_1_2 = "SELECT * FROM act_detail WHERE type='5' AND gro = '$gro1'  AND act_id = '$act_id' AND status ='2'";
                            $qs_1_2 = $this->db->query($ss_1_2);
                            $ns_1_2 = $qs_1_2->num_rows();
                            
                            $ss_1_3 = "SELECT * FROM act_detail WHERE type='5' AND gro = '$gro1'  AND act_id = '$act_id' AND status ='3'";
                            $qs_1_3 = $this->db->query($ss_1_3);
                            $ns_1_3 = $qs_1_3->num_rows();
                            
                            if($num_btn1!='0'){
                            	//////////มาทำเป็นเข้าไปดูอย่างเดียว
                            echo "<td> มา ".$ns_1_1." ขาด ".$ns_1_2."</td>
                            <td><a href='".base_url()."teacher/report_special/".$r['std_gro1']."'>
                            <button style='background-color:red;
  border-width:0;' class='btn btn-primary btn-anim'><i class='icon-check'></i><span class='btn-text'>เช็คแล้ว</span></button></a></td>

                          </tr>";
                          }
                            if($num_btn1 =='0'){
                            echo "<td> ยังไม่เช็ค</td><td><a href='".base_url()."teacher/check_special/".$r['std_gro1']."'>
                            <button  class='btn btn-primary btn-anim'><i class='icon-check'></i><span class='btn-text'>Check</span></button></a></td>

                          </tr>";
                          } 
                          echo "                             
                             ";
                                  }

						                if($gro2!='0'){
                          echo "<tr>  
                            <td>".$gro2."</td> 
                          "; 
                                  
                            $ss_2_1 = "SELECT * FROM act_detail WHERE type='5' AND gro = '$gro2'  AND act_id = '$act_id' AND status ='1'";
                            $qs_2_1 = $this->db->query($ss_2_1);
                            $ns_2_1 = $qs_2_1->num_rows();

                            $ss_2_2 = "SELECT * FROM act_detail WHERE type='5' AND gro = '$gro2'  AND act_id = '$act_id' AND status ='2'";
                            $qs_2_2 = $this->db->query($ss_2_2);
                            $ns_2_2 = $qs_2_2->num_rows();
                            
                            $ss_2_3 = "SELECT * FROM act_detail WHERE type='5' AND gro = '$gro2'  AND act_id = '$act_id' AND status ='3'";
                            $qs_2_3 = $this->db->query($ss_2_3);
                            $ns_2_3 = $qs_2_3->num_rows();
                                    
                                  if($num_btn2!='0')
                                    {echo "<td> มา ".$ns_2_1." ขาด ".$ns_2_2."</td>
                            <td><a href='".base_url()."teacher/report_special/".$r['std_gro2']."'>
                            <button style='background-color:red;
  border-width:0;' class='btn btn-primary btn-anim'><i class='icon-check'></i><span class='btn-text'>เช็คแล้ว</span></button></a></td>

                          </tr>";
                          
                          }
                            if($num_btn2 =='0'){
                            echo "<td> ยังไม่เช็ค</td><td><a href='".base_url()."teacher/check_special/".$r['std_gro2']."'>
                            <button  class='btn btn-primary btn-anim'><i class='icon-check'></i><span class='btn-text'>Check</span></button></a></td>

                          </tr>";
                          } 
                          echo "                             
                             ";
                                  }
                                  if($gro3!='0'){
                          echo "<tr>  
                            <td>".$gro3."</td> 
                          "; 
                            $ss_3_1 = "SELECT * FROM act_detail WHERE type='1' AND gro = '$gro3'  AND act_id = '$act_id' AND status ='1'";
                            $qs_3_1 = $this->db->query($ss_3_1);
                            $ns_3_1 = $qs_3_1->num_rows();

                            $ss_3_2 = "SELECT * FROM act_detail WHERE type='1' AND gro = '$gro3'  AND act_id = '$act_id' AND status ='2'";
                            $qs_3_2 = $this->db->query($ss_3_2);
                            $ns_3_2 = $qs_3_2->num_rows();
                            
                            $ss_3_3 = "SELECT * FROM act_detail WHERE type='1' AND gro = '$gro3'  AND act_id = '$act_id' AND status ='3'";
                            $qs_3_3 = $this->db->query($ss_3_3);
                            $ns_3_3 = $qs_3_3->num_rows();

                                  if($num_btn3!='0') {echo "<td> มา ".$ns_3_1." ขาด ".$ns_3_2."</td>
                            <td><a href='".base_url()."teacher/report_special/".$r['std_gro3']."'>
                            <button style='background-color:red;
  border-width:0;' class='btn btn-primary btn-anim'><i class='icon-check'></i><span class='btn-text'>เช็คแล้ว</span></button></a></td>

                          </tr>";
                          
                          }
                            if($num_btn3 =='0'){
                            echo "<td> ยังไม่เช็ค</td><td><a href='".base_url()."teacher/check_special/".$r['std_gro3']."'>
                            <button  class='btn btn-primary btn-anim'><i class='icon-check'></i><span class='btn-text'>Check</span></button></a></td>
                          </tr>";
                          	}
                                   




                                   }
                                   } ?>
												
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
