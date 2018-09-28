<?php
	session_start();
	include_once("bd.php");
	$query = " SELECT country FROM users WHERE id = '".$_GET['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	if(mysql_num_rows($result) == 1){
		if(!empty($row['country'])){
			echo '<span class="text_country">'.$row['country'].'</span>';
		}
		else{
			echo 'Страна не указана';
		}
	}
?>