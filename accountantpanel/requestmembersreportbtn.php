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
<h2><u>Request Members report</u></h2>
         <div  style="margin-top:50px;text-align:center;">
		 
<div>
    <form method="get" action="reportmemberbtn.php" enctype="multipart/form-data">
		  
		   <h2>From</h2><input type="date" size="50" name="from" required/></br>
			 <h2>To</h2><input type="date" size="50" name="to" required/></br><br>
			  
			  <input type="submit" name= "search" size="50" value="View report" />
			  
    </form>
			</div>		
		
</div></br>


</div>
<div class ="footer2" >
Copyright&copy2017 Chrisaime, All Rights Reserved.
</div>