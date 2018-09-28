<?php
	$query = " SELECT stars,name FROM users WHERE id = '".$_GET['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	if(mysql_num_rows($result) == 1){
		if(!empty($row['name'])){
			if($row['stars'] == 1){
				echo "✔ ".$row['name'];
			}
			else{
				if($row['stars'] == 0){
					echo $row['name'];
				}
			}
			
		}
		else{
			echo 'Не указано';
		}
	}
?>