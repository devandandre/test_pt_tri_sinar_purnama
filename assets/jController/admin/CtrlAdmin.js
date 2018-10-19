$("#FormAddAdmin").validate({
      errorClass:'error',
      ignore: ":hidden:not(select)",
      onclick: false,
      rules:{
          nama             : {required: true,minlength:5,maxlength:50},
          password         : {required: true,minlength:5,maxlength:30},
        },
      messages: {
          nama: {
                required: message_alert("nama harus diisi"),     
                minlength: message_alert("minimal nama 5"),   
                maxlength: message_alert("maximal nama 50"),                
          },    
          password: {
                required: message_alert("password harus diisi"),                
                minlength: message_alert("minimal password 5"),    
                maxlength: message_alert("maximal password 30"),             
          },               
      },
    
  }); 


function save_admin(){
  var FormAddAdmin = $('#FormAddAdmin');

  if($("#FormAddAdmin").valid()){
  $.ajax({
    type: 'POST',
    data: FormAddAdmin.serialize(),
    url: base_url+'madmin/save_admin',
      success: function(msg) {
        if(msg == 1){
            $.ambiance({message: "Sukses",
            type: "success",
            fade: false});
            top.location.href = base_url+'madmin/index';  
        }else{
            $.ambiance({message: "Gagal",
            type: "error",
            fade: false});
        }
      }
      });  
    }
  } 

function edit_name(){
  var FormAddAdmin = $('#FormAddAdmin');

  if($("#FormAddAdmin").valid()){
  $.ajax({
    type: 'POST',
    data: FormAddAdmin.serialize(),
    url: base_url+'madmin/edit_name',
      success: function(msg) {
        if(msg == 1){
            $.ambiance({message: "Sukses",
            type: "success",
            fade: false});
            top.location.href = base_url+'madmin/index';  
        }else{
            $.ambiance({message: "Gagal",
            type: "error",
            fade: false});
        }
      }
      });  
    }
  } 

function edit_password(){
  var FormAddAdmin = $('#FormAddAdmin');

  if($("#FormAddAdmin").valid()){
  $.ajax({
    type: 'POST',
    data: FormAddAdmin.serialize(),
    url: base_url+'madmin/edit_password_action',
      success: function(msg) {
        if(msg == 1){
            $.ambiance({message: "Sukses",
            type: "success",
            fade: false});
            top.location.href = base_url+'madmin/index';  
        }else{
            $.ambiance({message: "Gagal",
            type: "error",
            fade: false});
        }
      }
      });  
    }
  } 

function edit() {
  if($("#form_edit_admin").valid()){
      $.ajax({
    type: 'POST',
    data: $("#form_edit_admin").serialize(),
    url: base_url+'admin/edit',
    dataType  : 'json',
      success: function(response) {
        if(response.msg == "sukses"){
          top.location.href = base_url+'admin/index';
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