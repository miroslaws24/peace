<?php
	session_start();
	include_once("bd.php");
	$ip = $_SERVER['REMOTE_ADDR'];
	if(isset($_SESSION['login'])){
		echo '
		<script language="JavaScript"> 
			window.location.href = "/"
		</script>';
	}
	
	if(isset($_POST["login"])){ $login = $_POST["login"]; }
	if(isset($_POST["password"])){ $password = $_POST['password']; }
	if(isset($_POST["ok"])){ $ok = $_POST["ok"]; }
	if(!empty($login)){
		if(empty($password)){
			$errorLog ="<span class='error'>Вы не ввели пароль</span>";
			echo $errorLog;
			echo '
				<form action="javascript:void(null);" onsubmit="call()" name="auth" id="auth" method="POST">
					<div class="inp_form"><div class="text"><span>Логин</span></div><input name="login" class="inp"></div>
					<div class="inp_form"><div class="text"><span>Пароль</span></div><input name="password" type="password" class="inp"></div>
					<div class="bot"><div class="text_bot"><a class="reg" href="reg/reg.php">Регистрация</a></div><img class="loader" src="img/91.gif" /><input name="ok" type="submit" class="but" value="Войти"></div>
				</form>
			';
		}
		else{
		$query = " SELECT * FROM users WHERE login = '$login' AND password = '$password'";
		$result = mysql_query($query) or die ( "Error : ".mysql_error() );
		$row = mysql_fetch_array($result);
		$id = $row['id'];
		$user_ip = $row['user_ip'];
		if(mysql_num_rows($result) < 1){
			$errorLog = "<span class='error'>Неправильный логин или пароль</span>";
			echo $errorLog;
			echo '
				<form action="javascript:void(null);" onsubmit="call()" name="auth" id="auth" method="POST">
					<div class="inp_form"><div class="text"><span>Логин</span></div><input name="login" class="inp"></div>
					<div class="inp_form"><div class="text"><span>Пароль</span></div><input name="password" type="password" class="inp"></div>
					<div class="bot"><div class="text_bot"><a class="reg" href="reg.php">Регистрация</a></div><img class="loader" src="img/91.gif" /><input name="ok" type="submit" class="but" value="Войти"></div>
				</form>
			';
		}else{
			$_SESSION['login'] = $login;
			$_SESSION['password'] = $password;
			$_SESSION['id'] = $id;
				if(empty($user_ip)){
					if($date_now != $last_act){
						
					}
					$_SESSION['user_ip'] = $user_ip;
					echo '
						<script language="JavaScript"> 
							window.location.href = "site/new_user/index.php?id='.$_SESSION['id'].'"
						</script>';
				}
				else
					if(!empty($user_ip)){
						$q = " UPDATE users SET user_ip= '".$ip."' WHERE login = '$login'";
						$result = mysql_query($q) or die ( "Error : ".mysql_error() );
						echo '
						<script language="JavaScript"> 
							window.location.href = "reg/verefecation.php"
						</script>';
					}
		}
		}
	}
	else{
			$errorLog ="<span class='error'>Вы не ввели логин</span>";
			echo $errorLog;
			echo '
				<form action="javascript:void(null);" onsubmit="call()" name="auth" id="auth" method="POST">
					<div class="inp_form"><div class="text"><span>Логин</span></div><input name="login" class="inp"></div>
					<div class="inp_form"><div class="text"><span>Пароль</span></div><input name="password" type="password" class="inp"></div>
					<div class="bot"><div class="text_bot"><a class="reg" href="reg.php">Регистрация</a></div><img class="loader" src="img/91.gif" /><input name="ok" type="submit" class="but" value="Войти"></div>
				</form>
			';
	}
?>
 <link href="style.css" rel="stylesheet" type="text/css" />