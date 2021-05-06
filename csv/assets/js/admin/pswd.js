
jQuery(document).ready(function(){

	$('#adminpswform').submit(function(event){

		event.preventDefault();

		var oldpswd = $('#old_password').val();
		var newpswd = $('#new_password').val();
		var confpswd = $('#confirm_password').val();

		if(oldpswd == false){
			alert("Please Enter Old Password");
		}

		if(newpswd == false){
			alert("Please enter new Password");
		}

		if(confpswd == false){
			alert("Please Confirm Password");
		}

		if(newpswd!=confpswd){
			alert("Passwords should be matching");
			$('#new_password').val('');
			$('#confirm_password').val('');
		}

		if(currentpsw!=oldpswd){
			alert("Please enter the current Password in Password field");
			$('#old_password').val('');
		}

		if((oldpswd != false) && (newpswd != false) && (confpswd != false) && (currentpsw==oldpswd) && (newpswd == confpswd)){

			$.ajax({
						url	 : base_url+'changepsw',
						type : 'POST',
						data : {Password:newpswd},
						success:function(response){

							var res = JSON.parse(response);
							if(res.response == 'success'){
								alert(res.message);
								window.location = base_url+'dashboard';
							}else{
								alert(res.message);
							}
						}
			});
		}

	});

});