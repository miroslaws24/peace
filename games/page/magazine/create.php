<?php 
	session_start(); 
	include_once("bd.php");
	$query = " SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	$name_avatar = $row['name_avatar'];
	
	$sql = " SELECT * FROM games WHERE id = '".$_SESSION['game_id']."'";
	$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
	$line = mysql_fetch_array($res);
	$date_now = date('Y-m-d');;
	$title = $line['title'];
	$genre = $line['genre'];
	$date = $line['date'];
	$platform = $line['platform'];
	$description = $line['description'];
	$cover = $line['cover'];
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="create.css" rel="stylesheet"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<style>
			@font-face {
				font-family: FuturaPT;
				src: url(FuturaPT.otf);
			}
			@font-face {
				font-family: FuturaPTMedium;
				src: url(../FuturaPTMedium.otf);
			}
			.avatar{
				background-image: url('/site/new_user/<?php echo $avatar; ?>');
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
					<div class="ava"></div>
				</div>
			</div>
			<div class="content">
				<div class="left_container">
					<div class="cover_game">
						<?php echo '<img class="cover" src="../../scripts/'.$cover.'" />'; ?>
					</div>
				</div>
				<div class="work_space">
					<div class="block">
						<form enctype="multipart/form-data" action="funct/create_s.php" id="artcl" name="skin" method="post" type="file">
							<input name="name_skin" class="title_artcls" placeholder="Заголовок">
							<input name="tg_skin" class="title_artcls" placeholder="Тэги (к какой теме относится журнал)">
							<textarea name="desc_skin" class="anons_artcl" placeholder="Краткое описание журанала"></textarea>
							<div class="buttons_main">
								<input name="ok_skin" class="button_main" type="submit" value="Создать">
							</div>
						</form>
						<script type="text/javascript">
						$('input[type=file]').change(function() {
						if ($('input[type=file]').val() != '') {
							var color = 'after';
							var color2 = 'after_inp';
							document.getElementById('text_block').innerHTML = "Постер добавлен";
							document.getElementById('download_file_text').innerHTML = "Загружено";
						} else {
							var color = '';
						}
						$('.poster_block').addClass(color);
						$('.add_poster').addClass(color2);
						});
						</script>
						
						<script type="text/javascript">
						$('.title_artcls').change(function() {
						if ($('.title_artcls').val() != '') {
							var color = 'suc';
						} else {
							var color = '';
						}
						$('.title_artcls').addClass(color);
						});
						</script>
						<script>  
							function AddTaI(){  
								var parent = document.getElementById('content_artcl');  
								var div = document.createElement('DIV'); 
								div = parent.appendChild(div); 
								$(div).addClass('text_img');
								div.innerHTML = '<a href="" class="inp_file_text"><span>Загрузить файл</span><input class="inp_file_texto" type="file"></a><textarea placeholder="Текст сюда" class="text_img_artcl"></textarea>'; 
							}
							function AddT(){  
								var parent = document.getElementById('content_artcl');  
								var div = document.createElement('DIV'); 
								div = parent.appendChild(div); 
								$(div).addClass('text_temp');
								div.innerHTML = '<textarea placeholder="Текст сюда" class="text_temp_artcl"></textarea>'; 
							}
							function AddI(){  
								var parent = document.getElementById('content_artcl');  
								var div = document.createElement('DIV'); 
								div = parent.appendChild(div); 
								$(div).addClass('img_temp');
								div.innerHTML = '<a href="" class="img_temp_add"><span>Загрузить файл</span><input class="img_temp_addo" type="file"></a>'; 
							}
							function AddV(){  
								var parent = document.getElementById('content_artcl');  
								var div = document.createElement('DIV'); 
								div = parent.appendChild(div); 
								$(div).addClass('video_temp');
								$(div).attr('id', 'video_temp');
								div.innerHTML = '<input onkeyup="if(event.keyCode == 13){alert("gaag");}" id="video_inp" class="add_video" placeholder="Вставьте ссылку на YouTube">'; 
							}
							
						</script>
						<script>
						$("#video_inp").keyup(function(event){
							if(event.keyCode == 13){
								alert("Pressed");
								document.getElementById('video_temp').innerHTML = "<iframe width='560' height='315' src='https://www.youtube.com/embed/-aoVmPevKiM' frameborder='0' allowfullscreen></iframe>";
							}
						});
						</script>
					</div>
				</div>
			</div>
		</body>
</html>
