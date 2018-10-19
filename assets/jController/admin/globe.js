function searchdt(id,url) {
    $.ajax({
        type    : 'POST',
        data    : 'search='+$(id).val(),
        url     : base_url+url,
        success: function(msg) {
            checkall();
            $('#div-paging').html(msg);
            $("table").on('click', '#checkall', function () {
                $(this).parents('table:eq(0)').find(':checkbox').prop('checked', this.checked);
            });
        }
    });
}
$(function(){
		//select active nav
	var link=window.location;
	$('ul.nav li a[href="'+link+'"]').parent().addClass("active");
	
	//pagination
	
	$(document).on('click','.pagination li a',function() {
		var url = $(this).attr('href');		
		$.ajax({
			type	: 'POST',
			data	: 'ajax=1',
			url		: url,
			success: function(msg) {				
                $('#div-paging').html(msg);
				//$('#page').html(msg1);
				checkall();
				//checkAll();
			}
		});
		return false;
	});	
		
    $(document).on('click','#pagination-4 li a',function() {
        var url = $(this).attr('href');     
        $.ajax({
            type    : 'POST',
            data    : 'ajax=2',
            url     : url,
            success: function(msg) {                
                $('#div-paging1').html(msg);
                //$('#page').html(msg1);
                //checkall();
                checkAll();
            }
        });
        return false;
    }); 
        
	//checkall cehckbox
	$("table").on('click', '#checkall', function () {
		$(this).parents('table:eq(0)').find(':checkbox').prop('checked', this.checked);
	});
});

function hapus(id,url) {
        $("#delete_cancel").show(); 
        $("#body_delete > p").html("Apakah anda yakin untuk menghapus data ini ?");
        $("#delete_ok").show().attr("onclick","delete_data('"+id+"','"+url+"')");    
}

function hapus_kategori(id,url) {
        $("#delete_cancel").show(); 
        $("#body_delete > p").html("<span style='color:red'>Buku buku dalam kategori ini akan ikut terhapus.</span> Anda yakin untuk menghapus kategori ini ?");
        $("#delete_ok").show().attr("onclick","delete_data('"+id+"','"+url+"')");    
}

function ubah_status(id,url,status) {
        $("#delete_cancel").show();         
        if(status == 0){
            $("#body_delete > p").html("Apakah anda yakin untuk mengubah status ini menjadi publish ?");    
        }else{
            $("#body_delete > p").html("Apakah anda yakin untuk mengubah status ini menjadi draft ?");   
        }        
        $("#delete_ok").show().attr("onclick","ubah('"+id+"','"+url+"','"+status+"')");    
}


function ubah(id,url,status) {
    if(status == 0){
        var sta = 1;
    }else{
        var sta = 0;
    }
    $.ajax({
        type    : "POST",
        url     : base_url+url,
        data    : "id="+id+"&status="+sta,      
        success : function(){    
                location.reload();        
        },
        error : function(){
            
        }
    });
}

$( document ).ready(function() {
   // $(".left-side").getNiceScroll().hide();

   //      if ($('body').hasClass('left-side-collapsed')) {
   //          $(".left-side").getNiceScroll().hide();
   //      }
         var body = jQuery('body');
   //      var bodyposition = body.css('position');

   //      if (bodyposition != 'relative') {

   //          if (!body.hasClass('left-side-collapsed')) {
   //              body.addClass('left-side-collapsed');
   //              jQuery('.custom-nav ul').attr('style', '');

   //              jQuery(this).addClass('menu-collapsed');

   //          } else {
                body.removeClass('left-side-collapsed chat-view');
                jQuery('.custom-nav li.active ul').css({
                    display: 'block'
                });

                jQuery(this).removeClass('menu-collapsed');

        //     }
        // } else {

        //     if (body.hasClass('left-side-show'))
        //         body.removeClass('left-side-show');
        //     else
        //         body.addClass('left-side-show');

        //     mainContentHeightAdjust();
        // }
});
 