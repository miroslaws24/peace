<?php
	session_start();
	include("bd.php");
	
	if(isset($_POST['add_photo'])) {
		if(empty($_FILES['photo_user']['size']))  die('Вы не выбрали файл');
		if($_FILES['photo_user']['size'] > (10 * 1024 * 1024)) die('Размер файла не должен превышать 5Мб');
		$imageinfo = getimagesize($_FILES['photo_user']['tmp_name']);
		$arr = array('image/jpeg','image/gif','image/png');
		$ip = $_SERVER['REMOTE_ADDR'];
		if(!in_array($imageinfo['mime'],$arr)) echo ('Картинка должна быть формата JPG, GIF или PNG');
		else {
			$upload_dir = 'photo/';
			$name = $upload_dir.date('YmdHis').basename($_FILES['photo_user']['name']);
			$mov = move_uploaded_file($_FILES['photo_user']['tmp_name'],$name);
			$date = date('d.m.Y');
			if($mov) {
				$name = stripslashes(strip_tags(trim($name)));
				mysql_query("INSERT INTO gallery SET name ='".$name."',date ='".$date."',user_id ='".$_SESSION['id']."'");
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