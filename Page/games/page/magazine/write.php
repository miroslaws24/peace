<?php 
	session_start(); 
	include_once("bd.php");
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
		<script src="form.js"></script>
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
				</div>
				<div class="work_space">
					<div class="block">
						<form action="funct/write_s.php" id="artcl" name="artcl" method="post" enctype="multipart/form-data" type="file">
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
							<textarea name="anons_artcl" class="anons_artcl" placeholder="Анонс статьи"></textarea>
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
