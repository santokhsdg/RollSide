<?php

$result="";
if($_POST)
{
$usrid =$_POST['userid']; $usrid=trim($usrid);
    
//$email="ramji@gmail.com";
//$pass="ramji34";
include('LoginClass.php');
include('DBConnection.php');

// object of login
$obj= new LoginClass();
$result=$obj->ResendVerification($usrid)
if($result==1){
    echo "Verification mail sent";
}
else{
    echo "Verification mail could not be sent. Please try again.";
}
}

?>