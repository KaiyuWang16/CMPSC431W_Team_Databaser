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
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/count.js"></script>
<script type="text/javascript" src="js/ajax_captcha.js"></script>
<script type="text/javascript" src="js/signup.js"></script>
<script type="text/javascript" src="js/signupvalidation.js"></script>
<style type="text/css" media="all">
@import "online.css";
</style>
<script language="javascript">
  function charcount()
 {
  document.getElementById('static').innerHTML = "Characters Remaining:  <span  id='charsLeft1'>   100 </span>";
  document.getElementById('static').innerHTML = "Characters Remaining:  <span  id='charsLeft2'>   400 </span>";
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
    <div id="subsidebar1">
      <div id="subsidebar3"> Welcome to HellowWorld! </div>
      <div id="subsidebar2"><a href="Startup.html">Home</a>
      </div>
      <div id="subsidebar2"><a href="login.php">Already a user? Login here</a> 
      </div>
    </div>
    <!-- end #sidebar1 -->
  </div>
  <div id="mainContent">
    <div id="mainContent1">
    <div id="middletxtheadermain">
    
      </div>
      <div id="middletxt">
        <form action="" method="post" name="frm_signup" id="frm_signup" enctype="multipart/form-data">
          <table width="100%" border=0>
            <tr>
              <td height="22"><table width="100%" border=0>
                  <tr>
                    <th colspan="5" id="formhedear">Please enter Your details.</th>
                  </tr>
                  <tr>
                    <td height="34" colspan="2"></td>
                    <td colspan="3"><div align="right"><font color="#FF0000">*</font><span class="style3"> Required  &nbsp; </span></div></td>
                  </tr>
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Company Name : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_cname" id="txtsin_cname" maxlength="30" style="width:176px;"
                                   onChange="document.getElementById('txtsin_cname').value=trim(this.value);"/></td>
              </tr>
                  
				   <tr>
                 <td><div align="right"><strong><font color="#FF0000">*</font>address :</strong></div>
                 <p align="right" class="example">(Maximum 100 characters) </p></td>
                 <td colspan="4"><textarea name="ta_address" id="ta_address" wrap="physical" cols="45" rows="5" title="Address Should no excide 100 characters !!"
                                  onchange=" document.getElementById('ta_address').value=trim(this.value);"></textarea><br>
                                  Characters Remaining: <span id="charsLeft1">100</span>
              </tr>
				  
                <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>State : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_state" id="txtsin_state" maxlength="50" style="width:176px;"
                                   onChange="document.getElementById('txtsin_state').value=trim(this.value);"/></td>
              </tr>
			   
			  <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Category : </strong></div></td>
                 <td width="200"><input type="textbox" name="txtsin_cate" id="txtsin_cate" maxlength="40" style="width:176px;"
                                   onChange="document.getElementById('txtsin_cate').value=trim(this.value);"/></td>
              </tr>
                <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>revenue : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_reve" id="txtsin_reve" maxlength="50" style="width:176px;"
                                   onChange="document.getElementById('txtsin_reve').value=trim(this.value);"/></td>
              </tr>
              
			  
			  <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Phone : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_phcode" id="txtsin_phcode" maxlength="3" style="width:30px;"
                                   onChange="document.getElementById('txtsin_phcode').value=trim(this.value);"/>-<input type="textbox" name="txtsin_pharea" id="txtsin_pharea" maxlength="5" style="width:50px;"
                                   onChange="document.getElementById('txtsin_pharea').value=trim(this.value);"/>-
                                 <input type="textbox" name="txtsin_phone" id="txtsin_phone" maxlength="7" style="width:70px; onChange="document.getElementById('txtsin_phone').value=trim(this.value);"/></td>
              </tr>
			  
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>password : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_passwd" id="txtsin_passwd" maxlength="50" style="width:176px;"
                                   onChange="document.getElementById('txtsin_passwd').value=trim(this.value);"/></td>
              </tr>

               
             
              <tr>
                 <td colspan="3" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="submit" id="submitMain" name="submitMain" value="Sign Up" Onclick="return done(this.form);" />
                 &nbsp;&nbsp;&nbsp;
                  <input type="reset" id="btnreset" name="btnreset" value="Reset" />
                 </td>
              </tr>
              </table></td>
            </tr>
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
<!--insertion into the database !!-->
<?php
if (isset($_POST['submitMain']))
{
   date_default_timezone_set('America/New_York');
   $cname=$_POST['txtsin_cname'];
   $address=$_POST['ta_address'];
   $state=$_POST['txtsin_state'];
   $category=$_POST['txtsin_cate']; 
   $revenue=$_POST['txtsin_reve'];
   $phone=$_POST['txtsin_phcode']."-".$_POST['txtsin_pharea']."-".$_POST['txtsin_phone'];
   $password=$_POST['txtsin_passwd'];
   $sid = "s";
   $sid .=date("YmdHis");

 
  

   
   $query=mysql_query(" INSERT INTO supplier
   (sid, companyName, address, state, category, revenue, phone, password)
   VALUES('$sid', '$cname', '$address', '$state', '$category', '$revenue', '$phone', '$password')") or die(mysql_error());
   
    
   //compute the address id
   /*$aid=mysql_query("SELECT aid FROM address") or die(mysql_error());
   $max = -1;
   while ($row = mysql_fetch_array($sid)){
	   $cur=$row['aid'];
	   $curNum=intval($cur);
	   if ($curNum > $max){
		   $max = $curNum;
	   }
   }
   $new_aid=$max + 1;
  
   $query2=mysql_query("INSERT INTO Address
   (aid, street, city, state, zipCode, phone, userName)
   VALUES('$new_aid', '$street', '$city', '$state', '$zipcode', '$phone', '$username')") or die(mysql_error());
   */
   echo "<script>alert('Your account has been created !!');</script>";
}
@mysql_close($con);
?>

</body>
</html>.