<?php
 session_start();
 include("config/config.php");
 echo $username;
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Online Shopping</title>
 <link href="css/Webpage.css" rel="stylesheet" type="text/css" />
 <link href="css/flyout.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="js/flyout.js"></script>
 <script type="text/javascript" src="js/main.js"></script>
 <style type="text/css" media="all">
  @import "Webpage.css";
 </style>
</head>

<body class="twoColFixLtHdr">
<div id="header">
  <!-- end #header -->
</div>
<div id="container" >
  <div id="container1"></div> 
  <div align="left"><img src="images/1.jpeg" alt="Online Shopping" width="1680" height="100" /> </div>
  <div id="sidebar1">
        <div id="subsidebar1">

	  
	  <div id="subsidebar3"> Menu</div>
	  <div id="subsidebar2">
	  <a href="loghome.php?un=<?php echo base64_encode($username); ?>">Home Page</a></div>
      <div id="subsidebar2">
	  <a href="sitem_user_add.php?un=<?php echo base64_encode($username); ?>">Add a Product For Sell</a></div>
	  <div id="subsidebar2">
	  <a href="bitem_user_add.php?un=<?php echo base64_encode($username); ?>">Add a Product For Bidding</a>
      </div>
	  
	  	<div id="subsidebar2">
	  <a href="rating_buyer.php?un=<?php echo base64_encode($username);?>">Rate Buyer</a>
	   </div>
	   <div id="subsidebar2">
		<a href="edit_records.php?un=<?php echo base64_encode($username);?>">Manage Records</a>
	   </div>
		<div id="subsidebar2"><a href="login_user.php" onclick="logoutcon();">Log out</a> 
      </div>

	  
	</div>
	
	
	</div>
    <!-- end #sidebar1 -->
	
	
	
	</div>
	  
	  
  <div id="mainContent">
    <div id="mainContent1">
    
     <div id="middletxt">
       <div id="middletxtheader">
	<div style="float:left;">Buying Records</div>
     
      <div class="clear"></div>
      <!--middletxtheader--> </div>
	  
	  <!-- end #middletxt -->
	<form name="frm_main" id="frm_main" method="post" action="">
      <table border="1" cellpadding="0" cellspacing="0" width="1325" height="300">
	<!-- MSTableType="layout" -->
<tr>
	<td width="200"><p align="Center">Record ID</td>
	<td width="200"><p align="Center">Buyer Name</td>
	<td width="200"><p align="Center">Quantity</td>
	<td width="250"><p align="Center">Color</td>
	<td width="200"><p align="Center">Size</td>
	<td width="200"><p align="Center">Buy Time</td>
	<td width="200"><p align="Center">Status</td>
	
	 
 </tr>
	<!-- MSTableType="layout" -->
	
<?php
    //dispaly products
	date_default_timezone_set('America/New_York');
	$stid_query = "select * from user_sitem s WHERE s.userName='$username'";
	$get= @mysql_query($stid_query)or die(mysql_error());
    $num = @mysql_num_rows($get);

    for($i=0;$i<$num;$i++)
    {
	  //attributes from Item entity:
     $stid= @mysql_result($get,$i,'stid');
	
	$querySitem = "select * from record_buy r WHERE r.stid='$stid'";
	$getSitem= @mysql_query($querySitem)or die(mysql_error());
    $numSitem = @mysql_num_rows($getSitem);
	if($numSitem>0){
		for($n=0;$n<$numSitem;$n++)
		{
			//attributes from Item entity:
			$rid= @mysql_result($getSitem,$n,'rid');
			$buyerName= @mysql_result($getSitem,$n,'userName');
			$buyTime= @mysql_result($getSitem,$n,'buyTime');
			$status= @mysql_result($getSitem,$n,'status');
			$quantity= @mysql_result($getSitem,$n,'quantity');
			$color= @mysql_result($getSitem,$n,'color');
			$size= @mysql_result($getSitem,$n,'size');
		}
		?> <tr><td width="250"><p align="Center"><a href="rating.php?un=<?php echo base64_encode($username); ?>&rid=<?php echo $rid;?>">
		<?php
		echo $rid;
		?></a></td></p>
		<?php
	?> 
    </td>
	<td width="100"><p align="Center"><?php echo $buyerName;?></td></p>
	<td width="100"><p align="Center"><?php echo $quantity;?></td></p>
	<td width="150"><p align="Center"><?php echo $color;?></td></p>
	<td width="150"><p align="Center"><?php echo $size;?></td></p>
	<td width="150"><p align="Center"><?php echo $buyTime;?></td></p>
	<td width="150"><p align="Center"><?php 
		if($status==2){?>
			<input type="submit" class="button" name="sendBtn" id="sendBtn" value="Send Package" style="width:100px;" />
<?php		}else if($status==3){
			echo "Is delivering :)";
		}
		
		if(isset($_POST['sendBtn']))
		{
			$un = base64_encode($username);
			$upDate = mysql_query("UPDATE record_buy r SET r.status=3 WHERE r.rid='$rid'") or die(mysql_error());
			echo "<script>window.location='edit_records.php?un=$un'</script>";
		}
	}
	?></td></p>
 </tr>
 <?php

	}
	$btid_query = "select * from user_bitem s WHERE s.userName='$username'";
	$getB= @mysql_query($btid_query)or die(mysql_error());
    $numB = @mysql_num_rows($getB);
	
    for($b=0;$b<$numB;$b++)
    {
	  //attributes from Item entity:
     $btid= @mysql_result($getB,$b,'btid');
	 ?>
 <?php 
	
	$querySitem = "select * from record_buy r WHERE r.stid='$btid'";
	$getSitem= @mysql_query($querySitem)or die(mysql_error());
    $numSitem = @mysql_num_rows($getSitem);
	if($numSitem>0){
		for($n=0;$n<$numSitem;$n++)
		{
			//attributes from Item entity:
			$rid= @mysql_result($getSitem,$n,'rid');
			$buyerName= @mysql_result($getSitem,$n,'userName');
			$buyTime= @mysql_result($getSitem,$n,'buyTime');
			$status= @mysql_result($getSitem,$n,'status');
			$quantity= @mysql_result($getSitem,$n,'quantity');
			$color= @mysql_result($getSitem,$n,'color');
			$size= @mysql_result($getSitem,$n,'size');
		}?>
		<tr>
  
    <td width="250"><p align="Center"><a href="rating.php?un=<?php echo base64_encode($username); ?>&rid=<?php echo $rid;?>">
		<?php echo $rid;
	
		?></a></td></p>
		<?php

	?> 
    </td>
	<td width="100"><p align="Center"><?php echo $buyerName;?></td></p>
	<td width="100"><p align="Center"><?php echo $quantity;?></td></p>
	<td width="150"><p align="Center"><?php echo $color;?></td></p>
	<td width="150"><p align="Center"><?php echo $size;?></td></p>
	<td width="150"><p align="Center"><?php echo $buyTime;?></td></p>
	<td width="150"><p align="Center"><?php 
		if($status==2){?>
			<input type="submit" class="button" name="sendBtn" id="sendBtn" value="Send Package" style="width:100px;" />
<?php		}else if($status==3){
			echo "Is delivering :)";
		}
		
		if(isset($_POST['sendBtn']))
		{
			$un = base64_encode($username);
			$upDate = mysql_query("UPDATE record_buy r SET r.status=3 WHERE r.rid='$rid'") or die(mysql_error());
			echo "<script>window.location='edit_records.php?un=$un'</script>";
		}
	
	?></td></p>
 </tr>
 <?php
 }
}
	 
	 
?>

 
 </table>
   </form>
<input type="hidden"  name="hdnprdnum" id="hdnprdnum" value="<?php echo $num; ?>">


<?php
    $pagination = "";
	if($lastpage > 1)
	{
	        $un=base64_encode($username);
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?un=$un&page=$prev\">  Previous  </a>";
		else
			$pagination.= "<span class=\"disabled\">  Previous  </span>";	
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">  $counter  </span>";
				else
					$pagination.= "<a href=\"$targetpage?un=$un&page=$counter\">  $counter  </a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">  $counter  </span>";
					else
						$pagination.= "<a href=\"$targetpage?un=$un&page=$counter\">  $counter  </a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?un=$un&page=$lpm1\">  $lpm1  </a>";
				$pagination.= "<a href=\"$targetpage?un=$un&page=$lastpage\">  $lastpage  </a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?un=$un&page=1\">  1  </a>";
				$pagination.= "<a href=\"$targetpage?un=$un&page=2\">  2  </a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
				  
				  echo "cou=".$counter;
				  echo "page=".$page;
					if ($counter == $page)
						$pagination.= "<span class=\"current\">  $counter  </span>";
					else
						$pagination.= "<a href=\"$targetpage?un=$un&page=$counter\">  $counter  </a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?un=$un&page=$lpm1\">  $lpm1  </a>";
				$pagination.= "<a href=\"$targetpage?un=$un&page=$lastpage\">  $lastpage  </a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?un=$un&page=1\"> 1 </a>";
				$pagination.= "<a href=\"$targetpage?un=$un&page=2\"> 2 </a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">  $counter  </span>";
					else
						$pagination.= "<a href=\"$targetpage?un=$un&page=$counter\">  $counter  </a>";					
				}
			}
		}
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?un=$un&page=$next\">  Next </a>";
		else
			$pagination.= "<span class=\"disabled\">  Next </span>";
		$pagination.= "</div>\n";		
	}
?>

<div id="middletxtheader">
<?php  echo $pagination;  ?> 
</div>
	
	</div>
   </div>
   <!--end mainContent-->
    </div>
	 <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->
	 <!--end container-->
  </div>
  
 
 </div>
</body>
</html>