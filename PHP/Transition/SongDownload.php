<?php
if($_POST)
{
    include('DBConnection.php');
    $songid=$_POST['songid'];
    $sql1=" Update song set DOWNLOADS=DOWNLOADS+1 where SONG_ID='$songid';";     
    $done=mysqli_query($con,$sql1);     
    mysqli_close($con);
    echo $done; 
    exit;
}
      
?>