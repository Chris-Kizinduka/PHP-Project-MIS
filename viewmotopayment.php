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

<form method="get" action="searchmotopayment.php" enctype="multipart/form-data">
<input type="text" size="20" name="query1" placeholder = "Search name"/>
<input type="submit" name="search1" value="search"/>
</form>
</div>
<center><a style=margin-left:800px id="back" href="index.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
<h2><u>View Moto payment</u></h2>
         <table id="pattern-style-b"  align="center" summary="Meeting Results">
		<thead>
    	<tr>
		<th scope="col">SN</th>
		 <th scope="col">Member Name</th>
		 <th scope="col">Leasing Id</th>
		 <th scope="col">Number of day paid</th>
		  <th scope="col">Due Amount</th>
		  <th scope="col">Total Paid</th>
		 <th scope="col">Remaining</th>
		 	
				 <th scope="col"></th>
		  </thead> 
		   <tbody>
		<?php  
include("includes/db.php");

$query = "SELECT moto_payment.moto_pay_id, 
                 SUM(moto_payment.paid_amount) AS mptot, 
                 moto_payment.dueamount, 
                 COUNT(moto_payment.leasing_id) AS cpay, 
                 moto_payment.leasing_id, 
                 member.fname, 
                 member.lname 
          FROM moto_payment 
          JOIN leasing ON moto_payment.leasing_id = leasing.leasing_id  
          LEFT JOIN member ON leasing.member_id = member.member_id 
          GROUP BY moto_payment.leasing_id";

$run = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($run)) {
    $mtid = $row['moto_pay_id'];
    $sumpaid = $row['mptot'];
    $countpay = $row['cpay'];
    $lid = $row['leasing_id'];
    $dam = $row['dueamount'];
    $mm = $row['fname'];
    $ml = $row['lname'];
    $mt = $dam - $sumpaid;
?>

<tr>
    <td><?php echo $mtid; ?></td>
    <td><?php echo $mm . " " . $ml; ?></td>
    <td><?php echo $lid; ?></td>
    <td><?php echo $countpay; ?> Day(s)</td>
    <td><?php echo $dam; ?></td>
    <td><?php echo $sumpaid; ?></td>
    <td><?php echo $mt; ?></td>
    <td><a href="editmotopay.php?edit_motopay=<?php echo $mtid; ?>">Edit</a></td>
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