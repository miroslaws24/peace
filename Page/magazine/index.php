<?php 
	session_start(); 
	include_once("bd.php");
	$query = " SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	$user_id = $row['id'];
	$background = $row['background'];
	$avatar = $row['name_avatar'];
	
	$sql = " SELECT * FROM skin WHERE id_user = '".$user_id."'";
	$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
?>
<html>
    <head>
        <meta charset="utf-8">
		<link href="style.css" rel="stylesheet"/>
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
					<a href="" class="href_menu"><img class="ic_menu" src="img/mag.png"/></a>
					<a href=write.php?id=<?php echo $_SESSION['id']; ?> class="href_menu"><img class="ic_menu" src="img/write.png"/></a>
					<a href=create.php?id=<?php echo $_SESSION['id']; ?> class="href_menu"><img class="ic_menu" src="img/add.png"/></a>
					<a href="" class="href_menu"></a>
				</div>
			</div>
			<div class="content">
				<div class="header">
					<img class="logo" src="img/peace100px.png" />
					<span class="header_title">Мои журналы</span>
				</div>
				<div class="skin_space">
					<?php
						while($line = mysql_fetch_array($res)){
							$id_skin = $line['id'];
							$cover = $line['cover_skin'];
							$name_skin = $line['name_skin'];
							echo '
								<div class="skin">
									<div class="cover" style="background-image: url(funct/'.$cover.');"></div>
									<a href=skin.php?skin='.$id_skin.'&id='.$_SESSION['id'].' class="name_skin">'.$name_skin.'</a>
								</div>
							';	
						}
					?>
				</div>
			</div>
		</body>
</html>
