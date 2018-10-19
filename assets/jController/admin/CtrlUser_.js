$("#form_add_user").validate({
      errorClass:'error',
      ignore: ":hidden:not(select)",
      onclick: false,
      rules:{
          desc             : {required: true},
          email             : {email: true},
      },
      messages: {
          desc: {
                required: message_alert("Description harus diisi"),                
          },    
          email: {
                required: message_alert("Email tidak valid"),                
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
            //top.location.href = base_url+'jookir/index';            
          }else{
            $.ambiance({message: "Password tidak Cocok",
            type: "error",
            fade: false});

          }
        }
      });  
}

$("#form_change_password").validate({
      errorClass:'error',
      ignore: ":hidden:not(select)",
      onclick: false,
      rules:{
          old_password              : {required: true, remote:base_url+'account/cek_password'},
          new_password              : {required: true, minlength: 5},
          new_password_again        : {required: true, ,equalTo:'#new_password', minlength: 5},
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
        top.location.href = base_url+'jookir/index';            
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
function simpan() {
  if($("#form_add_user").valid()){
      $.ajax({
    type: 'POST',
    data: $("#form_add_user").serialize(),
    url: base_url+'ms_user/add',
    dataType  : 'json',
      success: function(response) {
        if(response.msg == "sukses"){
          top.location.href = base_url+'ms_user/index';
        }else{
            $.notify({
                    icon: 'pe-7s-gift',
                    message: 'Gagal Menyimpan'          
                 },{
                     type: 'error',
                     timer: 4000
                 });
        }
      }
      });
  }else{
    return;
  }
    
}



function simpan_baru() {
  if($("#form_add_user").valid()){
    $.ajax({
    type: 'POST',
    data: $("#form_add_user").serialize(),
    url: base_url+'ms_user/add',
    dataType  : 'json',
      success: function(response) {
        if(response.msg == "sukses"){
           $.notify({
                    icon: 'pe-7s-gift',
                    message: 'Data Berhasil disimpan'          
                 },{
                     type: 'success',
                     timer: 4000
                 });
          $("#form_add_user")[0].reset();
        }else{
            $.notify({
                    icon: 'pe-7s-gift',
                    message: 'Gagal Menyimpan'          
                 },{
                     type: 'error',
                     timer: 4000
                 });
        }
      }
      });
  }else{
    return;
  }
}


function edit() {
  if($("#form_add_user").valid()){
      $.ajax({
    type: 'POST',
    data: $("#form_add_user").serialize(),
    url: base_url+'ms_user/edit',
    dataType  : 'json',
      success: function(response) {
        if(response.msg == "sukses"){
          top.location.href = base_url+'ms_user/index';
        }else{
            $.notify({
                    icon: 'pe-7s-gift',
                    message: 'Gagal Update'          
                 },{
                     type: 'error',
                     timer: 4000
                 });
        }
      }
      });
  }else{
    return;
  }
    
}

function print_barcode(id){
  
  var url = '';
        url = base_url+'ms_user/print_barcode/'+id;
        //alert(url);
          
         window.open(url,'_blank','location=no,height=1280,width=760,scrollbars=yes,status=no');
}

function hapus_barcode(id,url) {
  $(".delete-cancel").show(); 
  $(".body-delete > p").html("Apakah anda yakin untuk menghapus barcode ini ?");
  $(".delete-ok").show().attr("onclick","delete_barcode('"+id+"','"+url+"')");
}

function delete_barcode(id,url){
    $.ajax({
      type: 'POST',
      data: "id="+id,
      url: base_url+'ms_user/hapus_barcode',
      dataType  : 'json',
      success: function(response) {
        if(response.msg == 'sukses'){
          top.location.href = base_url+'ms_user/qrcodelist/'+url;
        }else{
          $.notify({
                    icon: 'pe-7s-gift',
                    message: 'Gagal hapus QRCode'          
                 },{
                     type: 'error',
                     timer: 4000
                 });
        }        
      }
    });
}
 


  function generate(){
    var values =   $('input:checkbox:checked.checkboxDelete').map(function (){
        return this.value;
    }).get();

    if(values == ""){       
       $.notify({
          icon: 'pe-7s-gift',
          message: 'Belum ada gate yang dipilih'          
       },{
           type: 'info',
           timer: 4000
       });

    }else{
       var id_user = $("#id_user").val();
    //alert(values);
    $.ajax({
    type: 'POST',
    data: "delete="+values+"&id_user="+id_user,
    url: base_url+'ms_user/generate',
    dataType  : 'json',
      success: function(response) {
        if(response.msg == "sukses"){
          top.location.href = base_url+'ms_user/qrcodelist/'+response.id_user;
        }else{
            $.notify({
                    icon: 'pe-7s-gift',
                    message: 'Gagal membuat QRCode'          
                 },{
                     type: 'error',
                     timer: 4000
                 });
        }
      }
      });      
    }

   

  }