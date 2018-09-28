<?php
	session_start();
	include("bd.php");
	$query = " SELECT * FROM post ORDER BY id DESC LIMIT 5";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	while($row = mysql_fetch_array($result)){
		$foto = $row['foto_post'];
		$title = $row['title'];
		$id = $row['id'];
		$user_id = $row['user_id'];
		$posttext = $row['posttext'];
		$day = $row['today'];
		$peace = $row['peace_count'];
		$sql = " SELECT * FROM users WHERE id = '".$user_id."'";
		$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
		$row = mysql_fetch_array($res);
		$login = $row['login'];
		$name = $row['name'];
		echo '
		<div class="int_content">
				<img class="int_post_back" src=artcls/'.$foto.' />
				<span class="int_title">'.$title.'</span>
				<span class="int_avtor">Автор: '.$login.'</span>
		</div>';
	}
	
	
	
?>

