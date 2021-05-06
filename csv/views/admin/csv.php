<div class="content-wrapper">
		
	<div class="content">
		<div class="container">
			<div class="row ">
				<form method='post' class="mt-5"  enctype='multipart/form-data' id="csv_import_form">
					<div class="form-group">
						<div class="custom-file">
							<label class="custom-file-label" for="customFile">Choose File</label>
							<input type="file" class="custom-file-input form-control" name="customFile" id="customFile" >
						</div>
					</div>
					<div class="form-group">
						<input type="submit" name="bulkimport" id="bulkimport" class="btn btn-info" value="IMPORT CSV  FILE">
					</div>
				</form>
			</div>
			<!-- <div class="row mt-5">
				<table width='100%' border='1' style='border-collapse: collapse;'>
				   <thead>
				   <tr>
				     <th>S.no</th>
				     <th>Field1</th>
				     <th>Field2</th>
				     <th>Field3</th>
				     <th>Field4</th>
				     <th>Field5</th>
				   </tr>
				   </thead>
				   <tbody>
				   </tbody>
				 </table>  	
			</div> -->
		</div>
	</div>
                      
</div>

<script >
	$(function () {
	  bsCustomFileInput.init();
	});

var match = ['application/csv','application/CSV'];
    $("#customFile").change(function() {
    	var fileExtension = ['csv'];
        
        for(i=0;i<this.files.length;i++){
            var file = this.files[i];
            var fileType = file.type;
          	  
            if(i<1){
	            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
		            alert('Sorry, only CSV files are allowed to upload.');
	                $("#customFile").val('');
	                $('#bulkimport').prop('disabled','disabled');
	                return false;
		        }else{

	                $('#bulkimport').prop('disabled',false);
	            }
	        }else{
	            $('#bulkimport').prop('disabled','disabled');
	        	alert('only 1 file allowed');
	        }    
        }
    });

$('#csv_import_form').submit(function(event){

	event.preventDefault();


		$.ajax({
            type: 'POST',
            url: base_url+'admin/uploadmediafiles',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('#bulkimport').attr("disabled","disabled");
                $('#csv_import_form').css("opacity",".5");
            },
            success:function(response){

				// var response = JSON.parse(res);
				if(response.response == "success"){
                    swal( {
                        title:"Success",
                        text:response.message,
                        type:"success"
                    },function(){
                            window.location.reload();
                      });
				}else{
                    swal( {
                        title:"Failed",
                        text:response.message,
                        type:"error"
                    },function(){
                            window.location.reload();
                      });
                }
                $('#csv_import_form').css("opacity","");
                $("#bulkimport").removeAttr("disabled");
            }
        });
});

	

</script>
   