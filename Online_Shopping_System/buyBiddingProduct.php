 <?php
  include("config/config.php");
    $username=base64_decode($_GET['un']); 
    $bid = $_GET['bid'];
    //echo "Product Count".$pcount;
   if($_GET['un']==""){ ?>
   <script>
	alert('You Are Not Logged In !! Please Login to access this page');
	window.location='login_user.php';
 </script>
 <?php
 } else {
  $username=base64_decode($_GET['un']); 
 }
?>


 
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Shopping</title>
<link href="css/Webpage.css" rel="stylesheet" type="text/css" />
<link href="css/flyout.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/cart.js"></script>
<script type="text/javascript" src="js/flyout.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/count.js"></script>
<script type="text/javascript" src="js/ajax_captcha.js"></script>
<script type="text/javascript" src="js/cartvalidation.js"></script>
<style type="text/css" media="all">
@import "Webpage.css";
</style>
<script language="javascript">
  function charcount()
 {
  document.getElementById('static').innerHTML = "Characters Remaining:  <span  id='charsLeft1'>   100 </span>";
  document.getElementById('static').innerHTML = "Characters Remaining:  <span  id='charsLeft2'>   100 </span>";
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

      <div id="middletxt">
       <div id="middletxtheader">Bidding Item</div>
        <!-- end #middletxt -->
	<form name="frm_cart" id="frm_cart" method="post" action="">
        <table border="1" cellpadding="0" cellspacing="0" width="1340">
		<tr>

	<td width="200"><p align="Center">Product Name</td>
	<td width="200"><p align="Center">Picture</td>
	<td width="250"><p align="Center">Quantity</td>
	<td width="200"><p align="Center">Price($)</td>
	
	 
 </tr>
	<!-- MSTableType="layout" -->
<?php
     $get= @mysql_query("SELECT * FROM bidprocess_bid p, bitem b, item i WHERE bid='$bid' AND i.tid=b.tid AND b.btid=p.btid")or die(mysql_error());
     $num = @mysql_num_rows($get);
	 $total=0.0;
     for($i=0;$i<$num;$i++)
     {
      $userName= @mysql_result($get,$i,'userName');
      $btid= @mysql_result($get,$i,'btid');
      $color= @mysql_result($get,$i,'color');
      $size= @mysql_result($get,$i,'size');
	  $title= @mysql_result($get,$i,'title');
	  $picUrl= @mysql_result($get,$i,'picUrl');
	  $givenTime= @mysql_result($get,$i,'currentTime');
	  $givenPrice= @mysql_result($get,$i,'givenPrice');
	  
 ?>
 <tr>
 
    <td width="110"><p align="Center"><?php echo $title;?></td></p>
    <td><p align="center">
     <img id="" src="<?php echo $picUrl; ?>" width=60 height=60 />
    </p></td>
    <td width="250"><p align="center">1
    </td>
    <td width="105"><p align="center"><?php echo $givenPrice;?> 
    </td>
 </tr>
 <?php
	  
 }
 ?>


</table>
</form>

 
 <?php
     $getUser= @mysql_query("SELECT * FROM registereduser WHERE userName='$username'")or die(mysql_error());
     $numUser = @mysql_num_rows($getUser);
     for($i=0;$i<$numUser;$i++)
     {
      $firstName= @mysql_result($getUser,$i,'firstName');
      $lastName= @mysql_result($getUser,$i,'lastName');
      $email= @mysql_result($getUser,$i,'email');
	 }
	  
 ?>
 
 
<div id="middletxtheader">Enter Your Information</div>
      <form name="frm_cust" id="frm_cust" action="" method="post">
        <table width="100%" border=0>
          <tr>
	     <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>First Name :</strong></div></td>
	     <td width="128"> &nbsp;&nbsp;<?php echo $firstName; ?></td>
	  </tr>
	  <tr>
	     <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Last Name : </strong></div></td>
            <td width="128"> &nbsp;&nbsp;<?php echo $lastName; ?></td>
	  </tr>
	  <tr>
	      <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>E-mail: </strong></div></td>
            <td width="128"> &nbsp;&nbsp;<?php echo $email; ?></td>
	  </tr>
	  <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Shipping Address :</strong></div></td>
                  <td width="128"><select name="seladdress" id="seladdress" style="width:300px;">
	                         <option value="seladdress">--Select--</option>
                                  <?php
                                  $get_add=mysql_query("SELECT * FROM address WHERE userName='$username'")or die(mysql_error());
                                  $num_add=mysql_num_rows($get_add);
                                  for($i=0;$i<$num_add;$i++)
                                 {
                                  $street=mysql_result($get_add,$i,'street');
								  $city=mysql_result($get_add,$i,'city');
								  $state=mysql_result($get_add,$i,'state');
								  $phone=mysql_result($get_add,$i,'phone');
								  $aid=mysql_result($get_add,$i,'aid');
								  $add = $street." ".$city." ".$state."  phone: ".$phone;
                                 ?>
			          <option value="<?php echo $aid;?>"><?php echo $add;?></option>
                                 <?php
                                 }
                                 ?>
                      </select></td>
                
          </tr>
	  
	  <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Card :</strong></div></td>
                  <td width="128"><select name="selcard" id="selcard" style="width:300px;">
	                         <option value="selcard">--Select--</option>
                                  <?php
                                  $get_card=mysql_query("SELECT * FROM card WHERE userName='$username'")or die(mysql_error());
                                  $num_card=mysql_num_rows($get_card);
                                  for($i=0;$i<$num_card;$i++)
                                 {
                                  $cnumber=mysql_result($get_card,$i,'cnumber');
								  $cardtype=mysql_result($get_card,$i,'type');
								  $card = $cardtype." ".$cnumber;
                                 ?>
			          <option value="<?php echo $cnumber;?>"><?php echo $card;?></option>
                                 <?php
                                 }
                                 ?>
                      </select></td>
                
          </tr>
		  
          <tr><br/>
          <td colspan="3" align="center"><input type="submit" name="subbuy" id="subbuy" value="Buy" style="width:100px;" onclick="return done(this.form);">
          </td>
          </tr>
        </table>
      </form>
      </div>
    </div>
    <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

  <!-- end #container -->

 <?php
        if(isset($_POST['subbuy']))
        {
		 $address=$_POST['seladdress'];
		 $card=$_POST['selcard'];
		 
		 date_default_timezone_set('America/New_York');
		 
		 
		 
          $buyTime=date("Y-m-d H:i:s");
	      $status=2;
	 for($i=0;$i<$num;$i++)
          {
			  
			   $rID = "r";
		  $rID .= $i;
		  $rID .= date("YmdHis");
		  
		
		$color= @mysql_result($get,$i,'color');
		$size= @mysql_result($get,$i,'size');
		$quantity= 1 ;
	  
	      $insertRecord = mysql_query("INSERT INTO record_buy (rid,stid,userName,cnumber,aid,color,quantity,size,buyTime,status)
                      VALUES ('$rID','$btid','$username','$card','$address','$color','$quantity','$size','$buyTime','$status')") or die(mysql_error());
           $upDateBidProcess = mysql_query("UPDATE bidprocess_bid p SET p.status=1 WHERE p.bid='$bid'") or die(mysql_error());
	  }
	  // mail(); for vendors
         
  	  // mail(); for Customer
  
	     $un=base64_encode($username);
 	 echo "<script>alert('Thank You For Shopping ! ');</script>";
	 echo "<script>window.location='productsdisplay.php?un=$un'</script>";
  //       echo "<script>window.location='ok.php?un=$un'</script>";
	}
  ?>
</body>
</html>