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

<center><a style=margin-left:800px id="back" href="requestcustommotopay.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
</div> <div id="print">
<a style=margin-left:1000px href="" id="printpage" onclick="myfunction()"><b>Print page</b><img src="fileprint.png" width="40" height="25" /> </a></td></a>
</div>
<h2><b><img id="logo1" src="images/TVS-Phoenix-125.jpg"width="30" height="30"/>COTAMONYA  MIS</b></h2><br>

<h2><u>Moto Payment Custom Report</u></h2>
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
if (isset($_GET['search'])) {
    $lid = $_GET['reportmt'];

    // Replace mysql_* with mysqli_*
    $query = mysqli_query($conn, "SELECT moto_payment.moto_pay_id, SUM(moto_payment.paid_amount) AS mptot, 
                                  moto_payment.dueamount, COUNT(moto_payment.leasing_id) AS cpay, 
                                  moto_payment.leasing_id, leasing.member_id, member.fname, 
                                  member.lname, member.m_image, member.phone_number, member.function, 
                                  moto.plate_number, moto.property_value 
                                  FROM moto_payment 
                                  JOIN leasing ON moto_payment.leasing_id = leasing.leasing_id  
                                  LEFT OUTER JOIN member ON leasing.member_id = member.member_id 
                                  LEFT JOIN moto ON leasing.moto_id = moto.moto_id 
                                  GROUP BY moto_payment.leasing_id 
                                  HAVING moto_payment.leasing_id = '$lid'");

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
        $countpay = $row['cpay'];
        $dam = $row['dueamount'];
        $mt = $dam - $sumpaid;
        $ext = $dam - $pv;
        $profit = $sumpaid - $pv;
?>
        <tr colspan="5">
            <td><?php echo $mid; ?></td>
            <td><?php echo $mm . " " . $ml; ?></td>
            <td><img src="members/<?php echo $mimage; ?>" width="50" height="50"></td>
            <td><?php echo $mphn; ?></td>
            <td><?php echo $mfc; ?></td>
            <td><?php echo $lid; ?></td>
            <td><?php echo $pn; ?> </td>
            <td><?php echo $pv; ?> </td>
            <td><?php echo $dam; ?> </td>
            <td><?php echo $sumpaid; ?></td>
            <td style="font-size:12px; color:red;"><?php echo $mt; ?> </td>
            <td><?php echo $countpay; ?> Day(s)</td>
            <td><?php echo $profit; ?></td>
            <td><?php echo $ext; ?> </td>
        </tr>
<?php 
    }
}
?>
    <tr style="background:#b9c9fe url('table-images/gradhead.png') repeat-x;">
        <td colspan="15"></td>
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