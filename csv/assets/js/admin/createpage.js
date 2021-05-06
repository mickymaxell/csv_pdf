
jQuery(document).ready(function(){
	alert(1);
	$('#addpageform').submit(function(event){
		
		event.preventDefault();

		var pagtitle = $('#pagetitle').val();
		var pagslug  = $('#pageslug').val();
		var pagcont  = tinymce.get("pagecontent").getContent();
		// var pagimg   = document.getElementById('imagefile');
		var pagimgName,pagimgExtension;

		if(pagtitle == ''){
			alert("Please Enter page title");
		}

		if(pagslug == ''){
			alert("Please Enter a unique name for page");
		}

		if(pagtitle!='' && pagslug!=''){

			// if(pagimg.files.length>0  || pagimg.files.length<2){
			// 	for (var i = 0; i <= pagimg.files.length - 1; i++) {

			// 		pagimgName = pagimg.files.item(i).name;
	  //               pagimgExtension = pagimgName.replace(/^.*\./, '');

	  //               if(logoExtension == 'jpg' || logoExtension == 'png' || logoExtension == 'jpeg' ){

	  //               		const lsize = pagimg.files.item(i).size;
	  //               		const lfile = Math.round((lsize / 1024));

			//                 if (lfile >= 1024) {

			//                     document.getElementById('pagimg').value = "";
			//                     alert("Please select image less than 3 Mb");
			//                     $('#pagecrtbtn').prop("disabled",true);
			//                 }
			//         }
			//     }
		 //    } 

		    $.ajax({
		    			url : base_url+'admin/savepage',
		    			type: 'POST',
		    			data: { title:pagtitle,slug:pagslug,content:pagcont },
		    // 			contentType: false,
						// cache: false,
						// processData:false,
		    			success:function(response){

		    				response = JSON.parse(response);
		    				if(response.response == "success"){
		    					alert(response.message);
		    				}else if(response.response == "error"){
		    					alert(response.message);
		    				}else{
		    					alert(response.message);
		    				}
		    			}
		    });           
		}
		
	});

});