function error(vmensagem){
	$("#alerterror > span").html(vmensagem);
	$('#alerterror').show();
}

function msg_sucess(vmensagem){
	$("#alertsucess > span").html(vmensagem);
	$('#alertsucess').show();
}

function mensagem(vresponse){
	if (vresponse.success == true){	
		$("#alertsucess > span").html(vresponse.mensage);
		$('#alertsucess').show();
	}else{
		$("#alerterror > span").html(vresponse.mensage);
		$('#alerterror').show();  
	}
}

function validacheck(){
	// $('input:checkbox').each(function(){
		// if($(this).prop('checked')){
			// $(this).attr('value', 1);
		// } else {
			// $(this).attr('value', 0);
		// }					
		// alert($(this).val());
	// });
}
