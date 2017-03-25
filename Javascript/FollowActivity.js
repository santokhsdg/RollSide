function FollowUpdate(data,opt,id)
        {      // alert("update");
                  var num="follows"+id;
                  var btn="follow"+id;
                  var follownum=document.getElementById(num);
                  var followbtn=document.getElementById(btn);
                  var count=parseInt(follownum.innerHTML);
            if(data==1 && opt=="Follow")
                {
                    count=count+1;
                    follownum.innerHTML=count;
                    followbtn.innerHTML="Unfollow";
                }
            else if(data==1 && opt=="Unfollow")
                {
                    count=count-1;
                    follownum.innerHTML=count;
                    followbtn.innerHTML="Follow";
                }
            else{
                alert("Can't process the request. Server Error");
            }
            
        }
        
         function FollowServer(act,opt,id,uid,art)
        {  //alert(id+" "+uid+" "+art);
            $.post(act, {songid:id,userid:uid,artist:art},function(data)
            { 
             FollowUpdate(data,opt,id);});         
            }
        
       function FollowSong(id,uid,art)
      {     
                 uid=uid.trim(); art=art.trim();
                  var num="follows"+id;
                  var btn="follow"+id;        
                  var act,opt;
                  var Follownum=document.getElementById(num);
                  var Followbtn=document.getElementById(btn);
                  var opp=Followbtn.innerHTML;
                  opp=opp.trim();
                 // alert(Followbtn.value);
                  if(opp=="Follow")
                      {
                        act="PHP/Transition/SongFollow.php";
                        opt="Follow";                        
                        FollowServer(act,opt,id,uid,art);                        
                      }
                  else
                      {
                        act="PHP/Transition/SongUnfollow.php";
                        opt="Unfollow";
                       
                        FollowServer(act,opt,id,uid,art);
                      }
          
      }