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
<center><a style=margin-left:800px id="back" href="supplier.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
<h2><u>View Supplier Details </u></h2>
         <table id="pattern-style-b"  align="center" summary="Meeting Results">
		<thead>
    	<tr>
		<th scope="col">SN</th>
		 <th scope="col">Supplier Name</th>
		 <th scope="col">Supplier phone</th>
		  <th scope="col">Email</th>
		  <th scope="col">Address</th>
		  </thead> 
		   <tbody>
		<?php  
			$query="SELECT * FROM supplier ";
			$run=mysql_query($query);
			while($row=mysql_fetch_array($run))
			{
				$sid=$row['supplier_id'];
				$sname=$row['suppliername'];
                $sphn=$row['phone_number'];
                $address=$row['Address'];
                $emails=$row['Email'];
                

			?>
			<tr>
			<td><?php echo $sid;?></td>
			<td><?php echo $sname ;?></td>
			<td><?php echo $sphn; ?> </td>
			<td><?php echo $emails;?></td>
			<td><?php echo $address;?></td>
			<td><a href="editsupplier.php?edit_supplier=<?php echo $sid;?>">Edit</a></td>
			</tr>
			<?php }?>
			</tbody>
			
			</table>	


</div>

</div>
<div class ="footer2" >
Copyright&copy2017 Chrisaime, All Rights Reserved.
</div>
<!-- Content wrappper ends -->

</body>
</html>