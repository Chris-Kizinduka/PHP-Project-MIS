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
<form method="post" action="model.php">

<table align="center" cellspacing="5px">
<tr align="center">
<td colspan="8"><u><h2>Set Model </h2></u> </td>
</tr>
<tr>
<td>Marque:</td>
<td><input type= "text" name ="marq" class="textInput"  required ></td>
</tr>
<tr>
<td>Supplier name</td>
<td>
<select name="supplier">
<option>Select a supplier</option>
<?php
$get_sup="select supplier_id, suppliername from supplier";
	$run_sup=mysql_query($get_sup);
	while($row_sup=mysql_fetch_array($run_sup))
	{
		$sup_id=$row_sup['supplier_id'];
		$nme=$row_sup['suppliername'];
		echo"<option value='$sup_id'>$nme</option>";
	}
?>
</select>
</td>	</tr>
<tr align="center">
<td colspan="8"><input type="submit" id="btns" name="model_btn" title="Click Here to save data"  value="Save"/></td></tr>
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
if(isset($_POST['model_btn'])){
	//getting the text data from the fields
	$marque=$_POST['marq'];
	$supname=$_POST['supplier'];
	
	$insert_model="insert into model(marque,supplier_id) 
	values('$marque','$supname')";
	
	$insert_mod=mysql_query($insert_model);
	if($insert_mod){
		
	echo"<script> alert('model Has been Inserted!')</script>";
 echo"<script>window.open('index.php?insert_model','_self')</script>";
	}
}

?>

