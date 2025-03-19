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
<div id="form">


<form method="get" action="searchleasingcontract.php" enctype="multipart/form-data">
<input type="text" size="20" name="query1" placeholder ="Search a Contract"/>
<input type="submit" name="search1" value="search"/>
</form>
</div>
<div id="moto_box">

</div>

</div>
<div id ="footer" >
Copyright&copy2017 Chrisaime, All Rights Reserved.
</div>
</div>
<!-- Content wrappper ends -->

</div>
</body>
</html>