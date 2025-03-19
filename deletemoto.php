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
<?php
if(isset($_GET['delete_moto']))
{
	
	$get_id=$_GET['delete_moto'];
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
<!-- Navigation Bar ends-->
<!-- Content wrappper starts -->
<div class="content_wrapper"> 

<div id="content_area">
<form name="frm" method="post" action="">
          <table  border="0" align="center" cellpadding="0" cellspacing="20px" >
          <tr>
    <td height="38" colspan="2"><h2 align="center">Delete Moto Form</h2></td>
    </tr>
  <tr>
    <td width="140" height="38"><div align="center">Id</div></td>
    <td width="261"><input type="text" value="<?php echo    $id ;?>" name="code"></td>
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
  <tr>
    <td height="37">&nbsp;</td>
    <td><input name="delmt" type="submit" value="Delete" id="btns" style="color: #017572;" /></form>
    <?php
	if(isset($_POST['delmt']))
{
	$mtid=$id;
	if($mtid)
	{
	
		$r=mysql_query("delete from moto where moto_id ='$mtid' ");
		if($r){
		echo "<script>alert('Moto deleted')</script>";
		echo "<script>window.open('viewmoto.php?viewmoto','_self')</script>";}
}}
	?>
    </td>
  </tr>
</table>



 
	

</div>
<div id ="footer" >
Copyright&copy2017 Chrisaime, All Rights Reserved.
</div>
</div>
<!-- Content wrappper ends -->

</div>
</body>
</html>