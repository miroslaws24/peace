<?php
	session_start();
	include_once("../bd.php");
	
	$sql = " SELECT * FROM assesment WHERE id_user = '".$_SESSION['id']."' AND id_game = '".$_SESSION['game_id']."' ";
	$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($res);
	$id = $row['id'];
	$count = $row['count'];
	
		echo '<div class="mark_main" id="mM"><span id="mark_main">'.$count.'</span></div>';
		if($count == 0){
			echo '
			<div class="raiting">
				<div data-id="1" onclick="senddata(1);" style="background-color: #f1f1f1;" class="rait_block" id="mark'.$id.'"></div>
				<div data-id="2" onclick="senddata(2);" style="background-color: #f1f1f1;" class="rait_block" id="mark2"></div>
				<div data-id="3" onclick="senddata(3);" style="background-color: #f1f1f1;" class="rait_block" id="mark3"></div>
				<div data-id="4" onclick="senddata(4);" style="background-color: #f1f1f1;" class="rait_block" id="mark4"></div>
				<div data-id="5" onclick="senddata(5);" style="background-color: #f1f1f1;" class="rait_block" id="mark5"></div>
				<div data-id="6" onclick="senddata(6);" style="background-color: #f1f1f1;" class="rait_block" id="mark6"></div>
				<div data-id="7" onclick="senddata(7);" style="background-color: #f1f1f1;" class="rait_block" id="mark7"></div>
			</div>
			';
		}
		if($count == 1){
			echo '
			<div class="raiting">
				<div value="1" onclick="senddata(1);" style="background-color: #7FCAFF;" class="rait_block" id="mark1"></div>
				<div value="2" onclick="senddata(2);" style="background-color: #f1f1f1;" class="rait_block" id="mark2"></div>
				<div value="3" onclick="senddata(3);" style="background-color: #f1f1f1;" class="rait_block" id="mark3"></div>
				<div value="4" onclick="senddata(4);" style="background-color: #f1f1f1;" class="rait_block" id="mark4"></div>
				<div value="5" onclick="senddata(5);" style="background-color: #f1f1f1;" class="rait_block" id="mark5"></div>
				<div value="6" onclick="senddata(6);" style="background-color: #f1f1f1;" class="rait_block" id="mark6"></div>
				<div value="7" onclick="senddata(7);" style="background-color: #f1f1f1;" class="rait_block" id="mark7"></div>
			</div>
			';
		}
		if($count == 2){
			echo '
			<div class="raiting">
				<div value="1" onclick="senddata(1);" style="background-color: #7FCAFF;" class="rait_block" id="mark1"></div>
				<div value="2" onclick="senddata(2);" style="background-color: #7FCAFF;" class="rait_block" id="mark2"></div>
				<div value="3" onclick="senddata(3);" style="background-color: #f1f1f1;" class="rait_block" id="mark3"></div>
				<div value="4" onclick="senddata(4);" style="background-color: #f1f1f1;" class="rait_block" id="mark4"></div>
				<div value="5" onclick="senddata(5);" style="background-color: #f1f1f1;" class="rait_block" id="mark5"></div>
				<div value="6" onclick="senddata(6);" style="background-color: #f1f1f1;" class="rait_block" id="mark6"></div>
				<div value="7" onclick="senddata(7);" style="background-color: #f1f1f1;" class="rait_block" id="mark7"></div>
			</div>
			';
		}
		if($count == 3){
			echo '
			<div class="raiting">
				<div value="1" onclick="senddata(1);" style="background-color: #7FCAFF;" class="rait_block" id="mark1"></div>
				<div value="2" onclick="senddata(2);" style="background-color: #7FCAFF;" class="rait_block" id="mark2"></div>
				<div value="3" onclick="senddata(3);" style="background-color: #7FCAFF;" class="rait_block" id="mark3"></div>
				<div value="4" onclick="senddata(4);" style="background-color: #f1f1f1;" class="rait_block" id="mark4"></div>
				<div value="5" onclick="senddata(5);" style="background-color: #f1f1f1;" class="rait_block" id="mark5"></div>
				<div value="6" onclick="senddata(6);" style="background-color: #f1f1f1;" class="rait_block" id="mark6"></div>
				<div value="7" onclick="senddata(7);" style="background-color: #f1f1f1;" class="rait_block" id="mark7"></div>
			</div>
			';
		}
		if($count == 4){
			echo '
			<div class="raiting">
				<div value="1" onclick="senddata(1);" style="background-color: #7FCAFF;" class="rait_block" id="mark1"></div>
				<div value="2" onclick="senddata(2);" style="background-color: #7FCAFF;" class="rait_block" id="mark2"></div>
				<div value="3" onclick="senddata(3);" style="background-color: #7FCAFF;" class="rait_block" id="mark3"></div>
				<div value="4" onclick="senddata(4);" style="background-color: #7FCAFF;" class="rait_block" id="mark4"></div>
				<div value="5" onclick="senddata(5);" style="background-color: #f1f1f1;" class="rait_block" id="mark5"></div>
				<div value="6" onclick="senddata(6);" style="background-color: #f1f1f1;" class="rait_block" id="mark6"></div>
				<div value="7" onclick="senddata(7);" style="background-color: #f1f1f1;" class="rait_block" id="mark7"></div>
			</div>
			';
		}
		if($count == 5){
			echo '
			<div class="raiting">
				<div value="1" onclick="senddata(1);" style="background-color: #7FCAFF;" class="rait_block" id="mark1"></div>
				<div value="2" onclick="senddata(2);" style="background-color: #7FCAFF;" class="rait_block" id="mark2"></div>
				<div value="3" onclick="senddata(3);" style="background-color: #7FCAFF;" class="rait_block" id="mark3"></div>
				<div value="4" onclick="senddata(4);" style="background-color: #7FCAFF;" class="rait_block" id="mark4"></div>
				<div value="5" onclick="senddata(5);" style="background-color: #7FCAFF;" class="rait_block" id="mark5"></div>
				<div value="6" onclick="senddata(6);" style="background-color: #f1f1f1;" class="rait_block" id="mark6"></div>
				<div value="7" onclick="senddata(7);" style="background-color: #f1f1f1;" class="rait_block" id="mark7"></div>
			</div>
			';
		}
		if($count == 6){
			echo '
			<div class="raiting">
				<div value="1" onclick="senddata(1);" style="background-color: #7FCAFF;" class="rait_block" id="mark1"></div>
				<div value="2" onclick="senddata(2);" style="background-color: #7FCAFF;" class="rait_block" id="mark2"></div>
				<div value="3" onclick="senddata(3);" style="background-color: #7FCAFF;" class="rait_block" id="mark3"></div>
				<div value="4" onclick="senddata(4);" style="background-color: #7FCAFF;" class="rait_block" id="mark4"></div>
				<div value="5" onclick="senddata(5);" style="background-color: #7FCAFF;" class="rait_block" id="mark5"></div>
				<div value="6" onclick="senddata(6);" style="background-color: #7FCAFF;" class="rait_block" id="mark6"></div>
				<div value="7" onclick="senddata(7);" style="background-color: #f1f1f1;" class="rait_block" id="mark7"></div>
			</div>
			';
		}
		if($count == 7){
			echo '
			<div class="raiting">
				<div value="1" onclick="senddata(1);" style="background-color: #7FCAFF;" class="rait_block" id="mark1"></div>
				<div value="2" onclick="senddata(2);" style="background-color: #7FCAFF;" class="rait_block" id="mark2"></div>
				<div value="3" onclick="senddata(3);" style="background-color: #7FCAFF;" class="rait_block" id="mark3"></div>
				<div value="4" onclick="senddata(4);" style="background-color: #7FCAFF;" class="rait_block" id="mark4"></div>
				<div value="5" onclick="senddata(5);" style="background-color: #7FCAFF;" class="rait_block" id="mark5"></div>
				<div value="6" onclick="senddata(6);" style="background-color: #7FCAFF;" class="rait_block" id="mark6"></div>
				<div value="7" onclick="senddata(7);" style="background-color: #7FCAFF;" class="rait_block" id="mark7"></div>
			</div>
			';
		}
?>