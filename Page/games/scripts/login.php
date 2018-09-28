<?php
	$query = " SELECT login FROM users WHERE id = '".$_SESSION['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	if(mysql_num_rows($result) == 1){
		if(!empty($row['login'])){
			echo '@'.$row['login'];
		}
		else{
			echo 'Логин не указан';
		}
	}
?>