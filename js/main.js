function viewuser(viduser){
	$("#content-modal").load('core/user/user_view.php?page=view');
	$.getJSON('core/user/user_db.php?action=sel&id='+viduser, function(result){
		$.each(result, function(i, field){				
			$("#"+i).val(field);
		});
	});	
	$('#myModal').modal('show');	
}

function edtsenha(viduser){
	$("#content-modal").load('core/user/user_view.php?page=sen&id='+viduser);
	$('#myModal').modal('show');	
}