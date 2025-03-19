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

<script>
function myfunction()
{
	var printButton = document.getElementById("printpage");
	var back = document.getElementById("back");
	printButton.style.visibility = 'hidden';
	back.style.visibility = 'hidden';
	printButton.style.visibility = 'hidden';
	window.print()
}

</script>

<!-- header wrappper starts here-->
<div class="container">
<div class="header_wrapper">
<img src="images/cotabana.jpg"/ width="1600px" height="100px" border="solid 2px #gray"; >
</div>
<!-- Header ends here-->
<!-- Navigation Bar starts here-->


<!-- Navigation Bar ends-->
<!-- Content wrappper starts -->

<div  style="margin-top:50px;text-align:center; height:600px; font-size:32px;" >
<div style= 'floatleft'>

<form method="get" action="searchmember.php" enctype="multipart/form-data">
<input type="text" size="20" name="query" placeholder = "Search a Member"/>
<input type="submit" name="search" value="search"/>
</form>
</div>
<div style= 'floatleft' id="print">

<center><a style=margin-left:800px id="back" href="member.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
<!--<div id="print">
<a style=margin-left:1000px href="" id="printpage" onclick="myfunction()"><b>Print page</b><img src="fileprint.png" width="40" height="25" /> </a></td></a>
</div>-->
</div>
<h2><u>View Members Information</u></h2>
         <table id="pattern-style-b"  align="center" summary="Meeting Results">
		<thead>
    	<tr>
		<th scope="col">SN</th>
		 <th scope="col">FirstName</th>
		 <th scope="col">LastName</th>
		 <th scope="col">MImage</th>
		 <th scope="col">DOB</th>
		  <th scope="col">Gender</th>
		  <th scope="col">NID</th>
		 <th scope="col">Status</th>
		  <th scope="col">Phone number</th>
		  <th scope="col">Location</th>
		 <th scope="col">Family M Name</th>
		<th scope="col">Family M Phone</th>
		 <th scope="col">Family M ID</th>
		  <th scope="col">Function</th>
		 <th scope="col">Driving LicenseNo</th>
		 <th scope="col">L_Category</th>
		  <th scope="col">Date Created</th>
		   <th scope="col"></th>
			<th scope="col"></th>
		 </tr>	
		  </thead> 
		   <tbody>
		<?php  
			$query="select * from member ORDER BY fname ASC";
			$run=mysql_query($query);
			while($row=mysql_fetch_array($run))
			{
				$id=$row['member_id'];
				$firstname=$row['fname'];
$lastname=$row['lname'];
$mimage=$row['m_image'];
$dob=$row['dob'];
$gender = $row['gender'];
$nid = $row['n_ID'];
$status=$row['status'];
$phone=$row['phone_number'];
$location=$row['place_of_residence'];
$fmlymn = $row['fmly_m_name'];
$fmlymp = $row['fmly_m_phone'];
$fmlymid = $row['fmly_m_id'];
$function=$row['function'];
$drivlic = $row['driving_license_no'];
$lcategory = $row['license_category'];
$datecreated=$row['date_created']				?>
			<tr>
			<td><?php echo $id;?></td>
			<td><?php echo $firstname;?></td>
			<td><?php echo $lastname;?></td>
			<td><img src="members/<?php echo $mimage; ?>" width="100" height="100"> </td>
			<td><?php echo $dob;?></td>
			<td><?php echo $gender;?></td>
			<td><?php echo $nid;?></td>
			<td><?php echo $status;?></td>
			<td><?php echo $phone;?></td>
			<td><?php echo $location;?></td>
			<td><?php echo $fmlymn;?></td>
			<td><?php echo $fmlymp;?></td>
			<td><?php echo $fmlymid;?></td>
			<td><?php echo $function;?></td>
			<td><?php echo $drivlic;?></td>
			<td><?php echo $lcategory;?></td>
			<td><?php echo $datecreated;?></td>
		
			
			<td><a href="editmember.php?edit_member=<?php echo $id;?>">edit</a></td>
			<td><a href="mcard.php?id_card=<?php echo $id;?>">View Card</a></td>
			</tr>
			<?php }?>
			</tbody>
			
			</table>	

<div id ="footer1" >
Copyright&copy2017 Chrisaime, All Rights Reserved.
</div>
</div>

</div>

<!-- Content wrappper ends -->

</body>

</html>