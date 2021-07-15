 <?php 
    include "top.php"
?>

      <!-- Main Content -->
    <div class="page-wrapper">
      <div class="container-fluid">



 <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark"><?php echo $this->session->userdata('name') ." ปี ".$this->session->userdata('years');
    ?></h5>
          </div>

        </div>
        <!-- /Title -->
        <?php // echo form_open('teacher/ChedkUp');?>
        <!-- Row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              <div class="panel-wrapper collapse in">
                <div class="panel-body row">
                  <div class="table-wrap">
                    <div class="table-responsive">
                  <input type="hidden" name="num" value="<?php echo $num; ?>" >
                  <?php // echo $num; ?>
                      <table class="table display responsive product-overview mb-30" id="myTable">
                        <thead>
                          <tr>
                            <th>รหัสนักศึกษา</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>กิจกรรมหน้าเสาธง</th>
                            <th>กิจกรรมโฮมรูม</th>
                            <th>กิจกรรมชมรม</th>
                            <th>กิจกรรมพิเศษ</th>
                            <th>กิจกรรมลูกเสือ</th>      
                          </tr>
                        </thead>
                        <tbody>                           
                         <?php  
                         foreach ($rs as $r){ 
                          $code=$r['code'];
                          $choose_term = $this->session->userdata('years');
                          $sql="SELECT * FROM student WHERE code='$code'";
                          $rs=$this->db->query($sql);
                          $data['rs']=$rs->result_array();

                          $show=$rs->result();
                          $std_level=$show[0]->std_level;
                          $data['std_level']=$std_level;

                          $std_id = $show[0]->code;



    ///////////////////////////////////เข้าแถว
    $rs1_1=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='1' AND status='1' AND terms='$choose_term'");
    $act1_1 = $rs1_1->num_rows();

    $rs1_2=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='1' AND status='2' AND terms='$choose_term'");
    $act1_2 = $rs1_2->num_rows();

    $rs1_3=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='1' AND status='3'  AND terms='$choose_term'");
    $act1_3 = $rs1_3->num_rows();

    ///////////////////////////////////โฮมรูม
    $rs2_1=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='2' AND status='1'  AND terms='$choose_term'");
    $act2_1 = $rs2_1->num_rows();


    $rs2_2=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='2' AND status='2'  AND terms='$choose_term'");
    $act2_2 = $rs2_2->num_rows();


    $rs2_3=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='2' AND status='3'  AND terms='$choose_term'");
    $act2_3 = $rs2_3->num_rows();

    //////////////////////////////////ชมรม
    $rs3_1=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='4' AND status='1'  AND terms='$choose_term'");
    $act3_1 = $rs3_1->num_rows();


    $rs3_2=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='4' AND status='2'  AND terms='$choose_term'");
    $act3_2 = $rs3_2->num_rows();


    $rs3_3=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='4' AND status='3'  AND terms='$choose_term'");
    $act3_3 = $rs3_3->num_rows();

    //////////////////////////////////พิเศษ

      $total_act4='0';
    $rs4_1=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='5' AND status='1'  AND terms='$choose_term'");
    $act4_1 = $rs4_1->num_rows();
    if($act4_1 ==0){
      $total_act4='0';
    }else{
      foreach($rs4_1->result() As $rs_4){
      $rs_actid= $rs_4->act_id;

      $sumact_4 = $this->db->query("SELECT * FROM activity WHERE act_id='$rs_actid'");
      foreach ($sumact_4->result() as $show_act4) {
        $act_quan=$show_act4->act_quantity;
        $total_act4 = $total_act4 + $act_quan;
      }

      }
    }

  

    //////////////////////////////////ลูกเสือ
    
    $rs5_1=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='3' AND status='1' AND terms='$choose_term'");
    $act5_1 = $rs5_1->num_rows();

    $rs5_2=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='3' AND status='2' AND terms='$choose_term'");
    $act5_2 = $rs5_2->num_rows();

    $rs5_3=$this->db->query("SELECT * FROM act_detail WHERE std_id='$code' AND type='3' AND status='3' AND terms='$choose_term'");
    $act5_3 = $rs5_3->num_rows();
    /////////////////////////////////summary


    $query_dm = $this->db->query("SELECT * FROM days WHERE day_name='วันทั้งหมด' AND day_term='$choose_term'");
    $show_dm = $query_dm->num_rows();
      foreach($query_dm->result() As $rw_dm){
      $dm_value= $rw_dm->day_num;
      }
      $week_value = number_format($dm_value/5,1);

    $query_ds = $this->db->query("SELECT * FROM days WHERE day_name!='วันทั้งหมด' AND day_term='$choose_term'");
    $show_ds = $query_ds->num_rows();
    $total_d ='0';
      foreach($query_ds->result() As $rw_ds){
      $ds_value= $rw_ds->day_num;

      $total_d = $ds_value + $total_d;
      
      }
      $sum_ds = $dm_value - $total_d;



      $qry_monday = $this->db->query("SELECT * FROM days WHERE name_day='วันจันทร์' AND day_term='$choose_term'");
      $total_monday='0';
      foreach($qry_monday->result() As $rw_monday) {
        $num_monday=$rw_monday->day_num;
        $total_monday = $total_monday + $num_monday;
      }
      $sum_monday = $week_value - $total_monday;

      $qry_wednesday = $this->db->query("SELECT * FROM days WHERE name_day='วันพุธ' AND day_term='$choose_term'");
      $total_wednesday='0';
      foreach($qry_wednesday->result() As $rw_wednesday) {
        $num_wednesday=$rw_wednesday->day_num;
        $total_wednesday = $total_wednesday + $num_wednesday;
      }
      $sum_wednesday = $week_value - $total_wednesday;


// $per = 72/90*100;
$sumact1_1 = $act1_1 /$sum_ds*100;
$sumact1 = number_format($sumact1_1,1);
$sumact2_1 = $act2_1 /$sum_monday*100;
$sumact2 = number_format($sumact2_1,1);
$sumact3_1 = $act3_1 /$sum_wednesday*100;
$sumact3 = number_format($sumact3_1,1);
$sumact5_1 = $act5_1 /$sum_wednesday*100;
$sumact5 = number_format($sumact5_1,1);


$sumact4_1 = $total_act4*25;
$sumact4 = number_format($sumact4_1,1);

// 1lineup
// 2homeroom
// 3scout
// 4depart

?>   
                            <input type="hidden" name="std_id" value="<?php echo $r['code']; ?>" >

          <style type="text/css">
         .btnred{
         border-width: 0;
         border-color: white;
         background-color: white;
         color:red;
         }
         .btngreen{
         border-width: 0;
         border-color: white;
         background-color: white;
         color:green;
         }
                            
         .modal-chk{
         width: 80%
         }
         .modal-chk th{
          color: black;
            width: 33%;
          text-align: center;
         }
         .modal-chk td{
            width: 33%;
          text-align: center;
        /*padding: 20px;*/
         }
         .tb_modal{
            margin-bottom:  30px;     
            width: 80%;    
         }
         .tb_modal th{
            color: black;
            width: 70%;
            text-align: center;
         }
         .tb_modal td{
            width: 70%;
            text-align: center;
         }

         </style>
                          <tr>
                            <td class="txt-dark"><?php echo $r['code']; ?></td>
                            <td class="txt-dark"><?php echo $r['name']; ?></td>
                            <td><button  type="button" data-toggle="modal" data-target="#myModal1<?php echo $code; ?>" <?php if($sumact1>=80){echo"class=\" btngreen\" ";}else{echo"class=\" btnred\" ";} ?> > <?php echo $sumact1."%";?> </button>
                            
                            <div class="modal fade" id="myModal1<?php echo $code; ?>" role="dialog">
   
            <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">รายละเอียด</h4>
        </div>
        <div class="modal-body">
      

          <table class="tb_modal">
            <tr>
              <th>ลำดับ</th>
              <th>วันที่</th>
              <th>สถานะ</th>
            </tr>

            <?php 
            $sql_detail = "SELECT date ,status FROM act_detail where std_id ='$code'AND  type='1' and terms='$choose_term'   ";
            $rs_d1=$this->db->query($sql_detail);
            $show_d1=$rs_d1->result_array();
            $i='1';
            foreach ($show_d1 as $d1) {
            ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $d1['date']; ?></td>
              <td><?php if($d1['status']=='1'){echo"มา";}if($d1['status']=='2'){echo"ขาด";}if($d1['status']=='3'){echo"สาย";} ?></td>
            </tr>
          <?php 
              $i++;} ?>
          </table>
          <table class="modal-chk">
            <tr>
             

<?php 

?>
              <th>มา</th>
              <th>ขาด</th>
              <th>สาย</th>
            </tr>

            <tr>
              <td><?php echo $act1_1; ?></td>
              <td><?php echo $act1_2; ?></td>
              <td><?php echo $act1_3; ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
                            </td>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><button  type="button" data-toggle="modal" data-target="#myModal2<?php echo $code; ?>" <?php if($sumact2>=80){echo"class=\" btngreen\" ";}else{echo"class=\" btnred\" ";} ?> > <?php echo $sumact2."%";?> </button>
                            
                            <div class="modal fade" id="myModal2<?php echo $code; ?>" role="dialog">
   
            <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">รายละเอียด</h4>
        </div>
        <div class="modal-body">
      

          <table class="tb_modal">
            <tr>
              <th>ลำดับ</th>
              <th>วันที่</th>
              <th>สถานะ</th>
            </tr>

            <?php 
            $sql_detail = "SELECT date ,status FROM act_detail where std_id ='$code'AND  type='2' and terms='$choose_term'  ";
            $rs_d2=$this->db->query($sql_detail);
            $show_d2=$rs_d2->result_array();
            $i='1';
            foreach ($show_d2 as $d2) {
            ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $d2['date']; ?></td>
              <td><?php if($d2['status']=='1'){echo"มา";}if($d2['status']=='2'){echo"ขาด";}if($d2['status']=='3'){echo"สาย";} ?></td>
            </tr>
          <?php 
              $i++;} ?>
          </table>
          <table class="modal-chk">
            <tr>
             

<?php 

?>
              <th>มา</th>
              <th>ขาด</th>
              <th>สาย</th>
            </tr>

            <tr>
              <td><?php echo $act2_1; ?></td>
              <td><?php echo $act2_2; ?></td>
              <td><?php echo $act2_3; ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
                            </td>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><button  type="button" data-toggle="modal" data-target="#myModal3<?php echo $code; ?>" <?php if($sumact3>=80){echo"class=\" btngreen\" ";}else{echo"class=\" btnred\" ";} ?> > <?php echo $sumact3."%";?> </button>
                            
                            <div class="modal fade" id="myModal3<?php echo $code; ?>" role="dialog">
   
            <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">รายละเอียด</h4>
        </div>
        <div class="modal-body">
      

          <table class="tb_modal">
            <tr>
              <th>ลำดับ</th>
              <th>วันที่</th>
              <th>สถานะ</th>
            </tr>

            <?php 
            $sql_detail = "SELECT date ,status FROM act_detail where std_id ='$code' AND  type='4' and terms='$choose_term' ";
            $rs_d3=$this->db->query($sql_detail);
            $show_d3=$rs_d3->result_array();
            $i='1';
            foreach ($show_d3 as $d3) {
            ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $d3['date']; ?></td>
              <td><?php if($d3['status']=='1'){echo"มา";}if($d3['status']=='2'){echo"ขาด";}if($d3['status']=='3'){echo"สาย";} ?></td>
            </tr>
          <?php 
              $i++;} ?>
          </table>
          <table class="modal-chk">
            <tr>
             

<?php 

?>
              <th>มา</th>
              <th>ขาด</th>
              <th>สาย</th>
            </tr>

            <tr>
              <td><?php echo $act3_1; ?></td>
              <td><?php echo $act3_2; ?></td>
              <td><?php echo $act3_3; ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
                            </td>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<style>
  .act_modal{
    width: 270px;
    margin-bottom: 12px;
    margin-left: 12px;
  }
  .act_modal td th{    
  }
  .act_modal th{
   color: black;    
  }
</style>
<td><button  type="button" data-toggle="modal" data-target="#myModal4<?php echo $code; ?>" <?php if($sumact4>=80){echo"class=\" btngreen\" ";}else{echo"class=\" btnred\" ";} ?> > <?php echo $sumact4."%";?> </button>
                            
                            <div class="modal fade" id="myModal4<?php echo $code; ?>" role="dialog">
   
            <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">รายละเอียด</h4>
        </div>
        <div class="modal-body">
      

          <table class="act_modal">
            <tr><th>ลำดับ</th>
              <th>กิจกรรมที่เข้าร่วม</th></tr>
           <?php 
           $total_quantity='';
           $sql =$this->db->query("SELECT act_id FROM act_detail WHERE std_id='$code' AND type='5' AND terms='$choose_term'");
           $numrow = $sql->num_rows();
           $number='1';
           foreach ($sql->result() as $rs) {
                $act_id=$rs->act_id;
                $sql = $this->db->query("SELECT act_name FROM activity WHERE act_id = '$act_id'");
                foreach($sql->result()as$rs){
                  $act_name=$rs->act_name;
                }
           ?>

           <tr>
            <td><?php echo $number;?></td>
            <td><?php echo $act_name;?></td>
           </tr>
          

           <?php
           $number++;
         }
           ?>
           </table>
           
        </div>
      </div>
    </div>
  </div>
</div>
                            </td>                             

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><button  type="button" data-toggle="modal" data-target="#myModal5<?php echo $code; ?>" <?php if($sumact5>=80){echo"class=\" btngreen\" ";}else{echo"class=\" btnred\" ";} ?> > <?php echo $sumact5."%";?> </button>
                            
                            <div class="modal fade" id="myModal5<?php echo $code; ?>" role="dialog">
   
            <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">รายละเอียด</h4>
        </div>
        <div class="modal-body">
      

          <table class="tb_modal">
            <tr>
              <th>ลำดับ</th>
              <th>วันที่</th>
              <th>สถานะ</th>
            </tr>

            <?php 
            $sql_detail = "SELECT date ,status FROM act_detail where std_id ='$code' AND  type='3' and terms='$choose_term' ";
            $rs_d5=$this->db->query($sql_detail);
            $show_d5=$rs_d5->result_array();
            $i='1';
            foreach ($show_d5 as $d5) {
            ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $d5['date']; ?></td>
              <td><?php if($d5['status']=='1'){echo"มา";}if($d5['status']=='2'){echo"ขาด";}if($d5['status']=='3'){echo"สาย";} ?></td>
            </tr>
          <?php 
              $i++;} ?>
          </table>
          <table class="modal-chk">
            <tr>
             

<?php 

?>
              <th>มา</th>
              <th>ขาด</th>
              <th>สาย</th>
            </tr>

            <tr>
              <td><?php echo $act5_1; ?></td>
              <td><?php echo $act5_2; ?></td>
              <td><?php echo $act5_3; ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
                            </td>   

                          </tr>
                           <?php   }  ?>
                           <tr><td>เข้าแถวทั้งหมด</td><td> <?php echo $sum_ds;?> </td><td>ครั้ง</td></tr>
                           <tr><td>เข้าโฮมรูมทั้งหมด</td><td> <?php echo $sum_monday; ?> </td><td>ครั้ง</td></tr>
                           <tr><td>เข้าชมรมทั้งหมด</td><td> <?php echo $sum_wednesday; ?> </td><td>ครั้ง</td></tr>
                           <tr><td>เข้าลูกเสือทั้งหมด</td><td> <?php echo $sum_wednesday; ?> </td><td>ครั้ง</td></tr>
                           <tr><td>กิจกรรมพิเศษ </td><td>2 </td><td>ครั้ง</td></tr>
                        </tbody>
                      </table></form>
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