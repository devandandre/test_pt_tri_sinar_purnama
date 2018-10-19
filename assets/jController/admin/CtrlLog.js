$('.datepicker').datepicker({
        changeMonth: true,
        changeYear: true,
        minDate: new Date(-2206281600*1000),
        maxDate: new Date(1298653687*1000),
        yearRange: '1900:2011'
});

function filter_tanggal(){
	var start = $("#start").val();
	var finish = $("#finish").val();
	if(start == ""){
	  var date = "";
	}else{
	  var date = $.datepicker.formatDate( "d M yy",new Date(start));
	}			  
	$('#start').val(date);

	if(finish == ""){
	  var date = "";
	}else{
	  var date = $.datepicker.formatDate( "d M yy",new Date(finish));
	}			  
	$('#finish').val(date);
	$.ajax({
		type	 : 'POST',
		data 	 : 'start='+start+'&finish='+finish,
		url		 : base_url+'log/filter_tanggal',		
		success: function(msg) {
            $('#div-paging').html(msg);

		}
	})
}