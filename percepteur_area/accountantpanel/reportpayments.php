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

<center><a style=margin-left:600px id="back" href="requestreportpay.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
</div> <div id="print">
<a style=margin-left:800px href="" id="printpage" onclick="myfunction()"><b>Print</b><img src="fileprint.png" width="40" height="25" /> </a></td></a>
</div>
<h2><b><img id="logo1" src="images/TVS-Phoenix-125.jpg"width="30" height="30"/>COTAMONYA  MIS</b></h2><br>
<h2><u>Payment Report </u></h2>
         <table id="hor-minimalist-bbb" align="center"  summary="L">
		<thead>
    	<tr>
		<th scope="col">SN</th>
		 <th scope="col">Member Name</th>
		 <th scope="col">MImage</th>
		 <th scope="col">Gender</th>
		 <th scope="col">Telphone</th>
		 <th scope="col">Function</th>
		 <th scope="col">Paymenttype Name</th>
		 <th scope="col">number of Month Paid </th>
		 <th scope="col">Amount</th>
		  </thead> 
		   <tbody>
		<?php  
	if(isset($_GET['search']))
{
	
	$fr=$_GET['from']; 
	$t=$_GET['to']; 
	$pid=$_GET['rptype'];
		
	  
			$query = mysql_query("SELECT member.member_id,member.fname,member.lname,member.m_image,member.gender,member.phone_number,member.function,count(payment.member_id)as cpay,sum(payment.amount)as tot,payment.paymenttypes_id,payment.p_date,payment_types.type_name FROM payment right outer join  member ON payment.member_id = member.member_id right outer join payment_types  ON payment.paymenttypes_id = payment_types.paymenttypes_id  GROUP BY payment.member_id,payment.paymenttypes_id HAVING payment.paymenttypes_id='$pid' and payment.p_date between '$fr' and '$t'");
			
			
			
			while($row = mysql_fetch_array($query))
			{
				$mid=$row['member_id'];
				$mm = $row['fname'];
				$ml= $row['lname'];
				$gender=$row['gender'];
				$mimage=$row['m_image'];
				$mfc=$row['function'];
				$mphn=$row['phone_number'];
                $countpay=$row['cpay'];
                $sumamount = $row['tot'];
                $typename=$row['type_name'];
				
			?>
			
			<tr colspan="5">
			<td><?php echo $mid;?></td>
			<td><?php echo $mm ;?>  <?php echo $ml ;?></td>
			<td><img src="members/<?php echo $mimage; ?>" width="50" height="50"> </td>
			<td><?php echo $gender; ?> </td>
			<td><?php echo $mphn;?></td>
			<td><?php echo $mfc;?></td>
			<td><?php echo $typename;?></td>
		    <td><?php echo $countpay;?> Month(s)</td>
			<td><?php echo $sumamount;?></td>
			
			</tr>
			
   <?php }?>
<tr>

<?php 
$query0=mysql_query("select sum(amount) as tot  from payment where p_date between '$fr' and '$t' and paymenttypes_id='$pid'");
while($run=mysql_fetch_array($query0))
{
	$sum=$run['tot'];


?>
<td style="text-align:right;" colspan="15">
<h4><b><u><b>Total:</b><?php echo $sum; ?>frw</u></b></h4>
</td>
</tr>
<?php }}?>

   
   
			</tbody>

			</table>	


</div>

		</form>	
<div class="pull-right">
								
								<h4><b>Payments Report Between <?php echo $fr ;?> and <?php echo $t ?>  Done on <?php
								$Today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?></b></h4>
		</div>		
</div>

<!-- Content wrappper ends -->

</body>
</html>