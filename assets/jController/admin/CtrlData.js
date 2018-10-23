	function save_pelaporan(){
		var dataAdd = $('#dataAdd');			
			$.ajax({
				type: 'POST',
				data: dataAdd.serialize(),
				url: base_url+'admin/data/save_pelaporan',
       			success: function(msg) {
					if(msg == 1){
						$.ambiance({message: "Sukses",
		                type: "success",
		                fade: false});
						top.location.href = base_url+'admin/data/data_pelaporan';						
					}else{
		                $.ambiance({message: "Gagal",
		                type: "error",
		                fade: false});

					}
				}
		});
	}	