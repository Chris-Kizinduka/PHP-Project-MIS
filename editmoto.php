<!DOCTYPE>

<?php
include("includes/db.php");
if(isset($_GET['edit_moto']))
{
	
	$get_id=$_GET['edit_moto'];
	$get_m="SELECT model.marque,moto.moto_id,moto.plate_number,moto.motoimage,moto.model_id,moto.property_value FROM moto  INNER JOIN model ON moto.model_id = model.model_id WHERE moto.moto_id='$get_id'";
	$run_m=mysql_query($get_m);
	if($row_m=mysql_fetch_array($run_m)){
	
                $id=$row_m['moto_id'];
				$platen=$row_m['plate_number'];
                $image=$row_m['motoimage'];
                $mdl=$row_m['marque'];
				$mdlid=$row_m['model_id'];
                $pv=$row_m['property_value'];
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
<td colspan="8"><u><h2>Update Moto Details  </h2></u> </td>
</tr>
<tr>
<td>Plate_Number</td>
<td><input type= "text" name ="plate_number" value="<?php echo    $platen ;?>"   class="textInput"  required ></td>
</tr>
<tr>
<td>Browse Moto Image</td>

<td><input type="file" name="fileToUpload"  ></td>
</tr>
<tr>
<td>Marque:</td>
<td>
<select name="model">
<option value="<?php echo    $mdlid ;?>"><?php echo    $mdl ;?></option>
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
<td><input type= "text" name ="pr_v" value="<?php echo    $pv ;?>"  class="textInput"  ></td>
</tr>
<tr align="center" >
<td colspan="4"><input type="submit" id="btns" title="Click Here to save" style="color: #017572;" name="update_mot" value="Update Moto"/></td>
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
if(isset($_POST['update_mot']))
{
// getting data from text field
$motid=$id;
$plate=$_POST['plate_number'];
$md=$_POST['model'];
$pvalue=$_POST['pr_v'];


	if(empty(basename($_FILES["fileToUpload"]["name"]))){
	$target_file1=$image;
	$update_m="update moto set plate_number = '$plate',motoimage = '$target_file1',model_id = '$md',property_value = '$pvalue' where moto_id='$motid'";
 $run_mm= mysql_query($update_m);
 if( $run_mm)
 {
 echo"<script>alert('Moto Has Been Updated!')</script>";
 echo"<script>window.open('viewmoto.php','_self')</script>";
	}}
	else if(!empty(basename($_FILES["fileToUpload"]["name"]))){
$target_dir1 = "moto_images/";
$target_file1 = $target_dir1 . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "admin_area/$target_file1")) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }		

$update_m="update moto set plate_number = '$plate',motoimage = '$target_file1',model_id = '$md',property_value = '$pvalue' where moto_id='$motid'";
 $run_mm= mysql_query($update_m);
 if( $run_mm)
 {
 echo"<script>alert('Moto Has Been Updated!')</script>";
 echo"<script>window.open('viewmoto.php','_self')</script>";
	}
	}
}




?>
	