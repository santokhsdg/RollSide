$(document).ready(function(){

	$('#imagebr').change(function(){

		$(this).simpleUpload("PHP/Script/ImageUpload.php", {
		});

	});

});