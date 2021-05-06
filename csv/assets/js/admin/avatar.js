jQuery(document).ready(function(){

	var avatar = document.getElementById('avatarfile');
	var fileName, fileExtension, fileSize, fileType, dateModified;

	$('#adminavatarform').submit(function(event){

		event.preventDefault();

		var formData = new FormData(this);

		if(avatar.files.length>0  || avatar.files.length<2){

			for (var i = 0; i <= avatar.files.length - 1; i++) {

				fileName = avatar.files.item(i).name;
                fileExtension = fileName.replace(/^.*\./, '');

                if(fileExtension == 'jpg' || fileExtension == 'png' || fileExtension == 'jpeg' ){

                		const fsize = avatar.files.item(i).size;
                		const file = Math.round((fsize / 1024));

		                if (file >= 1024) {

		                    document.getElementById('avatarfile').value = "";
		                    alert("Please select image less than 1 Mb");

		                }else{
		                		$.ajax({
		                					url	 : base_url+'avatarchange',
		                					type : 'POST',
		                					data : formData,
		                					contentType: false,
									    cache: false,
									    processData:false,
		                					// data : {avatarextension : fileExtension},
		                					success:function(response){

		                						var res = JSON.parse(response);
		                						if(res.response ==  "success"){
		                							alert(res.message);
		                						}else{
		                							alert(res.message);
		                						}
		                					} 

		                		});
		                }
                
                }else{

                	alert("Sorry only jpg,png,jpeg & jfif formats are allowed");

                }

			}
		}else{
				alert("Select only 1 file");
		}

	});

});