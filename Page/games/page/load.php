<?php
session_start();
include("../bd.php");
include_once('smile.php');
include_once('function.php');

$user_id = $_SESSION['id'];
$game_id = $_SESSION['game_id'];
if(isset($_GET['num'])){
	$num = $_GET['num'];
	$res = mysql_query("SELECT * FROM comments WHERE game_id = '".$game_id."' LIMIT $num, 5");
	if(mysql_num_rows($res) > 0){         
		while($line = mysql_fetch_array($res)){
				$user_id = $line['user_id'];
				$_SESSION['comment_id'] = $line['id'];
				$query = " SELECT * FROM users WHERE id = '".$user_id."'";
				$result = mysql_query($query) or die ( "Error : ".mysql_error() );
				$row = mysql_fetch_array($result);
				$name_avatar = $row['name_avatar'];
				$login = $row['login'];
				$text = $line['text'];
				$date_comm = $line['date_comm'];
				$time_comm = $line['time_comm'];
				$date = date('d.m.Y');
				$d1 = strtotime($date);
				$date_aft = date('d.m.Y', $d1);
				$id = $line['id'];
				if($date_aft == $date_comm){
					$time = 'Сегодня в '.$time_comm;
				}
				else{
					$time = rus_date("j F Y ", strtotime($date_comm)).' в '.substr($time_comm, 0, 5);
				}
				echo '
					<div data-id="'.$id.'" class="block_comm">
						<div class="avatar_comm" style="background-image: url(../../new_user/'.$name_avatar.')"></div>
						<span class="login">'.$login.'</span>
						<span class="text_comm">'.$text.'</span>
						<div class="info_comm">
							<span class="date_comm">'.$time.'</span>
							<div class="count_like">0</div>
							<div class="like">Думаю так же</div>
						</div>
					</div>
					<div id="commentUser" class="commentUser">
					
					</div>
					<div class="us_comm">
						<form name="fc" id="formx" action="javascript:void(null);" onsubmit="callComm()" name="comment" method="post" action="">
							<textarea name="text_commUser" id="us_comm_text" class="us_comm_text"></textarea>
						<form>
					</div>
					<script type="text/javascript" language="javascript">
							function callComm() {
							  var msg   = $("#formx").serialize();
								$.ajax({
								  type: "POST",
								  url: "commentUser.php",
								  data: msg,
								  success: function(data) {
									$("#commentUser").html(data);
								  },
								  error:  function(xhr, str){
								alert("Возникла ошибка: " + xhr.responseCode);
								  }
								});
						 
							}
					</script>
				';
			}
			
			sleep(1); //Сделана задержка в 1 секунду чтобы можно проследить выполнение запроса
    }
	else{
           echo 0; //Если записи закончились
    }
}
?>