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
<center><a style=margin-left:800px id="back" href="moto.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
<h2><u>View Payment types</u></h2>
         <table id="pattern-style-b"  align="center" summary="Meeting Results">
		<thead>
    	<tr>
		<th scope="col">SN</th>
		 <th scope="col">Name of payment</th>
		 <th scope="col">Amount</th>
		  </thead> 
		   <tbody>
		<?php  
// Assuming you have already established a connection with MySQLi in $conn
$query = "SELECT * FROM payment_types";
$run = $conn->query($query); // Use MySQLi's query method

if ($run->num_rows > 0) { // Check if any rows are returned
    while ($row = $run->fetch_assoc()) { // Fetch each row as an associative array
        $pid = $row['paymenttypes_id'];
        $typename = $row['type_name'];
        $amount_to_pay = $row['amount_to_pay'];
        ?>
        <tr>
            <td><?php echo $pid; ?></td>
            <td><?php echo $typename; ?></td>
            <td><?php echo $amount_to_pay; ?> </td>
            <td><a href="editpaymenttype.php?edit_paytype=<?php echo $pid; ?>">Edit</a></td>
            <td><a href="payment.php?pay_type=<?php echo $pid; ?>">Delete</a></td>
        </tr>
        <?php 
    }
} else {
    echo "No payment types found.";
}
?>

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