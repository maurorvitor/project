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

    // Serialize the form data
    //var formData = $(vidform).serialize();

    var formData = new FormData($(vidform)[0]);
	
	$.ajax({
		type: 'POST',
		dataType: 'json', 
		async: false,
		url: vurl,
		data: formData,
		cache: false,
		//enctype: 'multipart/form-data',
		processData: false,  // tell jQuery not to process the data
		contentType: false,   // tell jQuery not to set contentType		
		success: function (response) {
			mensagem(response);
			//console.log(response);
		}
	});	
}
