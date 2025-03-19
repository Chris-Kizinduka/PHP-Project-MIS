<?php

include("includes/db.php");
//getting members
function getMember(){
	
}
function getModel(){

	$get_models="select*from model";
	$run_models=mysql_query($get_models);
	while($row_models=mysql_fetch_array($run_models))
	{
		$model_id=$row_models['model_id'];
		$marque=$row_models['marque'];
		echo"<li><a href='#'>$cat_title</a></li>";
}
function getMoto(){
	//feching Motos from database
	$get_motos="select *from moto";
	$run_motos=mysql_query($con,$get_motos);
	while($row_motos=mysql_fetch_array($run_motos)){
		$moto_id=$row_motos['moto_id'];
		$moto_plateno=$row_motos['plate_number'];
		$moto_image=$row_motos['moto_image'];
		$moto_marque=$row_motos['marque'];
		$moto_prv=$row_motos['property_value'];
		$moto_estvalue=$row_motos['estimated_value'];
	echo"
		<div id='single_moto'>
		
	<h3>$moto_plateno</h3>
	<img src='admin_area/moto_images/$moto_image'width='100' height='100'/>
	</div>
	";
		
	}
}