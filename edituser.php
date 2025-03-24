<!DOCTYPE>

<?php
include("includes/db.php"); // Ensure $conn is included and available

if (isset($_GET['edit_user'])) {
    
    $get_id = $_GET['edit_user'];

    // Query without prepared statements (as per request)
    $query = "SELECT function.fcname, users.user_id, users.firstname, users.lastname, users.function_id, 
                     users.phonenumber, users.email, users.username, users.password 
              FROM users 
              INNER JOIN function ON users.function_id = function.function_id 
              WHERE users.user_id = '$get_id'";

    $run = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_array($run)) {
        $id = $row['user_id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $phone = $row['phonenumber'];
        $email = $row['email'];
        $username = $row['username'];
        $password = $row['password'];
        $functions = $row['fcname'];
        $funcid = $row['function_id'];
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
<form method="post" action="" enctype="multipart/form-data">
    <table align="center" cellspacing="20px">
        <tr align="center">
            <td colspan="8"><u><h2> User Registration </h2></u></td>
        </tr>
        <tr>
            <td>First Name:</td>
            <td><input type="text" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>" class="textInput" required></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="text" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>" class="textInput" required></td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td><input type="text" name="phonenumber" value="<?php echo htmlspecialchars($phone); ?>" class="textInput" required></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="textInput" required></td>
        </tr>
        <tr>
            <td>Function:</td>
            <td>
                <select name="funct" required>
                    <option value="<?php echo $funcid; ?>"><?php echo htmlspecialchars($functions); ?></option>
                    <?php
                    // Ensure you have a valid database connection using mysqli
                    // Assuming $conn is already established
                    $get_func = "SELECT * FROM function";
                    $result = mysqli_query($conn, $get_func); // Execute query

                    if ($result) {
                        while ($row_func = mysqli_fetch_array($result)) {
                            $function_id = $row_func['function_id'];
                            $func_title = $row_func['fcname'];
                            // Output each option
                            echo "<option value='$function_id'>" . htmlspecialchars($func_title) . "</option>";
                        }
                        mysqli_free_result($result); // Free result set
                    } else {
                        echo "Error fetching data: " . mysqli_error($conn); // Handle error
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" class="textInput" required></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" class="textInput"></td>
        </tr>
        <tr>
            <td>Confirm Password:</td>
            <td><input type="password" name="password2" class="textInput"></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr align="center">
            <td colspan="4">
                <input type="submit" title="Click Here to Update" id="btns" style="color: #017572;" name="updateuser_btn" value="Update User" />
            </td>
        </tr>
        <tr>
            <td><a href="viewusers.php">View Users</a></td>
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
include("includes/db.php"); // Assuming you have your MySQLi connection in db.php

// Check if the form is submitted
if (isset($_POST['updateuser_btn'])) {
    // Get user input
    $idu = $id; // Assuming $id is defined elsewhere (e.g., from session)
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phonenumber'];
    $function = $_POST['funct'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Check if passwords match
    if ($password == $password2) {
        // Hash the password using password_hash() (bcrypt is the default)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Create the SQL query to update the user
        $sql = "UPDATE users 
                SET firstname = '$firstname', lastname = '$lastname', phonenumber = '$phone', email = '$email', username = '$username', password = '$hashed_password', function_id = '$function' 
                WHERE user_id = '$idu'";

        // Execute the query using mysqli_query
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('User successfully updated');</script>";
            echo "<script>window.open('viewusers.php?updateuser', '_self');</script>";
        } else {
            echo "<script>alert('Error updating user: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        // Passwords don't match
        echo "<script>alert('The two passwords do not match');</script>";
        echo "<script>window.open('viewusers.php?updateuser', '_self');</script>";
    }
}
?>

