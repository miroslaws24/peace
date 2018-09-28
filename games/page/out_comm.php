<?php
	session_start();
	include_once('function.php');
	include_once('smile.php');
	include_once("../bd.php");
	
	$user_id = $_SESSION['id'];
	$game_id = $_SESSION['game_id'];
	$today = date("d.m.Y");
	$time = date('H:i');
	$sql = " SELECT * FROM comments WHERE game_id = '".$game_id."' ORDER BY id DESC LIMIT 10";
			$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
			while($line = mysql_fetch_array($res)){
				$user_id = $line['user_id'];
				$_SESSION['comment_id'] = $line['id'];
				$query = " SELECT * FROM users WHERE id = '".$user_id."'";
				$result = mysql_query($query) or die ( "Error : ".mysql_error() );
				$row = mysql_fetch_array($result);
				$name_avatar = $row['name_avatar'];
				$login = $row['login'];
				$text = $line['text'];
				$like = $line['like_count'];
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
							<script>
								$(".like").click(function() {
									var link = $(this);
									var id = $(this).data("id");
									var user_id = '.$_SESSION['id'].'
									
									$.ajax({
										type: "POST",
										url: "like.php",
										data: ({id:id, user_id:user_id}),
										success: function(html) {
											$(link).empty();
											$(link).html(html);
										}
									});
								});
							</script>
							<div class="like" id="like'.$id.'" data-id='.$id.'>Нравится<div class="count_like"">'.$like.'</div></div>
						</div>
					</div>
					<div id="commentUser" class="commentUser">
						<script>
						$(document).ready(function() { 
							$.ajax({
								type: "POST",
								url: "out_commUser.php",
								success: function(html) {
									$("#commentUser").empty();
									$("#commentUser").append(html);
								}
							})
						});
						</script>
					</div>
					<div class="us_comm">
						<form name="fc" id="formUsCom" action="javascript:void(null);" onsubmit="callComm() "method="post">
							<img id="load_comm" src="smile/ajax-loader.gif" style="display: none;" />
							<input type="submit" class="add_ComUs" name="add_ComUs" value="" />
							<textarea name="text_commUser" id="us_comm_text" class="us_comm_text"></textarea>
						<form>
					</div>
					<script type="text/javascript" language="javascript">
							function callComm(){
							  var fU   = $("#formUsCom").serialize();
								$.ajax({
								  type: "POST",
								  url: "commentUser.php",
								  data: fU,
								  success: function(html) {
									$("#commentUser").empty();
									$("#commentUser").append(html);
								  },
								  error:  function(xhr, str){
									alert("Возникла ошибка: " + xhr.responseCode);
								  }
								});
						 
							}
					</script>
				';
			}
		echo '
		<script type="text/javascript">
		$(document).ready(function(){
		   $("#imgLoad").hide();
		});
		var num = 10; //чтобы знать с какой записи вытаскивать данные
		$(function() {
			$("#load div").click(function(){
			$("#imgLoad").show();
			$("#loadText").hide();
			$.ajax({
				  url: "load.php",
				  type: "GET",
				  data: {"num": num},
				  cache: false,
				  success: function(response){
					  if(response == 0){  // смотрим ответ от сервера и выполняем соответствующее действие
						 $("#loadText").text("Больше ничего нет");
						 $("#imgLoad").hide();
						 $("#loadText").show();
					  }else{
						 $("#comm_space").append(response);
						 num = num + 5;
						 $("#imgLoad").hide();
						 $("#loadText").show();
					  }
				   }
				});
			});
		});
		</script>
		';
		
?>