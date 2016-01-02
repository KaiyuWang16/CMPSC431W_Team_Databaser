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
	   <div id="subsidebar2"><a href="loghome.php">Home</a></div>
          <div id="subsidebar2"><a href="pricemaster.php">Price Master</a></div>
          <div id="subsidebar4">Display
             <ul><li><a href="productdisplay.php">Product Master</a></li>
                  <li><a href="pricedisplay.php">Price Master</a></li></ul>
           </div>
          <div id="subsidebar2"><a href="" onclick="isConfirmlog();" >Log out</a></div>
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
                    <th colspan="5" id="formhedear">Add a new Product to sell</th>
                  </tr>
                  <input type="hidden" name="username" id="username" value="" />
                  <tr>
                    <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Product Title : </strong></div></td>
                    <td colspan="4"><textarea name="txtprd_title" id="txtprd_title" wrap="physical" cols="45" rows="3" maxlength="100"  value=""
                                      onchange=" document.getElementById('txtprd_title').value=trim(this.value);"></textarea></td>		  
                  </tr>
                  <tr>
                    <td><div align="right"><strong><font color="#FF0000">*</font>Product Location : </strong></div></td>
                    <td width="128"><input type="textbox" name="txtprd_location" id="txtprd_location"  value="" maxlength="20" style="width:176px;"
                                      onchange="document.getElementById('txtprd_location').value=trim(this.value);"/></td>
                  </tr>
                  <tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong><font color="#FF0000">*</font></strong></span><strong>Product Image Url: </strong></div></td>
                    <td colspan="4"><textarea name="txtimg_url" id="txtimg_url" wrap="physical" cols="45" rows="3" maxlength="100"  value=""
                                      onchange=" document.getElementById('txtimg_url').value=trim(this.value);"></textarea></td>
                  </tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong></strong></span><strong>Product Size / Dimension : </strong></div></td>
                    <td><input type="textbox" name="txtsize" id="txtsize" maxlength="10" value="" style="width:176px;"
                            onchange=" document.getElementById('txtsize').value=trim(this.value);"/></td>
                  </tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong></strong></span><strong>Unit of Measure : </strong></div></td>
                    <td><select name="seluom" id="seluom" style="width:180px;">
                        <option value="null">Select Unit of Measure</option>
			<option value="Meters">Mts</option>
			<option value="Liters">Liters</option>
			<option value="Centi meters">Centi meters</option>
			<option value="Mili Meters">Mili Meters</option>	
			<option value="Kilogram">Kilogram</option>
			<option value="Grams">Grams</option>
			<option value="Inches">Inches</option>
			<option value="Ounces">Ounces</option>
			
                      </select>    </td>
                   </tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong></strong></span><strong><font color="#FF0000">*</font>Quantity Available : </strong></div></td>
                    <td><input type="textbox" name="txtqtyavbl" id="txtqtyavbl" maxlength="10" value="" style="width:176px;"
                                         onchange=" document.getElementById('txtqtyavbl').value=trim(this.value);"/></td>
                  </tr>
				  <tr>
                    <td><div align="right"><span class="req"><strong><font color="#FF0000">*</font></strong></span><strong>Price Of Unit($) : </strong></div></td>
                    <td><input type="textbox" name="txtprice" id="txtprice" maxlength="10" value="" style="width:176px;"
                            onchange=" document.getElementById('txtprice').value=trim(this.value);"/></td>
                  </tr>
                   <tr>
                    <td><div align="right"><span class="req"><strong></strong></span><strong>Product Color : </strong></div></td>
                    <td><input type="textbox" name="txtclr" id="txtclr" maxlength="50" value="" style="width:176px;"
                                       onchange=" document.getElementById('txtclr').value=trim(this.value);"/></td>
                  </tr>
                   <tr>
                    <td><div align="right"></div></td>
                    <td colspan="2"><div class="example">Multiple colors should be separated by ( , )</div></td>
                    <td width="170" class="formInfo">&nbsp;</td>
                    <td width="69">&nbsp;</td>
                  </tr>
                
                  <tr>
                    <td><div align="right"><span class="req"><strong><font color="#FF0000">*</font></strong></span><strong>Category : </strong></div></td>
                    <td><select name="selprdcat" id="selprdcat" style="width:240px;" onchange="showdiv();displaysubcat(this.value);">
                        <option value="selprdcat">Select Category</option>
                       <?php
                        $get_catgry=mysql_query("SELECT DISTINCT caName FROM category")or die(mysql_error());
                        $num_cat=mysql_num_rows($get_catgry);
                        for($i=0;$i<$num_cat;$i++)
                        {
                         $cat_category=mysql_result($get_catgry,$i,'caName');
                        ?>
			 <option value="<?php echo $cat_category;?>"><?php echo $cat_category;?></option>
                        <?php
                        }   
                        ?>   
                      </select></td>
                  
                    <td colspan="3" class="formInfo">&nbsp;</td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong><font color="#FF0000">*</font>Description :</strong></div>
                      <p align="right" class="example">(Maximum 500 characters) </p></td>
                       <td colspan="4"><textarea name="talngdcpn" id="talngdcpn" wrap="physical" cols="45" rows="5" title="Product's Description Should not exceed 500 characters!!"
                                      onchange=" document.getElementById('talngdcpn').value=trim(this.value);"></textarea><br>
                                      Characters Remaining: <span id="charsLeft3">500</span>
				   </td>
                   </tr>
                  
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                  </tr>
                  <input type="hidden" name="img_name2" id="img_name2" />
                  <tr>
                    <td></td>
                    <td colspan="3" >&nbsp;&nbsp;&nbsp;<!--Onclick="return done(this.form);"-->
                      <input type="submit" id="submitMain" name="submitMain" value="Submit" Onclick="return done(this.form);" > 
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
</div>
 
<!-- Code for inserting into data base -->
 <?php
  if(isset($_POST['submitMain']))
  {
   date_default_timezone_set('America/New_York');
   //getting the values !!
   $username=$_SESSION['supplier'];
   $tid = "t" ;
   $tid .=date("YmdHis");
   $title=$_POST['txtprd_title'];
   $location=$_POST['txtprd_location'];
   $cat=$_POST['selprdcat'];
   
   $get = mysql_query("SELECT caid FROM category WHERE caName ='$cat'")or die(mysql_error());
   $num = mysql_num_rows($get);
   for($i=0;$i<$num;$i++)
   {
	   $row = mysql_result($get,$i,'caid');
   }

   $color=$_POST['txtclr'];
   $pimg=$_POST['txtimg_url']; 
   $size=$_POST['txtsize'];
   $measure = $_POST['seluom'];
   $size .= " ";
   $size .= $measure;
   $description=$_POST['talngdcpn'];

   $stid = "st" ;
   $stid .=date("YmdHis");
   $price=$_POST['txtprice'];
   $price = (double)$price;
   $pqty=$_POST['txtqtyavbl'];
   $pqty = (int)$pqty;

   $s_stid = "s_st" ;
   $s_stid .=date("YmdHis");
   $sellTime = date("Y-m-d H:i:s");
   $getSID = mysql_query("SELECT sid FROM supplier WHERE companyName ='$username'")or die(mysql_error());
   $numSID = mysql_num_rows($getSID);
   for($i=0;$i<$numSID;$i++)
   {
	   $sid = mysql_result($getSID,$i,'sid');
   }

   
   $query = mysql_query("INSERT INTO item
    (tid, title, location, caid, color, picUrl, size, description)
    VALUES ('$tid','$title','$location','$row','$color','$pimg','$size','$description')")
    or die(mysql_error());
	
	$query2 = mysql_query("INSERT INTO sitem
    (stid, price, quantity, tid)
    VALUES ('$stid','$price','$pqty','$tid')")
    or die(mysql_error());
	
	$query3 = mysql_query("INSERT INTO supplier_sitem
    (s_stID, sid, stid, sellTime)
    VALUES ('$s_stid','$sid','$stid','$sellTime')")
    or die(mysql_error());    
    echo "<script>alert('New Product inserted successfully ^0^');</script>";
  }
?>
</body>
</html>