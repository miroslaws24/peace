<?php 
	session_start(); 
	include_once("/bd.php");
	$query = "SELECT * FROM games";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	while($row = mysql_fetch_array($result)){
		echo '
			<div class="blockINrec">
				<div class="coverBic" style="background-image: url(./games/scripts/'.$row['cover'].')"></div>
				<span class="titleBic">'.$row['title'].'</span>
				<span class="genreBic">'.$row['genre'].'</span>
			</div>
		';
	}
	
	
?>