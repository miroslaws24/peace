<?php
	session_start();
	include("bd.php");
	$query = " SELECT * FROM firends WHERE user_id = '".$_SESSION['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	while($row = mysql_fetch_array($result)){
		$user_id = $row['user_id'];
		$friend_id = $row['friend_id'];
		$q = " SELECT * FROM users WHERE id = '".$friend_id."'";
		$res = mysql_query($q) or die ( "Error : ".mysql_error() );
		while($r = mysql_fetch_array($res)){
		$name = $r['name'];
		$avatar = $r['name_avatar'];
		$login = $r['login'];
		echo '<div class="block_friend"><div class="img_avatar_fr" style="background-image:url(new_user/'.$avatar.')"></div>';
		echo '
		<span class="name_friend">'.$name.'</span>
		<span class="login_friend">@'.$login.'</span>
		</div>';
	}
	}
?>