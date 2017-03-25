<?php

$result="";
if($_POST)
{
$oldpass =$_POST['oldpass']; $oldpass=trim($oldpass);
$newpass = $_POST['newpass']; $newpass=trim($newpass);
$rnewpass = $_POST['rnewpass']; $rnewpass=trim($rnewpass);
$email = $_POST['email']; $email=trim($email);
    
//$email="ramji@gmail.com";
//$pass="ramji34";
include('LoginClass.php');
include('DBConnection.php');

// object of login
$obj= new LoginClass();
$result=$obj->ChangePassword($oldpass,$newpass,$rnewpass,$email); 
echo $result;
}

?>