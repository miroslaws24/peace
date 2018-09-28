<?php
	session_start();
	include("../bd.php");
	$id = $_POST['id'];
	$user_id = $_POST['user_id'];
	$count = 0;
	
	$sql = " SELECT * FROM like_post WHERE user_id='".$user_id."' AND post_id = '".$id."'";
	$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($res);
	$user = $row['user_id'];
	$post = $row['post_id'];
	
	if(mysql_fetch_row($res) < 1){
		$query = "UPDATE comments SET like_count = like_count+1 WHERE id = '".$id."'";
		$result = mysql_query($query) or die ( "Error : ".mysql_error() );
		
		$q = "INSERT INTO like_post SET user_id = '".$user_id."',post_id = '".$id."'";
		$r = mysql_query($q) or die ( "Error : ".mysql_error() );
		
		$sql = " SELECT like_count FROM comments WHERE id = '".$id."'";
		$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
		while($row = mysql_fetch_array($res)){
			$count = $row['like_count'];
			echo 'Не нравится <div class="count_like"">'.$count.'</div>';
		}
	}
	else{
		$query = "UPDATE comments SET like_count = like_count-1 WHERE id = '".$id."'";
		$result = mysql_query($query) or die ( "Error : ".mysql_error() );
		
		$del = "DELETE FROM like_post WHERE user_id='".$user_id."' AND post_id = '".$id."'";
		$del_res = mysql_query($del) or die ( "Error : ".mysql_error() );
		$sql = " SELECT like_count FROM comments WHERE id = '".$id."'";
		$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
		while($row = mysql_fetch_array($res)){
			$count = $row['like_count'];
			echo 'Нравится <div class="count_like"">'.$count.'</div>';
		}
	}
	
?>