<?php
$result="no";
if($_POST)
{
$name =$_POST['name']; 
$email =$_POST['email']; 
$passw1 = $_POST['pass1']; 
$passw2 = $_POST['pass2']; 
include("LoginClass.php");
include("DBConnection.php");
// object of login
$obj= new LoginClass();
$result=$obj->Register($name,$email,$passw1,$passw2);

}
echo $result;  

?>