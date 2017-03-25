function LikeUpdate(data,opt,id)
        {   
                  var num="likes"+id;
                  var btn="like"+id;
                  var likenum=document.getElementById(num);
                  var likebtn=document.getElementById(btn);
                  var count=parseInt(likenum.innerHTML);
            if(data==1 && opt=="Like")
                {
                    count=count+1;                   
                    likenum.innerHTML=count;
                    likebtn.innerHTML="Unlike";
                }
            else if(data==1 && opt=="Unlike")
                {
                    count=count-1;
                    likenum.innerHTML=count;
                    likebtn.innerHTML="Like";
                }
            else{
                alert("Can't process the request. Server Error");
            }
            
        }
        
         function LikeServer(act,opt,id,uid)
        {  
            $.post(act, {songid:id,userid:uid},function(data)
            {  LikeUpdate(data,opt,id);  } );         
        }
        
       function LikeSong(id,uid)
      {    
                   
                  var num="likes"+id;
                  var btn="like"+id;        
                  var act,opt;
                  var likenum=document.getElementById(num);
                  var likebtn=document.getElementById(btn);
                  var opp=likebtn.innerHTML;
                  opp=opp.trim();
              //    alert(likebtn.innerHTML);
                  if(opp=="Like")
                      {
                        act="PHP/Transition/SongLike.php";
                        opt="Like";
                        LikeServer(act,opt,id,uid);                        
                      }
                  else
                      {
                        act="PHP/Transition/SongUnlike.php";
                        opt="Unlike";
                        LikeServer(act,opt,id,uid);
                      }
                  
              
             
      }