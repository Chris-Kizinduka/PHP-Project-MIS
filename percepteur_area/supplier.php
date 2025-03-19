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
<li><a href="index2.php">Home</a></li>
   <li><a href="#">Member </a>
  
   
   
   
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
  
<li><a href="#">Paymenttypes  </a>


</li>
<li><a href="viewmotopayment.php">Payments <img src="arrow_down.png"/></a>
<ul>
			
             <li><a href="viewmotopayment.php">View Moto_Payments</a></li>
             </ul>
</li>
<li><a href="index.php">Reports <img src="arrow_down.png"/></a>
<ul >
             <li><a href="#">Members Report </a>
			 </li>
             <li><a href="reportmotopayment.php">Moto payments Report<span><img src="arrow_right.png"/></span> </a>
			 <ul>
											
                                              <li><a href="requestcustommotopay.php">Request custom Moto Payment report </a></li>
											</ul>
			 
			 
			 </li>
			 <li><a href="reportleasingcontract.php">Leasing contract Report</a></li>
             <li><a href="#">Payments Report </a>
			 </li>
			
			  
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
<form method="post" action="supplier.php">

<table align="center" cellspacing="5px">
<tr align="center">
<td colspan="8"><u><h2>Register Supplier   </h2></u> </td>
</tr>
<tr>
<td>Supplier name:</td>
<td><input type= "text" name ="supname"    class="textInput"required ></td>
</tr>
<tr>
<td>Phone Number:</td>
<td><input type= "text" name ="phn"  class="textInput"required></td></tr>
<tr>
<td>Address:</td>
<td><input type= "text" name ="address"  class="textInput"required></td></tr>
<tr>
<td>Email</td>
<td><input type= "text" name ="email"  class="textInput"required></td></tr>
<tr align="center">
<td colspan="8"><input type="submit" id="btns" name="sup_btn" title="Click Here to save data"  value="Save"/></td>
<td><a href="viewsupplier.php">View Suppliers </td></tr>
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
if(isset($_POST['sup_btn'])){
	//getting the text data from the fields
	$supname=$_POST['supname'];
	$phone=$_POST['phn'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	
	$insert_sup="insert into supplier(suppliername,phone_number,Address,Email) 
	values('$supname','$phone','$address','$email')";
	
	$insert_s=mysql_query($insert_sup);
	if($insert_s){
		
	echo"<script> alert('Supplier Has been Inserted!')</script>";
 echo"<script>window.open('index.php?insert_supplier','_self')</script>";
	}
}

?>

