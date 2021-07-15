<?php
include "top.php";
?>
<title>Mytitle</title>

 <div class="page-wrapper">
      <div class="container-fluid">
        
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Data table</h5>
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
                  <h6 class="panel-title txt-dark">ข้อมูลส่วนตัว</h6>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                    <div class="table-responsive"><form method="post" action="">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                          <tr>
                            <th>รหัสผ่านเดิม</th>
                            <th>รหัสผ่านใหม่</th>
                            <th>ยืนยันหัสผ่านใหม่</th>
                          </tr>
                        </thead> 
                        <tbody>
                          <tr>
                            <td><input type="text" name="old_pass"></td>
                            <td><input type="text" name="new_pass1"></td>
                            <td><input type="text" name="new_pass2"></td>
                          <td><input type="submit" name="submit" ></td>
  						</tr>
                          
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

<?php
include "bottom.php";
?>