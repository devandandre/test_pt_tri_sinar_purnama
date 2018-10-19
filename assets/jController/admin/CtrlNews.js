$('.datepicker').datepicker();

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

	function save_news(flag){
		var FormNews = $('#FormNews');
    var image_high_1 = $('#image_high_1').val();
    var image_tumb_1 = $('#image_tumb_1').val();
    var gambar_default_1 = $('#gambar_default_1').val();
    var soal = CKEDITOR.instances.soal.getData();
      if (FormNews.valid()){
			$.ajax({
				type: 'POST',
				data: FormNews.serialize() + '&image_high_1='+image_high_1 + '&image_tumb_1='+image_tumb_1 + '&gambar_default_1='+gambar_default_1+ '&soal='+soal+ '&flag='+flag,
				url: base_url+'news/save_news',
       			success: function(msg) {
					if(msg == 1){
						$.ambiance({message: "Sukses",
            type: "success",
            fade: false});
					  top.location.href = base_url+'news/index/'+flag;						
					}else{
		                $.ambiance({message: "Gagal",
		                type: "error",
		                fade: false});


					}
				}
			});
    }
	}

  function edit_news(id,flag){
    var FormNews = $('#FormNews');
    var image_high_1 = $('#image_high_1').val();
    var image_tumb_1 = $('#image_tumb_1').val();
    var gambar_default_1 = $('#gambar_default_1').val();
    var soal = CKEDITOR.instances.soal.getData();
      if (FormNews.valid()){
      $.ajax({
        type: 'POST',
        data: FormNews.serialize() + '&id='+id+'&image_high_1='+image_high_1 + '&image_tumb_1='+image_tumb_1 + '&gambar_default_1='+gambar_default_1+ '&soal='+soal+ '&flag='+flag,
        url: base_url+'news/edit_news',
            success: function(msg) {
          if(msg == 1){
            $.ambiance({message: "Sukses",
            type: "success",
            fade: false});
            top.location.href = base_url+'news/index/'+flag;            
          }else{
                    $.ambiance({message: "Gagal",
                    type: "error",
                    fade: false});


          }
        }
      });
    }
  }

  function save_gantangan(){
    var FormNews = $('#FormNews');
      $.ajax({
        type: 'POST',
        data: FormNews.serialize(),
        url: base_url+'news/save_gantangan',
            success: function(msg) {
          if(msg == 1){
            $.ambiance({message: "Sukses",
            type: "success",
            fade: false});
            top.location.href = base_url+'news/gantangan';            
          }else{
                    $.ambiance({message: "Gagal",
                    type: "error",
                    fade: false});


          }
        }
      });   
  }


  function click_picture(file) {
   $('#'+file).click();
  }

  function click_picture_edit(file) {
    $('input[name="'+file+'"]').each(function () {
    /*
        $(this).rules("add", {
            accept: 'image/*',filesize: 1000000,
            messages: {
                filesize: message_alert(lang.notif('wj20')),  
            },
        });
     */
    });
     $('#'+file).click();
  }
function picture_upload(id,image_high,image_tumb,id_item){

   var URL     = window.URL || window.webkitURL;
   var input   = document.querySelector('#'+id);
   var preview = document.querySelector('#img_'+id);
   var img     = $(input).val();
   //alert(preview);
   $("#rotate_"+id).val('0');
    $('#img_'+id).animate({  transform: 0}, {
      step: function(now,rotate) {        
          $(this).css({
              '-webkit-transform':'rotate('+now+'deg)', 
              '-moz-transform':'rotate('+now+'deg)',
              'transform':'rotate('+now+'deg)'              
          });
      }
      });

    switch(img.substring(img.lastIndexOf('.') + 1).toLowerCase()){
        case 'jpg': case 'png':
        var dataURL = "data:image/png,"+encodeURIComponent(window.btoa(input.files[0]) );
      //  alert(URL.createObjectURL(input.files[0]));
       var fileURL = URL.createObjectURL(input.files[0]);
            preview.src = fileURL;
            //preview.src = dataURL;
  
            $('#rem_'+id).show();            
            $("#gambar_default_"+id_item+"").val('0');
            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var canvas        = document.createElement("canvas");
                    var ctx           = canvas.getContext("2d");

                    img = new Image();
                    img.onload=function(){
                          var MAX_WIDTH = 800;
                          var MAX_HEIGHT = 800;
                          var width = img.width;
                          var height = img.height;
                  
                          if (width > height) {
                            if (width > MAX_WIDTH) {
                              height *= MAX_WIDTH / width;
                              width = MAX_WIDTH;
                            }
                          } else {
                            if (height > MAX_HEIGHT) {
                              width *= MAX_HEIGHT / height;
                              height = MAX_HEIGHT;
                            }
                          }
                          canvas.width = width;
                          canvas.height = height;
                          var ctx = canvas.getContext("2d");
                          ctx.drawImage(img, 0, 0, width, height);
                          
                          image_high.value = canvas.toDataURL('image/png');
                          
                    }
                    img.src = e.target.result;
                    
                    img = new Image();
                    img.onload=function(){
                          var MAX_WIDTH = 300;
                          var MAX_HEIGHT = 300;
                          var width = img.width;
                          var height = img.height;
                  
                          if (width > height) {
                            if (width > MAX_WIDTH) {
                              height *= MAX_WIDTH / width;
                              width = MAX_WIDTH;
                            }
                          } else {
                            if (height > MAX_HEIGHT) {
                              width *= MAX_HEIGHT / height;
                              height = MAX_HEIGHT;
                            }
                          }
                          canvas.width = width;
                          canvas.height = height;
                          var ctx = canvas.getContext("2d");
                          ctx.drawImage(img, 0, 0, width, height);
                          
                          image_tumb.value = canvas.toDataURL('image/png');
                    }
                    img.src = e.target.result;
                    
                    input.files[0] = null;
                    input.value = "";
                }
                reader.readAsDataURL(input.files[0]);
            }
            
            break;
        default:
            $(input).val('');
            // error message here
            $.ambiance({message: 'Silahkan masukkan format JPG/PNG',
            type: "error",
            fade: false});
            break;
    }
}

function picture_upload_edit(id,image_high,image_tumb,id_item){

   var URL     = window.URL || window.webkitURL;
   var input   = document.querySelector('#'+id);
   var preview = document.querySelector('#img_'+id);
   var img     = $(input).val();
  // alert(preview);

    $('#img_'+id).animate({  transform: 0}, {
      step: function(now,rotate) {        
          $(this).css({
              '-webkit-transform':'rotate('+now+'deg)', 
              '-moz-transform':'rotate('+now+'deg)',
              'transform':'rotate('+now+'deg)'              
          });
      }
      });

    switch(img.substring(img.lastIndexOf('.') + 1).toLowerCase()){
        case 'jpg': case 'png':
        var dataURL = "data:image/png,"+encodeURIComponent(window.btoa(input.files[0]) );
      //alert(URL.createObjectURL(input.files[0]));
         var fileURL = URL.createObjectURL(input.files[0]);
            preview.src = fileURL;
  
            $('#rem_'+id).show();            
             //$("#gambar_default_edit"+id_item+"").val('0');
             $("#gambar_default"+id_item).val('0');
            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var canvas        = document.createElement("canvas");
                    var ctx           = canvas.getContext("2d");

                    img = new Image();
                    img.onload=function(){
                          var MAX_WIDTH = 800;
                          var MAX_HEIGHT = 800;
                          var width = img.width;
                          var height = img.height;
                  
                          if (width > height) {
                            if (width > MAX_WIDTH) {
                              height *= MAX_WIDTH / width;
                              width = MAX_WIDTH;
                            }
                          } else {
                            if (height > MAX_HEIGHT) {
                              width *= MAX_HEIGHT / height;
                              height = MAX_HEIGHT;
                            }
                          }
                          canvas.width = width;
                          canvas.height = height;
                          var ctx = canvas.getContext("2d");
                          ctx.drawImage(img, 0, 0, width, height);
                          
                          image_high.value = canvas.toDataURL('image/png');
                          
                    }
                    img.src = e.target.result;
                    
                    img = new Image();
                    img.onload=function(){
                          var MAX_WIDTH = 300;
                          var MAX_HEIGHT = 300;
                          var width = img.width;
                          var height = img.height;
                  
                          if (width > height) {
                            if (width > MAX_WIDTH) {
                              height *= MAX_WIDTH / width;
                              width = MAX_WIDTH;
                            }
                          } else {
                            if (height > MAX_HEIGHT) {
                              width *= MAX_HEIGHT / height;
                              height = MAX_HEIGHT;
                            }
                          }
                          canvas.width = width;
                          canvas.height = height;
                          var ctx = canvas.getContext("2d");
                          ctx.drawImage(img, 0, 0, width, height);
                          
                          image_tumb.value = canvas.toDataURL('image/png');
                    }
                    img.src = e.target.result;
                    
                    input.files[0] = null;
                    input.value = "";
                }
                reader.readAsDataURL(input.files[0]);
            }
            
            break;
        default:
            $(input).val('');
            // error message here
            Materialize.toast('Silahkan masukkan format JPG/PNG', 4000);
            break;
    }
}

function picture_upload_parking_edit(id,image_high,image_tumb,id_item){

   var URL     = window.URL || window.webkitURL;
   var input   = document.querySelector('#'+id);
   var preview = document.querySelector('#img_'+id);
   var img     = $(input).val();
  // alert(preview);

    $('#img_'+id).animate({  transform: 0}, {
      step: function(now,rotate) {        
          $(this).css({
              '-webkit-transform':'rotate('+now+'deg)', 
              '-moz-transform':'rotate('+now+'deg)',
              'transform':'rotate('+now+'deg)'              
          });
      }
      });

    switch(img.substring(img.lastIndexOf('.') + 1).toLowerCase()){
        case 'jpg': case 'png':
        var dataURL = "data:image/png,"+encodeURIComponent(window.btoa(input.files[0]) );
      //alert(URL.createObjectURL(input.files[0]));
         var fileURL = URL.createObjectURL(input.files[0]);
            preview.src = fileURL;
  
            $('#rem_'+id).show();            
             //$("#gambar_default_edit"+id_item+"").val('0');
             $("#gambar_default_"+id_item).val('0');
            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var canvas        = document.createElement("canvas");
                    var ctx           = canvas.getContext("2d");

                    img = new Image();
                    img.onload=function(){
                          var MAX_WIDTH = 800;
                          var MAX_HEIGHT = 800;
                          var width = img.width;
                          var height = img.height;
                  
                          if (width > height) {
                            if (width > MAX_WIDTH) {
                              height *= MAX_WIDTH / width;
                              width = MAX_WIDTH;
                            }
                          } else {
                            if (height > MAX_HEIGHT) {
                              width *= MAX_HEIGHT / height;
                              height = MAX_HEIGHT;
                            }
                          }
                          canvas.width = width;
                          canvas.height = height;
                          var ctx = canvas.getContext("2d");
                          ctx.drawImage(img, 0, 0, width, height);
                          
                          image_high.value = canvas.toDataURL('image/png');
                          
                    }
                    img.src = e.target.result;
                    
                    img = new Image();
                    img.onload=function(){
                          var MAX_WIDTH = 300;
                          var MAX_HEIGHT = 300;
                          var width = img.width;
                          var height = img.height;
                  
                          if (width > height) {
                            if (width > MAX_WIDTH) {
                              height *= MAX_WIDTH / width;
                              width = MAX_WIDTH;
                            }
                          } else {
                            if (height > MAX_HEIGHT) {
                              width *= MAX_HEIGHT / height;
                              height = MAX_HEIGHT;
                            }
                          }
                          canvas.width = width;
                          canvas.height = height;
                          var ctx = canvas.getContext("2d");
                          ctx.drawImage(img, 0, 0, width, height);
                          
                          image_tumb.value = canvas.toDataURL('image/png');
                    }
                    img.src = e.target.result;
                    
                    input.files[0] = null;
                    input.value = "";
                }
                reader.readAsDataURL(input.files[0]);
            }
            
            break;
        default:
            $(input).val('');
            // error message here
            Materialize.toast('Silahkan masukkan format JPG/PNG', 4000);
            break;
    }
}

  function edit_jookir(id){
    var FormMenu = $('#FormMenu');
    var image_high   = $('#image_high'+id).val();
    var image_tumb   = $('#image_tumb'+id).val();
    var gambar_default = $('#gambar_default'+id).val();
      if (FormMenu.valid()){
      $.ajax({
        type: 'POST',
        data: FormMenu.serialize() + '&image_high='+image_high + '&image_tumb='+image_tumb + '&id='+id + '&gambar_default='+gambar_default,
        url: base_url+'jookir/edit_jookirs',
            success: function(msg) {
          if(msg == 1){
            $.ambiance({message: "Sukses",
            type: "success",
            fade: false});
            top.location.href = base_url+'jookir/index';            
          }else{
                    // $.ambiance({message: "Gagal",
                    // type: "error",
                    // fade: false});
            $.ambiance({message: "Sukses",
            type: "success",
            fade: false});
            top.location.href = base_url+'jookir/index';   


          }
        }
      });
    }
  }

  $("input.numbers").keypress(function(event) {
    return /\d/.test(String.fromCharCode(event.keyCode));
  });

