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


		if(userfull_name!=''  && userusername!='' && useremail!='' && userpassword!=''){

			$.ajax({
						url  : base_url+'admin/createuser',
						type : 'POST',
						data : { name:userfull_name ,uname: userusername, email: useremail,password: userpassword,userid:id},
						success:function(response){
							var res = JSON.parse(response);
							if(res.response == "success"){
                hidemodal();
                
								setTimeout(function(){ 
                                                                swal( {
                                                                    title:"Success",
                                                                    text:res.message,
                                                                    type:"success"
                                                                },function(){
                                                                        window.location.replace(base_url+'users');
                                                                  });
                                                            }, 1000);

							}else if(res.response == "wait"){
										setTimeout(function(){ 
                                                                swal( {
                                                                    title:"Failed",
                                                                    text:res.message,
                                                                    type:"warning"
                                                                },function(){
                                                                        // window.location.replace(base_url+'userlist');
                                                                  });
                                                            }, 1000);
							}
							else{
								setTimeout(function(){ 
                                                                swal( {
                                                                    title:"Failed",
                                                                    text:res.message,
                                                                    type:"error"
                                                                },function(){
                                                                    //    window.location.replace(base_url+'userlist');
                                                                  });
                                                            }, 1000);
							}
						}
			});
		}
	});	

});
function hidemodal(){

  $('#AddUser').hide();
}