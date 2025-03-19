<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
<head>
<title> Cotamonya MIS</title>
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
             <li><a href="editmember.php">update</a></li>
             <li><a href="viewmember.php">View Member</a></li>
             
             </ul>
   
   
   
   </li>
   <li><a href="leasing.php">Leasing <img src="arrow_down.png"/></a></li>
   <li><a href="moto.php">Moto <img src="arrow_down.png"/></a>
			<ul>
             <li><a href="supplier.php">Supplier</a></li>
             <li><a href="model.php">Model</a></li>
             <li><a href="#">update</a></li>
             <li><a href="#">Anything</a></li>
             
             </ul>
         </li>
  
<li><a href="payment_types.php">Paymenttypes <img src="arrow_down.png"/> </a>
<ul>
             <li><a href="#">update</a></li>
             <li><a href="#">delete</a></li>
             </ul>

</li>
<li><a href="payment.php">Payments <img src="arrow_down.png"/></a>
<ul >
             <li><a href="#">update</a></li>
             <li><a href="#">delete</a></li>
             </ul>
</li>
<li><a href="#">Reports <img src="arrow_down.png"/></a>
<ul >
             <li><a href="#">View Members</a></li>
             <li><a href="#">View leasing contract</a></li>
             <li><a href="#">View payments</a></li>
             </ul>


</li>
<li><a href="register.php">Sign Up <img src="arrow_down.png"/></a>
<ul >
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
<form method="post" action="function.php">

<table align="center" cellspacing="5px">
<tr align="center">
<td colspan="8"><u><h2>Set User Functions   </h2></u> </td>
</tr>
<tr>
<td>role:</td>
<td><input type= "text" name ="role"    class="textInput"  required ></td>
</tr>

<td colspan="8"><input type="submit" name="role_btn" title="Click Here to save data" id="btns" value="Save"/></td></tr>
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
if(isset($_POST['role_btn'])){
	//getting the text data from the fields
	$rolename=$_POST['role'];
	
	$insert_function="insert into function(fcname)values('$rolename')";
	
	$insert_func=mysql_query($insert_function);
	if($insert_func){
		
	echo"<script> alert('function Has been Inserted!')</script>";
 echo"<script>window.open('index.php?insert_function','_self')</script>";
	}
}

?>

