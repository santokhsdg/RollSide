<?php 
session_start();

if(isset($_SESSION["song_check"]))
$_SESSION["song_check"]="null";

if(!isset($_SESSION["bool"]))
{    
    header("Location: index.php");
    exit();
}
if(isset($_SESSION["bool"]))
{    
    if($_SESSION["bool"]==0 || $_SESSION["bool"]=="")
    {
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
    <title>Register</title>
    <link rel="shortcut icon" href="Images/rollside.ico" >
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="Javascript/jquery.uploadPreview.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jquery.form.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="Javascript/simpleUpload.min.js"></script>
  <script type="text/javascript" src="Javascript/releasedate.js"></script>
  <script src="Javascript/util.js"></script> 
	
             <link rel="stylesheet" href="CSS/main.css">
             <link rel="shortcut icon" href="Images/rollside.ico" >
             <link rel="stylesheet" href="CSS/later.css">
             <link rel="stylesheet" href="CSS/popup.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
             <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
             <link  rel="stylesheet" href="CSS/upload.css">
             <link rel="stylesheet" href="CSS/singer.css">
             <link rel="stylesheet" type="text/css" href="CSS/progress_style.css">    
	         <link href="CSS/bootstrap-imgupload.css" rel="stylesheet"> 


</head>
<body >
    <div id="heading_about container-fluid"  >
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
                                               <li><a href="playlist.php" class="btn btn-primary btn-dlu">PlayList</a></li>  <li><a href="myuploads.php" class="btn btn-primary btn-dlu"  >My Uploads</a></li>
                                </ul>
                             </div>
	                       </div>
                        </div>     
                </navbar>
            </div>

    
   
<div class="forbar">
<h3>Select music File</h3>
<div id="progress"></div>
<div id="progressBar" ></div>
<label class="btn btn-primary btn-file">
    Browse <input type="file" style="display: none;"  id="browse" >
</label>
<script type="text/javascript" src="Javascript/uploadsong.js"></script>
</div>
<br>
    <form method="post" action="CORE/SubmitForm.php" onsubmit="return check();" >
<div class="forbar">
    
    <div class = "form-horizontal" role = "form">
  <h2><span class="label label-default">Enter Song Info</span></h2>
    <br>
   <div class = "form-group">
      <label for = "firstname" class = "col-sm-2 control-label" style = "color:white;" >*Song Name</label>
		
      <div class = "col-sm-4">
         <input type = "text" class = "form-control" name = "name" placeholder = "Song Name" required>
      </div>
        </div>
   </div>
    <br>
    <div class="form-group">
    <div class="imageupload panel panel-default">
      <div class="panel-heading clearfix">
        <h3 class="panel-title pull-left">Upload Song Album Art</h3>
        
      </div>
      <div class="file-tab panel-body">
        <div>
         <label class="btn btn-primary btn-file">
    Browse <input type="file" style="display: none;" id="imagebr" >
          </label>

      <script type="text/javascript" src="Javascript/uploadimage.js"></script>

          <button type="button" class="btn btn-default">Remove</button>
           
        </div>
      </div>
      
    </div>
  </div>
  
  
  
    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="Javascript/bootstrap-imageupload.js"></script>

        <script>
            document.getElementById("imagebr").setCustomValidity("Please Upload Image File");
            var $imageupload = $('.imageupload');
            $imageupload.imageupload();

            $('#imageupload-disable').on('click', function() {
                $imageupload.imageupload('disable');
                $(this).blur();
            })

            $('#imageupload-enable').on('click', function() {
                $imageupload.imageupload('enable');
                $(this).blur();
            })

            $('#imageupload-reset').on('click', function() {
                $imageupload.imageupload('reset');
                $(this).blur();
            });
        </script>
   
     <h3><span class="label label-default">Artists Info</span></h3>
	
  <div class="form-horizontal" >
  <div class = "form-group">
      <label for = "singerid" class = "col-md-2 control-label " style = "color:white;">*Artist 1</label>
		
      <div class = "col-sm-3">
         <input type = "text" class = "form-control" name = "artist1" placeholder = "Primary artist" required >
      </div>
   </div>
   
   <div class = "form-group">
      <label for = "singerid" class = "col-sm-2 control-label" style = "color:white;">Artist 2</label>
		
      <div class = "col-sm-3">
         <input type = "text" class = "form-control" name = "artist2" placeholder = "Secondary Artist">
      </div>
   </div>
   
   <div class = "form-group">
      <label for = "singerid" class = "col-sm-2 control-label" style = "color:white;">Artist 3</label>
		
      <div class = "col-sm-3">
         <input type = "text" class = "form-control" name = "artist3" placeholder = "Secondary artist" >
      </div>
   </div>
   
   </div>
   <h3><span class="label label-default">Other Song Info</span></h3>
    <br>
      <div class="form-inline" >
  <div class = "form-group">
      <label for = "singerid" class = "col-md-3 control-label " style = "color:white;">*Album</label>
		
      <div class = "col-sm-4">
         <input type = "text" class = "form-control" name = "album" placeholder = "Album" required >
      </div>
   </div>
   
   <div class = "form-group">
      <label for = "singerid" class = "col-sm-3 control-label" style = "color:white;">*Genre</label>
		
      <div class = "col-sm-3">
         <input type = "text" class = "form-control" name = "genre" placeholder = "Genre" required>
      </div>
   </div>
   <hr>
   <div class = "form-group">
      <label for = "singerid" class = "col-sm-4 control-label" style = "color:white;">Composer</label>
		
      <div class = "col-sm-3">
         <input type = "text" class = "form-control" name = "composer" placeholder = "Composer" >
      </div>
   </div>
   
   </div>
   <br>
   
   <div class="form-horizontal">
   
   
   
   <div class = "form-group">
      <label for = "publisher" class = "col-sm-2 control-label" style = "color:white;">Publisher</label>
		
      <div class = "col-sm-4">
         <input type = "text" class = "form-control" name = "publisher" placeholder = "Publisher">
      </div>
   </div>
   <div class = "form-group">
      <label for = "label" class = "col-sm-2 control-label" style = "color:white;">Record Label</label>
		
      <div class = "col-sm-4">
         <input type = "text" class = "form-control" name = "rlabel" placeholder = "Label">
      </div>
   </div>
   </div>
   
   	
  <div class="form-horizontal" >
  <div class = "form-group">
      <label for = "iswc" class = "col-md-2 control-label " style = "color:white;">ISWC</label>
		
      <div class = "col-sm-4">
         <input type = "text" class = "form-control" name = "iswc" placeholder = "">
      </div>
   </div>
   
   <div class = "form-group">
      <label for = "isrc" class = "col-sm-2 control-label" style = "color:white;">ISRC</label>
		
      <div class = "col-sm-4">
         <input type = "text" class = "form-control" name = "isrc" placeholder = "">
      </div>
   </div>
   
   <div class = "form-group">
      <label for = "date" class = "col-sm-3 control-label" style = "color:white;">*Release Date*</label>
      <select name="day" id="days" >
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
          
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
  </select>
          
          <select name="month" id="months" >
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option><option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
  </select>
          
       <select name="year" id="years" >
    <option value="2000">2000</option>
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option><option value="2004">2004</option>
          <option value="2005">2005</option>
          <option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option>
           <option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option>
  </select>      
       
       <label class = "control-label" style = "color:white;">(DD/MM/YYYY)</label>
   </div>
      
      <div class = "form-group">
      <label for = "date" class = "col-sm-3 control-label" style = "color:white;">Music Band</label>
		
      <div class = "col-sm-3">
         <input type = "text" class = "form-control" name = "band" placeholder = "Music Band">
      </div>
   </div>
      <div class="col-sm-3">
      <h4 style = "color:white; font-size:20px;">*Select Type of Song: </h4>
      </div>
      <label class="radio-inline" >
      <input type="radio" name="optradio" value="ENGLISH" required > <label style = "color:white;" >English</label>
		
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="HINDI" required> <label style = "color:white;" >Hindi</label>
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="PUNJABI" required><label style = "color:white;" >Punjabi</label>
    </label>
   
   </div>
   <br>
   <div class="form-horizontal" >
   
   <div class = "form-group">
      <label for = "pline" class = "col-sm-2 control-label" style = "color:white;">P-Line</label>
		
      <div class = "col-sm-9">
         <input type = "text" class = "form-control" name = "pline" placeholder = "p-line">
      </div>
   </div>
   </div>
   
   
  
<br>
    <div class="form-group">
          <label for="comment" style = "color:white;">Song Description*</label>
        <div class="form-group">
       <textarea class="form-control" name rows="3" name = "description" placeholder="Write about you, your song and expectations from the users"></textarea>    
        </div>
    </div>
  <div class="form-group">
  <label for="comment" style = "color:white;">Terms and Conditions</label>
      <textarea readonly rows="12" class="form-control" style = "color:black; resize:none; font-size:18px" id="tarea"> 
      Welcome to RollSide
      READ THE TERMS AND CONDITIONS CAREFULLY

      1. The content uploaded on the system is free for downloading and listening.
      2. The content is owned by the user himself or he/she represent the owner on his/her behalf.
      3. User provide complete content distribution and use rights to the RollSide.
      4. RollSide as a platform is not responsible for any kind of misuse of the content and shall not be held responsible for the same.
      5. The user agree that information provided including the ownership is correct to the best of his/her knowledge.
      6. RollSide does not exercise user information editing rights or any change of user data.
      7. Any unappropriate content will removed for RollSide without any prior notice to the owner.
      8. RollSide does not undertake the copyright issues, it is sole responsiblity of the user and the owner.

These are guidlines followed by the RollSide for its use, by checking the checkbox user agrees with the all the terms and conditions and takes the responsibilty of his content and action.
      
      </textarea>
    <label class="checkbox" style>
      <input type="checkbox" name="optradio1" value="" style = "padding-left:20px;" required><label style = "color:white;" >AGREE WITH TERMS AND CONDITIONS
      </label>
    </label>
    </div>
    <br>
	  <div class = "col-sm-4">
      </div>

        <div class = "col-sm-2" >
            <input type="submit" class="btn btn-primary btn-lg " name="submit"  value="Submit" id="sub"  disabled>
      </div>
   

	  <button type="button" class="btn btn-default btn-lg"  >Cancel</button>
   </div>
   <br>
    <label id="labels" style="color : red; padding-left:500px; font-size : 15px;"></label>
    
    </form>
    
    <br>
    <br>
    <br>
    
        <div id=foot>
                
            <ul class="footer" style="background:transparent;">
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

