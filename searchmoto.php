<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
<head>
<title>COTAMONYA  MIS</title>
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
<center><a style=margin-left:800px id="back" href="viewmoto.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
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
	   if(isset($_GET['search1'])){
	
       $searchq=$_GET['query1'];
			$query1=mysql_query("SELECT model.marque,moto.moto_id,moto.plate_number,moto.motoimage,moto.property_value FROM moto  INNER JOIN model ON moto.model_id = model.model_id  where moto.plate_number LIKE '%$searchq%'") or die("could not search!");
			
			
			$count=mysql_num_rows($query1);
if($count == 0){
	echo "<script>alert('No search Found!')</script>";
		 echo"<script>window.open('viewmoto.php','_self')</script>";
}
$i=0;
			
			while($row=mysql_fetch_array($query1))
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

			<table>

			<?php }?>


</div>

</div>
<div class ="footer2" >
Copyright&copy2017 Chrisaime, All Rights Reserved.
</div>
<!-- Content wrappper ends -->

</body>
</html>