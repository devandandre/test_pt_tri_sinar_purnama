function klik_peta(id){
	$.ajax({
	type: 'POST',
	data: 'id='+id,
	url: base_url+'peta/klik_peta',
		success: function(msg) {
				$('#data_sekolahssss').html(msg);
			}
	});
}