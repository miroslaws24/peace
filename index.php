<?php 
	session_start(); 
	include_once("bd.php");
	include_once('dev/achive/achive.php');
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
	elseif($_GET['id'] !== $_SESSION['id']){
		header('Location:index.php?id='.$_SESSION['id'].'');
	}
	$query = " SELECT background FROM users WHERE id = '".$_SESSION['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	$background = $row['background'];
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="style.css" rel="stylesheet"/>
		<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
		<link rel="stylesheet" href="owl-carousel/owl.theme.css">
		<script src="owl-carousel/owl.carousel.js"></script>
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
			<div id="overlay" style="display:none;"></div>
			<div class="header">
				<div class="mid_header">
					<div class="logo_haeder">
						<img class="img_logo_header" src="img/img_logo.png">
					</div>
					<div class="profile_head">
						<?php 
							if(!isset($_SESSION['login'])){
								echo '<a href="reg/vxod.php">Войти</a>';
								echo '<a href="reg/reg.php">Регистрация</a>';
							}
						?>
					</div>
					<div class="search_head">
						<input class="search" placeholder="Искать на сайте" />
					</div>
				</div>
			</div>
			<div class="content">
				<div class="laikArt">
					<?php include('dev/out_artcl.php') ?>
				</div>
				<div class="filtr">
					<div class="sort">
						<a href="">Только новое</a>
					</div>
					<div class="sort">
						<a href="">Найти годноту</a>
					</div> 
				</div>
				<div class="slideContent">
					<div class="slideIn">
						<div class="SlideTitle"><span>Новое на сайте</span></div>
						<div class="SlideBis">
							<?php include('dev/slidein.php'); ?>
						</div>
						<div class="SlideRecom">
							<div class="main_new_post">
								<div class="tfbcrpt">
								<img class="tfbcrpt_img" src="img/img_logo.png" /><p class="tfbcrpt_title" >Новое</p>
								<p class="tfbcrpt_und">Здесь собраны все новые записи нашего сайта. Комментируйте запсиси и делитесь ими с друзьями.</p>
								</div>
								<a href="#" class="button_new_post">Поделись новым</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</body>
		<script>
			$(function() {
				var box = $('.slideTab');

				var top = box.offset().top - parseFloat(box.css('marginTop').replace(/auto/, 0));
				$(window).scroll(function(){
					var windowpos = $(window).scrollTop();
					if(windowpos < top) {
						box.css('position', 'static');
					} else {
						box.css('position', 'fixed');
						box.css('top', 0);
					}
				});
			});
		</script>
</html>
