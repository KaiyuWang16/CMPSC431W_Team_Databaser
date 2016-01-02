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

	<td width="200"><p align="Center">Product Name</td>
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
	$bid_query = "select * from record_buy r WHERE r.userName='$username'";
	$get= @mysql_query($bid_query)or die(mysql_error());
    $num = @mysql_num_rows($get);
	
    for($i=0;$i<$num;$i++)
    {
	  //attributes from Item entity:
     $rid= @mysql_result($get,$i,'rid');
     $stid= @mysql_result($get,$i,'stid');
     $color= @mysql_result($get,$i,'color');
     $quantity= @mysql_result($get,$i,'quantity');
	 $size= @mysql_result($get,$i,'size');
	 $buyTime = @mysql_result($get,$i,'buyTime');
	 $status = @mysql_result($get,$i,'status');
 ?>
 <tr>
  
    <td width="250"><p align="Center"><a href="rating_item.php?un=<?php echo base64_encode($username); ?>&rid=<?php echo $rid;?>"><?php 
	
	$querySitem = "select * from record_buy r, sitem s WHERE r.userName='$username' AND s.stid='$stid'";
	$getSitem= @mysql_query($querySitem)or die(mysql_error());
    $numSitem = @mysql_num_rows($getSitem);
	if($numSitem==0){
		$queryBitem = "select * from record_buy r, bitem s WHERE r.userName='$username' AND s.btid='$stid'";
		$getBitem= @mysql_query($queryBitem)or die(mysql_error());
		$numbitem = @mysql_num_rows($getBitem);
		
		for($n=0;$n<$numbitem;$n++)
		{
			//attributes from Item entity:
			$tid= @mysql_result($getBitem,$n,'tid');
		}
	}else{
		for($n=0;$n<$numSitem;$n++)
		{
			//attributes from Item entity:
			$tid= @mysql_result($getSitem,$n,'tid');
		}
	}
	//echo $tid;
	$queryItem = "select * from item i WHERE i.tid='$tid'";
	$getItem= @mysql_query($queryItem)or die(mysql_error());
    $numItem = @mysql_num_rows($getItem);
	for($r=0;$r<$numItem;$r++)
		{
			//attributes from Item entity:
			$title= @mysql_result($getItem,$r,'title');
		}
		echo $title;?></a></td></p>
		<?php
/*		
		$currentTime=date("Y-m-d H:i:s");
		
		if(strtotime($endTime)<=strtotime($currentTime)){
			if ($maxDouble==$givenPriceDouble){
				?><a href="buyBiddingProduct.php?un=<?php echo base64_encode($username); ?>&bid=<?php echo $bid;?>">
				
				<?php
				if($status==0){
					echo "Congratulation, you have bidden this product! Click here to pay.";
				}else{
				?></a>
				<?php
				
					echo "Have paid and wait for delivery.";
				}
			} else{
				echo "Sorry, you miss this product!";
			}
		}else{
			echo "Bidding is going on!";
		}
		
		*/
	?> 
    </td>
	<td width="100"><p align="Center"><?php echo $quantity;?></td></p>
	<td width="150"><p align="Center"><?php echo $color;?></td></p>
	<td width="150"><p align="Center"><?php echo $size;?></td></p>
	<td width="150"><p align="Center"><?php echo $buyTime;?></td></p>
	<td width="150"><p align="Center"><?php 
		if($status==2){
			echo "Paid, please waiting for sending:)";
		}else if($status==3){
			echo "The package has been sent :)";
		}
	?></td></p>
 </tr>
 <?php
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