$("#formGateAdd").validate({
      errorClass:'error',
      ignore: ":hidden:not(select)",
      onclick: false,
      rules:{
          name              : {required: true},
          ma         		: {required: true},
          uuid      		: {required: true},
      },
      messages: {
          name: {
                required: message_alert("name harus diisi"),                  
          },    
          ma: {
                required: message_alert("Mac Address harus diisi"),                
            
          },      
          uuid: {
                required: message_alert("UUID harus diisi"),               
          },         
      },
    
  }); 


function save_gate(){
	var form = $('#formGateAdd');
	if($("#formGateAdd").valid()){
	

	$.ajax({
    type: 'POST',
    data: form.serialize(),
    url: base_url+'gate/save',
			success: function(msg) {
				if(msg == 1){
					top.location.href = base_url+'gate/index';
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

function save_gate_reset(){
	var form = $('#formGateAdd');

	$.ajax({
    type: 'POST',
    data: form.serialize(),
    url: base_url+'gate/save',
			success: function(msg) {
				if(msg == 1){
					$('#formGateAdd')[0].reset();
						$.notify({
		                icon: 'pe-7s-gift',
		                message: 'Data berhasil disimpan'
		      
		             },{
		                 type: 'success',
		                 timer: 4000
		             });
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

}

function edit_gate(){

	var form = $('#formGateEdit');

	$.ajax({
    type: 'POST',
    data: form.serialize(),
    url: base_url+'gate/edit',
			success: function(msg) {
				if(msg == 1){
						$.notify({
		                icon: 'pe-7s-gift',
		                message: 'Data berhasil diEdit'
		      
		             },{
		                 type: 'success',
		                 timer: 4000
		             });
						
					top.location.href = base_url+'gate/index';
				}else{
						$.notify({
		                icon: 'pe-7s-gift',
		                message: 'Gagal diEdit'
		      
		             },{
		                 type: 'error',
		                 timer: 4000
		             });
				}
			}
	    });

}