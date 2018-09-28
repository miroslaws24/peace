<?php
	session_start();
	include("bd.php");
	if(isset($_POST["ok"])){ $ok = $_POST["ok"]; }
	if(isset($ok)){
		if(isset($_POST["name"])){ $name = htmlspecialchars($_POST["name"]); }
		if(isset($_POST["country"])){ $country = htmlspecialchars($_POST["country"]); }
		mysql_query("UPDATE users SET name ='".$name."',country ='".$country."' WHERE id = '".$_GET['id']."'");
		echo '
		<script language="JavaScript"> 
			window.location.href = "/site/new_user/photo.php?id='.$_SESSION['id'].'"
		</script>';
	}
?>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
        <link href="new_user.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="forma">
			<div class="top"><span>Что ж,познакомимся!</span></div>
			<form method="POST">
				<div class="inp_form"><div class="text"><span>Имя</span></div><input name="name" class="inp"></div>
				<div class="inp_form"><div class="text"><span>Страна</span></div><input name="country" type="text" class="inp"></div>
				<div class="bot"><div class="text_bot"></div><input value="Далее" name="ok" type="submit" class="but"></div>
			</form>
			
		</div>
	</body>
</html>