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
	<div style="float:left;">Bidding History</div>
     
      <div class="clear"></div>
      <!--middletxtheader--> </div>
	  
	  <!-- end #middletxt -->
	<form name="frm_main" id="frm_main" method="post" action="">
      <table border="1" cellpadding="0" cellspacing="0" width="1325" height="300">
	<!-- MSTableType="layout" -->
<tr>

	<td width="200"><p align="Center">Product Name</td>
	<td width="200"><p align="Center">Your Price($)</td>
	<td width="250"><p align="Center">Your Bidding Time</td>
	<td width="200"><p align="Center">Status</td>
	
	 
 </tr>
	<!-- MSTableType="layout" -->
	
<?php
    //dispaly products
	date_default_timezone_set('America/New_York');
	$bid_query = "select * from (select MAX(p2.givenPrice) AS maxGivenPrice, p2.btid from bidprocess_bid p2 WHERE p2.userName='$username' GROUP BY p2.btid) AS t, bidprocess_bid p1, bitem b, item i where p1.givenPrice=t.maxGivenPrice AND t.btid=p1.btid AND b.btid=t.btid AND i.tid=b.tid";
	$get= @mysql_query($bid_query)or die(mysql_error());
    $num = @mysql_num_rows($get);
	
    for($i=0;$i<$num;$i++)
    {
	  //attributes from Item entity:
     $bid= @mysql_result($get,$i,'bid');
     $btid= @mysql_result($get,$i,'btid');
     $givenPrice= @mysql_result($get,$i,'givenPrice');
     $givenTime= @mysql_result($get,$i,'currentTime');
	 $title= @mysql_result($get,$i,'title');
	 $endTime = @mysql_result($get,$i,'endTime');
	 $status = @mysql_result($get,$i,'status');
 ?>
 <tr>
  
    <td width="150"><p align="Center"><?php echo $title;?></td></p>
	<td width="220"><p align="Center"><?php echo $givenPrice;?> <br/>
	<td width="220"><p align="Center"><?php echo $givenTime;?> <br/>
	<td width="300"><p align="Center">  <br/><?php 
		$max_query = "SELECT MAX(givenPrice) AS givenPrice FROM bidprocess_bid WHERE btid='$btid'";
		$getmax= @mysql_query($max_query)or die(mysql_error());
		$numMAX = @mysql_num_rows($getmax);
		for($m=0;$m<$numMAX;$m++)
		{
			//attributes from Item entity:
			$max= @mysql_result($getmax,$m,'givenPrice');
		}
		
		
		$maxDouble=(double)$max;
		$givenPriceDouble= (double)$givenPrice;
		
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
		
		
	?> <br/>
    </td>

   
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