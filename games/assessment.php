<?php
	if($assessment >= 1 &&  $assessment <= 5){
		$as = '<div style="background-color: #a10b0b;" class="assessment">'.$assessment.'</div>';
	}
	elseif($assessment >= 6 && $assessment <= 7){
		$as = '<div style="background-color: #d79514;" class="assessment">'.$assessment.'</div>';
	}
	elseif($assessment >= 8 && $assessment <= 10){
		$as = '<div style="background-color: #74ab24;" class="assessment">'.$assessment.'</div>';
	}
?>