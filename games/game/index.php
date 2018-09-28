<?php 
	session_start(); 
	include_once("../bd.php");

		$sql = " SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
		$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
		$line = mysql_fetch_array($res);
		$date_reg = $line['date_reg'];
		$last_act = $line['last_act'];
		$date_now = date('Y-m-d');
		$date = $date_now - $date_reg;
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="game.css" rel="stylesheet"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="autoresize.js"></script>
		<style>
			@font-face {
				font-family: FuturaPT;
				src: url(FuturaPT.otf);
			}
			@font-face {
				font-family: FuturaPTMedium;
				src: url(../FuturaPTMedium.otf);
			}
		</style>
    </head>
        <body>
			<div id="overlay" style="display:none;"></div>
			<div class="profile_main">
				<a class="profile_href" href="">Мой профиль</a>
				<a class="profile_href" href="">Написать статью</a>
				<a class="profile_href" href="">Написать статью</a>
				<a class="profile_href" href="">Написать статью</a>
				<a class="profile_href" href="">Написать статью</a>
			</div>
			<div class="header">
				<div class="mid_header">
					<a href=/site/index.php?id=<?php echo $_SESSION['id']; ?>><div class="logo"></div></a>
					<div class="menu">
						<a style="background: #337ab7;" href="games/" class="menu_href">Игры</a>
						<a href="" class="menu_href">Фильмы</a>
						<a href="" class="menu_href">Интресное</a>
						<a href="" class="menu_href">Рейтинги</a>
					</div>
					<div class="ava">
						<?php
							$query = " SELECT name_avatar FROM users WHERE id = '".$_SESSION['id']."'";
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
					</div>
				</div>
			</div>
			<div class="content">
				<div class="now_game">
					<?php
						$date = date('Y-m-d');
						$query = " SELECT * FROM games WHERE date = '".$date."' ORDER BY RAND() LIMIT 1";
						$result = mysql_query($query) or die ( "Error : ".mysql_error() );
						$row = mysql_fetch_array($result);
						$cover_now = $row['cover'];
						$id_game_now = $row['id'];
						$name_game_now = $row['title'];
						if(mysql_num_rows($result) > 1){
							echo '
								<div class="cover_now" style="background-image: url(scripts/'.$cover_now.');"><div class="overlay_now">Сегодня вышла <span>«'.$name_game_now.'»</span></div></div>
							';
						}
						else{
							echo '
								<div class="cover_now"><div class="overlay_now">Сегодня ничего</span></div></div>
							';
						}
					?>
				</div>
				<div class="game_space">
					<span class="title_game">Рейтинг на игру!</span>
					<span class="text_game">Один раз в день ты можешь поучавствовать в игре.Каждая игра стоит 10 очков рейтинга.</span>
					<span class="text_game">Что бы победить нужно получить комбинацию из 3 одинаковых игр.Если ты выйграл,то получаешь игру,ну или оставляешь её нам:)</span>
					<span class="text_game">Играют пользователи,которые на сайте больше 7 дней.</span>
					<a class="play_but" href=?play>Играем!</a>
					<div class="userGame_info">
						<div class="userGame_top">
							<?php
							$query = " SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
							$result = mysql_query($query) or die ( "Error : ".mysql_error() );
							$row = mysql_fetch_array($result);
							if(mysql_num_rows($result) == 1){
								if(!empty($row['name_avatar'])){
									echo '<div class="userGame_ava" style="background-image:url(../../new_user/'.$row['name_avatar'].')"></div>';
								}
								else{
									echo '<div class="userGame_ava" style="background-image:url(1.gif)"></div>';;
								}
							}
							?>
							<?php echo '<span class="userGame_login"> @'.$line['login'].'</span>' ?>
						</div>
						<div class="userGame_bottom">
							<span class="userGame_row">Кол-во игр</span>
							<span class="userGame_row">Последняя игра</span>
							<span class="userGame_row">Выиграно игр</span>
							<?php
								$query = " SELECT * FROM static_game WHERE id = '".$_SESSION['id']."'";
								$result = mysql_query($query) or die ( "Error : ".mysql_error() );
								$row = mysql_fetch_array($result);
								echo '
									<span class="userGame_row">'.$row['cont_game'].'</span>
									<span class="userGame_row">'.$row['date_game'].'</span>
									<span class="userGame_row">0</span>
								';
							?>
						</div>
					</div>
					<div class="game_select">
						<?php include('game.php'); ?>
					</div>
				</div>
			</div>
			<script>
				$('.ava').click(function() {
					$('.ava').animate({ left: '50', }, 200, function() { });
					$("#overlay").fadeIn('fast');
					$(".profile_main").fadeIn('fast');
					$('.ava').addClass('after_ava');
				});
				$('#overlay').click(function() {
					$('.ava').animate({ left: '0', }, 200, function() { });
					$(".ava").removeClass("after_ava")
					$(".profile_main").fadeOut('fast');
					$("#overlay").fadeOut('fast');
				});
			</script>
		</body>
</html>