<?php
	session_start();
	include("bd.php");
		if(isset($_GET['m'])&& ($_GET['m'] == '2' )){
			$query = " SELECT * FROM firends WHERE user_id = '".$_SESSION['id']."' ORDER BY id DESC";
			$result = mysql_query($query) or die ( "Error : ".mysql_error() );
			while($row = mysql_fetch_array($result)){
				$friend = $row['friend_id'];
				$user = $row['user_id'];
				$sql = " SELECT * FROM post WHERE user_id = '".$friend."'";
				$otvet = mysql_query($sql) or die ( "Error : ".mysql_error() );
				while($line = mysql_fetch_array($otvet)){
				$foto = $line['foto_post'];
					$title = $line['title'];
					$id = $line['id'];
					$user_id = $line['user_id'];
					$posttext = $line['posttext'];
					$day = $line['today'];
					$love = $line['love'];
					$super = $line['super'];
					$fine = $line['fine'];
					$fu = $line['fu'];
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
						$time = 'Было дело '.$line['today'];
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
								<a href=dev/news/love.php?id='.$_SESSION['id'].'&art='.$id. '&h=1><img class="img_like love" src="/Static/img/love.png"></a>
								<span class="counter">' .$love.'</span>
								<a href=dev/news/love.php?id='.$_SESSION['id'].'&art='.$id. '&h=2><img class="img_like super" src="/Static/img/super.png"></a>
								<span class="counter">' .$super.'</span>
								<a href=dev/news/love.php?id='.$_SESSION['id'].'&art='.$id. '&h=3><img class="img_like fine" src="/Static/img/fine.png"></a>
								<span class="counter">' .$fine.'</span>
								<a href=dev/news/love.php?id='.$_SESSION['id'].'&art='.$id. '&h=4><img class="img_like fu" src="/Static/img/fu.png"></a>
								<span class="counter">' .$fu.'</span>
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
?>