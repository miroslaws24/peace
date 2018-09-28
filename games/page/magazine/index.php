<?php 
	session_start(); 
	include_once("bd.php");
	
	$sql = " SELECT * FROM post";
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
							$title = $line['title'];
							$cover = $line['cover_skin'];
							$name_skin = $line['name_skin'];
							$block = $line['block'];
							$block = explode("|",$block);
							foreach ($block as $b) {
							  if(strpos($b, '.jpg')){
								  echo '<img src="img/skin.jpg" />';
							  }
							  else{
								  echo $b;
							  }
							}
						}
					?>
				</div>
			</div>
		</body>
</html>
