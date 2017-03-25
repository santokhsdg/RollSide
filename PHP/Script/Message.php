<?php

$result="";
if($_POST)
{
$email =$_POST['email']; 
$name = $_POST['name'];
$subject=$_POST['subject'];
$message=$_POST['message'];

include('DBConnection.php');
$sql="INSERT into message values('$name','$email','$subject','$message');";
$r=mysqli_query($con,$sql);
if($r==true)
{ $result=1;}
else{  $result=0;}

}
echo $result; 
exit;
?>