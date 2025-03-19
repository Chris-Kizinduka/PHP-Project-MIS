<!DOCTYPE>
<?php
include("includes/db.php");
if(isset($_GET['pay_type']))
{
	
	$get_id=$_GET['pay_type'];
	$get_s="select * from payment_types where paymenttypes_id='$get_id'";
	$run_s=mysql_query($get_s);
	$row_s=mysql_fetch_array($run_s);
	$pid=$row_s['paymenttypes_id'];
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
<form method="post" action="" enctype="multipart/form-data">
<table align="center" cellspacing="20px">
<tr align="center">
<td colspan="8"><u><h2>Payments registration</h2></u> </td>
</tr>
<tr>
<td>Payment types:</td>
<td>
<input type= "text" name ="paytype" value="<?php echo $typename ;?>"  class="textInput"  >
</td>
</tr>
<tr>
<td>Amount:</td>
<td><input type= "text" name ="amount" value="<?php echo $amount_to_pay ;?>"  class="textInput"></td>
</tr>

<tr>
<td>Name:</td>
<td>
<select name="nam" >
<option></option>
<?php
$get_member="select*from member";
	$run_member=mysql_query($get_member);
	while($row_m=mysql_fetch_array($run_member))
	{
		$m_id=$row_m['member_id'];
		$fn=$row_m['fname'];
		$ln=$row_m['lname'];
		echo"<option value='$m_id'>$fn $ln</option>";
	}
?>
</select>
</td>	
</tr>
<tr>
<td>Paid amount:</td>
<td ><input type="text" name="paidamount" required ></td>
</tr>
<tr>
<td>Description:</td>
<td><textarea name="descr" rows="3" cols="30"></textarea></td>
</tr>

<tr align="center" >
<td colspan="4"><input type="submit" id="btns" title="Click Here to Save data" style="color: #017572;" name="p_btn"  value="Add"/></td>
</tr>
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
if(isset($_POST['p_btn'])){
	//getting the text data from the fields
	
	$mid=$_POST['nam'];
	$Amount=$_POST['paidamount'];
	$typen=$pid;
	$desc=$_POST['descr'];
	
	if($Amount<$amount_to_pay) {
		
		
echo "<script>alert('the amount paid is below ')</script>";
		 
break;	
}
		else{
	$insert_p="insert into payment(amount,p_date,description,paymenttypes_id,member_id) 
	values('$Amount',Now(),'$desc','$typen','$mid')";
	
	$insert_pt=mysql_query($insert_p);
	if($insert_pt){
		
	echo"<script> alert('payment  Has been Inserted!')</script>";

	}
}
}
	
?>	
<?php } ?>



