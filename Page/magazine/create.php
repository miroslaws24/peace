<?php 
	session_start(); 
	include_once("bd.php");
	$_SESSION['user_id'] = $_GET['user'];
	if($_GET['id'] == $_SESSION['id']){
		//
	}
	elseif($_GET['id'] !== $_SESSION['id']){
		header('Location:user.php?id='.$_GET['id'].'');
	}
	$query = " SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	$background = $row['background'];
	$avatar = $row['name_avatar'];
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
			<div class="writer">
				<div class="menu">
					<a href=index.php?id=<?php echo $_SESSION['id']; ?> class="href_menu"><img class="ic_menu" src="img/mag.png"/></a>
					<a href=write.php?id=<?php echo $_SESSION['id']; ?> class="href_menu"><img class="ic_menu" src="img/write.png"/></a>
					<a href="" class="href_menu"><img class="ic_menu" src="img/add.png"/></a>
					<a href="" class="href_menu"></a>
				</div>
			</div>
			<div class="content">
				<div class="header">
					<img class="logo" src="img/peace100px.png" />
					<span class="header_title">Мои журналы</span>
				</div>
				<div class="work_space">
					<div class="block">
						<form enctype="multipart/form-data" action="funct/create_s.php" id="artcl" name="skin" method="post" type="file">
							<div class="poster_block">
								<span id="text_block">Добавить обложку игры</span>
								<a class="add_poster"><span id="download_file_text">Загрузить файл</span><input class="inp_poster" id="poster" name="cover" type="file"></a>
							</div>
							<input name="name_skin" class="title_artcls" placeholder="Название журанала">
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
