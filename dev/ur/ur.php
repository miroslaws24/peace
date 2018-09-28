<?php
	session_start();
	include("bd.php");
	if(isset($_GET['t'])&& ($_GET['t'] == 'm' )){
		$q = " SELECT * FROM cloud WHERE user_id = '".$_GET['id']."' ORDER BY date DESC";
		$res = mysql_query($q) or die ( "Error : ".mysql_error() );
		while($line = mysql_fetch_array($res)){
			$text = $line['text'];
			$date = $line['date'];
			$user_id = $line['user_id'];
			$mess = mb_substr($line['date'], 0, 6, 'UTF-8');
			$sql = " SELECT * FROM users WHERE id = '".$user_id."'";
			$r = mysql_query($sql) or die ( "Error : ".mysql_error() );
			$r = mysql_fetch_array($r);
			$login = $r['login'];
			$name = $r['name'];
			$star = $r['stars'];
			$avatar = $r['name_avatar'];
			echo '
			<div style="background: #fff;" class="ur_cloud_content">
				<div style="background: #F1A730;" class="tags"><span>Мысли</span></div>
				<span class="ur_name_day">'.$name.'</span>
				<span class="ur_cloud_day">Опубликованно: '.$mess.'</span>
				<div class="ur_cloud_info">
					<span class="ur_cloud_text">'.$text.'</span>
					<span class="ur_post_peace">'.$peace.'</span>
				</div>
			</div>';
		}
	}
	else{
		if(isset($_GET['t'])&& ($_GET['t'] == 'p' )){
			$query = " SELECT * FROM post WHERE user_id = '".$_GET['id']."' ORDER BY id DESC";
			$result = mysql_query($query) or die ( "Error : ".mysql_error() );
			while($row = mysql_fetch_array($result)){
				$foto = $row['foto_post'];
				$title = $row['title'];
				$id = $row['id'];
				$user_id = $row['user_id'];
				$posttext = $row['posttext'];
				$peace = $row['peace_count'];
				$sql = " SELECT * FROM users WHERE id = '".$user_id."'";
				$r = mysql_query($sql) or die ( "Error : ".mysql_error() );
				$r = mysql_fetch_array($r);
				$login = $r['login'];
				$name = $r['name'];
				$star = $r['stars'];
				$avatar = $r['name_avatar'];
				$date = date('d.m.Y');
				$d1 = strtotime($date);
				$date_aft = date('d.m.Y', $d1);
				if($date_aft == $row['today']){
					$time = $row['time'];
				}
				else{
					$time = $row['today'];
				}
				echo '
				<div style="background-image: url(artcls/'.$foto.')" class="ur_content">
						<div class="tags"><span>Пост</span></div>
						<div class="ur_like"><img class="ur_like_img" src="../img/peace.png"><a name="like" href="">+1</a></div>
						<div class="ur_day_post"><span>'.$time.'</span></div>
				</div>
				<div class=""
				';
			}
		}
		else{
			if(isset($_GET['id'])&& ($_GET['id'] == $_GET['id'] )){
				$query = " SELECT * FROM post WHERE user_id = '".$_GET['id']."' ORDER BY id DESC";
				$result = mysql_query($query) or die ( "Error : ".mysql_error() );
				if(mysql_num_rows($result) == 0){
					echo '<span class="no_post_ur">Записей пока нет нет:(</span>';
				}
				else{
				while($row = mysql_fetch_array($result)){
					$foto = $row['foto_post'];
					$title = $row['title'];
					$id = $row['id'];
					$user_id = $row['user_id'];
					$posttext = $row['posttext'];
					$day = $row['today'];
					$peace = $row['peace_count'];
					$love = $row['love'];
					$super = $row['super'];
					$fine = $row['fine'];
					$fu = $row['fu'];
					$sql = " SELECT * FROM users WHERE id = '".$user_id."'";
					$r = mysql_query($sql) or die ( "Error : ".mysql_error() );
					$r = mysql_fetch_array($r);
					$login = $r['login'];
					$name = $r['name'];
					$star = $r['stars'];
					$avatar = $r['name_avatar'];
					$date = date('d.m.Y');
					$d1 = strtotime($date);
					$date_aft = date('d.m.Y', $d1);
					if($date_aft == $row['today']){
						$time = 'Сегодня в '.$row['time'];
					}
					else{
						$time = 'Было дело '.$row['today'];
					}
					echo '
						<div data-id="'.$id.'" id="news'.$id.'" class="block_news" style="background-image: url(artcls/'.$foto.')">
							<div class="close" id="close'.$id.'">X</div>
							<div class="autor">
								<div class="img_autor" style="background-image:url(new_user/'.$avatar.')"></div>
								<span class="autor_name">'.$name.'</span>
								<span class="login_name">@'.$login.'</span>
							</div>
							<div id="bg'.$id.'" class="read_bg"></div>
							<div id="read_news'.$id.'" class="read_news">
								<span class="text_news">'.$posttext.'</span>
							</div>
							<div id="like_news'.$id.'" class="like_news">
								<img class="img_like love" src="/img/love.png">
								<span class="counter">'.$love.'</span>
								<img class="img_like super" src="/img/super.png">
								<span class="counter">'.$super.'</span>
								<img class="img_like fine" src="/img/fine.png">
								<span class="counter">'.$fine.'</span>
								<img class="img_like fu" src="/img/fu.png">
								<span class="counter">'.$fu.'</span>
							</div>
							<div id="name_news'.$id.'" class="name_news">
								<span class="title_news">'.$title.'</span>
								<div class="forbut"><span id="button_read'.$id.'" href="" class="button_read">Читать</span></div>
								<span class="time_news">'.$time.'</span>
							</div>
						</div>
						<script>
							$("#button_read'.$id.'").click(function(){
								$("#name_news'.$id.'").fadeOut("fast");
								$("#button_read'.$id.'").fadeOut("fast");
								$("#bg'.$id.'").fadeIn("fast");
								$("#like_news'.$id.'").fadeIn("fast");
								$("#close'.$id.'").fadeIn("fast");
								$("#read_news'.$id.'").fadeIn("fast");
							});
							$("#close'.$id.'").click(function(){
								$("#name_news'.$id.'").fadeIn("fast");
								$("#button_read'.$id.'").fadeIn("fast");
								$("#bg'.$id.'").fadeOut("fast");
								$("#like_news'.$id.'").fadeOut("fast");
								$("#close'.$id.'").fadeOut("fast");
								$("#read_news'.$id.'").fadeOut("fast");
							});
						</script>
					';
				}
				}
			}
		}
	}
?>
<link href="ur.css" rel="stylesheet"/>