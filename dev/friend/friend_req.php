<?php
	session_start();
	include("bd.php");
	if(isset($_GET['frid']) and isset($_GET['id'])){
		$user = $_SESSION['id'];
		$friend = $_GET['frid'];
		$query = "INSERT INTO firends SET user_id ='".$user."',friend_id ='".$friend."'";
		$result = mysql_query($query) or die ( "Error : ".mysql_error() );
		echo '
			<script language="JavaScript"> 
			window.location.href = "../../user.php?id='.$_GET['frid'].'"
			</script>';
	}
?>