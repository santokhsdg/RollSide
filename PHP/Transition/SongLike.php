<?php
    if($_POST)
    {
    include('DBConnection.php');
    $songid=$_POST['songid'];
    $userid=$_POST['userid']; 
        //CHECK FOR CONSISTENCY , check userid and song id in user_likes table before updating and inserting
        $sqlcheck="select * from user_likes where USER_ID='$userid' and SONG_ID='$songid';";
        $check=mysqli_query($con,$sqlcheck);
        $cnt=mysqli_num_rows($check);
        if($cnt==0){
    $sql1=" Update song set Likes=Likes+1 where SONG_ID='$songid';"; 
    $sql2="INSERT into user_likes VALUES('$userid','$songid');";
    $r1=mysqli_query($con,$sql1);
    $r2=mysqli_query($con,$sql2);  
       
    mysqli_close($con);
   if($r1==true && $r2==true)
    { echo 1;}
     else{echo 0;}   
        }
        exit;
    }
    
?>