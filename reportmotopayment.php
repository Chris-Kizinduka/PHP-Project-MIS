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
<form name="frm" method="post" action="" enctype="multipart/form-data" >
<!-- Header ends here-->
<!-- Navigation Bar starts here-->


<!-- Navigation Bar ends-->
<!-- Content wrappper starts -->

<div  style="margin-top:10px;text-align:center; height:600px; font-size:32px;" >
<div  id="print">

<center><a style=margin-left:800px id="back" href="index.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
</div> <div id="print">
<a style=margin-left:1000px href="" id="printpage" onclick="myfunction()"><b>Print page</b><img src="fileprint.png" width="40" height="25" /> </a></td></a>
</div>
<h2><b><img id="logo1" src="images/TVS-Phoenix-125.jpg"width="30" height="30"/>COTAMONYA  MIS</b></h2><br>

<h2><u>Moto Payment Report</u></h2>
         <table id="hor-minimalist-bbb" border="1"  summary="L">
		<thead>
    	<tr>
		<th scope="col">SN</th>
		 <th scope="col">Member Name</th>
		 <th scope="col">MImage</th>
		 <th scope="col">Telphone</th>
		 <th scope="col">Function</th>
		 <th scope="col">Leasing Id</th>
		 <th scope="col">Moto platenumber</th>
		 <th scope="col">Property value </th>
		  <th scope="col">Due Amount</th>
		  <th scope="col">Total Paid</th>
		 <th scope="col">Remaining</th>
		 <th scope="col">Number of day paid</th>
		 <th scope="col">Profit/Loss</th>
		 <th scope="col">Expected Profit</th>
		
		  </thead> 
		   <tbody>
<?php  

$sum = 0;
$sum1 = 0;
$sum2 = 0;
$sum3 = 0;

// Replacing mysql_* with mysqli_*
$query = mysqli_query($conn, "SELECT moto_payment.moto_pay_id, sum(moto_payment.paid_amount) AS mptot, moto_payment.dueamount, 
                             count(moto_payment.leasing_id) AS cpay, moto_payment.leasing_id, leasing.member_id, 
                             member.fname, member.lname, member.m_image, member.phone_number, member.function, 
                             moto.plate_number, moto.property_value 
                             FROM moto_payment 
                             JOIN leasing ON moto_payment.leasing_id = leasing.leasing_id  
                             LEFT OUTER JOIN member ON leasing.member_id = member.member_id 
                             LEFT JOIN moto ON leasing.moto_id = moto.moto_id 
                             GROUP BY moto_payment.leasing_id");

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

    $mid = $row['member_id'];
    $mm = $row['fname'];
    $ml = $row['lname'];
    $mimage = $row['m_image'];
    $mfc = $row['function'];
    $mphn = $row['phone_number'];
    $lid = $row['leasing_id'];
    $pv = $row['property_value'];
    $pn = $row['plate_number'];
    $sumpaid = $row['mptot'];
    $sum2 = $sum2 + $sumpaid;
    $countpay = $row['cpay'];
    $dam = $row['dueamount'];
    $mt = $dam - $sumpaid;
    $sum3 = $sum3 + $mt;
    $ext = $dam - $pv;
    $sum1 = $sum1 + $ext;
    $profit = $sumpaid - $pv;
    $sum = $sum + $profit;
?>
    <tr colspan="5">
        <td><?php echo $mid; ?></td>
        <td><?php echo $mm . " " . $ml; ?></td>
        <td><img src="members/<?php echo $mimage; ?>" width="50" height="50"> </td>
        <td><?php echo $mphn; ?></td>
        <td><?php echo $mfc; ?></td>
        <td><?php echo $lid; ?></td>
        <td><?php echo $pn; ?> </td>
        <td><?php echo $pv; ?> </td>
        <td><?php echo $dam; ?> </td>
        <td><?php echo $sumpaid; ?></td>
        <td><?php echo $mt; ?> </td>
        <td><?php echo $countpay; ?> Day(s)</td>
        <td><?php echo $profit; ?></td>
        <td><?php echo $ext; ?> </td>
    </tr>
<?php } ?>
    <tr style="background:#b9c9fe url('table-images/gradhead.png') repeat-x;">
	
	<?php 



?>
        <td>
</td><td>
</td><td>
</td><td>
</td><td>
</td><td>
</td><td>
</td><td>
        </td colspan="8"><td>
		</td>
            <td style="text-align:left; font-size:14px;">
                <h1><u><b>TOT:</b> <?php echo $sum2; ?> frw</u></h1>
            </td>
            <td style="text-align:left; font-size:14px; color:red;">
                <h1><u><b>TOT:</b> <?php echo $sum3; ?> frw</u></h1>
            </td>
            <td></td>
            <td style="text-align:left; font-size:14px;">
                <h1><u><b>TOT:</b> <?php echo $sum; ?> frw</u></h1>
            </td>
            <td style="text-align:left; font-size:14px;">
                <h1><u><b>TOT:</b> <?php echo $sum1; ?> frw</u></h1>
            </td>
        </tr>
</tbody>

			
			</table>	
<div class="pull-right">
    <h4>Done on 
        <?php
        // Get the current date in proper format
        echo date('l, F d, Y'); 
        ?>
    </h4>
</div>

</div>

		</form>	
		
</div>

<!-- Content wrappper ends -->

</body>
</html>