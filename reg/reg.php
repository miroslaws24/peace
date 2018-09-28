<?php
	session_start();
	include("bd.php");
	include("capt.php");
	
	if(isset($_SESSION['login'])){
		echo '
		<script language="JavaScript"> 
			window.location.href = "/"
		</script>';
	}
	
	if(isset($_POST["login"])){ $login = htmlspecialchars($_POST["login"]); }
	if(isset($_POST["email"])){ $email = htmlspecialchars($_POST["email"]); }
	if(isset($_POST["password"])){ $password = htmlspecialchars($_POST['password']); }
	if(isset($_POST["otvet"])){ $otvet = htmlspecialchars($_POST["otvet"]); }
	if(isset($_POST["ok"])){ $ok = $_POST["ok"]; }
	$ip = $_SERVER['REMOTE_ADDR'];
	if(isset($ok)){
	$query = "SELECT * FROM users";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	if($row['login'] == $login){
		$errorLogin = "<p class='error'>Логин существует</p>";
	}
	elseif($row['email'] !== $email){
		if(strlen($password) < 8){
			$errorPassword = "<p class='error'>Меньше 8 символов</p>";
		}
		else{
			if($s = $otvet){
				mysql_query("INSERT INTO users SET login ='".$login."',email ='".$email."',password ='".$password."'");
				$sucsses = "<p class='suc'>".$login." зарегистрирован!</p>";
			}
			else{
				$errorOtvet = "<p class='error'>Неправильный ответ</p>";
			}
		}
	}
	else{
		$errorEmail = 'E-mail занят';
	}
	}
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
        <link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="forma">
			<div class="top"><span>Регистрация</span></div>
			<form method="post">
				<div class="inp_form"><div class="text"><span>Логин</span></div><input name="login" class="inp"></div><?php echo $errorLogin ?>
				<div class="inp_form"><div class="text"><span>E-mail</span></div><input name="email" type="email" class="inp"></div><?php echo $errorEmail; ?>
				<div class="inp_form"><div class="text"><span>Пароль</span></div><input name="password" type="password" class="inp"></div><?php echo $errorPassword ?>
				<?php include('capt.php'); ?>
				<div class="capt">
				<p class="pe">Решите пример:</p>
				<p class="buk"><?php echo ''.$a.' + '.$b.' = ? '?></p>
				</div>
				<div class="inp_form"><div class="text"><span>Ответ</span></div><input name="otvet" class="inp"></div><?php echo $errorOtvet ?>
				<div class="bot"><div class="text_bot"><a class="reg" href="vxod.php">Войти</a></div><input name="ok" type="submit" class="but"></div><?php echo $sucsses ?>
			</form>
		</div>
	</body>
</html>