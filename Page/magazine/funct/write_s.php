<?php
	session_start();
	include("bd.php");
	if(isset($_POST['ok_write'])){
		$arr = $_POST['block'];
		$string = serialize( $arr );
		echo $string;
	}
?>
<link href="style.css" rel="stylesheet"/>