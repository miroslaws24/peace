<?php
	$query = " SELECT * FROM stars WHERE user_id = '".$_GET['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	while($row = mysql_fetch_array($result)){
		echo '
			<div class="block_stars">
				<img src="star.png" />
				<span>'.$row['name'].'</span>
			</div>
		';
	}
?>