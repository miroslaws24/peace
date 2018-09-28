<?php
	if(isset($_GET['m'])&& ($_GET['m'] == '1' )){
		$query = " SELECT * FROM users ORDER BY rand()";
		$result = mysql_query($query) or die ( "Error : ".mysql_error() );
		echo '<div class="people">';
		echo '<div class="search_people">
		<input class="input_search" type="text" placeholder="Найду любого" list="name_list">
		<datalist id="name_list">';
		echo '<option>'.$name_json.'</option>';
		echo ' </datalist></div>';
		while($row = mysql_fetch_array($result)){
			$frid = $row['id'];
			$name = $row['name'];
			$country= $row['country'];
			if($frid == $_SESSION['id']){
				$send = '(это ты)';
				echo '
					<div class="man_card">
						<div class="img_card" style="background-image: url(new_user/'.$row['name_avatar'].')"></div>
						<a class="p_man" href=user.php?id='.$frid.'>'.$name.' <span class="send_u">'.$send.'</span></a>
						<p class="p_man_country">'.$country.'</p>
						<a class="p_man_country" href=users/index.php?id='.$_SESSION['id'].'&frid='.$frid.'>Написать сообщение</a>
					</div>
				';
			}
			elseif($frid !== $_SESSION['id']){
				echo '
					<div class="man_card">
						<div class="img_card" style="background-image: url(new_user/'.$row['name_avatar'].')"></div>
						<img class="add_fr_icon" src="/img/add.png" />
						<a class="p_man" href=user.php?id='.$frid.'>'.$name.'</a>
						<p class="p_man_country">'.$country.'</p>
						<a class="p_man_country" href=users/index.php?id='.$_SESSION['id'].'&frid='.$frid.'>Написать сообщение</a>
					</div>
				';
			}
		}
		echo '</div>';
	}
	else{
		include('dev/ur/ur.php');
	}
?>
<link href="dev/people.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">