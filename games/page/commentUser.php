<?php
	session_start();
	include("../bd.php");
	include_once('smile.php');
	include_once('function.php');
		$text_commUser= $_POST['text_commUser'];
		$text_commUser = strtr( $text_commUser, $replace );
		$user_id = $_SESSION['id'];
		$game_id = $_SESSION['game_id'];
		$comm_id = $_SESSION['comment_id'];
		$today = date("d.m.Y");
		$time = date('H:i');
		if(!empty($text_commUser)){
			mysql_query("INSERT INTO comment_user SET comm_id ='".$comm_id."',text ='".$text_commUser."',time ='".$time."',user_id ='".$user_id."',today ='".$today."'") or  die ( "Error : ".mysql_error() ) ;
			echo '<script>document.getElementById("formUsCom").reset();</script>';
		}
		$sql = " SELECT * FROM comment_user WHERE comm_id = '".$comm_id."' ORDER BY id ASC LIMIT 5";
		$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
		while($line = mysql_fetch_array($res)){
			$user_id = $line['user_id'];
			$query = " SELECT * FROM users WHERE id = '".$user_id."'";
			$result = mysql_query($query) or die ( "Error : ".mysql_error() );
			$row = mysql_fetch_array($result);
			$name_avatar = $row['name_avatar'];
			$login = $row['login'];
			$text = $line['text'];
			$date_comm = $line['date_comm'];
			$time_comm = $line['time_comm'];
			$date = date('d.m.Y');
			$d1 = strtotime($date);
			$date_aft = date('d.m.Y', $d1);
			$id = $line['id'];
			if($date_aft == $date_comm){
				$time = 'Сегодня в '.$time_comm;
			}
			else{
				$time = rus_date("j F Y ", strtotime($date_comm)).' в '.substr($time_comm, 0, 5);
			}
			echo '
				<div data-id="'.$id.'" class="block_commUser">
					<div class="avatar_block_commUser" style="background-image: url(../../new_user/'.$name_avatar.')"></div>
					<span class="login_commUser">'.$login.'</span>
					<span class="text_commUser">'.$text.'</span>
					<span class="date_commUser">'.$time.'</span>
				</div>
			';
		}
?>