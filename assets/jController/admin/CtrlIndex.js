function login(){
		var FormLogin = $('#FormLogin');
		var username = $('#username').val();
		var password = $('#password').val();			
			$.ajax({
				type: 'POST',
				data: 'username='+username+'&password='+password,
				url: base_url+'index/signin',
       			success: function(msg) {
					if(msg == 1){
						$.ambiance({message: "Sukses",
		                type: "success",
		                fade: false});
						top.location.href = base_url+'index/dashboard';						
					}else{
		                $.ambiance({message: "Gagal, Periksa Form Anda",
		                type: "error",
		                fade: false});

					}
				}
			});
		}