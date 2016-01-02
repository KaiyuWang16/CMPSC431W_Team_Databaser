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
			<li><a href="myHomePage.php?un=<?php echo base64_encode($username); ?>">Rating</a></li>
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
       <div id="middletxtheader">
	<div style="float:left;">Rating</div>
     
      <div class="clear"></div>
      <!--middletxtheader--> </div>
      <!--middletxtheader--> 
    
    <!-- end #middletxt -->
  <form name="frm_main" id="frm_main" method="post" action="">
      <table border="1" cellpadding="0" cellspacing="0" width="685">
  <!-- MSTableType="layout" -->
  <tr>

	<td width="200" height="30"><p align="Center">Score</td>
	<td width="200" height="30"><p align="Center">Comments</td>
	
	 
 </tr>
<?php
    //dispaly products
    $adjacents = 3;
  
  /* Setup vars for query. */
  $targetpage = "rating.php";  //your file name  (the name of this file)
  $limit = 4;                 //how many items to show per page
  if($page) 
    $start = ($page - 1) * $limit;      //first item to display on this page
  else
    $start = 0;               //if no page var is given, set start to 0

  $query="SELECT COUNT(*) AS num FROM rate_record WHERE rid = '$rid'";#change '1' by '$rid'
  $total_pages = mysql_fetch_array(mysql_query($query));
  $num = @mysql_num_rows($total_pages);
  $total_pages = $total_pages[$num];
  //echo $total_pages;
  
  /* Setup page vars for display. */
  if ($page == 0) $page = 1;          //if no page var is given, default to 1.
  $prev = $page - 1;              //previous page is page - 1
  $next = $page + 1;              //next page is page + 1
  $lastpage = ceil($total_pages/$limit);    //lastpage is = total pages / items per page, rounded up.
  $lpm1 = $lastpage - 2;            //last page minus 1
  
  $sitems_query = "SELECT * FROM rate_record WHERE rid = '$rid'";#change '1' by '$rid'
  $get= @mysql_query($sitems_query)or die(mysql_error());
        $num = @mysql_num_rows($get);
  
    for($i=0;$i<$num;$i++)
    {
     $ratingID= @mysql_result($get,$i,'ratingID');
     $rating = "SELECT * FROM rating WHERE ratingID = '$ratingID'";
     $row= @mysql_query($rating)or die(mysql_error());
      $cnt = @mysql_num_rows($row);
      for($j=0;$j<$cnt;$j++)
      {
        $score= @mysql_result($row,$j,'score');
        $message= @mysql_result($row,$j,'message');
      }

    //attributes from Item entity:

 ?>
 <tr>
    <td width="100"><p align="Center">  <?php echo $score;?></td></p>
    <td ><p align="Center">  <?php echo $message;?></td></p>


  <!--how to add images using links? -->
    
    </p></td>

   
 </tr>

 <?php
}
?>

 
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
    if(document.getElementById("chk"+j).checked)
    {
    if(document.getElementById('selqty'+j).value=="selqty")
   {
    alert("Please select the quantity");
    return false;
   }
    }
  }
  if(count==0)
  {
   alert("Please select any one product");
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
    if ($lastpage < 7 + ($adjacents * 2)) //not enough pages to bother breaking it up
    { 
      for ($counter = 1; $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= "<span class=\"current\">  $counter  </span>";
        else
          $pagination.= "<a href=\"$targetpage?un=$un&page=$counter\">  $counter  </a>";          
      }
    }
    elseif($lastpage > 5 + ($adjacents * 2))  //enough pages to hide some
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
   
   <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->
   <!--end container-->

  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

  <!-- end #container -->


<!-- Code for inserting into data base -->
 <?php
  if(isset($_POST['submitMain']))
  {
   $buyer_userName=$_POST['txt_username'];
   $score=$_POST['score'];
   $message=$_POST['tamsg'];

   $get= @mysql_query("SELECT gender FROM registereduser WHERE userName = '$buyer_userName'")or die(mysql_error());
   $num = @mysql_num_rows($get);

   if($num==0)
   {
     echo '<div align="center"><strong><font color="#FF0000">Buyer does not exist !!</font></Strong></div>';
   }
   //while($subcat = mysql_fetch_array($subct)){
    //$cur=$subct['caid'];
   //}
   //$catdec=$_POST['ta_catdcpn'];

   $r_bID= "r_b";
   $time = date("YmdHis");
   $r_bID .=$time;
   $ratingID=$r_bID;
   $sell_username=$username;
   $query = mysql_query("INSERT INTO rating (ratingID,score, message) VALUES ('$ratingID','$score','$message')
    ")or die(mysql_error());
   $query = mysql_query("   INSERT INTO rate_buyer (r_bID,seller_userName,buyer_userName,ratingID,time) VALUES ('$r_bID','$sell_username','$buyer_userName','$ratingID','$time')
    ")or die(mysql_error());
    echo "<script>alert('User rating added sucessfully !!');</script>";
  }

?>
</body>
</html>