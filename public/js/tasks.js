
$(document).ready(function(){
	$('a[data-confirm]').click(function(){
		var href = $(this).attr('href');
        var text = $(this).attr('data-confirm');
        $('#myModal').modal('show');
		$('#modal-body').text(text);
		$('#dataConfirmOK').attr('href', href);
		return false;
	});
}); 
