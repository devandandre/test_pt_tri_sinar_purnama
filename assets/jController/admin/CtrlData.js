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

	function  proses_data(id){
		var tanggal_perbaikan = $('#tanggal_perbaikan').val();
		var handel = $('#handel').val();
		var status = $('#status').val();
			$.ajax({
				type: 'POST',
				data: 'id='+id+'&tanggal_perbaikan='+tanggal_perbaikan+'&handel='+handel+'&status='+status,
				url: base_url+'admin/data/proses_data',
       			success: function(msg) {
						$.ambiance({message: "Sukses",
		                type: "success",
		                fade: false});
						top.location.href = base_url+'admin/data/data_pelaporan';						
				}
		});

	}	