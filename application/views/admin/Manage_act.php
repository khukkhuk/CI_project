<?php
include "top.php";
?>
<title>admin</title>

 <div class="page-wrapper">
      <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">จัดการกิจกรรมพิเศษในปีการศึกษา <?php echo $this->session->userdata('years');?></h5>
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
                            .btn_r{
                              padding:7px 17px;
                              color:white;
                              background-color: red;
                              border-width: 0px;
                              border-radius: 3px;
                            }
                          </style>
                          <tr>
                            <th>ชื่อกิจกรรม</th>
                            <th>สถานะ</th>
                            <th><button type="button" class="btn_r" data-toggle="modal" data-target="#myModal">เพิ่มกิจกรรม</button></th>
                          </tr>

                        </thead> 
                        
                        <tbody>
                          <style>
                            .btn_g{
                              padding:7px 13px;
                              color:white;
                              background-color: green;
                              border-width: 0px;
                              border-radius: 3px;
                            }
                            .status-green{
                              width: 123px;
                              padding:7px 13px;
                              color:white;
                              background-color: green;
                              border-width: 0px;
                              border-radius: 3px;
                            }
                            .status-red{
                              width: 123px;
                              padding:7px 13px;
                              color:white;
                              background-color: red;
                              border-width: 0px;
                              border-radius: 3px;
                            }
                          </style>
                        <?php
                        $i=1;
                          foreach ($rs as $r) {$i++;
                            ?>
                          <tr> <form method="post" action="">
                            <input type="hidden" name="actid" value="<?php echo $r['act_id'];?>">
                            <td><?php echo $r['act_name']; ?></td>
                            <td><?php if($r['act_active']=='active'){  ?> 
                            <input type="submit" name="btn-active" value="ใช้งาน" class="status-green" onclick="return confirm('ต้องการปิดใช้งานกิจกรรมนี้ ?')">
                            <?php } else { ?>
                            <input type="submit" name="btn-inactive" value="ไม่ได้ใช้งาน" class="status-red" onclick="return confirm('ต้องการเปิดใช้งานกิจกรรมนี้ ?')">
                            <?php } 

                            ?></td></form>
                            <td><button type="button" class="btn_g" data-toggle="modal" data-target="#myModal<?php echo $i;?>">ดูรายละเอียด </button><!-- MODAL -->
          <form method="POST" action=""><div class="modal" id="myModal<?php echo $i;?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขรายละเอียดกิจกรรม</h4>
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
            <input type="hidden" name="add_actid" value="<?php echo $r['act_id'];?>">
            <td style="width: 60px">ชื่อกิจกรรม</td>
            <td><input style="width: 100px" type="text" name="add_actname" value="<?php echo $r['act_name'];?>"></td>
          </tr>
          <tr> 
            <td>วันที่เข้าร่วม</td>
            <td><input style="width: 100px" type="date" name="add_actdate" value="<?php echo $r['date_join'];?>"></td>
          </tr>
          <tr> 
            <td>จำนวนกิจกรรมที่ให้</td>
            <td><select name="act_quantity" style="width: 100px"> 
              <option value="<?php echo $r['act_quantity'];?>" ><?php if($r['act_quantity']==2){echo"หนึ่งกิจกรรม";}else{echo"ครึ่งกิจกรรม";} ?></option>
              <option value="2">หนึ่งกิจกรรม</option>
              <option value="1">ครึ่งกิจกรรม</option>
            </select></td>
          </tr>
          <tr> 
            <td width="100">รายละเอียด</td>
            <td><textarea style="width: 100px" name="add_actdetail"><?php echo$r['act_detail'];?></textarea></td>
          </tr>
          

          </table>
        </div>
        <div class="modal-footer">
          <style>
            .txt-warning{
              color: green;
              font-size: 11px;
            }
          </style>
          <div class="txt-warning">
          กรุณาตรวจสอบข้อมูลให้เรียบร้อยก่อนยืนยันการแก้ไข</div>
          <input type="submit" class="btn btn-default"  name="btn-edit" value="ยืนยัน">
          <input type="reset" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
              <input name="SaveCheck" type="submit" class="btn_r" value="ลบ" onclick="return confirm('ต้องการลบกิจกรรมนี้ ?')">
        </div>
      </div>
    </div>
  </div>
</form>
<!-- /MODAL --></td>
                          </tr>
                          <tr>
                            

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
          <h4 class="modal-title">เพิ่มกิจกรรม</h4>
        </div>
        <div class="modal-body">

          <table class="modal-chk">
          <tr>
            <td style="width: 60px">ชื่อกิจกรรม</td>
            <td><input type="text" style="width: 100px" name="add_actname"></td>
          </tr>
          <tr> 
            <td>วันที่เข้าร่วม</td>
            <td><input type="date" style="width: 100px" name="add_actdate"></td>
          </tr>
          <tr> 
            <td>จำนวนกิจกรรมที่ให้</td>
            <td><select name="act_quantity" style="width: 100px"> 
              <option value="2">หนึ่งกิจกรรม</option>
              <option value="1">ครึ่งกิจกรรม</option>
            </select></td>
          </tr>
          <tr> 
            <td>รายละเอียด</td>
            <td><textarea style="width: 100px" name="add_actdetail"></textarea></td>
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