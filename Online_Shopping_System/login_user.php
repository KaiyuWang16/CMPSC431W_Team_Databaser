<?php   
 session_start();
 include("config/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Online Shopping</title>
 <link href="css/online.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="js/functions.js"></script>
 <style type="text/css" media="all">
 @import "online.css";
 </style>
<script language="javascript">
  function check()
  {
   if(document.getElementById("txt_username").value =="")
   {
    alert('Please Enter user name !!'); 
    document.getElementById("txt_username").focus();
    return false;
   }
   if(document.getElementById("txt_password").value =="")
   {
    alert('Please Enter password !!');
    document.getElementById("txt_password").focus();
    return false;
   }
   if (isUcase(document.getElementById("txt_username").value) == false || isUcase(document.getElementById("txt_password").value) == false)
   {
    alert("Username and Password not match!!");
    document.getElementById("txt_username").value = "";
    document.getElementById("txt_password").value = "";
    document.getElementById("txt_username").focus();
    return false;
   }
  }
 </script>
</head>

<body class="twoColFixLtHdr">
<div id="header">
  <!-- end #header -->
</div>
<div id="container">
  <div id="container1"></div>
    <div align="left"><img src="images/1.jpeg" alt="Online Shopping" width="1680" height="100" /> </div>
  <div id="sidebar1">
   
    <!-- end #sidebar1 -->
  </div>
  <div id="mainContent">
    <div id="mainContent1">
    
      <div id="middletxt">
	   <div id="middletxtheader">Login</div>
        <form action="" method="post" name="frm_login" id="frm_login" enctype="multipart/form-data">
          <table width="100%" border=0>
            <tr>
              <td height="22"><table width="100%" border=0>
                 
                  <tr>
                    <td height="34" colspan="2"></td>
                    <td colspan="3"><div align="right"><span class="style3">  &nbsp; </span></div></td>
                  </tr>
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>User Name : </strong></div></td>
                 <td width="128"><input type="textbox" name="txt_username" id="txt_username" maxlength="20" style="width:176px;"
                                   onChange="document.getElementById('txt_username').value=trim(this.value);"/>
                                   
              </tr>
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Password : </strong></div></td>
                 <td width="128"><input type="password" name="txt_password" id="txt_password" maxlength="20" style="width:176px;"
                                   onChange="document.getElementById('txt_password').value=trim(this.value);"/></td>
              </tr>
              <tr>
                 <td colspan="3" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 <input type="button" id="registerNew" name="registerNew" value="Register" Onclick="document.location.href='register.php'" />
				 &nbsp;&nbsp;&nbsp
                 <input type="submit" id="submitMain" name="submitMain" value="Login" Onclick="return check(this.form);" />
				
                 &nbsp;&nbsp;&nbsp
                 </td>
              </tr>
              </table></td>
            </tr>
          </table>
        </form>
 
 <?php
 if(isset($_POST['submitMain']))
 {
   $user =$_POST['txt_username'];
   $password=$_POST['txt_password'];
   $query = mysql_query("SELECT * FROM registereduser r WHERE r.userName = '$user' AND r.password = '$password' ")
   or die(mysql_error());
   
   
   
   
   if(mysql_num_rows($query)>0)
   {
     $_SESSION['user']=$user;
	 
	 $get = mysql_query("SELECT ifSeller FROM registereduser WHERE userName ='$user'")or die(mysql_error());
     $num = mysql_num_rows($get);
	 $un=base64_encode($user);
	 
     for($i=0;$i<$num;$i++)
     {
	    $row = mysql_result($get,$i,'ifSeller');
     }
	 if($row==1){
		 echo "<script>window.location='loghome.php?un=$un';</script>";
	 }else{
		 echo "<script>window.location='productsdisplay.php?un=$un'</script>";
		 
	 }
   }
   else
   {
     echo '<div align="center"><strong><font color="#FF0000">User Name & Password not match !!</font></Strong></div>';
   }
}
@mysql_close($con);
?>
        <!-- end #middletxt -->
      </div>
    </div>
    <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->
  
  <!-- end #container -->
</div>
</body>
</html>