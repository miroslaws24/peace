<?php
	session_start();
	include("bd.php");
	include('dev/gallary/classSimpleImage.php');
	$query = " SELECT * FROM gallery WHERE user_id = '".$_SESSION['id']."' LIMIT 4";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	if(mysql_num_rows($result) == 0)
	{
		echo '
			<span>Ничего нет:(</span>
		';
	}
	elseif(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)){
			$id = $row['id'];
			$uid = $row['user_id'];
			$name = $row['name'];
			$date = $row['date'];
			$photo = 'dev/gallary/'.$name.'';
			echo '
				<div style="display:none;" class="photo_block_all">
					<span>'.$date.'</span>
					<img width="85" height="85" src="dev/gallary/'.$name.'" />
				</div>
				<a id="photo_all'.$id.'" style="outline: none;" href=""><div class="img_gallery"><img width="85" height="85" src="'.$photo.'" /></div></a>
			';
		}
	}
?>