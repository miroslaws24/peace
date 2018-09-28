<?php
	session_start();
	include("../bd.php");
	if(isset($_POST['ok_skin'])){
		if(!empty($_POST['name_game'])){
			if(!empty($_POST['descript_game'])){
				if(empty($_FILES['cover']['size']))  die('<div class="error">Вы не выбрали файл</div>');
				if($_FILES['cover']['size'] > (20 * 1024 * 1024)) die('<div class="error">Размер файла не должен превышать 5Мб</div>');
				$imageinfo = getimagesize($_FILES['cover']['tmp_name']);
				$arr = array('image/jpeg','image/gif','image/png');
				if(!in_array($imageinfo['mime'],$arr)) echo ('<div class="error">Только JPG, GIF или PNG</div>');
				else {
					$upload_dir = 'cover_game/';
					$name = $upload_dir.date('YmdHis').basename($_FILES['cover']['name']);
					$mov = move_uploaded_file($_FILES['cover']['tmp_name'],$name);
					$name_game = $_POST['name_game'];
					$genre_game = $_POST['genre_game'];
					$platform_game = $_POST['platform_game'];
					$date_game = $_POST['date_game'];
					$descript_game = $_POST['descript_game'];
					$requirements_game = $_POST['requirements_game'];
					$assessment = 0;
					if($mov) {
						$name = stripslashes(strip_tags(trim($name)));
						mysql_query("INSERT INTO games SET title = '".$name_game."',cover = '".$name."',genre = '".$genre_game."',platform = '".$platform_game."',date = '".$date_game."',description = '".$descript_game."',requirements = '".$requirements_game."',assessment = '".$assessment."'");
						echo '
						<script language="JavaScript"> 
							window.location.href = "/site/index.php?id='.$_SESSION['id'].'"
						</script>';
					}
				}
			}
		}
	}
?>
<link href="style.css" rel="stylesheet"/>