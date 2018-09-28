<?php 
	session_start(); 
	include_once("/bd.php");
	$query = "SELECT id,name_skin,desc_skin FROM skin UNION SELECT id,title,posttext FROM post";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	while($row = mysql_fetch_array($result)){
		echo '
			<div class="blockINslide">
				<div class="titleBis"><a href=./artcls/page/page.php?id='.$row['id'].'>'.$row['name_skin'].'</a></div>
				<div class="tagSpace"><span class="tagBis">Статья</span><span class="tagBis">О фильме</span></div>
				<div class="mainBis"><span>'.$row['desc_skin'].'</span></div>
				<div class="photoBis">
					<img class="imgBis" src="./artcls/foto_post/20170918200250from-around-the-world.-hd-wallpaper_-1280x800.jpg" />
					<img class="imgBis" src="./artcls/foto_post/20170918200250from-around-the-world.-hd-wallpaper_-1280x800.jpg" />
					<img class="imgBis" src="./artcls/foto_post/20170918200250from-around-the-world.-hd-wallpaper_-1280x800.jpg" />
					<img class="imgBis" src="./artcls/foto_post/20170918200250from-around-the-world.-hd-wallpaper_-1280x800.jpg" />
				</div>
				<div class="infoBis">
					<span class="dateBis">20 декабря в 20:10</span>
					<a href="" class="laikBis">Интересно</a>
				</div>
			</div>
		';
	}
?>