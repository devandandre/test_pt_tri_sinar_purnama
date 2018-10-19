$("#FormLogin").validate({
      errorClass:'error',
      ignore: ":hidden:not(select)",
      onclick: false,
      rules:{
          username                    : {required: true, minlength:5},
          password                    : {required: true, minlength:5},        
      },
      messages: {
          username: {
                required: message_alert("Username harus diisi"),
                minlength: message_alert("Username minimal 5 Karakter"),

          },
          password: {
                required: message_alert("Password Harus diisi"),
                minlength: message_alert("Password minimal 5 Karakter"),
              },
         
      },
    
  });


(function($){
  $(function(){

   /* $( "#next_sign" ).click(function() {
      $( ".box-password" ).slideToggle("slow");
      $( ".box-username" ).hide("slow");
    });*/

    

   

  }); // end of document ready
})(jQuery);

function loginn(e){
   if (e.which == 13) {
    login();
  }
}

	function login(){
			var FormLogin = $('#FormLogin');
			var username = $('#username').val();
			var password = $('#password').val();			
		if (FormLogin.valid()){
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
	}


	