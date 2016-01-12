function error(vmensagem){
	$("#alerterror > span").html(vmensagem);
	$('#alerterror').show();
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
