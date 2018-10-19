$("#form_change_password").validate({
      errorClass:'error',
      ignore: ":hidden:not(select)",
      onclick: false,
      rules:{
          old_password              : {required: true, remote:base_url+'account/cek_passwords'},
          new_password              : {required: true, minlength: 5},
          new_password_again        : {required: true, equalTo:'#new_password', minlength: 5},
      },
      messages: {
          old_password: {
                required: message_alert("Password Lama harus diisi"),  
                remote: message_alert("Password lama tidak cocok"),              
          },    
          new_password: {
                required: message_alert("Password harus diisi"), 
                minlength:  message_alert("Password minimal 5 karakter"),               
          }, 
          new_password_again: {
                required: message_alert("Password harus diisi"), 
                minlength:  message_alert("Password minimal 5 karakter"),  
                equalTo : message_alert("Password tidak sama"),             
          },             
      },
    
  }); 

function cek_password(){
  var old_password = $('#old_password').val();
      $.ajax({
        type: 'POST',
        data: 'old_password='+old_password,
        url: base_url+'account/cek_passwords',
        success: function(msg) {
          if (msg == 1) { 
            $.ambiance({message: "Password Match",
            type: "success",
            fade: false});
            $("#btn_save").removeAttr('disabled');       
          }else{
            $.ambiance({message: "Password tidak Cocok",
            type: "error",
            fade: false});
            $("#btn_save").prop("disabled", true);  

          }
        }
      });  
}

function hapus_data(id){
      $.ajax({
        type: 'POST',
        data: 'id='+id,
        url: base_url+'account/hapus_data',
        success: function(msg) {
          if (msg == 1) { 
            $.ambiance({message: "Sukses",
            type: "success",
            fade: false});
            location.reload(); 
          }else
            $.ambiance({message: "Gagal",
            type: "error",
            fade: false});

          }
        }
      });    
}

function edit_password(){
  var form_change_password = $('#form_change_password');
  if (form_change_password.valid()){

    $.ajax({
    type: 'POST',
    data: form_change_password.serialize(),
    url: base_url+'account/edit_password',
    type: 'POST',
      success: function(msg) {
      if(msg == 1){
        $.ambiance({message: "Sukses",
        type: "success",
        fade: false});
        top.location.href = base_url+'index';            
      }else{
                $.ambiance({message: "Gagal",
                type: "error",
                fade: false});


      }
    }
      });
  }else{
    return;
  }
}