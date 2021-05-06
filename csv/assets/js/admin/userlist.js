jQuery(document).ready(function(){

	var table = $('#userstable').DataTable({

	"processing": true,
        "serverSide": true,

        "sScrollX": '100%',
        'dom': "<'row'<'col-sm-6'l><'col-sm-2  text-right 'B><'col-sm-4 pull-right'f >>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "buttons": [
              
            ]        ,

        "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
                "order": [],
        }],

        "ajax": {
        			"url" : base_url+"admin/userlist",
        			"type":"POST",
        			"data":function(data){
        					
        			}
        }        

	});

});