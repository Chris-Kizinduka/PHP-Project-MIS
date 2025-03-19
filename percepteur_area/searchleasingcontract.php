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

<center><a style=margin-left:800px id="back" href="viewleasing.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
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

if(isset($_GET['search1'])){
	
$searchq=$_GET['query1'];
//$searchq=preg_
	
$query1 = mysql_query("SELECT leasing.leasing_id,leasing.start_date,leasing.end_date,leasing.due_amount,leasing.status,contractperiod.periodname,member.fname,member.lname,moto.plate_number FROM leasing  JOIN member   ON leasing.member_id = member.member_id JOIN moto  ON leasing.moto_id = moto.moto_id JOIN contractperiod  ON leasing.cid = contractperiod.cid  where member.fname LIKE '%$searchq%'") or die("could not search!");
$count=mysql_num_rows($query1);
if($count == 0){
	echo "<script>alert('No search Found!')</script>";
		 echo"<script>window.open('viewleasing.php','_self')</script>";
}
$i=0;
			while($row = mysql_fetch_array($query1))
			{
				$lid=$row['leasing_id'];
				$sdate=$row['start_date'];
                $edate=$row['end_date'];
                $cid=$row['periodname'];
                $dam=$row['due_amount'];
                $mm = $row['fname'];
				$ml= $row['lname'];
				 $mt = $row['plate_number'];
				  $status = $row['status'];

			?>
			<tr>
			<td><?php echo $lid;?></td>
			<td><?php echo $mm  ;?> <?php echo $ml  ;?></td>
			<td><?php echo $mt; ?> </td>
			<td><?php echo $cid;?></td>
			<td><?php echo $sdate;?></td>
			<td><?php echo $edate;?></td>
		    <td><?php echo $dam;?></td>
			<td><?php echo $status;?></td>
			<td><a href="editleasing.php?edit_leasing=<?php echo $lid;?>">Edit</a></td>
			<td><a href="moto_payment.php?pay_moto=<?php echo $lid;?>">Pay Moto</a></td>
			</tr>
<?php }?>
			</tbody>
			
			</table>	

<?php }?>	
</div>

</div>
<div class ="footer2" >
Copyright&copy2017 Chrisaime, All Rights Reserved.
</div>
<!-- Content wrappper ends -->

</body>
</html>