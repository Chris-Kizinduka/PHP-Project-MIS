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
<div id="form">
<form method="get" action="searchmember.php" enctype="multipart/form-data">
<input type="text" size="20" name="query" placeholder ="Search a Member"/>
<input type="submit" name="search" value="search"/>
</form>
</div>
<form name="frm" method="post" action="member.php" enctype="multipart/form-data" >
<table align="center" cellspacing="15">
<tr align="center">
<td colspan="8"><u><h2>Add Member Form</h2></u> </td>
</tr>
<tr>
<td>First name:</td>
<td><input type= "text" name ="fname"  placeholder="" class="textInput"  required ></td>
<td>Last name:</td>
<td><input type= "text" name ="lname"   placeholder="" class="textInput"  required ></td>
</tr>
<tr>
<td>Select Image to upload:</td>
<td><input type="file" name="fileToUpload" ></td>


<td>Date Of Birth :</td>
 <td><input type="date" name="date" ></td>
</tr>
<tr>
<td>Gender:</td>
<td><select name="gender">
<option selected="selected">Select Gender</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select></td>
<td>National ID:</td>
<td><input type= "text" name ="n_ID"  placeholder="" class="textInput"  required ></td>
</tr>
<tr>
<td>Status:</td>
<td><select name="status">
<option selected="selected">Select status</option>
<option value="Single">Single</option>
<option value="Married">Married</option>
</select></td>
<td>Phone number:</td>
<td><input type= "text" name ="phonen"   placeholder="" class="textInput"  required ></td>
</tr>
<tr><td>Location:</td>
<td><input type= "text" name ="location"  placeholder="" class="textInput"  required ></td>
</tr>
<tr align="center">
<td colspan="8"><u><h2> Family Member Details </h2></u> </td>
</tr>
<tr>
<td>Family M. Name:</td>
<td><input type= "text" name ="fmlyn"   placeholder="" class="textInput"   ></td>
<td>Family M phone:</td>
<td><input type= "text" name ="fmlyp"   placeholder="" class="textInput"   ></td>
</tr>
<tr>
<td>Family M ID:</td>
<td><input type= "text" name ="fmlyid"  placeholder="" class="textInput"   ></td></tr>
<tr >
<td colspan="10">________________________________________________________________________________</td>
</tr>
<tr>
<td>Function:</td>
<td><select name="function">
<option selected="selected">Select Function</option>
<option value="Driver">Driver</option>
<option value="Employee">Employee</option>
<option value="shareholder">Shareholder only</option>
</select></td>
</tr>
<tr>
<td>Driving_License_No:</td>
<td><input type= "text" name ="drivlic" class="textInput"  ></td>
<td>L_Category:</td>
<td><select name ="lcat" >
<option selected="selected">Select category</option>
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
<td colspan="6"><input type="submit" name="mem_btn" id="btns" style="color: #017572;" value="Save Member"><br><br>
<h6><a href="viewmember.php">View members</a></h6>
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
if(isset($_POST['mem_btn'])){
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$phone=$_POST['phonen'];
$status=$_POST['status'];
$dob=$_POST['date'];
$birthdate=new DateTime($dob);
$interval=$birthdate->diff(new DateTime);
$age=$interval->y;
$function=$_POST['function'];
$gender = $_POST['gender'];
$nid = $_POST['n_ID'];
$location=$_POST['location'];
$fmlymn = $_POST['fmlyn'];
$fmlymp = $_POST['fmlyp'];
$fmlymid = $_POST['fmlyid'];
$drivlic = $_POST['drivlic'];
$lcategory = $_POST['lcat'];

	if($age<16){
	echo "<script>alert('Sorry you are $age years old a Teenager not allowed to be registered ')</script>";	
	}else{
$target_dir = "m_images/";
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
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "members/$target_file")) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }		
$sql ="insert into member(fname,lname,m_image,dob,gender,n_ID,status,phone_number,place_of_residence,fmly_m_name,fmly_m_phone,fmly_m_id,function,driving_license_no,license_category,date_created)
values('$firstname','$lastname','$target_file','$dob','$gender','$nid','$status','$phone','$location','$fmlymn','$fmlymp','$fmlymid','$function','$drivlic','$lcategory',Now())";
$insert_p = mysql_query($sql);
	 if($insert_p)
	{
		echo "<script>alert('a member saved')</script>";
		 echo"<script>window.open('member.php?insertuser','_self')</script>";
		
	}	
	}
}


?>
