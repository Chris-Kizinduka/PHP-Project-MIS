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

<div  style="margin-top:20px;text-align:center; height:600px; font-size:32px;" >
<div  id="print">

<center><a style=margin-left:800px id="back" href="index.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
</div> <div id="print">
<a style=margin-left:1000px href="" id="printpage" onclick="myfunction()"><b>Print </b><img src="fileprint.png" width="40" height="25" /> </a></td></a>
</div>
<h2><b><img id="logo1" src="images/TVS-Phoenix-125.jpg"width="30" height="30"/>COTAMONYA  MIS</b></h2><br>
<h2><u>Leasing contracts Report</u></h2><br>
         <table id="hor-minimalist-bbb" border="1"  summary="L">
		<thead  >
    	<tr>
		<th scope="col">SN</th>
		 <th scope="col">Member Name</th>
		 <th scope="col">MImage</th>
		 <th scope="col">Moto</th>
		 <th scope="col">MotoImage</th>
		
		  <th scope="col">Period</th>
		  <th scope="col">Start_Date</th>
		 <th scope="col">End_Date</th>
		 	<th scope="col">Due Amount</th>
				 <th scope="col">Status</th>
		  </thead> 
		   <tbody>
		<?php  
	
			$query = mysql_query("SELECT leasing.leasing_id,leasing.start_date,leasing.end_date,leasing.due_amount,leasing.status,contractperiod.periodname,member.fname,member.lname,member.m_image,moto.plate_number,moto.motoimage FROM leasing  JOIN member   ON leasing.member_id = member.member_id JOIN moto  ON leasing.moto_id = moto.moto_id JOIN contractperiod  ON leasing.cid = contractperiod.cid WHERE leasing.status ='activeted'");
			while($row = mysql_fetch_array($query))
			{
				$lid=$row['leasing_id'];
				$sdate=$row['start_date'];
				$mimage=$row['m_image'];
				$motoimage=$row['motoimage'];
                $edate=$row['end_date'];
                $cid=$row['periodname'];
                $dam=$row['due_amount'];
                $mm = $row['fname'];
				$ml= $row['lname'];
				$mt = $row['plate_number'];
				$status = $row['status'];

			?>
			<tr colspan="5">
			<td><?php echo $lid;?></td>
			<td><?php echo $mm ;?>  <?php echo $ml ;?></td>
			<td><img src="members/<?php echo $mimage; ?>" width="50" height="50"> </td>
			<td><?php echo $mt; ?> </td>
			<td><img src="admin_area/<?php echo $motoimage; ?>" width="50" height="50"> </td>
			<td><?php echo $cid;?></td>
			<td><?php echo $sdate;?></td>
			<td><?php echo $edate;?></td>
		    <td><?php echo $dam;?></td>
			<td><?php echo $status;?></td>
			
			</tr>
			<?php }?>
			</tbody>
			
			</table>	


</div>
<div class="pull-right">
								
								<h4>Done on <?php
								$Today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?></h4>
			</div>
</div>

<!-- Content wrappper ends -->

</body>
</html>