
<?php 
session_start();

if(!isset($_SESSION["bool"]))
{    //$_SESSION['active']="";
    header("Location: index.php");
    exit();
}
if(isset($_SESSION["bool"]))
{    
    if($_SESSION["bool"]==0 || $_SESSION["bool"]=="")
    { // $_SESSION['active']="";
       header("Location: index.php");
        exit();
    }    
}
?>


<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-uquiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>RollSide User</title>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script src="bootstrap/js/bootstrap.js"></script>
            <script src="Javascript/util.js"></script> 
    
             <link rel="shortcut icon" href="Images/rollside.ico">
             <link rel="stylesheet" href="CSS/indexpage.css">
             <link rel="stylesheet" href="CSS/later.css">
             <link rel="stylesheet" href="CSS/popup.css">
             <link rel="stylesheet" href="CSS/downStyle.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
             <link  rel="stylesheet" href="CSS/upload.css">
            
    
    
</head>
<body >
    
    
   <div id="heading_about"  >
                <navbar>                                        
                        
                             <div class="container-fluid prop_about">
	                           <div class="row">
                                   
                                   <div class="col-md-2 "><a href="index.php"><img src="Images/lg2.gif"></a>
                                       
                                   </div> 
                         <div class="col-md-5 pad">   
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
                         <li><a href="playlist.php"  type="submit"  class="btn btn-primary btn-dlu" >Playlist</a></li>   
                         <li><a href="myuploads.php" class="btn btn-primary btn-dlu" >My Uploads</a></li>  
  
                       </div>                       

                                            </ul>
                            </div>     
	                       </div>
                        </div>         
                     </navbar>
                   </div>
    
                <div >
                   <p class="latesthead">User Account</p> 
                    <hr>
                </div>
   
    
    <div class="container-fluid " >
            <div class="row">  
                
                
            <div class="col-md-2">
                
             <p class="option" >Options</p>
                <ul class="oplist"> <br><br>
                
                <li><a href="everything.php">Everything</a></li>
                <li><a href="popular.php">Popular</a></li>
                <li><a href="latest.php">Latest</a></li>
                <li><a href="mostlistened.php">Most Listened</a></li>
                
                </ul>
            
            </div >
                
                
                
            <div class="col-md-10 verticalLine"> 
        <p style = "color:#00B2EE; font-size: 23px; " > Change Password:</p>
                
                <hr>
    <div class = "form-group">
 <form method="post" id="passform">
     <label for = "email" class = "col-sm-3 control-label" style = "color:grey; font-size: 18px;">RollSide Registered e-mail*</label>	
      <div class = "col-sm-4">
         <input type="text" class = "form-control" name = "email"  placeholder = "Registered e-mail" required="required">
      </div> <br><br><br>
      <label for = "password" class = "col-sm-3 control-label" style = "color:grey;font-size:18px; " >Old Password*</label>		
      <div class = "col-sm-4">
         <input type="password" class = "form-control" name = "oldpass" placeholder = "Old Password" required="required">
      </div><br><br><br>
        <label for = "newpass" class = "col-sm-3 control-label" style = "color:grey; font-size: 18px;">New Password*</label>		
      <div class = "col-sm-4">
         <input type="password" class = "form-control" name = "newpass" placeholder = "New Password" required="required">
      </div><br><br><br>
        <label for = "repeat password" class = "col-sm-3 control-label" style = "color:grey; font-size: 18px;">Repeat New Password*</label>		
      <div class = "col-sm-4">
        <input type="password" class = "form-control" name = "rnewpass" placeholder = "Repeat New Password"  required="required">
      </div>
        <br><br><br><br>
        <div class = "col-sm-3" style="padding-left:300px !important;">
        <input type="submit"  id="changepass"   class="btn btn-primary" style="font-size:18px;" value="Change Password" >
        </div>
            <br><br>
            
</form>
        <script type="text/javascript">
                    $("#changepass").click(function(){  //  alert("work");
                    $.post("PHP/Script/ChangePass.php",$("#passform").serialize()).done(function(resp,status){      
                   var label= document.getElementById('signMsg'); 
                    label.innerHTML=resp; 
                        alert(resp);
                                                                                                      
                      });
                     })
         </script>        
       </div>    
    </div>
               
                
                 <div class="container-fluid " >
            <div class="row">  
                <br><br>
                <div class="col-md-2"></div>
                <div class="col-md-6"><label style="font-size:17px;"> Your email has not been confirmed yet, incase you want to send a new one:</label></div>
                <div class="col-md-4">
                
                 <?php 
                         if(isset($_SESSION["active"]))
                           {     
                                if($_SESSION["active"]!=1)
                                { 
                                    echo "<button type=\"submit\"  id=\"resendverif\"   class=\"btn btn-primary\" style=\"font-size:18px;\" >Resend Verification Mail</button>" ;
                                } 
                            }             
                
                ?>
                </div>
            </div>
                     
                </div>
                
              
                
               <script type="text/javascript">
                    $("#resendverif").click(function(){    alert("work");
                    $.post("PHP/Script/ResendVerification.php",{userid: <?php if(isset($_SESSION["user"])){
                                echo "'".$_SESSION['user']."'"; }?>} ,function(data){                     
                        alert(data);                                                                                               
                      }
                        )}
                          
                          )
                                
               </script>
             
            </div>
        </div>
    
     
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