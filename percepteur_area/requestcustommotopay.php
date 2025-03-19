<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
<head>
<title> Cotamonya MIS</title>
<link  rel="stylesheet" href="styles/style.css"  type="text/css" />
</head>
<body id ="white">
<!-- Main container starts here-->


<!-- header wrappper starts here-->
<div class="container">
<div class="header_wrapper">
<img src="images/cotabana.jpg"/ width="1300px" height="85px" border="solid 2px #gray"; >
</div>
<!-- Header ends here-->
<!-- Navigation Bar starts here-->


<!-- Navigation Bar ends-->
<!-- Content wrappper starts -->

<div  style="margin-top:50px;text-align:center; height:600px; font-size:32px;" >
<center><a style=margin-left:800px id="back" href="index.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
<h2><u>Request Moto Payment report</u></h2>
         <div  style="margin-top:50px;text-align:center;">
		 
<div >
<form method="get" action="reportcustmtpayment.php" enctype="multipart/form-data">


<input type="text" size="30" placeholder="Enter Leasing Contract ID" name="reportmt" required/>

<input type="submit" name= "search" value="View report"/>


</form>

			</div>		
		
</div></br>


</div>
<div class ="footer2" >
Copyright&copy2017 Chrisaime, All Rights Reserved.
</div>