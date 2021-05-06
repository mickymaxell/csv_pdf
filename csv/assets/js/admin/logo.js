jQuery(document).ready(function(){

	var logoimage = document.getElementById('logoimage');
	var logoName, logoExtension, logoSize, logoType, logoModified;

	$('#logoform').submit(function(event){
		
		event.preventDefault();
		if(logoimage.files.length>0  || logoimage.files.length<2){
			for (var i = 0; i <= logoimage.files.length - 1; i++) {

				logoName = logoimage.files.item(i).name;
                logoExtension = logoName.replace(/^.*\./, '');

                if(logoExtension == 'jpg' || logoExtension == 'png' || logoExtension == 'jpeg' ){

                		const lsize = logoimage.files.item(i).size;
                		const lfile = Math.round((lsize / 1024));

		                if (lfile >= 1024) {

		                    document.getElementById('logoimage').value = "";
		                    alert("Please select image less than 1 Mb");

		                }else{
		                		alert(base_url);
		                		$.ajax({
		                				url : base_url+'admin/savelogoimage',
		                				type: 'POST',
		                				data: new FormData(this),
		                				contentType: false,
									    cache: false,
									    processData:false,
		                				success:function(response){

		                					response = JSON.parse(response);
		                					if(response.response == "success"){
		                						alert(response.message);	
		                					}else{
		                							alert(response.message);
		                					}
		                				}
		                		});
		                }
                }else{
                		alert("Invalid Format");
                }
            }    

		}else{
				alert("Please select only one image");
		}

	});

});	