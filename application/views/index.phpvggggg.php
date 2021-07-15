<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>LOGIN</title>
  <meta name="description" content="Hound is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Hound Admin, Houndadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  
  <!-- vector map CSS -->
  <link href="<?php echo base_url(); ?>assets/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
  
  
  
  <!-- Custom CSS -->
  <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet" type="text/css">



 </head>
 <body>
  <!--Preloader-->
  <div class="preloader-it">
   <div class="la-anim-1"></div>
  </div>
  <!--/Preloader-->
  
  <div class="wrapper pa-0">
   
   
   <!-- Main Content -->
   <div class="page-wrapper pa-0 ma-0 auth-page">
    <div class="container-fluid">
     <!-- Row -->
     <div class="table-struct full-width full-height">
      <div class="table-cell vertical-align-middle auth-form-wrap">
       <div class="auth-form  ml-auto mr-auto no-float">
        <div class="row">
         <div class="col-sm-12 col-xs-12">
          <div class="mb-30">
           <h3 class="text-center txt-dark mb-10">ระบบกิจกรรมนักเรียน-นักศึกษา</h3>
           
          </div> 
          <div class="form-wrap">
           <form action="" method="post">
            <div class="form-group">
             <label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
             <input type="text" class="form-control" id="username" name="username" placeholder="รหัสครู,รหัสนักศึกษา">
            </div>
            <div class="form-group">
             <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
             
             <div class="clearfix"></div>
             <input type="password" class="form-control" required="" id="password" name="password" placeholder="•••••••••••">
            </div>
            
             <div class="form-group text-center">
             <button type="submit" class="btn  btn-success btn-inline btn-rounded">Login</button>
            <button type="reset" class="btn  btn-success btn-outline btn-rounded red">Reset</button>
            </div>
           </form>
           <div class="login100-more" style="background-image: url('bg-01.jpg');">
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
  
  </div>
  <!-- /#wrapper -->
  
  <!-- JavaScript -->
  
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
  
  <!-- Slimscroll JavaScript -->
  <script src="<?php echo base_url(); ?>assets/dist/js/jquery.slimscroll.js"></script>
  
  <!-- Init JavaScript -->
  <script src="<?php echo base_url(); ?>assets/dist/js/init.js"></script>
 </body>
</html>