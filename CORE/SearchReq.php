<?php
function Search($req)
{
//$result=0;

$req=trim($req);
$reqid=uniqid('req'); 
//$reqid="req123";
$result=exec("./smm $reqid $req");    
     
//$result=1;
     if($result==1)
         { 
           $path="/home/gts123cpan/public_html/CORE/SearchOutput/".$reqid.".txt";
           $fl = fopen($path,"r") or die("Unable to open file!");
           $fr = fread($fl,filesize($path));
           trim($fr);
           fclose($fl);        
           $remove = "\n";
           $res = explode($remove, $fr);
           unlink($path); 
            if($res==""){
                return "No Result found";
            }
             else{
                 return $res;
             }
           
         }
     else
         {
          return "No Result found";
         }    
    
}

?>