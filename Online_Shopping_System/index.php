<?php   
 session_start();
 include("config/config.php");
 //echo "User".$_SESSION['user'];
 if(isset($_SESSION['supplier']))
 {
  $username=$_SESSION['supplier'];
 } else {
 ?>
 <script>
  alert('You Are Not Logged In !! Please Login to access this page');
  alert(window.location='login.php');
 </script>
 <?php
 }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <script type="text/javascript" src="js/functions.js"></script>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/count.js"></script>
 <script type="text/javascript" src="js/ajax_captcha.js"></script>
 <script type="text/javascript" src="js/productmaster.js"></script>
 <script type="text/javascript" src="js/productmastervalidation.js"></script>
 <script language="javascript">
 // function for comfirm box !!
  function isConfirmlog()
  {
   var r = confirm('Are you sure you want to log out !!');
   if(!r)
   {
    return false;
   }
   else
   {
    alert(window.location='login_supplier.php');
   }
  }
  function charcount()
  {
   document.getElementById('static').innerHTML = "Characters Remaining:  <span  id='charsLeft1'>   200 </span>";
   document.getElementById('static1').innerHTML = "Characters Remaining:  <span  id='charsLeft2'>   300 </span>";   
   document.getElementById('static2').innerHTML = "Characters Remaining:  <span  id='charsLeft3'>   500 </span>";
   document.getElementById('static3').innerHTML = "Characters Remaining:  <span  id='charsLeft4'>   100 </span>";   
  }
 // to display sub category function
  function showdiv()
  {
   document.getElementById('subcat1nmdiv').style.display="block";
   document.getElementById('subcat1div').style.display="block";
  }
 </script>  

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Online Shopping</title>
 <link href="css/online.css" rel="stylesheet" type="text/css" />
 <style type="text/css" media="all">
  @import "online.css";
 </style>
</head>

<body class="twoColFixLtHdr">
<div id="header">
  <!-- end #header -->
</div>
<div id="container">
  <div id="container1"></div>
  <div align="left"><img src="images/1.jpeg" alt="Online Shopping" width="1680" height="100" /> </div>
  <div id="sidebar1">
    <div id="subsidebar1">
      <div id="subsidebar3"> Menu </div>
	   <li><div id="subsidebar2"><a href="loghome.php">Home</a></div></li>
       <li><div id="subsidebar2"><a href="signup.php">Sign up</a></div></li>
       <li><div id="subsidebar2"><a href="aboutus.php">About Us</a></li>    
    </div>
    <!-- end #sidebar1 -->
  </div>
  <div id="mainContent">
    <div id="mainContent1">
      <div id="middletxt">
	  
        <form action="" method="post" name="frm_prd" id="frm_prd" enctype="multipart/form-data">
          <table width="100%" border=0>
            <tr>
              <td height="22"><table width="100%" border=0>
                  <tr>
                    
					
                  </tr>
				  <div align="center"><img src="images/2.jpeg" alt="Online Shopping" width="680" height="500" /> </div>
                 
                
                 
            
          </table>
        </form>
        <!-- end #middletxt -->
      </div>
    </div>
    <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

  <!-- end #container -->
</div>
 
<!-- Code for inserting into data base -->

</body>
</html>