<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
<head>
<title> Cotamonya MIS</title>
<link  rel="stylesheet" href="styles/style.css"  type="text/css" />
</head>
<body id ="white">
<!-- Main container starts here-->


<!-- header wrappper starts here-->
<div class="header_wrapper">
<img src="images/cotabana.jpg"/ width="1300px" height="85px" border="solid 2px #gray"; >
</div>
<!-- Header ends here-->
<!-- Navigation Bar starts here-->


<!-- Navigation Bar ends-->
<!-- Content wrappper starts -->

<div  style="margin-top:50px;text-align:center; height:600px; font-size:32px;" >
<center><a style=margin-left:800px id="back" href="register.php" class="my"><img src="back.png" width="40" height="30" />Back<a/>
<h2><u>View Users Information</u></h2>
         <table id="pattern-style-b"  align="center" summary="Meeting Results">
		<thead>
    	<tr>
		<th scope="col">SN</th>
		 <th scope="col">FirstName</th>
		 <th scope="col">LastName</th>
		  <th scope="col">Phone number</th>
		  <th scope="col">Email</th>
		 <th scope="col">Username</th>
		<th scope="col">Password</th>
		 <th scope="col">Function</th>
		  </thead> 
		   <tbody>
		<?php  
			$query="SELECT function.fcname,users.user_id,users.firstname,users.lastname,users.phonenumber,users.email,users.username,users.password FROM users INNER JOIN function ON users.function_id = function.function_id";
			$run=mysql_query($query);
			while($row=mysql_fetch_array($run))
			{
				$id=$row['user_id'];
				$firstname=$row['firstname'];
$lastname=$row['lastname'];
$phone=$row['phonenumber'];
$email=$row['email'];
$username = $row['username'];
$password = $row['password'];
$functions = $row['fcname'];
			?>
			<tr>
			<td><?php echo $id;?></td>
			<td><?php echo $firstname;?></td>
			<td><?php echo $lastname;?></td>
			<td><?php echo $phone;?></td>
			<td><?php echo $email;?></td>
			<td><?php echo $username;?></td>
			<td><?php echo $password;?></td>
			<td><?php echo $functions;?></td>
		
			<td><a href="edituser.php?edit_user=<?php echo $id;?>">Edit</a></td>
			
			</tr>
			<?php }?>
			</tbody>
			
			</table>	


</div>
<!-- Content wrappper ends -->
<div id ="footer2" >
Copyright&copy2017 Chrisaime, All Rights Reserved.
</div>
</body>
</html>