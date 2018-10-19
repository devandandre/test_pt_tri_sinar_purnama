$("#FormAddTransactionDriver").validate({
      errorClass:'error',
      ignore: ":hidden:not(select)",
      onclick: false,
      rules:{
          jenis_transaksi              : {required: true},
          nominal                      : {required: true},
      },
      messages: {
          jenis_transaksi: {
                required: message_alert("Jenis Transaksi harus dipilih"),                  
          },    
          nominal: {
                required: message_alert("Nominal harus diisi"),                
            
          },      
       
      },
    
  }); 

function save_transaction(){
  var FormAddTransactionDriver = $('#FormAddTransactionDriver');
  var id_driver_encode = $('#id_driver_encode').val();

  if (FormAddTransactionDriver.valid()){
   $.ajax({
        type: 'POST',
        data: FormAddTransactionDriver.serialize(),
        url: base_url+'driver/save_transaction',
        success: function(msg) {
          if(msg == 1){
            $.ambiance({message: "Sukses",
            type: "success",
            fade: false});
            top.location.href = base_url+'driver/history_driver/'+id_driver_encode;             
          }else{
            $.ambiance({message: "Gagal",
            type: "error",
            fade: false});
          }
        }
      }); 
  }
}

function save_transaction_jookir(){
  var FormAddTransactionDriver = $('#FormAddTransactionDriver');
  var id_jookir_encode = $('#id_jookir_encode').val();

  if (FormAddTransactionDriver.valid()){
   $.ajax({
        type: 'POST',
        data: FormAddTransactionDriver.serialize(),
        url: base_url+'driver/save_transaction_jookir',
        success: function(msg) {
          if(msg == 1){
            $.ambiance({message: "Sukses",
            type: "success",
            fade: false});
            top.location.href = base_url+'driver/history_driver/'+id_jookir_encode;             
          }else{
            $.ambiance({message: "Gagal",
            type: "error",
            fade: false});
          }
        }
      }); 
  } 
}

function approve_data(id,id_jookir){
  var email   = $('#email'+id).val();
  var nama_jookir = $('#nama_jookir'+id).val();
	var nominal = $('#nominal'+id).val();
  $('#btn_approve_'+id).html("Please Wait...").prop('disabled', true);
	 $.ajax({
        type: 'POST',
        data: 'id='+id+'&id_jookir='+id_jookir+'&nominal='+nominal+'&email='+email+'&nama_jookir='+nama_jookir,
        url: base_url+'driver/approve_data',
        success: function(msg) {
          if (msg == 1) { 
            $.ambiance({message: "Sukses Approved",
            type: "success",
            fade: false});
            location.reload();
            //top.location.href = base_url+'jookir/index';            
          }else{
            $.ambiance({message: "Gagal",
            type: "error",
            fade: false});

          }
        }
      }); 
}

function delete_topup(id){
	 $.ajax({
        type: 'POST',
        data: 'id='+id,
        url: base_url+'driver/delete_topup',
        success: function(msg) {
          if (msg == 1) { 
            $.ambiance({message: "Sukses Hapus",
            type: "success",
            fade: false});
            location.reload();
            //top.location.href = base_url+'jookir/index';            
          }else{
            $.ambiance({message: "Gagal",
            type: "error",
            fade: false});

          }
        }
      }); 	
}

function pilih_transaksi(){
  var jenis_transaksi = $('#jenis_transaksi').val();
  $('#jenis_transaksi_status').val(jenis_transaksi);
}

function change_place(){
	var pilih_tempat = $('#pilih_tempat').val();

	alert(pilih_tempat);

	if(pilih_tempat == 1){
	$('#place_driver').show();
	$('#place_jookir').hide();
	}else if(pilih_tempat == 2){
	$('#place_driver').hide();
	$('#place_jookir').show();		
	}
}

function change_places(){
	var pilih_tempats = $('#pilih_tempats').val();

	//alert(pilih_tempats);

	if(pilih_tempats == 1){
		top.location.href = base_url+'driver/index'; 
	}else if(pilih_tempats == 2){
		top.location.href = base_url+'driver/jookir_withdraw'; 
	}
}

function aktiv_form_detail(id){
      $('#bank_from'+id).prop("disabled",false);
      $('#from_acc_rek_'+id).prop("disabled",false);
      $('#from_nama_rek_'+id).prop("disabled",false);
      $('#bank_to_'+id).prop("disabled",false);
      $('#nominal_edit_'+id).prop("disabled",false);
      $('#edit_detail_'+id).hide();
      $('#cancel_detail_'+id).show();
      $('#save_detail_'+id).show();
}

function cancel_form_detail(id){
      $('#bank_from'+id).prop("disabled",true);
      $('#from_acc_rek_'+id).prop("disabled",true);
      $('#from_nama_rek_'+id).prop("disabled",true);
      $('#bank_to_'+id).prop("disabled",true);
      $('#nominal_edit_'+id).prop("disabled",true);
      $('#edit_detail_'+id).show();
      $('#cancel_detail_'+id).hide();
      $('#save_detail_'+id).hide();
}

function save_form_detail(id){
      var bank_from           = $('#bank_from'+id).val();
      var from_acc_rek_       = $('#from_acc_rek_'+id).val();
      var from_nama_rek_      = $('#from_nama_rek_'+id).val();
      var bank_to_            = $('#bank_to_'+id).val();
      var nominal_edit_       = $('#nominal_edit_'+id).val();
     $.ajax({
          type: 'POST',
          data: 'id='+id+'&bank_to_='+bank_to_+'&from_acc_rek_='+from_acc_rek_+'&from_nama_rek_='+from_nama_rek_+'&nominal_edit_='+nominal_edit_+'&bank_from='+bank_from,
          url: base_url+'driver/save_form_detail',
          success: function(msg) {
            if(msg == 1){
            $('#bank_from'+id).prop("disabled",true);
            $('#from_acc_rek_'+id).prop("disabled",true);
            $('#from_nama_rek_'+id).prop("disabled",true);
            $('#bank_to_'+id).prop("disabled",true);
            $('#nominal_edit_'+id).prop("disabled",true);
            $('#edit_detail_'+id).show();
            $('#cancel_detail_'+id).hide();
            $('#save_detail_'+id).hide();
            $.ambiance({message: "Sukses Edit",
            type: "success",
            fade: false});            
            }else{
            $.ambiance({message: "Gagal",
            type: "error",
            fade: false}); 
            }
          }
        });
}

function change_bank_to(id){
  var bank_to_ = $('#bank_to_'+id).val();

   $.ajax({
        type: 'POST',
        data: 'id='+id+'&bank_to_='+bank_to_,
        url: base_url+'driver/change_bank_to',
        success: function(msg) {
          $('#tempat_bank_to').html(msg);
        }
      }); 

}

function approve_driver(id,id_driver){
  var email   = $('#email'+id).val();
	var nominal = $('#nominal'+id).val();
  var nama_driver = $('#nama_driver'+id).val();
  $('#btn_approve_'+id).html("Please Wait...").prop('disabled', true);
	 $.ajax({
        type: 'POST',
        data: 'id='+id+'&id_driver='+id_driver+'&nominal='+nominal +'&email='+email +'&nama_driver='+nama_driver,
        url: base_url+'driver/approve_driver',
        success: function(msg) {
          if (msg == 1) { 
            $.ambiance({message: "Sukses Approved",
            type: "success",
            fade: false});
            location.reload();
            //top.location.href = base_url+'jookir/index';            
          }else{
            $.ambiance({message: "Gagal",
            type: "error",
            fade: false});

          }
        }
      }); 		
}

function hapus_driver(id){
	 $.ajax({
        type: 'POST',
        data: 'id='+id,
        url: base_url+'driver/hapus_driver',
        success: function(msg) {
          if (msg == 1) { 
            $.ambiance({message: "Sukses Hapus Data",
            type: "success",
            fade: false});
            location.reload();
            //top.location.href = base_url+'jookir/index';            
          }else{
            $.ambiance({message: "Gagal",
            type: "error",
            fade: false});

          }
        }
      }); 			
}