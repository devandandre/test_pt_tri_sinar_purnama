function send_comment(id){
	var FormComment = $('#FormComment');
		$.ajax({
			type: 'POST',
			data: FormComment.serialize() + '&news_id='+id,
			url: base_url+'index/send_comment',
   			success: function(msg) {
				if(msg == 1){
				  location.reload();					
				}else{
					alert("Gagal Posting Komentar");
				}
			}
		});
}