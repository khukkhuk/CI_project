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
                            <th colspan="2"><center>รายชื่อแผนกวิชาในปี <?php echo $this->session->userdata('years');?></center></th>
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
                        
                            <?php foreach($rs as $r ){ ?>
                        <form action="" method="POST" >

                            <tr>
                            <td><?php echo $r['depwork']; ?></td>
                            <input type="hidden" name="dep_name" value="<?php echo $r['depwork'];?>">
                            <td><input type="submit"  class="btn_g" name="btn_dep" value="ดูรายละเอียด"></a></td>
                            </tr>
                      </form>
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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<?php
include "bottom.php";
?>