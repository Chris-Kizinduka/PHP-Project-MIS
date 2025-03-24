

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

<!-- Header ends here-->
<!-- Navigation Bar starts here-->


<!-- Navigation Bar ends-->
<!-- Content wrappper starts -->

<div  style="margin-top:50px;text-align:center; height:600px; font-size:32px;" >

<div style= 'floatleft' id="print">

<center><a style=margin-left:800px id="back" href="index.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
<div id="print">
<a style=margin-left:1000px href="" id="printpage" onclick="myfunction()"><b>Print page</b><img src="fileprint.png" width="40" height="25" /> </a></td></a>
</div>
<h2><b><img id="logo1" src="images/TVS-Phoenix-125.jpg"width="30" height="30"/>COTAMONYA  MIS</b></h2><br>
</div>
<h2><u> Members Report</u></h2>
        <table id="hor-minimalist-b" border="2" summary="Employee Pay Sheet">
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
		  <th scope="col">Telphone</th>
		  <th scope="col">Location</th>
		 <th scope="col">F_M_Name </th>
		<th scope="col">F_M_Phone</th>
		 <th scope="col">F_ M_ID</th>
		  <th scope="col">Function</th>
		 <th scope="col">LicenseNo</th>
		 <th scope="col">LCat</th>
		  <th scope="col">Date Created</th>
		  
		 </tr>	
		  </thead> 
		   <tbody>
		<?php  
$query = "SELECT * FROM member ORDER BY fname, lname ASC";
$run = mysqli_query($conn, $query);  // Replaced mysql_query with mysqli_query

while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) {  // Replaced mysql_fetch_array with mysqli_fetch_array
    $id = $row['member_id'];
    $firstname = $row['fname'];
    $lastname = $row['lname'];
    $mimage = $row['m_image'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    $nid = $row['n_ID'];
    $status = $row['status'];
    $phone = $row['phone_number'];
    $location = $row['place_of_residence'];
    $fmlymn = $row['fmly_m_name'];
    $fmlymp = $row['fmly_m_phone'];
    $fmlymid = $row['fmly_m_id'];
    $function = $row['function'];
    $drivlic = $row['driving_license_no'];
    $lcategory = $row['license_category'];
    $datecreated = $row['date_created'];
?>
    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $firstname; ?></td>
        <td><?php echo $lastname; ?></td>
        <td><img src="members/<?php echo $mimage; ?>" width="50" height="50"> </td>
        <td><?php echo $dob; ?></td>
        <td><?php echo $gender; ?></td>
        <td><?php echo $nid; ?></td>
        <td><?php echo $status; ?></td>
        <td><?php echo $phone; ?></td>
        <td><?php echo $location; ?></td>
        <td><?php echo $fmlymn; ?></td>
        <td><?php echo $fmlymp; ?></td>
        <td><?php echo $fmlymid; ?></td>
        <td><?php echo $function; ?></td>
        <td><?php echo $drivlic; ?></td>
        <td><?php echo $lcategory; ?></td>
        <td><?php echo $datecreated; ?></td>
    </tr>
<?php } ?>
			</tbody>
			
			</table>	


</div>

</div>

<!-- Content wrappper ends -->

</body>

</html>