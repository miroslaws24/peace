<?php
	session_start();
	include("../bd.php");
	include_once('smile.php');
	include_once('function.php');
	
		$text_comment= $_POST['text_comment'];
		$text_comment = strtr( $text_comment, $replace );
		$user_id = $_SESSION['id'];
		$game_id = $_SESSION['game_id'];
		$today = date("d.m.Y");
		$time = date('H:i');
		if(!empty($text_comment)){
			mysql_query("INSERT INTO comments SET game_id ='".$game_id."',text ='".$text_comment."',time_comm ='".$time."',user_id ='".$user_id."',date_comm ='".$today."'") or  die ( "Error : ".mysql_error() ) ;
			echo '<script>document.getElementById("formx").reset();</script>';
		}
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
						<form name="fc" id="formUsCom" action="javascript:void(null);" onsubmit="callComm()" method="post">
							<img id="load_comm" src="smile/ajax-loader.gif" style="display: none;" />
							<input type="submit" class="add_ComUs" name="add_ComUs" value=""/>
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
?>
 <script>
        $(document).ready(function(){
         
        $('#show_more').click(function(){
        var btn_more = $(this);
        var count_show = parseInt($(this).attr('count_show'));
        var count_add  = $(this).attr('count_add');
        btn_more.val('Подождите...');
                 
        $.ajax({
                    url: "out_comm.php", // куда отправляем
                    type: "post", // метод передачи
                    dataType: "json", // тип передачи данных
                    data: { // что отправляем
                        "count_show":   count_show,
                        "count_add":    count_add
                    },
                    // после получения ответа сервера
                    success: function(data){
            if(data.result == "success"){
                $('#c').append(data.html);
                    btn_more.val('Показать еще');
                    btn_more.attr('count_show', (count_show+3));
            }else{
                btn_more.val('Больше нечего показывать');
            }
                    }
                });
            });
             
        });     
</script>