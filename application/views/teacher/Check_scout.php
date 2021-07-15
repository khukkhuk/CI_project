<?php 
    include "top_menu.php"
?> 
      <!-- Main Content -->
    <div class="page-wrapper">
      <div class="container-fluid">



 <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">เช็คชื่อกิจกรรมลูกเสือ 
                          <?php echo "วันที่  ".$chday=$this->session->userdata('chday'); ?></h5>
          </div>

        </div>
        <!-- /Title --> 
        <!-- Row --> 
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view"><div class="pull-right">
  <a href="<?php echo base_url();?>teacher/room_scout" class="pull-left inline-block mr-15">
                    Back<i class="fa fa-reply"></i> 
                  </a>                 
                
                </div>

              <div class="panel-wrapper collapse in">
                <div class="panel-body row">
                  <div class="table-wrap">
                    <div class="table-responsive"><form method="post" action="">
                  <input type="hidden" name="num" value="<?php echo $num; ?>" >
                      <table class="table display responsive product-overview mb-30" id="myTable">
                        <thead>

                          <style>
                            .btn-em{
                              border-width: 0;
                              background-color: white;
                              /*color: red;*/
                              font-size: 15px;
                            }
                          </style>
                          <tr> 
                            <th>ชื่อ-นามสกุล</th>
                            <th><center><input type="submit"  class="btn-em" name="btn1" value="มา" ></center></th>
                            <th><center><input type="submit"  class="btn-em" name="btn2" value="ขาด"></center></th>
                            <th><center><input type="submit"  class="btn-em" name="btn3" value="สาย"></center></th>

                          </tr>
                        </thead>
                        <tbody>                           
                         <?php 

                         $i=0;
                         foreach ($rs as $r){$i++ ?>   
                          <?php $chkb=$this->session->userdata('btnchk');?>
                          <tr> 
                            <td class="txt-dark"><?php echo $r['name'];  ?></td>
                  <input type="hidden" name="code<?php echo $i;?>" value="<?php echo $r['code']; ?>" >
                  <input type="hidden" name="std_gro" value="<?php echo $r['gro']; ?>" >
                            <td><center><div class="radio radio-success">
                                        <input <?php if($chkb=='1'){echo"checked";} ?> type="radio" name="Checked<?php echo $r['code']; ?>" value="1" class="checkthis">
                                        
                                        <label>   </label>
                              </div></center></td>

                          <td><center><div class="radio radio-warning">
                                        <input <?php if($chkb=='2'){echo"checked";} ?> type="radio" name="Checked<?php echo $r['code']; ?>" value="2" class="checkthis">
                                        
                                        <label>   </label>
                              </div></center></td>

                          <td><center><div class="radio radio-danger">
                                        <input <?php if($chkb=='3'){echo"checked";} ?> type="radio" name="Checked<?php echo $r['code']; ?>" value="3" class="checkthis">
                                        
                                        <label>   </label>
                              </div></center></td>
                          
                            
                          </tr>
                           <?php   }  ?>
                           <tr>
                            <td></td> 
                            <td></td>
                            <td><center><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ยืนยัน</button></center></td>
                            <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ยืนยันการเช็คชื่อ</h4>
        </div>
        <div class="modal-footer">
         <center> <input  class="btn btn-success btn-anim" type="submit" name="SaveCheck" value="ยืนยัน">
        </div>
      </div>
    </div>
  </div>

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
    </div>
    <!-- /Main Content -->

<?php 
    include "bottom_menu.php"
?>
