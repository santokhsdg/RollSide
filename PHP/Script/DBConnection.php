<?php

$db_name="rollside";
//$mysql_user="roll7sidehost7";
//$mysql_pass="pathogen@#8";
$mysql_user="root";
$mysql_pass="root";
$server_name="localhost";
$con=mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);
if(!$con)
{
 echo"Connection Error";
}


?>

