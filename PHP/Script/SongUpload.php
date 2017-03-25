<?php

session_start();
ini_set('upload_max_filesize', '10M');

/*
 * All of your application logic with $_FILES["file"] goes here.
 * It is important that nothing is outputted yet.
 */
if(isset($_SESSION['user']))
{
    $target_dir = "uploads/".$_SESSION['user'] ;
}
 $output = "";
 $success = 0;
$target_dir =  $target_dir."/track/";
$target_file = $target_dir . basename($_FILES["file"]["name"]); 
if(isset($_SESSION['song_path']))
$_SESSION['song_path']=$target_dir . basename($_FILES["file"]["name"]);


if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file  has been uploaded.";
  
 
	} else {

        echo "Sorry, there was an error uploading your file.";
    }

?>
