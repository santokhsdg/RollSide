<?php
    if($_POST)
    {
    include('DBConnection.php');
    $songid=$_POST['songid'];
    $userid=$_POST['userid']; 
        $sqlcheck="select * from user_likes where USER_ID='$userid' and SONG_ID='$songid';";
        $check=mysqli_query($con,$sqlcheck);
        $cnt=mysqli_num_rows($check);
        if($cnt==1){
    $sql1=" Update song set Likes=Likes-1 where Song_id='$songid';"; 
    $sql2="Delete from user_likes where user_id='$userid' AND song_id='$songid';";
    $r1=mysqli_query($con,$sql1);
    $r2=mysqli_query($con,$sql2);  
       
    mysqli_close($con);
     if($r1==true && $r2==true)
    { echo 1;}
     else{echo 0;}  
        exit;
    }
    
      } 
?>
