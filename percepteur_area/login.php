
<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
<head>
<link  rel="stylesheet" href="styles/style.css"  type="text/css" />
</head>
<body>
<div class="header_wrapper">
<img src="images/cotabana.jpg"/ width="1400px" height="90px" >
</div>
<div id="login">
<h2>User Login In</h2>
<form method="post" action="login.php">

<input type="text" name="username" placeholder="Enter username"  required/>
<input type="password" name="password" placeholder="Enter Password" required/>
<input type="submit" name="login_btn" title="Click Here to Sign In" id="login-btn"  value="Sign In"/>
</form>
</div>
</body>
</html>
<?php
if(isset ($_POST['login_btn']) && !empty($_POST['username']) && !empty($_POST['password']))
{
	function clean($str){
		$str=@trim($str);
	if(get_magic_quotes_gpc())
	{
	$str=stripslashes($str);	
	}
	return mysql_real_escape_string($str);
	}
 $username = clean($_POST["username"]);
 $password = clean($_POST["password"]);
 $pass=md5($password);
$quer="SELECT * FROM users WHERE username ='$username' AND password ='$pass'";
$quers=mysql_query($quer);
$count=mysql_num_rows($quers);
$row=mysql_fetch_array($quers);
$user_fuc="SELECT function_id FROM users WHERE username ='$username'";
$quer1=mysql_query($user_fuc);
$quer2=mysql_fetch_row($quer1);

if($count>0){
session_start();
session_regenerate_id();	
//$_SESSION['userid']=$row['userid'];
//$id=$_SESSION['userid'];	

$sql="SELECT * FROM users WHERE username ='".$username."'";

$result=mysql_query($sql);
while($row= mysql_fetch_row($result))
	{
	switch($quer2[0])
	{
	case '1':
	echo "<script>window.open('index.php','_self')</script>";
	session_write_close();
	break;
	case '2':
	echo "<script>window.open('accountantpanel/index1.php','_self')</script>";
	session_write_close();
	break;
	case '3':
	echo "<script>window.open('index2.php','_self')</script>";
	session_write_close();
	break;
	}
	}
}
else {
	session_write_close();
?>
<script>alert('Incorrect UserName or Password')</script>;
 <script>window.open('login.php','_self')</script>;
 <?php
 }
	
}
 ?>
