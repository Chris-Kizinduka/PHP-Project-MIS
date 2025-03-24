<!DOCTYPE>

<?php
include("includes/db.php"); // Ensure this file contains the correct mysqli connection ($conn)

if (isset($_GET['edit_supplier'])) {
    $get_id = $_GET['edit_supplier'];

    // Use mysqli_query instead of mysql_query
    $get_s = "SELECT * FROM supplier WHERE supplier_id='$get_id'";
    $run_s = mysqli_query($conn, $get_s);

    // Use mysqli_fetch_array instead of mysql_fetch_array
    if ($row_s = mysqli_fetch_array($run_s)) {
        $sid = $row_s['supplier_id'];
        $s_name = $row_s['suppliername'];
        $phn = $row_s['phone_number'];
        $ad = $row_s['Address'];
        $em = $row_s['Email'];
    }
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
<form name="frm" method="post" action="">
<table align="center" cellspacing="5px">
<tr align="center">
<td colspan="8"><u><h2>Register Supplier   </h2></u> </td>
</tr>
<tr>
<td>Supplier name:</td>
<td><input type= "text" name ="suppliername" value="<?php echo $s_name;?>"   class="textInput" ></td>
</tr>
<tr>
<td>Phone Number:</td>
<td><input type= "text" name ="phone_number" value="<?php echo $phn ;?>" class="textInput"></td></tr>
<tr>
<td>Address:</td>
<td><input type= "text" name ="Address" value="<?php echo  $ad ;?>" class="textInput"></td></tr>
<tr>
<td>Email</td>
<td><input type= "text" name ="Email" value="<?php echo    $em ;?>" class="textInput"></td></tr>
<tr align="center">
<td colspan="8"><input type="submit" id="btns" name="sup_btn" title="Click Here to update data"  value="Update"/></td>
<td><a href="viewsupplier.php">View Suppliers </td></tr>
</table>
</form>
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
if (isset($_POST['sup_btn'])) {
    $sup_id = $_POST['supplier_id']; // Ensure this field is included in your form
    $s_name = $_POST['suppliername'];
    $phne = $_POST['phone_number'];
    $ad = $_POST['Address'];
    $email = $_POST['Email'];

    // Direct SQL query (no prepare, but be cautious of SQL injection risks)
    $update_supplier = "UPDATE supplier SET 
                        suppliername='$s_name', 
                        phone_number='$phne', 
                        Address='$ad', 
                        Email='$email' 
                        WHERE supplier_id='$sup_id'";

    $run_sup = mysqli_query($conn, $update_supplier);

    if ($run_sup) {
        echo "<script>alert('Supplier Has Been Updated!')</script>";
        echo "<script>window.open('viewsupplier.php','_self')</script>";
    } else {
        echo "<script>alert('Error updating supplier: " . mysqli_error($conn) . "')</script>";
    }
}
?>
