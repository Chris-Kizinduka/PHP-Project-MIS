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
<form method="post" action="register.php">

<table align="center" cellspacing="20px">
<tr align="center">
<td colspan="8"><u><h2>User registration  </h2></u> </td>
</tr>
<tr>
<td>First name:</td>
<td><input type= "text" name ="firstname"  class="textInput"  required ></td>
</tr>
<tr>
<td>Last name:</td>
<td><input type= "text" name ="lastname"  class="textInput"  required ></td>
</tr>
<tr>
<td>Phone number:</td>
<td><input type= "text" name ="phonenumber"  class="textInput" required ></td>
</tr>
<tr>
<td>Email:</td>
<td><input type= "email" name ="email"   class="textInput"  ></td>
</tr>
<tr>
<td>Function:</td>
<td><select name="funct">
 <option>Select Function</option>
			  <?php
$get_func = "SELECT * FROM function"; 
$run_func = mysqli_query($conn, $get_func);

while ($row_func = mysqli_fetch_array($run_func)) {
    $function_id = $row_func['function_id'];
    $func_title = $row_func['fcname'];

    echo "<option value='$function_id'>$func_title</option>";
}
?>

</select></td>
</tr>
<tr>
<td>Username:</td>
<td><input type= "text" name ="username"  class="textInput" required ></td>
</tr>
<tr>
<td>Password:</td>
<td><input type= "password" name ="password"   class="textInput" required ></td>
</tr>
<tr>
<td>Password again:</td>
<td><input type= "password" name ="password2"   class="textInput" required ></td>
</tr>
<tr>
<td></td></tr>
<tr align="center" >
<td colspan="4"><input type="submit" title="Click Here to Register" id="btns" name="regist_btn" value="Add User"/></td>
<tr>
<td><a href="viewusers.php"/>View user</a></td>
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
include("includes/db.php"); // Ensure the database connection ($conn) is available

if (isset($_POST['regist_btn'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $function = mysqli_real_escape_string($conn, $_POST['funct']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    // Check if passwords match
    if ($password == $password2) {
        // Hash the password using password_hash() for better security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $sql = "INSERT INTO users (firstname, lastname, phonenumber, email, username, password, function_id) 
                VALUES ('$firstname', '$lastname', '$phone', '$email', '$username', '$hashed_password', '$function')";

        // Execute the query
        $insert_p = mysqli_query($conn, $sql);

        if ($insert_p) {
            echo "<script>alert('User successfully saved')</script>";
            echo "<script>window.open('register.php?insertuser', '_self')</script>";
        } else {
            echo "<script>alert('Error: Unable to save user.')</script>";
            echo "<script>window.open('register.php?insertuser', '_self')</script>";
        }
    } else {
        echo "<script>alert('The two passwords do not match')</script>";
        echo "<script>window.open('register.php?insertuser', '_self')</script>";
    }
}
?>


