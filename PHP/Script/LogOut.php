<?php 
session_start();
//$_SESSION['boolean'] = 1;
if(!isset($_SESSION['bool']))
{
$_SESSION['bool']="";
$_SESSION['user']="";   
$_SESSION['user_name']="";
$_SESSION["image_path"]="";
$_SESSION["song_path"]="";
}
if($_POST)
{
require("LoginClass.php");
require("DBConnection.php");
// object 
$obj= new LoginClass();
$result=$obj->LogOut();
echo $result;
}

?>