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

<form method="get" action="searchleasingcontract.php" enctype="multipart/form-data">
<input type="text" size="20" name="query1" placeholder = "Search name"/>
<input type="submit" name="search1" value="search"/>
</form>
</div>
<center><a style=margin-left:800px id="back" href="leasing.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
<h2><u>View leasing contracts</u></h2>
         <table id="pattern-style-b"  align="center" summary="Meeting Results">
		<thead>
    	<tr>
		<th scope="col">SN</th>
		 <th scope="col">Member Name</th>
		 <th scope="col">Moto</th>
		  <th scope="col">Period</th>
		  <th scope="col">Start_Date</th>
		 <th scope="col">End_Date</th>
		 	<th scope="col">Due Amount</th>
				 <th scope="col">Status</th>
		  </thead> 
		   <tbody>
		   
		   
	<?php  
// Make sure $conn is defined for your database connection
$query = mysqli_query($conn, "SELECT leasing.leasing_id, leasing.start_date, leasing.end_date, leasing.due_amount, leasing.status, contractperiod.periodname, member.fname, member.lname, moto.plate_number 
                              FROM leasing  
                              JOIN member ON leasing.member_id = member.member_id 
                              JOIN moto ON leasing.moto_id = moto.moto_id 
                              JOIN contractperiod ON leasing.cid = contractperiod.cid");

if (!$query) {
    die("Query failed: " . mysqli_error($conn)); // Error handling
}

while ($row = mysqli_fetch_assoc($query)) { // Use `mysqli_fetch_assoc()`
    $lid = $row['leasing_id'];
    $sdate = $row['start_date'];
    $edate = $row['end_date'];
    $cid = $row['periodname'];
    $dam = $row['due_amount'];
    $mm = $row['fname'];
    $ml = $row['lname'];
    $mt = $row['plate_number'];
    $status = $row['status'];
?>

<tr>
    <td><?php echo $lid; ?></td>
    <td><?php echo $mm . ' ' . $ml; ?></td>
    <td><?php echo $mt; ?></td>
    <td><?php echo $cid; ?></td>
    <td><?php echo $sdate; ?></td>
    <td><?php echo $edate; ?></td>
    <td><?php echo $dam; ?></td>
    <td><?php echo $status; ?></td>
    <td><a href="editleasing.php?edit_leasing=<?php echo $lid; ?>">Edit</a></td>
    <td><a href="moto_payment.php?pay_moto=<?php echo $lid; ?>">Pay Moto</a></td>
</tr>

<?php } ?>
	   
		   
			
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