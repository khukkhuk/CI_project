<?php
include "top.php";
?>
<title>Mytitle</title>

 <div class="page-wrapper">
      <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">จัดการผู้ดูแลระบบ</h5>
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
                              width: 120px;
                              padding:7px 17px;
                              color:white;
                              background-color: red;
                              border-width: 0px;
                              border-radius: 3px;
                            }
                            .btn_g{
                              width: 120px;
                              padding:7px 17px;
                              color:white;
                              background-color: green;
                              border-width: 0px;
                              border-radius: 3px;
                            }
                            .btn_c{
                              width: 120px;
                              padding:7px 17px;
                              color:white;
                              background-color: gray;
                              border-width: 0px;
                              border-radius: 3px;
                            }
                          </style>
                          <tr>
                            <th>ชื่อจริง</th>
                            <th>นามสกุล</th>
                            <th colspan="3"><button type="button" class="btn_r" data-toggle="modal" data-target="#myModal">เพิ่มผู้ดูแล</button></th>
                          </tr>
                        </thead> 
                        <tbody>
                        <?php $i='1';
                          foreach ($rs as $r) {
                            ?>
                          <tr>
                            <td><?php echo $r['a_fname']; ?></td>
                            <td><?php echo $r['a_lname'];?></td>
                            <td><button type="button" class="btn_g" data-toggle="modal" data-target="#myModal<?php echo $i;?>">รายละเอียด </button><!-- MODAL -->
          <form method="POST" action=""><div class="modal" id="myModal<?php echo $i;?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขข้อมูลผู้ดูแลระบบ</h4>
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
            <input type="hidden" name="a_id" value="<?php echo $r['a_id'];?>">
            <td style="width: 60px">ชื่อจริง</td>
            <td><input style="width: 120px;" type="text" value="<?php echo $r['a_fname'] ?>" name="add_name"></td>
          </tr>
          <tr> 
            <td>นามสกุล</td>
            <td><input style="width: 120px;" type="text" value="<?php echo $r['a_lname'] ?>" name="add_surname"></td>
          </tr>
          <tr>
            <td>username</td>
            <td><input  style="width: 120px;"type="text" value="<?php echo $r['username'] ?>" name="add_username"></td>
          </tr>
          <tr> 
            <td>password</td>
            <td><input  style="width: 120px;"type="password" value="<?php echo $r['password'] ?>" name="add_password"></td>
          </tr>
          <tr> 
            <td>confirm password</td>
            <td><input  style="width: 120px;"type="password" name="add_cpassword"></td>
          </tr>
          

          </table>
        </div>
        <div class="modal-footer">
          <style>
            .txt-warning{
              color: green;
              font-size: 11px;
            }

            .tb_controll tr{
              margin-right: 12px;
              margin-bottom: 5px;
            }
          </style>
          <div class="txt-warning">
          กรุณาตรวจสอบข้อมูลให้เรียบร้อยก่อนยืนยันการแก้ไข</div>
          <table class="tb_controll">
            <tr>
              <th><input type="submit" class="btn_g"  name="btn-edit" value="ยืนยัน"></th>
              <th><input type="reset" class="btn_c" data-dismiss="modal" value="ยกเลิก"></th>
            </tr>
            <tr><td colspan="2">
              <input name="SaveCheck" type="submit" class="btn_r" value="ลบ" onclick="return confirm('ต้องการลบรายชื่อนี้ ?')">
            </td>
            </tr>
          </table>
          
          
          
        </div>
      </div>
    </div>
  </div>
</form>
<!-- /MODAL -->
                </td>


                          </tr>

                         <?php
                       $i++;}
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
          <h4 class="modal-title">เพิ่มผู้ดูแลระบบ</h4>
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
            <td style="width: 60px">ชื่อจริง</td>
            <td><input style="width: 120px;" type="text" name="add_name"></td>
          </tr>
          <tr> 
            <td>นามสกุล</td>
            <td><input style="width: 120px;" type="text" name="add_surname"></td>
          </tr>
          <tr>
            <td>username</td>
            <td><input  style="width: 120px;"type="text" name="add_username"></td>
          </tr>
          <tr> 
            <td>password</td>
            <td><input  style="width: 120px;"type="password" name="add_password"></td>
          </tr>
          <tr> 
            <td>confirm password</td>
            <td><input  style="width: 120px;"type="password" name="add_cpassword"></td>
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

        <!-- /Row -->
      </div>

<?php
include "bottom.php";
?>