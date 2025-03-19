<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
<head>
<title> COTAMONYA  MIS</title>
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
<div style= 'floatleft'>

<form method="get" action="searchmoto.php" enctype="multipart/form-data">
<input type="text" size="40" name="query1" placeholder = "Search Plate number ex: RB 100 D"/>
<input type="submit" name="search1" value="search"/>
</form>
</div>
<center><a style=margin-left:800px id="back" href="moto.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
<h2><u>View Motos Details</u></h2>
         <table id="pattern-style-b"  align="center" summary="Meeting Results">
		<thead>
    	<tr>
		<th scope="col">SN</th>
		 <th scope="col">Platenumber</th>
		 <th scope="col">Moto Image</th>
		  <th scope="col">Model</th>
		  <th scope="col">Property Value</th>
	
		  </thead> 
		   <tbody>
		<?php  
			$query="SELECT model.marque,moto.moto_id,moto.plate_number,moto.motoimage,moto.property_value FROM moto  INNER JOIN model ON moto.model_id = model.model_id ";
			$run=mysql_query($query);
			while($row=mysql_fetch_array($run))
			{
				$id=$row['moto_id'];
				$platen=$row['plate_number'];
                $image=$row['motoimage'];
                $mdl=$row['marque'];
                $pv=$row['property_value'];
               

			?>
			<tr>
			<td><?php echo $id;?></td>
			<td><?php echo $platen;?></td>
			<td><img src="admin_area/<?php echo $image; ?>" width="100" height="100"> </td>
			<td><?php echo $mdl;?></td>
			<td><?php echo $pv;?></td>		
			<td><a href="editmoto.php?edit_moto=<?php echo $id;?>">Edit</a></td>
			<td><a href="deletemoto.php?delete_moto=<?php echo $id;?>">Delete</a></td>
			</tr>
			<?php }?>
			</tbody>
			
			</table>	

<div class ="footer2" >
Copyright&copy2017 Chrisaime, All Rights Reserved.
</div>
</div>

</div>

<!-- Content wrappper ends -->

</body>
</html>