<!DOCTYPE>
<?php
include("includes/db.php");

if (isset($_GET['edit_paytype'])) {
    $get_id = $_GET['edit_paytype'];

    // Use mysqli to prevent direct SQL injection with variable insertion
    $get_s = "SELECT * FROM payment_types WHERE paymenttypes_id = '$get_id'";
    
    // Run the query
    $run_s = mysql_query($get_s);
    
    // Fetch the data
    if ($row_s = mysql_fetch_array($run_s)) {
        $pid = $row_s['paymenttypes_id'];
        $typename = $row_s['type_name'];
        $amount_to_pay = $row_s['amount_to_pay'];
    } else {
        echo "Payment type not found.";
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
<form method="post" action="payment_types.php">

<table align="center" cellspacing="5px">
<tr align="center">
<td colspan="8"><u><h2>Set Payment Type   </h2></u> </td>
</tr>
<tr>
<td>Type name:</td>
<td><input type= "text" name ="typename"  value="<?php echo $typename ;?>"   class="textInput" required ></td>
</tr>
<tr>
<td>Amount:</td>
<td><input type= "text" name ="amount_to_pay" value="<?php echo  $amount_to_pay ;?>"  class="textInput" required></td>
<tr align="center">
<td colspan="8"><input type="submit" name="ptypeu_btn" id="btns" title="Click Here to Updated data" id="register_btn" value="Updated"/></td></tr>
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
include("includes/db.php");  // Assuming connection $conn is already established.

if (isset($_POST['ptypeu_btn'])) {

    // Get the form data
    $p_id = $_POST['pid'];  // Assuming 'pid' is passed via POST method.
    $type_name = $_POST['typename'];
    $amount = $_POST['amount_to_pay'];

    // Update the payment type record in the database
    $update_paytype = "UPDATE payment_types SET type_name = '$type_name', amount_to_pay = '$amount' WHERE paymenttypes_id = '$p_id'";

    // Run the query
    $run_p = mysql_query($update_paytype);

    // Check if the query was successful
    if ($run_p) {
        // If the update was successful, show a success message and redirect
        echo "<script>alert('Payment type has been updated!');</script>";
        echo "<script>window.open('viewpaymenttype.php', '_self');</script>";
    } else {
        // If the query failed, show an error message
        echo "<script>alert('Error updating payment type. Please try again later.');</script>";
    }
}
?>
