<?php 
	session_start(); 
	include_once("/bd.php");
	include_once('/dev/achive/achive.php');
	$_SESSION['user_id'] = $_GET['user'];
	
		if($_SESSION['id'] != $_GET['id']){
		echo '<script>alert("'.$_SESSION['id'].'");</script>';
	}
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="/style.css" rel="stylesheet"/>
		<link href="/dev/ur/ur.css" rel="stylesheet"/>
		<link href="/dev/intresting/intresting.css" rel="stylesheet"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="/autoresize.js"></script>
    </head>
        <body>
			<div class="content">
				<div class="top_image">
					
				</div>
				<div class="main">
					<a class="hr_main" href=/?id=<?php echo $_SESSION['id'] ?>>Моя страница</a>
					<a class="hr_main" href=/?main=people&id=<?php echo $_SESSION['id'] ?>>Люди</a>
					<a class="hr_main" href="#">Подписота</a>
					<a class="hr_main" href="#">Выход</a>
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
					<?php
						if(isset($_POST['ok'])){
							$user_id = $_GET['id'];
							$text = $_POST['text'];
							$day = date("G:i j F Y");
							if(!empty($text)){
								mysql_query("INSERT INTO cloud SET text ='".$text."',user_id ='".$user_id."',date ='".$day."'") or  die ( "Error : ".mysql_error() ) ;
								echo 
								'<script type="text/javascript">
									function obnovit_stranicu() {
										location.reload()
									}
								';
								exit();
							}
						}
					?>
					<form method="post">
						<textarea name="text" placeholder="Жду твоих мыслей" id="input_news">Мысли в слух</textarea>
						<input name="ok" class="submit_news" type="submit" />
					</form>
					<div class="main_dop">
						<a class="main_dop_hr" href=?t=m&id=<?php echo $_SESSION['id'] ?>>Мысли</a>
						<a class="main_dop_hr" href=?t=p&id=<?php echo $_SESSION['id'] ?>>Посты</a>
					</div>
					<?php include('dev/people.php'); ?>
				</div>
				<div id="right_cont">
					<div class="info">
						<div class="info_pole">
							<div class="laik_info"><span>Лайки</span></div>
							<div class="laik_info"><span>Посты</span></div>
							<div class="laik_info"><span>Рейтинг</span></div>
						</div>
						<div class="two_info_pole">
							<?php include('dev/info/info.php'); ?>
						</div>
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
						<?php echo '<a class="hr_post" href="artcls/index.php?user='.$_SESSION['id'].'">Запостить</a>'; ?>
					</div>
					<div class="stars">
						<div class="p_stars"><span>Заслуги</span></div>
						<?php include('dev/achive/achive_post.php'); ?>
					</div>
					<div class="line_title"><span>Интересное</span></div>
					<div class="intresting">
						<?php include('dev/intresting/intresting.php'); ?>
					</div>
				</div>
			</div>
        </body>
</html>
