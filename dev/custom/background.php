<?php
	session_start();
	include("bd.php");
	
	if(isset($_POST['background_ok'])) {
		if(empty($_FILES['background']['size']))  die('Вы не выбрали файл');
		if($_FILES['background']['size'] > (10 * 1024 * 1024)) die('Размер файла не должен превышать 5Мб');
		$imageinfo = getimagesize($_FILES['background']['tmp_name']);
		$arr = array('image/jpeg','image/gif','image/png');
		$ip = $_SERVER['REMOTE_ADDR'];
		if(!in_array($imageinfo['mime'],$arr)) echo ('Картинка должна быть формата JPG, GIF или PNG');
		else {
			$upload_dir = 'custom/';
			$name = $upload_dir.date('YmdHis').basename($_FILES['background']['name']);
			$mov = move_uploaded_file($_FILES['background']['tmp_name'],$name);
			if($mov) {
				$name = stripslashes(strip_tags(trim($name)));
				mysql_query("UPDATE users SET background ='".$name."' WHERE id = '".$_SESSION['id']."'");
						echo '
							<script language="JavaScript"> 
								window.location.href = "/site/index.php?id='.$_SESSION['id'].'"
							</script>';
			}
			else 
				echo 'Произошла ошибка при загрузке аватарки. Пожалуйста, попробуйте снова';
        }
    }
?>