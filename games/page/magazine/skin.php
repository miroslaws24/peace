<?php 
	session_start(); 
	include_once("bd.php");
	$_SESSION['user_id'] = $_GET['user'];
	if($_GET['id'] == $_SESSION['id']){
		//
	}
	elseif($_GET['id'] !== $_SESSION['id']){
		header('Location:user.php?id='.$_GET['id'].'');
	}
	$query = " SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	$user_id = $row['id'];
	$background = $row['background'];
	$avatar = $row['name_avatar'];
	
	$sql = " SELECT * FROM skin WHERE id = '".$_GET['skin']."' AND id_user = '".$user_id."'";
	$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
	$line = mysql_fetch_array($res);
	$id_skin = $line['id'];
	$id_user = $line['id_user'];
	$cover = $line['cover_skin'];
	$name_skin = $line['name_skin'];
	$tg_skin = $line['tg_skin'];
	$desc_skin = $line['desc_skin'];
	$date_reg = $line['date_reg'];
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="skin.css" rel="stylesheet"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<style>
			@font-face {
				font-family: FuturaPT;
				src: url(FuturaPT.otf);
			}
			@font-face {
				font-family: FuturaPTMedium;
				src: url(../FuturaPTMedium.otf);
			}
			.avatar{
				background-image: url('/site/new_user/<?php echo $avatar; ?>');
			}
		</style>
    </head>
        <body>
			<div class="writer">
				<div class="menu">
					<a href=index.php?id=<?php echo $_SESSION['id']; ?> class="href_menu"><img class="ic_menu" src="img/mag.png"/></a>
					<a href=write.php?id=<?php echo $_SESSION['id']; ?> class="href_menu"><img class="ic_menu" src="img/write.png"/></a>
					<a href="" class="href_menu"><img class="ic_menu" src="img/add.png"/></a>
					<a href="" class="href_menu"></a>
				</div>
			</div>
			<div class="content">
				<div class="header">
					<img class="logo" src="img/peace100px.png" />
					<span class="header_title">Мои журналы</span>
				</div>
				<div class="work_space">
					<div class="block_info">
						<div class="cover">
							<div class="img_skin" style="background-image: url(funct/<?php echo $cover; ?>);"></div>
						</div>
						<div class="info_text">
							<span class="title_skin"><?php echo $name_skin; ?></span>
							<span class="tg_skin"><?php echo $tg_skin; ?></span>
							<span class="date_skin"><?php echo $date_reg; ?></span>
							<span class="desc_skin"><?php echo $desc_skin; ?></span>
							<?php 
								if($_SESSION['id'] == $id_user){
									echo '
										<span class="for_writer">Для редакторов:</span>
										<a class="button_admin" href="" >Обновить</a>
										<a class="button_admin" style="margin-left: 5px;" href=write.php?id='.$_SESSION['id'].'&skin='.$id_skin.' >Новый материал</a>
										<a class="button_admin" style="margin-left: 5px;" href="" >Удалить</a>
									';
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</body>
</html>
