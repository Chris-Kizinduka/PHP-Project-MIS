<!DOCTYPE>

<?php
include("includes/db.php");
if(isset($_GET['edit_user']))
{
	function clean($str){
		$str=@trim($str);
	if(get_magic_quotes_gpc())
	{
	$str=stripslashes($str);	
	}
	return mysql_real_escape_string($str);
	}
	
	$get_id=$_GET['edit_user'];
	$query="SELECT function.fcname,users.user_id,users.firstname,users.lastname,users.function_id,users.phonenumber,users.email,users.username,users.password FROM users INNER JOIN function ON users.function_id = function.function_id where users.user_id='$get_id'";
			$run=mysql_query($query);
			if($row=mysql_fetch_array($run))
			{
				$id=$row['user_id'];
				$firstname=$row['firstname'];
$lastname=$row['lastname'];
$phone=$row['phonenumber'];
$email=$row['email'];
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
<td colspan="8"><u><h2> User registration  </h2></u> </td>
</tr>
<tr>
<td>First name:</td>
<td><input type= "text" name ="firstname" value="<?php echo  $firstname ;?>" class="textInput"  required ></td>
</tr>
<tr>
<td>Last name:</td>
<td><input type= "text" name ="lastname" value="<?php echo  $lastname ;?>" class="textInput"  required ></td>
</tr>
<tr>
<td>Phone number:</td>
<td><input type= "text" name ="phonenumber" value="<?php echo  $phone ;?>" class="textInput" required ></td>
</tr>
<tr>
<td>Email:</td>
<td><input type= "email" name ="email" value="<?php echo  $email ;?>"  class="textInput"></td>
</tr>
<tr>
<td>Function:</td>
<td><select name="funct">
 <option value="<?php echo $funcid  ;?>"><?php echo $functions ;?></option>
			   <?php
				 
				 $get_func = "select * from function";
				 
				 $run_func = mysql_query($get_func);
				 
				 while ($row_func=mysql_fetch_array($run_func)) {
				 
				    $function_id = $row_func['function_id'];
					$func_title = $row_func['fcname'];
				 
				 echo "<option value='$function_id'> $func_title </option>";
				
				}
				
				
				
				?>		  
</select></td>
</tr>
<tr>
<td>Username:</td>
<td><input type= "text" name ="username" value = "<?php echo    $username ;?>" class="textInput" required ></td>
</tr>
<tr>
<td>Password:</td>
<td><input type= "password" name ="password" value = "<?php echo   clean($password);?>"  class="textInput" required ></td>
</tr>
<tr>
<td>Password again:</td>
<td><input type= "password" name ="password2" value = "<?php echo    clean($password) ;?>"  class="textInput" required ></td>
</tr>
<tr>
<td></td></tr>
<tr align="center" >
<td colspan="4"><input type="submit" title="Click Here to Register" id="btns" style="color: #017572;" name="updateuser_btn" value="Update User"/></td>
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
include("includes/db.php");
  // connect to database
if(isset($_POST['updateuser_btn'])){
$idu=$id;	
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$phone=$_POST['phonenumber'];
$function=$_POST['funct'];
$username = $_POST['username'];
$email = $_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];

if($password==$password2) {
	// create user
$password = md5($password); //hash password before storing for security purposes	
$sql ="update users set firstname = '$firstname',lastname = '$lastname',phonenumber = '$phone',email='$email',username='$username',password='$password',function_id='$function' where user_id='$idu'";
$insert_p = mysql_query($sql);
	 if($insert_p)
	{
		echo "<script>alert('User successful Updated')</script>";
		 echo"<script>window.open('viewusers.php?updateuser','_self')</script>";
		
	}	

}else{
echo "<script>alert('The two passwords do not match')</script>";
		 echo"<script>window.open('viewusers.php?updateuser','_self')</script>";	
	
}
}

?>
