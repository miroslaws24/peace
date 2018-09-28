<?php 
	session_start(); 
	include_once("bd.php");
	if(isset($_SESSION['id'])){
		if($_GET['id'] == $_SESSION['id']){
			$query = " SELECT background FROM users WHERE id = '".$_SESSION['id']."'";
			$result = mysql_query($query) or die ( "Error : ".mysql_error() );
			$row = mysql_fetch_array($result);
			$background = $row['background'];
		}
		elseif($_GET['id'] !== $_SESSION['id']){
			header('Location:user.php?id='.$_GET['id'].'');
		}
	}
	else{
		header('Location://');
	}
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="cloud.css" rel="stylesheet"/>
		<link href="audio.css" rel="stylesheet"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="mediaelement-and-player.min.js"></script>

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
        <body style="background-image: url(../dev/custom/<?php echo $background; ?>)">
			<div class="content">
				<div class="left-menu">
					<a class="href_logo" href="#"><img class="logotip" src="/../img/peace100px.png"></a>
					<a class="href_left" href=cloud.php?id=<?php>Фото</a>
					<a class="href_left" href=cloud.php?id=<?php>Музыка</a>
					<a class="href_left" href="#">Заметки</a>
					<a class="href_left" href="#">Настройки</a>
				</div>
				<div class="main_space">
					<?php
					
							if(isset($_GET['mode']) && ($_GET['mode'] == 'music')){
								echo '
									<div class="title_page"> 
										<span class="title">Музыка</span>
									</div>
									<div class="menu">
										<a href="#">Мои песни</a>
										<a href="#">Что послушать?</a>
										<a id="download_music" style="margin-right: 3%;float: right;" href="#"><img class="download_icon" src="download.png" /></a>
									</div>
									<div draggable="true" class="download_block" style="display: none;">
										<form id="musicForm" method="post" action="audio.php">
											<div class="dropZone" id="dropZone">
												<div id="inputCustom" class="inputCustom">
													<span id="textIn" class="textIn">Загрузить файл</span>
													<input accept="audio/mpeg" class="box_file" type="file" name="files" id="my_file" />
												</div>
												<progress class="progress" id="progressbar" value="0" max="100"></progress>
											</div>
										</form>
									</div>
									<div class="sch_mus">
										<input class="sch_mus_inp" placeholder="Чего найти?">
									</div>
								';
								echo 
								'
								<div class="audio-player">
									<img class="cover" src="audio/img/mus.png" alt="">	
									<span class="title_music">Demo - Preview Song</span>
									<audio id="audio-player" src="audio/jey.mp3" type="audio/mp3" controls="controls"></audio>
								</div>
								<script>
									$(document).ready(function() {
										$("#audio-player").mediaelementplayer({
											alwaysShowControls: true,
											features: ["playpause","volume","progress"],
											audioVolume: "horizontal",
											audioWidth: 400,
											audioHeight: 50
										});
									});
								</script>
								';
							}
					?>
				</div>
			</div>
			<script>
				$('#download_music').click(function(){
						$('.download_block').fadeIn('100');
				});
			</script>
		</body>
</html>
<script src="dropanddrug.js"></script>
