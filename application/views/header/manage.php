
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
											
 


     


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/j.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('[name="date_join"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			weekStart: 1,
			daysOfWeekHighlighted: "6,0",
			format: 'dd/mm/yyyy',
			autoclose: true,
			todayBtn: true,
			language: "th-TH",
			//orientation: "bottom auto",
			pickerPosition: "bottom auto"
		})
	})
</script>


 
    
<style>
</style>
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
														<th>วันที่ร่วมกิจกรรม</th>
														<th>จัดการกิจกรรม  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button  data-modal="#modal" aria-hidden="true" data-target="#Modal" class="btn btn-success btn-icon-anim btn-circle" data-toggle="modal"><i class="fa fa-plus-square"></i></button>&nbsp; เพิ่มกิจกรรม
													
													</tr>
												</thead>
	
												
<style >
 #ar { 
 border: none;
 border-radius: 5px ;
}
</style>
<tr>
	<?php
	foreach($rs as $row)
	{
	?>	 
      <td style="color: black;" data-label="ลำดับที่" ><?php echo $row["act_id"];?></td>
      <td style="color: black;" data-label="ชื่อกิจกรรม"><textarea id="ar" type="text" name="name_act" rows="1" cols="25"><?php echo $row["act_name"];?></textarea></td>
      <td style="color: black;" data-label="ข้อมูลกิจกรรม"><textarea id="ar" type="text" name="detail_act" rows="1" cols="25"><?php echo $row["act_detail"];?></textarea></td>
	  <td style="color: black;" data-label="วันที่"><?php echo $row["date_create"];?></td>
	  <td style="color: #ff33cc;" data-label="วันที่ร่วมกิจกรรม"><input data-date-format="dd/mm/yyyy" id="ar" class="form-control" name="date_join" data-date-language="th-th" value="<?php echo $row["date_join"];?>"></td>
        
      <td data-label="จัดการกิจกรรม">
	


		<?php echo anchor("header/edit/".$row['act_id'],"<button class='btn btn-skype btn-icon-anim btn-circle' title='แก้ไขกิจกรรม'><i class='glyphicon glyphicon-pencil'></i></button>",array('onclick'=>"return confirm('คุณต้องการแก้ไขข้อมูลหรือไม่?')"));?>

		<?php echo anchor("header/del/".$row['act_id'],"<button class='btn btn-googleplus btn-icon-anim btn-circle' title='ลบกิจกรรม'><i class='glyphicon glyphicon-trash'></i></button>",array('onclick'=>"return confirm('คุณต้องการลบข้อมูลหรือไม่?')"));?>
		
	 <?php echo form_close();?>
	
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
    <input type="text" name="name_act" class="form-control" placeholder="กรูณากรอกชื่อกิจกรรม" required >
	<input type="hidden" name="date_create" value="<?php date_default_timezone_set("UTC"); echo date('d-m-Y'); ?>">
  </div>
<div class="form-group">
    <label>วันที่ร่วนกิจกรรม</label>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
       
<input data-date-format="dd/mm/yyyy" class="form-control" id="datepicker" data-date-language="th-th">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.th.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());
</script>
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


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->

											


	<!------------ /Row ------------------------------------------------------------------------------------------------------------------------------------>
	<!------------ /Row ------------------------------------------------------------------------------------------------------------------------------------>
		<!-- Button trigger modal -->


  

		
		<!-- /Right Sidebar Menu -->
		
        <!-- Main Content -->
		
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
