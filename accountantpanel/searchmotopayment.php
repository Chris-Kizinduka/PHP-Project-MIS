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
<center><a style=margin-left:800px id="back" href="viewmotopayment.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
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
	   if(isset($_GET['search1'])){
	
       $searchq=$_GET['query1'];
			$query1 = mysql_query("SELECT moto_payment.moto_pay_id,sum(moto_payment.paid_amount)as mptot,moto_payment.dueamount,count(moto_payment.leasing_id) as cpay ,moto_payment.leasing_id,member.fname,member.lname FROM moto_payment JOIN leasing ON moto_payment.leasing_id = leasing.leasing_id  left outer join member ON leasing.member_id = member.member_id GROUP BY moto_payment.leasing_id having moto_payment.leasing_id LIKE '%$searchq%'") or die("could not search!");
			
			
			$count=mysql_num_rows($query1);
if($count == 0){
	echo "<script>alert('No search Found!')</script>";
		 echo"<script>window.open('viewmotopayment.php','_self')</script>";
}
$i=0;
			while($row = mysql_fetch_array($query1))
			{
				$mtid=$row['moto_pay_id'];
				$sumpaid=$row['mptot'];
                $countpay=$row['cpay'];
                $lid=$row['leasing_id'];
                $dam=$row['dueamount'];
                $mm = $row['fname'];
				$ml= $row['lname'];
				$mt = $dam-$sumpaid;

			?>
			<tr>
			<td><?php echo $mtid;?></td>
			<td><?php echo $mm  ;?> <?php echo $ml  ;?></td>
			<td><?php echo $lid; ?> </td>
			<td><?php echo $countpay; ?> Day(s) </td>
			<td><?php echo $dam;?></td>
			<td><?php echo $sumpaid;?></td>
		    <td><?php echo $mt;?></td>
			<td><a href="editmotopay.php?edit_motopay=<?php echo $mtid;?>">Edit</a></td>
			<td><a href="moto_payment.php?pay_moto=<?php echo $lid;?>">Pay Moto</a></td>
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