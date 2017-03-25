
$(document).ready(function(){

	$('#browse').change(function(){

		$(this).simpleUpload("PHP/Script/SongUpload.php", {
            //allowedExts: ["jpg", "jpeg", "jpe", "jif", "jfif", "jfi", "png", "gif"],

			start: function(file){
				//upload started
				$('#filename').html(file.name);
				$('#progress').html("");
				$('#progressBar').width(0);
			},

			progress: function(progress){
				//received progress
				$('#progress').html("Progress: " + Math.round(progress) + "%");
				$('#progressBar').width(progress + "%");
			},

			success: function(data){
				//upload successful
				$('#progress').html("Success!<br>Data: " + (data));
			},

			error: function(error){
				//upload failed
				$('#progress').html("Failure!<br>" + error.name + ": " + error.message);
			},
            complete: function(status){
                $('#progress').html("Upload File: " + status);
                document.getElementById("sub").disabled = false;
            },

		});

	});

});
    
