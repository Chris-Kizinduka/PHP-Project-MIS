<!DOCTYPE>
<?php
include("includes/db.php");
?>
<!DOCTYPE>
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
<li><a href="index1.php">Home</a></li>
   <li><a href="member.php">Member <img src="arrow_down.png"/></a>
   <ul >
             
             <li><a href="viewmember.php">View Member</a></li>
             
             </ul>
   
   
   
   </li>
   <li><a href="#">Leasing </a>
    
   
   </li>
   <li><a href="#">Moto </a>
			
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
			
			  <li><a href="#">Leasing contract Report</a></li>
             </ul>


</li>
<li><a href="#">Sign Up </a>

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
<td colspan="8"><u><h2>Set Payment Type   </h2></u> </td>
</tr>
<tr>
<td>Type name:</td>
<td><input type= "text" name ="typename"    class="textInput"  required ></td>
</tr>
<tr>
<td>Amount:</td>
<td><input type= "text" name ="amount_to_pay"  class="textInput"required></td>
<tr align="center">
<td colspan="8"><input type="submit" name="ptype_btn" id="btns" title="Click Here to save data" id="register_btn" value="Save"/></td></tr>
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
if(isset($_POST['ptype_btn'])){
	//getting the text data from the fields
	$Typename=$_POST['typename'];
	$Amount=$_POST['amount_to_pay'];
	
	$insert_paytype="insert into payment_types(type_name,amount_to_pay) 
	values('$Typename','$Amount')";
	
	$insert_pt=mysql_query($insert_paytype);
	if($insert_pt){
		
	echo"<script> alert('payment type Has been Inserted!')</script>";
 echo"<script>window.open('payment_types.php?insert_paytype','_self')</script>";
	}
}

?>

