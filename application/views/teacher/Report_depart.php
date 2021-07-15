<?php 
		include "top_menu.php"
?> 
			<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">



 <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">เช็คชื่อกิจกรรมแผนก<?php echo "วันที่  ".$chday=$this->session->userdata('chday'); ?></h5>
          </div>

        </div>
        <!-- /Title --> 
        <!-- Row --> 
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view"><div class="pull-right">
                  <a href="<?php echo base_url();?>teacher/show_depart" class="pull-left inline-block mr-15">
                    Back<i class="fa fa-reply"></i> 
                  </a> 
                
                </div>

              <div class="panel-wrapper collapse in">
                <div class="panel-body row">
                  <div class="table-wrap">
                    <div class="table-responsive">
                  <input type="hidden" name="num" value="<?php echo $num; ?>" >
                  <?php // echo $num; ?>
                      <table class="table display responsive product-overview mb-30" id="myTable">
                        <thead>
                          <tr> 
                            <th>ชื่อ-นามสกุล</th>
                            <th></th>
                            <th></th>

                          </tr>
                        </thead>
                        <tbody>                           
                         <?php 
                         $i=0;
                         foreach ($rs as $r){$i++ ?>  

                          <?php 
                            $s_id = $r['std_id'];
                            $sql1 = "SELECT * FROM student WHERE code = '$s_id'";
                            $rs1 = $this->db->query($sql1);
                            $show1 = $rs1->result();

 
                          ?>  
                          <tr> 
                            <td class="txt-dark"><?php echo $show1[0]->name; ?></td> 
                       		  <td>
                            <?php
                            $date= date("d/M/Y");
                             $nums =  $r['status'];
                             $old_c = $r['status_edit'];
                            if ($nums =='1'){
                              echo "มา";
                            }
                            if ($nums =='2'){
                              echo "ขาด";
                            }
                            if ($nums =='3'){
                              echo "สาย";
                            }
                            

                            ?>

                            </td>
                            <td>
                            <style>
                              .btn-ed{
                                /*background-color: blue;*/
                                border-width: 0;
                                color:black;
                                /*border-radius: 5px;*/
                                padding :12px;
                              }
                            </style>
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModala<?php echo $i;?>">แก้ไข</button>
                            <form method="POST" action=""><div class="modal" id="myModala<?php echo $i;?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขสถานะ</h4>
        </div>
        <div class="modal-body">
         <style>
         .modal-chk{
         width: 50%}
         .modal-chk td{
        /*padding: 20px;*/
         }
         </style>
          <table class="modal-chk">
          <tr>
          <td>มา</td>
          <td>ขาด</td>
          <td>สาย</td>
          </tr>
          <tr>
                            <input type="hidden" name="old_c" value="<?php echo $old_c?>">
                            <input type="hidden" name="chk_old" value="<?php echo $nums;?>">
                            <input type="hidden" name="stdid" value="<?php echo $r['std_id'];?>">

              <td><div class="radio radio-success">
              <input <?php  if($nums=='1'){echo "checked";} ?> type="radio" name="radio-e" value="1" class="checkthis">
              <label>  <?php //echo "test=".$r['status'];?> </label>
              </div></td>

              <td><div class="radio radio-warning">
              <input <?php if($nums =='2'){echo "checked";} ?> type="radio" name="radio-e" value="2" class="checkthis">
              <label>   </label>
              </div></td>

              <td><div class="radio radio-danger">
              <input <?php if($nums =='3'){echo "checked";} ?> type="radio" name="radio-e" value="3" class="checkthis">
              <label>   </label>
              </div></td>

          </tr>
          </table>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-default"  name="btne" value="ยืนยัน">
          <input type="reset" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
        </div>
      </div>
    </div>
  </div>
</div>
                            </td>
                          </tr>
</form>

                           <?php   }  ?> 
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<?php 
		include "bottom_menu.php"
?>
