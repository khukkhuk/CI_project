<?php
include "top.php";
?>
<title>admin</title>

 <div class="page-wrapper">
      <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">ดูรายงานกิจกรรม</h5>
          </div>
          <!-- Breadcrumb -->
          
          <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->
        
        <!-- Row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              <div class="panel-heading">
                <div class="pull-left">
                  <h6 class="panel-title txt-dark"></h6>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                          <style>
                            .btn_a{
                              padding:7px 13px;
                              color:white;
                              background-color: red;
                              border-width: 0px;
                              border-radius: 3px;
                            }
                          </style>
                          <tr>
                            <th colspan="3"><center>รายชื่อห้องในแผนก <?php echo $choose_dep=$this->session->userdata('choose_dep');?> ในปีการศึกษา <?php echo $this->session->userdata('years');?></center></th>
                          </tr>
                          <tr>
                            <th>รหัสห้อง</th>
                            <th>หมายเหตุ</th>
                            <th></th>
                          </tr>

                        </thead> 
                        
                        <tbody>
                          <style>
                            .btn_g{
                              width: 106px;
                              padding:7px 13px;
                              color:white;
                              background-color: green;
                              border-width: 0px;
                              border-radius: 3px;
                            }
                            .btn_r{
                              padding:7px 13px;
                              color:white;
                              background-color: #aae6a2;
                              border-width: 0px;
                              border-radius: 3px;
                            }
                          </style>
                        
                            <?php foreach($rs as $r ){ ?>
                              <form method="POST" action="">
                            <tr>
                            <?php

                             $dyth=date("y")+43;

                              $gro=$r['gro'];
                              $cut = substr($gro, 2,1);
                              $ystd = substr($gro,0,2);
                              $room = substr($gro, -1);
                              $sum = $dyth - $ystd   ;
                              if($cut =="2"){ 

                                if ($sum == 1){$abc = "A";$roomname = $abc.$room;};
                                if ($sum == 2){$abc = "B";$roomname = $abc.$room;};
                                if ($sum == 3){$abc = "C";$roomname = $abc.$room;};

                                if($sum!="1"AND$sum!="2"AND$sum!="3"){$roomname="ไม่อยู่ในภาคเรียนปกติ";}
                              }
                                if($cut =="3"){
                                if ($sum == 1){$abc = "D";$roomname = $abc.$room;};
                                if ($sum == 2){$abc = "E";$roomname = $abc.$room;};

                                if($sum!="1"AND$sum!="2"){$roomname="ไม่อยู่ในภาคเรียนปกติ";}
                              }
                          
                            ?>
                            <td><?php echo "(".$gro.")"; ?></td>
                            <td><?php echo $roomname;?></td>
                            <input type="hidden" name="gro_room" value="<?php echo $gro;?>">
                            <input type="hidden" name="name_room" value="<?php echo $roomname;?>">
                            <td><input type="submit" name="btn_room" class="btn_g" value="ดูรายละเอียด"></td>
                            </tr>
                          </form>
                            <?php } ?>
                                                      
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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<?php
include "bottom.php";
?>