<?php
	session_start();
	include("bd.php");
	$url = "index.php?id=";
	if(isset($_POST['ok_post'])){
			$title= $_POST['title'];
			$user_id = $_GET['user'];
			$posttext = $_POST['posttext'];
			$today = date("d.m.Y");
			$time = date('H:i');
				if(empty($_FILES['foto_post']['size']))  die('Вы не выбрали файл');
				if($_FILES['foto_post']['size'] > (5 * 1024 * 1024)) die('Размер файла не должен превышать 5Мб');
				$imageinfo = getimagesize($_FILES['foto_post']['tmp_name']);
				$arr = array('image/jpeg','image/gif','image/png');
				if(!in_array($imageinfo['mime'],$arr)) echo ('Картинка должна быть формата JPG, GIF или PNG');
				else {
					$upload_dir = 'foto_post/';
					$name = $upload_dir.date('YmdHis').basename($_FILES['foto_post']['name']);
					$mov = move_uploaded_file($_FILES['foto_post']['tmp_name'],$name);
					if($mov) {
						$name = stripslashes(strip_tags(trim($name)));
						if(!empty($title) and !empty($posttext)){
							mysql_query("INSERT INTO post SET title ='".$title."',time ='".$time."',foto_post ='".$name."',user_id ='".$user_id."',posttext ='".$posttext."',today ='".$today."'") or  die ( "Error : ".mysql_error() ) ;
						}
						echo '
							<script language="JavaScript"> 
								window.location.href = "/site/index.php?id='.$_SESSION['id'].'"
							</script>';
					}
					else 
						echo 'Произошла ошибка при загрузке аватарки. Пожалуйста, попробуйте снова';
				}
			
	echo '
		<script language="JavaScript"> 
			window.location.href = "/site/'.$url.$_SESSION['id'].'"
		</script>';
	}
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="style.css" rel="stylesheet"/>
    </head>
        <body>
			<div class="header"></div>
			<div class="content">
				<div class="post_inputs">
				<form enctype="multipart/form-data" method="post">
					<label class="butt" for="btnPostTg">Добавить тэг</label>
					<input type="submit" id="btnPostTg" value ="Добавить тэг" />
					<label class="butt" for="btnPostPht">Добавить обложку</label>
					<input name="foto_post" type="file" id="btnPostPht" value="Добавить обложку" />
						<input name="title" placeholder="Ваш заголовок" class="post_input">
						<div class="content_edit">
							<div class="button_space"></div>
							<textarea name="posttext" class="post"></textarea>
						</div>
						<input type="submit" class="button_ok_post" name="ok_post" value="Запостить!">
						<input type="reset" class="button_reset" name="reset" value="Очистить">
						<input onClick="window.location= '/site/'" type="button" class="close_page" name="close" value="Закрыть">
					</form>
						
				</div>
			</div>
        </body>
</html>
