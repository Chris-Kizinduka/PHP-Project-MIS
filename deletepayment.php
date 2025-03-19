<!DOCTYPE>
<?php
include("includes/db.php");
?>
<?php
include("includes/db.php");
if(isset($_GET['delete_paytype']))
{
	
	$get_id=$_GET['delete_paytype'];
	$get_s="select * from payment_types where paymenttypes_id='$get_id'";
	$run_s=mysql_query($get_s);
	$row_s=mysql_fetch_array($run_s);
	$pid =$row_s['paymenttypes_id'];
    $typename=$row_s['type_name'];
    $amount_to_pay=$row_s['amount_to_pay'];

?>
<html>
<head>
<title> COTAMONYA MIS</title>
<link  rel="stylesheet" href="styles/style.css"  type="text/css" />
<link  rel="stylesheet" href="styles/styles.css"  type="text/css" />
</head>
<body>
<!-- Main container starts here-->
<div class="main_wrapper">
<div class="header_wrapper">
<img src="images/cotabana.jpg"/ width="1100px" height="85px" >
</div>
<!-- Header ends here-->
<!-- Navigation Bar starts here-->
<div class="menubar">
<div id ="nav">
<div id="nav_wrapper">
<ul >
<li><a href="index.php">Home</a></li>
   <li><a href="member.php">Member <img src="arrow_down.png"/></a>
   <ul >
             
             <li><a href="viewmember.php">View Member</a></li>
             
             </ul>
   
   
   
   </li>
   <li><a href="leasing.php">Leasing <img src="arrow_down.png"/></a>
    <ul >
             
             <li><a href="viewleasing.php">View Leasing</a></li>
             
             </ul>
   
   </li>
   <li><a href="moto.php">Moto <img src="arrow_down.png"/></a>
			<ul>
			<li><a href="viewmoto.php">View Motos</a></li>
             <li><a href="supplier.php">Supplier</a></li>
             <li><a href="model.php">Model</a></li>
             </ul>
         </li>
  
<li><a href="payment_types.php">Paymenttypes <img src="arrow_down.png"/> </a>
<ul>
             <li><a href="viewpaymenttype1.php">View Paymenttypes</a></li>
             </ul>

</li>
<li><a href="viewpaymenttype.php">Payments <img src="arrow_down.png"/></a>
<ul>
			<li><a href="viewpaymenttype.php">View Payments info</a></li>
             <li><a href="viewmotopayment.php">View Moto_Payments</a></li>
             </ul>
</li>
<li><a href="index.php">Reports <img src="arrow_down.png"/></a>
<ul >
             <li><a href="reportmember.php">Members Report <span><img src="arrow_right.png"/></span></a>
			 <ul>
											 <li><a href="requestmembersreportbtn.php">Request Members Report Between</a></li>
                                              
											</ul>
			 
			 
			 </li>
             <li><a href="reportmotopayment.php">Moto payments Report<span><img src="arrow_right.png"/></span> </a>
			 <ul>
											
                                              <li><a href="requestcustommotopay.php">Request custom Moto Payment report </a></li>
											</ul>
			 
			 
			 </li>
             <li><a href="requestreportpay.php">Payments Report<span><img src="arrow_right.png"/></span></a>
											<ul>
											 <li><a href="requestreportpay.php">Request Payment Report Between</a></li>
                                              <li><a href="reportpaymentall.php">Request custom Payment report </a></li>
											</ul>
			 
			 
			 </li>
			
			  <li><a href="reportleasingcontract.php">Leasing contract Report</a></li>
             </ul>


</li>
<li><a href="register.php">Sign Up <img src="arrow_down.png"/></a>
<ul >
              <li><a href="viewusers.php">View Users</a></li>
			 <li><a href="function.php">set Function</a></li>
             
             </ul>
</li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div>

</div>

</div>

<!-- Navigation Bar ends-->
<!-- Content wrappper starts -->
<div class="content_wrapper"> 

<div id="content_area">
<form method="post" action="payment_types.php">

<table align="center" cellspacing="5px">
<tr align="center">
<td colspan="8"><u><h2>Delete Payment Type   </h2></u> </td>
</tr>
<tr>
<td>Type name:</td>
<td><input type= "text" name ="typename"  value="<?php echo $typename ;?>"   class="textInput" required ></td>
</tr>
<tr>
<td>Amount:</td>
<td><input type= "text" name ="amount_to_pay" value="<?php echo  $amount_to_pay ;?>"  class="textInput" required></td>
<tr align="center">
<td colspan="8"><input type="submit" name="delmt" id="btns" title="Click Here to Delete Data" id="register_btn" value="Delete"/></td></tr>
</table>
</form>

</div>
</div>
<!-- Content wrappper ends -->
<div id ="footer" >
Copyright&copy2017 Chrisaime, All Rights Reserved.
</div>
</div>
</body>
</html>
<?php
if(isset($_POST['delmt']))
{
	$ptypeid=$pid;
	if($mtid)
	{
	
		$r=mysql_query("delete from payment_types where paymenttypes_id ='$ptypeid' ");
		if($r){
		echo "<script>alert('payment_type deleted')</script>";
		echo "<script>window.open('viewpaymenttype1.php?viewptypes','_self')</script>";}
}}
	?>


<?php } ?>