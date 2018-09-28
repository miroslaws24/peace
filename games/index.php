<?php 
	session_start(); 
	include_once("bd.php");
	if($_GET['id'] == $_SESSION['id']){
		$sql = " SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
		$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
		$line = mysql_fetch_array($res);
		$last_act = $line['last_act'];
		$date_now = date('Y-m-d');
		$date = $date_now - $last_act;
		if($date_now != $last_act){
			echo '
			';
		}
	}
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="style.css" rel="stylesheet"/>
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
		<?php
			$pod = " SELECT * FROM games";
			$pol = mysql_query($pod) or die ( "Error : ".mysql_error() );
			echo '<script>
				var name = new Array();
			';
			while($lini = mysql_fetch_array($pol)){
				$name_game_now = $lini['title'];
				echo 'name.push("'.$name_game_now.'");';
			}
			echo '</script>';
		?>
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
					<div class="ava"><?php include('scripts/avatar.php'); ?></div>
				</div>
			</div>
			<div class="content">
				<div class="buttons">
					<a href="scripts/game.php" class="btn_top"><span>Не нашли игру?<br>Предложи свою!</span></a>
					<a href="" style="padding-left: 2%;padding-right: 2%;" class="btn_top">Во что поиграть?</a>
					<a href="game/" class="btn_top">Рулетка</a>
				</div>
				
				<div class="now_game" id="now_game">
					<span>Недавно вышла</span>
					<?php
						$date = date('Y-m-d');
						$query = " SELECT * FROM games";
						$result = mysql_query($query) or die ( "Error : ".mysql_error() );
						echo '<script>
							var phr = new Array();
							var name = new Array();
						';
						while($row = mysql_fetch_array($result)){
							$cover_now = $row['cover'];
							$date_game_now = $row['date'];
							$date_otn = $date - $date_game_now;
							if($date_otn <= 7){
								echo 'phr.push("scripts/'.$cover_now.'"); ';
							}
						}
						echo '</script>';
						echo "
							<script>
							function Rotator_cont() {
							var s = 10000;  // Время отображения
							var N=phr.length;
							var i=Math.round(Math.random()*(N));Rotator(i);

							function Rotator(i){
							i++; if(i>N-1){i=0};//alert(i);
							document.getElementById('now_game').style.backgroundImage='url('+phr[i]+')';
							document.getElementById('now_game').innerHTML = name[i] + '<a>Купить</a>';
							timerId01=setTimeout(function(){Rotator(i)},s);return;}
							}Rotator_cont()
							</script>
						";
					?>
				</div>
				<div class="but_gunre">
					<a class="but_gunre_href" href="">Экшен</a>
					<a class="but_gunre_href" href="">Шутер</a>
					<a class="but_gunre_href" href="">RPG</a>
					<a class="but_gunre_href" href="">Симулятор</a>
					<a class="but_gunre_href" href="">Слэшер</a>
					<a class="but_gunre_href" href="">Стратегия</a>
					<a class="but_gunre_href" href="">Ужасы</a>
					<a class="but_gunre_href" href="">Файтинг</a>
					<a class="but_gunre_href" href="">Менеджмент</a>
					<a class="but_gunre_href" href="">Аркада</a>
					<a class="but_gunre_href" href="">Онлайн</a>
					<a class="but_gunre_href" href="">Cпорт</a>
					<a class="but_gunre_href" href="">Походовая</a>
				</div>
				
				<div class="popular">
					<div class="title"><span>Популярные игры</span></div>
					<div class="popular_game">
						<?php
							$sql = " SELECT * FROM games ORDER BY assessment DESC LIMIT 8";
							$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
							while($line = mysql_fetch_array($res)){
								$id_game = $line['id'];
								$cover = $line['cover'];
								$name_skin = $line['title'];
								$assessment = $line['assessment'];
								include('assessment.php');
								echo '
									<a href=page/index.php?id='.$id_game.' ><div class="game">
										<div class="cover" style="background-image: url(scripts/'.$cover.');">'.$as.'</div>
										<span class="name_game">'.$name_skin.'</span>
									</div></a>
								';	
							}
						?>
					</div>
				</div>
				<div class="all_game">
					<div class="title"><span>Все игры</span></div>
					<div class="all_block">
						<?php
							$sql = " SELECT * FROM games ORDER BY RAND()";
							$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
							while($line = mysql_fetch_array($res)){
								$id_game = $line['id'];
								$cover = $line['cover'];
								$name_skin = $line['title'];
								$assessment = $line['assessment'];
								include('assessment.php');
								echo '
									<div class="game">
										<div class="cover" style="background-image: url(scripts/'.$cover.');">'.$as.'</div>
										<a href=skin.php?game='.$id_game.' class="name_game">'.$name_skin.'</a>
									</div>
								';	
							}
						?>
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
