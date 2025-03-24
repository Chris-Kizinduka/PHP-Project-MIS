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
// Ensure this is connected using MySQLi
$get_member = "SELECT member_id, fname, lname, function FROM member WHERE member_id NOT IN (SELECT member_id FROM leasing WHERE status='activated') AND function='Driver'";
$run_member = mysqli_query($conn, $get_member); // Use `mysqli_query()` instead of `mysql_query()`
if ($run_member) {
    while ($row_m = mysqli_fetch_assoc($run_member)) { // Use `mysqli_fetch_assoc()` instead of `mysql_fetch_array()`
        $m_id = $row_m['member_id'];
        $fn = $row_m['fname'];
        $ln = $row_m['lname'];
        echo "<option value='$m_id'>$fn $ln</option>";
    }
} else {
    echo "Error: " . mysqli_error($conn); // Error handling if query fails
}
?>
</select>
</td>    

</tr>
<tr>
<td>Select a Moto:</td>
<td>
<select name="moto">
<option></option>
<?php
$get_m = "SELECT * FROM moto WHERE status = 'active'";
$run_m = mysqli_query($conn, $get_m); // Use `mysqli_query()` instead of `mysql_query()`
if ($run_m) {
    while ($row_m = mysqli_fetch_assoc($run_m)) { // Use `mysqli_fetch_assoc()` instead of `mysql_fetch_array()`
        $m_id = $row_m['moto_id'];
        $platen = $row_m['plate_number'];
        echo "<option value='$m_id'>$platen</option>";
    }
} else {
    echo "Error: " . mysqli_error($conn); // Error handling if query fails
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

// Query to fetch contract periods
$get_p = "SELECT * FROM contractperiod";
$run_p = mysqli_query($conn, $get_p);

while ($row_p = mysqli_fetch_array($run_p)) {
    $pid = $row_p['cid'];
    $pn = $row_p['periodname'];
    echo "<option value='$pid'>$pn</option>";
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
if (isset($_POST['add_leasing'])) {
  
  // Assuming $conn is your already established connection
  
  $name = $_POST['nam'];
  $check_id = "SELECT * FROM leasing WHERE member_id = '$name'";
  $run_id = mysqli_query($conn, $check_id);

  if (mysqli_num_rows($run_id) > 0) {
    echo "<script>alert('Contract already exists!')</script>";
    echo "<script>window.location='leasing.php'</script>";
  } else {
    // Getting the text data from the field
    $m_name = $_POST['nam'];
    $moto_pnumber = $_POST['moto'];
    $period = $_POST['periodname'];
    $start_date = date('y-m-d');
    $damount = $_POST['dueamount'];
    $status = 'activated';
    $todate = date('y-m-d');
    $today = "";
    $amount = "";
    $End_date = "";

    if ($period == 1) {
      $End_date = date('y-m-d', strtotime($today . ' + 360 days'));
    } else if ($period == 2) {
      $End_date = date('y-m-d', strtotime($today . ' + 720 days'));
    }

    // Insert contract into leasing table
    $Add_contract = "INSERT INTO leasing (start_date, end_date, cid, due_amount, member_id, moto_id, status) 
                     VALUES ('$start_date', '$End_date', '$period', '$damount', '$m_name', '$moto_pnumber', '$status')";
    $Add_con = mysqli_query($conn, $Add_contract);

    // Update the status of existing contracts
    $status1 = "UPDATE leasing SET status = 'disactivated' WHERE end_date <= '$todate'";
    $status2 = "UPDATE moto SET status = 'leased' WHERE moto_id = '$moto_pnumber'";

    $run_status1 = mysqli_query($conn, $status1);
    $run_status2 = mysqli_query($conn, $status2);

    if ($Add_con && $run_status1 && $run_status2) {
      echo "<script>alert('Leasing Contract has been added!')</script>";
      echo "<script>window.open('leasing.php', '_self')</script>";
    }
  }
}
?>















