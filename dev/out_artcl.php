<?php
	$query = " SELECT * FROM post LIMIT 4";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$i = 1;
	while($row = mysql_fetch_array($result)){
		$cover = $row['foto_post'];
		$title = $row['title'];
		$id = $row['id'];
		switch ($i) {
        case 1:
            echo '
				<div id="art'.$id.'" class="artBlock" style="background-image: url(artcls/'.$cover.');margin-right: 1px;"><div class="artButton">Читать</div><span>'.$title.'</span></div>
			';
			break;
        case 2:
			echo '
				<div id="art'.$id.'" class="artBlock" style="background-image: url(artcls/'.$cover.');margin-left: 1px;"><div class="artButton">Читать</div><span>'.$title.'</span></div>
				';
			break;
		case 3:
			echo '
				<div id="art'.$id.'" class="artBlock" style="background-image: url(artcls/'.$cover.');margin-left: 2px;"><span>'.$title.'</span></div>
			';
			break;
        case 4:
			echo '
				<div id="art'.$id.'" class="artBlockBig" style="background-image: url(artcls/'.$cover.')">'.$title.'</div>
			';
			break;
		}
		$i++;
		echo '
			<script>
				<script>
					$(function(){
						$(".artBlock").mouseenter(function() {
							var  i = $(".artBlock").index(this);
							$(".artButton").eq(i).show()).hide()
						})
					})
			</script>
		';
	}
?>