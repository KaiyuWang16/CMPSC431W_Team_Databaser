<?php
 include("config/config.php");
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
 if ($_GET['sub']!=""){
	 $selected_caid = $_GET['sub'];
 } else {
  ?>
   <script>
    alert('Error! Please return to the last page');
    window.location = 'bidproductsdisplay.php?&un=<?php echo base64_encode($username);?>';
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

<div id="container" >
  <div id="container1"></div> 
  <div align="left"><img src="images/1.jpeg" alt="Online Shopping" width="1680" height="100" /> </div>
  <div id="sidebar1">
        <div id="subsidebar1">
      <div id="subsidebar3"> Category </div>
<div id="wrapper">
 <?php
   $get_catgry=mysql_query("SELECT DISTINCT(caName) FROM category WHERE parentID='0' ")or die(mysql_error());
   $num_cat=mysql_num_rows($get_catgry);
   for($i=0;$i<$num_cat;$i++)
   {
    $category = @mysql_result($get_catgry,$i,'caName');
  ?>
<div id="subsidebar2">
  <dl class="dropdown">
    <dt id="<?php echo $i;?>-ddheader" class="upperdd" onmouseover="ddMenu('<?php echo $i;?>',1)" onmouseout="ddMenu('<?php echo $i;?>',-1)"><?php echo $category;?></dt>
    <dd id="<?php echo $i;?>-ddcontent" onmouseover="cancelHide('<?php echo $i;?>')" onmouseout="ddMenu('<?php echo $i;?>',-1)">
 <?php
    $get_caid=mysql_query("SELECT * FROM category WHERE caName='$category' ")or die(mysql_error());
    $num_caid=@mysql_num_rows($get_caid);
	for($k=0;$k<$num_caid;$k++)
	{
		$caid = @mysql_result($get_caid,$k,'caid');
	
			
	$get_scatgry=mysql_query("SELECT * FROM category WHERE parentID='$caid' ")or die(mysql_error());
    $num_scat=@mysql_num_rows($get_scatgry);
  ?>
      <ul>
        <?php 
			for($j=0;$j<$num_scat;$j++)
              {
               $sub_category=mysql_result($get_scatgry,$j,'caName');
			   $sub_caid=mysql_result($get_scatgry,$j,'caid');
       ?>
        <li><a href="bidproductsdisplay_cat.php?sub=<?php echo $sub_caid?>&un=<?php echo base64_encode($username);?>" class="underline"><?php echo $sub_category;?></a></li>
 <?php
              }
 }
 ?>
      </ul>
    </dd>
   </dl>
</div>
 <?php
   
  }
 ?>

   </div><!-- end #wrapper class -->
    
	<div id="subsidebar3"> Menu </div>
      <div id="subsidebar2">
	  <li><a href="productsdisplay.php?un=<?php echo base64_encode($username); ?>">Buy Product</a></li></div>
	  <div id="subsidebar2">
	  <li><a href="bidproductsdisplay.php?un=<?php echo base64_encode($username); ?>">Bid Product</a></li>
      </div>
	  
	  	<div id="subsidebar3"> My Account </div>
		<div id="subsidebar2">
	  <li><a href="myHomePage.php?un=<?php echo base64_encode($username); ?>">Go to my Page</a></li>
	   </div>

	  
	</div>
	
	
	</div>
    <!-- end #sidebar1 -->
	
	
	
	</div>
	
<div id="mainContent">
    <div id="mainContent1">
    
    <?php
	//this place: find the cart according to the username
    $cartcount=@mysql_query("SELECT * from cart WHERE userName='$username'");
    $ccount=@mysql_num_rows($cartcount);
    ?>
     <div id="middletxt">
       <div id="middletxtheader">
	<div style="float:left;">Products</div>
       <div style="float:right;">
	<a href="MyBidProducts.php?un=<?php echo base64_encode($username); ?>">Bidding History </a></div>
      <div class="clear"></div>
      <!--middletxtheader--> </div>
	  
	  <!-- end #middletxt -->
	<form name="frm_main" id="frm_main" method="post" action="">
      <table border="1" cellpadding="0" cellspacing="0" width="1325" height="300">
	<!-- MSTableType="layout" -->
<tr>
	<td width="40"><p align="Center"></td>
	<td width="200"><p align="Center">Product Name</td>
	<td width="200"><p align="Center">Picture</td>
	<td width="250"><p align="Center">Attribute</td>
	<td width="200"><p align="Center">Description</td>
	<td width="200"><p align="Center">Bidding Time</td>
	 
 </tr>
	
<?php
    //dispaly products
    $adjacents = 3;
	
	/* Setup vars for query. */
	$targetpage = "bidproductsdisplay_cat.php"; 	//your file name  (the name of this file)
	$limit = 4; 								//how many items to show per page
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	$query="SELECT COUNT(*) AS num FROM item i, bitem s, category c WHERE i.tid = s.tid AND c.caid = '$selected_caid' AND i.caid = c.caid";
	//$query="SELECT COUNT(*) AS num FROM bitem s, item i, category c WHERE i.tid = s.tid AND c.caName = '$selected_caid'";
	//echo $query;
	$total_pages = mysql_fetch_array(mysql_query($query));
	//echo $total_pages;
	//$num = @mysql_num_rows($total_pages);
	$num = @mysql_num_rows($total_pages);
	
	$total_pages = $total_pages[$num];
	//echo $total_pages;
	//echo "abcdefg";
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 2;						//last page minus 1
	
	$sitems_query = "SELECT * FROM item i, bitem s, category c WHERE i.tid = s.tid AND c.caid = '$selected_caid' AND i.caid = c.caid";
	$get= @mysql_query($sitems_query)or die(mysql_error());
    $num = @mysql_num_rows($get);
	
    for($i=0;$i<$num;$i++)
    {
	  //attributes from Item entity:
     $prid= @mysql_result($get,$i,'tid');
     $psname= @mysql_result($get,$i,'title');
     //$plname= @mysql_result($get,$i,'prd_lname');
     //$pimg= @mysql_result($get,$i,'prd_photo');
     $psize= @mysql_result($get,$i,'size');
     //$puom= null //@mysql_result($get,$i,'prd_uom');
     //$pqty= @mysql_result($get,$i,'prd_qty');
     //$pqtyavb= @mysql_result($get,$i,'prd_qtyavb');
     $pcolor= @mysql_result($get,$i,'color');
     /*$pfeatures= @mysql_result($get,$i,'prd_feature');
     $psdis= @mysql_result($get,$i,'prd_sdis');
     $pldis= @mysql_result($get,$i,'prd_ldis');
     $pstatus= @mysql_result($get,$i,'prd_status');
     $pdel= @mysql_result($get,$i,'prd_delivery_mode');
     $pdlead= @mysql_result($get,$i,'prd_delivery_leadtime');
     $psep= @mysql_result($get,$i,'prd_sep');*/
	 $pdescription=@mysql_result($get, $i, 'description');
	 $plocation=@mysql_result($get, $i, 'location');
	 //attributes from Sitem entity
	 $pprice=@mysql_result($get, $i, 'price');
	 $pqty= @mysql_result($get,$i,'quantity');
	 $picUrl= @mysql_result($get,$i,'picUrl');
	 $pstart= @mysql_result($get,$i,'startTime');
	 $pend=@mysql_result($get, $i, 'endTime');
 ?>

 <tr>
   <td align="center" width="40"><input type="checkbox" name="chk<?php echo $i; ?>" id="chk<?php echo $i; ?>" value="<?php echo $prid; ?>"></td>
   <td width="400"><p align="Center"><?php echo $psname;?></td></p>
   <td width="300"><p align="center">
     <img id="" src="<?php echo $picUrl; ?>" width=60 height=60 />
    </p></td>
    <td width="500"><p align="center">
                    <?php if($psize=="") { } else {?>
	            Product Size / Dimension : <?php echo $psize;?> <br/>
	            <?php } ?>
                    <?php if($pcolor=="") { } else {?>
	            Color : <?php echo $pcolor;?> <br/>
				 <?php } ?>
                    <?php if($pcolor=="") { } else {?>
	            Location : <?php echo $plocation;?> <br/>
	            <?php } ?>
				    <?php if($pcolor=="") { } else {?>
	           
				<?php } ?>
                    <?php if($pbrand=="") { } else {?>
	            Brand : <?php echo "see description";?> <br/></p>
	            <?php } ?>
				    <?php if($pstart=="") { } else {?>
	            
				
    </td>

	<td width="400"><p align="center"><br/><?php echo $pdescription;?> 
    </p></td>
	
	<td width="500"><p align="center">Start Time : <?php echo $pstart;?> <br/>
	            <?php } ?>
				    <?php if($pend=="") { } else {?>
	            End Time : <?php echo $pend;?> <br/></p>
	            <?php } ?>
				
    </td>

   
 </tr>
 <?php
}
?>
<tr>
  <td align="center" colspan="10">
    <input type="submit" name="sub" id="sub" value="I want to bid this product!" onclick="return chkprdval();"><!--</a>--></td>
 </tr>
 
 </table>
   </form>
<input type="hidden"  name="hdnprdnum" id="hdnprdnum" value="<?php echo $num; ?>">
<script language="javascript">
 function chkprdval()
 {
  var count=0;
  length=document.getElementById("hdnprdnum").value;
  for(j=0;j<length;j++)
  {
   if(document.getElementById("chk"+j).checked)
    {
     count++;
    }
  }
  if(count==0)
  {
   alert("Please select any one product");
   return false;
  } else if (count > 1){
	  alert("You can only bid one item at one time");
	  return false;
  }
 }
</script>

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
  
 <?php
   if(isset($_POST['sub'])){
		for($b=0;$b<$num;$b++)
          {
	    if(isset($_POST['chk'.$b]))
	    {
			$pid=$_POST['chk'.$b];
			echo "$pid";
			$get= @mysql_query("SELECT * FROM bitem b,item i WHERE b.tid=i.tid and i.tid='$pid' ")or die(mysql_error());
              $num1 = @mysql_num_rows($get);
              for($i=0;$i<$num1;$i++)
              {
                $btid= @mysql_result($get,$i,'btid');
			  }
		 	 
		}
	      }
		  $un=base64_encode($username);
	//	echo "<script>alert('$btid');</script>";
		echo "<script>window.location='bidproduct.php?un=$un&bid=$btid'</script>";
	}
	 
 ?>
 </div>
</body>
</html>