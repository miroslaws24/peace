<?php
	session_start();
	include('../bd.php');
	$color = array('#5197D1','#1aadba','#2c6586');
	$number = mt_rand(0, count($color) - 1);
	$query = " SELECT * FROM post WHERE id = '".$_GET['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	$user_id = $row['user_id'];
	$title = $row['title'];
	$posttext = $row['posttext'];
	$background = $row['foto_post'];
	$time = $row['time'];
	$date = $row['today'];
	$wiew = $row['view'];
	
	$sql = " SELECT * FROM users WHERE id = '".$user_id."'";
	$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
	$line = mysql_fetch_array($res);
	$login = $line['login'];
	$avatar = $line['name_avatar'];
?>
<html>
	<head>
        <meta charset="utf-8">
		<link href="page.css" rel="stylesheet"/>
    </head>
	<body>
			<div class="header">
				<div class="mid_header">
					<div class="logo"></div>
					<div class="menu">
						<a href="games/" class="menu_href">Игры</a>
						<a href="" class="menu_href">Фильмы</a>
						<a href="" class="menu_href">Интресное</a>
						<a href="" class="menu_href">Рейтинги</a>
					</div>
					<div class="ava"></div>
				</div>
			</div>
			<div class="content">
				<div class="autorBlock">
					<div class="avatarAutor" style="background-image: url(../../new_user/<?php echo $avatar; ?>)"></div>
					<a href="" class="login"><?php echo $login; ?></a>
					<img class="icWiew" src="eye.png" /><span class="wiew"><?php echo $wiew; ?></span>
					<a href="" class="subscribe">+ Подписаться</a>
				</div>
				<div class="titleBlock">
					<span class="title"><?php echo $title; ?></span>
					<span class="date"> <?php echo $date.' в '.$time; ?></span>
				</div>
				<div class="textBlock">
					<img class="img" src="../<?php echo $background; ?>" />
					<span class="text"><?php echo $posttext; ?></span>
				</div>
				<div class="other">
					<span class="LitTitle">Другое от автора</span>
					<div style="margin: 0 20px;">
					<?php
						$qOt = " SELECT * FROM post WHERE user_id = '".$user_id."' LIMIT 3";
						$rOt = mysql_query($qOt) or die ( "Error : ".mysql_error() );
						while($lOt = mysql_fetch_array($rOt)){
							echo '
								<div class="otherBlock" style="background-image: url(../'.$lOt['foto_post'].')"></div>
							';
						}
					?>
					</div>
				</div>
			</div>
	</body>
</html>