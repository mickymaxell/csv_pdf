jQuery(document).ready(function(){
	

	$('#adminloginform').submit(function(e){

		e.preventDefault();

		var uname = $('#adminuname').val();
		var upswd = $('#adminpasw').val();

		if(uname == false || upswd == false){

			alert("Please enter the login credentials");
		}else{

			$.ajax({
					url  : base_url+'loginaction',
					type : 'POST',
					data : { email:uname,password:upswd},
					success:function(response){
						var resp = JSON.parse(response);
						if(resp.response == 'Login Failed'){
							alert(resp.message)
						}else{
							window.location = base_url+'dashboard';
						}
					}
			});
		}

	});

});