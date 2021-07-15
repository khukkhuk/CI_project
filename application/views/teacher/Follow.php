<?php 
    include "top_menu.php"
?>

      <!-- Main Content -->
    <div class="page-wrapper">
      <div class="container-fluid">

  <!-- Row -->
        <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">ติดตามผลกิจกรรม</h5>
          </div>
         
        </div>
        <!-- /Title -->

        
        <!-- Row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              <div class="panel-wrapper collapse in">
                <div class="panel-body row">
                  <div class="table-wrap">
                    <div class="table-responsive">
                      <table class="table display responsive product-overview mb-30" id="myTable">
                        <thead>
                          <tr>
                            <th>กลุ่ม</th>
                            <th>Status</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                              <?php foreach ($rs as $r){ 
                          $gro = $r['gro'];
                          $dyth=date("y")+43;

                          $cut = substr($gro, 2,2);
                          $ystd = substr($gro,0,2);
                          $room = substr($gro, -1);
                          $sum = $dyth - $ystd   ;
                          if($cut ="2"){ 

                          if ($sum == 1){$abc = "A";};
                          if ($sum == 2){$abc = "B";};
                          if ($sum == 3){$abc = "C";};
                          
                          }
                          if($cut ="3"){
                          if ($sum == 1){$abc = "D";};
                          if ($sum == 2){$abc = "E";};
                          }
                          ?>
                          <tr>
                            <td><?php echo $gro; ?></td>
                              <td><a href="<?php echo base_url();?>teacher/follow_std/<?php echo $gro; ?>">
                              <button class='btn btn-info btn-anim'><i class='fa fa-sign-out'></i><span class='btn-text'>ติดตามผล</span></button></a></td>
                            </tr>

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
    </div>
    <!-- /Main Content -->

<?php 
    include "bottom_menu.php";
?>

