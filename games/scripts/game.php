<?php
	
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="../style.css" rel="stylesheet"/>
		<link href="create.css" rel="stylesheet"/>
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
			<div class="header">
				<div class="mid_header">
					<div class="logo"></div>
					<div class="menu">
						<a style="background: #337ab7;" href="games/" class="menu_href">Игры</a>
						<a href="" class="menu_href">Фильмы</a>
						<a href="" class="menu_href">Интресное</a>
						<a href="" class="menu_href">Рейтинги</a>
					</div>
				</div>
			</div>
			<div id="right_cont">
				<div class="ava"></div>
				<div class="main_vert">
					<div class="ic_tip"><div class="icon_main"></div></div>
					<div class="ic_tip"><div class="icon_news"></div></div>
					<div class="ic_tip"><div class="icon_dz"></div></div>
					<div class="icon_top"></div>
				</div>
			</div>
			<div class="content">
				<div class="work_space">
					<div class="block">
						<form enctype="multipart/form-data" action="create_s.php" id="artcl" name="skin" method="post" type="file">
							<div class="poster_block">
								<span id="text_block">Добавить постер</span>
								<a class="add_poster"><span id="download_file_text">Загрузить файл</span><input class="inp_poster" id="poster" name="cover" type="file"></a>
							</div>
							<div class="poster_block">
								<span id="text_block">Добавить большой постер</span>
								<a class="add_poster"><span id="download_file_text">Загрузить файл</span><input class="inp_poster" id="poster" name="cover" type="file"></a>
							</div>
							<input name="name_game" class="title_artcls" placeholder="Название игры">
							<input name="genre_game" class="title_artcls" placeholder="Жанр игры">
							<input name="platform_game" class="title_artcls" placeholder="Платформа игры">
							<input name="date_game" type="date" class="title_artcls" placeholder="Дата выхода игры">
							<textarea name="descript_game" class="anons_artcl" placeholder="Краткое описание игры"></textarea>
							<input name="requirements_game" class="title_artcls" placeholder="Системные требования игры">
							<div class="buttons_main">
								<input name="ok_skin" class="button_main" type="submit" value="Предложить">
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