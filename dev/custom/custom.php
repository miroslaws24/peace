<?php include('bd.php'); ?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="custom.css" rel="stylesheet"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="autoresize.js"></script>
		<style>
			@font-face {
				font-family: FuturaPT;
				src: url(/../FuturaPT.otf);
			}
			@font-face {
				font-family: FuturaPTMedium;
				src: url(../../Static/Fonts/FuturaPTMedium.otf);
			}
		</style>
	</head>
    <body>
		<div class="edit_cont">
			<div class="logo_block">
				<img class="logo" src="../../../img/peace.png" />
			</div>
			<div class="edit_ava">
				<span class="edit_title">Сменить фотографию</span>
				<div class="edit_out">
					<form enctype="multipart/form-data" method="POST">
						<input id="uploadbtn" type="file" class="uplava" name="edit_ava">
						<div class="edit_for_input"><span>Выберите файл</span></div>
						<div class="edit_name_file"><input id="name_file"></div>
						<script>
							document.getElementById('uploadbtn').onchange = function () {
								document.getElementById('name_file').value = document.getElementById('uploadbtn').value.replace(/.*[\\\/]/, "");
							}
						</script>
					</form>
				</div>
			</div>
			<div class="edit_info_user">
				<span class="edit_title">Изменить информацию</span>
				<div class="edit_out">
					<span class="edit_title_un">Имя:</span>
					<form enctype="multipart/form-data" method="POST">
						<input id="uploadbtn" type="text" class="edit_input" name="edit_name">
					</form>
				</div>
				<div class="edit_out">
					<span class="edit_title_un">Фамилия:</span>
					<form enctype="multipart/form-data" method="POST">
						<input id="uploadbtn" type="text" class="edit_input" name="edit_name">
					</form>
				</div>
				<div class="edit_out">
					<span class="edit_title_un">Страна:</span>
					<form enctype="multipart/form-data" method="POST">
						<input id="uploadbtn" type="text" class="edit_input" name="edit_name">
					</form>
				</div>
			</div>
			<div class="edit_customization">
				<span class="edit_title">Кастомизация</span>
				<span class="edit_title_2">Фон</span>
				<div class="edit_out">
					<form enctype="multipart/form-data" method="POST" action="background.php">
						<input id="uploadbtn" type="file" class="uplava" name="background">
						<div class="edit_for_input"><span>Выберите файл</span></div>
						<div class="edit_name_file"><input id="name_file"></div>
						<script>
							document.getElementById('uploadbtn').onchange = function () {
								document.getElementById('name_file').value = document.getElementById('uploadbtn').value.replace(/.*[\\\/]/, "");
							}
						</script>
						<div class="buttons">
							<input value="Сохранить" class="button" type="submit" name="background_ok">
							<input style="margin-left: 2%;" class="button" value="Сбросить" type="submit">
						</div>
					</form>
				</div>
			</div>
		</div>	
    </body>
</html>