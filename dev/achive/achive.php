<?php
	include_once("bd.php");
	$already_in = array();
	$query = " SELECT * FROM users WHERE id = '".$_GET['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	
	$q = " SELECT SUM(peace_count) FROM post WHERE user_id = '".$_GET['id']."'";
	$res = mysql_query($q) or die ( "Error : ".mysql_error() );
	$rw = mysql_fetch_array($res);
	$sum = $rw[0];
	
	$sql = " SELECT * FROM stars WHERE user_id = '".$_GET['id']."'";
	$rsl = mysql_query($query) or die ( "Error : ".mysql_error() );
	while($r = mysql_fetch_array($rsl)){
		$name_star = $r['id'];
		$user = $r['user_id'];
		$id_star = $r['id'];
	}
	
	
	if($row['id'] == 1){
		$team = mysql_real_escape_string('Первый!');
		$query = "SELECT COUNT(1) FROM stars WHERE `name` = '{$team}'";
		$user_id = $row['id'];
		$name = 'Первый!';
		if (mysql_result(mysql_query($query), 0)){
			//
		}
		else{
			if(!in_array($row['name'], $already_in)) {
				$already_in[] = $row['name'];
				mysql_query("INSERT INTO stars SET name ='".$name."',user_id ='".$user_id."'") or  die ( "Error : ".mysql_error() ) ;
			}
		}
	}
	
	if($sum >= 20){
		$team = mysql_real_escape_string('Шаг к популярности');
		$query = "SELECT COUNT(1) FROM stars WHERE `name` = '{$team}'";
		if (mysql_result(mysql_query($query), 0)){
			//
		}
		else{
			if(!in_array($row['name'], $already_in)){
				$user_id = $row['id'];
				$name = 'Шаг к популярности';
				mysql_query("INSERT INTO stars SET name ='".$name."',user_id ='".$user_id."'") or  die ( "Error : ".mysql_error() ) ;	
			}
		}
	}
	
	
	
?>