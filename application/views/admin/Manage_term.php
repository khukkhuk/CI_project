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
                            <th>ภาคเรียน</th>
                            <th><button type="button" class="btn_a" data-toggle="modal" data-target="#myModal">เพิ่มเทอมต่อไป</button></th>
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
                        <?php
                        $i=0;
                          foreach ($rs as $r) {$i++;
                            if($i=='1'){
                              $thisterm=$r['term_name'];
                            }
                            ?>
                          <tr>
                            <td><?php echo $r['term_name']; ?></td>

                            <?php if($r['term_status']=='active'){
                            ?>

                            <td><button type="button" class="btn_g"> กำลังใช้งาน</button></td>

                            <?php
                            } ?>



                            <?php if($r['term_status']=='inactive'){
                            ?>
                            <td><button type="button" class="btn_r" data-toggle="modal" data-target="#myModal<?php echo $i;?>">เปิดการใช้งาน </button><!-- MODAL -->
          <form method="POST" action=""><div class="modal" id="myModal<?php echo $i;?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div style="border-bottom:white;" class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
         <style>
         .modal-chk{
         width: 100%;}
         .modal-chk td{
        padding: 5px 20px;
         }
         </style>
          <table class="modal-chk">
          <tr>
            <input type="hidden" name="term_active" value="<?php echo $r['term_name']; ?>">
            <td width="100">ต้องการเปิดใช้งานปีการศึกษา <?php echo $r['term_name']; ?> </td>
          </tr>
          

          </table>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-default"  name="btn-edit" value="ยืนยัน">
          <input type="reset" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
        </div>
      </div>
    </div>
  </div>
</form></td>

                            <?php  
                            } ?>
                          </tr>
                            

                         <?php
                       }
                         ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>


          <!-- MODAL -->
          <form method="POST" action=""><div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">เพิ่มเทอม</h4>
        </div>
        <div class="modal-body">
         <style>
         .modal-chk{
         width: 100%;}
         .modal-chk td{
        padding: 5px 20px;
         }
         </style>
          <table class="modal-chk">
          <tr>
            <td style="width: 30px">เทอมปัจจุบัน</td>
           
            <td><input type="text" name="this_term" value="<?php echo $thisterm; ?>"></td>
          </tr>
          <tr> 
            <?php 
            $sub_t=substr($thisterm,5,7); 
            $sub_y = substr($thisterm,0,4);
            if($sub_t=='1'){
              //$showt = "แก้เทอม";
              $show_edit =$sub_y."/"."2";
            }
            if($sub_t=='2'){
              //$showt = "แก้ปี";
              $sub_y++;
              $show_edit =$sub_y."/"."1";
            }
            ?>
            <td style="width: 30px">เทอมใหม่</td>
            <td><input type="text" name="next_term" value="<?php echo $show_edit; ?>"></td>
          </tr>
          

          </table>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-default"  name="btn-sub" value="ยืนยัน">
          <input type="reset" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
        </div>
      </div>
    </div>
  </div>
</form>
<!-- /MODAL -->
        <!-- /Row -->
      </div>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<?php
include "bottom.php";
?>