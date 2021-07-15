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
                  <h6 class="panel-title txt-dark">เปลี่ยนรหัสผ่าน</h6>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="table-wrap">
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                          <tr>
                            <th>ชื่อจริง</th>
                            <th>นามสกุล</th>
                          </tr>
                        </thead> 
                        <tbody>
                        <?php
                          foreach ($rs as $r) {
                            ?>
                          <tr>
                            <td><?php echo $r['a_fname']; ?></td>
                            <td><?php echo $r['a_lname'];?></td>
                          </tr>
                          <tr>
                            <td colspan="2"><a href="Edit_Pass/<?php echo $r['a_id']; ?>" > <button style="margin-left: 50%; padding:1%;background-color: green; border-width: 0; color: white;"> ChangePassword </button></a></td>
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
        
        <!-- /Row -->
      </div>

<?php
include "bottom.php";
?>