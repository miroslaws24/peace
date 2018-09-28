<?php
	include("bd.php");
	$link = '/site/index.php';
	session_start();
	$id_user = $_GET['id'];
	$id_post = $_GET['art'];
	if(isset($_GET['id']) && ($_GET['art'] )){
		if(isset($_GET['h'])&& ($_GET['h'] == '1' )){
			$name = "love";
			$query = " SELECT * FROM like_users WHERE id_user= '".$_SESSION['id']."' AND id_post = '".$id_post."'";
			$result = mysql_query($query) or die ( "Error : ".mysql_error() );
			if(mysql_num_rows($result) >= 1){
				echo '
					<script language="JavaScript"> 
						window.location.href = "'.$link.'?id='.$_SESSION['id'].'&m=2"
				</script>';
			}
			elseif(mysql_num_rows($result) < 1){
				mysql_query("INSERT INTO like_users SET id_user = '".$id_user."',id_post = '".$id_post."',name='".$name."'");
				$row = mysql_fetch_array($result);
				$name = $row['name'];	
				mysql_query("UPDATE post SET love = love+1 WHERE id = '".$id_post."'");
				echo '
					<script language="JavaScript"> 
						window.location.href = "'.$link.'?id='.$_SESSION['id'].'&m=2"
				</script>';
			}
		}
		if(isset($_GET['h'])&& ($_GET['h'] == '2' )){
			$name = "super";
			$query = " SELECT * FROM like_users WHERE id_user= '".$_SESSION['id']."' AND id_post = '".$id_post."'";
			$result = mysql_query($query) or die ( "Error : ".mysql_error() );
			if(mysql_num_rows($result) < 1){
				echo '
					<script language="JavaScript"> 
						window.location.href = "'.$link.'?id='.$_SESSION['id'].'&m=2"
				</script>';
			}
			elseif(mysql_num_rows($result) < 1){
				mysql_query("INSERT INTO like_users SET id_user = '".$id_user."',id_post = '".$id_post."',name='".$name."'");
				$row = mysql_fetch_array($result);
				$name = $row['name'];	
				mysql_query("UPDATE post SET super = super+1 WHERE id = '".$id_post."'");
				echo '
					<script language="JavaScript"> 
						window.location.href = "'.$link.'?id='.$_SESSION['id'].'&m=2"
				</script>';
			}
		}
		if(isset($_GET['h'])&& ($_GET['h'] == '3' )){
			$name = "fine";
			$query = " SELECT * FROM like_users WHERE id_user= '".$_SESSION['id']."' AND id_post = '".$id_post."'";
			$result = mysql_query($query) or die ( "Error : ".mysql_error() );
			if(mysql_num_rows($result) < 1){
				echo '
					<script language="JavaScript"> 
						window.location.href = "'.$link.'?id='.$_SESSION['id'].'&m=2"
				</script>';
			}
			elseif(mysql_num_rows($result) < 1){
				mysql_query("INSERT INTO like_users SET id_user = '".$id_user."',id_post = '".$id_post."',name='".$name."'");
				$row = mysql_fetch_array($result);
				$name = $row['name'];	
				mysql_query("UPDATE post SET fine = fine+1 WHERE id = '".$id_post."'");
				echo '
					<script language="JavaScript"> 
						window.location.href = "'.$link.'?id='.$_SESSION['id'].'&m=2"
				</script>';
			}
		}
		if(isset($_GET['h'])&& ($_GET['h'] == '4' )){
			$name = "fu";
			$query = " SELECT * FROM like_users WHERE id_user= '".$_SESSION['id']."' AND id_post = '".$id_post."'";
			$result = mysql_query($query) or die ( "Error : ".mysql_error() );
			if(mysql_num_rows($result) < 1){
				echo '
					<script language="JavaScript"> 
						window.location.href = "'.$link.'?id='.$_SESSION['id'].'&m=2"
				</script>';
			}
			elseif(mysql_num_rows($result) < 1){
				mysql_query("INSERT INTO like_users SET id_user = '".$id_user."',id_post = '".$id_post."',name='".$name."'");
				$row = mysql_fetch_array($result);
				$name = $row['name'];	
				mysql_query("UPDATE post SET fu = fu+1 WHERE id = '".$id_post."'");
				echo '
					<script language="JavaScript"> 
						window.location.href = "'.$link.'?id='.$_SESSION['id'].'&m=2"
				</script>';
			}
		}
	}
	
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>