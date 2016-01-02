<?php
 session_start();
 include("config/config.php");
 $rid=$_GET['rid'];
 if($_GET['un']!=""){
      $username=base64_decode($_GET['un']);
    }else{
 ?>
 <script>
  alert('You Are Not Logged In !! Please Login to access this page');
  window.location='login_user.php';
 </script>
 <?php
 }
 ?>

 <!-- rid should be passed into this php file as '$rid'-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <script type="text/javascript" src="js/functions.js"></script>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/count.js"></script>
 <script type="text/javascript" src="#"></script>
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
    alert(window.location='user_logout.php');
   }
  }
  function check()
  {
   if(document.getElementById("txt_username").value =="")
   {
    alert('Please Enter Category !!'); 
    document.getElementById("txt_username").focus();
    return false;
   }
  }
  function charcount()
  {
   document.getElementById('static1').innerHTML = "Characters Remaining:  <span  id='charsLeft1'>   100 </span>";   
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
      <div id="subsidebar3"> My Account </div>
		<div id="subsidebar2">
			<li><a href="MyBidProducts.php?un=<?php echo base64_encode($username); ?>">My Bid Products</a></li>
		</div>
		<div id="subsidebar2">
			<li><a href="records.php?un=<?php echo base64_encode($username); ?>">My Buying Records</a></li>
		</div>
		<div id="subsidebar2">
			<li><a href="rating_records.php?un=<?php echo base64_encode($username); ?>">Rating</a></li>
		</div>
		<div id="subsidebar2">
			<li><a href="myHomePage.php?un=<?php echo base64_encode($username); ?>">Edit My Information</a></li>
		</div>
		<div id="subsidebar2">
			<li><a href="productsdisplay.php?un=<?php echo base64_encode($username); ?>">Return to Main Page</a></li>
		</div>
    </div>
    <!-- end #sidebar1 -->
  </div>
   </div>
  <div id="mainContent">
    <div id="mainContent1">
    <div id="middletxtheadermain">
      <div id="middletxtheader">Bought Item Rating Page</div>
      <div id="middletxt1">
        <p>Enter the rating and comments of  a Bought Item.</p>
      </div>
      </div>
      <div id="middletxt">
        <form action="" method="post" name="frm_addcat" id="frm_addcat" enctype="multipart/form-data">
          <table width="100%" border=0>
            <tr>
              <td height="22"><table width="100%" border=0>
                  <tr>
                    <th colspan="5" id="formhedear">Bought Item Rating Master</th>
                  </tr>
                  
                  <input type="hidden" name="username" id="username" value="" />


                  <tr>
                    <td style="width:250px;"><div align="right"><strong><font color="#FF0000">*</font>Score : &nbsp;&nbsp;&nbsp;</strong></div></td>
                    <td ><div align="left"><select name="score" id="score" style="width:100px;">
                                         <option value="score">- Select -</option>
                        <?php
                      for($k=1;$k<=5;$k++)
                      {?>
                            <option value="<?php echo $k;?>"><?php echo $k;?></option>
                      <?php
                      }?></div></td>
                  </tr>


                  </tr>
                   <tr>
                    <td style="width:250px;"><div align="right"><strong>Comments :&nbsp;&nbsp;&nbsp;&nbsp;</strong></div>
                      <p align="right" class="example">(Maximum 500 characters) </p></td>
                      <td width="128"><textarea name="tamsg" id="tamsg" wrap="physical" cols="45" rows="5" title="Comments Should not excide 500 characters !!"
                                       onchange=" document.getElementById('tamsg').value=trim(this.value);"></textarea><br>
                                    Characters Remaining: <span id="charsLeft1">500</span></td>
                    </tr>
                  <tr>

                  <tr>
                    <td></td>
                    <td colspan="3" >&nbsp;&nbsp;&nbsp;<!--Onclick="return done(this.form);"-->
                      <input type="submit"  id="submitMain" name="submitMain" value="Add" Onclick="return check(this.form);" > 
                      &nbsp;&nbsp;&nbsp;
                      <input type="reset" id="subintr" name="subintr" value="Reset"  /></td>
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

<!-- Code for inserting into data base -->
 <?php
  if(isset($_POST['submitMain']))
  {
	  date_default_timezone_set('America/New_York');
	  
  	#$rid
   $check=1;
   $score=$_POST['score'];
   $message=$_POST['tamsg'];

   $get= @mysql_query("SELECT userName FROM record_buy WHERE rid = '$rid'")or die(mysql_error());
   $num = @mysql_num_rows($get);
   if(mysql_num_rows($get)>0)
   {
     for($i=0;$i<$num;$i++)
      {
        $row= @mysql_result($get,$i,'userName');
        if($row!=$username){
          $check=0;
          }
      }
   }else
   {
     $check=0;
   }
   //while($subcat = mysql_fetch_array($subct)){
    //$cur=$subct['caid'];
   //}
   //$catdec=$_POST['ta_catdcpn'];
   
   $r_rID= "r_r";
   $userName=$username;
   $time = date("YmdHis");
   $r_rID .=$time;
   $currentTime=date("Y-m-d H:i:s");
   $ratingID=$r_rID;
   if($check==1){
   $query = mysql_query("INSERT INTO rating (ratingID,score, message) VALUES ('$ratingID','$score','$message')
    ")or die(mysql_error());
   $query = mysql_query("   INSERT INTO rate_record (r_rID,userName,rid,ratingID,time) VALUES ('$r_rID','$userName','$rid','$ratingID','$currentTime')
    ")or die(mysql_error());
    echo "<script>alert('User rating added sucessfully !!');</script>";
  }else{
      echo '<div align="center"><strong><font color="#FF0000">You have not bought this item!!</font></Strong></div>';
  }
  }

?>
</body>
</html>