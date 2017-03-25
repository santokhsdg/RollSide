<?php


ini_set('upload_max_filesize', '10M');
/*
 * All of your application logic with $_FILES["file"] goes here.
 * It is important that nothing is outputted yet.
 */
 $output = "";
 $success = 0;
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    $success=1;
	} else {
		$success=0;
        echo "Sorry, there was an error uploading your file.";
    }




?>
