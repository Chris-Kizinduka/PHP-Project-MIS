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
    // Getting the text data from the fields (NO sanitization)
    $supname = $_POST['supname'];
    $phone = $_POST['phn'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    // Direct query execution (NO prepared statements, NO sanitization)
    $insert_sup = "INSERT INTO supplier (suppliername, phone_number, Address, Email) 
                   VALUES ('$supname', '$phone', '$address', '$email')";

    $insert_s = mysqli_query($conn, $insert_sup);

    if($insert_s){
        echo "<script>alert('Supplier has been inserted!')</script>";
        echo "<script>window.open('index.php?insert_supplier','_self')</script>";
    } else {
        echo "<script>alert('Error inserting supplier: " . mysqli_error($conn) . "')</script>";
    }
}

?>




