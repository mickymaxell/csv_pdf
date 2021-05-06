<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= $base_url ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= $base_url ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= $base_url ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= $base_url ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $base_url ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= $base_url ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <!-- SweetAlert Stylesheet -->
  <link rel="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" />
  <!-- Drop Zone -->
  <link rel="stylesheet" href ="<?= $base_url ?>assets/css/dropzone.css" />
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
  <link rel="stylesheet" href="<?= $base_url ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= $base_url ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= $base_url ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= $base_url ?>plugins/ekko-lightbox/ekko-lightbox.css">
  <link rel="stylesheet" href="<?= $base_url ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= $base_url ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <!-- jQuery -->
<script src="<?= $base_url ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= $base_url ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<!-- Bootstrap 4 -->
<script src="<?= $base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $base_url ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= $base_url ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?= $base_url ?>plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= $base_url ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<!-- <script src="plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<script src="<?= $base_url ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $base_url ?>dist/js/adminlte.js"></script>
<!-- Drop Zone --><!-- Sweetalert Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>   -->
      <!-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>             -->
<!-- DataTables  & Plugins -->
<script src="<?= $base_url ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $base_url ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $base_url ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $base_url ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= $base_url ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $base_url ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $base_url ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $base_url ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= $base_url ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- jquery-validation -->
<script src="<?= $base_url ?>plugins/jquery-validation/jquery.validate.min.js"></script>   
<script type="text/javascript">var base_url = '<?php echo $base_url; ?>';</script>      
<script src="<?= $base_url ?>plugins/select2/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>

	<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="justify-content: space-between;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php $base_url ?>dashboard" class="nav-link">Home</a>
      </li>
    </ul>

    


    <div class="navbar-custom-menu">
    	<ul class="nav navbar-nav">
    		<li class="dropdown user user-menu">
    			<a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    				<?php if($_SESSION['user']['avatar']!=''){ ?>
    					<img  class="user-image" alt="profile-pic">
    				<?php } ?>
    				<span class="hidden-xs"><?php  echo $_SESSION['user']['user_name']; ?></span>
    			</a>
    			<ul class="dropdown-menu">
    				<li class="user-header">
    					<?php if($_SESSION['user']['avatar']!=''){ 

              ?>
    						<img  class="img-circle" alt="profile-pic">
                <div class="input-file" data-placement="top" data-toggle="tooltip" title="Change Image">
                  <form method="POST" action="<?php echo $base_url; ?>admin/avatarchange" enctype="multipart/form-data">
                    <label for="avatarfile">
                    <i class="fas fa-camera"></i>
                    <input type="file" id="avatarfile" name="avatarfile" style="display: none;" onchange="document.getElementById('propicbtn').click()">
                              <input type="submit" name="" style="display: none;" id="propicbtn">
                    </label>
                  </form>  
                </div>
    					<?php }else{ ?>
    						<!-- <img src="<?php $base_url ?>dist/img/avatar4.png" class="img-circle" alt="profile-pic"> -->
    						
	                        	<form method="POST" id="adminavatarform" action="<?php echo $base_url; ?>admin/avatarchange" enctype="multipart/form-data">
	                        		<label class="btn btn-default " for="avatarfile"><i class="fas fa-camera"></i>&nbsp;Upload Photo</label>
	                        		<input type="file" id="avatarfile" name="avatarfile" style="display: none;" onchange="document.getElementById('propicbtn').click()">
	                        		<input type="submit" name="" style="display: none;" id="propicbtn">
	                        	</form>
                        	
    					<?php } ?>	
    					<p>
    						<?php  echo $_SESSION['user']['user_name']; ?>
    						<small><?php  echo $_SESSION['user']['email_id']; ?></small>
    					</p>
    				</li>
    				<li class="user-footer">
    					<div class="pull-left">
    						<a href="#" data-target="#passwordModal" data-toggle="modal" class="btn btn-default btn-flat" style="float: left;font-size: 13px;">Change Password</a>
    					</div>
    					<div class="pull-right">
    						<a href="<?= $base_url ?>logout" class="btn btn-default btn-flat" style="float: right;font-size: 13px;">Sign out</a>
    					</div>
    				</li>
    			</ul>
    		</li>
    	</ul>
    </div>

  </nav>
  <!-- /.navbar -->


  <style >
  	.dropdown-toggle::after{
  		content: none!important;
  	}
.user-header {
    background-color: #3c8dbc;
    color: #fff;
}
.tabod{
  padding: 0;
}
.dataTables_filter,.pagination,.dataTables_info,.dataTables_length{
  padding: .5rem;
}
.custom-control-label:hover{
  cursor: pointer;
}

.input-file {
    position: absolute;
    top: 50px;
    color: #fff;
    width: 32px;
    right: 75px;
    height: 28px;
    border-radius: 100%;
    background: #383535;
}

.input-file .form-control-file {
    display: none;
}

.input-file label {
    margin: 0;
    float: left;
    width: 100%;
    height: 100%;
    cursor: pointer;
}
.input-file label .text:after {
    content: '\f03e';
    color: #fff;
    font-size: 17px;
    font-weight: 400;
    font-family: 'Font Awesome 5 Pro';
    position: absolute;
    left: 8px;
    top: 8px;
}

  </style>


  <!-- Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <form class="form" method="POST" id="admin_password_form">
          <div class="form-group row">
            <div class="col-lg-12"> 
              <label for="admin_old_psw">Old Password</label>
              <input type="password" id="admin_old_psw" class="form-control" name="admin_old_psw">
            </div>
            <div class="col-lg-12"> 
              <label for="admin_new_psw">New Password</label>
              <input type="password" class="form-control" id="admin_new_psw" name="admin_new_psw">
            </div>
            <div class="col-lg-12"> 
              <label for="admin_confirm_psw">Confirm Password</label>
              <input type="password" class="form-control" id="admin_confirm_psw" name="admin_confirm_psw">
            </div>
          </div>   
                           
      </div>                   
      <div class="modal-footer justify-content-between">
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="admin_psw_btn" value="Change">  
          </div>
      </div>
      </form>
    </div>
  </div>
</div>

<script >
    
    $('#admin_password_form').validate({
        rules: {
          admin_old_psw: {
            required: true,
          },
          admin_new_psw: {
            required: true,
          },
          admin_confirm_psw: {
            required: true,
          },
        },
        messages: {
          admin_old_psw: {
            required: "Please enter old password",
          },
          admin_new_psw: {
            required: "Please enter new password",
          },
          admin_confirm_psw: {
            required: "Please confirm new password",
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.col-lg-12').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });

    $('#admin_password_form').submit(function(event){

      event.preventDefault();

      var currentpsw = "<?php echo $_SESSION['user']['password'] ;?>";

      var admin_old_psw = $('#admin_old_psw').val();
      var admin_new_psw = $('#admin_new_psw').val();
      var admin_confirm_psw = $('#admin_confirm_psw').val();

      admin_old_psw =  CryptoJS.MD5(admin_old_psw); 

      if(admin_old_psw!=''){
        if(admin_old_psw!=currentpsw){
          alert("Please enter current password");
        }
      }  

      if(admin_new_psw!=admin_confirm_psw){
        alert("Passwords should be matching");
      }

      

      if((admin_old_psw == currentpsw) && (admin_new_psw == admin_confirm_psw) ){

          $.ajax({
                  url:base_url+'admin/changepsw',
                  type:'POST',
                  data: {password : admin_new_psw},
                  success:function(result){
                    result = JSON.parse(result);
                    if(result.response == "success"){
                        alert(result.message);
                        window.location.replace(base_url+'admin');
                    }else{
                        alert(result.message);
                    }
                  }
          });  

      }

    });

</script>