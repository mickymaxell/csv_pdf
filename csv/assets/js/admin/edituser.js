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
						}	
			});
	}

});