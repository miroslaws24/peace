<?php
	if(isset($_GET['play'])){
		$sql = " SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
		$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
		$line = mysql_fetch_array($res);
		$date_reg = $line['date_reg'];
		$date_now = date('Y-m-d');
		$d1 = strtotime($date_reg);
		$d2 = strtotime($date_now);
		$diff = $d2-$d1;
		$diff = $diff/(60*60*24);
		$day = floor($diff);
		if($day >= 7){
			$query = " SELECT * FROM static_game WHERE id = '".$_SESSION['id']."'";
			$result = mysql_query($query) or die ( "Error : ".mysql_error() );
			if(mysql_num_rows($result) < 1){
				$sql = " INSERT INTO static_game SET id_user = '".$_SESSION['id']."',date_game = '".$date_now."',cont_game = cont_game + 1";
				$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
			}
			elseif(mysql_num_rows($result) >= 1){
				$q = " SELECT * FROM static_game WHERE id_user = '".$_SESSION['id']."'";
				$r = mysql_query($q) or die ( "Error : ".mysql_error() );
				$row = mysql_fetch_array($r);
				$date_game = $row['date_game'];
				$dg = strtotime($date_game);
				$dif_game = $d2-$dg;
				$dif_game = $dif_game/(60*60*24);
				$day_game = floor($dif_game);
				if($day_game >= 1){
					$s = " UPDATE static_game SET date_game = '".$date_now."',cont_game = cont_game+1 WHERE id_user = '".$_SESSION['id']."'";
					$resu = mysql_query($s) or die ( "Error : ".mysql_error() );
					echo '<span class="title_gameInfo">Розыгрышь..</span>';
					$on = " SELECT * FROM games ORDER BY RAND() LIMIT 1";
					$p = mysql_query($on) or die ( "Error : ".mysql_error() );
					$l = mysql_fetch_array($p);
					echo '<div class="cover_game" style="background-image: url(../scripts/'.$l['cover'].')"></div>';
					
					$on = " SELECT * FROM games ORDER BY RAND() LIMIT 1";
					$p = mysql_query($on) or die ( "Error : ".mysql_error() );
					$l = mysql_fetch_array($p);
					echo '<div class="cover_game" style="background-image: url(../scripts/'.$l['cover'].')"></div>';
					
					$on = " SELECT * FROM games ORDER BY RAND() LIMIT 1";
					$p = mysql_query($on) or die ( "Error : ".mysql_error() );
					$l = mysql_fetch_array($p);
					echo '<div class="cover_game" style="background-image: url(../scripts/'.$l['cover'].')"></div>';
				}
				elseif($day_game <= 1){
					echo '<span class="error_game">Сегодня уже играли!</span>';
				}
			}
		}
		elseif($day < 7){
			echo '<span class="error_game">На сайте меньше недели!</span>';
		}
	}
 ?>