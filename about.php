<?php 
session_start();
//$_SESSION['boolean'] = 1;
if(!isset($_SESSION['bool']))
{
$_SESSION['bool']="";
$_SESSION['user']="";   
$_SESSION['user_name']="";
$_SESSION["image_path"]="";
$_SESSION['admin']="";
$_SESSION['active']="";
$_SESSION["song_path"]="";
}
?>

<!DOCTYPE html>
    <html>    
    
       <head>
         <meta charset="utf-8">
          <meta http-uquiv="X-UA-Compatible" content="IE=edge,chrome=1">
           <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
           <script src="bootstrap/js/bootstrap.js"></script>
           <script src="Javascript/util.js"></script> 
           
             <title>About RollSide</title>
             <link rel="shortcut icon" href="Images/rollside.ico" >
             <link rel="stylesheet" href="CSS/main.css">
             <link rel="stylesheet" href="CSS/popup.css">
             <link rel="stylesheet" href="CSS/later.css">
             <link rel="stylesheet" href="CSS/downStyle.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
                  
        </head>
        
        <body  >
            
       <div id="heading_about"  >
                <navbar>                                        
                        
                             <div class="container-fluid prop_about">
	                           <div class="row">
                                   
                                   <div class="col-md-2 col-xs-2 col-sm-2"><a href="index.php"><img src="Images/lg2.gif"></a>
                                       
                                   </div> 
                                   
                               <div class="col-md-5 col-xs-4 col-sm-4 pad">   
                                   <div class="input-group stylish-input-group ">
                                    <input type="text" name="search" id="search" class="form-control"  placeholder="Search for Tracks, Albums, Bands, Artists ..." >
                                      <span class="input-group-addon">
                                         <a id="searching" href="">
                                           <span class="glyphicon glyphicon-search"></span>
                                         </a>
                                      </span>                   
                                   </div>  
                                   
                                   
                                   <div id="searchresult">
            
                                   </div> 
                                   
                                   <script type="text/javascript">
                    $('#search').on('input',function(e){
                        var met=2,ind,len=0,code;
                        var nreq="";
                        var req=document.getElementById('search').value; 
                        req.trim();
                        len=req.length;
                        req=req.toLowerCase();
                        for(ind=0;ind<len;ind++)
                            {
                                code=req.charCodeAt(ind);
                             if((code>=65 && code<=90)||(code>=97 && code<=122)||(code>=48 && code<=57)||code==32)
                                 {
                                     nreq=nreq+req.charAt(ind);
                                 }
                            }
                               ///alert(nreq);               
                        if(nreq=="")
                        {
                        document.getElementById("searching").href="";
                        $('#searchresult').hide();
                        }
                        
                         else
                        { document.getElementById("searching").href="CORE/search.php?searchq="+req;
                                                  
                        if(CheckWordLimit(nreq,40)==1){
                         $.post("CORE/SearchRefer.php", {request:nreq},function(data)
                          {                                    
                             var obj = JSON.parse(data);
                             var len=obj.result.length; 
                             // to make data here and set html
                             var wr="<div class=\"dropdown\"><div id=\"myDropdown\" class=\" dropdown-menu dropdown-content\" style=\" color: #fff !important;   width: 100%; !important;    background: rgba(20,20,20,0.7); !important;\">";
                             // 8 are the top results to be shown at max
                             for(var i=0;i<len && i<8 ;i++)
                                 {
                            wr=wr+"<a href='track.php?id="+obj.result[i].SONG_ID+"'>  "+obj.result[i].NAME+ " ("+obj.result[i].GENRE+"), "+obj.result[i].ALBUM_NAME+"   by "+obj.result[i].ARTIST1+"  "+obj.result[i].ARTIST2+"  "+obj.result[i].ARTIST3+"</a>";
                                 }
                             if(len==0){
                                 var wr="<div class=\"dropdown\"><div id=\"myDropdown\" class=\" dropdown-menu dropdown-content\" style=\" color: #fff !important;   width: 100%; !important;    background: rgba(20,20,20,0.7); !important;\"><h3 style=\"text-align: center;\">No results... </h3></div></div>";
                             }
                             
                             wr=wr+"</div></div>";
                             $('#searchresult').show(); 
                             $('#searchresult').html(wr); 
                             document.getElementById("myDropdown").classList.toggle("show"); 
                          });  }
                         else{
                             var wr="<div class=\"dropdown\"><div id=\"myDropdown\" class=\" dropdown-menu dropdown-content\" style=\" color: #fff !important;   width: 100%; !important;    background: rgba(20,20,20,0.7); !important;\"><h3 style=\"text-align: center;\">No results found... </h3></div></div>";
                             $('#searchresult').show(); 
                             $('#searchresult').html(wr); 
                             document.getElementById("myDropdown").classList.toggle("show"); 
                         }
                        }                       
                         
                        });
                </script>
                
                
                <script type="text/javascript">
                    
                window.onclick = function(event) { 
               var dropdowns = document.getElementsByClassName("dropdown-content");
               var i;
               for (i = 0; i < dropdowns.length; i++) {
               var openDropdown = dropdowns[i];
               if (openDropdown.classList.contains('show')) {
                 openDropdown.classList.remove('show');
                                       }                                   
                            }
                         }              
                </script>
                    
                
                                   
                            
                            </div>   
                                   
                                    
                                   
                            <div class="col-md-5">
                                 
                                           <ul class="main_menu_about">                     
                                               <li><a href="index.php">Home</a></li>
                                               <li><a href="about.php">About</a></li>
                                               <li><a href="upload.php">Upload</a></li>  
                                                <li><a href="popular.php">Popular</a></li> 
                           
                            <?php if(isset($_SESSION["bool"])){ if($_SESSION["bool"]==1){ echo "<li><a><input type=\"submit\" name=\"logout\" id=\"logging\" class=\"btn btn-primary btn-dlu\" value=\"Log Out\"></a></li>";}                                                        
                                                            
                        else{ echo  "<li><a href=\"#\" class=\"btn btn-primary btn-dlu\"  data-toggle=\"modal\" data-target=\"#login-modal1\">Sign In</a></li>";} }?> 
                         
                <script type="text/javascript">
                    $("#logging").click(function(){ 
                        
                    $.post("PHP/Script/LogOut.php", {opt:"logout"},function(data)
                          {  data=data.trim(); 
                            
                          if(data=="Logged Out")
                              {                                
                                location.reload(true);  
                              }                  
                         });
                     })
                </script> 
                          
                   
                                              
<div class="modal fade" id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"            style="display: none;">
    	  <div class="modal-dialog wert">
				<div class="loginmodal-container">
					<h1>Sign In to Your Account</h1><br>
				  <form method="post" id="signform" onsubmit="return validate()">
					<input type="text" name="loginMail" placeholder="Email" required="required" style="color:black;">
					<input type="password" name="pass" placeholder="Password" required="required" style="color:black;">
					<input type="submit"  id="SignIn"   class="login loginmodal-submit" value="Login" >
				  </form>                   
                    
                    <script type="text/javascript">
                    $("#SignIn").click(function(){    
                    $.post("PHP/Script/SignIn.php",$("#signform").serialize()).done(function(resp,status){      
                   var label= document.getElementById('signMsg'); 
                    label.innerHTML=resp;
                        resp=resp.trim();
                          if(resp=="Login Successful")
                              {
                                label.style.color="green";
                                location.reload(true);  
                              }
                          else{
                              
                              label.style.color="red";
                          }
                                                    
                      });
                     })
                    </script>
                   <label id="signMsg"></label>
				  <div class="login-help">
                      <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
					  <a href="resetpass.php" class="down">Forgot Password</a>
				  </div>
				</div>
			</div>
 </div></li>           
                          
                         <li><a href="#" class="btn btn-primary btn-dlu"  data-toggle="modal" data-target="<?php if(isset($_SESSION["bool"])){if($_SESSION["bool"]==1){echo"#msg-modal";} else{ echo"#login-modal2";}}   ?>">Create Account</a>                     
<div class="modal fade" id="login-modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Create New Account</h1><br>
				  <form method="post" id="Accountform" onsubmit="return validate()">
                    <input type="text" name="name"  placeholder="Name" value="" style="color:black;"> 
                    <input type="text" name="email" placeholder="Email" value="" style="color:black;">
					<input type="password" name="pass1" placeholder="Password" value="" style="color:black;">
                    <input type="password" name="pass2" placeholder="Repeat Password" value="" style="color:black;">
					<input type="submit" id="CreateAccount" class="login loginmodal-submit" value="Create Account">
                    </form> 
                    
                    <script type="text/javascript">
                    $("#CreateAccount").click(function(){    
                    $.post("PHP/Script/CreateAccount.php",$("#Accountform").serialize()).done(function(resp,status){       
                       resp=resp.trim();
                        var label= document.getElementById('accMsg');
                   label.innerHTML=resp;
                        if(resp=="Successfully registered, you may login.<br>Mail has been sent to your email account, please confirm the mail for using advanced features."){
                           label.style.color="green";
                           }
                           else{
                           label.style.color="red";
                           }
                       });
                     })
                    </script>
                    <label id="accMsg"></label>
                    <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
				</div>
			</div>
 </div>   
 <div class="modal fade" id="msg-modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title" style="align:center;">Message</h2>
        </div>
        <div class="modal-body">
          <h4 style="color:red;">You Need to Log Out first to create a new account.</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>                       
</li>
</ul>
                            </div>     
	                       </div>
                        </div>         
                </navbar>
            </div>
            
            
            
            
            
            
                <div >
                   <p class="latesthead">About RollSide</p>    
                </div>   
                 <hr>
                
                    <div class="container-fluid ">
	                      <div class="row">                             
                               <div class="col-md-8 pad ">                                     
                                   <p class="cont-div"> The RollSide platform provides music listening and downloading to the users. We provide our stuff and promote people to upload their stuff. You can do it here. <br> 
                                   <p class="cont-div">Artists can have accounts to get audience and promotion. We believe that you are more recognized by your work and thats why we are here. RollSide does not provide professional song registration stuff. Our sole motive is to make the music available and easily accessible the users. </p>
                                   <br>
                                   <p class="cont-div">RollSide is free for everyone, downloading and listening; including making your own playlist, following favorite artists and getting updates of the latest songs. </p>
                                   <br>
                                   <p class="cont-div">
                                       Share your stuff with your friends and community.Join the new club, follow your favorite artists and most important...  HAVE FUN</p><br>
                                   <p class="cont-div">Don't have a free account yet?</p>                                 
                                   
                                   <ul id="acct"  class="dis">                                      
                                       <li class="cont-div" style="padding-top:10px !important;"> <a class="btn btn-primary btn-dlm"  data-toggle="modal" data-target="<?php if(isset($_SESSION["bool"])){if($_SESSION["bool"]==1){echo "#msg-modal";}else{echo "#login-modal2";}}?>" >Create Account</a></li>
                                       
                                   </ul>
                                   
                     </div> 
                              <div class="col-md-4  verticalLine">
                                     <p class="cont-div"  style="font-size:30px !important;">Join us on Network</p>
                                             
            <div id="social Media">
            
            
                <ul class="smedia" style="padding-left:100px !important;">
                     <li><a href="https://www.facebook.com/rollside/?ref=bookmarks"><img src="Images/fb.png" height="50" width="50"></a></li>
                     <li><a href="https://www.linkedin.com/company-beta/13259266/"><img src="Images/lk.png" height="50" width="50"></a></li> 
                     <li><a href="https://www.instagram.com/rollside.music/"><img src="Images/insta.jpg" height="50" width="50"></a></li>
                     <li><a href="https://twitter.com/rollside_music"><img src="Images/tw.jpg" height="50" width="50"></a></li>
                    </ul>
            
                  </div>                  
	            </div>
                </div>
                    
            </div>                  
                    
           
    
    
    <hr>
    
    
     <div id=foot>
                
            <ul class="footer">
                <li><a href="about.php" class="anch">About</a></li>
                <li><a href="contactus.php" class="anch">Contact us</a></li>  
                 
                                   <br>
           
                <li><a href="location.php" class="anch">Location</a></li>  
                <li><a href="popularsearch.php" class="anch">Popular Searches</a></li>  
                <li><a href="help.php" class="anch">Help</a></li>
                <li><a href="privacy.php" class="anch">Privacy</a></li> 
                <hr style=" text-color:#fff !important;">
         </ul>
            
            
            </div>
    </body>
</html>

          
        </body>
    
    </html>