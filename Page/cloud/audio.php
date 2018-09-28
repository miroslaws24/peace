<?php
session_start();
include("bd.php");
if(isset($_POST['submit'])) {
	echo '<script>alert("fgaa")</script>';
	$uploaddir = 'audio/';
	$uploadfile = $uploaddir.basename($_FILES['files']['name']);
	if($_FILES['files']['size'] > (100 * 1024 * 1024)) die('Размер файла не должен превышать 100Мб');
	$imageinfo = getimagesize($_FILES['files']['tmp_name']);
	$arr = array('audio/mp3');
	if(!in_array($imageinfo['mime'],$arr)) echo ('Только MP3');
	else {
		$upload_dir = 'audio/';
		$name = $upload_dir.basename($_FILES['files']['name']);
		$mov = move_uploaded_file($_FILES['files']['tmp_name'],$name);
		if($mov) {
			$name = stripslashes(strip_tags(trim($name)));
			mysql_query("INSERT INTO music SET id_user ='".$_SESSION['id']."',name='".$name."' WHERE id = '".$_SESSION['id']."'");
			}
			else 
				echo 'Произошла ошибка при загрузке аватарки. Пожалуйста, попробуйте снова';
        }
}
?>