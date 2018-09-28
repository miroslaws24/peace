<?php
	if(!isset($_GET['pop'])){
		$query = " SELECT * FROM games";
		$result = mysql_query($query) or die ( "Error : ".mysql_error() );
		while($row = mysql_fetch_array($result)){
			$cover = $row['cover'];
			$title = $row['title'];
			echo '
				<div class="blockPop" style="background-image: url(games/scripts/'.$cover.');">
					<div class="tag">Игра</div>
					<div class="popName"><span>'.$title.'</span></div>
				</div>
				
				<script>
					$("#popG").css("backgroundColor", "#337ab7");
					$("#popG").css("color", "#fff");
				</script>
			';
		}
	}
	if(isset($_GET['pop']) && $_GET['pop'] == 'g'){
		$query = " SELECT * FROM games";
		$result = mysql_query($query) or die ( "Error : ".mysql_error() );
		while($row = mysql_fetch_array($result)){
			$cover = $row['cover'];
			$title = $row['title'];
			echo '
				<div class="blockPop" style="background-image: url(games/scripts/'.$cover.');">
					<div class="tag">Игра</div>
					<div class="popName"><span>'.$title.'</span></div>
				</div>
				<script>
					$("#popG").css("backgroundColor", "#337ab7");
					$("#popG").css("color", "#fff");
				</script>
			';
		}
	}
	if(isset($_GET['pop']) && $_GET['pop'] == 'f'){
		echo 'Фильмов пока нет
		<script>
			$("#popF").css("backgroundColor", "#337ab7");
			$("#popF").css("color", "#fff");
		</script>
		';
	}
?>