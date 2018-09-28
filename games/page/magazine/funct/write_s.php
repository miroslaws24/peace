<?php
	session_start();
	include("bd.php");
	if(isset($_POST['ok_write'])){
		$user_id = $_SESSION['id'];
		$title = $_POST['title_artcls'];
		$anons = $_POST['anons_artcl'];
		$str = implode("|",$_POST["block"]);
		$today = date("d.m.Y");
		$time = date('H:i');
		$block = $_POST['block'];;
		if(isset($_FILES["block"]))
		foreach ($_FILES["block"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				$tmp_name = $_FILES["block"]["tmp_name"][$key];
				// basename() может спасти от атак на файловую систему;
				// может понадобиться дополнительная проверка/очистка имени файла
				$name = basename($_FILES["block"]["name"][$key]);
				move_uploaded_file($tmp_name, "cover/$name");
				$_POST['block'][] = $name; 
				$sql = "INSERT INTO post SET user_id = '$user_id',title = '$title',posttext = '$anons',block = '$str'";
				$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
			}
		}
		$sql = "INSERT INTO post SET user_id = '$user_id',title = '$title',posttext = '$anons',block = '$str'";
		$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
	}
?>
<link href="style.css" rel="stylesheet"/>