 <?php
  include("config/config.php");
    $username=base64_decode($_GET['un']); 
	$btid=$_GET['bid']; 
   
    //echo "Product Count".$pcount;
   if($_GET['un']==""){ ?>
   <script>
   alert('You Are Not Logged In !! Please Login to access this page');
  window.location='login_user.php';
 </script>
 <?php
 } else {
  $username=base64_decode($_GET['un']); 
  	$btid=$_GET['bid']; 
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
      <div id="subsidebar3"> Menu</div>
      <div id="subsidebar2"><a href="bidproductsdisplay.php?un=<?php echo base64_encode($username);?>"><b>Return to bidding items list</b></a></div>
      
    </div>
    <!-- end #sidebar1 -->
  </div>
  </div>
  <div id="mainContent">
    <div id="mainContent1">
   
      <div id="middletxt">
       <div id="middletxtheader">Bid Item You choose</div>
        <!-- end #middletxt -->
	<form name="frm_cart" id="frm_cart" method="post" action="">
        <table border="1" cellpadding="0" cellspacing="0" width="1325" height="300">
	<!-- MSTableType="layout" -->
<tr>
	<td width="200"><p align="Center">Product Name</td>
	<td width="200"><p align="Center">Picture</td>
	<td width="250"><p align="Center">Attribute</td>

	<td width="200"><p align="Center">Bidding Time</td>
	 
 </tr>
	<!-- MSTableType="layout" -->
<?php
     $get= @mysql_query("SELECT * FROM bitem b, item i WHERE b.btid='$btid' and b.tid=i.tid")or die(mysql_error());
     $num = @mysql_num_rows($get);
     for($i=0;$i<$num;$i++)
     {
      $reserverPrice= @mysql_result($get,$i,'reserverPrice');
      $startTime= @mysql_result($get,$i,'startTime');
      $endTime= @mysql_result($get,$i,'endTime');
      $color= @mysql_result($get,$i,'color');
      $size= @mysql_result($get,$i,'size');
	  $title= @mysql_result($get,$i,'title');
	  $picUrl= @mysql_result($get,$i,'picUrl');
	  
 ?>
 <tr>

    
    <td width="200"><p align="Center">Product Title:<br/><?php echo $title;?></td></p>
    <td><p align="center">
     <img id="" src="<?php echo $picUrl; ?>" width=100 height=100 />
    </p></td>
    <td width="120"><p align="left">Quantity: 1<br/><br/>
	Color: <?php echo $color;?> <br/><br/>
	Size : <?php echo $size; ?>
    </td>
	<td width="150"><p align="left">
	Start Time: <br/><?php echo $startTime;?> <br/><br/>
	End Time :  <br/><?php echo $endTime; ?>
    </td>
 </tr>
 <?php
 }
 ?>

 <tr>
  <td align="center" colspan="10">
  <a href="bidproductsdisplay.php?un=<?php echo base64_encode($username);?>"><input type="button" name="btnchange" id="btnchange" value="Change Bidding Item"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </td>
 </tr>
</table>
</form>
<input type="hidden"  name="hdnprdnum" id="hdnprdnum" value="<?php echo $num; ?>"> 

 
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
 
 
<div id="middletxtheader">Enter Your Price</div>
      <form name="frm_cust" id="frm_cust" action="" method="post">
        <table width="100%" border=0>
          <tr>
	     <td width="100" height="37"><div align="right"><strong><font color="#FF0000">*</font>First Name :</strong></div></td>
	     <td width="100"><div align="left">&nbsp;&nbsp;<?php echo $firstName; ?></div></td>
	  </tr>
	   <tr>
	     <td width="100" height="37"><div align="right"><strong><font color="#FF0000">*</font>Your Price :</strong></div></td>
		 <td>&nbsp;&nbsp;$ &nbsp;<input type="textbox" name="txtprice" id="txtprice" maxlength="10" value="" style="width:100px;"
                                         onchange=" document.getElementById('txtprice').value=trim(this.value);"/></td>
										 
	  </tr>
	 
          <tr><br/>
          <td colspan="3" align="center"><input type="submit" name="subbid" id="subbid" value="Bid" style="width:100px;" onclick="return done(this.form);">
          </td>
          </tr>
        </table>
      </form>
      </div>
    </div>
    <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->
</div>
  <!-- end #container -->

 <?php
        if(isset($_POST['subbid']))
        {
		 $price=$_POST['txtprice'];

		 
		 date_default_timezone_set('America/New_York');
		 $priceDouble = (double)$price;
		 $reserverPriceDouble = (double)$reserverPrice;
		 
         $currentTime=date("Y-m-d H:i:s");
		 if(strtotime($startTime)<strtotime($currentTime)){
			if(strtotime($endTime)>strtotime($currentTime)){
				if($priceDouble>=$reserverPriceDouble){
					$getMaxPrice= @mysql_query("SELECT * FROM bidprocess_bid WHERE btid='$btid'")or die(mysql_error());
					$numMax = @mysql_num_rows($getMaxPrice);
					for($p=0;$p<$numMax;$p++)
					{
						$givenPrice= @mysql_result($getMaxPrice,$p,'givenPrice');
						$maxPriceTime= @mysql_result($getMaxPrice,$p,'currentTime');
					}
					$givenPriceDouble = (double)$givenPrice;
					if($priceDouble>=$givenPriceDouble+2 && strtotime($maxPriceTime)<strtotime($currentTime)){
						echo "price and time both are ok!";
						$bid = "b";
						$bid .=date("YmdHis");
   
						$insertRecord = mysql_query("INSERT INTO bidprocess_bid (bid,userName,btid,givenPrice,currentTime,status)
                      VALUES ('$bid','$username','$btid','$priceDouble','$currentTime',0)") or die(mysql_error());
					  echo "<script>alert('Thank You For bidding! Please wait for the bidding result patiently, good luck^0^');</script>";
					}else{
						echo "<script>alert('Your price must be $2 larger than the maximum given price at current!');</script>";
					}
				} else{
					echo "<script>alert('Your price too low, do not be too mean!');</script>";
				}
			} else{
				echo "<script>alert('Bidding is over :( Please choose product again!');</script>";
			}
		}else{
			echo "<script>alert('Bidding does not start Now, please wait :)');</script>";
		}
		  
/*
	 for($i=0;$i<$num;$i++)
          {
			  
			   $rID = "r";
		  $rID .= $i;
		  $rID .= date("YmdHis");
		  
		$cartID= @mysql_result($get,$i,'cartID');
		$stid= @mysql_result($get,$i,'stid');
		$color= @mysql_result($get,$i,'color');
		$size= @mysql_result($get,$i,'size');
		$quantity= @mysql_result($get,$i,'quantity');
		
	    $qtyavb=@mysql_result(@mysql_query("SELECT quantity FROM sitem WHERE stid='$stid'"),0,'quantity');
	    $qtyavb = $qtyavb - $quantity;
		
	   if($qtyavb == 0 )
	   {
	      $prdupdate=@mysql_query("UPDATE sitem SET quantity='$qtyavb' WHERE stid='$stid'");
          // mail() for product stock empty

	   } else
	   {
	     $prdupdate=@mysql_query("UPDATE sitem SET quantity='$qtyavb' WHERE stid='$stid'");
	   }
	      $insertRecord = mysql_query("INSERT INTO record_buy (rid,stid,userName,cnumber,aid,color,quantity,size,buyTime,status)
                      VALUES ('$rID','$stid','$username','$card','$address','$color','$quantity','$size','$buyTime','$status')") or die(mysql_error());
           $delCart = mysql_query("DELETE from cart WHERE cartID='$cartID'") or die(mysql_error());
	  }
	  // mail(); for vendors
         
  	  // mail(); for Customer
  
	     $un=base64_encode($username);
 	 echo "<script>alert('Thank You For Shopping ! ');</script>";
	 echo "<script>window.location='productsdisplay.php?un=$un'</script>";
  //       echo "<script>window.location='ok.php?un=$un'</script>";
  */
	}
  ?>
</body>
</html>
 
 
