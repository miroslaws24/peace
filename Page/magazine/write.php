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
		<link href="write.css" rel="stylesheet"/>
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
					<a href="" class="href_menu"><img class="ic_menu" src="img/write.png"/></a>
					<a href=create.php?id=<?php echo $_SESSION['id']; ?> class="href_menu"><img class="ic_menu" src="img/add.png"/></a>
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
						<form action="funct/write_s.php" id="artcl" name="artcl" method="post" type="file">
							<div style="display: block;" id="poster_block" class="poster_block">
								<span id="text_block">Добавить постер статьи</span>
								<a class="add_poster"><span id="download_file_text">Загрузить файл</span><input class="inp_poster" id="poster" name="poster" type="file"></a>
							</div>
							<div style="display: none;" id="poster_previe" class="poster_previe">
							</div>
							<script>
								$('#poster').change(function() {
									var input = $(this)[0];
									if ( input.files && input.files[0] ) {
										if ( input.files[0].type.match('image.*') ) {
											var reader = new FileReader();
											reader.onload = function(e) { $('#poster_previe').attr('style', 'background-image: url(' + e.target.result + ');'); }
											reader.readAsDataURL(input.files[0]);
											document.getElementById("poster_previe").style.display="block";
											document.getElementById("poster_block").style.display="none";
									} else console.log('is not image mime type');
								  } else console.log('not isset files data or files API not supordet');
								});
							</script>
							<input name="title_artcls" class="title_artcls" placeholder="Заголовок статьи">
							<div class="radio"><label class="inp_radio"><input type="radio" checked name="dva"/> Интервью</label> <label class="inp_radio"><input type="radio" name="dva"/> Новость</label></div>
							<textarea class="anons_artcl" placeholder="Анонс статьи"></textarea>
							<div class="content_artcl" id="content_artcl">
							</div>
							<div class="button">
								<span class="button_title">Добавить блоки</span>
								<div onclick="AddTaI();" class="temp_button">
									<span>Текст и изображение</span>
								</div>
								<div onclick="AddT();" class="temp_button">
									<span>Текст</span>
								</div>
								<div onclick="AddI();" class="temp_button">
									<span>Изображение</span>
								</div>
								<div onclick="AddV();" class="temp_button">
									<span>Видео</span>
								</div>
							</div>
							<div class="buttons_main">
								<input name="ok_write" class="button_main" type="submit" value="Опубликовать">
							</div>
						</form>

						
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
							var countOfFields = 0;
							var curFieldNameId = 1;
							var countTaI = 0;
							var curTaI = 1;
							var countT = 0;
							var curT = 1;
							var maxFieldLimit = 5;
							function AddTaI(){
								if (countTaI >= maxFieldLimit) {
									alert("Число полей достигло своего максимума " + maxFieldLimit);
									return false;
								}
								countTaI++;
								curFieldNameId++;
								
								var parent = document.getElementById('content_artcl');  
								var div = document.createElement('DIV'); 
								div = parent.appendChild(div); 
								$(div).addClass('text_img');
								div.innerHTML = '<a href="" class="inp_file_text"><span>Загрузить файл</span><input name=\"block[' + curFieldNameId + ']\" class="inp_file_texto" type="file"></a><textarea name=\"block[' + curFieldNameId + ']\" placeholder="Текст сюда" class="text_img_artcl"></textarea>'; 
							}
							function AddT(){
								if (countT >= maxFieldLimit) {
									alert("Число полей достигло своего максимума " + maxFieldLimit);
									return false;
								}
								countT++;
								curFieldNameId++;
								
								var parent = document.getElementById('content_artcl');  
								var div = document.createElement('DIV'); 
								div = parent.appendChild(div); 
								$(div).addClass('text_temp');
								div.innerHTML = '<textarea name=\"block[' + curFieldNameId + ']\" placeholder="Текст сюда" class="text_temp_artcl"></textarea>'; 
							}
							function AddI(){
								if (countOfFields >= maxFieldLimit) {
									alert("Число полей достигло своего максимума " + maxFieldLimit);
									return false;
								}
								countOfFields++;
								curFieldNameId++;
								
								var parent = document.getElementById('content_artcl');  
								var div = document.createElement('DIV'); 
								div = parent.appendChild(div); 
								$(div).addClass('img_temp');
								div.innerHTML = '<a href="" class="img_temp_add"><span>Загрузить файл</span><input name=\"block[' + curFieldNameId + ']\" class="img_temp_addo" type="file"></a>'; 
								return false;
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
