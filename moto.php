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
<form method="post" action="moto.php" enctype="multipart/form-data">

<table align="center" cellspacing="20px">
<tr align="center">
<td colspan="8"><u><h2>MOTO Details  </h2></u> </td>
</tr>
<tr>
<td>Plate_Number</td>
<td><input type= "text" name ="plate_number"    class="textInput"  required ></td>
</tr>
<tr>
<td>Browse Moto Image</td>

<td><input type="file" name="fileToUpload" id="fileToUpload" ></td>
</tr>
<tr>
<td>Marque:</td>
<td>
<select name="model">
<option>Select a Model</option>


<?php
// Ensure the MySQLi connection is established before running the query
$get_models = "SELECT * FROM model";
$run_models = mysqli_query($conn, $get_models); // Use `mysqli_query()` instead of `mysql_query()`

if ($run_models) {
    while ($row_models = mysqli_fetch_assoc($run_models)) { // Use `mysqli_fetch_assoc()` instead of `mysql_fetch_array()`
        $model_id = $row_models['model_id'];
        $marque = $row_models['marque'];
        echo "<option value='$model_id'>$marque</option>";
    }
} else {
    echo "Error: " . mysqli_error($conn); // Handle any errors
}
?>


</select>
</td>	
</tr>
<tr>
<td>Property Value</td>
<td><input type= "text" name ="pr_v"   class="textInput"  ></td>
</tr>
<tr align="center" >
<td colspan="4"><input type="submit" id="btns" title="Click Here to save" name="msave_btn" value="Save"/></td>
<td colspan="4"><a href="viewmoto.php">View Moto</a></td></tr>
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
if (isset($_POST['msave_btn'])) {
    // Getting the text data from the fields
    $Mplate_num = $_POST['plate_number'];
    $Mmodel = $_POST['model'];
    $Mpr_value = $_POST['pr_v'];
    $status = 'active';

    // File upload handling
    $target_dir = "moto_images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    // Check if the file is an image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Move the uploaded file to the desired folder
    if ($uploadOk == 1 && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "admin_area/$target_file")) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "cotamonyadb");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert data into the database
    $insert_moto = "INSERT INTO moto (plate_number, motoimage, model_id, property_value, status) 
                    VALUES ('$Mplate_num', '$target_file', '$Mmodel', '$Mpr_value', '$status')";

    $insert_m = mysqli_query($conn, $insert_moto);

    if ($insert_m) {
        echo "<script>alert('Moto Has been Inserted!');</script>";
        echo "<script>window.open('index.php?insert_moto', '_self');</script>";
    } else {
        echo "Error: " . mysqli_error($conn); // Error handling
    }

    // Close connection
    mysqli_close($conn);
}
?>











