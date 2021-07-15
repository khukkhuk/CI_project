

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


body {/*
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;*/
}

table {


   border: solid 0px #DDEEEE;
    font: normal 13px Arial, sans-serif;
  width: 90%;
 
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  /*background-color: #f8f8f8;*/
  border: 1px solid #ddd;
  padding: .35em;
   position: relative;
  
}

table th,
table td {
   border: solid 0px #DDEEEE;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
}

table th {
  background-color: #DDEFEF;
    border: solid 5px #DDEEEE;
    color: #336B6B;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
	box-shadow: 0 5px 1px rgba(0, 0, 0, 0.3); 
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 100px;
  }
  
  table tr {

    border-bottom: 5px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 0px solid #ddd;
    display: block;
    font-size: 1em;
    text-align: right;

  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
	border: solid 0px #DDEEEE;
    font: normal 13px Arial, sans-serif;
    content: attr(data-label);
    float: left;
    font-weight: bold;
    
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
					
	<!------ Row ------------------------------------------------------------------------------------------------------------------------------------------------->
           

<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">customer support</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block full-screen">
										<i class="zmdi zmdi-fullscreen"></i>
									</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview border-none" id="support_table">
												<thead>
													<tr>
														<th>ticket ID</th>
														<th>Customer</th>
														<th>issue</th>
														<th>Date</th>
														<th>Status</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#85457898</td>
														<td>Jens Brincker</td>
														<td>Hound chart</td>
														<td>Oct 27</td>
														<td>
															<span class="label label-success">done</span>
														</td>
														<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="completed" ><i class="zmdi zmdi-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
													</tr>
													<tr>
														<td>#85457897</td>
														<td>Mark Hay</td>
														<td>PSD resolution</td>
														<td>Oct 26</td>
														<td>
															<span class="label label-warning ">Pending</span>
														</td>
														<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="completed" ><i class="zmdi zmdi-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
													</tr>
													<tr>
														<td>#85457896</td>
														<td>Anthony Davie</td>
														<td>Cinnabar</td>
														<td>Oct 25</td>
														<td>
															<span class="label label-success ">done</span>
														</td>
														<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="completed" ><i class="zmdi zmdi-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
													</tr>
													<tr>
														<td>#85457895</td>
														<td>David Perry</td>
														<td>Felix PSD</td>
														<td>Oct 25</td>
														<td>
															<span class="label label-danger">pending</span>
														</td>
														<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="completed" ><i class="zmdi zmdi-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
													</tr>
													<tr>
														<td>#85457894</td>
														<td>Anthony Davie</td>
														<td>Beryl iphone</td>
														<td>Oct 25</td>
														<td>
															<span class="label label-success ">done</span>
														</td>
														<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="completed" ><i class="zmdi zmdi-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
													</tr>
													<tr>
														<td>#85457893</td>
														<td>Alan Gilchrist</td>
														<td>Pogody button</td>
														<td>Oct 22</td>
														<td>
															<span class="label label-warning ">Pending</span>
														</td>
														<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="completed" ><i class="zmdi zmdi-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
													</tr>
													<tr>
														<td>#85457892</td>
														<td>Mark Hay</td>
														<td>Beavis sidebar</td>
														<td>Oct 18</td>
														<td>
															<span class="label label-success ">done</span>
														</td>
														<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="completed" ><i class="zmdi zmdi-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
													</tr>
													<tr>
														<td>#85457891</td>
														<td>Sue Woodger</td>
														<td>Pogody header</td>
														<td>Oct 17</td>
														<td>
															<span class="label label-danger">pending</span>
														</td>
														<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip" title="completed" ><i class="zmdi zmdi-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
													</tr>
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
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>2017 &copy; Hound. Pampered by Hencework</p>
					</div>
				</div>
			</footer>
				
			


<div id="add">

</div>

<center>
<table width="500">
  <caption>ตารางกิจกรรมแผนก (ตัวแปล)</caption>
  <thead>
    <tr>
      <th scope="col" width="50">ลำดับที่</th>
      <th scope="col" width="50">ชื่อกิจกรรม</th>
      <th scope="col" width="50">ข้อมูลกิจกรรม</th>
	  <th scope="col" width="50">วันที่</th>
      <th scope="col" width="50">จัดการกิจกรรม  <button data-modal="#modal" class="btn_add" data-toggle="modal" data-target="#exampleModal" title="เพิ่มกิจกรรม">
	<i class="fa fa-plus-square" id="icon_add" aria-hidden="true"> เพิ่มกิจกรรม</i>

</button></th>
    </tr>
  </thead>
  <?php
	foreach($rs as $row)
	{
	?>
  <tbody>
    <tr>
      <td data-label="ลำดับที่" ><?php echo $row['act_id']?></td>
      <td data-label="ชื่อกิจกรรม"><?php echo $row['act_name']?></td>
      <td data-label="ข้อมูลกิจกรรม"><?php echo $row['act_detail'] ?> </td>
	  <td data-label="วันที่"><?php echo $row['date']?> </td>
      <td data-label="จัดการกิจกรรม"><button data-modal-trigger='trigger-1' class='btn_edit' title="แก้กิจกรรม">
		<span class='glyphicon glyphicon-pencil' id='icon_cl'></span>
		</button>
		<?php echo anchor("header/del/".$row['act_id'],"<button class='btn_del' title='ลบกิจกรรม'><span class='glyphicon glyphicon-trash' id ='icon_cl' aria-hidden='true'></span>
		</button>",array('onclick'=>"return confirm('คุณต้องการลบข้อมูลหรือไม่?')"));?>
		
		
	
	
	
	
	
	<!--<?php echo anchor("header/edit/".$row['act_id'],"<span class='glyphicon glyphicon-pencil'> แก้ไข</span>"); ?>&nbsp;&nbsp;
	 <?php echo anchor("header/del/".$row['act_id'],"<span class='glyphicon glyphicon-trash'aria-hidden='true'> ลบ</span>",array('onclick'=>"return confirm('คุณต้องการลบข้อมูลหรือไม่?')"));?></td>   -->
	
	
    </tr>
	<?php } ?>
  </tbody>
</table>		

</form>



										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
						</div>
					
					<!-- /Row -->
					
<style>


</style>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

      <?php echo form_open('header/add');?>
      <div class="modal-body">

	<center><font size="5">เพิ่มกิจกรรม</font></center>
  <div class="form-group">
    <label for="formGroupExampleInput">ชื่อกิจกรรม</label>
    <input type="text" name="name_act" class="form-control" placeholder="กรูณากรอกชื่อกิจกรรม" required>
  </div>
  <div class="form-group">
    <label>รายละเอียดกิจกรรม</label>
    <textarea class="form-control" type="text" name="detail_act" rows="15" placeholder="กรูณากรอกรายะเอียดกิจกรรม" required></textarea>
  </div>        
        <button type="button" id="btn_cos_mol"  class="btn_cos_mol pull-right" data-dismiss="modal"><i class="fa fa-times" id="icon_add" aria-hidden="true"> ยกเลิก </i></button>
		<input type="submit" name="btn_mol_save" class="btn_sub_mol pull-right" value="บันทึกข้อมูล" >

      
    </div>


</div>

 <?php echo form_close();?>
   
  	

      
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
	
