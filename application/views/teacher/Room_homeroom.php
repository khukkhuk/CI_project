<?php 
    include "top_menu.php"
?> 
      <!-- Main Content -->
    <div class="page-wrapper">
      <div class="container-fluid">



 <!-- Title -->  
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">เช็คชื่อกิจกรรมโฮมรูม</h5>
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
                      <table class="table display responsive product-overview mb-30" id="myTable">
                        <thead>
                          <tr>  
                            <th>กลุ่ม</th> 
                            <th>วันที่</th>
                            <th>Status</th>
                            <th><form method="POST">
<input type="date" name="shoosedate" style="border-width: 0px;background-color: red;padding: 10px 15px;color: white"> <input type="submit" name="btn-date"> </form></th>
                          </tr>
                        </thead>
                        <tbody>
                               <?php foreach ($rs as $r) {

                                date_default_timezone_set('Asia/Bangkok');
                                $shoosedate = $this->session->userdata('shdate');

                                
                                $datey = substr($shoosedate,2,2);
                                $datem = substr($shoosedate,5,2);
                                $dated = substr($shoosedate,8,2);

                                $datec =$dated."-".$datem."-".$datey;
                                $nameOfDay = date('D', strtotime($datec));
                                if ($nameOfDay!="")
                                echo $nameOfDay;


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
                                ?>
                                <?php $gro1=$r['std_gro1'];
                                      $gro2=$r['std_gro2'];
                                      $gro3=$r['std_gro3'];


                            $chk_btn1 = "SELECT * FROM act_detail WHERE type='2' AND gro = '$gro1'  AND date = '$daynow'";
                            $qry_btn1 = $this->db->query($chk_btn1);
                            $num_btn1 = $qry_btn1->num_rows();

                            $chk_btn2 = "SELECT * FROM act_detail WHERE type='2' AND gro = '$gro2'  AND date = '$daynow'";
                            $qry_btn2 = $this->db->query($chk_btn2);
                            $num_btn2 = $qry_btn2->num_rows();

                            $chk_btn3 = "SELECT * FROM act_detail WHERE type='2' AND gro = '$gro3'  AND date = '$daynow'";
                            $qry_btn3 = $this->db->query($chk_btn3);
                            $num_btn3 = $qry_btn3->num_rows();


                            if($gro1!='0'){
                          echo "<tr>  
                            <td>".$gro1."</td> 
                            <td>".$daynow."</td>
                          "; 
                            if($num_btn1!='0'){
                            echo "<td> เช็คแล้ว</td>
                            <td><a href='".base_url()."teacher/report_homeroom/".$r['std_gro1']."'>
                            <button disabled class='btn btn-primary btn-anim'><i class='icon-check'></i><span class='btn-text'>Check</span></button></a></td>

                          </tr>";
                          }
                            if($num_btn1 =='0'){
                            echo "<td> ยังไม่เช็ค</td><td><a href='".base_url()."teacher/check_homeroom/".$r['std_gro1']."'>
                            <button  class='btn btn-primary btn-anim'><i class='icon-check'></i><span class='btn-text'>Check</span></button></a></td>

                          </tr>";
                          } 
                          echo "                             
                             ";
                                  }
                            
                             if($gro2!='0'){
                          echo "<tr>  
                            <td>".$gro2."</td> 
                            <td>".$daynow."</td>
                          "; 
                            if($num_btn2!='0'){
                            echo "<td> เช็คแล้ว</td>
                            <td><a href='".base_url()."teacher/report_homeroom/".$r['std_gro2']."'>
                            <button disabled class='btn btn-primary btn-anim'><i class='icon-check'></i><span class='btn-text'>Check</span></button></a></td>

                          </tr>";
                          }
                            if($num_btn2 =='0'){
                            echo "<td> ยังไม่เช็ค</td><td><a href='".base_url()."teacher/check_homeroom/".$r['std_gro2']."'>
                            <button  class='btn btn-primary btn-anim'><i class='icon-check'></i><span class='btn-text'>Check</span></button></a></td>

                          </tr>";
                          } 
                          echo "                             
                             ";
                                  }
                                   if($gro3!='0'){
                          echo "<tr>  
                            <td>".$gro3."</td> 
                            <td>".$daynow."</td>
                          "; 
                            if($num_btn3!='0'){
                            echo "<td> เช็คแล้ว</td>
                            <td><a href='".base_url()."teacher/report_homeroom/".$r['std_gro3']."'>
                            <button disabled class='btn btn-primary btn-anim'><i class='icon-check'></i><span class='btn-text'>Check</span></button></a></td>

                          </tr>";
                          }
                            if($num_btn3 =='0'){
                            echo "<td> ยังไม่เช็ค</td><td><a href='".base_url()."teacher/check_homeroom/".$r['std_gro3']."'>
                            <button  class='btn btn-primary btn-anim'><i class='icon-check'></i><span class='btn-text'>Check</span></button></a></td>

                          </tr>";
                          } 
                          echo "                             
                             ";
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
        <!-- /Row -->


      </div>
    </div>
    <!-- /Main Content -->

<?php 
    include "bottom_menu.php"
?>
