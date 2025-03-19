<!DOCTYPE>
<?php
include("includes/db.php");
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
<form method="post" action="">

<table align="center" cellspacing="20px">
<tr align="center">
<td colspan="8"><u><h2>Leasing Registration  </h2></u> </td>
</tr>
<tr>
<td>Name:</td>
<td>
<select name="nam" >
<option></option>
<?php
$get_member="select member_id,fname,lname,function from member where member_id NOT IN (select member_id from leasing where status='activeted') and function='Driver' " ;
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
<td>select a Moto:</td>
<td>
<select name="moto" >
<option></option>
<?php
$get_m="select * from  moto where status ='active' ";
	$run_m=mysql_query($get_m);
	while($row_m=mysql_fetch_array($run_m))
	{
		$m_id=$row_m['moto_id'];
		$platen=$row_m['plate_number'];
		echo"<option value='$m_id'>$platen</option>";
	}
?>
</select>
</td>	


</tr>

<tr>
<td>Contract_Period :</td>
<td><select name="periodname">
<option></option>
<?php
$get_p="select* from contractperiod ";
	$run_p=mysql_query($get_p);
	while($row_p=mysql_fetch_array($run_p))
	{
		$pid=$row_p['cid'];
		$pn=$row_p['periodname'];
		echo"<option value='$pid'> $pn </option>";
	}
?>
</select>
</td>
</tr>
<tr>
<td>Amount:</td>
<td><input type= "text" name ="dueamount" class="textInput" required ></td>
</tr>

<tr>
<td></td></tr>
<tr align="center" >
<td colspan="4"><input type="submit" title="Click Here to Register" name="add_leasing" id="btns" value="Register"/></td>
<td colspan="4"><a href="viewleasing.php">View Contracts <a/></td></tr>
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
if(isset($_POST['add_leasing'])){

  $name=$_POST['nam'];
  $check_id="select * from leasing where member_id='$name' ";
  $run_id=mysql_query($check_id);
  if(mysql_num_rows($run_id)>0)
  {
    echo "<script>alert('Contract  already exist!.')</script>";
        echo"<script>window.location('leasing.php')</script>";
    
  }

else{
	
	//geting the text data from the field
	
	$m_name = $_POST['nam'];
	$moto_pnumber = $_POST['moto'];
	$period = $_POST['periodname'];
	$start_date= date ('y-m-d');
	$damount=$_POST['dueamount'];
	$status= 'activeted';
	$todate= date ('y-m-d');
	$today="";
	$amount="";
	$End_date="";
	if($period==1)
	{
		
		$End_date=date('y-m-d', strtotime($today. ' + 360 days'));
		

	}
	else if($period==2)
	{
		$End_date=date('y-m-d', strtotime($today. ' + 720 days'));
		
	}
	
	
	
	$Add_contract= "insert into leasing (start_date,end_date,cid,due_amount,member_id,moto_id,status) values ('$start_date','$End_date','$period','$damount','$m_name','$moto_pnumber','$status')";
	$Add_con = mysql_query($Add_contract);
	$status1= "update leasing set status='disactivated' where end_date <='$todate'";
	$status2= "update moto set status='leased' where moto_id ='$moto_pnumber' ";
    $run_status1=mysql_query($status1);
	$run_status2=mysql_query($status2);
	if ($Add_con && $run_status1 && $run_status2 ){
		
	echo "<script>alert('leasing Contract has been added!')</script>"	;
	
		
		echo "<script>window.open('leasing.php','_self')</script>";	
	}
	
}
}



?>



