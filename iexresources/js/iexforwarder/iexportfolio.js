(function($){

$(document).on('ready',function(event){
	var $table = $('#test_datatable').dataTable({
		"processing": true,
        "serverSide": true,
        "ajax": "http://localhost/iexforwarder/iexportfolio/company"
        /*"columns": [
            { "data": "id_company" },
            { "data": "irs" },
            { "data": "name" }
        ]*/
	});
	
	$('#test_datatable tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
});

})($);