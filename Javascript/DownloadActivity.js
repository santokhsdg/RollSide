function DownloadUpdate(data,id)
        {   
                  var num="downloads"+id;                  
                  var downloadnum=document.getElementById(num);                  
                  var count=parseInt(downloadnum.innerHTML);
            
            if(data==1)
                {   count=count+1;
                    downloadnum.innerHTML=count;                    
                }
            else{
                alert("Can't process the request. Server Error");
                }
            
        }
        
         function DownloadServer(act,id)
        {  
            $.post(act,{songid:id},function(data)
            { DownloadUpdate(data,id)});         
        }
        
       function DownloadSong(id)
      {     
                  id=id.trim();
                  var num="downloads"+id;                  
                  var act;
                  var dnum=document.getElementById(num);  
                  
                        act="PHP/Transition/SongDownload.php";
                        DownloadServer(act,id);
      }