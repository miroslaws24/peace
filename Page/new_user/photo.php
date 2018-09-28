<?php
	session_start();
	include("bd.php");
	
	if(isset($_POST['ok'])) {
		if(empty($_FILES['avatarka']['size']))  die('Вы не выбрали файл');
		if($_FILES['avatarka']['size'] > (5 * 1024 * 1024)) die('Размер файла не должен превышать 5Мб');
		$imageinfo = getimagesize($_FILES['avatarka']['tmp_name']);
		$arr = array('image/jpeg','image/gif','image/png');
		$ip = $_SERVER['REMOTE_ADDR'];
		if(!in_array($imageinfo['mime'],$arr)) echo ('Картинка должна быть формата JPG, GIF или PNG');
		else {
			$upload_dir = 'avatars/';
			$name = $upload_dir.date('YmdHis').basename($_FILES['avatarka']['name']);
			$mov = move_uploaded_file($_FILES['avatarka']['tmp_name'],$name);
			if($mov) {
				$name = stripslashes(strip_tags(trim($name)));
				mysql_query("UPDATE users SET name_avatar ='".$name."',user_ip= '".$ip."' WHERE id = '".$_GET['id']."'");
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

<html>
	<head>
		<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
        <link href="new_user.css" rel="stylesheet" type="text/css" />
		<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	</head>
	<body>
		<div class="forma">
			<div class="top"><span>Покажи себя!</span></div>
			<form enctype="multipart/form-data" method="POST">
				<div class="inp_form"><div class="text"><span>Фото</span></div><label for="uploadbtn" class="uploadButton">Загрузить файл</label><input id="uploadbtn" type="file" class="uplava" name="avatarka"></div>
				<div class="previe_photo">
					<img src="" id="image_preview" />
					<script>
						$('#uploadbtn').change(function() {
						  var input = $(this)[0];
						  if ( input.files && input.files[0] ) {
							if ( input.files[0].type.match('image.*') ) {
							  var reader = new FileReader();
							  reader.onload = function(e) { $('#image_preview').attr('src', e.target.result); }
							  reader.readAsDataURL(input.files[0]);
							  document.getElementById("spn_txt").style.display="block";
							} else console.log('is not image mime type');
						  } else console.log('not isset files data or files API not supordet');
						});
					</script>
				</div>
				<div class="bot"><div class="text_bot"><span id="spn_txt" style="display:none; transition: 1s;">Неплохо..</span></div><input value="Далее" name="ok" type="submit" class="but"></div>
			</form>
			
		</div>
	</body>
</html>