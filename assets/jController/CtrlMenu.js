function klik_profil(){
	$('#menu_utama').hide();
	$('#profil').show();
}

function kembali_s(halaman){
	$('#menu_utama').show();
	$('#'+halaman).hide();
}

function kembali_dinamis(page1,page2){
	$('#'+page1).show();
	$('#'+page2).hide();	
}

function klik_menu_d(id){
	$('#sub_menu').show();
	$.ajax({
	type: 'POST',
	data: 'id='+id,
	url: base_url+'index/klik_menu_d',
		success: function(msg) {
				$('#menu_utama').hide();
				$('#sub_menu').html(msg);
			}
	});
}

function klik_sub_menu_d(id){
	$('#sub_sub_menu').show();
	$.ajax({
	type: 'POST',
	data: 'id='+id,
	url: base_url+'index/klik_sub_menu_d',
		success: function(msg) {
				$('#sub_menu').hide();
				$('#sub_sub_menu').html(msg);
			}
	});
}

function klik_sub_sub_menu_d(id){
	$('#sub_sub_sub_menu').show();
	$.ajax({
	type: 'POST',
	data: 'id='+id,
	url: base_url+'index/klik_sub_sub_menu_d',
		success: function(msg) {
				$('#sub_sub_menu').hide();
				$('#sub_sub_sub_menu').html(msg);
			}
	});
}

function klik_sub_sub_sub_menu_d(id){
	$('#sub_sub_sub_sub_menu').show();
	$.ajax({
	type: 'POST',
	data: 'id='+id,
	url: base_url+'index/klik_sub_sub_sub_menu_d',
		success: function(msg) {
				$('#sub_sub_sub_menu').hide();
				$('#sub_sub_sub_sub_menu').html(msg);
			}
	});
}


function klik_sub_sub_menu_d(id){
	$('#sub_sub_sub_menu').show();
	$.ajax({
	type: 'POST',
	data: 'id='+id,
	url: base_url+'index/klik_sub_sub_menu_d',
		success: function(msg) {
				$('#sub_sub_menu').hide();
				$('#sub_sub_sub_menu').html(msg);
			}
	});
}