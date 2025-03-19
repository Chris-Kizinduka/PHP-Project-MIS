
<?php
include("includes/db.php");
if(isset($_GET['edit_member']))
{
	
	$get_id=$_GET['edit_member'];
	$get_m="select * from member where member_id='$get_id'";
	$run_m=mysql_query($get_m);
	if($row_m=mysql_fetch_array($run_m)){;
	
$id=$row_m['member_id'];
$firstname=$row_m['fname'];
$lastname=$row_m['lname'];
$mimage=$row_m['m_image'];
$dob=$row_m['dob'];
$gender = $row_m['gender'];
$nid = $row_m['n_ID'];
$status=$row_m['status'];
$phone=$row_m['phone_number'];
$location=$row_m['place_of_residence'];
$fmlymn = $row_m['fmly_m_name'];
$fmlymp = $row_m['fmly_m_phone'];
$fmlymid = $row_m['fmly_m_id'];
$function = $row_m['function'];
$drivlic = $row_m['driving_license_no'];
$lcategory = $row_m['license_category'];
$datecreated = $row_m['date_created'];
	}		
}
?>
<!DOCTYPE>
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
<li><a href="index1.php">Home</a></li>
   <li><a href="member.php">Member <img src="arrow_down.png"/></a>
   <ul >
             
             <li><a href="viewmember.php">View Member</a></li>
             
             </ul>
   
   
   
   </li>
   <li><a href="#">Leasing </a>
    
   
   </li>
   <li><a href="#">Moto </a>
			
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
<li><a href="index1.php">Reports <img src="arrow_down.png"/></a>
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
			
			  <li><a href="#">Leasing contract Report</a></li>
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
<form name="frm" method="post" action="" enctype="multipart/form-data" >
<table align="center" cellspacing="15">
<tr align="center">
<td colspan="8"><u><h2>Update Member Form  </h2></u> </td>
</tr>
<tr>
<td>First name:</td>
<td><input type= "text" name ="fname" value="<?php echo    $firstname ;?>"  class="textInput"  required ></td>
<td>Last name:</td>
<td><input type= "text" name ="lname"   value="<?php echo   $lastname ;?>" class="textInput"  required ></td>
</tr>
<tr>
<td>Select Image to upload:</td>
<td><input type="file" name="fileToUpload1"></td>
<td>Date Of Birth :</td>
 <td><input type="date" name="date" value="<?php echo    $dob ;?>" ></td> 
</tr>
<tr>
<td>Gender:</td>
<td><select name="gender"  >
<option value="<?php echo    $gender ;?>" > <?php echo $gender ;?> </option>
<option value="male">Male</option>
<option value="female">Female</option>
</select></td>
<td>National ID:</td>
<td><input type= "text" name ="n_ID"  value="<?php echo    $nid ;?>" class="textInput"  required ></td>
</tr>
<tr>
<td>Status:</td>
<td><select name="status"  >
<option value="<?php echo    $status ;?>"><?php echo    $status ;?></option>
<option value="Single">Single</option>
<option value="Married">Married</option>
</select></td>
<td>Phone number:</td>
<td><input type= "text" name ="phonen"  value="<?php echo    $phone ;?>" class="textInput"  required ></td>
</tr>
<tr><td>Location:</td>
<td><input type= "text" name ="location"  value="<?php echo    $location ;?>"  class="textInput"  required ></td>
</tr>
<tr align="center">
<td colspan="8"><u><h2> Family Member Details </h2></u> </td>
</tr>
<tr>
<td>Family M. Name:</td>
<td><input type= "text" name ="fmlyn"   value="<?php echo   $fmlymn ;?>" class="textInput"   ></td>
<td>Family M phone:</td>
<td><input type= "text" name ="fmlyp"   value="<?php echo    $fmlymp ;?>" class="textInput"   ></td>
</tr>
<tr>
<td>Family M ID:</td>
<td><input type= "text" name ="fmlyid"   value="<?php echo    $fmlymid ;?>"  class="textInput"   ></td></tr>
<tr >
<td colspan="10">________________________________________________________________________________</td>
</tr>
<tr>
<td>Function:</td>
<td><select name="function" >
<option value="<?php echo   $function ;?>" ><?php echo   $function ;?></option>
<option value="Driver">Driver</option>
<option value="Employee">Employee</option>
<option value="shareholder">Shareholder only</option>
</select></td>
</tr>
<tr>
<td>Driving_License_No:</td>
<td><input type= "text" name ="drivlic"   value="<?php echo    $drivlic ;?>" class="textInput"  ></td>
<td>L_Category:</td>
<td><select name ="lcat" >
<option value="<?php echo    $lcategory ;?>"><?php echo    $lcategory ;?></option>
<option></option>
<option value="A">A</option>
<option value="A,B">A,B</option>
<option value="A,B,C">A,B,C</option>
<option value="A,B,C">A,B,C,D</option>
</select></td>
</tr>
<tr >
<td colspan="10">________________________________________________________________________________</td>
</tr>
<tr align="center">
<td colspan="6"><input type="submit" id="btns" name="update_m" value="Update Member"><br><br>
<td><h5><a href="viewmember.php">View members</a></h5></td>
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
if(isset($_POST['update_m']))
{
// getting data from text field
$upid=$id;
$firstname1=$_POST['fname'];
$lastname1=$_POST['lname'];
$phone1=$_POST['phonen'];
$status1=$_POST['status'];
$dob1=$_POST['date'];
$birthdate=new DateTime($dob1);
$interval=$birthdate->diff(new DateTime);
$age=$interval->y;
$function1=$_POST['function'];
$gender1 = $_POST['gender'];
$nid1 = $_POST['n_ID'];
$location1=$_POST['location'];
$fmlymn1 = $_POST['fmlyn'];
$fmlymp1 = $_POST['fmlyp'];
$fmlymid1 = $_POST['fmlyid'];
$drivlic1 = $_POST['drivlic'];
$lcategory1 = $_POST['lcat'];

if($age>=16){
	if(empty(basename($_FILES["fileToUpload1"]["name"]))){
	$target_file1=$mimage;
	$update_member="update member set fname = '$firstname1',lname = '$lastname1',m_image = '$target_file1',dob = '$dob1',gender = '$gender1',n_ID ='$nid1',status = '$status1',phone_number = '$phone1',place_of_residence = '$location1', fmly_m_name='$fmlymn1', fmly_m_phone='$fmlymp1',fmly_m_id='$fmlymid1',function='$function1', driving_license_no= '$drivlic1', license_category ='$lcategory1'  where member_id='$upid'";
 $run_mm= mysql_query($update_member);
 if( $run_mm)
 {
 echo"<script>alert('member Has Been Updated!')</script>";
 echo"<script>window.open('viewmember.php','_self')</script>";
	}}
	else if(!empty(basename($_FILES["fileToUpload1"]["name"]))){
$target_dir1 = "m_images/";
$target_file1 = $target_dir1 . basename($_FILES["fileToUpload1"]["name"]);
$uploadOk = 1;
  $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	  if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], "members/$target_file1")) {
        echo "The file ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }		

$update_member="update member set fname = '$firstname1',lname = '$lastname1',m_image = '$target_file1',dob = '$dob1',gender = '$gender1',n_ID ='$nid1',status = '$status1',phone_number = '$phone1',place_of_residence = '$location1', fmly_m_name='$fmlymn1', fmly_m_phone='$fmlymp1',fmly_m_id='$fmlymid1',function='$function1', driving_license_no= '$drivlic1', license_category ='$lcategory1'  where member_id='$upid'";
 $run_mm= mysql_query($update_member);
 if( $run_mm)
 {
 echo"<script>alert('member Has Been Updated!')</script>";
 echo"<script>window.open('viewmember.php','_self')</script>";

 }
}
}else{
echo "<script>alert('Sorry you are $age years old a Teenager not allowed to be registered!! ')</script>";	
}

}

?>
	