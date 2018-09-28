<?php
	$query = " SELECT name_avatar FROM users WHERE id = '".$_GET['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	if(mysql_num_rows($result) == 1){
		if(!empty($row['name_avatar'])){
			echo '<div class="img_avatar" style="background-image:url(../../new_user/'.$row['name_avatar'].')"></div>';
		}
		else{
			echo '<div class="img_avatar" style="background-image:url(1.gif)"></div>';;
		}
	}
?>