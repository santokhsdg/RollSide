<?php

  class LoginClass
    {
        public function SignIn($email,$pass)
        {   
            session_start();
          include('DBConnection.php');
 
           // logOut first if user
            if(isset($_SESSION['bool'])){
           if ( $_SESSION['bool']==1 ) 
            {
            header("Location: index.php");
            exit;
            }}
 
            $error = false;
            $errmsg="Login Successful";
 
  // prevent sql injections
  $email = trim($email);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($pass);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);  
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256 
   $res=mysqli_query($con,"SELECT * FROM user WHERE Email='$email';");    
   $row=mysqli_fetch_array($res);      
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row      
   $passgot=$row['PASS'];  
      
   if($count==1 && $passgot==$password ) 
   {  
       if(isset($_SESSION['user'])){
           
    $_SESSION['user'] = $row['USER_ID'];
           if($row['CONFIRM']=="ACTIVE")
           {
               if(isset($_SESSION['active'])){ $_SESSION['active']=1; }
           }
       // CHECK FOR ADMIN
           $usr=$row['USER_ID'];
           $res=mysqli_query($con,"SELECT * FROM admin WHERE ADMIN_ID='$usr';");        
           
           $count = mysqli_num_rows($res);
           if(count==1)
           {
               
               if(isset($_SESSION['active'])){ $_SESSION['active']=1;} // admin is always active user
               //assign user session variable
               if(isset($_SESSION['admin'])){ $_SESSION['admin']=1;}
           }
           else{
               if(isset($_SESSION['admin'])){ $_SESSION['admin']=0;}
           }
       }
       if(isset($_SESSION['bool'])){
    $_SESSION['bool']=1;}
       
       if(isset($_SESSION['user_name'])){
    $_SESSION['user_name']=$row['NAME']; 
       }
    //header("Location: index.php");
   } 
    else 
   {
    $errmsg = "Incorrect Credentials, Try again...";
   }
    
  }
  mysqli_close($con);
    //echo $errMSG;
 return $errmsg;
}
        
        
        
        
  public function LogOut()
  {   
      if(isset($_SESSION["bool"]))
      {
        if($_SESSION["bool"]==1)
         {
        $_SESSION["bool"]=0;
        $_SESSION["user"]="";
        $_SESSION["user_name"]="";
        $_SESSION['admin']="";
        session_unset();
        session_destroy(); 
             //header("location: index.php");
         return "Logged Out";
         }  
      }
     
  }    
     
 
        
   public function Verify($email,$confirm)
   {
       // now, compose the content of the verification email, it will be sent to the email provided during sign up
                // generate verification code, acts as the "key"
                $verificationCode = base64_encode($confirm);
                include('DBConnection.php');
                // send the email verification
                $verificationLink = "www.rollside.com/confirm.php?code=".$verificationCode;
 
                $htmlStr = "";
                $htmlStr .= "Hi " . $email . ",<br /><br />";
 
                $htmlStr .= "Please click the button below to verify account. Now you can enjoy the adavnced features.<br /><br /><br />";
                $htmlStr .= "<a href='$verificationLink' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
 
                $htmlStr .= "Kind regards,<br />";
                $htmlStr .= "<a href='www.rollside.com' target='_blank'>The RollSide Music</a><br />";
 
 
                $name = "The RollSide Music";
                $email_sender = "noreply@rollside.com";
                $subject = "Verification Link | The RollSide Music";
                $recipient_email = $email;
 
                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "From: {$name} <{$email_sender}> \n";
 
                $body = $htmlStr;
 
                // send email using the mail function, you can also use php mailer library if you want
                if( mail($recipient_email, $subject, $body, $headers) ){ 
                    // tell the user a verification email were sent
                   // $sql="Update user set MAIL_STATUS='SUCCESS' where EMAIL='$email';";
                    //$res=mysqli_query($con,$sql);  
                   return 1;                       
                }
               else{
                    //$sql="Update user set MAIL_STATUS='FAIL' where EMAIL='$email';";
                    //$res=mysqli_query($con,$sql);
                    return 0;
                }
       
   }
        
        
         public function ResendVerification($usrid)
  {
      include('DBConnection.php');
      $query = "SELECT EMAIL FROM user WHERE USER_ID='$usrid'";
      $result = mysqli_query($con,$query);       
        $row=mysqli_fetch_array($result);
      $email=$row['EMAIL'];
      $confirm=uniqid('conf');
      $query = "update user set CONFIRM='$confirm' WHERE USER_ID='$usrid'";
      $result = mysqli_query($con,$query); 
      $res=Verify($email,$confirm);
      return $res;
      
      
  }
        
        
   public function Register($name,$email,$pass,$repass)
   { 
 //ob_start();
  session_start();
       if(isset($_SESSSION['bool'])){
           if($_SESSION['bool']==1 ){
           header("Location: index.php");
           }
       }
 
 include('DBConnection.php');

 $error = false;
 $nameError="";

  
  // clean user inputs to prevent sql injections
  $name = trim($name);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($email);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($pass);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // basic name validation
   if (strlen($name) < 3) 
   {
   $error = true;
   $nameError = $nameError."<br>*Name must have atleast 3 characters";
  }
  else if (!preg_match("/^[a-zA-Z ]+$/",$name)) 
  {
   $error = true;
   $nameError = $nameError."<br>*Name must contain alphabets and space";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) 
  {
   $error = true;
   $nameError = $nameError."<br>*Please enter valid email address";
  }
    else {
   // check email exist or not
   $query = "SELECT EMAIL FROM user WHERE EMAIL='$email'";
   $result = mysqli_query($con,$query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $nameError = $nameError."<br>*Provided Email is already in use.";
   }
  }
  // password validation
   if(strlen($pass) < 5) {
   $error = true;
  $nameError =$nameError."<br>*Password must have atleast 5 characters.";
       echo $nameError;  }
  
  if($pass!=$repass) {
   $error = true;
  $nameError =$nameError."<br>*Password and Repeat Passwords are not different."; 
  }
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup

  if( !$error ) {   
      $id=uniqid('usr');
      $confirm=uniqid('conf');
   $query = "INSERT INTO user(user_id,Email,Pass,Name,CONFIRM) VALUES('$id','$email','$password','$name','$confirm')";
   $res = mysqli_query($con,$query);  
      mkdir("/home/gts123cpan/public_html/PHP/Script/uploads/$id",0777); mkdir("/home/gts123cpan/public_html/PHP/Script/uploads/$id/track",0777);      mkdir("/home/gts123cpan/public_html/PHP/Script/uploads/$id/image",0777);
   if ($res) {
    $ml=Verify($mail,$confirm);
       $str="<br>Your email verification has failed.Please go to user section to resend verification.";
       if($ml==1)
       {
           $str="<br>Mail has been sent to your email account, please confirm the mail for using advanced features.";
       }
       
    $nameError = "Successfully registered, you may login.".$str;
    unset($name);
    unset($email);
    unset($pass);
   } 
      else {    
    $nameError = "Something went wrong, try again later..."; 
   } 
    
  }
  mysqli_close($con);
  return $nameError;       
    
    }
      
      
public function ChangePassword($oldpass,$newpass,$rnewpass,$email)
    {
  $oldpass = trim($oldpass);
  $oldpass = strip_tags($oldpass);
  $oldpass = htmlspecialchars($oldpass);  
    
  $newpass = trim($newpass);
  $newpass = strip_tags($newpass);
  $newpass = htmlspecialchars($newpass);  
     
  $rnewpass = trim($rnewpass);
  $rnewpass = strip_tags($rnewpass);
  $rnewpass = htmlspecialchars($rnewpass); 

  $email = trim($email);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
    
    
      ///$userid=""; 
        $error=false;   $nameError="";
       /* session_start();
       if(isset($_SESSSION['user']))
           {
           $userid=$_SESSION['user'];  
           }*/
       
 include('DBConnection.php');
      
      if(strlen($newpass) < 5) {
   $error = true;
  $nameError =$nameError."*Password must have atleast 5 characters.";
         }
  
  if($newpass!=$rnewpass) {
   $error = true;
  $nameError =$nameError."* new Password and Repeat new Password are different."; 
  }
    if($error==false)
    { 
        $pass= hash('sha256', $oldpass);
        $sql="SELECT * from user where EMAIL='$email';";
        $res = mysqli_query($con,$sql); 
        $row=mysqli_fetch_array($res);      
        $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row   
        $userid=$row['USER_ID'];
        $passgot=$row['PASS']; 
        //echo $pass."-------";
        
        if($pass==$passgot)
        {
            
          $npass= hash('sha256', $newpass);
            if($passgot==$npass){$nameError="Old password and new password can't be same."; }
            else{
          $sql="UPDATE user set PASS='$npass' where USER_ID='$userid';";
          $res = mysqli_query($con,$sql); 
            
           if($res==1)
           {
             $nameError="Password successfully updated."; 
           }
            }
          
        }
        else
        {
            $nameError="Incorrect password. Please Try Again.";
        }
        
    }      
        mysqli_close($con);
      return $nameError;
      
    }
      public function Confirm($usrid,$confirm)
      {
          $conf=base64_decode($confirm);
          include('DBConnection.php');
          $sql="select CONFIRM from user where USER_ID='$usrid';";
          $res = mysqli_query($con,$sql); 
          $row=mysqli_fetch_array($res); 
          if($row["CONFIRM"]==$conf)
          {
            $sql="UPDATE user set CONFIRM='ACTIVE' where USER_ID='$usrid';";
            $res = mysqli_query($con,$sql);   
            if($res==1)
            {
                return 1; // all is well
            }
              else{
                  return 2; // db could not be updated
              }
          }
          else{
              return 0; // incorrect confirmation
          }
          
      }
      
      
      
    }
?>