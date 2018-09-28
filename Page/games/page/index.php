<?php 
	session_start(); 
	include_once('function.php');
	include_once('smile.php');
	include_once("../bd.php");
	$_SESSION['game_id'] = $_GET['id'];
	$query = " SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	$name_avatar = $row['name_avatar'];
	$status = $row['stars'];
	$sql = " SELECT * FROM games WHERE id = '".$_GET['id']."'";
	$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
	$line = mysql_fetch_array($res);
	$date_now = date('Y-m-d');;
	$title = $line['title'];
	$genre = $line['genre'];
	$date = $line['date'];
	$platform = $line['platform'];
	$description = $line['description'];
	$cover = $line['cover'];
	$q = " SELECT SUM(count) FROM assesment WHERE id_game = '".$_GET['id']."'";
	$r = mysql_query($q) or die ( "Error : ".mysql_error() );
	$sum_count = mysql_result($r,0);
	$num_count = mysql_num_rows($r);
	$asBand = $sum_count/$num_count;
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="page.css" rel="stylesheet"/>
		<link href="fancybox/jquery.fancybox.css" rel="stylesheet"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="autoresize.js"></script>
		<script type="text/javascript" src="smile.js"></script>
		<script type="text/javascript" src="asses.js"></script>
		<script src="readmore.min.js" type="text/javascript"></script>
		<script src="fancybox/jquery.fancybox-1.2.1.pack.js" type="text/javascript"></script>
		<script src="fancybox/jquery.easing.1.3.js" type="text/javascript"></script>
		
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
					<div class="ava"><?php include('../scripts/avatar.php'); ?></div>
				</div>
			</div>
			<div class="content">
				
				<div class="top_conteiner">
					<div class="title_game">
						<span class="main_title"><?php echo $title; ?></span>
						<div class="add_block"><img src="smile/add.png" id="click_add" class="click_add" /></div>
						
						<div class="menu_add" id="menu_add">
							<a href="magazine/write.php">Добавить статью</a>
							<a href="">Добавить гайд</a>
							<a href="">Добавить рецензию</a>
						</div>
					</div>
					<div class="date_game">
						<span class="platform"><?php echo $platform; ?></span>
						<span class="date">
						<?php
							if($date == $date_now){
								echo 'Вышла сегодня';
							}
							elseif($date > $date_now){
								echo 'Выйдет '.rus_date("j F Y ", strtotime($date)); 
							}
							elseif($date < $date_now){
								echo 'Вышла '.rus_date("j F Y ", strtotime($date));
							}
						
						?>
						</span>
					</div>
					<div class="genre_game">
						<span class="genre"><?php echo $genre; ?></span>
					</div>
					<div class="disc_game">
						<span class="description"><?php echo $description; ?></span>
					</div>
					<div class="photo_game">
						<a class="gallery" rel="group" href="javascript:void(0);"><img src="smile/1.jpg" id="screenGame" class="screenGame" /></a>
						<a class="gallery" rel="group" href="javascript:void(0);"><img src="smile/2.jpg" id="screenGame" class="screenGame" /></a>
						<a class="gallery" rel="group" href="javascript:void(0);"><img src="smile/3.jpg" id="screenGame" class="screenGame" /></a>
						<a class="gallery" rel="group" href="javascript:void(0);"><img src="smile/4.jpg" id="screenGame" class="screenGame" /></a>
						<div class="another_photo"><span>Показать еще</span></div>
					</div>
				</div>
				<div class="left_container">
					<div class="cover_game">
						<?php echo '<img class="cover" src="../scripts/'.$cover.'" />'; ?>
					</div>
					<div class="mark_game">
						<span class="title_rait">Рейтинг</span>
						<div class="mark_block">
							<?php include('asses_out.php'); ?>
						</div>
						<?php include('asses.js'); ?>
						<div class="digit_rait">
							<span class="digit_title"><img src="smile/bandit.png" class="img_digit" />Band.it</span><span class="digit_count"><?php echo $asBand; ?></span>
							<span class="digit_title"><img src="smile/metacritic.png" class="img_digit" />Metacritic</span><span class="digit_count">7</span>
							<span class="digit_title"><img src="smile/ign.png" class="img_digit" />IGN</span><span class="digit_count">7</span>
						</div>
					</div>
					<div class="WhBuy">
						<span class="title_rait">Где купить</span>
						<div class="buy_space">
							<div class="shop_block">
								<img class="img_shop" src="smile/steam.png" width="30" height="30" />
								<span class="title_shop">Steam</span>
								<span class="price_shop">1500р.</span>
							</div>
							<div class="shop_block">
								<img class="img_shop" src="smile/origin.png" width="30" height="30" />
								<span class="title_shop">Origin</span>
								<span class="price_shop">1000р.</span>
							</div>
						</div>
					</div>
					<div class="artcl_game">
						<span class="title_rait">Статьи</span>
						
					</div>
				</div>
				<div class="comment_game">
					<div class="area">
						<div class="avatar_user" style="background-image: url(../../new_user/<?php echo $name_avatar; ?>);"></div>
						<form name="fc" id="formx" action="javascript:void(null);" onsubmit="call()" name="comment" method="post" action="">
							<textarea onkeydown="numbersOfKey(event)" id="text_comment" name="text_comment" class="text_input"></textarea>
							<div id="download_img" style="display:none;"><img src="load.gif" alt="" width="20" height="20" /></div><input name="goCom" class="add_comment" value="Отправить" type="submit">
							<img src="smile/smvec.png" class="clkSmile" />
							<div class="smile">
								<img onclick="insertSmile(':bigsmile:')" alt="Плохой компьютер!" src="smile/big-smile.png" />
								<img onclick="insertSmile(':cool:')" alt="Плохой компьютер!" src="smile/cool.png" />
								<img onclick="insertSmile(':hmm:')" style="margin-top: 6px;" alt="Плохой компьютер!" src="smile/hmm.png" />
								<img onclick="insertSmile(':lol:')" style="margin-top: 6px;" alt="Плохой компьютер!" src="smile/lol.png" />
								<img onclick="insertSmile(':mad:')" style="margin-top: 6px;" alt="Плохой компьютер!" src="smile/mad.png" />
								<img onclick="insertSmile(':neutral:')" style="margin-top: 6px;" alt="Плохой компьютер!" src="smile/neutral.png" />
								<img onclick="insertSmile(':roll:')" style="margin-top: 6px;" alt="Плохой компьютер!" src="smile/roll.png" />
								<img onclick="insertSmile(':sad:')" style="margin-top: 6px;" alt="Плохой компьютер!" src="smile/sad.png" />
								<img onclick="insertSmile(':smile:')" style="margin-top: 6px;" alt="Плохой компьютер!" src="smile/smile.png" />
								<img onclick="insertSmile(':tongue:')" style="margin-top: 6px;" alt="Плохой компьютер!" src="smile/tongue.png" />
							</div>
							
							<?php include('smile.js'); ?>
						</form>
						<script type="text/javascript" language="javascript">
							function call() {
							  var msg   = $('#formx').serialize();
								$.ajax({
								  type: 'POST',
								  url: 'comment.php',
								  data: msg,
								  success: function(data) {
									$('#comm_space').html(data);
								  },
								  error:  function(xhr, str){
								alert('Возникла ошибка: ' + xhr.responseCode);
								  }
								});
							}
							$('#more').on('click', call);
						</script>
						<script type="text/javascript" language="javascript">
							
							$(document).ready(function() {
								$("#text_comment").keydown(function(event){
									if (e.which == 13) {
										e.preventDefault();
									}
								});
							});
						</script>
					</div>
				</div>
				<div id="comm_space" class="comm_space">
					<script>
					$(document).ready(function() { 
						$.ajax({
							type: "POST",
							url: "out_comm.php",
							success: function(html) {
								$('#comm_space').empty();
								$('#comm_space').append(html);
							}
						})
					});
					$('#more').on('click', call);
					</script>
				</div>
				<div id="load">
					<img id="imgLoad" src="smile/ajax-loader.gif" />
					<div id="loadText">Загрузить еще</div>
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
			<script>
				$('.add_block').click(function() {
					$("#overlay").fadeIn('fast');
					$(".menu_add").fadeIn('fast');
				});
				$('#overlay').click(function() {
					$(".menu_add").fadeOut('fast');
					$("#overlay").fadeOut('fast');
				});
			</script>
			<script>
				$(".clkSmile").click(function() {
						$(".smile").fadeIn("fast");
				});
				$(".smile").mouseleave(function() {
					setTimeout(function(){$(".smile").fadeOut("fast")}, 500);
				});
			</script>
			
		</body>
</html>