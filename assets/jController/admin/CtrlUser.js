

function fokus_nama(){
  $('#nama_parkir').focus();
}

$("#FormMenu").validate({
      errorClass:'error',
      ignore: ":hidden:not(select)",
      onclick: false,
      rules:{
          nama_menu                        : {required: true, minlength:5, maxlength:50},
          // email                       : {required: true, email: true},
          // phone                       : {required: true, minlength:5, maxlength:50},
         // password                          : {required: true, minlength:5, maxlength:50},
          // nama_rek                    : {required: true, minlength:5, maxlength:50},
          // no_pemilik_rek              : {required: true, minlength:5, maxlength:50},          
      },
      messages: {
          nama_menu: {
                required: message_alert("Nama Menu harus diisi"),
                minlength: message_alert("Nama Menu minimal 5 Karakter"),
                maxlength: message_alert("Nama Menu maksimal 50 Karakter"),

          },
          // email: {
          //       required: message_alert("Email Jookir harus diisi"),
          //       email : message_alert("Email tidak valid"),

          //     }, 
          // phone: {
          //       required: message_alert("Phone harus diisi"),
          //       minlength: message_alert("Phone minimal 5 Digit"),
          //       maxlength: message_alert("Phone maksimal 50 Digit"),
          //     }, 
          // password: {
          //       required: message_alert("Password Harus diisi"),
          //       minlength: message_alert("Password minimal 5 Karakter"),
          //       maxlength: message_alert("Password maksimal 50 Karakter"),
          //     },
          // nama_rek : {
          //       required: message_alert("Nama pemilik rekening harus diisi "),
          //       minlength: message_alert("Nama pemilik rekening minimal 5 Karakter"),
          //       maxlength: message_alert("Nama pemilik rekening maksimal 50 Karakter"),
          // },
          // no_pemilik_rek : {
          //       required: message_alert("Nomor rekening harus diisi "),
          //       minlength: message_alert("Nomor rekening  minimal 5 Karakter"),
          //       maxlength: message_alert("Nomor rekening  maksimal 50 Karakter"),
          // },
         
      },
    
  });

	function save_user(){
		var Formuser = $('#Formuser');

      if (Formuser.valid()){
			$.ajax({
				type: 'POST',
				data: Formuser.serialize(),
				url: base_url+'user/save_user',
       			success: function(msg) {
					if(msg == 1){
						$.ambiance({message: "Sukses",
            type: "success",
            fade: false});
					  top.location.href = base_url+'user';						
					}else{
		                $.ambiance({message: "Gagal",
		                type: "error",
		                fade: false});


					}
				}
			});
    }
	}


