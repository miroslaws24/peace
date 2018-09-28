<?php 
	session_start(); 
	include_once("bd.php");
	include_once('dev/achive/achive.php');
	$query = " SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	if(mysql_num_rows($result) > 0) {
        if($_GET['id'] == $_SESSION['id']){
			header('Location:index.php?id='.$_SESSION['id'].'');
		}
		elseif($_GET['id'] !== $_SESSION['id']){
			//
		}
    }
	else{
        header('Location:no_accaunt.php');
	}
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="style.css" rel="stylesheet"/>
		<link href="dev/ur/ur.css" rel="stylesheet"/>
		<link href="dev/intresting/intresting.css" rel="stylesheet"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="autoresize.js"></script>
		<style>
			@font-face {
				font-family: FuturaPT;
				src: url(FuturaPT.otf);
			}
			@font-face {
				font-family: FuturaPTMedium;
				src: url(FuturaPTMedium.otf);
			}
		</style>
    </head>
        <body>
			<a href="#" class="back_to" onclick="history.back();return false;"></a>
			<div class="content">
				<div class="left_cont">
					<?php include('dev/people.php'); ?>
				</div>
				<div id="right_cont">
					<div class="country">
						<?php include('dev/country/country.php'); ?>
					</div>
					<div class="avatar">
						<?php include('dev/avatar/avatar.php'); ?>
					</div>
					<div class="login">
						<div class="edit">
						</div>
						<p class="p_name"><?php include('dev/name/name.php'); ?></p>
						<p class="p_login"><?php include('dev/login/login.php'); ?></p>
					</div>
					<div class="post_user">
						<?php
						$fid =  $_GET['id'];
						$id = $_SESSION['id'];
						$query = ' SELECT * FROM firends WHERE `friend_id` = "'.$fid.'" AND `user_id` = "'.$id.'" ';
						$result = mysql_query($query) or die ( "Error : ".mysql_error() );
						if(mysql_num_rows($result) >= 1){
							while($row = mysql_fetch_array($result)){
								$user_id = $row['user_id'];
								if($user_id == $_SESSION['id']){
									echo '<a class="hr_post" href="dev/friend/friend_del.php?id='.$_SESSION['id'].'&frid='.$_GET['id'].'">Отписаться</a>';
								}
							}
						}
						elseif(mysql_num_rows($result) < 1){
							echo '<a class="hr_post" href="dev/friend/friend_req.php?id='.$_SESSION['id'].'&frid='.$_GET['id'].'">В друзья</a>';
						}
						?>
					</div>
					<div class="all_profile">
						<details class="details">
							<summary class="summary"><span>О нём</span></summary>
							<div class="details_block">
								<span class="title_details_block">Основная информация</span>
								<span class="text_details_block">Страна: Россия</span>
								<span class="text_details_block">Языки: Русский</span>
								<span class="title_details_block">Контактная информация</span>
								<span class="text_details_block">Моб. телефон: Россия</span>
							</div>
						</details>
						<details class="details">
							<summary class="summary"><span>Друзья</span></summary>
							<div class="details_block">
								<span class="text_details_block">Пока никого не нашли:(</span>
							</div>
						</details>
						<details class="details">
							<summary class="summary"><span>Статистика</span></summary>
							<div class="details_block">
								<div class="laik_info"><span>Лайки</span></div>
								<div class="laik_info"><span>Посты</span></div>
								<div class="laik_info"><span>Рейтинг</span></div>
								<?php include('dev/info/info.php'); ?>
							</div>
						</details>
					</div>
					<div class="line_title"><span>Интересное для вас</span></div>
					<div class="intresting">
						<?php include('dev/intresting/intresting.php'); ?>
					</div>
				</div>
			</div>
        </body>
</html>
