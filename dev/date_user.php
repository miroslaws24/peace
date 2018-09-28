<?php
	include_once("bd.php");
	$query = " SELECT stars,name,date_reg FROM users WHERE id = '".$_GET['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	if(mysql_num_rows($result) == 1){
		$date_reg = $row['date_reg'];
		$date_reg_str = strtotime($date_reg);
		$date_now = date('Y-m-d');
		$date_now_str = strtotime($date_now);
		$date = $date_now_str - $date_reg_str;
		if($date >0 and $date < 9){
			echo '<span>Ты с нами уже '.$date.' день</span>';
		}
		else{
			echo '<span>Ты с нами уже '.$date.' дней</span>';
		}
	}
?>