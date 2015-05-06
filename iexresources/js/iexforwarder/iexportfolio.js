(function($){

$(document).on('ready',function(event){
alert("sadfas");
	var $table = $('#test_datatable').dataTable();
	
	$('#test_datatable tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
});

})($);