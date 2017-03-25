<?php

$result="";
if($_POST)
{
$email =$_POST['loginMail']; 
$pass = $_POST['pass'];
//$email="ramji@gmail.com";
//$pass="ramji34";
include('LoginClass.php');
include('DBConnection.php');
// object of login
$obj= new LoginClass();
$result=$obj->SignIn($email,$pass);  
}
echo $result;  
?>