<?php 
	session_start(); 
	include_once("bd.php");
	$SESSION['user_id'] = $_GET['user'];
	$query = " SELECT * FROM users WHERE id = '".$_GET['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="../style.css" rel="stylesheet"/>
		<link href="../dev/ur/ur.css" rel="stylesheet"/>
		<link href="../dev/intresting/intresting.css" rel="stylesheet"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="autoresize.js"></script>
		<style>
			@font-face {
				font-family: FuturaPT;
				src: url(../FuturaPT.otf);
			}
			@font-face {
				font-family: FuturaPTMedium;
				src: url(../FuturaPTMedium.otf);
			}
		</style>
    </head>
        <body>
			<div class="content">
				<div class="top_image">
				</div>
				<div class="left_cont">
					<script type="text/javascript">
						jQuery(function()
						{
							jQuery('#input_news').autoResize();
						});
					</script>
					<script type="text/javascript">
						jQuery('#input_news').autoResize({
							 extraSpace : 0
						});
					</script>
				</div>
				<div id="right_cont">
					<div class="country">
						
					</div>
					<div class="avatar">
					</div>
					<div class="login">
						<div class="edit">
						</div>
						<p class="p_name"><?php include('../dev/name/name.php'); ?></p>
						<p class="p_login"><?php echo $login; ?></p>
					</div>
					<div class="post_user">
						
					</div>
					<div class="all_profile">
						<details class="details">
							<summary class="summary"><span>Обо мне</span></summary>
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
								
							</div>
						</details>
					</div>
					<div class="line_title"><span>Интересное для вас</span></div>
					<div class="intresting">
						
					</div>
				</div>
			</div>
        </body>
</html>
