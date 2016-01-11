function error(vmensagem){
	$("#alerterror").append(vmensagem);
	$('#alerterror').show();
}


function mensagem(vresponse){
	if (vresponse.success == true){	
		$("#alertsucess").append(vresponse.mensage);
		$('#alertsucess').show();
	}else{
		$("#alerterror").append(vresponse.mensage);
		$('#alerterror').show();  
	}
}

function Inserir(ve, vurl, vidform){
	var validou = ve.isDefaultPrevented();  
	ve.preventDefault();        
	if (validou != true) { 		
		$.ajax({
			type: 'POST',
			dataType: 'json', 
			async: false,
			url: vurl,
			data: $(vidform).serialize(),
			success: function (response) {			
				mensagem(response);
				$(vidform).trigger("reset");
			},
			error: function(response) {
				error('Retorno Invalido'); 
				$(vidform).trigger("reset");		
			}
		});
	}
}

function apagar(vurl){
	$.ajax({
		type: 'POST',
		dataType: 'json', 
		async: false,
		url: vurl,
		success: function (response) {
			mensagem(response);
		},
		error: function(response) {
			error('Retorno invalido');
		}			
	});	
}

function editar(vurl, vidform){
	$.ajax({
		type: 'POST',
		dataType: 'json', 
		async: false,
		url: vurl,
		data: $(vidform).serialize(),
		success: function (response) {
			mensagem(response);
		}
	});	
}
