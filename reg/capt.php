<?php 
	session_start();
	$a = rand(1,10);
	$b = rand(1,10);
	$s = $a + $b;
	$_SESSION['otvet'] = $s;
?>

