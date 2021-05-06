<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    
           

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Change Password 
                            <span class="d-block text-muted pt-2 font-size-sm"></span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form class="form" id="adminpswform" action="" method="POST" >
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Password:</label>
                                    <input data-validation="required" type="password" name="old_password" id="old_password" class="form-control"/>
                                    <span class="form-text text-muted">Please enter your Password</span>
                                </div>
                                 <div class="col-lg-4">
                                    <label>New Password</label>
                                    <input  data-validation="required"  type="password" name="new_password" id="new_password" class="form-control"/>
                                    <span class="form-text text-muted">Please enter your Password</span>
                                </div>
								  <div class="col-lg-4">
                                    <label>Confirm Password</label>
                                    <input  data-validation="required"  type="password" name="new_password_check" id="confirm_password" class="form-control"/>
                                    <span class="form-text text-muted">Please enter your Password</span>
                                </div>
                                
                            </div>
                           
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <input type="submit" class="btn btn-primary mr-2">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    var currentpsw = "<?php echo $_SESSION['user']['password'] ;?>";

</script>     

            <script src="<?php echo $base_url ?>assets/js/admin/pswd.js" type="text/javascript"></script>