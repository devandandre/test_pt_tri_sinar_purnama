function save_sekolah(id_kecamatan){
	var FormMenu = $('#FormMenu');
      $.ajax({
        type: 'POST',
        data: FormMenu.serialize() + '&id_kecamatan='+id_kecamatan,
        url: base_url+'sekolah/save_sekolah',
            success: function(msg) {
          if(msg == 1){
            $.ambiance({message: "Sukses",
            type: "success",
            fade: false});
            top.location.href = base_url+'sekolah';            
          }else{
                    $.ambiance({message: "Gagal",
                    type: "error",
                    fade: false});


          }
        }
      });

}