
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <b>Admin-Signin</b>
            </div>
            <div class="card-body">
                <form action="<?php echo $base_url;?>loginaction" id="adminloginform"  method="post">
                    <div class="input-group mb-3">
                        <input type="email" id="adminuname" autofocus  name="adminuname" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="adminpasw"  name="adminpasw" class="form-control" placeholder="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-4">
                            <input type="submit" value="Login" class="btn btn-primary btn-lock">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script >
    jQuery(document).ready(function(){
    

    $('#adminloginform').validate({
            rules: {
              adminuname: {
                required: true,
                email: true,
              },
              adminpasw: {
                required: true,

              },
            },
            messages: {
              adminuname: {
                required: "Please enter username",
              },
              adminpasw: {
                required: "Please enter password",
              },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.input-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });    


    $('#adminloginform').submit(function(e){

        e.preventDefault();

        var uname = $('#adminuname').val();
        var upswd = $('#adminpasw').val();

        if(uname == false || upswd == false){

            // alert("Please enter the login credentials");
        }else{

            $.ajax({
                    url  : base_url+'loginaction',
                    type : 'POST',
                    data : { email:uname,password:upswd},
                    success:function(response){
                        var resp = JSON.parse(response);
                        if(resp.response == 'Login Failed'){
                            alert(resp.message)
                        }else if(resp.data == "admin"){
                            window.location = base_url+'admin/dashboard';
                        }else if(resp.data == "user"){
                            window.location = base_url+'members/dashboard';
                        }
                    }
            });
        }

    });

});
</script>