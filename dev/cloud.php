<?php
	session_start();
	include("bd.php");
	$url = "index.php?id=";
	if(isset($_POST['ok'])){
			$title= $_POST['title'];
			$user_id = $_GET['user'];
			$posttext = $_POST['posttext'];
?>