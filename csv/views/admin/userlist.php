<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">All Users</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php $base_url ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">All Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Users</h3><a href="#" data-toggle="modal" data-target="#AddUser" onclick="cleardata()" class="btn btn-secondary float-right"><i class="fas fa-plus"></i>&nbsp; Add New</a>
                        </div>
                      <!-- /.card-header -->
                        <div class="card-body tabod">
                            <table id="userstable" class="table  table-striped" style="width:100%">
                                <thead>  
                                    <tr> 
                                        <th>SI NO</th>
                                        <th >Username</th>
                                        <th >Name</th>
                                        <th >Email</th>
                                        <th> User Type</th>
                                        <th >Action</th>
                                    </tr>  
                                </thead>
                            </table>
                        </div>
                    </div>        
                </div>    
            </div>    
        </div>    
    </section>    
</div>



<!-- Modal -->
<div class="modal fade" id="AddUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content card card-info" style="border: none;">
      <div class="modal-header card-header">
        <h4 class=" card-title" id="user-title">Create User</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div> 
                                <form role="form"  id="adduserform" name="adduserform" class="form-horizontal">
                                    <input type="hidden" id="userid" name="userid" value="<?= $userid ?>">
                                    <div class=" card-body">    
                                        <div class="form-group row">
                                            <label for="userfull_name" class="col-sm-3 col-form-label">Full Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" autofocus="" class="form-control" id="userfull_name" name="userfull_name" />
                                            </div>
                                            <span class="col-12 text-center"></span>
                                        </div>
                                        <div class="form-group row">
                                            <label for="username" class="col-sm-3 col-form-label">User Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="username" name="username"   />
                                            </div>
                                            <span class="col-12 text-center"></span>
                                        </div>
                                        <div class="form-group row">
                                            <label for="useremail" class="col-sm-3 col-form-label">Email-id</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="useremail" name="useremail"   />
                                            </div>
                                            <span class="col-12 text-center"></span>
                                        </div>
                                        <div class="form-group row">
                                            <label for="usertype" class="col-sm-3 col-form-label">Select user type</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="usertype" name="usertype">
                                                    <option value="user">user</option>
                                                    <option value="admin">admin</option>
                                                </select>
                                            </div>
                                            <span class="col-12 text-center"></span>
                                        </div>
                                        <div class="form-group row" id="passwordrow">
                                            <label for="userpassword" class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="userpassword" name="userpassword"   />
                                            </div>
                                            <span class="col-12 text-center"></span>
                                        </div>
                                    </div>    
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-info" name="" value="save">
                                        <button type="button" class="btn btn-default float-right" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="ViewuserdetailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">User Details</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
                            <div class="card card-info card-outline mt-0 mb-0">
                                <div class="card-header">
                                    <h3 class="card-title"> </h3>
                                </div>
                                    <div class="card-body">
                                        <table i class="table table-striped " style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <th>Name</th>
                                                    <td id="viewname"></td>
                                                </tr>
                                                <tr>
                                                    <th>User Name</th>
                                                    <td id="viewusername"></td>
                                                </tr>
                                                <tr>
                                                    <th>Email -id</th>
                                                    <td id="viewemail"></td>
                                                </tr>
                                                <tr>
                                                    <th>User type</th>
                                                    <td id="viewtype"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><!-- /.box-body -->
                            </div><!-- /.box -->
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script >
        
    $("#AddUser").on('shown.bs.modal', function(){
        $(this).find('#userfull_name').focus();
    });
    


    function getuserdetail(id){
    
        if(id!=false){
            $.ajax({

                        url : base_url+'admin/getuserdetails/'+ id,
                        success:function(response){

                            response = JSON.parse(response);
                            $('#userfull_name').val(response.first_name);
                            $('#username').val(response.user_name);
                            $('#useremail').val(response.email_id);
                            $('#userpassword').val(response.password);
                            $('#usertype option').each(function(){
                                if(this.value == response.type){ 
                                    $(this).attr('selected','selected');
                                }else{
                                    $(this).attr('selected',false);
                                }
                            });
                            $('#userid').val(response.id);
                            $('#passwordrow').hide();
                            
                        }   
            });
        }

    }

    function viewuser(id){

        if(id!=false){
            $.ajax({

                        url : base_url+'admin/getuserdetails/'+ id,
                        success:function(response){
                            // $('#user-title').html("Edit User");
                            response = JSON.parse(response);
                            $('#viewname').html(response.first_name);
                            $('#viewusername').html(response.user_name);
                            $('#viewemail').html(response.email_id);
                            $('#viewtype').html(response.type);
                            
                        }   
            });
        }

    }

    function cleardata(){
                            $('#userfull_name').val('');
                            $('#username').val('');
                            $('#useremail').val('');
                            $('#passwordrow').show();
    }

    function delete_user(userid){
        if(confirm("Are you sure you want to delete this user?")){
            $.ajax({
                    url: base_url+'admin/deleteuser/'+userid,
                    success:function(response){
                        if(response!=''){
                             response = JSON.parse(response);
                             if(response.response == "success"){
                                swal( {
                                    title:"Deleted",
                                    text:response.message,
                                    type:"success"
                                },function(){
                                        window.location.reload();
                                  });
                             }else{
                                swal( {
                                    title:"not removed",
                                    text:response.message,
                                    type:"error"
                                },function(){
                                        window.location.reload();
                                  });
                             }   
                        }
                    }
            });
        }else{
            return false;
        }    
    }
    

    jQuery(document).ready(function(){

    var table = $('#userstable').DataTable({

    "processing": true,
        "serverSide": true,

        "sScrollX": '100%',
        'dom': "<'row'<'col-sm-6'l><'col-sm-2  text-right 'B><'col-sm-4 pull-right'f >>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "buttons": [
              
            ]        ,

        "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
                "order": [],
        }],

        "ajax": {
                    "url" : base_url+"admin/userlist",
                    "type":"POST",
                    "data":function(data){
                            
                    }
        }        

    });

});

    jQuery(document).ready(function(){

    $('#adduserform').validate({
    rules: {
      useremail: {
        required: true,
        email: true,
      },
      userpassword: {
        required: true,
        minlength: 5
      },
      userfull_name: {
        required: true
      },
      username: {
        required: true
      },
    },
    messages: {
      useremail: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      userpassword: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      username: "Please Enter Username",
      userfull_name:"Please Prove a name"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
    $('#adduserform').submit(function(event){

        event.preventDefault();
        var userfull_name = $('#userfull_name').val();
        var userusername = $('#username').val();
        var useremail = $('#useremail').val();
        var userpassword = $('#userpassword').val();
    var id = $('#userid').val();
        var usertype = $('#usertype').val();


        if(userfull_name!=''  && userusername!='' && useremail!='' && userpassword!=''){

            $.ajax({
                        url  : base_url+'admin/createuser',
                        type : 'POST',
                        data : { name:userfull_name ,uname: userusername, email: useremail,password: userpassword,userid:id,usertype:usertype},
                        success:function(response){
                            var res = JSON.parse(response);
                            if(res.response == "success"){
                hidemodal();
                 
                    swal( {
                        title:"Success",
                        text:res.message,
                        type:"success"
                    },function(){
                            window.location.reload();
                      });

                            }else if(res.response == "wait"){ 
                      swal( {
                          title:"Failed",
                          text:res.message,
                          type:"warning"
                      },function(){
                              // window.location.replace(base_url+'userlist');
                        });
                            }
                            else{ 
                      swal( {
                          title:"Failed",
                          text:res.message,
                          type:"error"
                      },function(){
                          //    window.location.replace(base_url+'userlist');
                        });
                            }
                        }
            });
        }
    }); 

});
function hidemodal(){

  $('#AddUser').hide();
}

jQuery(document).ready(function(){

    var userid = $('#userid').val();

    if(userid > 0){

            $.ajax({

                        url : base_url+'admin/getuserdetails/'+ userid,
                        success:function(response){

                            response = JSON.parse(response);
                            $('#userfull_name').val(response.first_name);
                            $('#username').val(response.user_name);
                            $('#useremail').val(response.email_id);
                            $('#userpassword').val(response.password);
                            $('#usertype option').each(function(){
                                if(this.value == response.type){ 
                                    $(this).attr('selected','selected');
                                }else{
                                    $(this).attr('selected',false);
                                }
                            });
                        }   
            });
    }

});

</script>


