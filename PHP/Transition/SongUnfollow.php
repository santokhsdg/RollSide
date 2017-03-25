<?php
  
if($_POST)
{
    include('DBConnection.php');       
    $songid=$_POST['songid'];
    $userid=$_POST['userid'];
    $singername=$_POST['artist'];     
        $sqlcheck="select * from user_follow where ARTIST_NAME='$singername' and FOLLOWER_ID='$userid';";
        $check=mysqli_query($con,$sqlcheck);
        $cnt=mysqli_num_rows($check);
      if($cnt==1){
          $sql1=" Update song set FOLLOWERS=FOLLOWERS-1 where SONG_ID='$songid';"; 
          $r1=mysqli_query($con,$sql1);
          $sql3="Delete from user_follow where ARTIST_NAME='$singername' AND FOLLOWER_ID='$userid';";
          $r2=mysqli_query($con,$sql3);
          
    mysqli_close($con);
   if( $r1==true && $r2==true)
    { echo 1;}
     else{echo 0;} 
    exit; }
}    
?>
