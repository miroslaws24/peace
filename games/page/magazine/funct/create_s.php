<?php
	session_start();
	include("bd.php");
	if(isset($_POST['ok_skin'])){
		if(!empty($_POST['name_skin'])){
			if(!empty($_POST['tg_skin'])){
				if(empty($_FILES['cover']['size']))  die('<div class="error">Вы не выбрали файл</div>');
				if($_FILES['cover']['size'] > (20 * 1024 * 1024)) die('<div class="error">Размер файла не должен превышать 5Мб</div>');
				$imageinfo = getimagesize($_FILES['cover']['tmp_name']);
				$arr = array('image/jpeg','image/gif','image/png');
				if(!in_array($imageinfo['mime'],$arr)) echo ('<div class="error">Только JPG, GIF или PNG</div>');
				else {
					$upload_dir = 'cover/';
					$name = $upload_dir.date('YmdHis').basename($_FILES['cover']['name']);
					$mov = move_uploaded_file($_FILES['cover']['tmp_name'],$name);
					$name_skin = $_POST['name_skin'];
					$tg_skin = $_POST['tg_skin'];
					$desc_skin = $_POST['desc_skin'];
					$id_user = $_SESSION['id'];
					$date_reg = date('d F Y');
					if($mov) {
						$name = stripslashes(strip_tags(trim($name)));
						mysql_query("INSERT INTO skin SET id_user ='".$id_user."',cover_skin= '".$name."',name_skin= '".$name_skin."',tg_skin = '".$tg_skin."',desc_skin = '".$desc_skin."',date_reg = '".$date_reg."'");
						echo '
						<script language="JavaScript"> 
							window.location.href = "/site/magazine/index.php?id='.$_SESSION['id'].'"
						</script>';
					}
				}
			}
		}
	}
?>
<link href="style.css" rel="stylesheet"/>