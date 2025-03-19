<!DOCTYPE>
<?php
include("includes/db.php");
if(isset($_GET['pay_moto']))
{
	
	$get_id=$_GET['pay_moto'];
	$get_s="select * from leasing where leasing_id='$get_id'";
	$run_s=mysql_query($get_s);
	$row_s=mysql_fetch_array($run_s);
	$sid =$row_s['leasing_id'];
	$dueamount=$row_s['due_amount'];
        
}
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
<table align="center" cellspacing="5px">
<tr align="center">
<td colspan="8"><u><h2>Moto Payment  </h2></u> </td>
</tr>
<tr>
<td>Leasing ID:</td>
<td><input type= "text" name ="leasing_id" value="<?php echo $sid ; ?>"   class="textInput" ></td>
</tr>
<tr>
<td>Due Amount:</td>
<td><input type= "text" name ="dueamount" value="<?php echo $dueamount ;?>" class="textInput" ></td></tr>
<tr>
<td>Paid Amount</td>
<td><input type= "text" name ="paid_amount"  class="textInput" required></td></tr>

<tr align="center">
<td colspan="8"><input type="submit" id="btns" name="paymoto_btn" style="color: #017572;" title="Click Here Save Data"  value="Add"/></td>
<td><a href="viewmotopay.php">View Payments </td></tr>
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
if(isset($_POST['paymoto_btn'])){
	{
  $lease=$_POST['leasing_id'];
  $check_id="select * from moto_payment  group by leasing_id having sum(paid_amount)= dueamount and leasing_id='$lease'" ;
  $run_id=mysql_query($check_id);
  if(mysql_num_rows($run_id)>0)
  {
    echo "<script>alert('Sorry Moto  Full Paid!!')</script>";
        echo"<script>window.location('viewmotopayment.php')</script>";
    
  }

else{
	//geting the text data from the field
	
	$lease = $_POST['leasing_id'];
	$Amount = $_POST['dueamount'];
	$paid_amount = $_POST['paid_amount'];
	$unpaid_amount= $Amount- $paid_amount;
	$amountp=5000;
	$r=$amountp-$paid_amount;
	 if($paid_amount < $amountp){
		
	echo "<script>alert('Sorry the amount paid $paid_amount Rwf is not Sufficient you need more $r Rwf to make payment!!')</script>"	;
	
		
		echo "<script>window.open('viewmotopayment.php','_self')</script>";	
	}else if ($Amount < $paid_amount){
		
	echo "<script>alert('payment is over!')</script>"	;
	
		
		echo "<script>window.open('viewmotopayment.php','_self')</script>";	
	}else{
	
	 $Add_payment= "insert into moto_payment(paid_amount,date_paid,leasing_id,dueamount) values ('$paid_amount',NOW(),'$lease','$Amount')";

	$Add_pay = mysql_query($Add_payment);
	if ($Add_pay){
		
	echo "<script>alert('Moto payment has been added!')</script>"	;
	
		
		echo "<script>window.open('viewmotopayment.php','_self')</script>";	
	}
	}
}
	}

}

?>