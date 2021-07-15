

<?php include 'Menu/Menu_header.php';?>	

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/css.css">
	<style>

#bts {
    position: absolute;
    top: 46px;
    right: 300px;
	box-shadow: 1px 3px 3px #DDEEEE;

	}
#add {
    position: absolute;
    top: 45px;
    right: 270px;

	}
#sss {
    position: absolute;
    top: 10px;
    right: 800px;
	width: 500px

	
	}
#button {
    background-color: #ff3300;
	height: 50px;
	width: 50px;
	border-radius: 50%;
}


</style>  

</head>

<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
									
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="table-wrap">
											
					
					<!-- /Row -->
					
					
		<!-- /#wrapper -->		
		<!-- Button trigger modal -->

<!-- Modaledit-------------------------------------------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><font size="5">แก้ไขกิจกรรม</font></center>
	<div class="form-group">

 
<?php echo form_open('header/manage/'.$rs['act_id']);?>

	
    <label for="formGroupExampleInput">ชื่อกิจกรรม</label>
    <input type="text" name="name_act"  value="<?php echo $row['act_name']?>"  class="form-control" placeholder="กรูณากรอกชื่อกิจกรรม" required >
  </div>
  <div class="form-group">
    <label>รายละเอียดกิจกรรม</label>
    <textarea class="form-control" type="text" name="detail_act"   rows="15" placeholder="กรูณากรอกรายะเอียดกิจกรรม" required><?php echo $row['act_detail']?></textarea>
  </div>        
        <input type="button" class="btn_cos_mol pull-right" data-dismiss="modal" value="ยกเลิก">
		
		<input type="submit" name="btn_edit_mol" class="btn_sub_mol  pull-right" value="บันทึกข้อมูล" >
	</form> 
    </div>
    </div>
  </div>
</div>

  <?php echo form_close();?>

<!-- Modaledit-===================================================================================================================================------ Row ------------------------------------------------------------------------------------------------------------------------------------------------->
           
									<center>
<!-- Row -->
										<div class="table-responsive">
											<table class="table display product-overview border-none " id="support_table">
											 <caption><h4>ตารางกิจกรรมแผนก (ตัวแปล)</h4></caption>
												<thead>
												<tr >
														<th>ลำดับที่</th>
														<th>ชื่อกิจกรรม</th>
														<th>ข้อมูลกิจกรรม</th>
														<th>วันที่</th>
														<th>จัดการกิจกรรม  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button  data-modal="#modal" aria-hidden="true" data-target="#Modal" class="btn btn-success btn-icon-anim btn-circle" data-toggle="modal"><i class="fa fa-plus-square"></i></button>&nbsp; เพิ่มกิจกรรม
													
													</tr>
												</thead>
												 <tr>
	<?php
	foreach($rs as $row)
	{
	?>	
      <td data-label="ลำดับที่" ><?php echo $row['act_id']?></td>
      <td data-label="ชื่อกิจกรรม"><?php echo $row['act_name']?></td>
      <td data-label="ข้อมูลกิจกรรม"><?php echo $row['act_detail'] ?> </td>
	  <td data-label="วันที่"><?php echo $row['date']?> </td>
      <td data-label="จัดการกิจกรรม">
	 
	  
	  
	  
	  
	  
	  
	  <?php echo anchor("header/edit/".$row['act_id'],"<button class='btn btn-twitter btn-icon-anim btn-circle' title='แก้ไขกิจกรรม' data-toggle='modal' data-target='#modaledit' ><i class='fa fa-pencil'></i></button>");?>


		<?php echo anchor("header/del/".$row['act_id'],"<button class='btn btn-googleplus btn-icon-anim btn-circle' title='ลบกิจกรรม'><i class='icon-trash'></i></button>",array('onclick'=>"return confirm('คุณต้องการลบข้อมูลหรือไม่?')"));?>
		
	
	
	<!--<?php echo anchor("header/edit/".$row['act_id'],"<span class='glyphicon glyphicon-pencil'> แก้ไข</span>"); ?>&nbsp;&nbsp;
	 <?php echo anchor("header/del/".$row['act_id'],"<span class='glyphicon glyphicon-trash'aria-hidden='true'> ลบ</span>",array('onclick'=>"return confirm('คุณต้องการลบข้อมูลหรือไม่?')"));?></td>   -->
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
		
				

</form>
					
<style>


</style>
<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

     
      <div class="modal-body">

	<center><font size="5">เพิ่มกิจกรรม</font></center>
	<div class="form-group">
	<form action="<?php echo site_url('/header/add');?>" method = "post">
    <label for="formGroupExampleInput">ชื่อกิจกรรม</label>
    <input type="text" name="name_act" class="form-control" placeholder="กรูณากรอกชื่อกิจกรรม" required>
  </div>
  <div class="form-group">
    <label>รายละเอียดกิจกรรม</label>
    <textarea class="form-control" type="text" name="detail_act" rows="15" placeholder="กรูณากรอกรายะเอียดกิจกรรม" required></textarea>
  </div>        
        <input type="button" class="btn_cos_mol pull-right" data-dismiss="modal" value="ยกเลิก">
		
		<input type="submit" name="btn_mol_save" class="btn_sub_mol  pull-right" value="บันทึกข้อมูล" >
		</form>
      
    </div>


</div>

<!-- Modal ------------------------------------------------------------------------------------------------------>



</div>

   
  	

      
    </div>
  </div>
</div>

















					<footer class="footer container-fluid pl-30 pr-30">
						<div class="row">
							<div class="col-sm-12">
								<p></p>
							</div>
						</div>
					</footer>
					<!-- /Footer -->
					
				</div>
			</div>
			<!-- /Main Content -->
		
		</div>


											


	<!------------ /Row ------------------------------------------------------------------------------------------------------------------------------------>
	<!------------ /Row ------------------------------------------------------------------------------------------------------------------------------------>
		<!-- Button trigger modal -->


  

		
		<!-- /Right Sidebar Menu -->
		
        <!-- Main Content -->
		
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
