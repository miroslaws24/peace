<?php
	include("bd.php");
	$query = " SELECT * FROM firends WHERE user_id = '".$_SESSION['id']."' ORDER BY id DESC";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
?>

<html>
    <head>
        <meta charset="utf-8">
		<link href="dev/ur/ur.css" rel="stylesheet"/>
		<link href="dev/news/news.css" rel="stylesheet"/>
		<link href="dev/intresting/intresting.css" rel="stylesheet"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="autoresize.js"></script>
		<style>
			@font-face {
				font-family: FuturaPT;
				src: url(FuturaPT.otf);
			}
			@font-face {
				font-family: FuturaPTMedium;
				src: url(FuturaPTMedium.otf);
			}
		</style>
    </head>
    <body>
		<div class="content_message">
		</div>
    </body>
</html>
