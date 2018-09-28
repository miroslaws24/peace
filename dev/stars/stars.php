<?php
	include_once("bd.php");
	$query = " SELECT stars FROM users";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	if(mysql_num_rows($result) > 1){
		if($row['stars'] = 1){
			echo "✔";
		}
		else{
			if($row['stars'] = 0){
				echo ' ';
			}
		}
	}
?>