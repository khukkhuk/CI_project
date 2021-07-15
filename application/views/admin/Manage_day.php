<?php
include "top.php";
?>
<title>Mytitle</title>

 <div class="page-wrapper">
      <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">จัดการวันหยุดในปีการศึกษา <?php echo $this->session->userdata('years');?></h5>
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
                          <style>
                            .btn_r{
                              padding:7px 17px;
                              color:white;
                              background-color: red;
                              border-width: 0px;
                              border-radius: 3px;
                            }.btn_g{
                              width: 120px;
                              padding:7px 17px;
                              color:white;
                              background-color: green;
                              border-width: 0px;
                              border-radius: 3px;
                            }
                          </style>
                        <thead>
                          <tr>
                            <th>คำอธิบาย</th>
                            <th>จำนวนวัน</th>
                            <th>วันที่หยุด</th>
                            <th>หมายเหตุ</th>
                            <th><button type="button" class="btn_r" data-toggle="modal" data-target="#myModal">เพิ่มวันหยุด</button></th>


                          </tr>
                        </thead> 
                        <tbody>
                        <?php
                         $i='1'; foreach ($rs as $r) {
                            ?>
                          <tr>
                            <td><?php echo $r['day_name']; ?></td>
                            <td><?php echo $r['day_num'];?></td>
                            <td><?php echo $r['day_date'];?></td>
                            <td><?php echo $r['name_day']?></td> 
                            <td><button type="button" class="btn_g" data-toggle="modal" data-target="#myModal<?php echo $i;?>">ดูรายละเอียด </button><!-- MODAL -->
          <form method="POST" action=""><div class="modal" id="myModal<?php echo $i;?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขรายละเอียดวันหยุด</h4>
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
            <input type="hidden" name="day_id" value="<?php echo $r['day_id'];?>">
            <td style="width: 60px">คำอธิบาย</td>
            <td><input style="width: 120px;" type="text" name="edit_dayname" value="<?php echo $r['day_name'];?>"></td>
          </tr>
          <tr> 
            <td>จำนวนวัน</td>
            <td><input style="width: 120px;" type="text" name="edit_daynum" value="<?php echo $r['day_num'];?>"></td>
          </tr>

          <tr> 
            <td>วันที่หยุด</td>
            <td><input style="width: 120px;" type="date" name="edit_daydate" value="<?php echo $r['day_date'];?>"></td>
          </tr>

          <tr> 
            <td>หมายเหตุ</td>
            <td><select name="edit_nameday" style="width: 120px;"> 
              <option value="<?php echo $r['name_day'];?>"><?php echo $r['name_day'];?></option>
              <option value="วันจันทร์">วันจันทร์</option>
              <option value="วันอังคาร">วันอังคาร</option>
              <option value="วันพุธ">วันพุธ</option>
              <option value="วันพฤหัส">วันพฤหัส</option>
              <option value="วันศุกร์">วันศุกร์</option>
            </select></td>
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
          <input name="SaveCheck" type="submit" class="btn_r" value="ลบ" onclick="return confirm('ต้องการลบรายชื่อนี้ ?')">
        </div>
      </div>
    </div>
  </div>
</form>
<!-- /MODAL --></td>
                          </tr>
                          
                            

                         <?php
                       $i++; }
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
           <form method="POST" action=""><div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">เพิ่มวันหยุด</h4>
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
            <td style="width: 60px">คำอธิบาย</td>
            <td><input style="width: 120px;" type="text" name="add_dayname"></td>
          </tr>
          <tr> 
            <td>จำนวนวัน</td>
            <td><input style="width: 120px;" type="text" name="add_daynum"></td>
          </tr>
          <tr>
            <td>วันที่หยุด</td>
            <td><input  style="width: 120px;"type="date" name="add_daydate"></td>
          </tr>
          <tr> 
            <td>หมายเหตุ</td>
            <td><select  style="width: 120px;" name="add_nameday">
              <option value="วันจันทร์">วันจันทร์</option>
              <option value="วันอังคาร">วันอังคาร</option>
              <option value="วันพุธ">วันพุธ</option>
              <option value="วันพฤหัส">วันพฤหัส</option>
              <option value="วันศุกร์">วันศุกร์</option>
              <option>วันทั้งหมด</option>
            </select></td>
          </tr>
          

          </table>
        </div>
        <div class="modal-footer">
          <div class="txt-warning">
          หากเพิ่มวันทั้งหมดให้เขียนคำอธิบายว่า"วันทั้งหมด"</div>
          <input type="submit" class="btn btn-default"  name="btn-sub" value="ยืนยัน">
          <input type="reset" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
        </div>
      </div>
    </div>
  </div>
</form>
        <!-- /Row -->
      </div>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php
include "bottom.php";
?>