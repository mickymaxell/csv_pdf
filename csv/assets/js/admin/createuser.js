jQuery(document).ready(function(){
	
	// $("form[name='adduserform']").validate({
	//     rules: {
	//       userfull_name: "required",
	//       username: "required",
	//       useremail: {
	//         required: true,
	//         email: true
	//       },
	//       userpassword: {
	//         required: true,
	//         minlength: 5
	//       }
	//     },
	//     messages: {
	//       userfull_name: "Please enter your name",
	//       username: "Please enter your username",
	//       userpassword: {
	//         required: "Please provide a password",
	//         minlength: "Your password must be at least 5 characters long"
	//       },
	//       useremail: "Please enter a valid email address"
	//     },
	//   });


	$.validate();
	$('#adduserform').submit(function(event){

		event.preventDefault();

		var userfull_name = $('#userfull_name').val();
		var userusername = $('#username').val();
		var useremail = $('#useremail').val();
		var id = $('#userid').val();
		var userpassword = "1";
		if(id == 0){
			 userpassword = $('#userpassword').val();
			if(userpassword == false){
				alert("Please Enter Password to Continue");
			}
		}
		if(userfull_name == false){
			alert("Please Enter Fullname to Continue");
		}

		if(userusername == false){
			alert("Please Enter Username to Continue");
		}

		if(useremail == false){
			alert("Please Enter Email id to Continue");
		}

		

		if(userfull_name!=''  && userusername!='' && useremail!='' && userpassword!=''){

			$.ajax({
						url  : base_url+'addusersave',
						type : 'POST',
						data : { name:userfull_name ,uname: userusername, email: useremail,password: userpassword,userid:id},
						success:function(response){
							var res = JSON.parse(response);
							if(res.response == "success"){
								setTimeout(function(){ 
                                                                swal( {
                                                                    title:"Success",
                                                                    text:res.message,
                                                                    type:"success"
                                                                },function(){
                                                                        window.location.replace(base_url+'userlist');
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