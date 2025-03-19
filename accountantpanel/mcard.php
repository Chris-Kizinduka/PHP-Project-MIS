<!DOCTYPE>
<?php
include("includes/db.php");
if(isset($_GET['id_card']))
{
	
$get_id=$_GET['id_card'];
$get_m="select member_id,fname,lname,m_image,dob,gender,date_created from member where member_id='$get_id'";
$run_m =mysql_query($get_m);
if($row_c=mysql_fetch_array($run_m)){;
$member_id=$row_c['member_id'];
$fname=$row_c['fname'];
$lname=$row_c['lname'];
$m_image=$row_c['m_image'];
$dob=$row_c['dob'];
$gender= $row_c['gender'];
$date_created=$row_c['date_created'];
			
}
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
<center><a style=margin-left:800px id="back" href="member.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
<div id="print">
<a style=margin-left:1000px href="" id="printpage" onclick="myfunction()"><b>Print page</b><img src="fileprint.png" width="40" height="25" /> </a></td></a>
</div>
</div>

 

     
	
<form method="post" action="" enctype="multipart/form-data">
<div id="cardbox">
<table  width="600" id="card" align="center">
 
<tr align="center">

<td colspan="8"><h2><img id="logo1" src="images/TVS-Phoenix-125.jpg"width="50" height="50"/>COTAMONYA  Membership Card</h2></td>
</tr>
<tr align="center">

<td colspan="8" ><img src="members/<?php echo $m_image ;?> " width="100" height="100"> </td>
</tr>


<tr>
<td align="right"><b>Member ID:</td>
<td align="left"><?php echo $member_id ; ?></td>
</tr>
<tr>

<td align="right"><b>First Name:</td>
<td align="left"><?php echo $fname ; ?></td>

</tr>
<tr>
<td nowrap="nowrap" align="right"><b>Last Name:</b></td>
<td align="left"><?php echo $lname ; ?></td>

</tr>

<tr>
<td nowrap="nowrap" align="right"><b>DOB:</b></td>
<td align="left"><?php echo $dob ; ?></td>

</tr>
<tr>
<td nowrap="nowrap" align="right"><b>Gender:</b></td>
<td align="left" ><?php echo $gender ; ?></td>
</tr>
<tr>

<td align="right"><b>Date Created:</td>
<td align="left"><?php echo $date_created; ?></td>

</tr>


</table>
</div>
</form>
</div>
</div>
</body>
</html>
<?php } ?>

