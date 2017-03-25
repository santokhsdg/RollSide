<?php

$result=0;
if($_POST)
{
$email =$_POST['email']; 
$email = trim($email);
$email = strip_tags($email);
$email = htmlspecialchars($email);

include('DBConnection.php');

$sql="SELECT EMAIL from user where EMAIL='$email';";
$res = mysqli_query($con,$sql); 
$row=mysqli_fetch_array($res);      
$count = mysqli_num_rows($res);
$mail=$row['EMAIL']; 
    if($count==1 && $mail==$email)
    {
    $to = $mail; // this is your Email address
    $from ="admin@rollside.com"; // this is the sender's Email address    
    $subject ="Reset RollSide Password"; 
    $pass=uniqid('pass');
    $message = "Your new RollSide Account password:$pass";
    
    $headers = "From:".$from;      
    $res=mail($to,$subject,$message,$headers);     
    
       if($res!=false)
       {
        $pass=hash('sha256', $pass);
        $sql="UPDATE user set PASS='$pass' where EMAIL='$email';";
        $res = mysqli_query($con,$sql); 
           if($res==1){ $result=1;}
           else{$result=0;}
       }
    else{$result=0;}
    }   
    
}
echo $result;  
?>