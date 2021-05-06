jQuery(document).ready(function(){

	var userid = $('#userid').val();

	$('#deleteuser').click(function(){

		$.ajax({
					url : base_url+'deleteuser/'+userid,
					success:function(response){

						response = JSON.parse(response);
						if(response.response == "success"){
								setTimeout(function(){ 
                                                                swal( {
                                                                    title:"Success",
                                                                    text:res.message,
                                                                    type:"success"
                                                                },function(){
                                                                        window.location.replace(base_url+'userlist');
                                                                  });
                                                            }, 1000);
						}else{
								setTimeout(function(){ 
                                                                swal( {
                                                                    title:"Failed",
                                                                    text:res.message,
                                                                    type:"error"
                                                                },function(){
                                                                        window.location.replace(base_url+'userlist');
                                                                  });
                                                            }, 1000);
						}
					}
		});

	});

});	