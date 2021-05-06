
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <b>Club-Signin</b>
            </div>
            <div class="card-body">
                <form  id="clubloginform"  method="post">
                    <div class="input-group mb-3">
                        <input type="text" id="club_username" autofocus  name="club_username" class="form-control" placeholder="User name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="club_password"  name="club_password" class="form-control" placeholder="password">
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
    
    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var check = false;
            return this.optional(element) || regexp.test(value);
        },
        "Please provide a valid username."
    );


    $('#clubloginform').validate({
            rules: {
              club_username: {
                required: true,
                regex: /^[a-z0-9 ]+$/,
              },
              club_password: {
                required: true,
              },
            },
            messages: {
              club_username: {
                required: "Please enter username",
              },
              club_password: {
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

    $('#clubloginform').submit(function(event){

        event.preventDefault();

        username = $('#club_username').val();
        password = $('#club_password').val();

        if(username!='' && password!=''){

            $.ajax({
                    url: base_url+'clubusers/loginaction',
                    type:'POST',
                    data:{ username:username,password:password },
                    success:function(response){

                        var result = JSON.parse(response);

                        if(result.response == "Verified"){
                            alert(result.message);
                            window.location = base_url+"clubusers/dashboard";
                        }else{
                            alert(result.message);
                        }           
                    }
            });
        }

    });

});
</script>