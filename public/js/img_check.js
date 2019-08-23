$(document).ready(function(){
	$('#submit').click(function(){
		var image_name = $('#image').val();
		var extension = $('#image').val().split('.').pop().toLowerCase();
		if(image_name){
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert('Invalid Image File');
				$('#image').val('');
				return false;
			}
		}

	});
});
