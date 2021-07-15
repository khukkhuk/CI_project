<?php 
		include "top_menu.php"
?>

			<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">



 <!-- Title -->
        <div class="row heading-bg">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">******</h5>
          </div>

        </div>
        <!-- /Title -->
        <?php // echo form_open('teacher/ChedkUp');?>
        <!-- Row -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default card-view">
              <div class="panel-wrapper collapse in">
                <div class="panel-body row">
                  <div class="table-wrap">
                    <div class="table-responsive"><form method="post" action="<?php echo base_url(); ?>teacher/insert_lineup">
                  <input type="hidden" name="num" value="<?php echo $num; ?>" >
                  <?php // echo $num; ?>
                      <table class="table display responsive product-overview mb-30" id="myTable">
                        <thead>
                          <tr>
                            <th>code</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th><center>มา</center></th>
                            <th><center>ขาด</center></th>

                          </tr>
                        </thead>
                        <tbody>                           
                         <?php 
                         $i=0;
                         foreach ($rs as $r){$i++ ?>   
                          <tr>
                            <td class="txt-dark"><?php echo $r['code']; ?></td>
                            <td class="txt-dark"><?php echo $r['name']; ?></td>
                  <input type="hidden" name="code<?php echo $i;?>" value="<?php echo $r['code']; ?>" >
                       		  <td><center><div class="radio radio-success">
                                        <input type="radio" name="Checked<?php echo $r['code']; ?>" value="1" class="checkthis">
                                        <label> Success </label>
                              </div></center></td>
                          
                            <td><center><div class="radio radio-danger">
                                        <input type="radio" name="Checked<?php echo $r['code']; ?>" value="0" class="checkthis" checked>
                                        <label> Danger </label>
                            </div></center></td>
                          </tr>
                           <?php   }  ?>
                           <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><center><button class="btn btn-success btn-anim" type="submit" name="SaveCheck"><i class="icon-heart"></i><span class="btn-text">submit</span></button></center></td>
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
