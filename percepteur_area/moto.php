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
$get_models="select*from model";
	$run_models=mysql_query($get_models);
	while($row_models=mysql_fetch_array($run_models))
	{
		$model_id=$row_models['model_id'];
		$marque=$row_models['marque'];
		echo"<option value='$model_id'>$marque</option>";
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
if(isset($_POST['msave_btn'])){
	//getting the text data from the fields
	$Mplate_num=$_POST['plate_number'];
	$Mmodel=$_POST['model'];
	$Mpr_value=$_POST['pr_v'];
	$status='active';
	$target_dir = "moto_images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "admin_area/$target_file")) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
	$insert_moto="insert into moto(plate_number,motoimage,model_id,property_value,status) 
	values('$Mplate_num','$target_file','$Mmodel','$Mpr_value','$status')";
	
	$insert_m=mysql_query($insert_moto);
	if($insert_m){
		
	echo"<script> alert('Moto Has been Inserted!')</script>";
 echo"<script>window.open('index.php?insert_moto','_self')</script>";
	}
}

?>

