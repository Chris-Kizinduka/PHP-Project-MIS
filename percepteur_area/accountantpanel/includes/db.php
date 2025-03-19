<?php
$con=mysql_connect("localhost","root","")or die("!Down");
if($con)
{
	mysql_select_db("cotamonyadb",$con);
}
else
{
	die("!DOWN");
}

?>